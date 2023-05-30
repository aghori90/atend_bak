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
        background-color: #65a13f!important;
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
                        <div class="card-header bg-primary text-white" align="center"><b>BLOCK WISE APWAAD TRANSACTION REPORT</b>
                            <fieldset>
                                <div class="btDec">
                                    <?php echo $this->Form->create('districtFrm',['name'=>'gotToDist','id'=>'gotToDist','url'=>['controller'=>'Reports','action'=>'distApwadReports']]) ?>
                                    <button class="bkDeco" type="submit">Back</button>
                                    <?php
                                    echo $this->Form->hidden('month_id',['id'=>'month_id','value'=>$month_id]);
                                    echo $this->Form->hidden('year_id',['id'=>'year_id','value'=>$year_id]);
                                    echo $this->Form->hidden('mnthYr',['name'=>'mnthYr','id'=>'mntYr','value'=>$mnthYr]);
                                    echo $this->Form->end();
                                    ?>
                                </div>
                                <div class="dstDec">
                                    <span class="dDeco">DISTRICT: </span><b><?php echo $districtName; ?></b>
                                </div>
                        </div>
                        <?php echo $this->Form->create('blkDetails',['name'=>'blkDetails','id'=>'blkDetails','url'=>['controller'=>'Reports','action'=>'dlrApwadReports']]) ?>
                        <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                        <small><span style="color: red; font-weight: bold;">Note:</span> Block Name is a link click for more Details.</small>
                        <small style="color: red; font-weight: 700; margin-left: 15px;">State:</small><small style="font-weight: bold"> Jharkhand</small>
                        <small style="color: red; font-weight: 700; margin-left: 15px;">Month/Year: </small><small style="font-weight: bold">
                            <?php
                            $mt = explode("/",$mnthYr);
                            $yr = $mt[0];
                            $my = $mt[1];
                            echo date("F", mktime(0, 0, 0, $yr, 10)) . " blk_apwad_reports.ctp" .$my;
                            ?>
<!--                            --><?php //echo date("F", mktime(0, 0, 0, explode("/",$mnthYr)[0], 10))." ".explode("/",$mnthYr)[1]; ?>
                        </small>
                        <table class="table table-striped table-bordered" id="exclDnld">
                            <thead style="background-color: darkcyan; color: white;" align="center">
                                <tr>
                                    <th>#</th>
                                    <th>District Name</th>
                                    <th>Transaction Count </th>
                                    <th>PMGKY Rice (KG) </th>
                                    <th>PMGKY Wheat (KG) </th>
                                    <th>Rice (KG) </th>
                                    <th>Wheat (KG) </th>
                                    <th>Sugar (KG) </th>
                                    <th>Salt (KG) </th>
                                    <th>Koil (Lt.) </th>
                                </tr>
                            </thead>
                            <tbody align="center">
                            <?php
                            $SlNo = 1;
                            $transactionCount = 0;
                            $pmgkyRice = 0;
                            $pmgkyWheat = 0;
                            $rice = 0;
                            $wheat = 0;
                            $sugar = 0;
                            $salt = 0;
                            $koil = 0;
                            foreach($blkAharReports as $dKey => $dVal){
                                $blkCode = $dVal['rgi_block_code'];?>
                                <tr>
                                    <td><?php echo $SlNo;?></td>
                                    <td>
                                        <span class="distButton" onclick="javascript:submitFrm('<?php echo $blkCode;?>')"><?php echo $dVal['name'];?></span>
                                    </td>
                                    <td><?php echo $dVal['apwaad_transaction_count'] ?></td> <!-- For Dealer Count-->
                                    <td><?php echo $dVal['apwaad_pmgky_rice'] ?></td>
                                    <td><?php echo $dVal['apwaad_pmgky_wheat'] ?></td>
                                    <td><?php echo $dVal['apwaad_rice'] ?></td>
                                    <td><?php echo $dVal['apwaad_wheat'] ?></td>
                                    <td><?php echo $dVal['apwaad_sugar'] ?></td>
                                    <td><?php echo $dVal['apwaad_salt'] ?></td>
                                    <td><?php echo $dVal['apwaad_koil'] ?></td>
                                </tr>
                                <?php
                                $SlNo++;
                                // for total
                                $transactionCount =  $transactionCount + $dVal['apwaad_transaction_count']; // for Dealer counts
                                $pmgkyRice =  $pmgkyRice + $dVal['apwaad_pmgky_rice'];
                                $pmgkyWheat =  $pmgkyWheat + $dVal['apwaad_pmgky_wheat'];
                                $rice =  $rice + $dVal['apwaad_rice'];
                                $wheat =  $wheat + $dVal['apwaad_wheat'];
                                $sugar =  $sugar + $dVal['apwaad_sugar'];
                                $salt =  $salt + $dVal['apwaad_salt'];
                                $koil =  $koil + $dVal['apwaad_koil'];
                            }
                            ?>
                            <tr style="background-color: darkcyan; color: white;font-weight: bold">
                                <td colspan="2">Total</td>
                                <td><?php echo $transactionCount;?></td>
                                <td><?php echo $pmgkyRice;?></td>
                                <td><?php echo $pmgkyWheat;?></td>
                                <td><?php echo $rice;?></td>
                                <td><?php echo $wheat;?></td>
                                <td><?php echo $sugar;?></td>
                                <td><?php echo $salt;?></td>
                                <td><?php echo $koil;?></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php
                        echo $this->Form->hidden('rgi_blk_code',['name'=>'rgi_blk_code','id'=>'rgi_blk_code']);
                        echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code','value'=>$rgi_district_code]);
                        echo $this->Form->hidden('month_id',['name'=>'month_id','id'=>'month_id','value'=>$month_id]);
                        echo $this->Form->hidden('year_id',['name'=>'year_id','id'=>'year_id','value'=>$year_id]);
                        echo $this->Form->hidden('mntYr',['name'=>'mnthYr','id'=>'mnthYr','value'=>$mnthYr]);
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
