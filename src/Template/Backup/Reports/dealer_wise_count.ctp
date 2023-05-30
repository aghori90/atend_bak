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
        margin: 4px 2px -11px -73%;
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
</style>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <fieldset>
                        <div class="card-header bg-primary text-white" align="center"><b>DEALER WISE UID ERROR
                                REPORT</b>
                            <fieldset>
                                <div class="btDec">
                                    <?php echo $this->Form->create('districtFrm', ['name' => 'gotToBlok', 'id' => 'gotToBlok', 'url' => ['controller' => 'Reports', 'action' => 'blkReport']]) ?>
                                    <button class="bkDeco" type="submit">Back</button>
                                    <?php
                                    echo $this->Form->hidden('rgi_dist_code', ['name' => 'rgi_dist_code', 'id' => 'rgi_dist_code', 'value' => $rgi_district_code]);
                                    echo $this->Form->hidden('month_id', ['id' => 'month_id', 'value' => $month_id]);
                                    echo $this->Form->hidden('year_id', ['id' => 'year_id', 'value' => $year_id]);
                                    echo $this->Form->end();
                                    ?>
                                </div>
                                <div class="dstDec">
                                    <span class="dDeco">DISTRICT / BLOCK: </span><b><?php echo $districtName; ?>
                                        <span> / </span><?php echo $blockName; ?></b>
                                </div>
                                <div class="smDeco">
                                    <small><span style="color: white; font-weight: bold; margin-left: 31%;">Note:</span> Dealer Name is a link click for more Details.</small>
                                    <small><span style="color: greenyellow; font-weight: bold">811:</span> Biometric Data did not match.</small>
                                    <small><span style="color: greenyellow; font-weight: bold">300:</span> Missing Biometric Data in CIDR for the given Aadhar Number. </small>
                                </div>
                        </div>
                        <?php echo $this->Form->create('dlrDetail',['name'=>'dlrDetail','id'=>'dlrDetail','url'=>['controller'=>'Reports','action'=>'rationcardDetails']]) ?>
                            <table class="table table-striped table-bordered">
                                <thead style="background-color: darkcyan; color: white;" align="center">
                                <tr>
                                    <th colspan="">#</th>
                                    <th colspan="">Dalers</th>
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
                                foreach($dealerList as $dKey => $dVal){
                                    $dlrId = $dVal['dealer_id'];
                                    ?>
                                    <tr>
                                        <td><?php echo $SlNo;?></td>
                                        <td>
                                            <span class="distButton" onclick="javascript:submitFrm('<?php echo $dlrId;?>')"><?php echo $dVal['name'];?></span>
                                        </td>
                                        <td><?php if(isset($distRepo811[$dKey])){ echo $distRepo811[$dKey]; }else{ echo 0; } ?></td>
                                        <td><?php if(isset($distRepoMem811[$dKey])){ echo $distRepoMem811[$dKey]; }else{ echo 0; } ?></td>
                                        <td><?php if(isset($distRepo300[$dKey])){ echo $distRepo300[$dKey]; }else{ echo 0; } ?></td>
                                        <td><?php if(isset($distRepoMem300[$dKey])){ echo $distRepoMem300[$dKey]; }else{ echo 0; } ?></td>
<!--                                        <td>-->
<!--                                            --><?php
//                                            if (!empty($dVal['uid_eror_811'])) {
//                                                echo $dVal['uid_eror_811'];
//                                            } else {
//                                                echo 0;
//                                            }
//                                            ?>
<!--                                        </td>-->
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
                                <tr style="background-color: darkcyan; color: white; font-weight: bold">
                                    <td colspan="2">Total</td>
                                    <td><?php echo $totRepo811;?></td>
                                    <td><?php echo $totRepoMem811;?></td>
                                    <td><?php echo $totRepo300;?></td>
                                    <td><?php echo $totRepoMem300;?></td>
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

    $('#demo-1').Monthpicker();

</script>
