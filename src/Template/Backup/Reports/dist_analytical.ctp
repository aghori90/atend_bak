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
<script>
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
</script>
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
    /*.table thead th {*/
    /*    vertical-align: bottom;*/
    /*    border-bottom: 2px solid #dee2e6;*/
    /*    font-size: x-small;*/
    /*}*/
    /*thead {*/
    /*    background-color: darkcyan;*/
    /*    color: white;*/
    /*    font-size: x-small;*/
    /*    !* width: 2%; *!*/
    /*}*/
    .tabb {
        width:100%;
        height:100%;
        overflow-y:hidden;
    }
    /*header BC color*/
    .bg-primary {
        background-color: #ff0000!important;
    }
    /*bold*/
    b, strong {
        font-weight: bolder;
        border-bottom-style: solid;
    }
    /*excdel image*/
    img.suk_st {
        display: inline-block;
        float: right;
        margin: -12px 2px 0px 0px;
        cursor: pointer;
        height: 36px;
    }
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
                    <div class="card-header bg-primary text-white"><b>ANALYTICAL REPORT</b></div>
                    <fieldset>
                        <?php echo $this->Form->create('districtFrm',['name'=>'districtFrm','id'=>'districtFrm','url'=>['controller'=>'Reports','action'=>'distAnalytical']]) ?>
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
                            <small><span style="color: red; font-weight: bold">Note:</span> District Name is a link click for more Details.</small>
                            <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                            <div class="tabb">
                                <?php echo $this->Form->create('districtDetail', ['name' => 'districtDetail', 'id' => 'districtDetail', 'url' => ['controller' => 'Reports', 'action' => 'blockAnalytical']]) ?>
                                <table class="table table-bordered " id="exclDnld">
                                    <thead style="" align="left">
                                    <tr>
                                        <th colspan="">#</th>
                                        <th colspan="">District</th>
                                        <th colspan="">Online</th>
                                        <th colspan="">Offline</th>
                                        <th colspan="">PHH Card</th>
                                        <th colspan="">PHH Member</th>
                                        <th colspan="">AAY Card</th>
                                        <th colspan="">AAY Member</th>
                                        <th colspan="">WHITE Card</th>
                                        <th colspan="">WHITE Member</th>
                                        <th colspan="">Green Card</th>
                                        <th colspan="">Green Member</th>
                                        <th colspan="3">Rice</th>
                                        <th colspan="3">Wheat</th>
                                        <th colspan="3">Sugar</th>
                                        <th colspan="3">Koil</th>
                                    </tr>
                                    <tr>
                                        <th colspan="12"></th>
                                        <th>Allocation</th>
                                        <th>Distribution</th>
                                        <th>Balance</th>
                                        <th>Allocation</th>
                                        <th>Distribution</th>
                                        <th>Balance</th>
                                        <th>Allocation</th>
                                        <th>Distribution</th>
                                        <th>Balance</th>
                                        <th>Allocation</th>
                                        <th>Distribution</th>
                                        <th>Balance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $slNo = 1;
                                    foreach ($distAnaCounts as $dKey => $dVal) {
                                        $rgi_dist = $dVal['rgi_district_code'];
                                        ?>
                                        <tr align="left">
                                            <td><?php echo $slNo++; ?></td>
                                            <td><span class="distButton" onclick="javascript:submitFrm('<?php echo $rgi_dist; ?>')"><?php echo $dVal['name']; ?></span></td>
                                            <td><?php echo $dVal['online_count']; ?></td>
                                            <td><?php echo $dVal['offline_count']; ?></td>
                                            <td><?php echo $dVal['phHead']; ?></td>
                                            <td><?php echo $dVal['phMember']; ?></td>
                                            <td><?php echo $dVal['aayHead']; ?></td>
                                            <td><?php echo $dVal['aayMember']; ?></td>
                                            <td><?php echo $dVal['whiteHead']; ?></td>
                                            <td><?php echo $dVal['whiteMember']; ?></td>
                                            <td><?php echo $dVal['greenHead']; ?></td>
                                            <td><?php echo $dVal['greenMember']; ?></td>
                                            <td><?php echo $dVal['rice_allocated']; ?></td>
                                            <td><?php echo $dVal['rice_lifted']; ?></td>
                                            <td><?php echo $dVal['rice_allocated']-$dVal['rice_lifted']; ?></td>
                                            <td><?php echo $dVal['wheat_allocated']; ?></td>
                                            <td><?php echo $dVal['wheat_lifted']; ?></td>
                                            <td><?php echo $dVal['wheat_allocated']-$dVal['wheat_lifted']; ?></td>
                                            <td><?php echo $dVal['sugar_allocated']; ?></td>
                                            <td><?php echo $dVal['sugar_lifted']; ?></td>
                                            <td><?php echo $dVal['sugar_allocated']-$dVal['sugar_lifted']; ?></td>
                                            <td><?php echo $dVal['k_oil_allocated']; ?></td>
                                            <td><?php echo $dVal['k_oil_lifted']; ?></td>
                                            <td><?php echo $dVal['k_oil_allocated']-$dVal['k_oil_lifted']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                                echo $this->Form->hidden('rgi_dist_code', ['name' => 'rgi_dist_code', 'id' => 'rgi_dist_code']);
                                echo $this->Form->hidden('month_id', ['name' => 'month_id', 'id' => 'month_id', 'value' => $monthId]);
                                echo $this->Form->hidden('year_id', ['name' => 'year_id', 'id' => 'year_id', 'value' => $yearId]);
                                echo $this->Form->end();
                                ?>
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

    /*for month year*/
    $('#demo-1').Monthpicker();

    /*for tooltip*/
    $('[data-toggle="tooltip"]').tooltip();

    /*excel dwonload */
    // function printexcel() {
    //     var table = document.getElementsByClassName("exclDnld");
    //     var html = table.outerHTML;
    //     var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url
    //     var elem = document.createElement("a");
    //     elem.setAttribute("href", url);
    //     elem.setAttribute("download", "export.xls"); // Choose the file name
    //     elem.click();
    //     return false;
    // }

</script>
