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
        font-family: emoji;
        margin-left: 12px;
        color: blue;
    }
    span.bDeco {
        font-family: emoji;
        margin-left: 18px;
        color: blue;
    }
</style>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <fieldset>
                        <legend>PANCHAYAT WISE DEALER COUNT</legend>
                        <div>
<!--                            --><?php //echo $this->Form->create('districtFrm',['name'=>'districtFrm','id'=>'districtFrm','url'=>['controller'=>'TreasuryMasters','action'=>'blockVacancy'],'method'=>'post']) ?>
                            <span class="dDeco">DISTRICT NAME: </span><b><?php echo $districtName; ?></b> <span class="bDeco">BLOCK NAME: </span><b><?php echo $blockName; ?></b>
                            <table class="table table-striped">
                                <thead style="background-color: darkcyan; color: white;">
                                <th>Sl No.</th>
                                <th>Block</th>
                                <th>Dealer Count</th>
                                </thead>
                                <tbody>
                                <?php
                                $SlNo = 1;
                                foreach($panchayats as $dKey => $dVal){
                                    ?>
                                    <tr>
                                        <td><?php echo $SlNo;?></td>
                                        <!--<td><span class="distButton" onclick="javascript:submitFrm('<?php /*echo $dKey;*/?>')"><?php /*echo $dVal;*/?></span></td>-->
                                        <td><?php echo $dVal;?></td>
                                        <td><?php if(isset($dealerList[$dKey])){ echo $dealerList[$dKey]; }else{ echo 0; } ?></td>
                                    </tr>
                                    <?php
                                    $SlNo++;
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                            echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code']);
//                            echo $this->Form->end();
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
        document.getElementById('rgi_dist_code').value = distCode;
        document.getElementById('districtFrm').submit();
    }

</script>
