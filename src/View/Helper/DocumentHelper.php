<?php
  namespace App\View\Helper;
  //namespace Cake\View\Helper;

  //use Cake\Core\Configure;
  //use Cake\Network\Response;
use Cake\ORM\TableRegistry;
use Cake\View\Helper;
 // use Cake\View\StringTemplateTrait;
  use Cake\View\View;
use Cake\Datasource\ConnectionManager;


class DocumentHelper extends Helper
{
    public function showFile($docurl)
    {
		//echo $docurl;die;
        $url = $this->request->host();
//        $url ='http://'. $url. '/app/showfile/' . base64_encode($docurl);
        $url ='http://'. $url. '/app/showfile/' . $docurl;
        return $url;
    }

    public function getDocuments($registration_no){
        $connection = ConnectionManager::get('default');
        $getConsumerDocs = $connection->prepare("select id,name,document_type_id,cf_registration_no,document_path from cf_consumer_docs where cf_registration_no ='$registration_no' ");
        $getConsumerDocs->execute();
        $getCfDocs = $getConsumerDocs->fetchAll('assoc');
        return $getCfDocs;
    }
    public function getCfDistrictsBasedOnState($state_code = null){
//        $request_data = $this->getRequest()->getData();
//        if($this->getRequest()->is('ajax')){
//            $this -> autoRender = false;
//            $this->viewBuilder()->layout('ajax');
//            $state_code = $request_data['state_code'];
//        }
        $cfDistricts[] = '--Select District--';
        $districtData = TableRegistry::get('CfDistricts');
        $query = $districtData->find('list', [
            'keyField' => 'rgi_district_code',
            'valueField' => 'district_name',
            'conditions'=>['CfDistricts.state_code='."'".$state_code."'"],
            'order'=>'district_name'
        ]);
        $cfDistricts = $query->toArray();
        //echo "<pre>";print_r($cfDistricts);die;
        return $cfDistricts;
//        if($this->getRequest()->is('ajax')){
//            echo json_encode($cfDistricts);
//            die;
//        }else{
//            return $cfDistricts;
//        }
    }

 }

 ?>
