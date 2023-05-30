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
    /*For Sticky Header*/
    thead tr:first-child th {
        position: sticky;
        top: 0;
    }
    thead tr:nth-child(2) th {
        position: sticky;
        top: 41px;
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
                                    <?php echo $this->Form->create('districtFrm', ['name' => 'gotToBlok', 'id' => 'gotToBlok', 'url' => ['controller' => 'Reports', 'action' => 'blkApwadReports']]) ?>
                                    <button class="bkDeco" type="submit">Back</button>
                                    <?php
                                    echo $this->Form->hidden('rgi_dist_code', ['name' => 'rgi_dist_code', 'id' => 'rgi_dist_code', 'value' => $rgi_district_code]);
                                    echo $this->Form->hidden('month_id', ['id' => 'month_id', 'value' => $month_id]);
                                    echo $this->Form->hidden('year_id', ['id' => 'year_id', 'value' => $year_id]);
                                    echo $this->Form->hidden('mnthYr',['name'=>'mnthYr','id'=>'mntYr','value'=>$mnthYr]);
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
                            echo date("F", mktime(0, 0, 0, $yr, 10)) . " dlr_trans_count_reports.ctp" .$my;
                            ?>
                            <!--                            --><?php //echo date("F", mktime(0, 0, 0, explode("/",$mnthYr)[0], 10))." ".explode("/",$mnthYr)[1]; ?>
                        </small>
                        <table class="table table-striped table-bordered" id="exclDnld">
                            <thead style="background-color: darkcyan; color: white;" align="center">
                            <tr>
                                <th>#</th>
                                <th>District Name</th>
                                <th>NFSA Distribution</th>
                                <th>White Distribution</th>
                                <th>Green Distribution</th>
                                <th>Portability In District</th>
                                <th>Portability In State</th>
                                <th>Impds In Jharkhand</th>
                                <th>Impds Out Jharkhand</th>
                                <th>UID Distribution</th>
                                <th>OTP DIstribution</th>
                                <th>Apwaad DIstribution</th>
                            </tr>
                            </thead>
                            <tbody align="center">
                            <?php
                            $SlNo = 1;
                            $nfsa = 0;
                            $whiteDist = 0;
                            $green = 0;
                            $portIn = 0;
                            $portOut = 0;
                            $impdsIn = 0;
                            $impdsOut = 0;
                            $uid = 0;
                            $otp = 0;
                            $apwad = 0;
                            foreach($dealerList as $dKey => $dVal){
                                $dlrId = $dVal['dealer_id'];
                                ?>
                                <tr>
                                    <td><?php echo $SlNo;?></td>
                                    <td>
                                        <span class="distButton" onclick="javascript:submitFrm('<?php echo $dlrId;?>')"><?php echo $dVal['name'];?></span>
                                    </td>
                                    <td><?php echo $dVal['nfsa_distribution'] ?></td> <!-- For Dealer Count-->
                                    <td><?php echo $dVal['white_distribution'] ?></td>
                                    <td><?php echo $dVal['green_distribution'] ?></td>
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
                                $nfsa =  $nfsa + $dVal['nfsa_distribution']; // for Dealer counts
                                $whiteDist =  $whiteDist + $dVal['white_distribution'];
                                $green =  $green + $dVal['green_distribution'];
                                $portIn =  $portIn + $dVal['portable_within_district'];
                                $portOut =  $portOut + $dVal['portable_within_state'];
                                $impdsIn =  $impdsIn + $dVal['impds_in_jharkhand'];
                                $impdsOut =  $impdsOut + $dVal['impds_out_jharkhand'];
                                $impdsOut =  $uid + $dVal['uid_distribution'];
                                $otp =  $otp + $dVal['otp_distribution'];
                                $apwad =  $apwad + $dVal['apwad_distribution'];
                            }
                            ?>
                            <tr style="background-color: darkcyan; color: white;font-weight: bold">
                                <td colspan="2">Total</td>
                                <td><?php echo $nfsa;?></td>
                                <td><?php echo $whiteDist;?></td>
                                <td><?php echo $green;?></td>
                                <td><?php echo $portIn;?></td>
                                <td><?php echo $portOut;?></td>
                                <td><?php echo $impdsIn;?></td>
                                <td><?php echo $impdsOut;?></td>
                                <td><?php echo $impdsOut;?></td>
                                <td><?php echo $otp;?></td>
                                <td><?php echo $apwad;?></td>
                            </tr>
                            </tbody>
                        </table>
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
