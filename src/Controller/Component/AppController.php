<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login'
            ]
        ]);
        $this->set('auth', $this->request->session()->read('Auth'));

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add', 'edit', 'index', 'forgetPass', 'login', 'slider', 'sendMessage', 'testMessage', 'getOtp', 'loginOtp', 'appVerify', 'checkAppToken','consumerRegistration','consumerForm','consumerLogin','consumerForms']);
    }

    //In Appcontroller file
    public function sendSingleSMS($message, $mobileno, $cardTypeName, $rationNo, $month)
    {
        $username = "uidjharsms-pdsdept"; //username of the department
        $password = "pds@123"; //password of the department
        $senderid = "JHRPDS"; //senderid of the deparment
        $deptSecureKey = "8921726e-fccf-4927-bca5-b954eda66bd1"; //departsecure key for encryption of message...
        // $smsUrl='https://164.100.129.141/esms/sendsmsrequest';
        $encryp_password = sha1(trim($password));
        //$message            = " Request to move Green Rationcard to NFSA has been approved. NFSA Rationcard is : NFSA1234 . JHPDS"; //message content
        $date = date('d/m/Y');
        $message = " प्रिये {" . $cardTypeName . "} कार्ड धारक : {" . $rationNo . "} , {#" . $month . "} का राशन {" . $date . "} तक उठा लें | कोई शिकायत टाल फ्री नंबर 1967 पर दर्ज कराये | JHPDS"; //message content
//        $templateid         = "1302156645748113022";
        $templateid = "1302156645748113019";
        $key = hash('sha512', trim($username) . trim($senderid) . trim($message) . trim($deptSecureKey));
        $data = array(
            "username" => trim($username),
            "password" => trim($encryp_password),
            "senderid" => trim($senderid),
            "content" => trim($message),
            "smsservicetype" => "singlemsg",
            "mobileno" => trim($mobileno),
            "key" => trim($key),
            "templateid" => trim($templateid)
        );
        $this->post_to_url("https://164.100.129.141/esms/sendsmsrequestDLT", $data); //calling post_to_url to send sms
//        die;
    }

    //function to send sms using by making http connection
    public function post_to_url($url, $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . '=' . urlencode($value) . '&';
        }
        rtrim($fields, '&');
        $post = curl_init();
        //curl_setopt($post, CURLOPT_SSLVERSION, 5); // uncomment for systems supporting TLSv1.1 only

        curl_setopt($post, CURLOPT_SSLVERSION, 6); // use for systems supporting TLSv1.2 or comment the line
        curl_setopt($post, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($post, CURLOPT_URL, $url);
        curl_setopt($post, CURLOPT_POST, count($data));
        curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($post); //result from mobile seva server
        echo $result; //output from server displayed
        curl_close($post);
    }

    public function getMappedFormId($form_id = null)
    {
        $connection = ConnectionManager::get('default');
        $frmQry = $connection->prepare("SELECT mapped_form_id FROM secy_dept_form_masters WHERE id=?");
        $frmQry->bindValue(1, $form_id);
        $frmQry->execute();
        $rs = $frmQry->fetchAll('assoc');
        //echo "<pre>";print_r($users);die;
        if (!empty($rs)) {
            $mapped_form_id = $rs[0]['mapped_form_id'];
            return $mapped_form_id;
        } else {
            return 0;
        }
    }

    /**
     *
     * @return type
     */
    public function getDistricts()
    {
        $groupId = $this->getRequest()->getSession()->read('Auth')['User']['group_id'];
        $districtData = TableRegistry::getTableLocator()->get('Districts')->find('all', array('fields' => array('Districts.rgi_district_code', 'Districts.name'), 'order' => 'name', 'recursive' => -1));
        $districts = array();
        foreach ($districtData as $key => $value) {
            $districts[$value['rgi_district_code']] = $value['name'];
        }
        return $districts;
    }

    /**
     * @param null $rgi_district_code
     * @return string
     */
    public function getDistrictName($rgi_district_code = null)
    {
        $connection = ConnectionManager::get('default');
        $districts = $connection->prepare("SELECT name FROM districts WHERE rgi_district_code=?");
        $districts->bindValue(1, $rgi_district_code);
        $districts->execute();
        $dist = $districts->fetch('assoc');
        if (!empty($dist)) {
            $districtName = $dist['name'];
        } else {
            $districtName = '';
        }
        return $districtName;
    }

    /**
     * @param null $rgi_district_code
     * @param null $rgi_block_code
     * @return string
     */
    public function getBlockName($rgi_block_code = null)
    {
        $connection = ConnectionManager::get('default');
        $blocks = $connection->prepare("SELECT name FROM secc_blocks WHERE rgi_block_code=?");
        $blocks->bindValue(1, $rgi_block_code);
        $blocks->execute();
        $blk = $blocks->fetch('assoc');
        if (!empty($blk)) {
            $blockName = $blk['name'];
        } else {
            $blockName = '';
        }
        return $blockName;
    }

    /**
     * @param null $rgi_block_code
     * @return array
     */
    public function getDealersBasedOnBlock($rgi_block_code = null)
    {
        $request_data = $this->getRequest()->getData();
//        echo "<pre>"; print_r($request_data); "<pre>"; die;
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->viewBuilder()->layout('ajax');
//            echo $id = $request_data['id']; die;
            $id = $request_data['rgi_blk_code'];
        }
        $dealersData = TableRegistry::get('Dealers');
        $query = $dealersData->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'conditions' => ['Dealers.rgi_block_code=' . "'" . $id . "'"]

        ]);
        $dealers = $query->toArray();
        //array_unshift($blocks, '--Select Block--');
        if ($this->request->is('ajax')) {
            echo json_encode($dealers);
            die;
        } else {
            return $dealers;
        }
    }

    /**
     *
     * @return type
     */
    public function getBlocksByDistrict($id = null)
    {
        $request_data = $this->getRequest()->getData();
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->viewBuilder()->layout('ajax');
            $id = $request_data['id'];
        }
        $blockCityData = TableRegistry::get('SeccBlocks');
        if (!empty($id)) {
            $query = $blockCityData->find('list', [
                'keyField' => 'rgi_block_code',
                'valueField' => 'name',
                'conditions' => ['SeccBlocks.rgi_district_code=' . "'" . $id . "'"],
                'order' => 'name'

            ]);
        } else {
            $query = $blockCityData->find('list', [
                'keyField' => 'rgi_block_code',
                'valueField' => 'name',
                'order' => 'name'

            ]);
        }
        $blocks = $query->toArray();
        //array_unshift($blocks, '--Select Block--');
        if ($this->request->is('ajax')) {
            echo json_encode($blocks);
            die;
        } else {
            return $blocks;
        }
    }

    /**
     *
     * @return type
     */
    public function getPanchayatsByBlock($id = null)
    {
        $request_data = $this->getRequest()->getData();
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->viewBuilder()->layout('ajax');
            $id = $request_data['id'];
        }
        $panchayats[] = '--Select Panchayat--';
        $panchayatData = TableRegistry::get('Panchayats');
        $query = $panchayatData->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'conditions' => ['Panchayats.rgi_block_code=' . "'" . $id . "'"],
            'order' => 'name'
        ]);
        $panchayats = $query->toArray();
        //echo "<pre>";print_r($panchayats);die;
        if ($this->request->is('ajax')) {
            echo json_encode($panchayats);
            die;
        } else {
            return $panchayats;
        }
    }

    /**
     * @param null $id
     * @return array
     */
    public function getVillagesByPanchayat($id = null)
    {

        $request_data = $this->getRequest()->getData();
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->viewBuilder()->layout('ajax');
            $id = $request_data['id']; //echo $id;die;
        }
        $villageData = TableRegistry::get('SeccVillageWards');
        if (!empty($id)) {
            $query = $villageData->find('list', [
                'keyField' => 'rgi_village_code',
                'valueField' => 'name',
                'conditions' => ['SeccVillageWards.rgi_block_code=' . "'" . $id . "'"],
                'order' => 'name'

            ]);
        } else {
            $query = $villageData->find('list', [
                'keyField' => 'rgi_village_code',
                'valueField' => 'name',
                'order' => 'name'

            ]);
        }
        $villages = $query->toArray();
        if ($this->request->is('ajax')) {
            echo json_encode($villages);
            die;
        } else {
            return $villages;
        }
    }

}
