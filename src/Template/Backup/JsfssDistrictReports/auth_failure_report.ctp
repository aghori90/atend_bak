<?php

use Cake\Routing\Router;

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SeccCardholderAddTemp $seccCardholderAddTemp
 */
echo $this->Html->script('CalendarControl');
echo $this->Html->css('StyleCalender');
?>
<style type="text/css">
    .mb_10 {
        margin-bottom: 20px;
    }


    .row {
        display: -ms-flexbox;
        display: flex;
        width: 100%;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: 0px;
        margin-left: 0px;
        margin-top: 14px;
    }

    .table {
        width: 95%;
        margin-bottom: 1rem;
        background-color: rgba(0, 0, 0, 0);
        margin-left: 21px;
        border-radius: 23px;
    }

    .submit_link {
        background: none !important;
        border: none;
        padding: 0 !important;
        /*optional*/
        font-family: arial, sans-serif;
        /*input has OS specific font-family*/
        color: #069;
        text-decoration: underline;
        cursor: pointer;
    }
    
</style>
<script>
    function sendHome(obj) {
        document.getElementById("report_by").value = '0';
        document.getElementById("auth_failure_report").submit();
    }

    function sendDistrict(rgi_district_code, obj) {
        document.getElementById("rgi_district_code").value = rgi_district_code;
        document.getElementById("report_by").value = '1';
        document.getElementById("auth_failure_report").submit();
    }

    function sendBlock(rgi_block_code, obj) {
        document.getElementById("rgi_block_code").value = rgi_block_code;
        document.getElementById("report_by").value = '2';
        //document.getElementById("rgi_district_code").value = ''; 
        document.getElementById("auth_failure_report").submit();
    }
</script>

<div class="main-card mb-3">
    <div class="card">
        <div class="card-header bg-info text-white text-center"><span class="h5">Auth Failure Report</span></div>
        <?php echo $this->Form->create('null', ["autocomplete" => "off", "id" => "auth_failure_report"]) ?>
        <?php echo $this->Flash->render(); ?>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label required font-weight-bold"><b>Month/Year :</b></label>
                <div class="col-sm-4">
                    <?php echo $this->Form->control('month_year',  ['label' => false, 'id' => 'month_year', 'class' => 'form-control', 'placeholder' => '--Select Month--', 'onclick' => "showCalendarControl('month_year')", 'required' => 'required', 'readonly' => 'readonly']); ?>
                </div>

                <div class="col-sm-4 text-center">
                    <button type="submit" class="btn btn-info submit">Search</button>
                </div>

            </div>


            <?php if (!empty($dist_data) && $show_div == true) { ?>
                <hr />
                <div class="form-group">
                    <?php echo $this->Html->image("print.ico", ["alt" => "Print", 'onclick' => 'tablePrint()', 'style' => 'cursor:pointer; width:40px; height:40px; float:left; margin-left:10px;']); ?>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered " id="printDiv">
                        <thead style=" background-color: #ccd44a;">
                            <!-- <tr>
                                <td colspan="5">
                                <span class="pull-left">
                                        <h5 align="left">
                                            <font color="#fff">
                                                District : <?= $this->districtName($rgi_district_code) ?>
                                            </font>
                                        </h5>
                                    </span>
                                    <span class="pull-right">
                                        <?php echo $this->Form->submit('Back', ['id'=>'back_btn', 'class' => 'submit_link text-white', 'value' => ""]); ?>
                                    </span>
                                    <h5 align="center">
                                        <font color="#fff">
                                            District : <?= $this->districtName($rgi_district_code) ?>
                                        </font>
                                    </h5>
                                </td>
                            </tr> -->
                            <tr>
                                <td colspan="5">
                                    <h5 align="center">
                                        <font >
                                            District Wise Weighing Transaction Count Report as on <?php echo date('d-m-Y',strtotime('-1 day'));?> for <?php echo $monthName; ?>, <?php echo $yearName; ?>
                                        </font>
                                    </h5>
                                </td>
                            </tr>
                            <tr class="">
                                <th>Sl No</th>
                                <th>District</th>
                                <th style="text-align:center">Total Auth Transactions</th>
                                <th style="text-align:center">Auth Failure Count</th>
                            </tr>
                        </thead>

                        <?php
                        $sl = 0;
                        $total_transaction = 0;
                        $total_auth_failure = 0;
                        foreach ($dist_data as $key => $val) :
                            $total_transaction      = $total_transaction + $val["totalTransactionAuth"];
                            $total_auth_failure     = $total_auth_failure + $val["auth300"];
                        ?>
                            <tr>
                                <td>
                                    <?= ++$sl ?>
                                </td>
                                <td>

                                    <?php
                                    /* echo $this->Html->link($val["name"], [
                                        'controller' => 'JsfssDistrictReports',
                                        'action' => 'districtWeighingReport'
                                    ], ['onclick' => "javascript:sendDistrict('" . $this->encryptData($val['rgi_district_code']) . "',this.id)"]);*/

                                    echo $this->Form->submit($val["name"], ['class' => 'submit_link', 'onclick' => "javascript:sendDistrict('" . $this->encryptData($val['rgi_district_code']) . "',this.id)"]);
                                    ?>
                                </td>
                                <td><?php echo $val["totalTransactionAuth"]; ?></td>
                                <td><?php echo $val["auth300"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php echo $this->Form->end() ?>
                        <tr style="background-color: #ecffb3; font-weight:bold">
                            <td colspan="2">Total</td>
                            <td><?= $total_transaction  ?></td>
                            <td><?= $total_auth_failure ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            } else if (!empty($block_data)  && $show_div == true) { ?>
                <hr />
                <div class="form-group">
                    <?php echo $this->Html->image("print.ico", ["alt" => "Print", 'onclick' => 'tablePrint()', 'style' => 'cursor:pointer; width:40px; height:40px; float:left; margin-left:10px;']); ?>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered " id="printDiv">
                        <thead style=" background-color: #ccd44a;">
                            <tr>
                                <td colspan="5">
                                    <span class="pull-left">
                                        <h5 align="left">
                                            <font >
                                                District : <?= $this->districtName($rgi_district_code) ?>
                                            </font>
                                        </h5>
                                    </span>
                                    <span class="pull-right">
                                        <?php echo $this->Form->submit('Back', ['id'=>'back_btn', 'class' => 'submit_link text-white', 'onclick' => "javascript:sendHome(this.id)"]); ?>
                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <h5 align="center">
                                        <font >
                                            Block Wise Weighing Transaction Count Report as on <?php echo date('d-m-Y',strtotime('-1 day'));?> for <?php echo $monthName; ?>, <?php echo $yearName; ?>
                                        </font>
                                    </h5>
                                </td>
                            </tr>
                            <tr class="">
                                <th>Sl No</th>
                                <th>Block</th>
                                <th style="text-align:center">Total Auth Transactions</th>
                                <th style="text-align:center">Auth Failure Count</th>
                            </tr>
                        </thead>

                        <?php
                        $sl = 0;
                        $total_transaction = 0;
                        $total_auth_failure = 0;
                        foreach ($block_data as $key => $val) :
                            $total_transaction      = $total_transaction + $val["totalTransactionAuth"];
                            $total_auth_failure     = $total_auth_failure + $val["auth300"];
                        ?>
                            <tr>
                                <td>
                                    <?= ++$sl ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->submit($val["name"], ['class' => 'submit_link', 'onclick' => "javascript:sendBlock('" . $this->encryptData($val['rgi_block_code']) . "',this.id)"]);
                                    ?>
                                </td>
                                <td><?php echo $val["totalTransactionAuth"]; ?></td>
                                <td><?php echo $val["auth300"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr style="background-color: #ecffb3; font-weight:bold">
                            <td colspan="2">Total</td>
                            <td><?= $total_transaction  ?></td>
                            <td><?= $total_auth_failure ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            } else if (!empty($dealer_data) && $show_div == true) { ?>
                <hr />
                <div class="form-group">
                    <?php echo $this->Html->image("print.ico", ["alt" => "Print", 'onclick' => 'tablePrint()', 'style' => 'cursor:pointer; width:40px; height:40px; float:left; margin-left:10px;']); ?>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered " id="printDiv">
                        <thead style=" background-color: #ccd44a;">
                            <tr>
                                <td colspan="5">
                                    <span class="pull-left">
                                        <h5 align="left">
                                            <font >
                                                District : <?= $this->districtName($rgi_district_code) ?> >> Block : <?= $this->blockName($rgi_block_code) ?>
                                            </font>
                                        </h5>
                                    </span>
                                    <span class="pull-right">
                                        <?php echo $this->Form->submit('Back', ['id'=>'back_btn','class' => 'submit_link text-white', 'onclick' => "javascript:sendDistrict('" . $this->encryptData($rgi_district_code) . "',this.id)"]); ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <h4 align="center">
                                        <font color="">
                                            Dealer Wise Weighing Transaction Count Report as on <?php echo date('d-m-Y',strtotime('-1 day'));?> for <?php echo $monthName; ?>, <?php echo $yearName; ?>
                                        </font>
                                    </h4>
                                </td>
                            </tr>
                            <tr class="">
                                <th>Sl No</th>
                                <th>Dealer</th>
                                <th style="text-align:center">Total Auth Transactions</th>
                                <th style="text-align:center">Auth Failure Count</th>
                            </tr>
                        </thead>

                        <?php
                        $sl = 0;
                        $total_transaction = 0;
                        $total_auth_failure = 0;
                        foreach ($dealer_data as $key => $val) :
                            $total_transaction      = $total_transaction + $val["totalTransactionAuth"];
                            $total_auth_failure     = $total_auth_failure + $val["auth300"];
                        ?>
                            <tr>
                                <td>
                                    <?= ++$sl ?>
                                </td>
                                <td><?php echo $val['name']; ?></td>
                                <td><?php echo $val["totalTransactionAuth"]; ?></td>
                                <td><?php echo $val["auth300"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr style="background-color: #ecffb3; font-weight:bold">
                            <td colspan="2">Total</td>
                            <td><?= $total_transaction  ?></td>
                            <td><?= $total_auth_failure ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            } elseif ($show_div == true && empty($dist_data)) {
                echo '<div class="text-center alert alert-danger">No Record Found</div>';
            ?>

            <?php }
            echo $this->Form->control('rgi_district_code', ['type' => 'hidden', 'id' => 'rgi_district_code']);
            echo $this->Form->control('rgi_block_code', ['type' => 'hidden', 'id' => 'rgi_block_code']);
            echo $this->Form->control('report_by', ['type' => 'hidden', 'id' => 'report_by']);
            echo $this->Form->end()  ?>
        </div>
    </div>
</div>
<?php echo $this->Html->script("jquery-ui.js") ?>

<script type="text/javascript">
    function tablePrint() {
        var originalContents = document.body.innerHTML;
        var display_setting = "toolbar=no,location=no,directories=no,menubar=no,height=900,width=1500,";
        display_setting += "scrollbars=no,left=0, top=0";
        var element = document.getElementById('back_btn');
        if(typeof(element) != "undefined" && element != null){
            element.style.display='none';
        }
       // document.getElementById('back_btn').style.display='none';
        var aTags = document.getElementsByClassName('submit_link');
        var atl = aTags.length;
        var i;
        for (i = 0; i < atl; i++) {
            aTags[i].style.border = "none";
            aTags[i].style.background = "none";
        }
        
        var districtReport_innerhtml = document.getElementById("printDiv").innerHTML;        


        var document_print = window.open("", "", display_setting);
        document_print.document.open();
        document_print.document.write('<html><head><title>Jharkhand Government e-Ration Card</title>	<?php
                                                                                                        echo $this->Html->css('report_print');
                                                                                                        ?></head>');
        document_print.document.write('<body>');
        document_print.document.write('<br/>');
        document_print.document.write('<table width="70%"  align="center"  class="zeroborder" >');
        document_print.document.write('<tr><td><center><?php echo $this->Html->image("jhar_govt.gif"); ?> </center></td></tr>');
        document_print.document.write(' </table>');
        document_print.document.write('<table width="70%"  align="center"  cellspacing ="0" cellpadding="0" border="1" >');
        document_print.document.write(districtReport_innerhtml);
        document_print.document.write('</table>');
        document_print.document.write('</body></html>');
        document_print.print();
        document_print.document.close();
        document.body.innerHTML = originalContents;
        return false;
    }
</script>