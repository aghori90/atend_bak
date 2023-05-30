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
        font-weight: 700;
    }
    .btnDeco {
        margin-top: 19px;
    }
    .bg-primary {
        background-color: #65a13f!important;
    }
    b, strong {
        font-weight: bolder;
        border-bottom-style: solid;
    }

    /*header stick*/

    /* header scroll*/
   /* .tabb {
        width: 1150px;
        height: 550px;
        overflow-y: scroll;
    }*/
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

    /*thead tr:first-child th {
        position: sticky;
        top: 0;
    }
    thead tr:nth-child(2) th {
        position: sticky;
        top: 48px;
    }
    th{
        background-color: darkcyan; color: white;
    }*/

    /*excel*/
    img.suk_st {
        display: inline-block;
        float: right;
        margin: -12px 2px 0px 0px;
        cursor: pointer;
        height: 36px;
    }

    .required:after {
        content: " *";
        color: red;
    }

    /* y-scroll*/
    /*.tabb {
        width: 100%;
        height: 100%;
        overflow-y: hidden;
    }*/

    /*Sticky work*/
    /*.stk{
        !*background-color: gold;*!
        font-weight:700;
        position: sticky;
        left: 0;
    }*/
    /*header stick*/
    /*header stick*/
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

    /*th{
        background-color: darkcyan;
        color: white;
        font-size: 11px;
        font-weight: 700;
    }*/

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
                    <div class="card-header bg-primary text-white"><b>DISTRICT WISE COMMODITY COUNT REPORT</b></div>
                    <fieldset>
                        <?php echo $this->Form->create('districtFrm',['name'=>'districtFrm','id'=>'districtFrm','url'=>['controller'=>'Reports','action'=>'distComoCountReports']]) ?>
                        <div class="row" style="margin-top: 18px;">
                            <!--Commodity-->
                            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                <div class="form-group" >
                                    <label for="form"><b class="required">Commodity :</b></label>
                                    <?php
                                        $commo = ['1'=>'NFSA', '2'=>'Green'];
//                                        $commo = ['1'=>'NFSA', '2'=>'Green','3'=>'Sugar', '4'=>'Salt', '5'=>'Koil'];
                                        echo $this->Form->select('comodity',$commo, ['label' => '','empty'=>'--Select Commodity Type--', 'class' => 'form-control']);
                                    ?>
                                </div>
                            </div>
                            <!--Date Range-->
                            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                <div class="form-group" >
                                    <label for="form"><b class="required">Month/Year :</b></label>
                                    <?php echo $this->Form->control('mnthYr', ['label' => '','empty'=>'--Select Month Year--', 'class' => 'form-control inpBx', 'id' => 'demo-1']); ?>
                                </div>
                            </div>
                            <!--Submit BUtton-->
                            <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                                <div class="form-group btnDeco">
                                    <button class="btn btn-outline-success" style="">Search</button>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                        <?php if($this->getRequest()->is('post')) { ?>
                            <small><span style="color: red; font-weight: bold;">Note:</span> District Name is a link click for more Details.</small>
                            <small style="color: red; font-weight: 700; margin-left: 15px;">State:</small><small style="font-weight: bold"> Jharkhand</small>
                            <small style="color: red; font-weight: 700; margin-left: 15px;">Month/Year: </small><small style="font-weight: bold">
                                <?php
                                $mt = explode("/",$mnthYr);
                                $yr = $mt[0];
                                $my = $mt[1];
                                echo date("F", mktime(0, 0, 0, $yr, 10)) . " dist_como_count_reports.ctp" .$my;
                                ?>
                            </small>
                            <small style="color: red; font-weight: 700; margin-left: 15px;">Commodity: </small>
                            <small style="font-weight: bold">
                                <?php
                                    if($commod == 1){ echo 'NFSA'; }
                                    if($commod == 2){ echo 'GREEN'; }
                                    if($commod == 3){ echo 'SUGAR'; }
                                    if($commod == 4){ echo 'SALT'; }
                                    if($commod == 5){ echo 'KOIL'; }
                                ?>
                            </small>
                            <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                            <div class="tabb">
                                <div>
                                    <?php echo $this->Form->create('districtDetail',['name'=>'districtDetail','id'=>'districtDetail','url'=>['controller'=>'Reports','action'=>'blkComoCountReports']]);
                                    /* FOR COMMODITY 1: NFSA*/
                                    if($commod == 1) { ?>
                                        <table class="table table-striped table-bordered" id="exclDnld">
                                            <thead align="center">
                                            <tr>
                                                <th rowspan="3">#</th>
                                                <th rowspan="3">DISTRICT NAME</th>
                                                <th colspan="8">PHH</th>
                                                <th colspan="8">AYY</th>
                                            </tr>
                                            <tr>
                                                <!--COMMODITY PHH-->
                                                <th rowspan="2">CARDS</th>
                                                <th rowspan="2">MEMBERS</th>
                                                <th colspan="3">RICE</th>
                                                <th colspan="3">WHEAT</th>

                                                <!--COMMODITY AAY-->
                                                <th rowspan="2">CARDS</th>
                                                <th rowspan="2">MEMBERS</th>
                                                <th colspan="3">RICE</th>
                                                <th colspan="3">WHEAT</th>
                                            </tr>
                                            <tr>
                                                <!--PHH-->
                                                <!--RICE-->
                                                <th>Allocation</th>
                                                <th>Distribution</th>
                                                <th>Balance</th>

                                                <!--WHEAT-->
                                                <th>Allocation</th>
                                                <th>Distribution</th>
                                                <th>Balance</th>

                                                <!--AAY-->
                                                <!--RICE-->
                                                <th>Allocation</th>
                                                <th>Distribution</th>
                                                <th>Balance</th>

                                                <!--WHEAT-->
                                                <th>Allocation</th>
                                                <th>Distribution</th>
                                                <th>Balance</th>
                                            </tr>
                                            </thead>
                                            <tbody align="center" >
                                            <?php
                                            $SlNo = 1;
                                            $phHead = 0;
                                            $phMember = 0;
                                            $phRiceAllo = 0;
                                            $phRiceDist = 0;
                                            $balancePhRice = 0;
                                            $phWheatAllo = 0;
                                            $phWheatDist = 0;
                                            $balancePhWheat = 0;
                                            $aayHead = 0;
                                            $aayMember = 0;
                                            $ayRiceAllo = 0;
                                            $ayRiceDist = 0;
                                            $balanceAyRice = 0;
                                            $ayWheatAllo = 0;
                                            $ayWheatDist = 0;
                                            $balanceAyWheat = 0;
                                            foreach($distCount as $dKey => $dVal){
                                                $distCode = $dVal['rgi_district_code'];
                                                ?>
                                                <tr>
                                                    <td class=""><?php echo $SlNo;?></td>
                                                    <td>
                                                        <span class="distButton" onclick="javascript:submitFrm('<?php echo $distCode;?>')"><?php echo $dVal['name'];?></span>
                                                    </td>
                                                    <td><?php echo $dVal['phHead']; ?></td>
                                                    <td><?php echo $dVal['phMember']; ?></td>
                                                    <td><?php echo $dVal['ph_rice_allocated']; ?></td>
                                                    <td><?php echo $dVal['ph_rice_lifted']; ?></td>
                                                    <td><?php echo $qwe = ($dVal['ph_rice_allocated']-$dVal['ph_rice_lifted']);?></td>

                                                    <td><?php echo $dVal['ph_wheat_allocated']; ?></td>
                                                    <td><?php echo $dVal['ph_wheat_lifted']; ?></td>
                                                    <td><?php echo $qwee = ($dVal['ph_wheat_allocated']-$dVal['ph_wheat_lifted']);?></td>

                                                    <td><?php echo $dVal['aayHead']; ?></td>
                                                    <td><?php echo $dVal['aayMember']; ?></td>
                                                    <td><?php echo $dVal['aay_rice_allocated']; ?></td>
                                                    <td><?php echo $dVal['aay_rice_lifted']; ?></td>
                                                    <td><?php echo $qweee = ($dVal['aay_rice_allocated']-$dVal['aay_rice_lifted']); ?></td>

                                                    <td><?php echo $dVal['aay_wheat_allocated']; ?></td>
                                                    <td><?php echo $dVal['aay_wheat_lifted']; ?></td>
                                                    <td><?php echo $qFour = ($dVal['aay_wheat_allocated']-$dVal['aay_wheat_lifted']); ?></td>
                                                </tr>
                                                <?php
                                                // for total
                                                $SlNo++;
                                                $phHead         = $phHead + $dVal['phHead'];
                                                $phMember       = $phMember + $dVal['phMember'];
                                                $phRiceAllo     = $phRiceAllo + $dVal['ph_rice_allocated'];
                                                $phRiceDist     = $phRiceDist + $dVal['ph_rice_lifted'];
                                                $balancePhRice  = $balancePhRice + $qwe;
                                                $phWheatAllo    = $phWheatAllo + $dVal['ph_wheat_allocated'];
                                                $phWheatDist    = $phWheatDist + $dVal['ph_wheat_lifted'];
                                                $balancePhWheat = $balancePhWheat + $qwee;
                                                $aayHead         = $aayHead + $dVal['aayHead'];
                                                $aayMember       = $aayMember + $dVal['aayMember'];
                                                $ayRiceAllo     = $ayRiceAllo + $dVal['aay_rice_allocated'];
                                                $ayRiceDist     = $ayRiceDist + $dVal['aay_rice_lifted'];
                                                $balanceAyRice  = $balanceAyRice + $qweee;
                                                $ayWheatAllo    = $ayWheatAllo + $dVal['aay_wheat_allocated'];
                                                $ayWheatDist    = $ayWheatDist + $dVal['aay_wheat_lifted'];
                                                $balanceAyWheat = $balanceAyWheat + $qFour;
                                            }
                                            ?>
                                            <tr style="background-color: darkcyan; color: white;font-weight: bold">
                                                <td colspan="2">Total</td>
                                                <td><?php echo $phHead;?></td>
                                                <td><?php echo $phMember;?></td>
                                                <td><?php echo $phRiceAllo;?></td>
                                                <td><?php echo $phRiceDist;?></td>
                                                <td><?php echo $balancePhRice;?></td>
                                                <td><?php echo $phWheatAllo;?></td>
                                                <td><?php echo $phWheatDist;?></td>
                                                <td><?php echo $balancePhWheat;?></td>
                                                <td><?php echo $phHead;?></td>
                                                <td><?php echo $phMember;?></td>
                                                <td><?php echo $ayRiceAllo;?></td>
                                                <td><?php echo $ayRiceDist;?></td>
                                                <td><?php echo $balanceAyRice;?></td>
                                                <td><?php echo $ayWheatAllo;?></td>
                                                <td><?php echo $ayWheatDist;?></td>
                                                <td><?php echo $balanceAyWheat;?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    <?php
                                    }

                                    /*FOR COMMODITY 2: GREEN*/
                                    else if($commod == 2) { ?>
                                        <table class="table table-striped table-bordered" id="exclDnld">
                                            <thead align="center">
                                            <tr>
                                                <th rowspan="3">#</th>
                                                <th rowspan="3">DISTRICT NAME</th>
                                                <th colspan="2">GREEN</th>
                                                <th colspan="4">RICE</th>
                                                <th colspan="4">KOIL</th>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <!--RICE-->
                                                <th>Head</th>
                                                <th>Members</th>

                                                <!--RICE-->
                                                <th>RC Count</th>
                                                <th>Allocation</th>
                                                <th>Distribution</th>
                                                <th>Balance</th>

                                                <!--KOIL-->
                                                <th>RC Count</th>
                                                <th>Allocation</th>
                                                <th>Distribution</th>
                                                <th>Balance</th>
                                            </tr>
                                            </thead>
                                            <tbody align="center" >
                                            <?php
                                            $SlNo = 1;
                                            $grnHead = 0;
                                            $grnMember = 0;
                                            $phRiceAllo = 0;
                                            $phRiceDist = 0;
                                            $balancePhRice = 0;
                                            $phWheatAllo = 0;
                                            $phWheatDist = 0;
                                            $balancePhWheat = 0;
                                            $ayRiceAllo = 0;
                                            $ayRiceDist = 0;
                                            $balanceAyRice = 0;
                                            $ayWheatAllo = 0;
                                            $ayWheatDist = 0;
                                            $balanceAyWheat = 0;
                                            foreach($distCount as $dKey => $dVal){
                                                $distCode = $dVal['rgi_district_code']; ?>
                                                <tr>
                                                    <td class=""><?php echo $SlNo;?></td>
                                                    <td>
                                                        <span class="distButton" onclick="javascript:submitFrm('<?php echo $distCode;?>')"><?php echo $dVal['name'];?></span>
                                                    </td>

                                                    <td><?php echo $dVal['ph_rice_allocated']; ?></td>
                                                    <td><?php echo $dVal['ph_rice_allocated']; ?></td>
                                                    <td><?php echo $dVal['ph_rice_allocated']; ?></td>
                                                    <td><?php echo $dVal['ph_rice_lifted']; ?></td>
                                                    <td><?php echo $qwe = ($dVal['ph_rice_allocated']-$dVal['ph_rice_lifted']);?></td>
                                                    <td><?php echo $dVal['ph_rice_allocated']; ?></td>

                                                    <td><?php echo $dVal['ph_wheat_allocated']; ?></td>
                                                    <td><?php echo $dVal['ph_wheat_lifted']; ?></td>
                                                    <td><?php echo $qwee = ($dVal['ph_wheat_allocated']-$dVal['ph_wheat_lifted']);?></td>
                                                    <td><?php echo $dVal['ph_wheat_allocated']; ?></td>
                                                </tr>
                                                <?php
                                                // for total
                                                $SlNo++;
                                                $grnHead = $grnHead + $dVal['ph_rice_allocated'];
                                                $grnMember = $grnMember + $dVal['ph_rice_allocated'];
                                                $phRiceAllo = $phRiceAllo + $dVal['ph_rice_allocated'];
                                                $phRiceAllo = $phRiceAllo + $dVal['ph_rice_allocated'];
                                                $phRiceDist = $phRiceDist + $dVal['ph_rice_lifted'];
                                                $balancePhRice = $balancePhRice + $qwe;
                                                $phWheatAllo = $phWheatAllo + $dVal['ph_wheat_allocated'];
                                                $phWheatDist = $phWheatDist + $dVal['ph_wheat_lifted'];
                                                $balancePhWheat = $balancePhWheat + $qwee;
                                                $balancePhWheat = $balancePhWheat + $qwee;
                                            }
                                            ?>
                                            <tr style="background-color: darkcyan; color: white;font-weight: bold">
                                                <td colspan="2">Total</td>
                                                <td><?php echo $grnHead;?></td>
                                                <td><?php echo $grnMember;?></td>
                                                <td><?php echo $phRiceAllo;?></td>
                                                <td><?php echo $phRiceDist;?></td>
                                                <td><?php echo $balancePhRice;?></td>
                                                <td><?php echo $phWheatAllo;?></td>
                                                <td><?php echo $phWheatDist;?></td>
                                                <td><?php echo $balancePhWheat;?></td>
                                                <td><?php echo $ayRiceAllo;?></td>
                                                <td><?php echo $ayRiceAllo;?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    <?php
                                    }

                                    /* FOR COMMODITY 3: SUGAR*/
                                    else if($commod == 3) { ?>

                                    <?php
                                    }

                                    /* FOR COMMODITY 4: SALT*/
                                    else if($commod == 4) { ?>

                                    <?php
                                    }

                                    /* FOR COMMODITY 5: KOIL*/
                                    else if($commod == 5) {

                                    }?>
                                    <?php
                                    echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code']);
                                    echo $this->Form->hidden('month_id',['name'=>'month_id','id'=>'month_id','value'=>$monthId]);
                                    echo $this->Form->hidden('year_id',['name'=>'year_id','id'=>'year_id','value'=>$yearId]);
                                    echo $this->Form->hidden('mntYr',['name'=>'mnthYr','id'=>'mnthYr','value'=>$mnthYr]);
                                    echo $this->Form->hidden('comod',['name'=>'comod','id'=>'comod','value'=>$commod]);
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
        //alert(distCode);return false;
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
