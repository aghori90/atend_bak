<?php

namespace App\Controller\BAckup;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use PDOException;
use function App\Controller\count;


/**
 * JsfssDistrictReports Controller
 *
 * @property \App\Model\Table\JsfssDistrictReportsTable $JsfssDistrictReports
 *
 * @method \App\Model\Entity\JsfssDistrictReport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JsfssDistrictReportsController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['updateFamilyidErcmsLogs', 'reupdateFamilyidErcmsLogs', 'updateRationcardErcmsLogs', 'updateHhdercmsMapping', 'updateSeccFamilies', 'update_backups', 'insertHof', 'greenRequestBackup', 'checkBlcVill', 'updateBlock', 'villageWiseCron1', 'updateRejectedAckNo', 'jsfssBlockreportBackup', 'jsfssVillagereportBackup', 'jsfssDistrictreportBackup', 'insertFamilyAddTempBackups', 'insertCardholderBackups', 'test', 'hhdErcmsPendingNewsBackup', 'villageWiseCron', 'updatereport', 'updateCardholderCount', 'deleteHdErcms', 'updateHhdErcmsHof', 'dealerWiseGreencardReportCron', 'correctData', 'updateRgivillagecode', 'testMessage', 'dealerSms', 'dealerSaltSugarSms', 'depotStockOutInsertSms', 'depotStockOutSendSms', 'transactionSms', 'fpsStockGreenInsert', 'fpsStockGreenUpdate', 'fpsStockGreenInsertByDealer', 'greenNotLiftedUpdate']);
    }


    function reportsHome()
    {
        $this->viewBuilder()->setLayout('report');
    }


    function dealerSms()
    {

        $connection = ConnectionManager::get('default');

        $month_id = '6';
        $year_id = '8';

        $sql1 = "select distinct dealer_id from fps_allocations where  month_id='$month_id' and year_id='$year_id' and (item_id='1' or item_id='2') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms=0";
        //echo '</br>'.$sql1 ;
        $sql1_exe = $connection->execute($sql1);
        $data1 = $sql1_exe->fetchAll('assoc');
        foreach ($data1 as $val1) {
            $dealer_id = $val1['dealer_id'];

            $sql2 = "select count(*) as count from fps_allocations where dealer_id='$dealer_id' and month_id='$month_id' and year_id='$year_id' and (item_id='1' or item_id='2') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms='0'";
            $sql2_exe = $connection->execute($sql2);

            $sql3 = "select count(*)  as count from fps_allocations where dealer_id='$dealer_id' and month_id='$month_id' and year_id='$year_id' and (item_id='1' or item_id='2') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms='0' and sio_no is not null";
            $sql3_exe = $connection->execute($sql3);

            if ($sql2_exe && $sql3_exe) {
                $data2 = $sql2_exe->fetch('assoc');
                $data3 = $sql3_exe->fetch('assoc');

                $row_count2 = $data2['count'];
                $row_count3 = $data3['count'];
                //echo '<br/>rowcount2 = '.$row_count2.' row_count3 = '.$row_count3;

                if ($row_count2 > 0 && $row_count3 > 0 && ($row_count2 == $row_count3)) {
                    $sql4 = "select item_id,quantity,sentSms,cardtype_id from fps_allocations where dealer_id='$dealer_id' and month_id='$month_id' and year_id='$year_id' and (item_id='1' or item_id='2') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms='0'";
                    //echo '</br>'.$sql4;
                    $sql4_exe = $connection->execute($sql4);
                    if ($sql4_exe) {
                        $data4 = $sql4_exe->fetchAll('assoc');
                        $aay_wheat = 0;
                        $aay_rice = 0;
                        $phh_wheat = 0;
                        $phh_rice = 0;
                        foreach ($data4 as $val4) {
                            $cardtype_id = $val4['cardtype_id'];
                            $item_id = $val4['item_id'];
                            $quantity = $val4['quantity'];

                            if ($cardtype_id == '5') { //PHH
                                if ($item_id == '1') { //rice
                                    $phh_rice = $quantity;
                                } elseif ($item_id == '2') { //wheat
                                    $phh_wheat = $quantity;
                                }
                            }
                            if ($cardtype_id == 6) { //AAY
                                if ($item_id == '1') { //rice
                                    $aay_rice = $quantity;
                                } elseif ($item_id == '2') { //wheat
                                    $aay_wheat = $quantity;
                                }
                            }
                        }
                        $msg = 'प्रिय उचित मूल्य प्रणाली के दुकानदार आपका माह May हेतु ';
                        if ($aay_rice >= 0) {
                            $msg .= $aay_rice . " किग्रा AAY चावल / ";
                        }
                        if ($aay_wheat >= 0) {
                            $msg .= $aay_wheat . " किग्रा AAY गेहु  / ";
                        }
                        if ($phh_rice >= 0) {
                            $msg .= $phh_rice . " किग्रा PHH चावल / ";
                        }
                        if ($phh_wheat >= 0) {
                            $msg .= $phh_wheat . " किग्रा PHH गेहू ";
                        }
                        rtrim($msg, "/");
                        $msg .= "का भण्डार निर्गमन आदेश जारी किया गया है | कोई शिकायत होने पर संबंधित BSO/MO को सूचित करें | JHPDS";

                        $sql5 = "select mobile from dealers where id='$dealer_id'";
                        $sql5_exe = $connection->execute($sql5);
                        if ($sql5_exe) {
                            $data5 = $sql5_exe->fetch('assoc');
                            $mobile_no = $data5['mobile'];
                            if ($mobile_no != '') {
                                $sms_return = $this->sendSingleUnicode($msg, $mobile_no, 6);
                                echo $mobile_no . ' - ' . $dealer_id . '</br/>';
                                //print_r($sms_return);
                                $connection->begin();
                                $sql6 = "update fps_allocations set sentSms='1' where dealer_id='$dealer_id' and month_id='$month_id' and year_id='$year_id' and (item_id='1' or item_id='2') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms='0' and sio_no is not null;";
                                $sql6_exe = $connection->execute($sql6);
                                $sql7 = "update sms_reports set dealer_rice_wheat_sms=dealer_rice_wheat_sms+1";
                                $sql7_exe = $connection->execute($sql7);
                                $connection->commit();
                            }
                        }
                    }
                }
            }
        }
        die;
    }

    function dealerSaltSugarSms()
    {
        //Configure::write('debug','true');
        $connection = ConnectionManager::get('default');

        $month_id = '6';
        $year_id = '8';

        $sql1 = "select distinct dealer_id from fps_allocations where  month_id='$month_id' and year_id='$year_id' and (item_id='4' or item_id='5') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms='0'";
        //echo '</br>'.$sql1 ;
        $sql1_exe = $connection->execute($sql1);
        $data1 = $sql1_exe->fetchAll('assoc');
        foreach ($data1 as $val1) {
            $dealer_id = $val1['dealer_id'];

            $sql2 = "select count(*) as count from fps_allocations where dealer_id='$dealer_id' and month_id='$month_id' and year_id='$year_id' and (item_id='4' or item_id='5') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms='0'";
            $sql2_exe = $connection->execute($sql2);

            $sql3 = "select count(*)  as count from fps_allocations where dealer_id='$dealer_id' and month_id='$month_id' and year_id='$year_id' and (item_id='4' or item_id='5') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms='0' and sio_no is not null";
            $sql3_exe = $connection->execute($sql3);

            if ($sql2_exe && $sql3_exe) {
                $data2 = $sql2_exe->fetch('assoc');
                $data3 = $sql3_exe->fetch('assoc');

                $row_count2 = $data2['count'];
                $row_count3 = $data3['count'];
                //echo '<br/>rowcount2 = '.$row_count2.' row_count3 = '.$row_count3;

                if ($row_count2 > 0 && $row_count3 > 0 && ($row_count2 == $row_count3)) {
                    $sql4 = "select item_id,quantity,sentSms,cardtype_id from fps_allocations where dealer_id='$dealer_id' and month_id='$month_id' and year_id='$year_id' and (item_id='4' or item_id='5') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms='0'";
                    //echo '</br>'.$sql4;
                    $sql4_exe = $connection->execute($sql4);
                    if ($sql4_exe) {
                        $data4 = $sql4_exe->fetchAll('assoc');
                        $aay_salt = 0;
                        $aay_sugar = 0;
                        $phh_salt = 0;
                        $phh_sugar = 0;
                        foreach ($data4 as $val4) {
                            $cardtype_id = $val4['cardtype_id'];
                            $item_id = $val4['item_id'];
                            $quantity = $val4['quantity'];

                            if ($cardtype_id == '5') { //PHH
                                if ($item_id == '4') { //salt
                                    $phh_salt = $quantity;
                                } elseif ($item_id == '5') { //sugar
                                    $phh_sugar = $quantity;
                                }
                            }
                            if ($cardtype_id == 6) { //AAY
                                if ($item_id == '4') { //salt
                                    $aay_salt = $quantity;
                                } elseif ($item_id == '5') { //sugar
                                    $aay_sugar = $quantity;
                                }
                            }
                        }
                        $msg = 'प्रिय उचित मूल्य प्रणाली के दुकानदार आपका माह May हेतु ';
                        if ($aay_salt >= 0) {
                            $msg .= $aay_salt . " किग्रा AAY नमक एवं  ";
                        }
                        if ($aay_sugar >= 0) {
                            $msg .= $aay_sugar . " किग्रा चीनी /  ";
                        }
                        if ($phh_salt >= 0) {
                            $msg .= $phh_salt . " किग्रा PHH नमक ";
                        }
                        // if ($phh_sugar >= 0) {
                        // 	$msg .= $phh_sugar . " किग्रा PHH चीनी ";
                        // }
                        rtrim($msg, "/");
                        $msg .= "का भण्डार निर्गमन आदेश जारी किया गया है | कोई शिकायत होने पर संबंधित BSO/MO को सूचित करे| JHPDS";

                        $sql5 = "select mobile from dealers where id='$dealer_id'";
                        $sql5_exe = $connection->execute($sql5);
                        if ($sql5_exe) {
                            $data5 = $sql5_exe->fetch('assoc');
                            $mobile_no = $data5['mobile'];
                            //$mobile_no = '9162845910';
                            if ($mobile_no != '') {
                                $sms_return = $this->sendSingleUnicode($msg, $mobile_no, 7);
                                echo $mobile_no . ' - ' . $msg . '</br/>';
                                //print_r($sms_return);
                                $connection->begin();
                                $sql6 = "update fps_allocations set sentSms='1' where dealer_id='$dealer_id' and month_id='$month_id' and year_id='$year_id' and (item_id='4' or item_id='5') and (cardtype_id='5' or cardtype_id='6') and quantity>0 and sentSms='0' and sio_no is not null;";
                                $sql6_exe = $connection->execute($sql6);
                                $sql7 = "update sms_reports set dealer_salt_sugar_sms=dealer_salt_sugar_sms+1";
                                $sql7_exe = $connection->execute($sql7);
                                $connection->commit();
                            }
                        }
                    }
                }
            }
        }
        die;
    }

    function depotStockOutInsertSms()
    {
        die;
        //Configure::write('debug','true');
        $connection = ConnectionManager::get('default');

        $month_id = '6';
        $year_id = '8';

        $sql1 = "select distinct dealer_id from depot_stock_outs where  month_id='$month_id' and year_id='$year_id' and (item_id='1' or item_id='3' or item_id='4' or item_id='5') and (cardtype_id='5' or cardtype_id='6') and quantity>0 ";
        //echo '</br>'.$sql1 ;
        $sql1_exe = $connection->execute($sql1);
        $data1 = $sql1_exe->fetchAll('assoc');
        foreach ($data1 as $val1) {
            $dealer_id = $val1['dealer_id'];

            $sql2 = "select rationcard_no,mobile,cardtype_id from secc_families where dealer_id='$dealer_id' and mobile is not null and mobile<>'0' and length(mobile)=10 and rationcard_no not in (select distinct rationcard_no from depot_stock_out_sms)";
            //echo '</br>'.$sql2 ;
            $sql2_exe = $connection->execute($sql2);
            if ($sql2_exe) {
                $data2 = $sql2_exe->fetchAll('assoc');
                foreach ($data2 as $val2) {
                    $cardtype_id = $val2['cardtype_id'];
                    $rationcard_no = $val2['rationcard_no'];
                    $mobile = $val2['mobile'];

                    $sql3 = "select item_id,policy_quantity,based_on from fps_allocations where month_id='$month_id' and year_id='$year_id' and (item_id='1' or item_id='3' or item_id='4' or item_id='5') and dealer_id='$dealer_id' and cardtype_id='$cardtype_id' and quantity>0";
                    //echo '</br>'.$sql3 ;
                    $sql3_exe = $connection->execute($sql3);
                    if ($sql3_exe) {
                        $data3 = $sql3_exe->fetchAll('assoc');
                        $values = '';
                        foreach ($data3 as $val3) {
                            $item_id = $val3['item_id'];
                            $quantity = $val3['policy_quantity'];
                            $based_on = $val3['based_on'];

                            $values .= "('$dealer_id', '$cardtype_id', '$rationcard_no', '$mobile', '$item_id', '$quantity', '$based_on', '0'),";
                        }

                        $values = rtrim($values, ',');

                        $sql4 = "insert into depot_stock_out_sms (dealer_id,cardtype_id,rationcard_no,mobile,item_id,quantity,based_on,sentSms)values " . $values;
                        //echo '</br>'.$sql4 ;
                        $sql4_exe = $connection->execute($sql4);
                    }
                }
            }
        }
        die;
    }

    function depotStockOutSendSms()
    {
        die;
        //Configure::write('debug','true');
        $connection = ConnectionManager::get('default');

        $sql1 = "select id,cardtype_id,mobile,item_id,quantity,based_on from depot_stock_out_sms where sentSms = 0 limit 3000";
        echo '</br>' . $sql1;
        $sql1_exe = $connection->execute($sql1);
        $data1 = $sql1_exe->fetchAll('assoc');

        foreach ($data1 as $val1) {
            $id = $val1['id'];
            $cardtype_id = $val1['cardtype_id'];
            $mobile = $val1['mobile'];
            $item_id = $val1['item_id'];
            $quantity = $val1['quantity'];
            $based_on = $val1['based_on'];

            $msg = "प्रिय  ";
            if ($cardtype_id == '5') {
                $msg .= "PHH";
            } else if ($cardtype_id == '6') {
                $msg .= "AAY";
            }
            if ($item_id == '1') {
                if ($cardtype_id == '5') {
                    $quantity = "5.00";
                } else if ($cardtype_id == '6') {
                    $quantity = "35.00";
                }
            }
            $msg .= " कार्डधारी आपका राशन दुकान में आ गया है |  " . $quantity;
            if ($item_id == '1') {
                $msg .= " किग्रा चावल-गेहूँ /";
            }
            // else if($item_id == '2'){
            // 	$msg.= " किग्रा  गेहु /";
            // }
            else if ($item_id == '3') {
                $msg .= " लीटर किरासन-तेल /";
            } else if ($item_id == '4') {
                $msg .= " किग्रा नमक/";
            } else if ($item_id == '5') {
                $msg .= " किग्रा चीनी /";
            }

            if ($based_on == '1') {
                $msg .= "कार्ड ";
            } else if ($based_on == '2') {
                $msg .= "सदस्य";
            }

            $msg .= " | कृपया अपने पड़ोसियों को भी सूचित कर दे | कोई शिकायत टाल-फ्री नम्बर 1967 पर दर्ज करायें | JHPDS";

            //$mobile = '9162845910';
            if ($mobile != '') {
                $sms_return = $this->sendSingleUnicode($msg, $mobile, 8);
                echo '</br/>' . $mobile . ' - ' . $msg . '</br/>';
                $connection->begin();
                echo $sql2 = "update depot_stock_out_sms set sentSms='1' where id='$id' and sentSms=0";
                $sql2_exe = $connection->execute($sql2);
                echo "<br />";
                echo $sql3 = "update sms_reports set depot_stock_out_sms=depot_stock_out_sms+1";
                $sql3_exe = $connection->execute($sql3);
                $connection->commit();
            }
        }
        die;
    }

    function transactionSms()
    {
        //Configure::write('debug','true');
        $connection = ConnectionManager::get('dbRationHHD');
        $connection_default = ConnectionManager::get('default');

        $sql1 = "select distinct invoice_no,dateoftransaction,rationcard_no from
		transaction_6_8_backups where invoice_no!='' and sendSms=0 order by rationcard_no limit 3000";
        //echo $sql1.'<br/>';
        $sql1_exe = $connection->execute($sql1);
        $data1 = $sql1_exe->fetchAll('assoc');
        foreach ($data1 as $val1) {
            $invoice_no = $val1['invoice_no'];
            $dateoftransaction = date('d-m-Y', strtotime($val1['dateoftransaction']));
            $rationcard_no = $val1['rationcard_no'];

            echo $sql2 = "select item_id,liftedquantity from transaction_6_8_backups where invoice_no = '$invoice_no' order by item_id";
            $sql2_exe = $connection->execute($sql2);

            if ($sql2_exe) {
                $data2 = $sql2_exe->fetchAll('assoc');

                $riceLifted = 0;
                $wheatLifted = 0;
                $koilLifted = 0;
                $saltLifted = 0;
                $sugarLifted = 0;
                foreach ($data2 as $val2) {
                    $item_id = $val2['item_id'];
                    if ($item_id == 1) {
                        $riceLifted = $val2['liftedquantity'];
                    } else if ($item_id == 2) {
                        $wheatLifted = $val2['liftedquantity'];
                    } else if ($item_id == 3) {
                        $koilLifted = $val2['liftedquantity'];
                    } else if ($item_id == 4) {
                        $saltLifted = $val2['liftedquantity'];
                    } else if ($item_id == 5) {
                        $sugarLifted = $val2['liftedquantity'];
                    }
                }
                if ($riceLifted > 0 || $wheatLifted > 0 || $koilLifted > 0 || $saltLifted > 0 || $sugarLifted > 0) {
                    $sql3 = "select mobile from secc_families where rationcard_no='$rationcard_no' and length(mobile)=10 ";
                    $sql3_exe = $connection->execute($sql3);
                    if ($sql3_exe) {
                        $data3 = $sql3_exe->fetch('assoc');
                        $mobile_no = $data3['mobile'];
                        $message = "आपके द्वारा कुल " . $riceLifted . " किग्रा चावल / " . $wheatLifted . " किग्रा गेहूं / " . $saltLifted . " किग्रा नमक / " . $sugarLifted . "   किग्रा चीनी / " . $koilLifted . " लीटर केरोसिन तेल का उठाव दिनांक " . $dateoftransaction . " को किया गया | कोई शिकायत टाल-फ्री नम्बर 1967 पर दर्ज कराये | JHPDS";
                        if ($mobile_no != '') {
                            //$mobile_no = '9162845910';
                            $sms_return = $this->sendSingleUnicode($message, $mobile_no, 9);
                            echo '</br/>' . $mobile_no . ' - ' . $message . '</br/>';
                            //echo $sms_return;
                            $sms_return = 'true';
                            if ($sms_return) {
                                echo $sql4 = "update transaction_6_8_backups set  sendSms=1 where invoice_no='$invoice_no'";
                                $sql4_exe = $connection->execute($sql4);
                                echo "<br />";
                                echo $sql5 = "update sms_reports set ben_transaction_sms=ben_transaction_sms+1";
                                $sql5_exe = $connection_default->execute($sql5);
                                echo "<br />";
                            }
                        }
                    }
                }
            }
        }
        die;
    }


    function checksms($message, $mobile, $template)
    {

        $this->sendSingleSMS($message, $mobile, $template);
    }

    function fpsStockGreenInsertByDealer()
    {
        Configure::write('debug', 'true');
        $month_id = '2';
        $year_id = '8';
        $table_dealer = "hhd_" . $month_id . "_" . $year_id . "_dealers";
        $datetime = date('Y-m-d H:i:s');
        $connection = ConnectionManager::get('dbRationHHD'); //HHD db object

        $data1 = ['56c6cdf3-2f88-4692-acee-4456c0a80129', '4f0b6064-b998-4f51-af4d-0b90c0a80101', '4f13d2ee-f93c-481e-ba24-02d40a86e903', '4f0fcfb9-e290-44a4-9d7a-0ff00a86c10e', '51403063-a3e4-47a5-b08d-13140a5c4c1b', '518a0ef8-8a9c-4634-8e67-0d400a865904', '518ca1f2-cd30-41b4-a814-0d400a865904', '4f9663ba-0934-4213-9a0a-127cc0a80102', '52fef27f-1e98-493e-a703-4054c0a8010b', '4f325540-bc74-4c76-86b8-09ec743a5ac4', '4f3351ea-a2a8-43f5-b701-0e04743a5ac4', '4f3351ea-a2a8-43f5-b701-0e04743a5ac4', '4f448dc0-7c4c-4ae6-ba68-0c70743a5ac4'];
        foreach ($data1 as $val1) {
            $dealer_id = $val1;

            $connection->begin();
            $sql1 = "insert into fps_stocks_greens (dealer_id,active,wheat_frinze,month_id,year_id,district_id,rgi_district_code,block_city_id,rgi_block_code,depot_master_id,item_id,cardtype_id,dealerType,modified,created)select id,active,wheat_frinze,$month_id,$year_id,district_id,rgi_district_code,block_city_id,rgi_block_code,depot_master_id,1,8,dealerType,'$datetime','$datetime' from $table_dealer where id='$dealer_id'";
            $sql1_exe = $connection->execute($sql1);

            $sql2 = "insert into fps_stocks_greens (dealer_id,active,wheat_frinze,month_id,year_id,district_id,rgi_district_code,block_city_id,rgi_block_code,depot_master_id,item_id,cardtype_id,dealerType,modified,created)select id,active,wheat_frinze,$month_id,$year_id,district_id,rgi_district_code,block_city_id,rgi_block_code,depot_master_id,3,8,dealerType,'$datetime','$datetime' from $table_dealer  where id='$dealer_id' ";
            $sql2_exe = $connection->execute($sql2);
            $connection->commit();
        }

        die('stockinsert');
    }


    function fpsStockGreenInsert($rgi_district_code = null, $month_id = null, $year_id = null)
    {
        Configure::write('debug', 'true');
        $month_id = '4';
        $year_id = '8';
        $table_dealer = "hhd_" . $month_id . "_" . $year_id . "_dealers";
        $datetime = date('Y-m-d H:i:s');
        $connection = ConnectionManager::get('dbRationHHD'); //HHD db object

        $connection->begin();
        $sql1 = "insert into fps_stocks_greens (dealer_id,active,wheat_frinze,month_id,year_id,district_id,rgi_district_code,block_city_id,rgi_block_code,depot_master_id,item_id,cardtype_id,dealerType,modified,created)select id,active,wheat_frinze,$month_id,$year_id,district_id,rgi_district_code,block_city_id,rgi_block_code,depot_master_id,1,8,dealerType,'$datetime','$datetime' from $table_dealer where rgi_district_code='$rgi_district_code'";
        $sql1_exe = $connection->execute($sql1);

        $sql2 = "insert into fps_stocks_greens (dealer_id,active,wheat_frinze,month_id,year_id,district_id,rgi_district_code,block_city_id,rgi_block_code,depot_master_id,item_id,cardtype_id,dealerType,modified,created)select id,active,wheat_frinze,$month_id,$year_id,district_id,rgi_district_code,block_city_id,rgi_block_code,depot_master_id,3,8,dealerType,'$datetime','$datetime' from $table_dealer where rgi_district_code='$rgi_district_code'";
        $sql2_exe = $connection->execute($sql2);
        $connection->commit();
        die('stockinsert');
    }

    function fpsStockGreenUpdate($rgi_district_code = null, $month_id = null, $year_id = null)
    {
        $month_id = '4';
        $year_id = '8';
        $table = "transaction_" . $month_id . "_" . $year_id . "_backups";
        if (!empty($rgi_district_code)) {
            $connection = ConnectionManager::get('dbRationHHD'); //HHD db object
            //$sql="select dealer_id,cardtype_id,item_id,sum(presentMonthQuantity) as quantity from transaction_1_7_backups group by dealer_id,cardtype_id,item_id";
            $sql1 = "select dealer_id,cardtype_id,item_id,sum(liftedQuantity) as quantity from $table where month_id='$month_id' and year_id='$year_id' and cardtype_id='8'  and (dealer_id!='' or dealer_id is not null) and rgi_district_code='$rgi_district_code'  group by dealer_id,cardtype_id,item_id";
            $sql1_exe = $connection->execute($sql1);
            if ($sql1_exe) {
                $data1 = $sql1_exe->fetchAll('assoc');
                foreach ($data1 as $val1) {
                    $connection->begin();
                    $dealer_id = $val1['dealer_id'];
                    $item_id = $val1['item_id'];
                    $cardtype_id = $val1['cardtype_id'];
                    $quantity = $val1['quantity'];

                    $sql2 = "update fps_stocks_greens set ct_commodity_sold='$quantity' where dealer_id='$dealer_id' and cardtype_id='$cardtype_id' and item_id='$item_id' and  month_id='$month_id' and year_id='$year_id'";
                    $sql2_exe = $connection->execute($sql2);
                    $affected_rows = $sql2_exe->rowCount();
                    if ($affected_rows <= 0) {
                        echo $dealer_id . ',<br/>' . $sql2 . '</br>';
                    }

                    $connection->commit();
                }
            }
        }
        die("stockupdate");
    }


    function updateGreenToNfsaCount()
    {
        $connection = ConnectionManager::get('default');
        $sql1 = "select rgi_district_code,count(*) as green_to_nfsa_head,sum(family_count) as green_to_nfsa_member from green_to_nfsa_ercms_logs group by rgi_district_code";
        $results1 = $connection->execute($sql1)->fetchAll('assoc');
        foreach ($results1 as $var) {
            $rgi_district_code = $var['rgi_district_code'];
            $green_to_nfsa_head = $var['green_to_nfsa_head'];
            $green_to_nfsa_member = $var['green_to_nfsa_member'];
            $connection->begin();
            $update_sql1 = "UPDATE jsfss_district_reports SET greenToNfsaHeadCount = '$green_to_nfsa_head',greenToNfsaMemberCount = '$green_to_nfsa_member' WHERE rgi_district_code = '$rgi_district_code'";
            $update_exe1 = $connection->execute($update_sql1);
            $connection->commit();
        }
        die;
    }


    function greenNotLiftedReport()
    {
        //die("Record Updation going on..");
        if ($this->request->getSession()->check('Auth')) {
            $user_id = $this->request->getSession()->read('Auth.User.id');
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
        } else {
            return $this->redirect($this->Auth->logout());
        }

        //if($user_id =='8672'){Configure::write('debug', 'true');}
        if ($group_id == 12 || $group_id == 13) {
            $this->viewBuilder()->setLayout('report');

            $month_year = date('m-Y', strtotime('-1 month'));
            //$month_year 		= $this->getRequest()->getData('month_year');
            $monthYr = explode('-', $month_year);
            $month = (int)$monthYr[0];
            $year = $monthYr[1];

            $yearsData = TableRegistry::getTableLocator()->get('Years')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['name' => $year]])->first();
            $yearId = $yearsData->id;
            //$yearId         = 8;

            $monthsData = TableRegistry::getTableLocator()->get('Months')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['id' => $month]])->first();
            $monthId = $monthsData->id;

            $datas = TableRegistry::getTableLocator()->get('DistrictMonthlyReports')->find('all', ['fields' => ['rgi_district_code', 'name', 'green_allocated_qty', 'green_rice_lifted', 'green_koil_lifted', 'green_transaction_count']])->where(['month_id' => $monthId, 'year_id' => $yearId])->order(['name'])->toArray();

            $this->set(compact('datas'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }

    function greenNotLiftedUpdate()
    {

        $connection = ConnectionManager::get('default');
        $connectionHHD = ConnectionManager::get('dbRationHHD');
        $month_year = date('m-Y', strtotime('-1 month'));
        //$month_year 		= $this->getRequest()->getData('month_year');
        $monthYr = explode('-', $month_year);
        $month = (int)$monthYr[0];
        $year = $monthYr[1];

        $yearsData = TableRegistry::getTableLocator()->get('Years')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['name' => $year]])->first();
        $yearId = $yearsData->id;
        //$yearId         = 8;

        $monthsData = TableRegistry::getTableLocator()->get('Months')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['id' => $month]])->first();
        $monthId = $monthsData->id;

        $cardholder_transaction_table = 'cardholder_transaction_' . $monthId . '_' . $yearId . '_backups';


        $date = date('d');
        if ($date == '25') {
            $sql1 = "select rgi_district_code,sum(totalquantity) as greenAllocatedQty from " . $cardholder_transaction_table . " where cardtype_id='8' group by rgi_district_code";

            $sql1_exe = $connectionHHD->execute($sql1);
            if ($sql1_exe) {
                $data1 = $sql1_exe->fetchAll('assoc');
                $connection->begin();
                foreach ($data1 as $val1) {
                    $rgi_district_code = $val1['rgi_district_code'];
                    $greenAllocatedQty = $val1['greenAllocatedQty'];
                    $sql4 = "update jsfss_district_reports set greenAllocatedQty = '$greenAllocatedQty' where rgi_district_code = '$rgi_district_code'";
                    $sql4_exe = $connection->execute($sql4);
                }
                $connection->commit();
            }
        }


        $sql2 = "select rgi_district_code,sum(totalquantity-balance) as greenLiftedQty from " . $cardholder_transaction_table . " where cardtype_id='8' and totalquantity!=balance group by rgi_district_code";
        $sql2_exe = $connectionHHD->execute($sql2);
        if ($sql2_exe) {
            $data2 = $sql2_exe->fetchAll('assoc');
            $connection->begin();
            foreach ($data2 as $val2) {
                $rgi_district_code2 = $val2['rgi_district_code'];
                $greenLiftedQty = $val2['greenLiftedQty'];
                $sql5 = "update jsfss_district_reports set greenLiftedQty = '$greenLiftedQty' where rgi_district_code = '$rgi_district_code2'";
                $sql5_exe = $connection->execute($sql5);
            }
            $connection->commit();
        }

        $sql3 = "select rgi_district_code,count(distinct rationcard_no) as greenLiftedCount from " . $cardholder_transaction_table . " where cardtype_id='8' and totalquantity!=balance group by rgi_district_code";
        $sql3_exe = $connectionHHD->execute($sql3);
        if ($sql3_exe) {
            $data3 = $sql3_exe->fetchAll('assoc');
            $connection->begin();
            foreach ($data3 as $val3) {
                $rgi_district_code3 = $val3['rgi_district_code'];
                $greenLiftedCount = $val3['greenLiftedCount'];
                $sql6 = "update jsfss_district_reports set greenLiftedCount = '$greenLiftedCount' where rgi_district_code = '$rgi_district_code3'";
                $sql6_exe = $connection->execute($sql6);
            }
            $connection->commit();
        }


        die('Completed');
    }

    function authFailureReport()
    {
        //Configure::write('debug', 'true');
        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
            $rgi_district_code = $this->request->getSession()->read('Auth.User.rgi_district_code');
        } else {
            return $this->redirect($this->Auth->logout());
        }

        if ($group_id == 12 || $group_id == 22) {
            $this->viewBuilder()->setLayout('report');
            $show_div = false;
            $dist_data = array();
            $block_data = array();
            $dealer_data = array();
            $districts = "";
            $districtName = "";
            $monthName = "";
            $yearName = "";
            $rgi_block_code = '';

            if ($this->getRequest()->is('post')) {
                $show_div = true;
                $data = $this->getRequest()->getData();
                $rgi_district_code = $this->appDecryptData($this->getRequest()->getData('rgi_district_code'));
                $rgi_block_code = $this->appDecryptData($this->getRequest()->getData('rgi_block_code'));
                //debug($data);die;
                $month_year = $this->getRequest()->getData('month_year');
                $monthYr = explode('-', $month_year);
                $month = (int)$monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::getTableLocator()->get('Years')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['name' => $year]])->first();
                $yearId = $yearsData->id;
                $yearName = $yearsData->name;
                //$yearId         = 8;

                $monthsData = TableRegistry::getTableLocator()->get('Months')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['id' => $month]])->first();
                $monthId = $monthsData->id;
                $monthName = $monthsData->name;
                //$monthId        = 4;
                //debug($data);die;
                if ($this->getRequest()->getData('report_by') == '1' && $this->getRequest()->getData('rgi_district_code') != '') {
                    $rgi_district_code = $this->appDecryptData($this->getRequest()->getData('rgi_district_code'));
                    $block_data = TableRegistry::getTableLocator()->get('BlockCityMonthlyReports')->find('all', ['fields' => ['rgi_block_code', 'name', 'totalTransactionAuth', 'auth300'], 'conditions' => ['rgi_district_code' => $rgi_district_code, 'month_id' => $monthId, 'year_id' => $yearId]])->toArray();
                } elseif ($this->getRequest()->getData('report_by') == '2' && $this->getRequest()->getData('rgi_block_code') != '') {
                    $rgi_block_code = $this->appDecryptData($this->getRequest()->getData('rgi_block_code'));
                    $dealer_data = TableRegistry::getTableLocator()->get('DealerMonthlyReports')->find('all', ['fields' => ['id', 'name', 'totalTransactionAuth', 'auth300'], 'conditions' => ['rgi_block_code' => $rgi_block_code, 'month_id' => $monthId, 'year_id' => $yearId]])->toArray();
                } else {
                    if ($group_id == 12) {
                        $rgi_district_code = $this->request->getSession()->read('Auth.User.rgi_district_code');
                        //$condition = ['rgi_district_code'=> $rgi_district_code, 'month_id' => $monthId, 'year_id'=>$yearId] ;
                        $condition = ['month_id' => $monthId, 'year_id' => $yearId];
                    } else if ($group_id == 22) {
                        $condition = ['month_id' => $monthId, 'year_id' => $yearId];
                    }
                    $dist_data = TableRegistry::getTableLocator()->get('DistrictMonthlyReports')->find('all', ['fields' => ['rgi_district_code', 'name', 'totalTransactionAuth', 'auth300'], 'conditions' => $condition, 'order' => 'name'])->toArray();
                }
            }
            $this->set(compact('districts', 'dist_data', 'block_data', 'dealer_data', 'districtName', 'monthName', 'yearName', 'show_div', 'rgi_district_code', 'rgi_block_code'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }


    function smsReport()
    {

        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
        } else {
            return $this->redirect($this->Auth->logout());
        }
        if ($group_id == 12) {
            $this->viewBuilder()->setLayout('report');
            $datas = TableRegistry::getTableLocator()->get('SmsReports')->find('all', ['fields' => ['dealer_salt_sugar_sms', 'dealer_rice_wheat_sms', 'depot_stock_out_sms', 'ben_transaction_sms']])->first();
            $this->set(compact('datas'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }


    function districtWiseGreenToNfsaReport()
    {

        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
        } else {
            return $this->redirect($this->Auth->logout());
        }
        if ($group_id == 12 || $group_id == 13) {
            $this->viewBuilder()->setLayout('admin');
            $datas = TableRegistry::getTableLocator()->get('jsfssDistrictReports')->find('all', ['fields' => ['rgi_district_code', 'districtName', 'greenToNfsaHeadCount', 'greenToNfsaMemberCount'], 'order' => ['districtName']])->toArray();

            $this->set(compact('datas'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }


    public function updateCardholderCount()
    {    //Configure::write('debug', 'true');
        $connection = ConnectionManager::get('default');

        $family_count = "update jsfss_secc_cardholders t1 set family_count =
	(select COUNT(rationcard_no) from jsfss_secc_families t2 where t2.rationcard_no = t1.rationcard_no)";
        $connection->execute($family_count);

        $uid_count = "update jsfss_secc_cardholders t1 set uid_count =
	(select COUNT(uid) from jsfss_secc_families t2 where t2.rationcard_no = t1.rationcard_no and t2.uid is not null and LENGTH(t2.uid)=12)";
        $connection->execute($uid_count);

        $mobile_count = "update jsfss_secc_cardholders t1 set mobile_count =
	(select COUNT(mobile) from jsfss_secc_families t2 where t2.rationcard_no = t1.rationcard_no and t2.mobile is not null and LENGTH(t2.mobile)=10)";
        $connection->execute($mobile_count);
    }


    function districtWiseReport()
    {
        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
        } else {
            return $this->redirect($this->Auth->logout());
        }
        if ($group_id == 12 || $group_id == 13) {
            $this->viewBuilder()->setLayout('admin');
            $datas = TableRegistry::getTableLocator()->get('jsfssDistrictReports')->find('all', ['fields' => ['rgi_district_code', 'districtName', 'greenCardHeadCount', 'greenCardMemberCount', 'bso_approved', 'bso_reject', 'dso_approved', 'dso_reject', 'green_member_count', 'nfsa_member_count', 'nfsa_head_count', 'nfsa_bso_approve', 'nfsa_dso_reject', 'nfsa_dso_approve', 'dso_pending']])->toArray();

            //echo '<pre/>';
            //print_r($datas);die;
            $this->set(compact('datas'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }


    function BlockWiseReport($rgi_district_code)
    {
        $rgi_district_code = base64_decode($rgi_district_code);
        $this->viewBuilder()->setLayout('admin');
        $datas = TableRegistry::getTableLocator()->get('jsfss_block_reports')->find('all', ['fields' => ['blockName', 'rgi_district_code', 'districtName', 'rgi_block_code', 'blockName', 'greenCardHeadCount', 'greenCardMemberCount', 'bso_approved', 'bso_reject', 'dso_approved', 'dso_reject', 'green_member_count', 'nfsa_member_count', 'nfsa_head_count', 'nfsa_bso_approve', 'nfsa_dso_reject', 'nfsa_dso_approve', 'dso_pending'], 'conditions' => ['rgi_district_code' => $rgi_district_code]])->toArray();
        $this->set(compact('datas'));
    }


    function villageWiseReport($rgi_block_code)
    {
        $rgi_block_code = base64_decode($rgi_block_code);
        $this->viewBuilder()->setLayout('admin');
        $datas = TableRegistry::getTableLocator()->get('jsfss_village_reports')->find('all', ['fields' => ['rgi_block_code', 'rgi_village_code', 'blockName', 'villageName', 'greenCardHeadCount', 'greenCardMemberCount', 'bso_approved', 'bso_reject', 'dso_approved', 'dso_reject', 'green_member_count', 'nfsa_member_count', 'nfsa_head_count', 'nfsa_bso_approve', 'nfsa_dso_reject', 'nfsa_dso_approve', 'dso_pending'], 'conditions' => ['rgi_block_code' => $rgi_block_code]])->toArray();
        $this->set(compact('datas'));
    }


    function villageWiseApplication($rgi_village_code)
    {
        $this->viewBuilder()->setLayout('admin');
        $datas = TableRegistry::getTableLocator()->get('SeccCardholderAddTemps')
            ->find(
                'all',
                [
                    'fields' =>
                        ['id', 'ack_no', 'requested_mobile', 'uid', 'name', 'applicationType', 'fathername', 'fathername_sl', 'activity_flag', 'created', 'family_count', 'Cardtypes.name', 'caste_id', 'Castes.name'],
                    'conditions' => ['rgi_village_code' => $rgi_village_code, 'activity_type_id' => '1', 'activity_flag' => '1'],
                    'contain' => ['Cardtypes', 'Castes', 'SeccFamilyAddTemps' => ['fields' => ['secc_cardholder_add_temp_id', 'marital_status', 'disability_status', 'health_status', 'dob'], 'conditions' => ['hof' => '1']]],
                    'order' => ['SeccCardholderAddTemps.priority_marks' => 'desc', 'SeccCardholderAddTemps.created' => 'desc']
                ]
            )
            ->toArray();

        //echo $rgi_village_code;	print_r($datas);die;

        //$datas = TableRegistry::getTableLocator()->get('secc_cardholder_add_temps')->find('all', ['fields' => ['id', 'ack_no', 'requested_mobile', 'uid', 'name', 'applicationType', 'fathername', 'fathername_sl',  'caste_id','Castes.name', 'Cardtypes.name',],'contain' => ['Cardtypes', 'Castes'],'conditions'=>['rgi_village_code'=>$rgi_village_code]])->toArray();

        $this->set(compact('datas'));
    }


    function villageWiseCron()
    {
        $this->autoRender = false;

        $connection = ConnectionManager::get('default');


        /***********************Village wise bso/dso reoprt update**************/
        $q1 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from secc_cardholder_add_temps where applied_through='0'  group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET greenCardHeadCount = total";
        $connection->execute($q1);

        $q11 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from secc_family_add_temps   group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET greenCardMemberCount = total";
        $connection->execute($q11);
        //die('stop');

        $q2 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from jsfss_secc_cardholder_add_temps_backups where applied_through='0'  group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET greenCardHeadCount = greenCardHeadCount+total";
        $connection->execute($q2);

        $q22 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from jsfss_secc_family_add_temps_backups   group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET greenCardMemberCount = greenCardMemberCount+total";
        $connection->execute($q22);

        $q3 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from secc_cardholder_add_temps where  activity_flag='1' and applied_through='0'  group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET bso_approved = total";
        $connection->execute($q3);

        $q4 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from jsfss_secc_cardholder_add_temps_backups where (activity_flag='3' || activity_flag='4') and applied_through='0'  group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET bso_approved = bso_approved+total";
        $connection->execute($q4);

        $q5 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from jsfss_secc_cardholder_add_temps_backups where  activity_flag='2' and applied_through='0'   group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET bso_reject = total";
        $connection->execute($q5);

        $q6 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from jsfss_secc_cardholders    group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET dso_approved = total";
        $connection->execute($q6);

        /**need to be removed in future**/
        $qgreenMember = "update jsfss_district_reports  t1 join (select rgi_district_code,sum(familiy_count) as cnt from jsfss_secc_cardholders  group by rgi_district_code) as t2 on t1.rgi_district_code=t2.rgi_district_code set t1.green_member_count=t2.cnt";
        $connection->execute($qgreenMember);

        $nfsa_bso = "update jsfss_district_reports  t1 join (select rgi_district_code,count(*) as cnt from secc_cardholder_add_temps where applied_through='1' and activity_flag='1'  group by rgi_district_code) as t2 on t1.rgi_district_code=t2.rgi_district_code set t1.nfsa_bso_approve=t2.cnt";
        $connection->execute($nfsa_bso);

        $nfsa_bso_app = "update jsfss_district_reports  t1 join (select rgi_district_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups where applied_through='1' and (activity_flag='3' or  activity_flag='4')  group by rgi_district_code) as t2 on t1.rgi_district_code=t2.rgi_district_code set t1.nfsa_bso_approve=t1.nfsa_bso_approve+t2.cnt";
        $connection->execute($nfsa_bso_app);
        /*******************/

        $q7 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from jsfss_secc_cardholder_add_temps_backups where  activity_flag='4' and applied_through='0'   group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET dso_reject = total";
        $connection->execute($q7);

        /**************************************************************************/
        // Block wise Report
        $qry_block = "UPDATE jsfss_block_reports a JOIN (select rgi_block_code,sum(greenCardHeadCount) as total_head,sum(greenCardMemberCount) as total_member,sum(bso_approved) as bso_approved,sum(bso_reject) as bso_reject,sum(dso_approved) as dso_approved,sum(dso_reject) as dso_reject from jsfss_village_reports group by rgi_block_code ) b ON a.rgi_block_code = b.rgi_block_code
	SET greenCardHeadCount = total_head ,greenCardMemberCount = total_member, a.bso_approved = b.bso_approved ,a.bso_reject =b.bso_reject, a.dso_reject = b.dso_reject ,a.dso_approved = b.dso_approved";
        $connection->execute($qry_block);

        /*$qry_dist = "UPDATE jsfss_district_reports a JOIN (select rgi_district_code,sum(greenCardHeadCount) as total_head,sum(greenCardMemberCount) as total_member,sum(bso_approved) as bso_approved,sum(bso_reject) as bso_reject,sum(dso_approved) as dso_approved,sum(dso_reject) as dso_reject from jsfss_block_reports group by rgi_district_code ) b ON a.rgi_district_code = b.rgi_district_code
SET greenCardHeadCount = total_head ,greenCardMemberCount = total_member , a.bso_approved = b.bso_approved ,a.bso_reject =b.bso_reject, a.dso_reject = b.dso_reject ,a.dso_approved = b.dso_approved";
$connection->execute($qry_dist);*/

        die('done');
    }


    public function greenRequestBackup($rgi_district_code = null)
    {
        Configure::write('debug', true);
        $connection = ConnectionManager::get('default');

        /***delete common data***/
        /*$s="select t1.ack_no  from secc_cardholder_add_temps t1 join jsfss_secc_cardholder_add_temps_backups t2 on t1.ack_no=t2.ack_no";
$sRes=$connection->execute($s)->fetchAll('assoc');

foreach($sRes as $val)
{
$ack_no=$val['ack_no'];
$connection->execute("delete from secc_cardholder_add_temps where ack_no='$ack_no'");
$connection->execute("delete from secc_family_add_temps where ack_no_ercms='$ack_no'");
}*/
        //die('deleted');
        /*************************/
        /*try
{*/
        $connection->begin();
        $a = "insert into jsfss_secc_cardholder_add_temps_backups select * from secc_cardholder_add_temps where rgi_district_code='$rgi_district_code' and  (activity_flag='2' || activity_flag='3' || activity_flag='4')";
        $connection->execute($a);

        $b = "insert into jsfss_secc_family_add_temps_backups select * from secc_family_add_temps where rgi_district_code='$rgi_district_code' and (activity_flag='2' || activity_flag='3' || activity_flag='4')";
        $connection->execute($b);
        /*}*/
        /*catch (PDOException $e)
{
echo 'Message: ' .$e->getMessage();
die;

} */


        /***delete common data***/
        $s = "select t1.ack_no  from secc_cardholder_add_temps t1 join jsfss_secc_cardholder_add_temps_backups t2 on (t1.ack_no=t2.ack_no and t2.rgi_district_code='$rgi_district_code')";
        $sRes = $connection->execute($s)->fetchAll('assoc');

        foreach ($sRes as $val) {
            $ack_no = $val['ack_no'];
            $connection->execute("delete from secc_cardholder_add_temps where ack_no='$ack_no'");
            $connection->execute("delete from secc_family_add_temps where ack_no_ercms='$ack_no'");
        }

        $connection->commit();

        /*************************/

        die('done');
    }


    public function updatereport()
    {
        $connection1 = ConnectionManager::get('default');
        /*$s="select t1.ack_no,t1.application_status,t1.rationcard_no from secc_cardholder_add_temps t1 join jsfss_secc_cardholder_add_temps_backups t2 on t1.ack_no=t2.ack_no where t1.rationcard_no is not null;";*/

        /*$s="select t1.ack_no,t1.application_status,t1.rationcard_no from secc_cardholder_add_temps t1 join jsfss_secc_cardholder_add_temps_backups t2 on t1.ack_no=t2.ack_no where t1.application_status<7 and (t2.activity_flag=2);";

$s="select t1.ack_no,t1.application_status,t1.rationcard_no from secc_cardholder_add_temps t1 join jsfss_secc_cardholder_add_temps_backups t2 on t1.ack_no=t2.ack_no where (t1.application_status=7 or t1.application_status=8) and (t2.activity_flag=1 or t2.activity_flag=2) ";

$s="select t1.ack_no,t1.application_status,t1.rationcard_no,t1.created,t1.activity_flag from secc_cardholder_add_temps t1 join jsfss_secc_cardholder_add_temps_backups t2 on t1.ack_no=t2.ack_no";*/

        /*$s="select distinct(t1.ack_no_ercms) as ack_no  from secc_family_add_temps t1 left join secc_cardholder_add_temps t2 on t1.ack_no_ercms=t2.ack_no where t2.id is null";*/

        /*$s="select t1.ack_no,t1.application_status,t1.rationcard_no from secc_cardholder_add_temps t1 join jsfss_secc_cardholder_add_temps_backups t2 on t1.ack_no=t2.ack_no where t1.rationcard_no";*/

        $s = "select t1.ack_no  from secc_cardholder_add_temps t1 join jsfss_secc_cardholder_add_temps_backups t2 on t1.ack_no=t2.ack_no";

        $sRes = $connection1->execute($s)->fetchAll('assoc');
        foreach ($sRes as $val) {
            /*$rationcard_no=$val['rationcard_no'];
$connection1->execute("delete from secc_cardholder_add_temps where rationcard_no='$rationcard_no'");*/

            $ack_no = $val['ack_no'];
            //$connection1->execute("delete from jsfss_secc_cardholder_add_temps_backups where ack_no='$ack_no'");


            //$connection1->execute("delete from jsfss_secc_family_add_temps_backups where ack_no_ercms='$ack_no'");

            $connection1->execute("delete from secc_cardholder_add_temps where ack_no='$ack_no'");
            $connection1->execute("delete from secc_family_add_temps where ack_no_ercms='$ack_no'");
        }
        die;
    }


    public function test()
    {

        $this->autoRender = false;

        $connection = ConnectionManager::get('default');
        /*$q1="UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from secc_cardholder_add_temps where  applied_through='0'  group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET greenCardHeadCount = total";
$connection->execute($q1);*/

        $qz = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from secc_family_add_temps where  applied_through='0'  group by rgi_village_code ) b ON a.rgi_village_code = b.rgi_village_code SET greenCardMemberCount = total";
        $connection->execute($qz);

        die('stoped');
    }


    public function hhdErcmsPendingNewsBackup($rgi_district_code = null)
    {
        Configure::write('debug', true);
        $connection = ConnectionManager::get('default');
        $connectionMas = ConnectionManager::get('dbRationMaster');
        //$q="insert into hhd_ercms_pending_news_backups select t1.* from hhd_ercms_pending_news t1 join jsfss_secc_families t2 on t1.uid=t2.uid and t2.hof='1' and t1.hof='1' and t1.mapping_status='1'";

        $q = "insert into hhd_ercms_pending_news_backups select * from hhd_ercms_pending_news where rgi_district_code='$rgi_district_code' and ( activity_flag='3' or activity_flag='4') ";
        $connection->execute($q);


        $res = $connection->execute("select ack_no_ercms,secc_cardholder_temp_id from  hhd_ercms_pending_news_backups where rgi_district_code='$rgi_district_code' and  deleteFlag='0'")->fetchAll('assoc');
        foreach ($res as $val) {
            $ack_no = $val['ack_no_ercms'];
            $secc_cardholder_temp_id = $val['secc_cardholder_temp_id'];
            //echo $ack_no.'<br/>';
            /*$connection->execute("delete from  hhd_ercms_pending_news where ack_no_ercms='$ack_no'");
$connectionMas->execute("delete from  secc_family_temps where ack_no_ercms='$ack_no'");
$connectionMas->execute("delete from  secc_cardholder_temps  where ack_no='$ack_no'");
$connection->execute("update  hhd_ercms_pending_news_backups set deleteFlag='1'  where ack_no_ercms='$ack_no'");*/

            $connection->execute("delete from  hhd_ercms_pending_news where secc_cardholder_temp_id='$secc_cardholder_temp_id'");
            $connectionMas->execute("delete from  secc_family_temps where secc_cardholder_temp_id='$secc_cardholder_temp_id'");
            $connectionMas->execute("delete from  secc_cardholder_temps  where id='$secc_cardholder_temp_id'");
            $connection->execute("update  hhd_ercms_pending_news_backups set deleteFlag='1'  where secc_cardholder_temp_id='$secc_cardholder_temp_id'");
        }
        die('done');
    }


    //district reports
    public function jsfssDistrictreportBackup()
    {
        $connection = ConnectionManager::get('default');
        $dso_pending = "update jsfss_district_reports t1  join (select rgi_district_code,count(*) as cnt from secc_cardholder_add_temps  where  activity_flag='1'  group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.dso_pending=t2.cnt";
        $connection->execute($dso_pending);

        $qo = "update jsfss_district_reports t1  join (select rgi_district_code,count(*) as cnt from secc_cardholder_add_temps  where  activity_flag='0' and applied_through='0' and application_status='7' group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.greenCardHeadCount=t2.cnt";
        $connection->execute($qo);

        $qoo = "update jsfss_district_reports t1  join (select rgi_district_code,count(*) as cnt from secc_family_add_temps  where  activity_flag='0' and applied_through='0' and application_status='7' group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.greenCardMemberCount=t2.cnt";
        $connection->execute($qoo);

        $nfsa1 = "update jsfss_district_reports  t1 join (select rgi_district_code,count(*) as cnt from hhd_ercms_pending_news where hof='1' and mapping_status='0' group by rgi_district_code) as t2 on t1.rgi_district_code=t2.rgi_district_code set t1.nfsa_head_count=t2.cnt";
        $connection->execute($nfsa1);

        $nfsa2 = "update jsfss_district_reports  t1 join (select rgi_district_code,count(*) as cnt from hhd_ercms_pending_news where  mapping_status='0' group by rgi_district_code) as t2 on t1.rgi_district_code=t2.rgi_district_code set t1.nfsa_member_count=t2.cnt";
        $connection->execute($nfsa2);


        $q1 = "update jsfss_district_reports t1  join (select rgi_district_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='3' and applied_through='0' group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.bso_approved=t2.cnt";
        $connection->execute($q1);
        $q2 = "update jsfss_district_reports t1  join (select rgi_district_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='4' and applied_through='0' group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.bso_approved=t1.bso_approved+t2.cnt";
        $connection->execute($q2);

        $q22 = "update jsfss_district_reports t1  join (select rgi_district_code,count(*) as cnt from secc_cardholder_add_temps  where  activity_flag='1' and applied_through='0' group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.bso_approved=t1.bso_approved+t2.cnt";
        $connection->execute($q22);

        $q3 = "update jsfss_district_reports t1 join (select rgi_district_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='3' and applied_through='1' group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.nfsa_bso_approve=cnt";
        $connection->execute($q3);
        $q4 = "update jsfss_district_reports t1 join (select rgi_district_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='4' and applied_through='1' group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.nfsa_bso_approve=t1.nfsa_bso_approve+t2.cnt";
        $connection->execute($q4);

        $q44 = "update jsfss_district_reports t1  join (select rgi_district_code,count(*) as cnt from secc_cardholder_add_temps  where  activity_flag='1' and applied_through='1' group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.nfsa_bso_approve=t1.nfsa_bso_approve+t2.cnt";
        $connection->execute($q44);

        $q5 = "update jsfss_district_reports t1 join (select rgi_district_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='2'  group by rgi_district_code) t2  on t1.rgi_district_code=t2.rgi_district_code set t1.bso_reject=cnt";
        $connection->execute($q5);

        $q6 = "UPDATE jsfss_district_reports  a JOIN (select rgi_district_code,count(id) as total from jsfss_secc_cardholders    group by rgi_district_code ) b ON a.rgi_district_code= b.rgi_district_code SET dso_approved = total";
        $connection->execute($q6);

        $q7 = "UPDATE jsfss_district_reports a JOIN (select rgi_district_code,count(id) as total from jsfss_secc_cardholder_add_temps_backups where  activity_flag='4'   group by rgi_district_code) b ON a.rgi_district_code= b.rgi_district_code SET dso_reject = total";
        $connection->execute($q7);

        $qgreenMember = "update jsfss_district_reports  t1 join (select rgi_district_code,sum(family_count) as cnt from jsfss_secc_cardholders  group by rgi_district_code) as t2 on t1.rgi_district_code=t2.rgi_district_code set t1.green_member_count=t2.cnt";
        $connection->execute($qgreenMember);

        die('Completed');
    }


    function districtWiseGreencardReport()
    {
        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
        } else {
            return $this->redirect($this->Auth->logout());
        }
        if ($group_id == 12 || $group_id == 13) {
            $this->viewBuilder()->setLayout('admin');
            $datas = TableRegistry::getTableLocator()->get('jsfssDistrictReports')->find('all', ['fields' => ['rgi_district_code', 'districtName', 'cards' => 'greenCardHeadCount', 'members' => 'greenCardMemberCount']])->toArray();

            $this->set(compact('datas'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }


    function blockWiseGreencardReport($rgi_district_code)
    {
        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
        } else {
            return $this->redirect($this->Auth->logout());
        }
        if ($group_id == 12 || $group_id == 13) {
            $rgi_district_code = base64_decode($rgi_district_code);
            $districtName = TableRegistry::getTableLocator()->get('SeccDistricts')->find()->select(['name'])->where(['rgi_district_code' => $rgi_district_code])->first();
            $this->viewBuilder()->setLayout('admin');
            $datas = TableRegistry::getTableLocator()->get('jsfssBlockReports')->find('all', ['fields' => ['rgi_block_code', 'blockName', 'cards' => 'greenCardHeadCount', 'members' => 'greenCardMemberCount']])->where(['rgi_district_code' => $rgi_district_code])->toArray();
            $this->set(compact('datas', 'districtName'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }


    function dealerWiseGreencardReport($rgi_block_code)
    {
        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
        } else {
            return $this->redirect($this->Auth->logout());
        }
        if ($group_id == 12 || $group_id == 13) {
            $rgi_block_code = base64_decode($rgi_block_code);
            $district = TableRegistry::getTableLocator()->get('SeccBlocks')->find()->select(['rgi_district_code', 'name'])->where(['rgi_block_code' => $rgi_block_code])->first();
            $rgi_district_code = $district->rgi_district_code;
            $districtName = TableRegistry::getTableLocator()->get('SeccDistricts')->find()->select(['name'])->where(['rgi_district_code' => $rgi_district_code])->first();
            $this->viewBuilder()->setLayout('admin');

            $datas = TableRegistry::getTableLocator()->get('Dealers')->find()->select(['id', 'name', 'cards' => 'coalesce(greenHead,0)', 'members' => 'coalesce(greenMember,0)'])->where(['rgi_block_code' => $rgi_block_code])->group(['id'])->toArray();
            //debug($datas);die;
            $this->set(compact('datas', 'district', 'districtName'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }


    function dealerWiseGreencard($dealer_id)
    {
        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
        } else {
            return $this->redirect($this->Auth->logout());
        }
        if ($group_id == 12 || $group_id == 13) {
            $dealer_id = base64_decode($dealer_id);
            $block = TableRegistry::getTableLocator()->get('Dealers')->find()->select(['rgi_block_code', 'blockName', 'name', 'districtName'])->where(['id' => $dealer_id])->first();

            $this->viewBuilder()->setLayout('admin');
            $datas = TableRegistry::getTableLocator()->get('JsfssSeccCardholders')
                ->find(
                    'all',
                    [
                        'fields' =>
                            ['id', 'rationcard_no', 'uid', 'name', 'applicationType', 'fathername', 'family_count', 'caste_id', 'disability_status', 'marital_status', 'health_status'],
                        'conditions' => ['dealer_id' => $dealer_id],
                        'order' => ['rationcard_no']
                    ]
                )
                ->toArray();
            $this->set(compact('datas', 'block'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }


    public function villageWiseCron1()
    {
        Configure::write('debug', true);
        $connection = ConnectionManager::get('default');
        $qo = "update jsfss_village_reports t1  join (select rgi_village_code,count(*) as cnt from secc_cardholder_add_temps  where  activity_flag='0' and applied_through='0' and application_status='7' group by rgi_village_code) t2  on t1.rgi_village_code=t2.rgi_village_code set t1.greenCardHeadCount=t2.cnt";
        $connection->execute($qo);

        $qoo = "update jsfss_village_reports t1  join (select rgi_village_code,count(*) as cnt from secc_family_add_temps  where  activity_flag='0' and applied_through='0' and application_status='7' group by rgi_village_code) t2  on t1.rgi_village_code=t2.rgi_village_code set t1.greenCardMemberCount=t2.cnt";
        $connection->execute($qoo);

        $nfsa1 = "update jsfss_village_reports  t1 join (select rgi_village_code,count(*) as cnt from hhd_ercms_pending_news where hof='1' and  activity_flag='0' and mapping_status='0' group by rgi_village_code) as t2 on t1.rgi_village_code=t2.rgi_village_code set t1.nfsa_head_count=t2.cnt";
        $connection->execute($nfsa1);

        $nfsa2 = "update jsfss_village_reports  t1 join (select rgi_village_code,count(*) as cnt from hhd_ercms_pending_news  where  activity_flag='0' and mapping_status='0'  group by rgi_village_code) as t2 on t1.rgi_village_code=t2.rgi_village_code set t1.nfsa_member_count=t2.cnt";
        $connection->execute($nfsa2);

        //bso approve
        $q1 = "update jsfss_village_reports t1  join (select rgi_village_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='3' and applied_through='0' group by rgi_village_code) t2  on t1.rgi_village_code=t2.rgi_village_code set t1.bso_approved=t2.cnt";
        $connection->execute($q1);
        $q2 = "update jsfss_village_reports t1  join (select rgi_village_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='4' and applied_through='0' group by rgi_village_code) t2  on t1.rgi_village_code=t2.rgi_village_code set t1.bso_approved=t1.bso_approved+t2.cnt";
        $connection->execute($q2);
        $q22 = "update jsfss_village_reports t1  join (select rgi_village_code,count(*) as cnt from secc_cardholder_add_temps  where  activity_flag='1' and applied_through='0' group by rgi_village_code) t2  on t1.rgi_village_code=t2.rgi_village_code set t1.bso_approved=t1.bso_approved+t2.cnt";
        $connection->execute($q22);

        //nfsa bso approve
        $q3 = "update jsfss_village_reports t1 join (select rgi_village_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='3' and applied_through='1' group by rgi_village_code) t2  on t1.rgi_village_code=t2.rgi_village_code set t1.nfsa_bso_approve=t2.cnt";
        $connection->execute($q3);
        $q4 = "update jsfss_village_reports t1 join (select rgi_village_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='4' and applied_through='1' group by rgi_village_code) t2  on t1.rgi_village_code=t2.rgi_village_code set t1.nfsa_bso_approve=t1.nfsa_bso_approve+t2.cnt";
        $connection->execute($q4);
        $q44 = "update jsfss_village_reports t1  join (select rgi_village_code,count(*) as cnt from secc_cardholder_add_temps  where  activity_flag='1' and applied_through='1' group by rgi_village_code) t2  on t1.rgi_village_code=t2.rgi_village_code set t1.nfsa_bso_approve=t1.nfsa_bso_approve+t2.cnt";
        $connection->execute($q44);


        $q5 = "update jsfss_village_reports t1 join (select rgi_village_code,count(*) as cnt from jsfss_secc_cardholder_add_temps_backups  where  activity_flag='2'  group by rgi_village_code) t2  on t1.rgi_village_code=t2.rgi_village_code set t1.bso_reject=t2.cnt";
        $connection->execute($q5);

        $q6 = "UPDATE jsfss_village_reports  a JOIN (select rgi_village_code,count(id) as total from jsfss_secc_cardholders    group by rgi_village_code ) b ON a.rgi_village_code= b.rgi_village_code SET dso_approved = total";
        $connection->execute($q6);

        $q7 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from jsfss_secc_cardholder_add_temps_backups where  activity_flag='4'   group by rgi_village_code) b ON a.rgi_village_code= b.rgi_village_code SET dso_reject = total";
        $connection->execute($q7);

        $q8 = "UPDATE jsfss_village_reports a JOIN (select rgi_village_code,count(id) as total from secc_cardholder_add_temps where  activity_flag='1'   group by rgi_village_code) b ON a.rgi_village_code= b.rgi_village_code SET a.dso_pending = b.total";
        $connection->execute($q8);

        $qgreenMember = "update jsfss_village_reports  t1 join (select rgi_village_code,sum(family_count) as cnt from jsfss_secc_cardholders  group by rgi_village_code) as t2 on t1.rgi_village_code=t2.rgi_village_code set t1.green_member_count=t2.cnt";
        $connection->execute($qgreenMember);


        $qry_block = "UPDATE jsfss_block_reports t1 JOIN
	(
	select rgi_block_code,
	sum(greenCardHeadCount) as total_head,
	sum(greenCardMemberCount) as total_member,
	sum(nfsa_head_count) as nfsa_head_count,
	sum(nfsa_member_count) as nfsa_member_count,
	sum(bso_approved) as bso_approved,
	sum(nfsa_bso_approve) as nfsa_bso_approve,
	sum(bso_reject) as bso_reject,
	sum(dso_approved) as dso_approved,
	sum(dso_reject) as dso_reject,
	sum(green_member_count) as green_member_count,
	sum(dso_pending) as dso_pending
	from jsfss_village_reports group by rgi_block_code
) t2
ON t1.rgi_block_code = t2.rgi_block_code
SET
t1.greenCardHeadCount = t2.total_head,
t1.greenCardMemberCount = t2.total_member,
t1.nfsa_head_count = t2.nfsa_head_count,
t1.nfsa_member_count = t2.nfsa_member_count,
t1.bso_approved = t2.bso_approved,
t1.nfsa_bso_approve = t2.nfsa_bso_approve,
t1.bso_reject =t2.bso_reject,
t1.dso_approved = t2.dso_approved,
t1.dso_reject = t2.dso_reject,
t1.dso_pending=t2.dso_pending,
t1.green_member_count = t2.green_member_count";
        $connection->execute($qry_block);


        /*$qry_dist = "UPDATE jsfss_district_reports t1 JOIN
(
select rgi_block_code,
sum(greenCardHeadCount) as total_head,
sum(greenCardMemberCount) as total_member,
sum(nfsa_head_count) as nfsa_head_count,
sum(nfsa_member_count) as nfsa_member_count,
sum(bso_approved) as bso_approved,
sum(nfsa_bso_approve) as nfsa_bso_approve,
sum(bso_reject) as bso_reject,
sum(dso_approved) as dso_approved,
sum(dso_reject) as dso_reject,
sum(green_member_count) as green_member_count
from jsfss_block_reports group by rgi_district_code
) t2
ON t1.rgi_block_code = t2.rgi_block_code
SET
t1.greenCardHeadCount = t2.total_head,
t1.greenCardMemberCount = t2.total_member,
t1.nfsa_head_count = t2.nfsa_head_count,
t1.nfsa_member_count = t2.nfsa_member_count,
t1.bso_approved = t2.bso_approved,
t1.nfsa_bso_approve = t2.nfsa_bso_approve,
t1.bso_reject =t2.bso_reject,
t1.dso_approved = t2.dso_approved,
t1.dso_reject = t2.dso_reject,
t1.green_member_count = t2.green_member_count";
$connection->execute($qry_dist);*/


        die('Completed');
    }


    public function updateBlock()
    {
        die('closed');
        $connection = ConnectionManager::get('default');
        $s = "select t2.rgi_block_code as rghtBlock,t1.rationcard_no from jsfss_secc_cardholders t1 join (select rgi_village_code,rgi_district_code,rgi_block_code from jsfss_village_reports ) t2 on t1.rgi_village_code=t2.rgi_village_code where t1.rgi_block_code !=t2.rgi_block_code";
        $sRes = $connection->execute($s);
        foreach ($sRes as $val) {
            $rgi_block_code = $val['rghtBlock'];
            $rationcard_no = $val['rationcard_no'];
            $q2 = "UPDATE jsfss_secc_cardholders set rgi_block_code='$rgi_block_code'   where rationcard_no='$rationcard_no'";
            $q3 = "UPDATE jsfss_secc_families set rgi_block_code='$rgi_block_code'   where rationcard_no='$rationcard_no'";

            echo $q2 . '<br/>';
            echo $q3 . '<br/>';
            $connection->execute($q2);
            $connection->execute($q3);
        }
        die('done');
    }


    public function checkBlcVill()
    {

        die('closed');
        $dbConObj = $this->defaultDbConnect();
        $connection = ConnectionManager::get('default');

        $q = "select rgi_district_code,rgi_block_code,rgi_village_code,rationcard_no from jsfss_secc_cardholders";
        $qRes = $connection->execute($q);

        foreach ($qRes as $val) {

            $rgi_block_code = $val['rgi_block_code'];
            $rationcard_no = $val['rationcard_no'];
            $rgi_village_code = $val['rgi_village_code'];
            $rgi_district_code = $val['rgi_district_code'];

            $q1 = "select rgi_district_code  from secc_blocks where rgi_block_code='$rgi_block_code'";
            $q1Exe = mysqli_query($dbConObj, $q1);

            $q1Res = mysqli_fetch_array($q1Exe);
            $org_rgi_district_code = $q1Res['rgi_district_code'];
            if ($org_rgi_district_code != $rgi_district_code) {
                echo '<br/>' . $rationcard_no . '<br/>';
            }

            /////////////////////////
            $q2 = "select rgi_block_code  from secc_village_wards where rgi_village_code='$rgi_village_code'";
            $q2Exe = mysqli_query($dbConObj, $q2);
            $q2Res = mysqli_fetch_array($q2Exe);
            $org_rgi_block_code = $q2Res['rgi_block_code'];
            if ($org_rgi_block_code != $rgi_block_code) {


                $q3 = "select rgi_district_code  from secc_blocks where rgi_block_code='$org_rgi_block_code'";
                $q3Exe = mysqli_query($dbConObj, $q3);
                $q3Res = mysqli_fetch_array($q3Exe);
                $org_rgi_district_code2 = $q3Res['rgi_district_code'];
                if ($org_rgi_district_code2 != $rgi_district_code) {
                    echo 'rgidistrict code is diffrent';
                    echo $rationcard_no . '<br/>';
                } else {


                    echo '<br/>' . '-------------updating rgi_block_code----------' . '<br/>';
                    echo $rationcard_no . '<br/>';
                    //mysqli_query($dbConObj,"update jsfss_secc_cardholders set rgi_block_code='$org_rgi_block_code' where rationcard_no='$rationcard_no'");

                    //mysqli_query($dbConObj,"update jsfss_secc_families set rgi_block_code='$org_rgi_block_code' where rationcard_no='$rationcard_no'");
                    echo '<br/>' . '---------------------------------------------------' . '<br/>';
                }
            }
            ////////////////////////////////////////

        }
        die;
    }


    public function deleteHdErcms()
    {

        //die('closed');
        $connection = ConnectionManager::get('default');
        $q = "select ack_no_ercms,secc_cardholder_temp_id from hhd_ercms_pending_news_backups";
        $res = $connection->execute($q);
        foreach ($res as $val) {
            $ack_no = $val['ack_no_ercms'];
            $secc_cardholder_temp_id = $val['secc_cardholder_temp_id'];
            //$connection->execute("delete from  hhd_ercms_pending_news where ack_no_ercms='$ack_no'");
            $s = $connection->execute("delete from  hhd_ercms_pending_news where secc_cardholder_temp_id='$secc_cardholder_temp_id'");
            //echo '<pre/>';
            //print_r($s);die;

        }
        die('aaa');
    }

    public function insertHof($rgi_district_code = null)
    {
        ini_set('memory_limit', '-1');
        set_time_limit(0);
        Configure::write('debug', 'true');
        $connection = ConnectionManager::get('default');
        $nfsa_connection = ConnectionManager::get('dbRationMaster');
        $hof_sql = "select * from hhd_ercms_pending_news where rgi_district_code='$rgi_district_code' and  hof ='1'";
        $hof_exe = $nfsa_connection->execute($hof_sql);
        $hof_data = $hof_exe->fetchAll('assoc');

        $i = 0;
        foreach ($hof_data as $data) {
            $id = $data['id'];
            $ack_no_ercms = $data['ack_no_ercms'];
            $cardtype_id = $data['cardtype_id'];
            $dealer_id = $data['dealer_id'];
            $secc_cardholder_temp_id = $data['secc_cardholder_temp_id'];
            $rgi_district_code = $data['rgi_district_code'];
            $rgi_block_code = $data['rgi_block_code'];
            $rgi_village_code = $data['rgi_village_code'];
            $name = $data['name'];
            $name_sl = $data['name_sl'];
            $fathername = $data['fathername'];
            $fathername_sl = $data['fathername_sl'];
            $mothername = $data['mothername'];
            $mothername_sl = $data['mothername_sl'];
            $relation_id = $data['relation_id'];
            $relation_sl = $data['relation_sl'];
            $gender_id = $data['gender_id'];
            $dob = $data['dob'];
            $mobile = $data['mobile'];
            $uid = $data['uid'];
            $uid_verified = $data['uid_verified'];
            $created = $data['created'];
            $modified = $data['modified'];
            $activity_flag = $data['activity_flag'];
            $activity_type_id = $data['activity_type_id'];
            $requested_mobile = $data['requested_mobile'];
            $dso_modifiedDate = $data['dso_modifiedDate'];
            $hof = $data['hof'];
            $districtName = $data['districtName'];
            $blockName = $data['blockName'];
            $dealerName = $data['dealerName'];
            $accountNo = $data['accountNo'];
            $villageName = $data['villageName'];
            $bankName = $data['bankName'];
            $branchName = $data['branchName'];
            $panchayatName = $data['panchayatName'];
            $bank_master_id = $data['bank_master_id'];
            $branch_master_id = $data['branch_master_id'];
            $panchayat_id = $data['panchayat_id'];

            $bank_master_id = ($data['bank_master_id'] == '') ? 0 : $data['bank_master_id'];
            $branch_master_id = ($data['branch_master_id'] == '') ? 0 : $data['branch_master_id'];
            $panchayat_id = ($data['panchayat_id'] == '') ? 0 : $data['panchayat_id'];

            $branchName = str_replace("'", "", $branchName);
            $mothername_sl = str_replace("'", "", "$mothername_sl");
            $fathername_sl = str_replace("'", "", "$fathername_sl");
            $name_sl = str_replace("'", "", "$name_sl");
            //echo $mothername_sl;die;
            $sql_hof_check = "select id from hhd_ercms_pending_news where ack_no_ercms='$ack_no_ercms' and hof='1'";
            $exe_sql_hof_check = $connection->execute($sql_hof_check);
            if ($exe_sql_hof_check->rowCount() == 0) {
                $insert_hof = "INSERT INTO `ration`.`hhd_ercms_pending_news`
			(`id`, `ack_no_ercms`, `cardtype_id`, `dealer_id`, `secc_cardholder_temp_id`, `rgi_district_code`, `rgi_block_code`, `rgi_village_code`, `name`, `name_sl`, `fathername`, `fathername_sl`, `mothername`, `mothername_sl`, `relation_id`, `relation_sl`,
			`gender_id`, `dob`, `mobile`, `uid`, `uid_verified`, `created`, `modified`, `activity_flag`, `activity_type_id`, `requested_mobile`,
			`dso_modifiedDate`, `hof`, `districtName`, `blockName`, `dealerName`, `accountNo`, `villageName`, `bankName`, `branchName`, `panchayatName`, `bank_master_id`, `branch_master_id`, `panchayat_id`, `mapping_status`)
			VALUES
			('$id', '$ack_no_ercms', '$cardtype_id', '$dealer_id', '$secc_cardholder_temp_id', '$rgi_district_code', '$rgi_block_code', '$rgi_village_code', '$name', '$name_sl', '$fathername', '$fathername_sl', '$mothername', '$mothername_sl', '$relation_id', '$relation_sl', '$gender_id','$dob','$mobile', '$uid', '$uid_verified', '$created', '$modified', '$activity_flag', '$activity_type_id', '$requested_mobile',null, '$hof', '$districtName', '$blockName', '$dealerName', '$accountNo', '$villageName', '$bankName', '$branchName', '$panchayatName', '$bank_master_id', '$branch_master_id', '$panchayat_id', '0')";
                //echo $mothername_sl.'<br/>';
                //echo $insert_hof.'<br/>';die;
                try {
                    $exe_sql_hof_check = $connection->execute($insert_hof);
                } catch (PDOException $e) {
                    echo '<pre/>';
                    print_r($data);
                    echo 'iii:-' . $mothername_sl . '<br/>';
                    echo 'Message: ' . $e->getMessage();
                    die;
                }

                $i++;
            }
        }

        echo $i;
        die('Completed');
    }


    public function updateHhdErcmsHof()
    {
        Configure::write('debug', 'true');
        $curYear = date('Y');
        $preYear = $curYear - 18;
        $connection = ConnectionManager::get('default');
        $sql_hhd = "select secc_cardholder_temp_id  from hhd_ercms_pending_news  group by secc_cardholder_temp_id having count(case when hof=1 then hof end )=0";
        $exe_hhd = $connection->execute($sql_hhd);
        $datas = $exe_hhd->fetchAll('assoc');
        foreach ($datas as $data) {
            $secc_cardholder_temp_id = $data['secc_cardholder_temp_id'];
            ////This query will get Oldest Lady
            $sql1 = "select id,min(year(dob)) as dob from hhd_ercms_pending_news where  gender_id='2' and year(dob)<'$preYear' and uid!='' and secc_cardholder_temp_id='" . $secc_cardholder_temp_id . "' having id!='' and dob!=''";
            $exe_sql1 = $connection->execute($sql1);
            if ($exe_sql1->rowCount() == 1) {
                $data_sql1 = $exe_sql1->fetch('assoc');
                $hof_id = $data_sql1['id'];
                $update_sql1 = "update hhd_ercms_pending_news set hof=1 where id = '$hof_id'";
                //echo $update_sql1.';1<br/>';
                $exe_update_sql = $connection->execute($update_sql1);
            } else {
                $sql2 = "select id,min(year(dob)) as dob from hhd_ercms_pending_news where  gender_id='1' and year(dob)<'$preYear' and uid!='' and secc_cardholder_temp_id='" . $secc_cardholder_temp_id . "' having id!='' and dob!=''";
                $exe_sql2 = $connection->execute($sql2);
                if ($exe_sql2->rowCount() == 1) {
                    $data_sql2 = $exe_sql2->fetch('assoc');
                    $hof_id = $data_sql2['id'];
                    $update_sql2 = "update hhd_ercms_pending_news set hof=1 where id = '$hof_id'";
                    //echo $update_sql2.';2<br/>';
                    $exe_update_sql = $connection->execute($update_sql2);
                }
            }
        }
        die('Completed');
    }


    function dealerWiseGreencardReportCron()
    {
        $connection = ConnectionManager::get('default');
        //$rgi_district_code='364';
        /*******************  Start : update dealer table ****************/
        $datas1 = TableRegistry::getTableLocator()->get('JsfssSeccCardholders')->find()->select(['dealer_id', 'cards' => 'coalesce(count(rationcard_no),0)', 'members' => 'coalesce(sum(family_count),0)'])->group(['dealer_id'])->toArray();

        $update_dealer = "update dealers set greenHead=0,greenMember=0;";
        $connection->execute($update_dealer);
        foreach ($datas1 as $data1) {
            $greenHead = $data1['cards'];
            $greenMember = $data1['members'];
            $dealer_id = $data1['dealer_id'];
            $update_dealer = "update dealers set greenHead='$greenHead',greenMember='$greenMember' where id='$dealer_id'";
            $connection->execute($update_dealer);
            //echo $update_dealer . '<br/>';
        }
        /*******************  End : update dealer table ****************/

        /*******************  Start : update Jsfss_block_reports table ****************/
        $datas2 = TableRegistry::getTableLocator()->get('Dealers')->find()->select(['rgi_block_code', 'cards' => 'coalesce(sum(greenHead),0)', 'members' => 'coalesce(sum(greenMember),0)'])->group(['rgi_block_code'])->having('rgi_block_code<>""')->toArray();

        foreach ($datas2 as $data2) {
            $greenHead = $data2['cards'];
            $greenMember = $data2['members'];
            $rgi_block_code = $data2['rgi_block_code'];
            $update_block = "update jsfss_block_reports set greenCardHeadCount='$greenHead',greenCardMemberCount='$greenMember' where rgi_block_code='$rgi_block_code'";
            $connection->execute($update_block);
            //echo $update_block . '<br/>';
        }
        /*******************  End : update Jsfss_block_reports table ****************/

        /*******************  Start : update Jsfss_district_reports table ****************/
        $datas3 = TableRegistry::getTableLocator()->get('JsfssBlockReports')->find()->select(['rgi_district_code', 'cards' => 'coalesce(sum(greenCardHeadCount),0)', 'members' => 'coalesce(sum(greenCardMemberCount),0)'])->group(['rgi_district_code'])->toArray();

        foreach ($datas3 as $data3) {
            $greenHead = $data3['cards'];
            $greenMember = $data3['members'];
            $rgi_district_code = $data3['rgi_district_code'];
            echo $update_district = "update jsfss_district_reports set greenCardHeadCount='$greenHead',greenCardMemberCount='$greenMember' where rgi_district_code='$rgi_district_code'";
            $connection->execute($update_district);
            //echo $update_district . '<br/>';
        }
        /*******************  End : update Jsfss_block_reports table ****************/
        die('dealerWiseGreencardReportCron');
    }


    public function updateRgivillagecode()
    {
        $connection = ConnectionManager::get('default');
        /*$sql1 = "select t1.rgi_village_code,t1.ack_no,t1.rgi_block_code as wright_block,t1.rationcard_no from secc_cardholder_add_temps t1 join (select rgi_village_code,rgi_district_code,rgi_block_code from jsfss_village_reports ) t2 on t1.rgi_village_code=t2.rgi_village_code where t1.rgi_block_code !=t2.rgi_block_code ;";*/

        $sql1 = "select t1.rgi_village_code,t1.rationcard_no,t1.rgi_block_code as wright_block,t1.rationcard_no from jsfss_secc_cardholders t1 join (select rgi_village_code,rgi_district_code,rgi_block_code from jsfss_village_reports ) t2 on t1.rgi_village_code=t2.rgi_village_code where t1.rgi_block_code !=t2.rgi_block_code ;";
        $sql1_exe = $connection->execute($sql1);
        $document_name = $sql1_exe->fetchAll('assoc');
        foreach ($document_name as $document) {

            $rgi_village_code = $document['rgi_village_code'];
            $wright_block = $document['wright_block'];
            //$ack_no = $document['ack_no'];
            $rationcard_no = $document['rationcard_no'];
            /*$update_family = "update secc_family_add_temps set rgi_village_code =(select rgi_village_code from secc_village_wards where rgi_block_code='$wright_block' limit 1) where ack_no_ercms='$ack_no';"; */
            $update_family = "update jsfss_secc_cardholders set rgi_village_code =(select rgi_village_code from secc_village_wards where rgi_block_code='$wright_block' limit 1) where rationcard_no='$rationcard_no';";

            $connection->execute($update_family);
            //$update_secc = "update secc_cardholder_add_temps set rgi_village_code =(select rgi_village_code from secc_village_wards where rgi_block_code='$wright_block' limit 1) where ack_no='$ack_no';";
            $update_secc = "update jsfss_secc_families set rgi_village_code =(select rgi_village_code from secc_village_wards where rgi_block_code='$wright_block' limit 1) where rationcard_no='$rationcard_no';";
            $connection->execute($update_secc);
        }
        die;
    }


    public function checkaadharBenificiary($aadhar = NULL, $member_id = NULL)
    {
        $connection = ConnectionManager::get('default');
        $dbRationBackup_conn = ConnectionManager::get('dbRationBackup');

        $aadhar_data = $this->request->getData();
        if ($this->request->is(['ajax'])) {
            $this->autoRender = false;
            $this->viewBuilder()->setLayout('ajax');
            $aadhar = $aadhar_data['aadhar'];
            if (array_key_exists('member_id', $aadhar_data)) {
                $member_id = $aadhar_data['member_id'];
            } else {
                $member_id = '';
            }
        }

        if (!empty($aadhar)) {
            if ($member_id != '') {
                $aadhar_count1 = $connection
                    ->newQuery()
                    ->select(['Acknowledgement No' => 'ack_no_ercms'])
                    ->from('secc_family_add_temps')
                    ->WHERE(['uid' => $aadhar, 'OR' => [['activity_flag' => 0], ['activity_flag' => 1]]])->execute();
                if ($aadhar_count1 && count($aadhar_count1) > 0) {
                    $aadhar_count1 = $aadhar_count1->fetch('assoc');
                    $result = array("valid" => true, "data" => $aadhar_count1);
                    if ($this->request->is(['ajax'])) {
                        echo json_encode($result);
                        die;
                    } else {
                        print_r($result);
                        die;
                        //return json_encode($result);
                    }
                }
            } else {
                //$aadhar_count1 = TableRegistry::getTableLocator()->get('SeccFamilyAddTemps')->find()->select(['Acknowledgement No'=>'ack_no_ercms'])->WHERE(['uid' => $aadhar, 'OR' => ['activity_flag<>0', 'activity_flag<>1']])->first();
                $aadhar_count1 = $connection
                    ->newQuery()
                    ->select(['Acknowledgement No' => 'ack_no_ercms'])
                    ->from('secc_family_add_temps')
                    ->WHERE(['uid' => $aadhar, 'OR' => [['activity_flag' => 0], ['activity_flag' => 1]]])->execute();
                if (count($aadhar_count1) > 0) {
                    $aadhar_count1 = $aadhar_count1->fetch('assoc');
                    $result = array("valid" => true, "data" => $aadhar_count1);
                    if ($this->request->is(['ajax'])) {
                        echo json_encode($result);
                        die;
                    } else {
                        print_r($result);
                        die;
                    }
                }
            }
            $aadhar_count2 = $dbRationBackup_conn
                ->newQuery()
                ->select(['Acknowledgement No' => 'ack_no_ercms'])
                ->from('secc_family_temps')
                ->WHERE(['uid' => $aadhar, 'OR' => [['activity_flag' => 0], ['activity_flag' => 1]]])
                ->execute();
            if ($aadhar_count2 && count($aadhar_count2) > 0) {
                $aadhar_count2 = $aadhar_count2->fetch('assoc');
                $result = array("valid" => true, "data" => $aadhar_count2);
                if ($this->request->is(['ajax'])) {
                    echo json_encode($result);
                    die;
                } else {
                    print_r($result);
                    die;
                }
            }
            $aadhar_count3 = $dbRationBackup_conn
                ->newQuery()
                ->select(['Ration Card No' => 'rationcard_no'])
                ->from('secc_families')
                ->WHERE(['uid' => $aadhar])
                ->execute();
            if ($aadhar_count3 && count($aadhar_count3) > 0) {
                $aadhar_count3 = $aadhar_count3->fetch('assoc');
                $result = array("valid" => true, "data" => $aadhar_count3);
                if ($this->request->is(['ajax'])) {
                    echo json_encode($result);
                    die;
                } else {
                    print_r($result);
                    die;
                }
            }
            $aadhar_count4 = $connection
                ->newQuery()
                ->select(['Ration Card No' => 'rationcard_no'])
                ->from('jsfss_secc_families')
                ->WHERE(['uid' => $aadhar])
                ->execute();
            if ($aadhar_count4 && count($aadhar_count4) > 0) {
                $aadhar_count4 = $aadhar_count4->fetch('assoc');
                $result = array("valid" => true, "data" => $aadhar_count4);
                if ($this->request->is(['ajax'])) {
                    echo json_encode($result);
                    die;
                } else {
                    print_r($result);
                    die;
                }
            } else {
                $result = array("valid" => false);
                if ($this->request->is(['ajax'])) {
                    echo json_encode($result);
                    die;
                } else {
                    print_r($result);
                    die;
                }
            }
        } else {
            $result = array("valid" => false);
            if ($this->request->is(['ajax'])) {
                echo json_encode($result);
                die;
            } else {
                print_r($result);
                die;
            }
        }
    }


    function updateBackups($rgi_district_code = null)
    {
        Configure::write('debug', true);
        $connection = ConnectionManager::get('default');
        $sql1 = "SELECT  t1.id,t1.rationcard_no,t1.ack_no,t1.name,t1.name_sl,t1.cardtype_id,t1.location_id,t1.fathername,t1.fathername_sl, t1.mothername,t1.mothername_sl,t1.caste_id,t1.secc_district_id,t1.secc_block_id,t1.panchayat_id,t1.secc_village_ward_id,t1.rgi_district_code,t1.rgi_block_code,t1.rgi_village_code,t1.res_address,t1.res_address_hn,t1.tolla_mohalla,t1.qtr_plot_no,t1.holding_no,t1.dealer_id,t1.is_lpg,t1.lpg_company,t1.lpg_consumer_no,t1.is_bank,t1.bank_account_no,t1.bank_master_id,t1.branch_master_id,t1.bank_ifsc_code,t1.status,t1.family_count,t1.mobile_count,t1.uid_count,t1.applicationType,t1.applicationType_rule_id,t1.created,t1.old_alone,t1.above_sixty,t1.non_gov,t1.marital_status,t1.disability_status,t1.health_status,t1.beggar,t1.rag_picker,t1.worker,t1.street_vendor,t1.pvtg,t2.requested_mobile FROM jsfss_secc_cardholders t1 LEFT JOIN jsfss_secc_cardholder_add_temps_backups t2 ON t2.rationcard_no = t1.rationcard_no where t1.rgi_district_code='$rgi_district_code' and date(t1.created)<='2021-02-11' and  t2.id IS NULL order by t1.rationcard_no desc";
        $sql1_exe = $connection->execute($sql1);
        $sql1_data = $sql1_exe->fetchAll('assoc');
        foreach ($sql1_data as $data) {
            $doc_sql = "select secc_cardholder_add_temp_id from secc_family_document_add_temps where ack_no = '" . $data['ack_no'] . "' order by date(created) desc limit 1";
            $sql4_exe = $connection->execute($doc_sql);
            $sql4_data = $sql4_exe->fetch('assoc');
            $secc_cardholder_add_temp_id = $sql4_data['secc_cardholder_add_temp_id'];
            //$secc_family_add_temp_id 		= $data['secc_family_add_temp_id'];
            $ack_no = $data['ack_no'];
            $requested_mobile = $data['requested_mobile'];
            $jsfss_secc_cardholder_id = $data['id'];
            $rationcard_no = $data['rationcard_no'];
            $name = $data['name'];
            $name_sl = $data['name_sl'];
            $location_id = ($data['location_id'] == '') ? 0 : $data['location_id'];
            $cardtype_id = $data['cardtype_id'];
            $fathername = $data['fathername'];
            $fathername_sl = $data['fathername_sl'];
            $mothername = $data['mothername'];
            $mothername_sl = $data['mothername_sl'];
            $caste_id = $data['caste_id'];
            $secc_district_id = $data['secc_district_id'];
            $secc_block_id = $data['secc_block_id'];
            $panchayat_id = $data['panchayat_id'];
            $secc_village_ward_id = $data['secc_village_ward_id'];
            $rgi_district_code = $data['rgi_district_code'];
            $rgi_block_code = $data['rgi_block_code'];
            $rgi_village_code = $data['rgi_village_code'];
            $res_address = $data['res_address'];
            $res_address_hn = $data['res_address_hn'];
            $tolla_mohalla = $data['tolla_mohalla'];
            $qtr_plot_no = $data['qtr_plot_no'];
            $holding_no = $data['holding_no'];
            $dealer_id = $data['dealer_id'];
            $is_lpg = $data['is_lpg'];
            $lpg_company = $data['lpg_company'];
            $lpg_consumer_no = $data['lpg_consumer_no'];
            $is_bank = $data['is_bank'];
            $bank_account_no = $data['bank_account_no'];
            $bank_master_id = $data['bank_master_id'];
            $branch_master_id = $data['branch_master_id'];
            $bank_ifsc_code = $data['bank_ifsc_code'];
            $family_count = $data['family_count'];
            $applicationType = $data['applicationType'];
            $applicationType_rule_id = $data['applicationType_rule_id'];
            $occupationId = 0;
            $activity_type_id = '1';
            $activity_flag = '3';
            $dso_modifiedDate = $data['created'];
            $requested_mobile = $data['requested_mobile'];
            $application_status = '10';
            $old_alone = $data['old_alone'];
            $non_gov = ($data['non_gov'] == '') ? 0 : $data['non_gov'];
            $above_sixty = ($data['above_sixty'] == '') ? 0 : $data['above_sixty'];
            $marital_status = ($data['marital_status'] == '') ? 0 : $data['marital_status'];
            $disability_status = ($data['disability_status'] == '') ? 0 : $data['disability_status'];
            $health_status = ($data['health_status'] == '') ? 0 : $data['health_status'];
            $beggar = ($data['beggar'] == '') ? 0 : $data['beggar'];
            $rag_picker = ($data['rag_picker'] == '') ? 0 : $data['rag_picker'];
            $worker = ($data['worker'] == '') ? 0 : $data['worker'];
            $street_vendor = ($data['street_vendor'] == '') ? 0 : $data['street_vendor'];
            $pvtg = ($data['pvtg'] == '') ? 0 : $data['pvtg'];
            $bank_master_id = ($data['bank_master_id'] == '') ? 0 : $data['bank_master_id'];
            $branch_master_id = ($data['branch_master_id'] == '') ? 0 : $data['branch_master_id'];
            $panchayat_id = ($data['panchayat_id'] == '') ? 0 : $data['panchayat_id'];
            $dso_modifiedDate = $data['created'];
            $bso_modifiedDate = date('Y-m-d', strtotime($data['created'] . ' - 2 days'));
            if ($beggar == 1) {
                $occupationId = '6';
            } else if ($rag_picker == 1) {
                $occupationId = '7';
            } else if ($worker == 1) {
                $occupationId = '8';
            } else if ($street_vendor == 1) {
                $occupationId = '9';
            } else {
                $occupationId = '0';
            }
            //debug($data);
            $check_123 = "select id from jsfss_secc_cardholder_add_temps_backups where id='$secc_cardholder_add_temp_id'";
            $check_exe_123 = $connection->execute($check_123);
            //debug($check_exe_123->rowCount());die;
            if ($check_exe_123->rowCount() == 0) {

                $insert_sql1 = "insert into jsfss_secc_cardholder_add_temps_backups
			(id,ack_no,rationcard_no,name,name_sl,fathername,fathername_sl,mothername,mothername_sl,cardtype_id,caste_id,secc_district_id,secc_block_id,panchayat_id, secc_village_ward_id, rgi_district_code, rgi_block_code, rgi_village_code, res_address, res_address_hn, tolla_mohalla, qtr_plot_no,holding_no,dealer_id, is_lpg,lpg_company,lpg_consumer_no,is_bank,bank_account_no,bank_master_id,branch_master_id,bank_ifsc_code,applicationType,applicationType_rule_id,occupationId,activity_type_id,activity_flag,bso_modifiedDate,dso_modifiedDate,requested_mobile,application_status,old_alone,non_gov,above_sixty,marital_status,disability_status,health_status,beggar,rag_picker,worker,street_vendor,pvtg,location_id)
			values 	('$secc_cardholder_add_temp_id','$ack_no','$rationcard_no','$name','$name_sl','$fathername','$fathername_sl','$mothername','$mothername_sl',$cardtype_id,'$caste_id','$secc_district_id','$secc_block_id','$panchayat_id','$secc_village_ward_id','$rgi_district_code','$rgi_block_code','$rgi_village_code','$res_address','$res_address_hn','$tolla_mohalla','$qtr_plot_no','$holding_no','$dealer_id','$is_lpg','$lpg_company','$lpg_consumer_no','$is_bank','$bank_account_no','$bank_master_id','$branch_master_id','$bank_ifsc_code',null,null,'$occupationId','$activity_type_id','$activity_flag','$bso_modifiedDate','$dso_modifiedDate','$requested_mobile','$application_status','$old_alone','$non_gov','$above_sixty','$marital_status','$disability_status','$health_status','$beggar','$rag_picker','$worker','$street_vendor','$pvtg','$location_id')";


                $insert_sql2 = "insert into jsfss_secc_family_add_temps_backups (id,ack_no_ercms,secc_cardholder_add_temp_id,dso_modifiedDate,bso_modifiedDate,rationcard_no,name,name_sl,fathername,fathername_sl,mothername,mothername_sl, rgi_district_code, rgi_block_code, rgi_village_code, relation_id, gender_id, dob, mobile, uid, uid_verified, hof ,marital_status,disability_status, health_status,activity_type_id,activity_flag,requested_mobile,created) select secc_family_add_temp_id,'$ack_no','$secc_cardholder_add_temp_id',created,DATE_SUB(DATE(created), INTERVAL 1 DAY),'$rationcard_no',name,name_sl,fathername,fathername_sl,mothername,mothername_sl, rgi_district_code, rgi_block_code, rgi_village_code, relation_id, gender_id, dob, mobile, uid, '1', hof, marital_status, disability_status, health_status,'1','3','$requested_mobile',DATE_SUB(DATE(created), INTERVAL 2 DAY) from jsfss_secc_families where rationcard_no = '$rationcard_no' and secc_family_add_temp_id is not NULL and NOT EXISTS (
			SELECT id FROM jsfss_secc_family_add_temps_backups WHERE id = jsfss_secc_families.secc_family_add_temp_id
		)";
                echo $insert_sql1 . '</br>' . $insert_sql2 . '</br>';
                $connection->begin();
                $insert_sql1_exe = $connection->execute($insert_sql1);
                echo $cnt = $insert_sql1_exe->rowCount();
                if ($cnt > 0) {
                    $insert_sql2_exe = $connection->execute($insert_sql2);
                }
                $connection->commit();
                //echo  $insert_sql1.'<br/>';die;
            }
        }
        die('Closed');
    }

    public function updateSeccFamilies()
    {

        Configure::write('debug', true);
        $connection = ConnectionManager::get('default');
        $dbConObj = $this->defaultDbConnect();
        /*$sql="SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'jsfss_secc_families'
            ORDER BY ORDINAL_POSITION;";
            $data=mysqli_query($dbConObj,$sql);
            while($x=mysqli_fetch_array($data)){
            echo $col=$x['COLUMN_NAME'];
            echo ',';
            }*/


        $connection = ConnectionManager::get('default');
        $sec = "select t1.* from jsfss_secc_cardholders t1 left join jsfss_secc_families t2 on t1.rationcard_no=t2.rationcard_no where t2.id is null";
        $secRes = $connection->execute($sec);

        foreach ($secRes as $val) {
            $rationcard_no = $val['rationcard_no'];
            $jsfss_secc_cardholder_id = $val['id'];
            $rgi_district_code = $val['rgi_district_code'];
            $rgi_block_code = $val['rgi_block_code'];
            $rgi_village_code = $val['rgi_village_code'];
            $name = $val['name'];
            $name_sl = $val['name_sl'];
            $fathername = $val['fathername'];
            $fathername_sl = $val['fathername_sl'];
            $mothername = $val['mothername'];
            $mothername_sl = $val['mothername_sl'];
            $mobile = $val['mobile'];
            $bank_master_id = $val['bank_master_id'];
            $branch_master_id = $val['branch_master_id'];
            $bank_account_no = $val['bank_account_no'];

            $created = $val['created'];
            $modified = $val['modified'];
            $created_by = $val['created_by'];
            $modified_by = $val['modified_by'];
            $disability_status = $val['disability_status'];
            $health_status = $val['health_status'];
            $marital_status = $val['marital_status'];
            $bank_master_id = ($data['bank_master_id'] == '') ? 0 : $data['bank_master_id'];
            $branch_master_id = ($data['branch_master_id'] == '') ? 0 : $data['branch_master_id'];
            $panchayat_id = ($data['panchayat_id'] == '') ? 0 : $data['panchayat_id'];

            $branchName = str_replace("'", "", $branchName);
            $mothername_sl = str_replace("'", "", "$mothername_sl");
            $fathername_sl = str_replace("'", "", "$fathername_sl");
            $name_sl = str_replace("'", "", "$name_sl");


            $sqlFamilyInsert = "insert into jsfss_secc_families (id,rationcard_no,jsfss_secc_cardholder_id,secc_family_add_temp_id,rgi_district_code,rgi_block_code,rgi_village_code,name,name_sl,fathername,fathername_sl,mothername,mothername_sl,relation_id,relation_sl,gender_id,cardtype_id,dob,mobile,uid,uid_verified,bank_master_id,branch_master_id,accountNo,hof,created,modified,created_by,modified_by,disability_status,health_status,marital_status)
	values(uuid(),'$rationcard_no','$jsfss_secc_cardholder_id',uuid(),'$rgi_district_code','$rgi_block_code','$rgi_village_code','$name','$name_sl','$fathername','$fathername_sl','$mothername','$mothername_sl','1',null,'2','8','2000-01-01','$mobile',null,'1','$bank_master_id','$branch_master_id','$bank_account_no','1','$created','$modified','$created_by','$modified_by','$disability_status','$health_status','$marital_status')";
            $connection->execute($sqlFamilyInsert);

            echo $sqlFamilyInsert . '<br/>';
        }

        die('completed');
    }


    public function testMessage($rgi_district_code)
    {

        //Configure::write('debug', 'true');

        $table = "cardholder_transaction_2_8_backups";
        $month = "February";

        $connection = ConnectionManager::get('dbRationMaster');
        $connectiongreen = ConnectionManager::get('default');

        $getRationQry = $connection->prepare("select distinct rationcard_no from  $table  where  rgi_district_code=? and cardtype_id='8' and totalquantity=balance ");
        $getRationQry->bindValue(1, $rgi_district_code);
        $getRationQry->execute();
        $geRation = $getRationQry->fetchAll('assoc');
        if (!empty($geRation)) {
            foreach ($geRation as $mKey => $mVal) {
                $id = Text::uuid();
                $templateId = "1302156645748113019";
                $rationNo = $mVal['rationcard_no'];

                $getMobileQry = $connectiongreen->prepare("select mobile from jsfss_secc_families where rationcard_no=?  and mobile is not null limit 1");
                $getMobileQry->bindValue(1, $rationNo);
                $getMobileQry->execute();
                $getMobile = $getMobileQry->fetchAll('assoc');
                $mobile = $getMobile[0]['mobile'];

                $cardTypeName = "Green";
                $message = '';
                $currYr = date('Y');
                $currMonth = date('m');
                $lastDate = cal_days_in_month(CAL_GREGORIAN, $currMonth, $currYr);
                $date = $lastDate . '/' . $currMonth . '/' . $currYr;
                $created = date('Y-m-d H:i:s');
                $msg = " ?????? {" . $cardTypeName . "} ????? ???? : {" . $rationNo . "} , {#" . $month . "} ?? ???? {" . $date . "} ?? ??? ??? | ??? ?????? ??? ???? ???? 1967 ?? ???? ????? | JHPDS";
                //$data = $this->sendSingleSMS($message, $mobile, $cardTypeName, $rationNo, $month);
                $data = false;
                if ($data) {
                    //echo "if";die;
                    $send_flag = 1;
                    $insQry = $connection->prepare("insert into sms_logs(id,msg,mobile,template_id,send_flag,created) values(?,?,?,?,?,?)");
                    $insQry->bindValue(1, $id);
                    $insQry->bindValue(2, $msg);
                    $insQry->bindValue(3, $mobile);
                    $insQry->bindValue(4, $templateId);
                    $insQry->bindValue(5, $send_flag);
                    $insQry->bindValue(6, $created);
                    $ins = $insQry->execute();
                    if ($ins) {
                        echo "Message sent successfully";
                        die;
                    } else {
                        return "Message not sent ";
                    }
                } else {
                    //echo "else";die;
                    $send_flag = 0;
                    $insQry = $connection->prepare("insert into sms_logs(id,msg,mobile,template_id,send_flag,created) values(?,?,?,?,?,?)");
                    $insQry->bindValue(1, $id);
                    $insQry->bindValue(2, $msg);
                    $insQry->bindValue(3, $mobile);
                    $insQry->bindValue(4, $templateId);
                    $insQry->bindValue(5, $send_flag);
                    $insQry->bindValue(6, $created);
                    $ins = $insQry->execute();
                    if ($ins) {
                        echo "Message Not sent successfully";
                        die;
                    } else {
                        //return "Message not sent ";
                    }
                }
            }
        }
    }


    public function reports()
    {    //Configure::write('debug', 'true');
        $this->viewBuilder()->setLayout('report');
        $connection = ConnectionManager::get('default');
        $currentDate = date('d-m-Y'); //die();
        $reports = $connection->execute("SELECT secc_district_reports.name,secc_district_reports.add_member_upper_limit, secc_district_reports.add_member_upper,jsfss_district_reports.districtName, jsfss_district_reports.add_green_member_upper_limit,jsfss_district_reports.add_green_member_upper
	FROM secc_district_reports
	INNER JOIN jsfss_district_reports ON secc_district_reports.rgi_district_code=jsfss_district_reports.rgi_district_code order by secc_district_reports.name")->fetchAll('assoc');
        $this->set(compact('currentDate', 'reports'));
    }


    public function greenReports()
    {
        $connection = ConnectionManager::get('default');
        // $this->reportsHome();
        $this->viewBuilder()->setLayout('report');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $districtId = $session_data['Auth']['User']['rgi_district_code'];
        //die();
        $groupId = $session_data['Auth']['User']['group_id'];

        $districtData = TableRegistry::get('SeccDistricts');
        $query = $districtData->find('list', [
            'keyField' => 'rgi_district_code',
            'valueField' => 'name',
            'conditions' => ['SeccDistricts.rgi_district_code=' . "'" . $districtId . "'"],
        ]);
        $districts = $query->toArray();
        //echo "<pre>";print_r($districts);die;
        $districtName = $districts[$districtId];
        $blocks = TableRegistry::get('SeccBlocks');
        $query = $blocks->find('list', [
            'keyField' => 'rgi_block_code',
            'valueField' => 'name',
            'conditions' => ['SeccBlocks.rgi_district_code=' . "'" . $districtId . "'"],
        ]);
        $blocks = $query->toArray();
        //echo "<pre>";print_r($blocks);die;
        $this->set(compact('districtName', 'blocks'));
    }


    public function greenReportData()
    {
        $connection = ConnectionManager::get('default');
        $this->viewBuilder()->setLayout('report');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $districtId = $session_data['Auth']['User']['rgi_district_code'];
        $groupId = $session_data['Auth']['User']['group_id'];
        // die('lll');

        $districtName = $this->getDistrictName($districtId);

        if ($this->getRequest()->is('post')) {
            $request_data = $this->getRequest()->getData();
            $rgi_block_code = $request_data['rgi_block_code'];
            $month_year = $request_data['month_year'];
            $monthYr = explode('-', $month_year);
            $month = (int)$monthYr[0];
            $year = $monthYr[1];

            $blockName = $this->getBlockName($districtId, $rgi_block_code);
            $years = TableRegistry::get('years');
            $query = $years->find('list', [
                'keyField' => 'name',
                'valueField' => 'id'
            ]);
            $years = $query->toArray();


            $year_id = $years[$year];
            $months = TableRegistry::get('months');
            $query = $months->find('list', [
                'keyField' => 'id',
                'valueField' => 'name',
                'conditions' => ['months.id=' . "'" . $month . "'"],
            ]);
            $months = $query->toArray();


            $monthName = $months[$month];
            $dealers = TableRegistry::get('dealers');
            $query = $dealers->find('list', [
                'keyField' => 'id',
                'valueField' => 'name',
                'order by' => 'name'
            ]);
            $dealers = $query->toArray();


            $district = TableRegistry::get('SeccDistricts');
            $query = $district->find('list', [
                'keyField' => 'rgi_district_code',
                'valueField' => 'name',
            ]);
            $district = $query->toArray();


            $block = TableRegistry::get('SeccBlocks');
            $query = $block->find('list', [
                'keyField' => 'rgi_block_code',
                'valueField' => 'name',
            ]);
            $block = $query->toArray();

            // echo "Select rgi_district_code,rgi_block_code,dealer_id,commodity_received,commodity_sold,ct_balance from fps_stocks_greens where rgi_district_code='$districtId' and rgi_block_code='$rgi_block_code' and month_id ='$month' and year_id='$year_id'";
            // die;

            $data = $connection->prepare("Select rgi_district_code,rgi_block_code,dealer_id,commodity_received,commodity_sold,ct_balance from fps_stocks_greens where rgi_district_code=? and rgi_block_code=? and month_id =? and year_id=?  order by dealer_id");
            $data->bindValue(1, $districtId);
            $data->bindValue(2, $rgi_block_code);
            $data->bindValue(3, $month);
            $data->bindValue(4, $year_id);
            $data->execute();
            $reports = $data->fetchAll('assoc');
        }
        $this->set(compact('monthName', 'year', 'reports', 'dealers', 'district', 'block', 'month', 'districtName', 'blockName'));
    }

    function districtWeighingReport()
    {
        //Configure::write('debug', 'true');
        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
            $rgi_district_code = $this->request->getSession()->read('Auth.User.rgi_district_code');
        } else {
            return $this->redirect($this->Auth->logout());
        }

        if ($group_id == 12 || $group_id == 22) {
            $this->viewBuilder()->setLayout('report');
            $show_div = false;
            $dist_weighing = array();
            $block_weighing = array();
            $dealer_weighing = array();
            if ($this->getRequest()->is('post')) {
                $show_div = true;
                $data = $this->getRequest()->getData();
                $rgi_district_code = $this->appDecryptData($this->getRequest()->getData('rgi_district_code'));
                $rgi_block_code = $this->appDecryptData($this->getRequest()->getData('rgi_block_code'));
                //debug($data);die;
                $month_year = $this->getRequest()->getData('month_year');
                $monthYr = explode('-', $month_year);
                $month = (int)$monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::getTableLocator()->get('Years')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['name' => $year]])->first();
                $yearId = $yearsData->id;
                $yearName = $yearsData->name;
                //$yearId         = 8;

                $monthsData = TableRegistry::getTableLocator()->get('Months')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['id' => $month]])->first();
                $monthId = $monthsData->id;
                $monthName = $monthsData->name;
                //$monthId        = 4;
                //debug($data);die;
                if ($this->getRequest()->getData('report_by') == '1' && $this->getRequest()->getData('rgi_district_code') != '') {
                    $rgi_district_code = $this->appDecryptData($this->getRequest()->getData('rgi_district_code'));
                    $block_weighing = TableRegistry::getTableLocator()->get('BlockCityMonthlyReports')->find('all', ['fields' => ['rgi_block_code', 'name', 'dealer_weighing_count', 'weighing_parcel_lifted', 'weighing_full_lifted'], 'conditions' => ['rgi_district_code' => $rgi_district_code, 'month_id' => $monthId, 'year_id' => $yearId]])->toArray();
                } elseif ($this->getRequest()->getData('report_by') == '2' && $this->getRequest()->getData('rgi_block_code') != '') {
                    $rgi_block_code = $this->appDecryptData($this->getRequest()->getData('rgi_block_code'));
                    $dealer_weighing = TableRegistry::getTableLocator()->get('DealerMonthlyReports')->find('all', ['fields' => ['id', 'name', 'dealer_weighing', 'weighing_parcel_lifted', 'weighing_full_lifted'], 'conditions' => ['rgi_block_code' => $rgi_block_code, 'month_id' => $monthId, 'year_id' => $yearId]])->toArray();
                } else {
                    if ($group_id == 12) {
                        $rgi_district_code = $this->request->getSession()->read('Auth.User.rgi_district_code');
                        //$condition = ['rgi_district_code'=> $rgi_district_code, 'month_id' => $monthId, 'year_id'=>$yearId] ;
                        $condition = ['month_id' => $monthId, 'year_id' => $yearId];
                    } else if ($group_id == 22) {
                        $condition = ['month_id' => $monthId, 'year_id' => $yearId];
                    }
                    $dist_weighing = TableRegistry::getTableLocator()->get('DistrictMonthlyReports')->find('all', ['fields' => ['rgi_district_code', 'name', 'dealer_weighing_count', 'weighing_parcel_lifted', 'weighing_full_lifted'], 'conditions' => $condition, 'order' => 'name'])->toArray();
                }
            }
            $this->set(compact('districts', 'dist_weighing', 'block_weighing', 'dealer_weighing', 'districtName', 'monthName', 'yearName', 'show_div', 'rgi_district_code', 'rgi_block_code'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }

    function transactionReport()
    {
        //Configure::write('debug', 'true');
        if ($this->request->getSession()->check('Auth')) {
            $group_id = $this->request->getSession()->read('Auth.User.group_id');
            $rgi_district_code = $this->request->getSession()->read('Auth.User.rgi_district_code');
        } else {
            return $this->redirect($this->Auth->logout());
        }

        if ($group_id == 12 || $group_id == 22) {
            $this->viewBuilder()->setLayout('report');
            $show_div = false;
            $dist_weighing = array();
            $block_weighing = array();
            $dealer_weighing = array();
            if ($this->getRequest()->is('post')) {
                $show_div = true;
                $data = $this->getRequest()->getData();
                $rgi_district_code = $this->appDecryptData($this->getRequest()->getData('rgi_district_code'));
                $rgi_block_code = $this->appDecryptData($this->getRequest()->getData('rgi_block_code'));
                //debug($data);die;
                $month_year = $this->getRequest()->getData('month_year');
                $monthYr = explode('-', $month_year);
                $month = (int)$monthYr[0];
                $year = $monthYr[1];

                $yearsData = TableRegistry::getTableLocator()->get('Years')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['name' => $year]])->first();
                $yearId = $yearsData->id;
                $yearName = $yearsData->name;
                //$yearId         = 7;

                $monthsData = TableRegistry::getTableLocator()->get('Months')->find('all', ['fields' => ['id', 'name'], 'conditions' => ['id' => $month]])->first();
                $monthId = $monthsData->id;
                $monthName = $monthsData->name;
                //$monthId        = 4;
                //debug($data);die;
                if ($this->getRequest()->getData('report_by') == '1' && $this->getRequest()->getData('rgi_district_code') != '') {
                    $rgi_district_code = $this->appDecryptData($this->getRequest()->getData('rgi_district_code'));
                    $block_transaction = TableRegistry::getTableLocator()->get('BlockCityMonthlyReports')->find('all', ['fields' => ['rgi_block_code', 'name', 'rice_allocated', 'wheat_allocated', 'transaction_count', 'transaction_count_white', 'green_transaction_count', 'interDistrictPortability', 'intraDistrictPortability', 'impds_ph_transaction_count', 'impds_aay_transaction_count', 'impds_out_jhkd', 'uidTransactionCount', 'otpTransactionCount', 'upwad_count'], 'conditions' => ['rgi_district_code' => $rgi_district_code, 'month_id' => $monthId, 'year_id' => $yearId]])->toArray();
                } elseif ($this->getRequest()->getData('report_by') == '2' && $this->getRequest()->getData('rgi_block_code') != '') {
                    $rgi_block_code = $this->appDecryptData($this->getRequest()->getData('rgi_block_code'));
                    $dealer_transaction = TableRegistry::getTableLocator()->get('DealerMonthlyReports')->find('all', ['fields' => ['id', 'name', 'rice_allocated', 'wheat_allocated', 'transaction_count', 'transaction_count_white', 'green_transaction_count', 'interDistrictPortability', 'intraDistrictPortability', 'impds_ph_transaction_count', 'impds_aay_transaction_count', 'impds_out_jhkd', 'uidTransactionCount', 'otpTransactionCount', 'upwad_count'], 'conditions' => ['rgi_block_code' => $rgi_block_code, 'month_id' => $monthId, 'year_id' => $yearId]])->toArray();
                } else {
                    if ($group_id == 12) {
                        $rgi_district_code = $this->request->getSession()->read('Auth.User.rgi_district_code');
                        //$condition = ['rgi_district_code'=> $rgi_district_code, 'month_id' => $monthId, 'year_id'=>$yearId] ;
                        $condition = ['month_id' => $monthId, 'year_id' => $yearId];
                    } else if ($group_id == 22) {
                        $condition = ['month_id' => $monthId, 'year_id' => $yearId];
                    }
                    $dist_transaction = TableRegistry::getTableLocator()->get('DistrictMonthlyReports')->find('all', ['fields' => ['rgi_district_code', 'name', 'rice_allocated', 'wheat_allocated', 'transaction_count', 'transaction_count_white', 'green_transaction_count', 'interDistrictPortability', 'intraDistrictPortability', 'impds_ph_transaction_count', 'impds_aay_transaction_count', 'impds_out_jhkd', 'uidTransactionCount', 'otpTransactionCount', 'upwad_count'], 'conditions' => $condition, 'order' => 'name'])->toArray();
                }
            }
            $this->set(compact('districts', 'dist_transaction', 'block_transaction', 'dealer_transaction', 'districtName', 'monthName', 'yearName', 'show_div', 'rgi_district_code', 'rgi_block_code'));
        } else {
            $this->Flash->error(__('Unauthorised Access.'));
            return $this->redirect($this->Auth->logout());
        }
    }


    // Analytical report 1 for District
    public function distAnalytical()
    {

        $connection = ConnectionManager::get('default');
        $this->viewBuilder()->setLayout('report');
        $districts = $this->getDistricts();
        $districtName = '';
        $distRepo = '';
        $monthYr = '';
        $monthId = '';
        $yearId = '';
        $distAnaCounts = '';

        if ($this->getRequest()->is('post')) {

            $data = $this->getRequest()->getData();

            if (array_key_exists('month_id', $data) && array_key_exists('year_id', $data)) {
                $monthId = $data['month_id'];
                $yearId = $data['year_id'];
            } else {
                $monthYr = $data['mnthYr'];
                $monthYr = explode('-', $monthYr);
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
            $distRepo = [];
            foreach ($distAnaCounts as $vKey => $vVal) {
                $distRepo[$vVal['rgi_district_code']] = $vVal['name'];
            }
        }
        $this->set(compact('districts', 'distRepo', 'districtName', 'monthYr', 'monthId', 'yearId', 'distAnaCounts'));
    }


    //for Block
    public function blockAnalytical()
    {
        $connection = ConnectionManager::get('default');
        $this->viewBuilder()->setLayout('report');
        $districts = $this->getDistricts();
        $rgi_district_code = '';
        $year_id = '';
        $month_id = '';
        $blkAnaCount = '';
        $session_data = $this->getRequest()->getSession()->read();
        $month_id = $session_data['mnthId'];
        $year_id = $session_data['yrId'];

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
            $rgi_district_code = $request_data['rgi_dist_code'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);


            // echo "select rgi_block_code,name,online_count,offline_count,phHead,phMember,aayHead,aayMember,whiteHead,whiteMember,greenHead,greenMember,rice_lifted,rice_allocated,wheat_lifted,wheat_allocated,sugar_lifted,sugar_allocated,salt_lifted,salt_allocated,k_oil_lifted,k_oil_allocated from block_city_monthly_reports where rgi_district_code='$rgi_district_code' and month_id='$month_id' and year_id='$year_id'";

            // die;


            $blkAnaCount = $connection->prepare("select rgi_block_code,name,online_count,offline_count,phHead,phMember,aayHead,aayMember,whiteHead,whiteMember,greenHead,greenMember,rice_lifted,rice_allocated,wheat_lifted,wheat_allocated,sugar_lifted,sugar_allocated,salt_lifted,salt_allocated,k_oil_lifted,k_oil_allocated from block_city_monthly_reports where rgi_district_code=? and month_id=? and year_id=?;");
            $blkAnaCount->bindValue(1, $rgi_district_code);
            $blkAnaCount->bindValue(2, $month_id);
            $blkAnaCount->bindValue(3, $year_id);
            $blkAnaCount->execute();
            $blkAnaCounts = $blkAnaCount->fetchAll('assoc');
            $distRepo = [];
            foreach ($blkAnaCounts as $vKey => $vVal) {
                $distRepo[$vVal['rgi_block_code']] = $vVal['name'];
            }
        }
        $this->set(compact('blocks', 'distRepo', 'districtName', 'rgi_district_code', 'year_id', 'month_id', 'blkAnaCount'));
    }


    //for Dealer
    public function dealerAnalytical()
    {
        $connection = ConnectionManager::get('default');
        $this->viewBuilder()->setLayout('report');
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
            $rgi_district_code = $request_data['rgi_dist_code'];
            $rgi_block_code = $request_data['rgi_blk_code'];
            $blocks = $this->getBlocksByDistrict($rgi_district_code);
            $districtName = $this->getDistrictName($rgi_district_code);
            $blockName = $this->getBlockName($rgi_block_code);

            $dlrAnaCount = $connection->prepare("select name,dealerType,phHead,phMember,aayHead,aayMember,whiteHead,whiteMember,greenHead,greenMember,rice_lifted,rice_allocated,wheat_lifted,wheat_allocated,sugar_lifted,sugar_allocated,salt_lifted,salt_allocated,k_oil_lifted,koil_allocated from dealer_monthly_reports where rgi_block_code =? and month_id=? and year_id=?");
            $dlrAnaCount->bindValue(1, $rgi_block_code);
            $dlrAnaCount->bindValue(2, $month_id);
            $dlrAnaCount->bindValue(3, $year_id);
            $dlrAnaCount->execute();
            $dealerList = $dlrAnaCount->fetchAll('assoc');
        }
        $this->set(compact('districts', 'dealerList', 'blocks', 'rgi_district_code', 'rgi_block_code', 'districtName', 'blockName', 'year_id', 'month_id'));
    }


}
