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

    .distButton {
        cursor: pointer;
        color: #0422fa;
    }
    thead {
        background-color: darkcyan;
        color: white;
        font-size: x-small;
        /* width: 2%; */
    }

    span.dDeco {
        /* font-family: fangsong; */
        margin-left: -81%;
        /* color: white; */
        display: inline-block;
        position: relative;
    }

    .bkDeco {
        display: inline-block;
        float: right;
        border: none;
    }

    .distButton {
        cursor: pointer;
        color: #0804ff;
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
        background-color: #ff0000 !important;
    }

    button.bkDeco {
        background-color: transparent;
        color: white;
        font-family: ui-monospace;
        font-weight: bold;
        border: 2px solid white;
        border-radius: 8px;
        margin-top: 11px;
        margin-right: 12px;
    }

    b, strong {
        font-weight: bolder;
        border-bottom-style: solid;
    }
    .tabb {
        width:100%;
        height:100%;
        overflow-y:hidden;
    }
    .smDeco {
        margin: 0 0 -1% -70%;
    }
    /*excdel image*/
    img.suk_st {
        display: inline-block;
        float: right;
        margin: 6px -13px 0px 0px;
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
                        <div class="card-header bg-primary text-white" align="center"><b>BLOCK WISE ANALYTICAL REPORT</b>
                            <fieldset>
                                <div class="btDec">
                                    <span data-toggle="tooltip" data-placement="top" title="Download as Excel"><img src="../webroot/img/excle.png" class="suk_st" onClick = "table_excel('exclDnld', 'Report');"></span>
                                    <?php echo $this->Form->create('districtFrm', ['name' => 'gotToDist', 'id' => 'gotToDist', 'url' => ['controller' => 'Reports', 'action' => 'distAnalytical']]) ?>
                                    <button class="bkDeco" type="submit" data-toggle="tooltip" data-placement="top" title="Go Back">Back</button>
                                    <?php
                                        echo $this->Form->hidden('month_id', ['id' => 'month_id', 'value' => $month_id]);
                                        echo $this->Form->hidden('year_id', ['id' => 'year_id', 'value' => $year_id]);
                                        echo $this->Form->end();
                                    ?>
                                </div>
                                <div class="dstDec">
                                    <span class="dDeco">DISTRICT: </span><b><?php echo $districtName; ?></b>
                                </div>
                                <div class="smDeco">
                                    <small><span style="color: white; font-weight: bold">Note:</span> Block Name is a link click for more Details.</small>
                                </div>
                        </div>
                        <div class="tabb">
                            <?php echo $this->Form->create('blkDetails', ['name' => 'blkDetails', 'id' => 'blkDetails', 'url' => ['controller' => 'Reports', 'action' => 'dealerAnalytical']]) ?>
                            <table class="table table-bordered" id="exclDnld">
                                <thead style="background-color: darkcyan; color: white;" align="left">
                                <tr>
                                    <td colspan="">#</td>
                                    <td colspan="">District</td>
                                    <td colspan="">Online</td>
                                    <td colspan="">Offline</td>
                                    <td colspan="">PHH Card</td>
                                    <td colspan="">PHH Member</td>
                                    <td colspan="">AAY Card</td>
                                    <td colspan="">AAY Member</td>
                                    <td colspan="">WHITE Card</td>
                                    <td colspan="">WHITE Member</td>
                                    <td colspan="">Green Card</td>
                                    <td colspan="">Green Member</td>
                                    <td colspan="3">Rice</td>
                                    <td colspan="3">Wheat</td>
                                    <td colspan="3">Sugar</td>
                                    <td colspan="3">Koil</td>
                                </tr>
                                <tr>
                                    <td colspan="12"></td>
                                    <td>Allocation</td>
                                    <td>Distribution</td>
                                    <td>Balance</td>
                                    <td>Allocation</td>
                                    <td>Distribution</td>
                                    <td>Balance</td>
                                    <td>Allocation</td>
                                    <td>Distribution</td>
                                    <td>Balance</td>
                                    <td>Allocation</td>
                                    <td>Distribution</td>
                                    <td>Balance</td>
                                </tr>

                                </thead>
                                <tbody>
                                <?php
                                $slNo = 1;
                                foreach ($blkAnaCount as $dKey => $dVal) {
                                    $rgi_blk = $dVal['rgi_block_code'];
                                    ?>
                                    <tr align="left">
                                        <td><?php echo $slNo++; ?></td>
                                        <td><span class="distButton" onclick="javascript:submitFrm('<?php echo $rgi_blk; ?>')"><?php echo $dVal['name']; ?></span></td>
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
                            echo $this->Form->hidden('rgi_blk_code', ['name' => 'rgi_blk_code', 'id' => 'rgi_blk_code']);
                            echo $this->Form->hidden('rgi_dist_code', ['name' => 'rgi_dist_code', 'id' => 'rgi_dist_code', 'value'=>$rgi_district_code]);
//                            echo $this->Form->hidden('month_id', ['name' => 'month_id', 'id' => 'month_id', 'value' => $monthId]);
//                            echo $this->Form->hidden('year_id', ['name' => 'year_id', 'id' => 'year_id', 'value' => $yearId]);
                            echo $this->Form->end();
                            ?>
                        </div>
                </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function submitFrm(distCode) {
        // alert(distCode);return false;
        document.getElementById('rgi_blk_code').value = distCode;
        document.getElementById('blkDetails').submit();
    }

    $('#demo-1').Monthpicker();

    /*for tooltip*/
    $('[data-toggle="tooltip"]').tooltip();
</script>
