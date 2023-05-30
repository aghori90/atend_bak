<?php
use Cake\Routing\Router;
echo $this->Html->css('monthpicker');
echo $this->Html->script('jquery');
echo $this->Html->script('monthpicker.min');
echo $this->Html->css('fontawesome');
echo $this->Html->script('injection');
echo $this->Html->script('fontawesome');

?>
<style type="text/css">
    .rectangle{
        box-shadow: 1.5px 2px 2px #150f0fb0;
        border-radius: 5px;
        padding: 9px 0px;
        position:relative;
        display: table-cell;
        margin-right: 10px !important;
        vertical-align: middle;
        padding:2px;
        width: 130px;
    }
    .trHead{
        background-color:#12b1a2;
        color: #ffffff;
    }
    #licence{
        color: #19b50e;
        font-weight: bold;
    }
    button.btnBx {
        background-color: none;
        background-color: #fdfdfd00;
        border: none;
        color: blue;
        cursor: pointer;
    }
    .row {
        display: -ms-flexbox;
        display: flex;
        width: 100%;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: 0px;
        margin-left: 0px;
        margin-top: 14px;
    }
    label.orTag {
        border: 1px solid red;
        margin-top: 32px;
        margin-right: -20px;
        padding: 4px 8px 5px 7px;
        border-radius: 18px;
        color: red;
        margin-left: 53px;
    }
    .input.text {
        margin-top: -2px;
    }
    *, ::after, ::before {
        box-sizing: border-box;
        border-radius: 3px;
        /*font-weight: bolder;*/
    }
    .fldDc {
        margin-left: 67px;
    }
    .table {
        width: 95%;
        margin-bottom: 1rem;
        background-color: rgba(0,0,0,0);
        margin-left: 21px;
        border-radius: 23px;
    }
    sub, sup {
        position: relative;
        font-size: 100%;
        line-height: 0;
        vertical-align: baseline;
        color: red;
    }
    .tab{
        background-color: #017298;
        color: white;
        font-size: large;
        font-weight: 600;
        border-color: white;
    }
    .frmNam{
        margin-left: 45%;
        font-size: medium;
        font-weight: 600;
    }
    .input.text {
        margin-top: -23px;
    }
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white"><?php echo $formNameHn; ?><span class="frmNam">प्रपत्र-<?php echo $form_name ?></span></div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Form Name :</b></label>
                                <?php echo $formName[$form_id]; ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Months :</b></label>
                                <?php echo $mnths[$month].' '.$year; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>District :</b></label>
                            <?php echo $distrcts[$dist] ?>
                        </div>
                    </div>
            </div>
        </div>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
</div>
</div>


<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white"><?php echo $formNameHn; ?></div>
            <!--                    --><?php //echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <table class="table  tab" rules="all" border="1">
                            <tr align="center">
                                <td rowspan="4" class="tabb" style="padding-top: 15%;">BLOCK</td>
                                <td rowspan="4" style="padding-top: 15%;">Item(वस्तु)</td>
                                <td colspan="6">चीनी वितरण योजनान्तर्गत प्राप्त राशि की विवरणी</td>
                                <td rowspan="4" style="padding-top: 9%;">कुल प्राप्त राशि (रुपये में )</td>
                                <td rowspan="4" class="tabb" style="padding-top: 15%;">Edit</td>
                            </tr>
                            <tr align="center" class="tab">
                                <td colspan="3">विगत माह तक</td>
                                <td colspan="3">प्रतिवेदित माह तक</td>
                            </tr>
                            <tr align="center" class="tab">
                                <td>आपूर्ति की गयी चीनी की मात्रा(क्विंटल में)</td>
                                <td>दर (रुपये /किलोग्राम में)</td>
                                <td>बैंक ड्राफ्ट के माध्यम से जमा की गयी राशि (रुपये में)</td>
                                <td>आपूर्ति की गयी चीनी की मात्रा(क्विंटल में)</td>
                                <td>भदर (रुपये /किलोग्राम में)</td>
                                <td>बैंक ड्राफ्ट के माध्यम से जमा की गयी राशि (रुपये में )</td>
                            </tr>
                            <tr align="center" class="tab">
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                            </tr>
                            <?php
                            foreach($dmfSmfBlkData as $dsKey => $dsval){
                                //echo "<pre>"; print_r($dsval); "<pre>"; //die;
                                ?>
                                <tr>
                                    <td class="tabb"><?php echo $blocks[$dsval['rgi_block_code']];?></td>
                                    <td><?php echo $items[$dsval['item_id']];?></td>
                                    <td><?php echo $dsval['previous_month_quantity'];?></td>
                                    <td><?php echo $dsval['previous_month_payable_amount'];?></td>
                                    <td><?php echo $dsval['previous_month_paid_amount'];?></td>
                                    <td><?php echo $dsval['current_month_quantity'];?></td>
                                    <td><?php echo $dsval['current_month_payable_amount'];?></td>
                                    <td><?php echo $dsval['current_month_paid_amount'];?></td>
                                    <td><?php echo $dsval['previous_month_paid_amount'] + $dsval['current_month_paid_amount']?></td>
                                    <td class="tabb"></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td colspan="2" class="tabb">Total</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td class="tabb"><i class="fas fa-pencil-alt"></i></td>
                            </tr>

                        </table>
                        <div style="float: left; margin-right: 16px; margin-bottom: 15px; margin-left: 89%;">
                            <button type="submit" class="btn btn-outline-info submitt" style="border-radius: 0 17px 0 0;">ADD</button>
                        </div>
                    </div>
                </fieldset>
                <!--                        --><?php //echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- NEW PAGE -->
<div class="boxHid">
    <div class="mt-4" id="b-inner-sec">
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary text-white">विगत माह तक</div>
                <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']]); ?>
                <?php echo $this->Flash->render(); ?>
                <div class="container-fluid">
                    <div class="container-fluid">
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="form"><b>Block :</b></label>
                                        <?php echo $this->Form->select('blocks', $blocks, ['label' => '', 'class' => 'form-control', 'empty' => '--Select Block--']); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="form"><b>Items :</b></label>
                                        <div class="Month_pick">
                                            <?php echo $this->Form->select('items', $items, ['label' => '', 'class' => 'form-control']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="form"><b>आपूर्ति की गयी चीनी की मात्रा(क्विंटल में ) :</b></label>
                                        <div class="Month_pick">
                                            <?php echo $this->Form->control('dsdQuantity1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00']); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="form"><b>दर (रुपये /किलोग्राम में ) :</b></label>
                                        <div class="Month_pick">
                                            <?php echo $this->Form->control('forPay1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00']); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="form"><b>बैंक ड्राफ्ट के माध्यम से जमा की गयी राशि (रुपये में) :</b></label>
                                        <div class="Month_pick">
                                            <?php echo $this->Form->control('toPay1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00']); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4" id="b-inner-sec">
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary text-white">प्रतिवेदित माह तक</div>
                <?php echo $this->Flash->render(); ?>
                <div class="container-fluid">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>आपूर्ति की गयी चीनी की मात्रा(क्विंटल में) :</b></label>
                                    <?php echo $this->Form->control('dsdQuantity1',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>दर (रुपये /किलोग्राम में) :</b></label>
                                    <div class="Month_pick">
                                        <?php echo $this->Form->control('forPay1',  ['label'=>'', 'class' => 'form-control numonly','placeholder'=>'0.00']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>बैंक ड्राफ्ट के माध्यम से जमा की गयी राशि (रुपये में) :</b></label>
                                    <div class="Month_pick">
                                        <?php echo $this->Form->control('toPay1',  ['label'=>'', 'class' => 'form-control numonly','placeholder'=>'0.00']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>कुल प्राप्त राशि :</b></label>
                                    <div class="Month_pick">
                                        <?php echo $this->Form->control('toPay1',  ['label'=>'', 'class' => 'form-control numonly','placeholder'=>'0.00']); ?>
                                    </div>
                                </div>
                            </div>
                            <div style="float: left; margin-right: 16px; margin-bottom: 15px; border-radius: 0 18px 0 0px; margin-left: 89%;">
                                <button type="submit" class="btn btn-outline-info submitt">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        $(".boxHid").hide();
        $(".submitt").click(function(){
            if(jQuery('.boxHid').is(':visible')){
                $(".boxHid").hide();
            }else{
                $(".boxHid").show();
            }
        });
    });
</script>


