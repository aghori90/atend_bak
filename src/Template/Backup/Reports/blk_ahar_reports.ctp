<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DealerTemp[]|\Cake\Collection\CollectionInterface $dealerTemps
 */
// echo $this->Html->script('jquery-validate');
// echo $this->Html->script('custom');
// echo $this->Html->script('formValidation');
// echo $this->Html->script('validate');
// echo $this->Html->script('jsapi');
// echo $this->Html->css('jquery-ui.css');
echo $this->Html->script('monthpicker.min');
echo $this->Html->css('monthpicker.css');
?>
<style type="text/css">
    .btnContainer{
        margin-right: -120px;
        margin-bottom: 10px;
    }
    .inputErrBorder{
        border: 1px solid #ff0000 !important;
    }
    .frm_error{
        font-style: italic;
        color: #ff0000;
    }
    #btnSubmit{
        float: right;
        margin-top: 15px;
    }
    span.dDeco {
        font-family: fangsong;
        margin-left: -83%;
        color: white;
    }
    .bkDeco {
        display: inline-block;
        float: right;
        border: none;
    }
    .distButton {
        cursor: pointer;
        color: #0804ff;
        font-weight: 700;
    }
    .btnDeco {
        margin-top: 19px;
    }
    .dstDec {
        margin-top: 12px;
    }
    .btDec {
        margin-top: -35px;
    }
    .bg-primary {
        background-color: #ff0000!important;
    }
    button.bkDeco {
        background-color: transparent;
        color: white;
        font-family: ui-monospace;
        font-weight: bold;
        border: 2px solid white;
        border-radius: 8px;
        margin-top: 11px;
    }
    b, strong {
        font-weight: bolder;
        border-bottom-style: solid;
    }
    .smDeco {
        margin: 0 0 -1% -72%;
    }
    thead tr:first-child th {
        position: sticky;
        top: 0;
    }
    thead tr:nth-child(2) th {
        position: sticky;
        top: 40px;
    }
    th{
        background-color: darkcyan;
        color: white;
        font-size: 11px;
        font-weight: 700;
    }
    /*excel*/
    img.suk_st {
        display: inline-block;
        float: right;
        margin: 1px 2px 0px 0px;
        cursor: pointer;
        height: 36px;
    }
</style>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <fieldset>
                        <div class="card-header bg-primary text-white" align="center"><b>BLOCK WISE TRANSACTION REPORT</b>
                            <fieldset>
                                <div class="btDec">
                                    <?php echo $this->Form->create('districtFrm',['name'=>'gotToDist','id'=>'gotToDist','url'=>['controller'=>'Reports','action'=>'blkApwadReports']]) ?>
                                    <button class="bkDeco" type="submit">Back</button>
                                    <?php
                                    echo $this->Form->hidden('month_id',['id'=>'month_id','value'=>$month_id]);
                                    echo $this->Form->hidden('year_id',['id'=>'year_id','value'=>$year_id]);
                                    echo $this->Form->end();
                                    ?>
                                </div>
                                <div class="dstDec">
                                    <span class="dDeco">DISTRICT: </span><b><?php echo $districtName; ?></b>
                                </div>
                        </div>
                        <?php echo $this->Form->create('blkDetails',['name'=>'blkDetails','id'=>'blkDetails','url'=>['controller'=>'Reports','action'=>'dlrAharReports']]) ?>
                        <small><span style="color: red; font-weight: bold;">Note:</span> Block Name is a link click for more Details.</small>
                        <small style="color: red; font-weight: 700; margin-left: 15px;">State:</small><small style="font-weight: bold"> Jharkhand</small>
                        <!--                            <small style="color: red; font-weight: 700; margin-left: 15px;">Month/Year:</small><small style="font-weight: bold">--><?php //echo $monthId."/".$yearId ?><!--</small>-->
                        <small style="color: red; font-weight: 700; margin-left: 15px;">Month/Year:</small><small style="font-weight: bold"><?php echo $mnthYr; ?></small>
                        <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                        <table class="table table-striped table-bordered" id="exclDnld">
                            <thead align="center">
                                <tr>
                                    <th rowspan="2">#</th>
                                    <th rowspan="2">Block Name</th>
                                    <th rowspan="2">Dealer Count </th>
                                    <th colspan="3">Transactions </th>
                                    <th colspan="3">Inter State Transactions </th>
                                    <th colspan="2">Authentications </th>
                                    <th rowspan="2">Apwad Panjika Transaction</th>
                                    <th rowspan="2">Transaction Through Weighing Machine</th>
                                </tr>
                                <tr>
                                    <!--TRansactions-->
                                    <th>NFSA</th>
                                    <th>Green</th>
                                    <th>White</th>
                                    <!--InterState-->
                                    <th>Withing State</th>
                                    <th>JH RC Lifted Other State</th>
                                    <th>Other State RC Lifted in JH</th>
                                    <!--Authentications-->
                                    <th>UID</th>
                                    <th>OTP</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                            <?php
                            $SlNo = 1;
                            $dlrCnt = 0;
                            $nfsa = 0;
                            $green = 0;
                            $white = 0;
                            $withinDist = 0;
                            $withinSt = 0;
                            $impdsInJh = 0;
                            $impdsOutJh = 0;
                            $UidDistribution = 0;
                            $OtpDistribution = 0;
                            $ApwadDistribution = 0;
                            foreach($blkAharReports as $dKey => $dVal){
                                $blkCode = $dVal['rgi_block_code'];?>
                                <tr>
                                    <td><?php echo $SlNo;?></td>
                                    <td>
                                        <span class="distButton" onclick="javascript:submitFrm('<?php echo $blkCode;?>')"><?php echo $dVal['name'];?></span>
                                    </td>
                                    <td><?php echo $dVal['white_distribution'] ?></td> <!-- For Dealer Count-->
                                    <td><?php echo $dVal['nfsa_distribution'] ?></td>
                                    <td><?php echo $dVal['green_distribution'] ?></td>
                                    <td><?php echo $dVal['white_distribution'] ?></td>
                                    <td><?php echo $dVal['portable_within_district'] ?></td>
                                    <td><?php echo $dVal['portable_within_state'] ?></td>
                                    <td><?php echo $dVal['impds_in_jharkhand'] ?></td>
                                    <td><?php echo $dVal['impds_out_jharkhand'] ?></td>
                                    <td><?php echo $dVal['uid_distribution'] ?></td>
                                    <td><?php echo $dVal['otp_distribution'] ?></td>
                                    <td><?php echo $dVal['apwad_distribution'] ?></td>
                                </tr>
                                <?php
                                $SlNo++;
                                // for total
                                $dlrCnt =  $dlrCnt + $dVal['white_distribution']; // for dealer Count
                                $nfsa =  $nfsa + $dVal['nfsa_distribution'];
                                $green =  $green + $dVal['green_distribution'];
                                $white =  $white + $dVal['white_distribution'];
                                $withinDist =  $withinDist + $dVal['portable_within_district'];
                                $withinSt =  $withinSt + $dVal['portable_within_state'];
                                $impdsInJh =  $impdsInJh + $dVal['impds_in_jharkhand'];
                                $impdsOutJh =  $impdsOutJh + $dVal['impds_out_jharkhand'];
                                $UidDistribution =  $UidDistribution + $dVal['uid_distribution'];
                                $OtpDistribution =  $OtpDistribution + $dVal['otp_distribution'];
                                $ApwadDistribution =  $ApwadDistribution + $dVal['apwad_distribution'];
                            }
                            ?>
                            <tr style="background-color: darkcyan; color: white;font-weight: bold">
                                <td colspan="2">Total</td>
                                <td><?php echo $dlrCnt;?></td>
                                <td><?php echo $nfsa;?></td>
                                <td><?php echo $green;?></td>
                                <td><?php echo $white;?></td>
                                <td><?php echo $withinDist;?></td>
                                <td><?php echo $withinSt;?></td>
                                <td><?php echo $impdsInJh;?></td>
                                <td><?php echo $impdsOutJh;?></td>
                                <td><?php echo $UidDistribution;?></td>
                                <td><?php echo $OtpDistribution;?></td>
                                <td><?php echo $ApwadDistribution;?></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php
                        echo $this->Form->hidden('rgi_blk_code',['name'=>'rgi_blk_code','id'=>'rgi_blk_code']);
                        echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code','value'=>$rgi_district_code]);
                        echo $this->Form->hidden('month_id',['name'=>'month_id','id'=>'month_id','value'=>$month_id]);
                        echo $this->Form->hidden('year_id',['name'=>'year_id','id'=>'year_id','value'=>$year_id]);
                        echo $this->Form->end();
                        ?>
                </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function submitFrm(distCode){
        // alert(distCode);return false;
        document.getElementById('rgi_blk_code').value = distCode;
        document.getElementById('blkDetails').submit();
    }

    // print excel document----------------------------------------------------------------------------
    var table_excel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
            ,
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]-->' +
                '</head><body><table>{table}</table></body></html>'
            , base64 = function (s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            }
            , format = function (s, c) {
                return s.replace(/{(\w+)}/g, function (m, p) {
                    return c[p];
                })
            }
        return function (table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
            window.location.href = uri + base64(format(template, ctx))
        }
    })()

    $('#demo-1').Monthpicker();

</script>
