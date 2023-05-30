<style>
    .serBtn{
        margin: -47px -208px 0px -1px;
        float: right;
    }
    .frmFld{
        margin: -31px 6px 8px 100px;
    }
    .tabCvr {
        display: inline-block;
        width: 100%;
        box-sizing: border-box;
        padding: 9px 13px;
    }
    button.btnDco {
        display: contents;
        color: blue;
    }
</style>
<!--Year Search -->
<div class="container-fluid">
    <fieldset>
        <legend><?= __('Dealer Reports') ?></legend>
        <?php echo $this->Form->create('yrData',['url'=>['controller'=>'reports', 'action'=>'dealerReport']]) ?>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin: 5px 0px 0px 176px;">
                <div class="form-group">
                    <label for=""><b>Select Year</b></label>
                    <?php echo $this->Form->control('year',['label'=>'', 'class'=>'form-control yearpicker frmFld','placeholder'=>'Select Year' ]); ?>
                </div>
                <button type="submit" class="btn btn-outline-success serBtn">Search</button>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </fieldset>
</div>
<!--Searched Data By Months-->
<?php if($this->getRequest()->is('post')) { ?>
<div class="container-fluid">
    <fieldset>
        <legend><?= __('Month Wise Dealer Reports') ?></legend>
        <div class="tabCvr">
<!--            --><?php //echo "<pre>"; print_r($monthReport); "<pre>"; die; ?>
            <small style="color: red;font-weight: bold">Note :</small><small> Click over count for further details.</small>
            <table class="table table-bordered table-striped ">
                <thead align="center">
                <tr style="background-color: lightseagreen; color: white; font-weight: 900;">
                    <td>#</td>
                    <td>Months</td>
                    <td>New Dealer</td>
                    <td>Renewal Dealer</td>
                    <td>Compasnate Dealer</td>
                </tr>
                </thead>
                <tbody align="center">
<!--                <--><?php //echo "<pre>"; print_r($monthReport); "<pre>"; die;  ?>
                <?php $a=1; foreach($monthReport as $data){ ?>
                    <tr>
                        <td><?php echo $a++; ?></td>
                        <td><?php echo $data['month']; ?></td>
                        <td>
                            <?php echo $this->Form->create('dlrData',['url'=>['controller'=>'reports', 'action'=>'dealerDataReport']]); ?>
                            <?php if($data['newDealer'] == '' || $data['newDealer'] == 0) {
                                echo '0';
                            }
                            else {?>
                            <?php echo $this->Form->hidden('yer',['value'=>$yr]);?>
                            <?php echo $this->Form->hidden('mnthId',['value'=>$data['monthId']]);?>
                            <?php echo $this->Form->hidden('mnth',['value'=>$data['month']]);?>
                            <?php echo $this->Form->hidden('dlrShip',['value'=>'1']);?>
                            <button type="submit" class="btnDco"><?php echo $data['newDealer']; ?></button>
                            <?php } ?>
                            <?php echo $this->Form->end(); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->create('dlrData',['url'=>['controller'=>'reports', 'action'=>'dealerDataReport']]); ?>
                            <?php if($data['renewalDealer'] == '' || $data['renewalDealer'] == 0) {
                                echo '0';
                            }
                            else {?>
                                <?php echo $this->Form->hidden('yer',['value'=>$yr]);?>
                                <?php echo $this->Form->hidden('mnthId',['value'=>$data['monthId']]);?>
                                <?php echo $this->Form->hidden('mnth',['value'=>$data['month']]);?>
                                <?php echo $this->Form->hidden('dlrShip',['value'=>'2']);?>
                                <button type="submit" class="btnDco"><?php echo $data['renewalDealer']; ?></button>
                            <?php } ?>
                            <?php echo $this->Form->end(); ?>
                        </td>
                        <td>
                            <?php echo $this->Form->create('dlrData',['url'=>['controller'=>'reports', 'action'=>'dealerDataReport']]); ?>
                            <?php if($data['compansateDealer'] == '' || $data['compansateDealer'] == 0) {
                                echo '0';
                            }
                            else {?>
                                <?php echo $this->Form->hidden('yer',['value'=>$yr]);?>
                                <?php echo $this->Form->hidden('mnthId',['value'=>$data['monthId']]);?>
                                <?php echo $this->Form->hidden('mnth',['value'=>$data['month']]);?>
                                <?php echo $this->Form->hidden('dlrShip',['value'=>'3']);?>
                                <button type="submit" class="btnDco"><?php echo $data['compansateDealer']; ?></button>
                            <?php } ?>
                            <?php echo $this->Form->end(); ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </fieldset>
</div>
<?php }
else {
//    echo "Sorry! No Records.";
}
?>

<script>
    $(document).ready(function() {
        $(".yearpicker").yearpicker({
            year: 2021,
            startYear: 2012,
            endYear: 2030
        });
        jQuery(".yearpicker").val('');
    });
</script>
