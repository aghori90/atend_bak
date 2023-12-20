<?php

function NewTransactionComodityUpdate2_ANNA($token = null, $flag = null, $yearId = null)
{
//die();
    if ($token == '3458709536') {
        $pre = mysql_query("select MONTH(now()) cur_mnth, MONTH(now() - INTERVAL 1 month) pre_mnth,YEAR(now()) cur_yr, YEAR(now() - INTERVAL 1 month) pre_yr");
        $row = mysql_fetch_array($pre);
        $mnth = $row['cur_mnth'];
        $preMnth = $row['pre_mnth'];
        $yr = $row['cur_yr'];
        $preYr = $row['pre_yr'];
        $this->loadModel('Year');
        /*
            $yearData=$this->Year->find('all',array('conditions'=>array('Year.name='."'".$yr."'" ),'fields'=>array('Year.id'), 'recursive'=>-1));
            $yearId=$yearData[0]['Year']['id'];
        */
        $yearData1 = $this->Year->find('all', array('conditions' => array('Year.name=' . "'" . $preYr . "'"), 'fields' => array('Year.id'), 'recursive' => -1));
        $preYearId = $yearData1[0]['Year']['id'];


// chnages for emer
        if ($flag == 1) {
            $mnth = $mnth;
            $yearId = $yearId;
        } else if ($flag == 2) {
            $mnth = $preMnth;
            $yearId = $preYearId;
        }
        $mnth = $flag;
        $yearId = $yearId;

//$mnth='6';


//$rgi_dist_code=$rgi_dist_code;
//$table="transaction_".$mnth."_6_backups";
////$table="transaction_2017_backups";
        $table = "transaction_" . $mnth . "_" . $yearId . "_backups";
//die("A");

        echo "Month=" . $mnth;
        echo "YEar=" . $yearId;
        echo '</br>';
        /*
        $qry1=mysql_query("update dealer_monthly_reports set rice_lifted=0,wheat_lifted=0,k_oil_lifted=0,salt_lifted=0,sugar_lifted=0,daal_lifted=0,pmgkay_rice=0,pmgkay_wheat=0,pmgkay_chana=0 where month_id='$mnth' and year_id='$yearId';");
        $qry1=mysql_query("update district_monthly_reports set rice_lifted=0,wheat_lifted=0,k_oil_lifted=0,salt_lifted=0,sugar_lifted=0,daal_lifted=0,pmgkay_rice=0,pmgkay_wheat=0,pmgkay_chana=0 where month_id='$mnth' and year_id='$yearId';");
        $qry1=mysql_query("update block_city_monthly_reports set rice_lifted=0,wheat_lifted=0,k_oil_lifted=0,salt_lifted=0,sugar_lifted=0,daal_lifted=0,pmgkay_rice=0,pmgkay_wheat=0,pmgkay_chana=0 where month_id='$mnth' and year_id='$yearId';");
        */
        $data = 0;

//$conn=$this->dbConnectSlave();
        if ($mnth <= 6 and $yearId == 8) {
//die("A");
//$conn=$this->dbRationBackupConnectApwad();
            $conn = $this->dbConnectBackup130();
        } else {
            $conn = $this->dbConnectHhd();//HHD db object
        }
        $qq = "select dealer_id,item_id,sum(liftedquantity) from $table where month_id='$mnth' and year_id='$yearId' and  (cardtype_id='5' or cardtype_id='6')   group by dealer_id,item_id ;";
        //$qq="select dealer_id,item_id,sum(liftedquantity) from $table where month_id='$mnth' and year_id='$yearId' and  (cardtype_id='5' or cardtype_id='6') and flag='O' group by dealer_id,item_id;";
//echo $qq;

        $sql12 = mysqli_query($conn, $qq);
        mysqli_close($conn);

        $row12 = mysqli_fetch_array($sql12);
        // do while will run item times means 4 times
        do {
            $dealerId = $row12['dealer_id'];
            $item = $row12['item_id'];
            $cardtype_id = $row12['cardtype_id'];
            $data = $item;


            if ($data != 0) {
                $cc = 0;
                $commcount = $row12['sum(liftedquantity)'];
                //echo '<br>'.$commcount;
                $cc = 0;

                if ($item == 1) {
                    $qq = "update dealer_monthly_reports set rice_lifted='$commcount' where dealer_id='$dealerId' and month_id='$mnth' and year_id='$yearId';";
                    mysql_query($qq);
                    $cc = mysql_affected_rows();
                    if ($cc == 0)
                        echo $qq;
                } else if ($item == 2) {
                    $qq = "update dealer_monthly_reports set wheat_lifted='$commcount' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
                    mysql_query($qq);
                    $cc = mysql_affected_rows();
                    if ($cc == 0)
                        echo $qq;
                } else if ($item == 3) {
                    $query = mysql_query("update dealer_monthly_reports set k_oil_lifted=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';");
                } else if ($item == 4) {
                    $query = mysql_query("update dealer_monthly_reports set salt_lifted=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';");
                } else if ($item == 5) {
                    $query = mysql_query("update dealer_monthly_reports set sugar_lifted=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';");
                } else if ($item == 6) {
                    $qq = "update dealer_monthly_reports set pmgkay_rice=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId'";
                    mysql_query($qq);
                    $cc = mysql_affected_rows();
                    if ($cc == 0)
                        echo $qq;
                } else if ($item == 7) {
                    $query = mysql_query("update dealer_monthly_reports set daal_lifted=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';");
                } else if ($item == 9) {
                    $qq = "update dealer_monthly_reports set pmgkay_wheat=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
                    $query = mysql_query($qq);
                    $cc = mysql_affected_rows();
                    if ($cc == 0)
                        echo $qq;
                } else if ($item == 10) {
                    $query = mysql_query("update dealer_monthly_reports set pmgkay_chana=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';");
                }


                $data = 0;
            }//if data  closed

        }// for loop of hhd_masters
        while ($row12 = mysqli_fetch_assoc($sql12));

//Update on district_reports ============================================================================


        $sql1 = "select rgi_block_code,sum(rice_lifted) as rice_lifted,sum(wheat_lifted) as wheat_lifted,sum(k_oil_lifted) as k_oil_lifted,sum(k_oil_lifted_white) as k_oil_lifted_white,sum(salt_lifted) as salt_lifted,sum(sugar_lifted) as sugar_lifted,sum(rice_allocated) as rice_allocated,sum(wheat_allocated) as wheat_allocated,sum(daal_lifted) as daal_lifted,sum(pmgkay_rice) as pmgkay_rice,sum(pmgkay_wheat) as pmgkay_wheat , sum(pmgkay_chana) as pmgkay_chana from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
        $data1 = mysql_query($sql1);
        while ($x = mysql_fetch_array($data1)) {
            $rgi_block_code = $x['rgi_block_code'];
            $rice_lifted = $x['rice_lifted'];
            $wheat_lifted = $x['wheat_lifted'];
            $k_oil_lifted = $x['k_oil_lifted'];
            $k_oil_lifted_white = $x['k_oil_lifted_white'];
            $salt_lifted = $x['salt_lifted'];
            $sugar_lifted = $x['sugar_lifted'];
            $rice_allocated = $x['rice_allocated'];
            $wheat_allocated = $x['wheat_allocated'];
            $pmgkay_rice = $x['pmgkay_rice'];
            $pmgkay_wheat = $x['pmgkay_wheat'];
            $pmgkay_chana = $x['pmgkay_chana'];
            $daal_lifted = $x['daal_lifted'];
            $sql2 = "update block_city_monthly_reports set rice_lifted='$rice_lifted',wheat_lifted='$wheat_lifted',k_oil_lifted='$k_oil_lifted',salt_lifted='$salt_lifted',sugar_lifted='$sugar_lifted',rice_allocated='$rice_allocated',wheat_allocated='$wheat_allocated',pmgkay_rice='$pmgkay_rice',daal_lifted='$daal_lifted',pmgkay_wheat='$pmgkay_wheat',pmgkay_chana='$pmgkay_chana' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

            $result = mysql_query($sql2);
            //echo $sql2;
        }

//Update block ========================================

        $sql1 = "select rgi_district_code,sum(rice_lifted) as rice_lifted,sum(wheat_lifted) as wheat_lifted,sum(k_oil_lifted) as k_oil_lifted,sum(k_oil_lifted_white) as k_oil_lifted_white,sum(salt_lifted) as salt_lifted,sum(sugar_lifted) as sugar_lifted,sum(daal_lifted) as daal_lifted,sum(pmgkay_rice) as pmgkay_rice,sum(pmgkay_wheat) as pmgkay_wheat , sum(pmgkay_chana) as pmgkay_chana from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
        //echo $sql1;

        $data1 = mysql_query($sql1);
        while ($x = mysql_fetch_array($data1)) {
            $rgi_district_code = $x['rgi_district_code'];

            $rice_lifted = $x['rice_lifted'];
            $wheat_lifted = $x['wheat_lifted'];
            $k_oil_lifted = $x['k_oil_lifted'];
            $k_oil_lifted_white = $x['k_oil_lifted_white'];
            $salt_lifted = $x['salt_lifted'];
            $sugar_lifted = $x['sugar_lifted'];
            $pmgkay_rice = $x['pmgkay_rice'];
            $daal_lifted = $x['daal_lifted'];
            $pmgkay_wheat = $x['pmgkay_wheat'];
            $pmgkay_chana = $x['pmgkay_chana'];

            $sql2 = "update district_monthly_reports set rice_lifted='$rice_lifted',wheat_lifted='$wheat_lifted',k_oil_lifted='$k_oil_lifted',salt_lifted='$salt_lifted',sugar_lifted='$sugar_lifted',pmgkay_rice='$pmgkay_rice',daal_lifted='$daal_lifted',pmgkay_wheat='$pmgkay_wheat',pmgkay_chana='$pmgkay_chana'  where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
            //echo $sql2;


            $result = mysql_query($sql2);
        }
    }
    //token
    die('cron commo stop');

}

function TransactionUpdateNewTusharUpwad($fg = null, $yearId = null)
{
    $flagggg = 1;
// commodity update
    if ($flagggg == 1) {

        $pre = mysql_query("select MONTH(now()) cur_mnth, MONTH(now() - INTERVAL 1 month) pre_mnth,YEAR(now()) cur_yr, YEAR(now() - INTERVAL 1 month) pre_yr");
        $row = mysql_fetch_array($pre);
        $mnth = $row['cur_mnth'];
        $preMnth = $row['pre_mnth'];
        $yr = $row['cur_yr'];
        $preYr = $row['pre_yr'];
        $this->loadModel('Year');
        $yearData1 = $this->Year->find('all', array('conditions' => array('Year.name=' . "'" . $preYr . "'"), 'fields' => array('Year.id'), 'recursive' => -1));
        $preYearId = $yearData1[0]['Year']['id'];


        // chnages for emer
        if ($flag == 1) {
            $mnth = $mnth;
            $yearId = $yearId;
        } else if ($flag == 2) {
            $mnth = $preMnth;
            $yearId = $preYearId;
        }
        $mnth = $flag;
        $yearId = $yearId;
        $table = "transaction_" . $mnth . "_" . $yearId . "_backups";
        echo "Month=" . $mnth;
        echo "YEar=" . $yearId;
        echo '</br>';
        $data = 0;

        if ($mnth <= 6 and $yearId == 8) {
            $conn = $this->dbConnectBackup130();
        } else {
            $conn = $this->dbConnectHhd();//HHD db object
        }
        $qq = "select dealer_id,item_id,sum(liftedquantity) from $table where month_id='$mnth' and year_id='$yearId' and  (cardtype_id='5' or cardtype_id='6')   group by dealer_id,item_id";

        $sql12 = mysqli_query($conn, $qq);
        mysqli_close($conn);

        $row12 = mysqli_fetch_array($sql12);
        // do while will run item times means 4 times
        do {
            $dealerId = $row12['dealer_id'];
            $item = $row12['item_id'];
            $cardtype_id = $row12['cardtype_id'];
            $data = $item;
            if ($data != 0) {
                $cc = 0;
                $commcount = $row12['sum(liftedquantity)'];
                $cc = 0;

                if ($item == 1) {
                    $qq = "update dealer_monthly_reports set apwaad_rice='$commcount' where dealer_id='$dealerId' and month_id='$mnth' and year_id='$yearId';";
                    mysql_query($qq);
                    $cc = mysql_affected_rows();
                    if ($cc == 0)
                        echo $qq;
                } else if ($item == 2) {
                    $qq = "update dealer_monthly_reports set apwaad_wheat='$commcount' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
                    mysql_query($qq);
                    $cc = mysql_affected_rows();
                    if ($cc == 0)
                        echo $qq;
                } else if ($item == 3) {
                    $query = mysql_query("update dealer_monthly_reports set apwaad_koil=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';");
                } else if ($item == 4) {
                    $query = mysql_query("update dealer_monthly_reports set apwaad_salt=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';");
                } else if ($item == 5) {
                    $query = mysql_query("update dealer_monthly_reports set apwaad_sugar=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';");
                } else if ($item == 6) {
                    $qq = "update dealer_monthly_reports set apwaad_pmgky_rice=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId'";
                    mysql_query($qq);
                    $cc = mysql_affected_rows();
                    if ($cc == 0)
                        echo $qq;
                }
            } else if ($item == 9) {
                $qq = "update dealer_monthly_reports set apwaad_pmgky_wheat=$commcount where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
                $query = mysql_query($qq);
                $cc = mysql_affected_rows();
                if ($cc == 0)
                    echo $qq;
            }
            $data = 0;
        }//if data  closed

//        }// for loop of hhd_masters
        while ($row12 = mysqli_fetch_assoc($sql12));

//Update on district_reports ============================================================================


        $sql1 = "select rgi_block_code,sum(apwaad_rice) as rice_lifted,sum(apwaad_wheat) as wheat_lifted,sum(apwaad_koil) as k_oil_lifted,sum(apwaad_salt) as salt_lifted,sum(apwaad_sugar) as sugar_lifted,sum(apwaad_pmgky_rice) as pmgkay_rice,sum(apwaad_pmgky_rice) as pmgkay_wheat  from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
        $data1 = mysql_query($sql1);
        while ($x = mysql_fetch_array($data1)) {
            $rgi_block_code = $x['rgi_block_code'];
            $rice_lifted = $x['rice_lifted'];
            $wheat_lifted = $x['wheat_lifted'];
            $k_oil_lifted = $x['k_oil_lifted'];
            $salt_lifted = $x['salt_lifted'];
            $sugar_lifted = $x['sugar_lifted'];
            $pmgkay_rice = $x['pmgkay_rice'];
            $pmgkay_wheat = $x['pmgkay_wheat'];
            $sql2 = "update block_city_monthly_reports set apwaad_rice='$rice_lifted',apwaad_wheat='$wheat_lifted',apwaad_koil='$k_oil_lifted',apwaad_salt='$salt_lifted',apwaad_sugar='$sugar_lifted',rice_allocated='$rice_allocated',wheat_allocated='$wheat_allocated',apwaad_pmgky_rice='$pmgkay_rice',apwaad_pmgky_wheat='$pmgkay_wheat' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

            $result = mysql_query($sql2);
            //echo $sql2;
        }

//Update block ========================================

        $sql1 = "select rgi_district_code,sum(apwaad_rice) as rice_lifted,sum(apwaad_wheat) as wheat_lifted,sum(apwaad_koil) as k_oil_lifted,sum(apwaad_salt) as salt_lifted,sum(apwaad_sugar) as sugar_lifted,sum(apwaad_pmgky_rice) as pmgkay_rice,sum(apwaad_pmgky_rice) as pmgkay_wheat  from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
        //echo $sql1;

        $data1 = mysql_query($sql1);
        while ($x = mysql_fetch_array($data1)) {
            $rgi_district_code = $x['rgi_district_code'];
            $rice_lifted = $x['rice_lifted'];
            $wheat_lifted = $x['wheat_lifted'];
            $k_oil_lifted = $x['k_oil_lifted'];
            $salt_lifted = $x['salt_lifted'];
            $sugar_lifted = $x['sugar_lifted'];
            $pmgkay_rice = $x['pmgkay_rice'];
            $pmgkay_wheat = $x['pmgkay_wheat'];

            $sql2 = "update district_monthly_reports set apwaad_rice='$rice_lifted',apwaad_wheat='$wheat_lifted',apwaad_koil='$k_oil_lifted',apwaad_salt='$salt_lifted',apwaad_sugar='$sugar_lifted',apwaad_pmgky_rice='$pmgkay_rice',apwaad_pmgky_wheat='$pmgkay_wheat'  where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
            //echo $sql2;


            $result = mysql_query($sql2);
        }
        //die
        die('cron commo stop');

// Transaction Apwaad
    } else if ($flagggg == 2) {

        $pre = mysql_query("select MONTH(now()) cur_mnth, MONTH(now() - INTERVAL 1 month) pre_mnth,YEAR(now()) cur_yr, YEAR(now() - INTERVAL 1 month) pre_yr");
        $row = mysql_fetch_array($pre);
        $mnth = $row['cur_mnth'];
        $preMnth = $row['pre_mnth'];
        $yr = $row['cur_yr'];
        $preYr = $row['pre_yr'];
        $this->loadModel('Year');
        $yearData1 = $this->Year->find('all', array('conditions' => array('Year.name=' . "'" . $preYr . "'"), 'fields' => array('Year.id'), 'recursive' => -1));
        $preYearId = $yearData1[0]['Year']['id'];


// chnages for emer
        if ($flag == 1) {
            $mnth = $mnth;
            $yearId = $yearId;
        } else if ($flag == 2) {
            $mnth = $preMnth;
            $yearId = $preYearId;
        }
        $mnth = $flag;
        $yearId = $yearId;


//$rgi_dist_code=$rgi_dist_code;
//$table="transaction_".$mnth."_6_backups";
////$table="transaction_2017_backups";
        $table = "transaction_" . $mnth . "_" . $yearId . "_backups";
//die("A");

        echo "Month=" . $mnth;
        echo "YEar=" . $yearId;
        echo '</br>';
        $data = 0;

//$conn=$this->dbConnectSlave();
        if ($mnth <= 6 and $yearId == 8) {
//die("A");
//$conn=$this->dbRationBackupConnectApwad();
            $conn = $this->dbConnectBackup130();
        } else {
            $conn = $this->dbConnectHhd();//HHD db object
        }
        $qq = "select dealer_id, count(distinct invoice_no) as transaction_invoice ,item_id,sum(liftedquantity) from $table where flag = 'A' and  (cardtype_id='5' or cardtype_id='6')   group by dealer_id";
        $sql12 = mysqli_query($conn, $qq);
        mysqli_close($conn);

        $row12 = mysqli_fetch_array($sql12);
        // do while will run item times means 4 times
        do {
            $dealerId = $row12['dealer_id'];
            $item = $row12['item_id'];
            $transactionInvoice = $row12['transaction_invoice'];
            $data = $item;

            $qq = "update dealer_monthly_reports set nfsa_distribution ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
            $query = mysql_query($qq);
            $cc = mysql_affected_rows();
            if ($cc == 0)
                echo $qq;


        }// for loop of hhd_masters
        while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================


        $sql1 = "select rgi_block_code,sum(apwaad_transaction_count) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
        $data1 = mysql_query($sql1);
        while ($x = mysql_fetch_array($data1)) {
            $rgi_block_code = $x['rgi_block_code'];
            $apwdTranCount = $x['transacCount'];
            $sql2 = "update block_city_monthly_reports set apwaad_transaction_count='$apwdTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

            $result = mysql_query($sql2);
            //echo $sql2;
        }

//Update district ========================================

        $sql1 = "select rgi_district_code,sum(apwaad_transaction_count) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
        //echo $sql1;

        $data1 = mysql_query($sql1);
        while ($x = mysql_fetch_array($data1)) {
            $rgi_district_code = $x['rgi_district_code'];
            $apwdTranCount = $x['transacCount'];

            $sql2 = "update district_monthly_reports set apwaad_transaction_count='$apwdTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
            //echo $sql2;


            $result = mysql_query($sql2);
        }
        //die
        die('cron commo stop');
    }
}

function TransactionUpdateNewTusharTransactions($fg = null, $yearId = null)
{

    $pre = mysql_query("select MONTH(now()) cur_mnth, MONTH(now() - INTERVAL 1 month) pre_mnth,YEAR(now()) cur_yr, YEAR(now() - INTERVAL 1 month) pre_yr");
    $row = mysql_fetch_array($pre);
    $mnth = $row['cur_mnth'];
    $preMnth = $row['pre_mnth'];
    $yr = $row['cur_yr'];
    $preYr = $row['pre_yr'];
    $this->loadModel('Year');
    $yearData1 = $this->Year->find('all', array('conditions' => array('Year.name=' . "'" . $preYr . "'"), 'fields' => array('Year.id'), 'recursive' => -1));
    $preYearId = $yearData1[0]['Year']['id'];

    // chnages for emer
    if ($flag == 1) {
        $mnth = $mnth;
        $yearId = $yearId;
    } else if ($flag == 2) {
        $mnth = $preMnth;
        $yearId = $preYearId;
    }
    $mnth = $flag;
    $yearId = $yearId;
    //$table="transaction_2017_backups";
    $table = "transaction_" . $mnth . "_" . $yearId . "_backups";
    echo "Month=" . $mnth;
    echo "YEar=" . $yearId;
    echo '</br>';
    $data = 0;

    //$conn=$this->dbConnectSlave();
    if ($mnth <= 6 and $yearId == 8) {
        //$conn=$this->dbRationBackupConnectApwad();
        $conn = $this->dbConnectBackup130();
    } else {
        $conn = $this->dbConnectHhd(); //HHD db object
    }

    /*query1*/
    $q1 = "select dealer_id, count(distinct invoice_no) as transaction_invoice ,item_id,sum(liftedquantity) from $table where (cardtype_id='5' or cardtype_id='6')   group by dealer_id";
    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $item               = $row12['item_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $qq1 = "update dealer_monthly_reports set nfsa_distribution ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }
    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================
    $sql1 = "select rgi_block_code,sum(nfsa_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $tranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set nfsa_distribution ='$tranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================
    $sql1 = "select rgi_district_code,sum(nfsa_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $tranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set nfsa_distribution='$tranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;


        $result = mysql_query($sql2);
    }
//    ======================================

    /*query2*/
    $q2 = "select dealer_id, count(distinct invoice_no) as transaction_invoice ,item_id,sum(liftedquantity) from $table where (cardtype_id='8')   group by dealer_id";

    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $item               = $row12['item_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $qq2 = "update dealer_monthly_reports set green_distribution ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }

    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================


    $sql1 = "select rgi_block_code,sum(green_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $greenTranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set green_distribution='$greenTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================

    $sql1 = "select rgi_district_code,sum(green_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $greenTranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set green_distribution='$greenTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;


        $result = mysql_query($sql2);
    }

//    ==============================================================================================================================

/*query 3*/
    $q3 = "select dealer_id, count(distinct invoice_no) as transaction_invoice ,item_id,sum(liftedquantity) from $table where (poratabilityFlag=3 or poratabilityFlag=4)   group by dealer_id";

    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $item               = $row12['item_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $q1 = "update dealer_monthly_reports set portable_within_district ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }

    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================

    $sql1 = "select rgi_block_code,sum(portable_within_district) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $portTranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set portable_within_district='$portTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================

    $sql1 = "select rgi_district_code,sum(portable_within_district) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $portTranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set portable_within_district='$portTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;
        $result = mysql_query($sql2);
    }

//    =====================================================================================================================================

    /*query 4*/
    $q4 = "select dealer_id, count(distinct invoice_no) as transaction_invoice ,item_id,sum(liftedquantity) from $table where (flag='U')   group by dealer_id";

    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $item               = $row12['item_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $q1 = "update dealer_monthly_reports set uid_distribution ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }

    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================


    $sql1 = "select rgi_block_code,sum(uid_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $uidTranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set uid_distribution='$uidTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================

    $sql1 = "select rgi_district_code,sum(uid_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $uidTranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set uid_distribution='$uidTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;


        $result = mysql_query($sql2);
    }

//    ===================================================================================================================

    $q5 = "select dealer_id, count(distinct invoice_no) as transaction_invoice ,item_id,sum(liftedquantity) from $table where (flag='M')   group by dealer_id";

    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $item               = $row12['item_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $q1 = "update dealer_monthly_reports set nfsa_distribution ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }

    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================


    $sql1 = "select rgi_block_code,sum(green_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $greenTranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set green_distribution='$greenTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================

    $sql1 = "select rgi_district_code,sum(green_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $greenTranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set green_distribution='$greenTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;


        $result = mysql_query($sql2);
    }

//    =============================================================================================================================

    $q6 = "select dealer_id, count(distinct invoice_no) as transaction_invoice ,item_id,sum(liftedquantity) from $table where (flag='O')   group by dealer_id";

    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $item               = $row12['item_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $q1 = "update dealer_monthly_reports set otp_distribution ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }

    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================


    $sql1 = "select rgi_block_code,sum(otp_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $otpTranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set otp_distribution='$otpTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================

    $sql1 = "select rgi_district_code,sum(otp_distribution) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $otpTranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set otp_distribution='$otpTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;


        $result = mysql_query($sql2);
    }

/* portability within district*/
    $qq = "select dealer_id, count(distinct invoice_no) as transaction_invoice  from $table where (portability='3')   group by dealer_id";

    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $q1 = "update dealer_monthly_reports set portable_within_district ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }

    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================


    $sql1 = "select rgi_block_code,sum(portable_within_district) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $withDistTranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set portable_within_district='$withDistTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================

    $sql1 = "select rgi_district_code,sum(portable_within_district) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $withDistTranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set portable_within_district='$withDistTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;


        $result = mysql_query($sql2);
    }

/*Impds in State*/
    $q8 = "select dealer_id, count(distinct invoice_no) as transaction_invoice ,item_id,sum(liftedquantity) from $table where (poratabilityFlag='4')   group by dealer_id";

    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $item               = $row12['item_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $q1 = "update dealer_monthly_reports set portable_within_state ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }

    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================


    $sql1 = "select rgi_block_code,sum(portable_within_state) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $withStatTranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set portable_within_state='$withStatTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================

    $sql1 = "select rgi_district_code,sum(portable_within_state) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $withStatTranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set portable_within_state='$withStatTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;


        $result = mysql_query($sql2);
    }


/*IMPDS in Jharkhand*/
    $qq = "select dealer_id, count(*) as transaction_invoice from impds_rc_detail_backups group by dealer_id";

    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $item               = $row12['item_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $qq = "update dealer_monthly_reports set impds_in_jharkhand ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }

    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================


    $sql1 = "select rgi_block_code,sum(impds_in_jharkhand) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $withStatTranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set impds_in_jharkhand='$withStatTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================

    $sql1 = "select rgi_district_code,sum(impds_in_jharkhand) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $withStatTranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set impds_in_jharkhand='$withStatTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;


        $result = mysql_query($sql2);
    }

/*IMPDS out Jharkhand*/
    $qq = "select dealer_id, count(*) as transaction_invoice from insert_impds_transactions group by dealer_id";

    $sql12 = mysqli_query($conn, $qq);
    mysqli_close($conn);

    $row12 = mysqli_fetch_array($sql12);
    do {
        $dealerId           = $row12['dealer_id'];
        $item               = $row12['item_id'];
        $transactionInvoice = $row12['transaction_invoice'];
        $data               = $item;

        $qq = "update dealer_monthly_reports set impds_out_jharkhand ='$transactionInvoice' where dealer_id='$dealerId'  and month_id='$mnth' and year_id='$yearId';";
        $query  = mysql_query($qq);
        $cc     = mysql_affected_rows();
        if ($cc == 0)
            echo $qq;
    }

    while ($row12 = mysqli_fetch_assoc($sql12));

//Update on block_reports ============================================================================


    $sql1 = "select rgi_block_code,sum(impds_out_jharkhand) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_block_code;";
    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_block_code = $x['rgi_block_code'];
        $withStatTranCount = $x['transacCount'];
        $sql2 = "update block_city_monthly_reports set impds_out_jharkhand='$withStatTranCount' where rgi_block_code='$rgi_block_code'  and month_id='$mnth' and year_id='$yearId';";

        $result = mysql_query($sql2);
        //echo $sql2;
    }

//Update district ========================================

    $sql1 = "select rgi_district_code,sum(impds_out_jharkhand) as transacCount from dealer_monthly_reports where  month_id='$mnth' and year_id='$yearId' group by rgi_district_code;";
    //echo $sql1;

    $data1 = mysql_query($sql1);
    while ($x = mysql_fetch_array($data1)) {
        $rgi_district_code = $x['rgi_district_code'];
        $withStatTranCount = $x['transacCount'];

        $sql2 = "update district_monthly_reports set impds_out_jharkhand='$withStatTranCount' where rgi_district_code='$rgi_district_code'  and month_id='$mnth' and year_id='$yearId';";
        //echo $sql2;


        $result = mysql_query($sql2);
    }

        die('cron commo stop');
}




