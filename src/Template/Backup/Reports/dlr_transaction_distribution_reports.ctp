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
    .btnContainer {
        margin-right: -120px;
        margin-bottom: 10px;
    }

    .inputErrBorder {
        border: 1px solid #ff0000 !important;
    }

    .frm_error {
        font-style: italic;
        color: #ff0000;
    }

    #btnSubmit {
        float: right;
        margin-top: 15px;
    }

    /*.distButton {*/
    /*    cursor: pointer;*/
    /*    color: #0804ff;*/
    /*    font-weight: 700;*/
    /*}*/

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

    /* header scroll*/
    .tabb {
        width: 1150px;
        height: 500px;
        overflow-y: scroll;
    }
    thead {
        position: sticky;
        top: 0;
        z-index: 1;
        font-size: x-small;
    }
    /* header sticky*/
    td.leftScroll {
        background-color: gold;
        position: sticky;
        left: 0px;
    }
    th {
        background-color: darkcyan;
        color: white;
    }

    /*header BC color*/
    .bg-primary {
        background-color: #65a13f !important;
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
        margin: 0px 2px 0px 0px;
        cursor: pointer;
        height: 36px;
    }

    /*thead tr:first-child th {
        position: sticky;
        top: 0;
    }
    thead tr:nth-child(2) th {
        position: sticky;
        top: 48px;
    }*/

    .required:after {
        content: " *";
        color: red;
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
                    <div class="card-header bg-primary text-white"><b>Transaction Distribution Report</b></div>
                    <fieldset>
                        <?php if($this->getRequest()->is('post')) { ?>
                            <!--Excel Download-->
                            <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Transaction Distribution Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                            <!--Notice/state/month-yr-->
<!--                            <small style="color: red; font-weight: 700;">Note: </small><small>Click On district Name formore details.</small>-->
                            <small style="color: red; font-weight: 700; margin-left: 15px;">State:</small><small style="font-weight: bold"> Jharkhand</small>
                            <small style="color: red; font-weight: 700; margin-left: 15px;">Month/Year: </small><small style="font-weight: bold">
                                <?php
                                $mt = explode("/",$mnthYr);
                                $yr = $mt[0];
                                $my = $mt[1];
                                echo date("F", mktime(0, 0, 0, $yr, 10)) . " dlr_transaction_distribution_reports.ctp" .$my;
                                ?>
                            </small>
                            <div>
                                <div class="tabb">
                                    <?php echo $this->Form->create('districtDetail',['name'=>'districtDetail','id'=>'districtDetail','url'=>['controller'=>'Reports','action'=>'']]) ?>
                                    <table class="table table-bordered " id="exclDnld">
                                        <thead style="" align="center">
                                        <tr>
                                            <th style="position: sticky; width: 130px; left: 0; z-index: 1;" rowspan="4">#</th>
                                            <th style="position: sticky; width: 130px; left: 0; z-index: 1;" rowspan="4">Dealer Name</th>
<!--                                            <th class="stkHdr" rowspan="4">Block</th>-->
                                            <th rowspan="4">FPS Id</th>
                                            <th rowspan="4">FPS Name</th>
                                            <th rowspan="4">FPS Mobile</th>
                                            <th rowspan="4">FPS Status</th>
                                            <th rowspan="4">HHD Sl. No.</th>
                                            <th rowspan="4">HHD Status</th>
                                            <th rowspan="4">Weighing Machine Installed</th>
                                            <th rowspan="4">IRIS Scanner</th>
                                            <th colspan="10">Count of RC & Beneficiary</th>
                                            <th colspan="9">Total Transactions</th>
                                            <th colspan="8">Transaction PHH</th>
                                            <th colspan="8">Transaction AAY</th>
                                            <th colspan="17">Distribution(MT)</th>
                                            <th colspan="27">Distribution</th>
                                        </tr>
                                        <!--Count of RC & Beneficiary-->
                                        <tr>
                                            <th rowspan="2">AAY RC</th>
                                            <th rowspan="2">AAY Members</th>
                                            <th rowspan="2">UID Seeding</th>
                                            <th rowspan="2">Dormant RC</th>
                                            <th rowspan="2">Duplicate RC</th>
                                            <th rowspan="2">PHH RC</th>
                                            <th rowspan="2">PHH Members</th>
                                            <th rowspan="2">UID Seeding</th>
                                            <th rowspan="2">Dormant RC</th>
                                            <th rowspan="2">Duplicate RC</th>
                                            <!--Total Transaction-->
                                            <th rowspan="2">Aadhar Based Online</th>
                                            <th rowspan="2">OTP Based Online</th>
                                            <th rowspan="2">UID Seeding</th>
                                            <th rowspan="2">Offline(Un-authenticated)</th>
                                            <th rowspan="2">Inter State</th>
                                            <th rowspan="2">Intra State</th>
                                            <th rowspan="2">Inter District</th>
                                            <th rowspan="2">Intra District</th>
                                            <th rowspan="2">Total TRansaction</th>
                                            <!--Transactions PHH-->
                                            <th rowspan="2">Aadhar Based Online</th>
                                            <th rowspan="2">Other Mode Online</th>
                                            <th rowspan="2">Offline(Un-authenticated)</th>
                                            <th rowspan="2">Inter State</th>
                                            <th rowspan="2">Intra State</th>
                                            <th rowspan="2">Inter District</th>
                                            <th rowspan="2">Intra District</th>
                                            <th rowspan="2">Total Transaction</th>
                                            <!--Transactions AAY-->
                                            <th rowspan="2">Aadhar Based Online</th>
                                            <th rowspan="2">Other Mode Online</th>
                                            <th rowspan="2">Offline(Un-authenticated)</th>
                                            <th rowspan="2">Inter State</th>
                                            <th rowspan="2">Intra State</th>
                                            <th rowspan="2">Inter District</th>
                                            <th rowspan="2">Intra District</th>
                                            <th rowspan="2">Total Transaction</th>
                                            <!--Distribution(MT)-->
                                            <th colspan="2">Aadhar Based Online</th>
                                            <th colspan="2">OTP Based Online</th>
                                            <th colspan="2">Offline(Un-authenticated)</th>
                                            <th colspan="2">Inter State (KG)</th>
                                            <th colspan="2">Intra State (KG)</th>
                                            <th colspan="2">Inter District (KG)</th>
                                            <th colspan="2">Intra District (KG)</th>
                                            <th colspan="2">Un-Automated (KG)</th>
                                            <th rowspan="2">Total Distribution (MT)</th>
                                            <!--Distribution-->
                                            <th colspan="3">Aadhar Based Online</th>
                                            <th colspan="3">OTP Based Online</th>
                                            <th colspan="3">Offline(Un-authenticated)</th>
                                            <th colspan="3">Inter State (KG)</th>
                                            <th colspan="3">Intra State (KG)</th>
                                            <th colspan="3">Inter District (KG)</th>
                                            <th colspan="3">Intra District (KG)</th>
                                            <th colspan="3">Un-Automated (KG)</th>
                                            <th rowspan="3">Total Distribution (MT)</th>
                                        </tr>
                                        <tr>
                                            <!--Distribution(MT)-->
                                            <th>Wheat</th>
                                            <th>Rice</th>
                                            <th>Wheat</th>
                                            <th>Rice</th>
                                            <th>Wheat</th>
                                            <th>Rice</th>
                                            <th>Wheat</th>
                                            <th>Rice</th>
                                            <th>Wheat</th>
                                            <th>Rice</th>
                                            <th>Wheat</th>
                                            <th>Rice</th>
                                            <th>Wheat</th>
                                            <th>Rice</th>
                                            <th>Wheat</th>
                                            <th>Rice</th>
                                            <!--Distribution(MT)-->
                                            <th>Sugar</th>
                                            <th>Salt</th>
                                            <th>K.Oil</th>
                                            <th>Sugar</th>
                                            <th>Salt</th>
                                            <th>K.Oil</th>
                                            <th>Sugar</th>
                                            <th>Salt</th>
                                            <th>K.Oil</th>
                                            <th>Sugar</th>
                                            <th>Salt</th>
                                            <th>K.Oil</th>
                                            <th>Sugar</th>
                                            <th>Salt</th>
                                            <th>K.Oil</th>
                                            <th>Sugar</th>
                                            <th>Salt</th>
                                            <th>K.Oil</th>
                                            <th>Sugar</th>
                                            <th>Salt</th>
                                            <th>K.Oil</th>
                                            <th>Sugar</th>
                                            <th>Salt</th>
                                            <th>K.Oil</th>
                                        </tr>
                                        <!--                                </div>-->

                                        </thead>
                                        <tbody align="center" >
                                        <?php
                                        $SlNo = 1;
                                        foreach($dealerList as $dKey => $dVal){
                                            $dlrId = $dVal['dealer_id'];
                                            ?>
                                            <tr>
                                            <td class=""><?php echo $SlNo;?></td>
                                                <td class="leftScroll">
                                                    <span class="distButton" onclick="javascript:submitFrm('<?php echo $dlrId;?>')"><?php echo $dVal['name'];?></span>
                                                </td>

<!--                                                <td>--><?php //echo $dVal['white_distribution'] ?><!--</td>  For Dealer Count-->
                                                <td><?php echo $dVal['nfsa_distribution'] ?></td>
                                                <td><?php echo $dVal['green_distribution'] ?></td>
                                                <td><?php echo $dVal['white_distribution'] ?></td>
                                                <td><?php echo $dVal['portable_within_district'] ?></td>
                                                <td><?php echo $dVal['portable_within_state'] ?></td>
                                                <td><?php echo $dVal['impds_in_jharkhand'] ?></td>
                                                <td><?php echo $dVal['impds_out_jharkhand'] ?></td>
                                                <td><?php echo $dVal['impds_out_jharkhand'] ?></td>
                                                <!--Count of RC & Beneficiary-->
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <!--Total Transactions-->
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <!--Transaction PHH-->
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <!--Transaction AAY-->
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <!--Distribution(MT)-->
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <!--Distribution(MT)-->
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                                <td><?php echo 0; ?></td>
                                            </tr>
                                            <?php
                                            $SlNo++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code']);
                                    echo $this->Form->hidden('month_id',['name'=>'month_id','id'=>'month_id','value'=>$month_id]);
                                    echo $this->Form->hidden('year_id',['name'=>'year_id','id'=>'year_id','value'=>$year_id]);
                                    echo $this->Form->hidden('mntYr',['name'=>'mnthYr','id'=>'mnthYr','value'=>$mnthYr]);
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

    /*for month year*/
    $('#demo-1').Monthpicker();

    /*for tooltip*/
    $('[data-toggle="tooltip"]').tooltip();

</script>

