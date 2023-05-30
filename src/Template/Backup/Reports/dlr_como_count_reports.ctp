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
        /* font-family: fangsong; */
        margin-left: -73%;
        /* color: white; */
        display: inline-block;
        /*position: relative;*/
        position: inherit;
    }
    .bkDeco {
        display: inline-block;
        float: right;
        border: none;
    }
    /*.distButton {
        cursor: pointer;
        color: #0804ff;
    }*/
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
        margin: 4px 2px -11px -73%;
    }
    /* header scroll*/
    .tabb {
        width: 1150px;
        height: 550px;
        overflow-y: scroll;
    }
    thead {
        position: sticky;
        top: 0;
        z-index: 1;
        font-size: x-small;
    }
    /*For Sticky Header*/
    /*thead tr:first-child th {
        position: sticky;
        top: 0;
    }
    thead tr:nth-child(2) th {
        position: sticky;
        top: 41px;
    }*/
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
    th{
        background-color: darkcyan;
        color: white;
        font-size: 11px;
        font-weight: 700;
    }
</style>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <fieldset>
                        <div class="card-header bg-primary text-white" align="center"><b>DEALER WISE APWAAD TRANSACTION
                                REPORT</b>
                            <fieldset>
                                <div class="btDec">
                                    <?php echo $this->Form->create('districtFrm', ['name' => 'gotToBlok', 'id' => 'gotToBlok', 'url' => ['controller' => 'Reports', 'action' => 'blkComoCountReports']]) ?>
                                    <button class="bkDeco" type="submit">Back</button>
                                    <?php
                                    echo $this->Form->hidden('rgi_dist_code', ['name' => 'rgi_dist_code', 'id' => 'rgi_dist_code', 'value' => $rgi_district_code]);
                                    echo $this->Form->hidden('month_id', ['id' => 'month_id', 'value' => $month_id]);
                                    echo $this->Form->hidden('year_id', ['id' => 'year_id', 'value' => $year_id]);
                                    echo $this->Form->hidden('mnthYr',['name'=>'mnthYr','id'=>'mntYr','value'=>$mnthYr]);
                                    echo $this->Form->hidden('comod',['name'=>'comod','id'=>'comod','value'=>$commod]);
                                    echo $this->Form->end();
                                    ?>
                                </div>
                                <div class="dstDec">
                                    <span class="dDeco">DISTRICT / BLOCK: </span><b><?php echo $districtName; ?>
                                        <span> / </span><?php echo $blockName; ?></b>
                                </div>
                        </div>
                        <?php echo $this->Form->create('dlrDetail',['name'=>'dlrDetail','id'=>'dlrDetail','url'=>['controller'=>'Reports','action'=>'rationcardDetails']]) ?>
                        <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                        <small style="color: red; font-weight: 700; margin-left: 15px;">State:</small><small style="font-weight: bold"> Jharkhand</small>
                        <!--                            <small style="color: red; font-weight: 700; margin-left: 15px;">Month/Year:</small><small style="font-weight: bold">--><?php //echo $monthId."/".$yearId ?><!--</small>-->
                        <small style="color: red; font-weight: 700; margin-left: 15px;">Month/Year: </small><small style="font-weight: bold">
                            <?php
                            $mt = explode("/",$mnthYr);
                            $yr = $mt[0];
                            $my = $mt[1];
                            echo date("F", mktime(0, 0, 0, $yr, 10)) . " dlr_como_count_reports.ctp" .$my;
                            ?>
                            <!--                            --><?php //echo date("F", mktime(0, 0, 0, explode("/",$mnthYr)[0], 10))." ".explode("/",$mnthYr)[1]; ?>
                        </small>
                        <small style="color: red; font-weight: 700; margin-left: 15px;">Commodity: </small>
                        <small style="font-weight: bold">
                            <?php
                            if($commod == 1){ echo 'NFSA'; }
                            if($commod == 2){ echo 'GREEN'; }
                            if($commod == 3){ echo 'SALT'; }
                            if($commod == 4){ echo 'SUGAR'; }
                            if($commod == 5){ echo 'KOIL'; }
                            ?>
                        </small>
                        <?php
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
                                <tbody align="center">
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
                                foreach($dealerList as $dKey => $dVal){
                                    $dlrId = $dVal['dealer_id'];
                                    ?>
                                    <tr>
                                        <td><?php echo $SlNo;?></td>
                                        <td>
                                            <span class="distButton" onclick="javascript:submitFrm('<?php echo $dlrId;?>')"><?php echo $dVal['name'];?></span>
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

                        /* FOR COMMODITY 2: GREEN*/
                        else if($commod == 2) { ?>
                            <table class="table table-striped table-bordered" id="exclDnld">
                                <thead style="background-color: darkcyan; color: white;" align="center">
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
                                <tbody align="center">
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
                                foreach($dealerList as $dKey => $dVal){
                                    $dlrId = $dVal['dealer_id'];
                                    ?>
                                    <tr>
                                        <td><?php echo $SlNo;?></td>
                                        <td>
                                            <span class="distButton" onclick="javascript:submitFrm('<?php echo $dlrId;?>')"><?php echo $dVal['name'];?></span>
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

                        /* FOR COMMODITY 1: SALT*/
                        else if($commod == 4) { ?>

                            <?php
                        }

                        /* FOR COMMODITY 1: KOIL*/
                        else if($commod == 4) {

                        }

                        ?>
                        <?php
                        echo $this->Form->hidden('dealerId',['name'=>'dealerId','id'=>'dealerId']);
                        echo $this->Form->hidden('rgi_blk_code',['name'=>'rgi_blk_code','id'=>'rgi_blk_code']);
                        echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code','value'=>$rgi_district_code]);
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
    function submitFrm(dealerId){
        // alert(distCode);return false;
        document.getElementById('dealerId').value = dealerId;
        document.getElementById('dlrDetail').submit();
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
