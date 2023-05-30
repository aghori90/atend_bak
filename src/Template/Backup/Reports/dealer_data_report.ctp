<style>
    .tabCvr {
        display: inline-block;
        width: 100%;
        box-sizing: border-box;
        padding: 9px 13px;
    }
</style>
<div class="container-fluid">
    <fieldset>
        <legend> <?php echo ($dlrshp==1)?"New ":(($dlrshp==2)?"Renewal ":(($dlrshp==3)?"Compensate ":""));  ?> Dealer Report for the Month of <span style="color: greenyellow; font-size: x-large; font-weight: bold;"><?php echo $mnt.' '.$yr?></span>

        </legend>
        <div class="tabCvr">
            <div class="tabCvr">
                <table class="table table-bordered table-striped ">
                    <thead align="center">
                    <tr style="background-color: lightseagreen; color: white; font-weight: 900;">
                        <td>#</td>
                        <td>Dealer Name</td>
                        <td>Acknowledgement</td>
                        <td>License</td>
                        <td>Group</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody align="center">
                    <?php $a=1; foreach($datas as $data) { ?>
                    <tr>
                        <td><?php echo $a++; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['ack_no']; ?></td>
                        <td><?php echo $data['ack_no']; ?></td>
                        <td><?php echo $data['dealer_groups_id']; ?></td>
                        <td>
                            <?php echo $this->Form->create('dlrData',['url'=>['controller'=>'reports', 'action'=>'dealerDataReport']]); ?>
                            <button type="button" class="btn btn-outline-success" <?php echo "1" ?>>VIEW</button>
                            <?php echo $this->Form->end(); ?>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </fieldset>
</div>

