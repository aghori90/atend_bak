<?php

namespace App\Controller\BAckup;

use App\Controller\AppController;
use App\Controller\Exception;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

/**
 * CronJobs Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CronJobsController extends AppController
{

    // public $components = array('BarCode.BarCode');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function sendMessage(){
//        echo "ggg";die;
        $connection                     = ConnectionManager::get('default');
       /* $session_data                   = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        $user_id                        = $session_data['Auth']['User']['id'];
        $groupId                        = $session_data['Auth']['User']['group_id'];
        $rgi_district_code              = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code                 = $session_data['Auth']['User']['rgi_block_code'];
        $mobile                         = $session_data['Auth']['User']['c_no'];*/

        try{

            $districtData = TableRegistry::getTableLocator()->get('Districts')->find('all', array('fields'=>array('Districts.rgi_district_code','Districts.name'), 'order'=>'name', 'recursive'=>-1));
            $districts = array();
            foreach($districtData as $key => $value){
                $districts[$value['rgi_district_code']] = $value['name'];
            }
//            echo "<pre>"; print_r($districts); "<pre>"; die;

            $cardTypeName = "Green";
            if(!empty($districts)){
                foreach($districts as $dKey => $dVal){
//                    $districtId = $dKey;
                    $districtId     = '346';
                    $year_id        = 8;
                    $month          = "February";
                    $totalquantity  = 'balance';
                    $cardtype_id    = 8;
//                    $getRationQry = $connection->prepare("select rationcard_no,cardtype_id,month_id from cardholder_transaction_2_8_backups where rgi_district_code=? and cardtype_id=? and totalquantity=? limit 5");
//                    echo "select rationcard_no,cardtype_id,month_id from cardholder_transactions where rgi_district_code='355' and cardtype_id='8' and totalquantity='balance' limit 5";die;
                    $getRationQry = $connection->prepare("select rationcard_no,cardtype_id,month_id from cardholder_transactions where rgi_district_code=? and cardtype_id=? limit 10");
                    $getRationQry->bindValue(1, $districtId);
                    $getRationQry->bindValue(2, $cardtype_id);
//                    $getRationQry->bindValue(3, $totalquantity);
                    $getRationQry->execute();
                    $rsData = $getRationQry->fetchAll('assoc');
                    //echo "<pre>"; print_r($rsData); "<pre>"; die;

                    if(!empty($rsData)){
                        foreach ($rsData as $rKey => $rVal){
                            $rationNo   = $rVal['rationcard_no'];
                            $message    = '';// getOtp function me dekhke yha message rakhdo
                            $msg        = "";
                            $templateId = "";
                            $id         = Text::uuid();
                            $created    = date('Y-m-d H:i:s');
//                            $mobile = "9834148709";
                            $hof        = 1;

                            // get monile
                            $getMobileQry = $connection->prepare("select mobile from secc_families where rationcard_no=? and hof=? and mobile is not null limit 2");
//                            $getMobileQry = $connection->prepare("select mobile from secc_families where rationcard_no=? and mobile is not null limit 2");
                            $getMobileQry->bindValue(1, $rationNo);
                            $getMobileQry->bindValue(2, $hof);
                            $getMobileQry->execute();
                            $getMobile = $getMobileQry->fetchAll('assoc');
//                            echo "<pre>"; print_r($getMobile); "<pre>"; die;
                            if(!empty($getMobile)){
                                foreach($getMobile as $mKey => $mVal){
                                    $mobile = $mVal['mobile'];
//                                    $data = $this->sendSingleSMS($message, $mobile, $cardTypeName, $rationNo, $month);
                                    $send_flag = 1;
                                    $insQry = $connection->prepare("insert into sms_logs(id,msg,mobile,template_id,send_flag,created) values(?,?,?,?,?,?)");
                                    $insQry->bindValue(1, $id);
                                    $insQry->bindValue(2, $msg);
                                    $insQry->bindValue(3, $mobile);
                                    $insQry->bindValue(4, $templateId);
                                    $insQry->bindValue(5, $send_flag);
                                    $insQry->bindValue(6, $created);
                                    $ins = $insQry->execute();

//                                    echo "<pre>"; print_r(); "<pre>"; die;

                                    if($ins){
                                        echo "Message sent successfully";
                                    }else{
                                        return "Message not sent ";
                                    }
//                                    if($data == 1){
//                                        $send_flag = 1;
//                                        $insQry = $connection->prepare("insert into sms_logs(id,msg,mobile,template_id,send_flag,created) values(?,?,?,?,?,?,)");
//                                        $insQry->bindValue(1, $id);
//                                        $insQry->bindValue(2, $msg);
//                                        $insQry->bindValue(3, $mobile);
//                                        $insQry->bindValue(4, $templateId);
//                                        $insQry->bindValue(5, $send_flag);
//                                        $insQry->bindValue(6, $created);
//                                        $ins = $insQry->execute();
////                                        if($ins){
////                                            return "Message sent successfully";
////                                        }else{
////                                            return "Message not sent ";
////                                        }
//                                    }else{
//                                        $send_flag = 0;
//                                        $insQry = $connection->prepare("insert into sms_logs(id,msg,mobile,template_id,send_flag,created) values(?,?,?,?,?,?,)");
//                                        $insQry->bindValue(1, $id);
//                                        $insQry->bindValue(2, $msg);
//                                        $insQry->bindValue(3, $mobile);
//                                        $insQry->bindValue(4, $templateId);
//                                        $insQry->bindValue(5, $send_flag);
//                                        $insQry->bindValue(6, $created);
//                                        $ins = $insQry->execute();
////                                        if($ins){
////                                            return "Message Not sent successfully";
////                                        }else{
////                                            //return "Message not sent ";
////                                        }
//                                    }
                                }//die;
                            }
                        }
                    }else{

                    }
                }
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
        die;
    }

    public function testMessage(){
        $connection                     = ConnectionManager::get('default');
       /* $session_data                   = $this->getRequest()->getSession()->read();
        $user_id                        = $session_data['Auth']['User']['id'];
        $groupId                        = $session_data['Auth']['User']['group_id'];
        $rgi_district_code              = $session_data['Auth']['User']['rgi_district_code'];
        $rgi_block_code                 = $session_data['Auth']['User']['rgi_block_code'];*/
        // get monile
        $hof = 1;
        //$getMobileQry = $connection->prepare("select mobile,rationcard_no from secc_families where rationcard_no=? and hof=? and mobile is not null limit 10");
        $getMobileQry = $connection->prepare("select mobile,rationcard_no from secc_families where hof=? and mobile is not null limit 10");
//        $getMobileQry->bindValue(1, $rationNo);
        $getMobileQry->bindValue(1, $hof);
        $getMobileQry->execute();
        $getMobile = $getMobileQry->fetchAll('assoc');
//        echo "<pre>"; print_r($getMobile); "<pre>"; die;
        if(!empty($getMobile)){
            foreach($getMobile as $mKey => $mVal){
                $id             = Text::uuid();
                $templateId     = "1302156645748113019";
                $mobile         = $mVal['mobile'];
//                $mobile = '9834148709';
                $rationNo       = $mVal['rationcard_no'];
                $month          = "February";
                $cardTypeName   = "Green";
                $message        = '';
                $currYr         = date('Y');
                $currMonth      = date('m');
                $lastDate       = cal_days_in_month(CAL_GREGORIAN, $currMonth, $currYr);
                $date           = $lastDate.'/'.$currMonth.'/'.$currYr;
                $created        = date('Y-m-d H:i:s');
                $msg            = " प्रिये ".$cardTypeName." कार्ड धारक : ".$rationNo." , ".$month." का राशन ".$date." तक उठा लें | कोई शिकायत टाल फ्री नंबर 1967 पर दर्ज कराये | JHPDS";
//                $data           = $this->sendSingleSMS($message, $mobile, $cardTypeName, $rationNo, $month);
//                echo $data;die;
//                if($data){ //echo "if";die;
                    $send_flag = 1;
                    $insQry = $connection->prepare("insert into sms_logs(id,msg,mobile,template_id,send_flag,created) values(?,?,?,?,?,?)");
                    $insQry->bindValue(1, $id);
                    $insQry->bindValue(2, $msg);
                    $insQry->bindValue(3, $mobile);
                    $insQry->bindValue(4, $templateId);
                    $insQry->bindValue(5, $send_flag);
                    $insQry->bindValue(6, $created);
                    $ins = $insQry->execute();

                    if($ins){
                        echo "Message sent successfully";die;
                    }else{
                        return "Message not sent ";
                    }

//                }else{ //echo "else";die;
                    $send_flag = 0;
                    $insQry = $connection->prepare("insert into sms_logs(id,msg,mobile,template_id,send_flag,created) values(?,?,?,?,?,?)");
                    $insQry->bindValue(1, $id);
                    $insQry->bindValue(2, $msg);
                    $insQry->bindValue(3, $mobile);
                    $insQry->bindValue(4, $templateId);
                    $insQry->bindValue(5, $send_flag);
                    $insQry->bindValue(6, $created);
                    $ins = $insQry->execute();
                    if($ins){
                        echo "Message Not sent successfully";die;
                    }else{
                        //return "Message not sent ";
                    }
//                }
            }
        }
    }



}
