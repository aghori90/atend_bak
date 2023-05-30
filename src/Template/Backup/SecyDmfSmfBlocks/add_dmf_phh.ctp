<?php
use Cake\Routing\Router;
echo $this->Html->css('monthpicker');
echo $this->Html->script('jquery');
echo $this->Html->script('monthpicker.min');
//echo $this->Html->css('fontawesome');
echo $this->Html->script('injection');
//echo $this->Html->script('fontawesome');
//echo $blocks[$dsval['rgi_block_code']]; die;


if(!empty($data)){
    $rgi_block                      = $data['rgi_block_code'];
    $item                           = $data['item_id'];
    $dsdQuantity1                   = $data['previous_month_quantity'];
    $forPay1                        = $data['previous_month_payable_amount'];
    $toPay1                         = $data['previous_month_paid_amount'];
    $dsdQuantity2                   = $data['current_month_quantity'];
    $forPay2                        = $data['current_month_payable_amount'];
    $toPay2                         = $data['current_month_paid_amount'];
}else{
    $rgi_block                      = '';
    $dsdQuantity1                   = '';
    $forPay1                        = '';
    $toPay1                         = '';
    $dsdQuantity2                   = '';
    $forPay2                        = '';
    $toPay2                         = '';
    $item                           = '';
}

?>
<style type="text/css">
    .rectangle{
        box-shadow: 1.5px 2px 2px #150f0fb0;
        border-radius: 5px;padding: 9px 0px;
        position:relative;
        display: table-cell;
        margin-right: 10px !important;
        vertical-align: middle;
        padding:2px;width: 130px;}
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
    table.tab.table {
        background-color: #017298;
        color: white;
        font-size: large;
        font-weight: 600;
        border-color: white;
        table-hover: none;
    }
    .frmNam{
        margin-left: 45%;
        font-size: medium;
        font-weight: 600;
    }
    .input.text {
        margin-top: -23px;
    }
    button {
        border: none;
        background: transparent;
        font-size: xx-large;
        /* color: red; */
    }
    .tooltip {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
        top: -5px;
        left: 105%;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>
    <!--After Search Form/ Add form -->
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
<!--        </div>-->
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
                                <table class="table tab" rules="all" border="1">
                                    <tr align="center">
                                        <td rowspan="4" class="tabb" style="padding-top: 15%;">BLOCK</td>
                                        <td rowspan="4" style="padding-top: 15%;">Item(वस्तु)</td>
                                        <td colspan="6">डोर स्टेप डिलीवरी हेतु व्यय की गयी राशि की विवरणी</td>
                                        <td rowspan="4" style="padding-top: 13%;">कुल व्यय(रुपये में)(3+6)</td>
                                        <td rowspan="4" class="tabb" style="padding-top: 15%;">Edit</td>
                                    </tr>
                                    <tr align="center" class="tab">
                                        <td colspan="3">विगत माह तक</td>
                                        <td colspan="3">प्रतिवेदित माह तक</td>
                                    </tr>
                                    <tr align="center" class="tab">
                                        <td>
                                            <?php
                                                if($form_id == 15){ ?>
                                                    वितरित की गयी किराशन तेल की मात्रा (किलोलीटर में )
                                                    <?php

                                                }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                                    डी एस डी की गयी खाद्यान की मात्रा(किवंटल में)
                                            <?php

                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($form_id == 15){ ?>
                                                डीलर कमीशन हेतु कुल भुगतेय राशि ( रुपये में )
                                                <?php

                                            }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                                भुगतेय राशि(रूपये में)
                                                <?php

                                            }
                                            ?>
                                        </td>
                                        <td>भुगतान की गयी राशि (रूपये में)</td>
                                        <td>
                                            <?php
                                            if($form_id == 15){ ?>
                                                वितरित की गयी किराशन तेल की मात्रा (किलोलीटर में )
                                                <?php

                                            }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                                डी एस डी की गयी खाद्यान की मात्रा(किवंटल में)
                                                <?php

                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($form_id == 15){ ?>
                                                डीलर कमीशन हेतु कुल भुगतेय राशि ( रुपये में )
                                                <?php

                                            }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                                भुगतेय राशि (रूपये में)
                                                <?php

                                            }
                                            ?>
                                        </td>
                                        <td>भुगतान की गयी राशि(रूपये में)</td>
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
//                                            echo "<pre>"; print_r($dsval); "<pre>"; die;

//                                            echo [$dsval['rgi_block_code']]; die;
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
                                          <td class="tabb">
                                            <?php echo $this->Form->create('edit',['url'=>['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmfPhh']]); ?>
                                                <?php echo $this->Form->hidden('montId',['value'=> $month]); ?>
                                                <?php echo $this->Form->hidden('yearId',['value'=> $year]); ?>
                                                <?php echo $this->Form->hidden('blkId',['value'=> $dsval['rgi_block_code']]); ?>
                                                <?php echo $this->Form->hidden('id',['value'=> $dsval['id']]); ?>
<!--                                                <button type="submit"><i class="fa fa-pencil-alt"></i></button>-->
                                                <button type="submit" name="edit" value="aghori"><i class="fa fa-pencil"></i></button>
                                            <?php echo $this->Form->end(); ?>
                                          </td>

                                      </tr>
                                    <?php
                                        }
                                    ?>
                                    <tr>
                                        <td colspan="2" class="tabb">कुल</td>
                                        <td><?php echo '';?></td>
                                        <td><?php echo '';?></td>
                                        <td><?php echo '';?></td>
                                        <td><?php echo '';?></td>
                                        <td><?php echo '';?></td>
                                        <td><?php echo '';?></td>
                                        <td><?php echo '';?></td>
                                        <td><?php echo '';?></td>
                                        <td class="tabb"></td>
                                    </tr>

                                </table>
                                <?php if(empty($id)){ ?>
                                    <div style="float: left; margin-right: 16px; margin-bottom: 15px; margin-left: 89%;">
                                        <button type="submit" class="btn btn-outline-info submitt" style="border-radius: 0 17px 0 0;">ADD</button>
                                    </div>
                                <?php } ?>
                            </div>
                        </fieldset>
<!--                        --><?php //echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- NEW PAGE -->
    <!--Add Form-->
    <?php
    if(!empty($id)){
        $disp = "block";
        $action = 'updateSmfDmfBlocks';
    }else{
        $disp = "none";
        $action = 'addDmfPhh';
    }
    ?>
    <div class="boxHid" style="display:<?php echo $disp; ?>">
        <div class="mt-4" id="b-inner-sec">
            <div class="container">
                <div class="card">
                    <div class="card-header bg-primary text-white">विगत माह तक</div>
                    <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfBlocks', 'action'=>$action]]); ?>
                    <?php echo $this->Flash->render(); ?>
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>Block :</b></label>
                                            <?php  echo $this->Form->select('blocks',$blocks,  ['label'=>'', 'class' => 'form-control', 'empty' => '--Select Block--','value'=>$rgi_block]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>Items :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->select('items',$items,  ['label'=>'','class' => 'form-control','empty'=>'--Select Items--','value'=>$item]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>कार्ड का प्रकार चुनें :</b></label>
                                            <div class="Month_pick">
                                                <?php
                                                echo $this->Form->select('card',$cards,  ['label'=>'', 'class' => 'form-control']);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <?php
                                        if($form_id == 15){ ?>
                                            <div class="form-group">
                                                <label for="form"><b>वितरित की गयी किराशन तेल की मात्रा (किलोलीटर में ) :</b></label>
                                                <?php echo $this->Form->control('dsdQuantity1',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00','value'=>$dsdQuantity1]); ?>
                                            </div>

                                        <?php }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                            <div class="form-group">
                                                <label for="form"><b>डी एस डी की गयी खाद्यान की मात्रा(किवंटल में) :</b></label>
                                                <?php echo $this->Form->control('dsdQuantity1',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00','value'=>$dsdQuantity1]); ?>
                                            </div>

                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <?php
                                        if($form_id == 15){ ?>
                                            <div class="form-group">
                                                <label for="form"><b>डीलर कमीशन हेतु कुल भुगतेय राशि ( रुपये में ) :</b></label>
                                                <?php echo $this->Form->control('dsdQuantity1',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00','value'=>$dsdQuantity1]); ?>
                                            </div>

                                        <?php }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                            <div class="form-group">
                                                <label for="form"><b>भुगतेय राशि (रूपये में ) :</b></label>
                                                <div class="Month_pick">
                                                    <?php echo $this->Form->control('forPay1',  ['label'=>'', 'class' => 'form-control numonly','placeholder'=>'0.00', 'value'=>$forPay1]); ?>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <?php
                                        if($form_id == 15){ ?>
                                            <div class="form-group">
                                                <label for="form"><b>भुगतान की गयी राशि (रूपये में ) :</b></label>
                                                <?php echo $this->Form->control('forPay1',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00','value'=>$forPay1]); ?>
                                            </div>

                                        <?php }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                            <div class="form-group">
                                                <label for="form"><b>भुगतान की गयी राशि (रूपये में ) :</b></label>
                                                <div class="Month_pick">
                                                    <?php echo $this->Form->control('toPay1',  ['label'=>'', 'class' => 'form-control numonly','placeholder'=>'0.00','value'=>$toPay1]); ?>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
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
                                    <?php
                                    if($form_id == 15){ ?>
                                        <div class="form-group">
                                            <label for="form"><b>वितरित की गयी किराशन तेल की मात्रा (किलोलीटर में ) :</b></label>
                                            <?php echo $this->Form->control('dsdQuantity2',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00', 'value'=>$dsdQuantity2]); ?>
                                        </div>

                                    <?php }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                        <div class="form-group">
                                            <label for="form"><b>डी एस डी की गयी खाद्यान की मात्रा(किवंटल में) :</b></label>
                                            <?php echo $this->Form->control('dsdQuantity2',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00', 'value'=>$dsdQuantity2]); ?>
                                        </div>

                                    <?php } ?>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <?php
                                    if($form_id == 15){ ?>
                                        <div class="form-group">
                                            <label for="form"><b>डीलर कमीशन हेतु कुल भुगतेय राशि ( रुपये में ) :</b></label>
                                            <?php echo $this->Form->control('forPay2',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00', 'value'=>$forPay2]); ?>
                                        </div>

                                    <?php }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                        <div class="form-group">
                                            <label for="form"><b>भुगतेय राशि (रूपये में ) :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->control('forPay2',  ['label'=>'', 'class' => 'form-control numonly','placeholder'=>'0.00', 'value'=>$forPay2]); ?>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <?php
                                    if($form_id == 15){ ?>
                                        <div class="form-group">
                                            <label for="form"><b>भुगतान की गयी राशि (रूपये में ) :</b></label>
                                            <?php echo $this->Form->control('toPay2',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00', 'value'=>$toPay2]); ?>
                                        </div>

                                    <?php }elseif($form_id == 3 || $form_id == 7 || $form_id == 11 ){ ?>
                                        <div class="form-group">
                                            <label for="form"><b>भुगतान की गयी राशि (रूपये में ) :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->control('toPay2',  ['label'=>'', 'class' => 'form-control numonly','placeholder'=>'0.00', 'value'=>$toPay2]); ?>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                                <div style="float: left; margin-right: 16px; margin-bottom: 15px; border-radius: 0 18px 0 0px; margin-left: 89%;">
                                    <button type="submit" class="btn btn-outline-info submitt" name="add">Submit</button>
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
    var id = "<?php echo $id;?>";
    jQuery(document).ready(function(){
        if(id != ''){
            $(".boxHid").show();
        }else{
            $(".boxHid").hide();
            $(".submitt").click(function(){
                if(jQuery('.boxHid').is(':visible')){
                    $(".boxHid").hide();
                }else{
                    $(".boxHid").show();
                }
            });
        }
    });
</script>


