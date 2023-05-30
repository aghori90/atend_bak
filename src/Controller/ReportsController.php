<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * Reports Controller
 *
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    /* UID drill Down Report*/

    // for district
    public function distReport()
    {

        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $districtName = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $monthYr = '';
        $monthId = '';
        $yearId = '';
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($data); "<pre>"; die;
            if (array_key_exists('month_id', $data) && array_key_exists('year_id', $data)) {
                $monthId = $data['month_id'];
                $yearId = $data['year_id'];
            } else {
                $monthYr = $data['mnthYr'];

                $monthYr = explode('/', $monthYr);
//            echo "<pre>"; print_r($monthYr); "<pre>"; die;
                $month = $monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::get('Years');
                $query = $yearsData->find('list', [
                    'keyField' => 'name',
                    'valueField' => 'id',
                    'order' => 'name'
                ]);
                $years = $query->toArray();
                $yearId = $years[$year];

                // fetching months id from months table (key is in app controller)
                $monthsData = TableRegistry::get('Months');
                $query = $monthsData->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'id',
                    'order' => 'id'
                ]);
                $months = $query->toArray();
                $monthId = $months[substr($month, 1)];
            }

            $montId = $this->getRequest()->getSession()->write('mnthId', $monthId);
            $yerId = $this->getRequest()->getSession()->write('yrId', $yearId);


            $uidErrCount = $connection->prepare("select rgi_district_code, name, uid_error_811_count,uid_member_811_count, uid_error_300_count,uid_member_300_count from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
            $uidErrCount->bindValue(1, $monthId);
            $uidErrCount->bindValue(2, $yearId);
            $uidErrCount->execute();
            $uidErrCounts = $uidErrCount->fetchAll('assoc');

            $distRepo811 = [];
            foreach ($uidErrCounts as $vKey => $vVal) {
                $distRepo811[$vVal['rgi_district_code']] = $vVal['uid_error_811_count'];
            }
            $distRepoMem811 = [];
            foreach ($uidErrCounts as $vKey => $vVal) {
                $distRepoMem811[$vVal['rgi_district_code']] = $vVal['uid_member_811_count'];
            }

            $distRepo300 = [];
            foreach ($uidErrCounts as $vKey => $vVal) {
                $distRepo300[$vVal['rgi_district_code']] = $vVal['uid_error_811_count'];
            }
            $distRepoMem300 = [];
            foreach ($uidErrCounts as $vKey => $vVal) {
                $distRepoMem300[$vVal['rgi_district_code']] = $vVal['uid_member_811_count'];
            }
        }
//        echo "<pre>"; print_r($districts); "<pre>"; die;
        $this->set(compact('districts', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'monthYr', 'monthId', 'yearId'));
    }

    //for block
    public function blkReport()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $year_id = '';
        $month_id = '';
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $uRgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $uRgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($uRgi_district_code);
            $blockName = $this->getBlockName($uRgi_block_code);

        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die();
            $rgi_district_code  = $request_data['rgi_dist_code'];
            $year_id            = $request_data['month_id'];
            $month_id           = $request_data['year_id'];
            $blocks             = $this->getBlocksByDistrict($rgi_district_code);
            $districtName       = $this->getDistrictName($rgi_district_code);

            $uidErrCount = $connection->prepare("select rgi_block_code,rgi_district_code, name, uid_error_811_count,uid_member_811_count, uid_error_300_count, uid_member_300_count from block_city_monthly_reports group by rgi_block_code,rgi_district_code, name");
            $uidErrCount->bindValue(1, $rgi_district_code);
            $uidErrCount->execute();
            $uidErrCounts = $uidErrCount->fetchAll('assoc');

            $distRepo811 = [];
            foreach ($uidErrCounts as $vKey => $vVal) {
                $distRepo811[$vVal['rgi_block_code']] = $vVal['uid_error_811_count'];
            }
            $distRepoMem811 = [];
            foreach ($uidErrCounts as $vKey => $vVal) {
                $distRepoMem811[$vVal['rgi_block_code']] = $vVal['uid_member_811_count'];
            }

            $distRepo300 = [];
            foreach ($uidErrCounts as $vKey => $vVal) {
                $distRepo300[$vVal['rgi_block_code']] = $vVal['uid_error_300_count'];
            }
            $distRepoMem300 = [];
            foreach ($uidErrCounts as $vKey => $vVal) {
                $distRepoMem300[$vVal['rgi_block_code']] = $vVal['uid_member_300_count'];
            }

//            echo "<pre>"; print_r($distRepo); "<pre>"; die();
        }
        $this->set(compact('blocks', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'rgi_district_code', 'year_id', 'month_id'));
    }

    // for Dealer
    public function dealerWiseCount()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $rgi_block_code = '';
        $year_id = '';
        $month_id = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);


        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

//            echo "select dealer_id,rgi_block_code, name, uid_error_811_count,uid_member_811_count, uid_error_300_count, uid_member_300_count from dealer_monthly_reports where rgi_block_code = '$rgi_block_code'  group by dealer_id"; die;

            $uidErrCount = $connection->prepare("select dealer_id,rgi_block_code, name, uid_error_811_count,uid_member_811_count, uid_error_300_count, uid_member_300_count from dealer_monthly_reports where rgi_block_code =? group by dealer_id");
            $uidErrCount->bindValue(1, $rgi_block_code);
            $uidErrCount->execute();
            $dealerList = $uidErrCount->fetchAll('assoc');

            $distRepo811 = [];
            foreach ($dealerList as $vKey => $vVal) {
                $distRepo811[$vVal['dealer_id']] = $vVal['uid_error_811_count'];
            }
            $distRepoMem811 = [];
            foreach ($dealerList as $vKey => $vVal) {
                $distRepoMem811[$vVal['dealer_id']] = $vVal['uid_member_811_count'];
            }

            $distRepo300 = [];
            foreach ($dealerList as $vKey => $vVal) {
                $distRepo300[$vVal['dealer_id']] = $vVal['uid_error_811_count'];
            }
            $distRepoMem300 = [];
            foreach ($dealerList as $vKey => $vVal) {
                $distRepoMem300[$vVal['dealer_id']] = $vVal['uid_member_811_count'];
            }
        }
        $this->set(compact('districts', 'dealerList', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'blocks', 'rgi_district_code', 'rgi_block_code', 'districtName', 'blockName', 'month_id', 'year_id'));
    }

    // for rationcard record
    public function rationcardDetails()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $rgi_block_code = '';
        $dealerId = '';
        $dlrName = '';
        $year_id = '';
        $month_id = '';
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $uRgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $uRgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);
        }
        // todo: for monthName
        $mnths = TableRegistry::get('months');
        $query = $mnths->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $mnths = $query->toArray();

        // todo: for monthName
        $yer = TableRegistry::get('years');
        $query = $yer->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $yer = $query->toArray();

        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $dealerId = $request_data['dealerId'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

//            echo "select rationcard_no, name, districtName, blockname, dealerName from authresponse_uid_errors where dealer_id = '$dealerId'"; die();

            $slctRationCrd = $connection->prepare("select rationcard_no, name,error_count, dealerName from authresponse_uid_errors where dealer_id = ? ");
            $slctRationCrd->bindValue(1, $dealerId);
            $slctRationCrd->execute();
            $slctRationCrds = $slctRationCrd->fetchAll('assoc');
            $dlrName = $slctRationCrds[0]['dealerName'];
            /*if(!empty($slctRationCrds)){
                $cardData = $slctRationCrds[0];
            }*/
//            echo "<pre>"; print_r($slctRationCrds); "<pre>"; die;
        }
        $this->set(compact('slctRationCrds', 'rgi_block_code', 'dealerId', 'districtName', 'blockName', 'dlrName', 'month_id', 'year_id', 'rgi_district_code', 'mnths', 'yer'));
    }

    /* Analytical report 1*/
    //for District
    public function distAnalytical()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $districtName = '';
        $distRepo = '';
        $monthYr = '';
        $monthId = '';
        $yearId = '';
        $distAnaCounts = '';
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($data); "<pre>"; die;
            if (array_key_exists('month_id', $data) && array_key_exists('year_id', $data)) {
                $monthId = $data['month_id'];
                $yearId = $data['year_id'];
            } else {
                $monthYr = $data['mnthYr'];

                $monthYr = explode('/', $monthYr);
//            echo "<pre>"; print_r($monthYr); "<pre>"; die;
                $month = $monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::get('Years');
                $query = $yearsData->find('list', [
                    'keyField' => 'name',
                    'valueField' => 'id',
                    'order' => 'name'
                ]);
                $years = $query->toArray();
                $yearId = $years[$year];

                // fetching months id from months table (key is in app controller)
                $monthsData = TableRegistry::get('Months');
                $query = $monthsData->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'id',
                    'order' => 'id'
                ]);
                $months = $query->toArray();
                $monthId = $months[substr($month, 1)];

                $montId = $this->getRequest()->getSession()->write('mnthId', $monthId);
                $yerId = $this->getRequest()->getSession()->write('yrId', $yearId);
            }

            $distAnaCount = $connection->prepare("select rgi_district_code,name,online_count,offline_count,phHead,phMember,aayHead,aayMember,whiteHead,whiteMember,greenHead,greenMember,rice_lifted,rice_allocated,wheat_lifted,wheat_allocated,sugar_lifted,sugar_allocated,salt_lifted,salt_allocated,k_oil_lifted,k_oil_allocated from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code");
            $distAnaCount->bindValue(1, $monthId);
            $distAnaCount->bindValue(2, $yearId);
            $distAnaCount->execute();
            $distAnaCounts = $distAnaCount->fetchAll('assoc');

//            echo "<pre>"; print_r($distAnaCounts); "<pre>"; die;

            $distRepo = [];
            foreach ($distAnaCounts as $vKey => $vVal) {
                $distRepo[$vVal['rgi_district_code']] = $vVal['name'];
            }
        }
//        echo "<pre>"; print_r($distRepo); "<pre>"; die;
        $this->set(compact('districts', 'distRepo', 'districtName', 'monthYr', 'monthId', 'yearId', 'distAnaCounts'));
    }

    //for Block
    public function blockAnalytical()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $year_id = '';
        $month_id = '';
        $blkAnaCount = '';
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $uRgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $uRgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($uRgi_district_code);
            $blockName = $this->getBlockName($uRgi_block_code);
        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die();
            $rgi_district_code = $request_data['rgi_dist_code'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);


            //echo "select rgi_block_code,name,online_count,offline_count,phHead,phMember,aayHead,aayMember,whiteHead,whiteMember,greenHead,greenMember,rice_lifted,rice_allocated,wheat_lifted,wheat_allocated,sugar_lifted,sugar_allocated,salt_lifted,salt_allocated,k_oil_lifted,k_oil_allocated from block_city_monthly_reports where rgi_district_code='$rgi_district_code' and month_id='$month_id' and year_id='$year_id'";die;
            $blkAnaCount = $connection->prepare("select rgi_block_code,name,online_count,offline_count,phHead,phMember,aayHead,aayMember,whiteHead,whiteMember,greenHead,greenMember,rice_lifted,rice_allocated,wheat_lifted,wheat_allocated,sugar_lifted,sugar_allocated,salt_lifted,salt_allocated,k_oil_lifted,k_oil_allocated from block_city_monthly_reports where rgi_district_code=? and month_id=? and year_id=?;");
            $blkAnaCount->bindValue(1, $rgi_district_code);
            $blkAnaCount->bindValue(2, $month_id);
            $blkAnaCount->bindValue(3, $year_id);
            $blkAnaCount->execute();
            $blkAnaCounts = $blkAnaCount->fetchAll('assoc');

//            echo "<pre>"; print_r($blkAnaCounts); "<pre>"; die;


            $distRepo = [];
            foreach ($blkAnaCounts as $vKey => $vVal) {
                $distRepo[$vVal['rgi_block_code']] = $vVal['name'];
            }

//            echo "<pre>"; print_r($distRepo); "<pre>"; die();
        }
        $this->set(compact('blocks', 'distRepo', 'districtName', 'rgi_district_code', 'year_id', 'month_id', 'blkAnaCount'));
    }

    //for Dealer
    public function dealerAnalytical()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $rgi_block_code = '';
        $year_id = '';
        $month_id = '';
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);


        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

            $dlrAnaCount = $connection->prepare("select name,dealerType,phHead,phMember,aayHead,aayMember,whiteHead,whiteMember,greenHead,greenMember,rice_lifted,rice_allocated,wheat_lifted,wheat_allocated,sugar_lifted,sugar_allocated,salt_lifted,salt_allocated,k_oil_lifted,k_oil_allocated from dealer_monthly_reports where rgi_block_code =? and month_id=? and year_id=?");
            $dlrAnaCount->bindValue(1, $rgi_block_code);
            $dlrAnaCount->bindValue(2, $month_id);
            $dlrAnaCount->bindValue(3, $year_id);
            $dlrAnaCount->execute();
            $dealerList = $dlrAnaCount->fetchAll('assoc');

//            echo "<pre>"; print_r($dealerList); "<pre>"; die;

//            $dealerList = [];
//            foreach ($dlrAnaCounts as $vKey => $vVal) {
//                $dealerList[$vVal['dealer_id']] = $vVal['error_count'];
//            }
//            echo "<pre>"; print_r($dealerList); "<pre>"; die();
        }
        $this->set(compact('districts', 'dealerList', 'blocks', 'rgi_district_code', 'rgi_block_code', 'districtName', 'blockName', 'year_id', 'month_id'));
    }

    /*other reports*/
    public function departmentReport()
    {
        $session = $this->request->getSession();
        //delete session data
//        $session->delete('DealerActivities');

        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        $rgi_district_code = '';
        $groupId = '';
        $rgi_block_code = '';
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

        }
        $groups = [2, 31, 13, 20, 12];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $dealerData = [];
        $panchayats = [];
        $condition = '';
        $dealerLists = [];
        $dealerActivities = [];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $districts = $this->getDistricts();
        if ($groupId == 31 || $groupId == 12) {
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
        } else if (($groupId == 13) || ($groupId == 2)) {
            $blocks = [];
        } else if ($groupId == 20) {
            $blocks = $blockName;
            $panchayats = $this->getPanchayatsByBlock($rgi_block_code);
        }
        $panchayat_id = '';
        $activityTypes = '';
        $groupName = '';
        $dlrGroups = $this->getAllDealerGroups();

        if ($this->getRequest()->is('post')) {
            $requestData = $this->getRequest()->getData();
            // echo "<pre>"; print_r($requestData); "<pre>"; die;
            $distrct_code = $requestData['rgi_district_code'];
            $block_code = $requestData['rgi_block_code'];
            $panchayat_id = $requestData['panchayat_id'];

            if (empty($block_code)) {
                $this->Flash->error(__('Please Select Block.'));
                return $this->redirect(['controller' => 'DealerActivities', 'action' => 'index']);
            }

            $this->getRequest()->getSession()->write([
                'DealerActivities.rgi_block_code' => $block_code,
                'DealerActivities.activityTypes' => $activityTypes,
                'DealerActivities.panchayat_id' => $panchayat_id
            ]);

            /** Start : Validation */
            if (empty($block_code)) {
                $block_code = $rgi_block_code;
            }
            /** Ended : Validation */
            if (!empty($panchayat_id)) {
                $condition .= " AND panchayats_id='$panchayat_id'";
            }

            $resultData = $connection->execute("SELECT * FROM dealer_temps WHERE rgi_district_code='$distrct_code' AND rgi_block_code='$block_code' $condition")->fetchAll('assoc');
            //echo "<pre>";print_r($resultData);die;


        }

        $this->set(compact('dealerActivities', 'dealerData', 'districts', 'blocks', 'rgi_district_code', 'districtName', 'rgi_block_code', 'panchayats', 'dealerLists', 'groupName', 'panchayat_id', 'activityTypes', 'groupId', 'blockName', 'resultData', 'dlrGroups'));
    }

    // for panchayat
    public function panchReport()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $rgi_block_code = '';
        $session_data = $this->getRequest()->getSession()->read();
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
//            $rgi_district_code  = base64_decode($request_data['rgi_dist_code']);
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $panchayats = $this->getPanchayatsByBlock($rgi_block_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);
            //echo "<pre>";print_r($request_data);die;

            $dealerCountQry = $connection->prepare("SELECT panchayats_id,count(id) as total_dealers FROM dealer_temps WHERE rgi_block_code=? GROUP BY panchayats_id");
            $dealerCountQry->bindValue(1, $rgi_block_code);
            $dealerCountQry->execute();
            $dealerCount = $dealerCountQry->fetchAll('assoc');

            $dealerList = [];
            foreach ($dealerCount as $vKey => $vVal) {
                $dealerList[$vVal['panchayats_id']] = $vVal['total_dealers'];
            }
        } else {
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $panchayats = $this->getPanchayatsByBlock($rgi_block_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);
            //echo "<pre>";print_r($request_data);die;

            $dealerCountQry = $connection->prepare("SELECT panchayats_id,count(id) as total_dealers FROM dealer_temps WHERE rgi_block_code=? GROUP BY panchayats_id");
            $dealerCountQry->bindValue(1, $rgi_block_code);
            $dealerCountQry->execute();
            $dealerCount = $dealerCountQry->fetchAll('assoc');

            $dealerList = [];
            foreach ($dealerCount as $vKey => $vVal) {
                $dealerList[$vVal['panchayats_id']] = $vVal['total_dealers'];
            }
        }

        $this->set(compact('districts', 'dealerList', 'blocks', 'panchayats', 'rgi_district_code', 'rgi_block_code', 'districtName', 'blockName'));
    }

    public function advanceSearch()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $groupId = '';
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

        }
        $groups = [2, 31, 13, 20, 12];
        $dealerData = [];
        $panchayats = [];
        $condition = '';
        $dealerLists = [];
        $dealerActivities = [];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
            //echo "<pre>"; print_r($request_data); "<pre>"; die;

            //server side validation
            $search_by = $request_data['search'];
            if (empty($search_by)) {
                $this->Flash->error(__('Enter Acknowledgement No.'));
                return $this->redirect(['controller' => 'Reports', 'action' => 'advanceSearch']);
            } else {
                if (($search_by == 1) && empty($request_data['ack'])) {
                    $this->Flash->error(__('Enter Acknowledgement No.'));
                    return $this->redirect(['controller' => 'Reports', 'action' => 'advanceSearch']);
                }
                if (($search_by == 2) && empty($request_data['name'])) {
                    $this->Flash->error(__('Enter name No.'));
                    return $this->redirect(['controller' => 'Reports', 'action' => 'advanceSearch']);
                }
                if (($search_by == 3) && empty($request_data['mobile'])) {
                    $this->Flash->error(__('Enter Mobile No.'));
                    return $this->redirect(['controller' => 'Reports', 'action' => 'advanceSearch']);
                }
                if (($search_by == 4) && empty($request_data['dLicence'])) {
                    $this->Flash->error(__('Enter Dealer Lisence No.'));
                    return $this->redirect(['controller' => 'Reports', 'action' => 'advanceSearch']);
                }
                if (($search_by == 5) && empty($request_data['uid'])) {
                    $this->Flash->error(__('Enter Aadhaar No.'));
                    return $this->redirect(['controller' => 'Reports', 'action' => 'advanceSearch']);
                }
                if (($search_by == 6) && empty($request_data['acount'])) {
                    $this->Flash->error(__('Enter Account No.'));
                    return $this->redirect(['controller' => 'Reports', 'action' => 'advanceSearch']);
                }
            }

//            $field      = $request_data['field'];
//            $data      = $request_data[$field];

            $ackNo = $request_data['ack'];
            $name = $request_data['name'];
            $mobile = $request_data['mobile'];
            $dLicence = $request_data['dLicence'];
            $uid = $request_data['uid'];
            $acntNo = $request_data['acount'];


            // multiple where conditions
            $where = ' Where ';
            if (!empty($ackNo) && (array_key_exists('ack', $request_data))) {
                $where .= " dt.ack_no='$ackNo'";
            } else if (!empty($name) && (array_key_exists('name', $request_data))) {
                $where .= " dt.name like '%$name%'";
            } else if (!empty($mobile) && (array_key_exists('mobile', $request_data))) {
                $where .= " dt.mobile= '$mobile'";
            } else if (!empty($dLicence) && (array_key_exists('dLicence', $request_data))) {
                $where .= " dt.dealerLicence= '$dLicence'";
            } else if (!empty($uid) && (array_key_exists('uid', $request_data))) {
                $where .= " dt.uid= '$uid'";
            } else if (!empty($acntNo) && (array_key_exists('acount', $request_data))) {
                $where .= " dt.accountNo= '$acntNo'";
            }
//            echo $where;
            $searchDatas = $connection->execute("select * from dealer_temps dt $where")->fetchAll('assoc');
//            echo "<pre>";print_r($searchDatas);die;
        }

        $this->set(compact('searchDatas'));

    }

    //Detailed Data
    public function detailedData()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $groupId = '';
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

        }
        $groups = [2, 31, 13, 20, 12];
        $dealerData = [];
        $panchayats = [];
        $condition = '';
        $dealerLists = [];
        $dealerActivities = [];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }

        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;

            $id = $request_data['details'];

            $detailQry = $connection->prepare("select * from dealer_temps where id = ?");
            $detailQry->bindValue(1, $id);
            $detailQry->execute();
            $datas = $detailQry->fetchAll('assoc');

//            echo "<pre>"; print_r($datas); "<pre>"; die;
        }
        $this->set(compact('datas'));

    }

    // Dso Dealer Reports
    public function dsoDealerReports()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
        $districtName = $this->getDistrictName($rgi_district_code);
        $blocks = $this->getBlocksByDistrict($rgi_district_code);
        $districts = $this->getDistricts();
        $panchayats = $this->getPanchayatsByBlock($rgi_block_code);
        //$panchayats                     = array();
        $rgi_block_code = '';
        $panchayat_id = '';
        $dealerData = '';
        $dealer_approval_statuses_id = '';
        $rgi_blck = '';
        $dealer_status_arr = [
            '' => '-- All Status --',
            '1' => 'Pending',
            '2' => 'Approved',
            '3' => 'Rejected',
            '4' => 'Payment Done',
            '5' => 'Licencee Dealer'
        ];
        $groups = [31, 20, 12];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
            //echo "<pre>"; print_r($request_data); //die();
            $rgi_dist = $request_data['rgi_district_code'];
            $rgi_blck = $request_data['rgi_block_code'];
            $dealer_approval_statuses_id = $request_data['dealer_status'];
            $where = "dt.rgi_district_code='$rgi_dist' AND dt.rgi_block_code='$rgi_blck'";
            $status_condition = '';
            if ($dealer_approval_statuses_id == 1) {    // application pending
                $status_condition .= " AND dealer_approval_statuses_id = 1";
            } else if ($dealer_approval_statuses_id == 2) {  // approved
                $status_condition .= " AND (dealer_approval_statuses_id = 2 OR dealer_approval_statuses_id = 4)";
            } else if ($dealer_approval_statuses_id == 3) {  // reject parameter
                $status_condition .= " AND (dealer_approval_statuses_id = 3 OR dealer_approval_statuses_id = 5)";
            } else if ($dealer_approval_statuses_id == 4) {  // payment parameter in query
                $status_condition .= " AND dealer_approval_statuses_id = 6 AND penmentDate IS NOT NULL AND payment_status=1";
            } else if ($dealer_approval_statuses_id == 5) {
                $status_condition .= " AND dealer_approval_statuses_id = 7";
            }
            $dealerData = $connection->execute("SELECT id,ack_no,name,panchayatName,dealer_approval_statuses_id FROM dealer_temps dt WHERE $where $status_condition")->fetchAll('assoc');
            //echo "<pre>";print_r($dealerData);die;
        }
        $this->set(compact('districts', 'blocks', 'rgi_district_code', 'rgi_block_code', 'districtName', 'panchayats', 'panchayat_id', 'groupId', 'dealer_status_arr', 'dealer_approval_statuses_id', 'dealerData', 'rgi_blck'));
    }

    public function depDealerReports()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
        $groups = [13, 12, 31, 20];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $getDistrict = TableRegistry::get('districts');
        $districtQuery = $getDistrict->find('list', [
            'keyField' => 'rgi_district_code',
            'valueField' => 'name'
        ]);
        $districts = $districtQuery->toArray();
        $blocks = $this->getBlocksByDistrict($rgi_district_code);
        $rgi_block_code = '';
        $dealer_approval_statuses_id = '';
        $dealerDatas = '';
        $rgi_blck = '';
        $dealer_status_arr = [
            '' => '-- All Status --',
            '1' => 'Pending',
            '2' => 'Approved',
            '3' => 'Rejected',
            '4' => 'Payment Done',
            '5' => 'Licencee Dealer'
        ];
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
            //echo "<pre>"; print_r($request_data); die;
            $rgi_dist = $request_data['rgi_district_code'];
            $rgi_blck = $request_data['rgi_block_code'];
            $panchyat_id = $request_data['panchayat_id'];
            $dealer_approval_statuses_id = $request_data['dealer_status'];
            $where = "dt.rgi_district_code='$rgi_dist' AND dt.rgi_block_code='$rgi_blck'";
            $status_condition = '';
            if ($dealer_approval_statuses_id == 1) {    // application pending
                $status_condition .= " AND dealer_approval_statuses_id = 1";
            } else if ($dealer_approval_statuses_id == 2) {  // approved
                $status_condition .= " AND (dealer_approval_statuses_id = 2 OR dealer_approval_statuses_id = 4)";
            } else if ($dealer_approval_statuses_id == 3) {  // reject parameter
                $status_condition .= " AND (dealer_approval_statuses_id = 3 OR dealer_approval_statuses_id = 5)";
            } else if ($dealer_approval_statuses_id == 4) {  // payment parameter in query
                $status_condition .= " AND dealer_approval_statuses_id = 6 AND penmentDate IS NOT NULL AND payment_status=1";
            } else if ($dealer_approval_statuses_id == 5) {
                $status_condition .= " AND dealer_approval_statuses_id = 7";
            }
            $dealerDatas = $connection->execute("SELECT id,ack_no,name,districtName,blockName,panchayatName,dealer_approval_statuses_id FROM dealer_temps dt WHERE $where $status_condition")->fetchAll('assoc');
            //echo "<pre>";print_r($dealerDatas);die;
        }
        $this->set(compact('districts', 'dealer_status_arr', 'dealer_approval_statuses_id', 'blocks', 'rgi_block_code', 'dealerDatas', 'rgi_blck'));
    }

    public function paymentHistory()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
        $groups = [12, 13, 20, 2, 31];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $getPaymentDetails = '';
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
            //echo "<pre>"; print_r($request_data); die;
            $from_date = $request_data['from_date'];
            $to_date = $request_data['to_date'];
            if (empty($from_date)) {
                $this->Flash->error(__('From Date is required.'));
                return $this->redirect(['controller' => 'Reports', 'action' => 'paymentHistory']);
            }
            if (empty($to_date)) {
                $this->Flash->error(__('To Date is required.'));
                return $this->redirect(['controller' => 'Reports', 'action' => 'paymentHistory']);
            }
            $getPaymentDetails = $connection->execute("SELECT dealer_code,name,districtName,payment_status FROM dealer_temps WHERE paymentDate >='$from_date' AND paymentDate <='$to_date' AND payment_status=1")->fetchAll('assoc');;
            /*$getPaymentDetail->bindValue(1, $from_date);
            $getPaymentDetail->bindValue(2, $to_date);
            $getPaymentDetail->execute();
            $paymentHistory = $getPaymentDetail->fetchAll('assoc');*/
            //echo "<pre>"; print_r($getPaymentDetail); die();
        }
        $this->set(compact('getPaymentDetails'));
    }

    public function subDivisionLists()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
        $districts = $this->getDistricts();
        $groups = [13];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $subDivisionsQry = $connection->prepare("SELECT id,name,rgi_district_code,districtName FROM sub_divisions");
        $subDivisionsQry->execute();
        $subDivisions = $subDivisionsQry->fetchAll('assoc');
        //echo "<pre>";print_r($subDivisions);die;
        $this->set(compact('subDivisions'));
    }

    public function addSubDivision()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
        $districts = $this->getDistricts();
        $groups = [13, 12];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
            //echo "<pre>"; print_r($request_data); die;
            $rgiDistCde = $request_data['rgi_district_code'];
            $subDivName = $request_data['sub_division_name'];
            // Start : Server Side Validation
            if (empty($rgiDistCde)) {
                $this->Flash->error(__('Please Select District.'));
                return $this->redirect(['controller' => 'Reports', 'action' => 'addSubDivision']);
            }
            if (empty($subDivName)) {
                $this->Flash->error(__('Please Enter Sub - Division Name.'));
                return $this->redirect(['controller' => 'Reports', 'action' => 'addSubDivision']);
            }
            // Ended : Server Side Validation
            $distName = $this->getDistrictName($rgiDistCde);

            $insSubDivision = $connection->insert('sub_divisions', [
                'name' => $subDivName,
                'rgi_district_code' => $rgiDistCde,
                'districtName' => $distName,
                'created' => date('Y-m-d H:i:s'),
                'created_by' => $user_id
            ]);

            if ($insSubDivision) {
                $this->Flash->success(__($subDivName . ' Sub - Division has been added, You can add more subdivision.'));
                return $this->redirect(['controller' => 'Reports', 'action' => 'addSubDivision']);
            } else {
                $this->Flash->error(__('Some Error occurred while adding Sub - Division.'));
                return $this->redirect(['controller' => 'Reports', 'action' => 'addSubDivision']);
            }

        }
        $this->set(compact('districts', 'rgi_district_code', 'rgi_block_code', 'groupId'));
    }

    public function mapSubDivision()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
        $districts = $this->getDistricts();
        $groups = [13, 12];
        $blocks = [];
        $distName = '';
        $subDivName = '';
        $subDivisId = '';
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
            //echo "<pre>";print_r($request_data);die;
            $rgiDistCde = $request_data['rgiDistCode'];
            $subDivisId = $request_data['subDivisionId'];
            $subDivName = $request_data['subDivisionName'];
            $blocks = $this->getBlocksByDistrict($rgiDistCde);
            $distName = $this->getDistrictName($rgiDistCde);
        }
        $this->set(compact('blocks', 'subDivName', 'distName', 'subDivisId', 'rgiDistCde'));
    }

    public function subDivisionMapping()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
        $districts = $this->getDistricts();
        $groups = [13, 12];
        $blocks = [];
        $distName = '';
        $subDivName = '';
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
            //echo "<pre>";print_r($request_data);//die;
            $rgiDistCde = $request_data['rgiDistCode'];
            $subDivisId = $request_data['subDivId'];
            $rgiBlckCde = $request_data['rgi_block_code'];
            $distName = $this->getDistrictName($rgiDistCde);

            // Start : Server Side Validation
            if (empty($rgiBlckCde)) {
                $this->Flash->error(__('Please Select Block for Mapping.'));
                return $this->redirect(['controller' => 'Reports', 'action' => 'addSubDivision']);
            }
            // Ended : Server Side Validation

            for ($i = 0; $i < count($rgiBlckCde); $i++) {
                $blk = $rgiBlckCde[$i];
                $blkName = $this->getBlockName($blk);
                $updateBlocksQry = $connection->prepare("UPDATE secc_blocks SET sub_division_id='$subDivisId' WHERE rgi_block_code='$blk'");
                $updateBlocksQry->execute();

                if (!$updateBlocksQry) {
                    $this->Flash->error(__('Sub - Division not updated for ' . $blkName . '.'));
                    return $this->redirect(['controller' => 'Reports', 'action' => 'subDivisionLists']);
                }
            }
            $this->Flash->success(__('Sub - Division not updated successfully'));
            return $this->redirect(['controller' => 'Reports', 'action' => 'subDivisionLists']);
        }
    }

    public function dealerReport()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
        $groups = [13, 12, 31, 20];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $monthReport = [];

        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $yr = $request_data['year'];

            for ($iM = 1; $iM <= 12; $iM++) { // for month loop
                $dataNewDlr = $connection->execute("select id, count(id) as NewDealer from dealer_temps where dealership_types_id = '1' and YEAR(created) = $yr and MONTH(created)=$iM")->fetchAll('assoc');
                $dataRenwlDlr = $connection->execute("select id, count(id) as RenewalDealer from dealer_temps where dealership_types_id = '2' and YEAR(created) = $yr and MONTH(created)=$iM")->fetchAll('assoc');
                $dataCompnstelDlr = $connection->execute("select id, count(id) as CompansateDealer from dealer_temps where dealership_types_id = '3' and YEAR(created) = $yr and MONTH(created)=$iM")->fetchAll('assoc');
                $monthReport[$iM]['month'] = date("F", strtotime("$iM/12/10"));
                $monthReport[$iM]['monthId'] = $iM;
                $monthReport[$iM]['newDealer'] = $dataNewDlr[0]['NewDealer'];
                $monthReport[$iM]['renewalDealer'] = $dataRenwlDlr[0]['RenewalDealer'];
                $monthReport[$iM]['compansateDealer'] = $dataCompnstelDlr[0]['CompansateDealer'];
            };

        }
        $this->set(compact('monthReport', 'yr'));
    }

    public function dealerDataReport()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
        $groups = [13, 12, 31, 20];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
        $monthReport = [];

        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $yr = $request_data['yer'];
            $mntId = $request_data['mnthId'];
            $mnt = $request_data['mnth'];
            $dlrshp = $request_data['dlrShip'];

            $datas = $connection->execute("select id, name, ack_no, dealer_groups_id from dealer_temps where dealership_types_id = $dlrshp and YEAR(created) = $yr and MONTH(created)=$mntId")->fetchAll('assoc');
        }
        $this->set(compact('yr', 'mnt', 'dlrshp', 'datas'));
    }

    public function uidVerifications()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];

        $queryExc1 = $connection->execute("select rgi_block_code,name from secc_families where rgi_district_code = '$rgi_district_code'")->fetchAll('assoc');

//        $blockOnDistData = $connection->prepare("select rgi_block_code from block_cities where rgi_district_code = '?'");
//        $blockOnDistData->bindValue(1,$rgi_district_code);
//        $blockOnDistData->execute();
//        $blockOnDistDatas = $blockOnDistData->fetchAll('assoc');

        foreach ($queryExc1 as $vKey => $vVal) {
            $blocks[$vVal['rgi_block_code']] = $vVal['name'];
        }

        $queryExc2 = $connection->execute("select count(id) from secc_families where uid_varified!=1")->fetchAll('assoc');

//        echo "<pre>"; print_r($blocks); "<pre>"; die;

//        echo "select uid_verified from secc_families where rgi_block_code = '$blocks'"; die();
//        $uidData = $connection->prepare("select uid_verified from secc_families where rgi_block_code = '?'");
//        $uidData->bindValue(1,$blocks);
//        $uidData->execute();
//        $uidDatas = $uidData->fetchAll('assoc');
//        echo "<pre>"; print_r($uidDatas); "<pre>"; die;
        $this->set(compact('blocks','rgi_district_code','rgi_block_code'));
    }

    public function dealerOnBlock()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
//        $dealers = $this->getDealersBasedOnBlock($rgi_block_code);
//        echo "<pre>"; print_r($blocks); "<pre>"; die;

        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
            $blkCode = $data['rgi_blk_code'];  //die;

            $dealersData = TableRegistry::get('Dealers');
            $query = $dealersData->find('list', [
                'keyField' => 'id',
                'valueField' => 'name',
                'conditions' => ['Dealers.name=' . "'" . $blkCode . "'"]
            ]);
            $dealers = $query->toArray();
        }

        $this->set(compact('dealers','rgi_district_code'));
    }

    // Transaction Reoerts
    public function distTransactionDistributionReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $districtName = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $monthYr = '';
        $monthId = '';
        $yearId = '';
        $distCount = 0;
        $mnthYr = '';
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($data); "<pre>"; die;
            $mnthYr = $data['mnthYr'];
            if (array_key_exists('month_id', $data) && array_key_exists('year_id', $data)) {
                $monthId = $data['month_id'];
                $yearId = $data['year_id'];
            } else {
                $monthYr = $data['mnthYr'];

                $monthYr = explode('/', $monthYr);
//            echo "<pre>"; print_r($monthYr); "<pre>"; die;
                $month = $monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::get('Years');
                $query = $yearsData->find('list', [
                    'keyField' => 'name',
                    'valueField' => 'id',
                    'order' => 'name'
                ]);
                $years = $query->toArray();
                $yearId = $years[$year];

                // fetching months id from months table (key is in app controller)
                $monthsData = TableRegistry::get('Months');
                $query = $monthsData->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'id',
                    'order' => 'id'
                ]);
                $months = $query->toArray();
                $monthId = $months[substr($month, 1)];
            }

            $montId = $this->getRequest()->getSession()->write('mnthId', $monthId);
            $yerId = $this->getRequest()->getSession()->write('yrId', $yearId);


            $distCount = $connection->prepare("select rgi_district_code,name,nfsa_distribution,green_distribution,white_distribution,portable_within_district,portable_within_state,impds_in_jharkhand,impds_out_jharkhand,uid_distribution,otp_distribution,apwad_distribution from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
            $distCount->bindValue(1, $monthId);
            $distCount->bindValue(2, $yearId);
            $distCount->execute();
            $distCounts = $distCount->fetchAll('assoc');

//            echo "<pre>"; print_r($distCounts); "<pre>"; die;

        }
//        echo "<pre>"; print_r($districts); "<pre>"; die;
        $this->set(compact('districts', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'monthYr', 'monthId', 'yearId','distCount', 'mnthYr'));
    }

    public function blkTransactionDistributionReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $year_id = '';
        $month_id = '';
        $mnthYr = 0;
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $uRgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $uRgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($uRgi_district_code);
            $blockName = $this->getBlockName($uRgi_block_code);
        }

        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die();
            $rgi_district_code = $request_data['rgi_dist_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $mnthYr = $request_data['mnthYr'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);

            $blkAharReport = $connection->prepare("select rgi_block_code,name,nfsa_distribution,green_distribution,white_distribution,portable_within_district,portable_within_state,impds_in_jharkhand,impds_out_jharkhand,uid_distribution,otp_distribution,apwad_distribution from block_city_monthly_reports where rgi_district_code = ? and month_id = ? and year_id = ? group by rgi_block_code, name");
            $blkAharReport->bindValue(1, $rgi_district_code);
            $blkAharReport->bindValue(2, $month_id);
            $blkAharReport->bindValue(3, $year_id);
            $blkAharReport->execute();
            $blkAharReports = $blkAharReport->fetchAll('assoc');

//            echo "<pre>"; print_r($blkAharReports); "<pre>"; die();
        }
        $this->set(compact('blkAharReports','blocks', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'rgi_district_code', 'year_id', 'month_id','mnthYr'));
    }

    public function dlrTransactionDistributionReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $rgi_block_code = '';
        $year_id = '';
        $month_id = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $mnthYr = 0;
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);


        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $mnthYr = $request_data['mnthYr'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

//            echo "select dealer_id,rgi_block_code, name, uid_error_811_count,uid_member_811_count, uid_error_300_count, uid_member_300_count from dealer_monthly_reports where rgi_block_code = '$rgi_block_code'  group by dealer_id"; die;

            $uidErrCount = $connection->prepare("select dealer_id,name,dealerType,License_no,nfsa_distribution,green_distribution,white_distribution,portable_within_district,portable_within_state,impds_in_jharkhand,impds_out_jharkhand,uid_distribution,otp_distribution,apwad_distribution from dealer_monthly_reports where rgi_block_code =? and month_id = ? and year_id = ? group by dealer_id");
            $uidErrCount->bindValue(1, $rgi_block_code);
            $uidErrCount->bindValue(2, $month_id);
            $uidErrCount->bindValue(3, $year_id);
            $uidErrCount->execute();
            $dealerList = $uidErrCount->fetchAll('assoc');
            //echo "<pre>"; print_r($dealerList); "<pre>"; die;
        }
        $this->set(compact('dealerList','districts', 'dealerList', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'blocks', 'rgi_district_code', 'rgi_block_code', 'districtName', 'blockName', 'month_id', 'year_id','mnthYr'));
    }

    // Ahar Analytical Report
    public function distAharReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $districtName = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $monthYr = '';
        $monthId = '';
        $yearId = '';
        $distCount = 0;
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($data); "<pre>"; die;
            if (array_key_exists('month_id', $data) && array_key_exists('year_id', $data)) {
                $monthId = $data['month_id'];
                $yearId = $data['year_id'];
            } else {
                $monthYr = $data['mnthYr'];

                $monthYr = explode('/', $monthYr);
//            echo "<pre>"; print_r($monthYr); "<pre>"; die;
                $month = $monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::get('Years');
                $query = $yearsData->find('list', [
                    'keyField' => 'name',
                    'valueField' => 'id',
                    'order' => 'name'
                ]);
                $years = $query->toArray();
                $yearId = $years[$year];

                // fetching months id from months table (key is in app controller)
                $monthsData = TableRegistry::get('Months');
                $query = $monthsData->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'id',
                    'order' => 'id'
                ]);
                $months = $query->toArray();
                $monthId = $months[substr($month, 1)];
            }

            $montId = $this->getRequest()->getSession()->write('mnthId', $monthId);
            $yerId = $this->getRequest()->getSession()->write('yrId', $yearId);


            $distCount = $connection->prepare("select rgi_district_code,name,nfsa_distribution,green_distribution,white_distribution,portable_within_district,portable_within_state,impds_in_jharkhand,impds_out_jharkhand,uid_distribution,otp_distribution,apwad_distribution from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
            $distCount->bindValue(1, $monthId);
            $distCount->bindValue(2, $yearId);
            $distCount->execute();
            $distCounts = $distCount->fetchAll('assoc');

//            echo "<pre>"; print_r($distCounts); "<pre>"; die;

        }
//        echo "<pre>"; print_r($districts); "<pre>"; die;
        $this->set(compact('districts', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'monthYr', 'monthId', 'yearId','distCount'));
    }

    public function blkAharReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $year_id = '';
        $month_id = '';
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $uRgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $uRgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($uRgi_district_code);
            $blockName = $this->getBlockName($uRgi_block_code);

        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die();
            $rgi_district_code = $request_data['rgi_dist_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);

            $blkAharReport = $connection->prepare("select rgi_block_code,name,nfsa_distribution,green_distribution,white_distribution,portable_within_district,portable_within_state,impds_in_jharkhand,impds_out_jharkhand,uid_distribution,otp_distribution,apwad_distribution from block_city_monthly_reports where rgi_district_code = ? and month_id = ? and year_id = ? group by rgi_block_code, name");
            $blkAharReport->bindValue(1, $rgi_district_code);
            $blkAharReport->bindValue(2, $month_id);
            $blkAharReport->bindValue(3, $year_id);
            $blkAharReport->execute();
            $blkAharReports = $blkAharReport->fetchAll('assoc');

//            echo "<pre>"; print_r($blkAharReports); "<pre>"; die();
        }
        $this->set(compact('blkAharReports','blocks', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'rgi_district_code', 'year_id', 'month_id'));
    }

    public function dlrAharReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $rgi_block_code = '';
        $year_id = '';
        $month_id = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);


        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

//            echo "select dealer_id,rgi_block_code, name, uid_error_811_count,uid_member_811_count, uid_error_300_count, uid_member_300_count from dealer_monthly_reports where rgi_block_code = '$rgi_block_code'  group by dealer_id"; die;

            $uidErrCount = $connection->prepare("select dealer_id,name,dealerType,License_no,nfsa_distribution,green_distribution,white_distribution,portable_within_district,portable_within_state,impds_in_jharkhand,impds_out_jharkhand,uid_distribution,otp_distribution,apwad_distribution from dealer_monthly_reports where rgi_block_code =? and month_id = ? and year_id = ? group by dealer_id");
            $uidErrCount->bindValue(1, $rgi_block_code);
            $uidErrCount->bindValue(2, $month_id);
            $uidErrCount->bindValue(3, $year_id);
            $uidErrCount->execute();
            $dealerList = $uidErrCount->fetchAll('assoc');
            //echo "<pre>"; print_r($dealerList); "<pre>"; die;
        }
        $this->set(compact('dealerList','districts', 'dealerList', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'blocks', 'rgi_district_code', 'rgi_block_code', 'districtName', 'blockName', 'month_id', 'year_id'));
    }

    // Apwaad Transaction Reports
    public function distApwadReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $districtName = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $monthYr = '';
        $monthId = '';
        $yearId = '';
        $distCount = 0;
        $mnthYr = 0;
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
            //echo "<pre>"; print_r($data); "<pre>"; //die;
            $mnthYr = $data['mnthYr']; //die;
            if (array_key_exists('month_id', $data) && array_key_exists('year_id', $data)) {
                $monthId = $data['month_id'];
                $yearId = $data['year_id'];
            } else {
                $monthYr = $data['mnthYr'];

                $monthYr = explode('/', $monthYr);
//            echo "<pre>"; print_r($monthYr); "<pre>"; die;
                $month = $monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::get('Years');
                $query = $yearsData->find('list', [
                    'keyField' => 'name',
                    'valueField' => 'id',
                    'order' => 'name'
                ]);
                $years = $query->toArray();
                $yearId = $years[$year];

                // fetching months id from months table (key is in app controller)
                $monthsData = TableRegistry::get('Months');
                $query = $monthsData->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'id',
                    'order' => 'id'
                ]);
                $months = $query->toArray();
                $monthId = $months[substr($month, 1)];
            }

            $montId = $this->getRequest()->getSession()->write('mnthId', $monthId);
            $yerId = $this->getRequest()->getSession()->write('yrId', $yearId);


            $distCount = $connection->prepare("select rgi_district_code, name, apwaad_transaction_count, apwaad_pmgky_rice, apwaad_pmgky_wheat, apwaad_rice, apwaad_wheat, apwaad_sugar, apwaad_salt, apwaad_koil from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
            $distCount->bindValue(1, $monthId);
            $distCount->bindValue(2, $yearId);
            $distCount->execute();
            $distCounts = $distCount->fetchAll('assoc');

//            echo "<pre>"; print_r($distCounts); "<pre>"; die;

        }
//        echo "<pre>"; print_r($districts); "<pre>"; die;
        $this->set(compact('districts', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'monthYr', 'monthId', 'yearId','distCount', 'mnthYr'));
    }

    public function blkApwadReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $year_id = '';
        $month_id = '';
        $mnthYr = 0;
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $uRgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $uRgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($uRgi_district_code);
            $blockName = $this->getBlockName($uRgi_block_code);

        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die();
            $rgi_district_code = $request_data['rgi_dist_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $mnthYr = $request_data['mnthYr'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);

            $blkAharReport = $connection->prepare("select rgi_block_code, name, apwaad_transaction_count, apwaad_pmgky_rice, apwaad_pmgky_wheat, apwaad_rice, apwaad_wheat, apwaad_sugar, apwaad_salt, apwaad_koil from block_city_monthly_reports where rgi_district_code = ? and month_id = ? and year_id = ? group by rgi_block_code, name");
            $blkAharReport->bindValue(1, $rgi_district_code);
            $blkAharReport->bindValue(2, $month_id);
            $blkAharReport->bindValue(3, $year_id);
            $blkAharReport->execute();
            $blkAharReports = $blkAharReport->fetchAll('assoc');

//            echo "<pre>"; print_r($blkAharReports); "<pre>"; die();
        }
        $this->set(compact('blkAharReports','blocks', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'rgi_district_code', 'year_id', 'month_id','mnthYr'));
    }

    public function dlrApwadReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $rgi_block_code = '';
        $year_id = '';
        $month_id = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $mnthYr = 0;
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);


        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $mnthYr = $request_data['mnthYr'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

            $uidErrCount = $connection->prepare("select dealer_id, name, apwaad_transaction_count, apwaad_pmgky_rice, apwaad_pmgky_wheat, apwaad_rice, apwaad_wheat, apwaad_sugar, apwaad_salt, apwaad_koil from dealer_monthly_reports where rgi_block_code =? and month_id = ? and year_id = ? group by dealer_id");
            $uidErrCount->bindValue(1, $rgi_block_code);
            $uidErrCount->bindValue(2, $month_id);
            $uidErrCount->bindValue(3, $year_id);
            $uidErrCount->execute();
            $dealerList = $uidErrCount->fetchAll('assoc');
            //echo "<pre>"; print_r($dealerList); "<pre>"; die;
        }
        $this->set(compact('dealerList','districts', 'dealerList', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'blocks', 'rgi_district_code', 'rgi_block_code', 'districtName', 'blockName', 'month_id', 'year_id','mnthYr'));
    }

    // Analytical Transaction Count Reports
    public function distTransCountReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $districtName = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $monthYr = '';
        $monthId = '';
        $yearId = '';
        $distCount = 0;
        $mnthYr = 0;
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
            //echo "<pre>"; print_r($data); "<pre>"; //die;
            $mnthYr = $data['mnthYr']; //die;
            if (array_key_exists('month_id', $data) && array_key_exists('year_id', $data)) {
                $monthId = $data['month_id'];
                $yearId = $data['year_id'];
            } else {
                $monthYr = $data['mnthYr'];

                $monthYr = explode('/', $monthYr);
//            echo "<pre>"; print_r($monthYr); "<pre>"; die;
                $month = $monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::get('Years');
                $query = $yearsData->find('list', [
                    'keyField' => 'name',
                    'valueField' => 'id',
                    'order' => 'name'
                ]);
                $years = $query->toArray();
                $yearId = $years[$year];

                // fetching months id from months table (key is in app controller)
                $monthsData = TableRegistry::get('Months');
                $query = $monthsData->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'id',
                    'order' => 'id'
                ]);
                $months = $query->toArray();
                $monthId = $months[substr($month, 1)];
            }

            $montId = $this->getRequest()->getSession()->write('mnthId', $monthId);
            $yerId = $this->getRequest()->getSession()->write('yrId', $yearId);


            $distCount = $connection->prepare("select rgi_district_code, name, nfsa_distribution, white_distribution, green_distribution, portable_within_district, portable_within_state, impds_in_jharkhand, impds_out_jharkhand, uid_distribution, otp_distribution, apwad_distribution from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
            $distCount->bindValue(1, $monthId);
            $distCount->bindValue(2, $yearId);
            $distCount->execute();
            $distCounts = $distCount->fetchAll('assoc');

//            echo "<pre>"; print_r($distCounts); "<pre>"; die;

        }
//        echo "<pre>"; print_r($districts); "<pre>"; die;
        $this->set(compact('districts', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'monthYr', 'monthId', 'yearId','distCount', 'mnthYr'));
    }

    public function blkTransCountReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $year_id = '';
        $month_id = '';
        $mnthYr = 0;
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $uRgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $uRgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($uRgi_district_code);
            $blockName = $this->getBlockName($uRgi_block_code);

        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die();
            $rgi_district_code = $request_data['rgi_dist_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $mnthYr = $request_data['mnthYr'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);

            $blkAharReport = $connection->prepare("select rgi_block_code, name, nfsa_distribution, white_distribution, green_distribution, portable_within_district, portable_within_state, impds_in_jharkhand, impds_out_jharkhand, uid_distribution, otp_distribution, apwad_distribution from block_city_monthly_reports where rgi_district_code = ? and month_id = ? and year_id = ? group by rgi_block_code, name");
            $blkAharReport->bindValue(1, $rgi_district_code);
            $blkAharReport->bindValue(2, $month_id);
            $blkAharReport->bindValue(3, $year_id);
            $blkAharReport->execute();
            $blkAharReports = $blkAharReport->fetchAll('assoc');

//            echo "<pre>"; print_r($blkAharReports); "<pre>"; die();
        }
        $this->set(compact('blkAharReports','blocks', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'rgi_district_code', 'year_id', 'month_id','mnthYr'));
    }

    public function dlrTransCountReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $rgi_block_code = '';
        $year_id = '';
        $month_id = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $mnthYr = 0;
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);


        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $mnthYr = $request_data['mnthYr'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

            $uidErrCount = $connection->prepare("select dealer_id, name, nfsa_distribution, white_distribution, green_distribution, portable_within_district, portable_within_state, impds_in_jharkhand, impds_out_jharkhand, uid_distribution, otp_distribution, apwad_distribution from dealer_monthly_reports where rgi_block_code =? and month_id = ? and year_id = ? group by dealer_id");
            $uidErrCount->bindValue(1, $rgi_block_code);
            $uidErrCount->bindValue(2, $month_id);
            $uidErrCount->bindValue(3, $year_id);
            $uidErrCount->execute();
            $dealerList = $uidErrCount->fetchAll('assoc');
            //echo "<pre>"; print_r($dealerList); "<pre>"; die;
        }
        $this->set(compact('dealerList','districts', 'dealerList', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'blocks', 'rgi_district_code', 'rgi_block_code', 'districtName', 'blockName', 'month_id', 'year_id','mnthYr'));
    }

    // Analytical Transaction Count Reports
    public function distComoCountReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $districtName = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $monthYr = '';
        $monthId = '';
        $yearId = '';
        $commod = '';
        $distCount = 0;
        $mnthYr = 0;
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($data); "<pre>"; die;
            $mnthYr = $data['mnthYr']; //die;
            $commod = $data['comodity']; //die;
            if (array_key_exists('month_id', $data) && array_key_exists('year_id', $data)) {
                $monthId = $data['month_id'];
                $yearId = $data['year_id'];
            } else {
                $monthYr = $data['mnthYr'];

                $monthYr = explode('/', $monthYr);
//            echo "<pre>"; print_r($monthYr); "<pre>"; die;
                $month = $monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::get('Years');
                $query = $yearsData->find('list', [
                    'keyField' => 'name',
                    'valueField' => 'id',
                    'order' => 'name'
                ]);
                $years = $query->toArray();
                $yearId = $years[$year];

                // fetching months id from months table (key is in app controller)
                $monthsData = TableRegistry::get('Months');
                $query = $monthsData->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'id',
                    'order' => 'id'
                ]);
                $months = $query->toArray();
                $monthId = $months[substr($month, 1)];
            }

            $montId = $this->getRequest()->getSession()->write('mnthId', $monthId);
            $yerId = $this->getRequest()->getSession()->write('yrId', $yearId);

            if($commod == 1) {
                $distCount = $connection->prepare("select rgi_district_code, name, phHead , phMember , ph_rice_allocated , aayHead , aayMember ,  ph_rice_lifted , (ph_rice_allocated-ph_rice_lifted) as phRiceBalance , ph_wheat_allocated , ph_wheat_lifted , (ph_wheat_allocated-ph_wheat_lifted) as phWheatBalance , aay_rice_allocated , aay_rice_lifted , (aay_rice_allocated-aay_rice_lifted) as aayRiceBalance , aay_wheat_allocated , aay_wheat_lifted , (aay_wheat_allocated-aay_wheat_lifted) as aayWheatBalance from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
                $distCount->bindValue(1, $monthId);
                $distCount->bindValue(2, $yearId);
                $distCount->execute();
                $distCounts = $distCount->fetchAll('assoc');

//                echo "<pre>"; print_r($distCounts); "<pre>"; die;
            }
            else if($commod == 2) {
                $distCount = $connection->prepare("select rgi_district_code, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
                $distCount->bindValue(1, $monthId);
                $distCount->bindValue(2, $yearId);
                $distCount->execute();
                $distCounts = $distCount->fetchAll('assoc');
            }
            else if($commod == 3) {
                $distCount = $connection->prepare("select rgi_district_code, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
                $distCount->bindValue(1, $monthId);
                $distCount->bindValue(2, $yearId);
                $distCount->execute();
                $distCounts = $distCount->fetchAll('assoc');
            }
            else if($commod == 4) {
                $distCount = $connection->prepare("select rgi_district_code, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
                $distCount->bindValue(1, $monthId);
                $distCount->bindValue(2, $yearId);
                $distCount->execute();
                $distCounts = $distCount->fetchAll('assoc');
            }
            else if($commod == 5) {
                $distCount = $connection->prepare("select rgi_district_code, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from district_monthly_reports where month_id=? and year_id=? group by rgi_district_code, name");
                $distCount->bindValue(1, $monthId);
                $distCount->bindValue(2, $yearId);
                $distCount->execute();
                $distCounts = $distCount->fetchAll('assoc');
            }

//            echo "<pre>"; print_r($distCounts); "<pre>"; die;

        }
//        echo "<pre>"; print_r($districts); "<pre>"; die;
        $this->set(compact('districts', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'monthYr', 'monthId', 'yearId','distCount', 'mnthYr','commod'));
    }

    public function blkComoCountReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $year_id = '';
        $month_id = '';
        $commod='';
        $mnthYr = 0;
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $uRgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $uRgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($uRgi_district_code);
            $blockName = $this->getBlockName($uRgi_block_code);

        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die();
            $rgi_district_code = $request_data['rgi_dist_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $mnthYr = $request_data['mnthYr'];
            $commod = $request_data['comod'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);

            if($commod == 1) {
                $blkAharReport = $connection->prepare("select rgi_block_code, name, phHead , phMember , ph_rice_allocated , aayHead , aayMember ,  ph_rice_lifted , (ph_rice_allocated-ph_rice_lifted) as phRiceBalance , ph_wheat_allocated , ph_wheat_lifted , (ph_wheat_allocated-ph_wheat_lifted) as phWheatBalance , aay_rice_allocated , aay_rice_lifted , (aay_rice_allocated-aay_rice_lifted) as aayRiceBalance , aay_wheat_allocated , aay_wheat_lifted , (aay_wheat_allocated-aay_wheat_lifted) as aayWheatBalance from block_city_monthly_reports where rgi_district_code = ? and month_id = ? and year_id = ? group by rgi_block_code, name");
                $blkAharReport->bindValue(1, $rgi_district_code);
                $blkAharReport->bindValue(2, $month_id);
                $blkAharReport->bindValue(3, $year_id);
                $blkAharReport->execute();
                $blkAharReports = $blkAharReport->fetchAll('assoc');
            }
            else if($commod == 2) {
                $blkAharReport = $connection->prepare("select rgi_block_code, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from block_city_monthly_reports where rgi_district_code = ? and month_id = ? and year_id = ? group by rgi_block_code, name");
                $blkAharReport->bindValue(1, $rgi_district_code);
                $blkAharReport->bindValue(2, $month_id);
                $blkAharReport->bindValue(3, $year_id);
                $blkAharReport->execute();
                $blkAharReports = $blkAharReport->fetchAll('assoc');
            }
            else if($commod == 3) {
                $blkAharReport = $connection->prepare("select rgi_block_code, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from block_city_monthly_reports where rgi_district_code = ? and month_id = ? and year_id = ? group by rgi_block_code, name");
                $blkAharReport->bindValue(1, $rgi_district_code);
                $blkAharReport->bindValue(2, $month_id);
                $blkAharReport->bindValue(3, $year_id);
                $blkAharReport->execute();
                $blkAharReports = $blkAharReport->fetchAll('assoc');
            }
            else if($commod == 4) {
                $blkAharReport = $connection->prepare("select rgi_block_code, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from block_city_monthly_reports where rgi_district_code = ? and month_id = ? and year_id = ? group by rgi_block_code, name");
                $blkAharReport->bindValue(1, $rgi_district_code);
                $blkAharReport->bindValue(2, $month_id);
                $blkAharReport->bindValue(3, $year_id);
                $blkAharReport->execute();
                $blkAharReports = $blkAharReport->fetchAll('assoc');
            }
            else if($commod == 5) {
                $blkAharReport = $connection->prepare("select rgi_block_code, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from block_city_monthly_reports where rgi_district_code = ? and month_id = ? and year_id = ? group by rgi_block_code, name");
                $blkAharReport->bindValue(1, $rgi_district_code);
                $blkAharReport->bindValue(2, $month_id);
                $blkAharReport->bindValue(3, $year_id);
                $blkAharReport->execute();
                $blkAharReports = $blkAharReport->fetchAll('assoc');
            }

//            echo "<pre>"; print_r($blkAharReports); "<pre>"; die();
        }
        $this->set(compact('blkAharReports','blocks', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'districtName', 'rgi_district_code', 'year_id', 'month_id','mnthYr','commod'));
    }

    public function dlrComoCountReports()
    {
        $connection = ConnectionManager::get('default');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $rgi_block_code = '';
        $year_id = '';
        $month_id = '';
        $distRepo811 = '';
        $distRepo300 = '';
        $distRepoMem300 = '';
        $distRepoMem811 = '';
        $commod = '';
        $mnthYr = 0;
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];
        if (isset($session_data['Auth']) && !empty($session_data['Auth'])) {
            $user_id = $session_data['Auth']['User']['id'];
            $groupId = $session_data['Auth']['User']['group_id'];
            $rgi_district_code = $session_data['Auth']['User']['rgi_district_code'];
            $rgi_block_code = $session_data['Auth']['User']['rgi_block_code'];
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);


        }
        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $year_id = $request_data['year_id'];
            $month_id = $request_data['month_id'];
            $mnthYr = $request_data['mnthYr'];
            $commod = $request_data['comod'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

            if($commod == 1) {
                $uidErrCount = $connection->prepare("select dealer_id, name, phHead , phMember , ph_rice_allocated , aayHead , aayMember ,  ph_rice_lifted , (ph_rice_allocated-ph_rice_lifted) as phRiceBalance , ph_wheat_allocated , ph_wheat_lifted , (ph_wheat_allocated-ph_wheat_lifted) as phWheatBalance , aay_rice_allocated , aay_rice_lifted , (aay_rice_allocated-aay_rice_lifted) as aayRiceBalance , aay_wheat_allocated , aay_wheat_lifted , (aay_wheat_allocated-aay_wheat_lifted) as aayWheatBalance from dealer_monthly_reports where rgi_block_code =? and month_id = ? and year_id = ? group by dealer_id LIMIT 5");
            $uidErrCount->bindValue(1, $rgi_block_code);
            $uidErrCount->bindValue(2, $month_id);
            $uidErrCount->bindValue(3, $year_id);
            $uidErrCount->execute();
            $dealerList = $uidErrCount->fetchAll('assoc');
            }
            else if($commod == 2) {
                $uidErrCount = $connection->prepare("select dealer_id, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from dealer_monthly_reports where rgi_block_code =? and month_id = ? and year_id = ? group by dealer_id LIMIT 5");
            $uidErrCount->bindValue(1, $rgi_block_code);
            $uidErrCount->bindValue(2, $month_id);
            $uidErrCount->bindValue(3, $year_id);
            $uidErrCount->execute();
            $dealerList = $uidErrCount->fetchAll('assoc');
            }
            else if($commod == 3) {
                $uidErrCount = $connection->prepare("select dealer_id, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from dealer_monthly_reports where rgi_block_code =? and month_id = ? and year_id = ? group by dealer_id");
            $uidErrCount->bindValue(1, $rgi_block_code);
            $uidErrCount->bindValue(2, $month_id);
            $uidErrCount->bindValue(3, $year_id);
            $uidErrCount->execute();
            $dealerList = $uidErrCount->fetchAll('assoc');
            }
            else if($commod == 4) {
                $uidErrCount = $connection->prepare("select dealer_id, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from dealer_monthly_reports where rgi_block_code =? and month_id = ? and year_id = ? group by dealer_id");
            $uidErrCount->bindValue(1, $rgi_block_code);
            $uidErrCount->bindValue(2, $month_id);
            $uidErrCount->bindValue(3, $year_id);
            $uidErrCount->execute();
            $dealerList = $uidErrCount->fetchAll('assoc');
            }
            else if($commod == 5) {
                $uidErrCount = $connection->prepare("select dealer_id, name, ph_rice_lifted, ph_rice_allocated , aay_rice_lifted, aay_rice_allocated, ph_wheat_lifted, ph_wheat_allocated, aay_wheat_lifted, aay_wheat_allocated, grn_rice_allocated, grn_rice_lifted from dealer_monthly_reports where rgi_block_code =? and month_id = ? and year_id = ? group by dealer_id");
                $uidErrCount->bindValue(1, $rgi_block_code);
                $uidErrCount->bindValue(2, $month_id);
                $uidErrCount->bindValue(3, $year_id);
                $uidErrCount->execute();
                $dealerList = $uidErrCount->fetchAll('assoc');
            }

            //echo "<pre>"; print_r($dealerList); "<pre>"; die;
        }
        $this->set(compact('dealerList','districts', 'dealerList', 'distRepo811', 'distRepo300', 'distRepoMem300', 'distRepoMem811', 'blocks', 'rgi_district_code', 'rgi_block_code', 'districtName', 'blockName', 'month_id', 'year_id','mnthYr','commod'));
    }

}
