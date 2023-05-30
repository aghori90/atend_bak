<style>
    .clearfix {
        /*margin: -14px 122px 0px 46px;*/
    }
    th {
        padding: 5px;
        background-color: #4cb96b;
        color: white;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
    }
    .distButton {
        cursor: pointer;
        color: #0804ff;
    }
</style>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <div class="card-header bg-primary text-white"><b>UID VERIFICATION</b></div>
                    <fieldset>
                        <?php echo $this->Form->create('blkDetails',['name'=>'blkDetails','id'=>'blkDetails','url'=>['controller'=>'Reports','action'=>'dealerOnBlock']]) ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Block</th>
                                <th scope="col">UID Records</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $a = 1;
                            $totl = 0;
                            $dumy = 10;
                            foreach ($blocks as $block) { ?>
                                <tr>
                                    <td><?php echo $a++ ?></td>
                                    <td>
                                        <span class="distButton" onclick="javascript:submitFrm('<?php echo $block;?>')"><?php echo $block;?></span>
                                    </td>
<!--                                    <td>--><?php //echo $block; ?><!--</td>-->
                                    <td><?php echo $dumy; ?></td>
                                </tr>
<!--                                            $tot = $totl + $dumy;-->
                            <?php } ?>
                                    <tr style="background-color: darkcyan; color: white;font-weight: bold">
                                        <td colspan="2">Total</td>
                                        <td><?php echo '100'; ?></td>
                                    </tr>
                            </tbody>
                        </table>
                        <?php
                        echo $this->Form->hidden('rgi_blk_code',['name'=>'rgi_blk_code','id'=>'rgi_blk_code', 'value'=>$rgi_block_code]);
                        echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code','value'=>$rgi_district_code]);
                        echo $this->Form->end();
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function submitFrm(distCode){
        // alert(distCode);return false;
        document.getElementById('rgi_blk_code').value = distCode;
        document.getElementById('blkDetails').submit();
    }
</script>
