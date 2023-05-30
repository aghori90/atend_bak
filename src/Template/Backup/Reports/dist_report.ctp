<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\DealerTemp[]|\Cake\Collection\CollectionInterface $dealerTemps
*/
// echo $this->Html->script('jquery-validate');
// echo $this->Html->script('custom');
// echo $this->Html->script('formValidation');
// echo $this->Html->script('validate');
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
    .distButton {
        cursor: pointer;
        color: #0804ff;
    }
    .btnDeco {
        margin-top: 19px;
    }
    .bg-primary {
        background-color: #ff0000!important;
    }
    b, strong {
        font-weight: bolder;
        border-bottom-style: solid;
    }

    /*header stick*/
    thead tr:first-child th {
        position: sticky;
        top: 0;
    }
    thead tr:nth-child(2) th {
        position: sticky;
        top: 48px;
    }
    th{
        background-color: darkcyan; color: white;
    }

    /*excel*/
    img.suk_st {
        display: inline-block;
        float: right;
        margin: -12px 2px 0px 0px;
        cursor: pointer;
        height: 36px;
    }

    /*th {*/
    /*     padding: 5px;*/
    /*     background-color: #4cb96b;*/
    /*     position: -webkit-sticky;*/
    /*     position: sticky;*/
    /*     top: 0;*/
    /* }*/
</style>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <div class="card-header bg-primary text-white"><b>REPORT ON UID ERROR CODES</b></div>
                    <fieldset>
                    <?php echo $this->Form->create('districtFrm',['name'=>'districtFrm','id'=>'districtFrm','url'=>['controller'=>'Reports','action'=>'distReport']]) ?>
                    <div class="row" style="margin-top: 18px;">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12" style="margin-left: 26%;">
                            <div class="form-group" >
                                <label for="form"><b>Month/Year :</b></label>
                                <?php echo $this->Form->control('mnthYr', ['label' => '','empty'=>'--Select Month Year--', 'class' => 'form-control inpBx', 'id' => 'demo-1']); ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                            <div class="form-group btnDeco">
                                <button class="btn btn-outline-success" style="">Search</button>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                        <?php if($this->getRequest()->is('post')) { ?>
                        <small><span style="color: red; font-weight: bold;">Note:</span> District Name is a link click for more Details.</small>
                            <small><span style="color: red; font-weight: bold">811:</span> Biometric Data did not match.</small>
                            <small><span style="color: red; font-weight: bold">300:</span> Missing Biometric Data in CIDR for the given Aadhar Number. </small>
                        <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                        <div>
                        <div class="tabb">
                            <?php echo $this->Form->create('districtDetail',['name'=>'districtDetail','id'=>'districtDetail','url'=>['controller'=>'Reports','action'=>'blkReport']]) ?>
                            <table class="table table-striped table-bordered" id="exclDnld">
                                <thead align="center">
                                    <tr>
                                        <th colspan="">#</th>
                                        <th colspan="">District</th>
                                        <th colspan="2">Error Code 811 </th>
                                        <th colspan="2">Error Code 300 </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2"></th>
                                        <th>Total Hit</th>
                                        <th>Total Hit Member Count</th>
                                        <th>Total Transactions</th>
                                        <th>Failed Transaction Count</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <?php
                                    $SlNo = 1;
                                    $totRepo811 = 0;
                                    $totRepoMem811 = 0;
                                    $totRepo300 = 0;
                                    $totRepoMem300 = 0;
                                    foreach($districts as $dKey => $dVal){
                                    ?>
                                    <tr>
                                        <td><?php echo $SlNo;?></td>
                                        <td>
                                            <span class="distButton" onclick="javascript:submitFrm('<?php echo $dKey;?>')"><?php echo $dVal;?></span>
                                        </td>
                                        <td><?php if(isset($distRepo811[$dKey])){ echo $distRepo811[$dKey]; }else{ echo 0; } ?></td>
                                        <td><?php if(isset($distRepoMem811[$dKey])){ echo $distRepoMem811[$dKey]; }else{ echo 0; } ?></td>
                                        <td><?php if(isset($distRepo300[$dKey])){ echo $distRepo300[$dKey]; }else{ echo 0; } ?></td>
                                        <td><?php if(isset($distRepoMem300[$dKey])){ echo $distRepoMem300[$dKey]; }else{ echo 0; } ?></td>
                                    </tr>
                                    <?php
                                    $SlNo++;
                                        // for total
                                        $totRepo811     = $totRepo811       + $distRepo811[$dKey];
                                        $totRepoMem811  = $totRepoMem811    + $distRepoMem811[$dKey];
                                        $totRepo300     = $totRepo300       + $distRepo300[$dKey];
                                        $totRepoMem300  = $totRepoMem300    + $distRepoMem300[$dKey];
                                    }
                                    ?>
                                <tr style="background-color: darkcyan; color: white;font-weight: bold">
                                    <td colspan="2">Total</td>
                                    <td><?php echo $totRepo811;?></td>
                                    <td><?php echo $totRepoMem811;?></td>
                                    <td><?php echo $totRepo300;?></td>
                                    <td><?php echo $totRepoMem300;?></td>
                                </tr>
                                </tbody>
                            </table>
                            <?php
                            echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code']);
                            echo $this->Form->hidden('month_id',['name'=>'month_id','id'=>'month_id','value'=>$monthId]);
                            echo $this->Form->hidden('year_id',['name'=>'year_id','id'=>'year_id','value'=>$yearId]);
                            echo $this->Form->end();
                            ?>
                        </div>
                        </div>
                        <?php }else {
                            echo "";
                        } ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function submitFrm(distCode){
        // alert(distCode);return false;
        document.getElementById('rgi_dist_code').value = distCode;
        document.getElementById('districtDetail').submit();
    }

    $('#demo-1').Monthpicker();

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

//    pdf download

    function print_pdf(divName){
        var printContents = $(".currentTime").val()+document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        window.location.reload();
        document.body.innerHTML = originalContents;
    }
</script>
