<?php
//echo "<pre>"; print_r($slctRationCrds); "<pre>"; die;
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
    .distButton{
        cursor: pointer;
        color: #0a578e;
    }
    span.dDeco {
        font-family: fangsong;
        margin-left: 3px;
        color: orangered;
    }
    span.bkDeco {
        display: inline-block;
        float: right;
        border: none;
    }
    .distButton{
        cursor: pointer;
        color: #0a578e;
    }
    .btnDeco {
        margin-top: 19px;
    }
    tr.trHead {
        background-color: cornflowerblue;
        color: white;
    }
    span.dDeco {
        /* font-family: fangsong; */
        margin-left: -73%;
        /* color: white; */
        display: inline-block;
        position: relative;
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
        margin: 0 0 -37px -76%;
        font-size: larger;
        color: yellow;
    }
    span.nmYr {
        border-bottom-style: solid;
        color: yellow;
        font-weight: 800;
        display: inline-block;
    }
    .mYDeco {
         margin: 10px 0 -1px 6%;
     }
</style>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <div class="card-header bg-primary text-white" align="center"><b>RATIONCARD WISE UID ERROR
                            REPORT</b>
                        <fieldset>
                            <div class="btDec">
                                <?php echo $this->Form->create('districtFrm', ['name' => 'gotToBlok', 'id' => 'gotToBlok', 'url' => ['controller' => 'Reports', 'action' => 'dealerWiseCount']]) ?>
                                <button class="bkDeco" type="submit">Back</button>
                                <?php
                                echo $this->Form->hidden('rgi_blk_code', ['name' => 'rgi_blk_code', 'id' => 'rgi_blk_code', 'value' => $rgi_block_code]);
                                echo $this->Form->hidden('month_id', ['id' => 'month_id', 'value' => $month_id]);
                                echo $this->Form->hidden('year_id', ['id' => 'year_id', 'value' => $year_id]);
                               echo $this->Form->end();
                                ?>
                            </div>
                            <div class="dstDec">
                                <span class="dDeco">DISTRICT / BLOCK  :  </span><b><?php echo $districtName; ?>
                                    <span> / </span><?php echo $blockName; ?></b>
                            </div>
                            <div class="smDeco">
                                <small><span style="color: white; font-weight: bold">Dealer : </span><b><?php echo $dlrName; ?></b></small>
                            </div>
                            <div class="mYDeco">
                                <small class="my"><span style="color: white; font-weight: bold">Month/Year : </span><span class="nmYr"><?php echo $mnths[$month_id]; ?>/<?php echo $yer[$year_id]; ?></span></small>
                            </div>
                    </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="trHead">
                                <th scope="col">#</th>
                                <th scope="col">Rationcard No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Fingure Used</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($slctRationCrds)) {
                                $SlNo = 1;
                                foreach ($slctRationCrds as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $SlNo++; ?></td>
                                        <td><?php echo $value['rationcard_no'] ?></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['error_count'] ?></td>
                                    </tr>
                                    <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="6">Sorry ! No Records Found.</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php
//                        echo $this->Form->hidden('dealerId',['name'=>'dealerId','id'=>'dealerId']);
//                        echo $this->Form->hidden('rgi_blk_code',['name'=>'rgi_blk_code','id'=>'rgi_blk_code']);
//                        echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code','value'=>$rgi_district_code]);
//                        echo $this->Form->end();
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /*function submitFrm(dealerId){
        // alert(distCode);return false;
        document.getElementById('dealerId').value = dealerId;
        document.getElementById('dlrDetail').submit();
    }*/

    $('#demo-1').Monthpicker();

</script>
