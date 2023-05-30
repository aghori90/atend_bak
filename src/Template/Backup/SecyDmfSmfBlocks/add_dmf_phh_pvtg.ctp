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
    .frmDec{
        margin: 15px 0 0 0px;
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
                                <table class="table tab" rules="all" border="1">
                                    <tr align="center">
                                        <td rowspan="4" class="tabb">BLOCK</td>
                                        <td rowspan="4">Item(वस्तु)</td>
                                        <td colspan="6">खाद्यान्न के परिवहन हेतु व्यय की गई राशि</td>
                                        <td rowspan="4">कुल व्यय(रुपये में)(3+6)</td>
                                        <td rowspan="4" class="tabb">Edit</td>
                                    </tr>
                                    <tr align="center" class="tab">
                                        <td colspan="3">विगत माह तक</td>
                                        <td colspan="3">प्रतिवेदित माह तक</td>
                                    </tr>
                                    <tr align="center" class="tab">
                                        <td>परिवहन की गयी खाद्यान की मात्रा (क्विंटल में)</td>
                                        <td>भुगतेय राशि (रुपये में)</td>
                                        <td>भुगतान की गयी राशि (रूपये में)</td>
                                        <td>परिवहन की गयी खाद्यान की मात्रा (क्विंटल में)</td>
                                        <td>भुगतेय राशि (रुपये में)</td>
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
<?php
   if($form_id == 22){ ?>
<!--       DMF-05-PVTG-->
       <div class="boxHid">
           <div class="mt-4" id="b-inner-sec">
               <div class="container">
                   <div class="card">
                       <div class="card-header bg-primary text-white">विगत माह तक</div>
                       <?php echo $this->Form->create('frmSrch', ['url' => ['controller' => 'SecyDmfSmfBlocks', 'action' => 'addDmfPhhPvtg']]); ?>
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
                                               <label for="form"><b>कार्ड का प्रकार चुनें :</b></label>
                                               <div class="Month_pick">
                                                   <?php
                                                   echo $this->Form->select('card', $cards, ['label' => '', 'class' => 'form-control']);
                                                   ?>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                           <div class="form-group">
                                               <label for="form"><b>परिवहन की गई खाद्यान्न की मात्रा (क्विंटल में)
                                                       :</b></label>
                                               <div class="Month_pick">
                                                   <?php echo $this->Form->control('dsdQuantity1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00']); ?>

                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                           <div class="form-group">
                                               <label for="form"><b>भुगतेय राशि (रूपये में) :</b></label>
                                               <div class="Month_pick">
                                                   <?php echo $this->Form->control('forPay1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00']); ?>

                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                           <div class="form-group">
                                               <label for="form"><b>भुगतान की गयी राशि (रूपये में) :</b></label>
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
                                           <label for="form"><b>परिवहन की गई खाद्यान्न की मात्रा (क्विंटल में)
                                                   :</b></label>
                                           <?php echo $this->Form->control('dsdQuantity1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00']); ?>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                       <div class="form-group">
                                           <label for="form"><b>भुगतेय राशि (रूपये में) :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('forPay1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00']); ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                       <div class="form-group">
                                           <label for="form"><b>भुगतान की गयी राशि (रूपये में) :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('toPay1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00']); ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                       <div class="form-group">
                                           <label for="form"><b>कुल व्यय((7=3+6))(रुपये में) :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('totalBal', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00','readonly'=>'readonly']); ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div
                                       style="float: left; margin-right: 16px; margin-bottom: 15px; border-radius: 0 18px 0 0px; margin-left: 89%;">
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
<?php }
//   <!--DMP-06-PVTG-->
   elseif ($form_id == 23){ ?>
       <div class="boxHid">
           <div class="mt-4" id="b-inner-sec">
               <div class="container">
                   <div class="card">
                       <div class="card-header bg-primary text-white">विगत माह तक</div>
                       <?php echo $this->Form->create('frmSrch', ['url' => ['controller' => 'SecyDmfSmfBlocks', 'action' => 'addDmfPhhPvtg']]); ?>
                       <?php echo $this->Flash->render(); ?>
                       <div class="container-fluid">
                           <fieldset>
                               <div class="row rounded-bottom border-bottom border border-primary">
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
                                           <label for="form"><b>कार्ड का प्रकार चुनें :</b></label>
                                           <div class="Month_pick">
                                               <?php
                                               echo $this->Form->select('card', $cards, ['label' => '', 'class' => 'form-control']);
                                               ?>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </fieldset>
                           <fieldset>
                               <div class="row rounded-bottom border-bottom border border-primary"
                                    style="margin-bottom: 21px;">
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec">
                                       <div class="form-group">
                                           <label for="form"><b>विगत माह की अवशेष मात्रा (क्विंटल में)(1) :</b></label>
                                           <?php echo $this->Form->control('lstMnthRstQuantity', ['label' => '', 'class' => 'form-control lstMnthRstQuantity', 'placeholder' => '0.00']); ?>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec">
                                       <div class="form-group">
                                           <label for="form"><b>प्रतिवेदित माह हेतु आवंटित खाद्यान्न (क्विंटल में)(2)
                                                   :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('currAllocation', ['label' => '', 'class' => 'form-control', 'placeholder' => '0.00']); ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                       <div class="form-group">
                                           <label for="form"><b>पैकेजिंग हेतु उपलब्ध कराये गये खाद्यान्न की मात्रा
                                                   (क्विंटल में)(3) :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('packageingQuantity', ['label' => '', 'class' => 'form-control packageingQuantity', 'placeholder' => '0.00']); ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                       <div class="form-group">
                                           <label for="form"><b>उपलब्ध कुल खाद्यान की मात्रा (क्विंटल में )(4)=(1+3)
                                                   :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('totalQuantity', ['label' => '', 'class' => 'form-control totalQuantity', 'readonly' => 'readonly', 'placeholder' => '0.00']); ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                       <div class="form-group">
                                           <label for="form"><b>सुपात्र लाभुक परिवारों की संख्या(5) :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('BenCount', ['label' => '', 'class' => 'form-control BenCount', 'placeholder' => '0.00']); ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                       <div class="form-group">
                                           <label for="form"><b>35 किलोग्राम खाद्यान्न के पैकेटों की संख्या(6) :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('packetCount', ['label' => '', 'class' => 'form-control', 'placeholder' => '0.00']); ?>
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
                       <div class="card-header bg-primary text-white">वितरित पैकेटों की संख्या</div>
                       <?php echo $this->Flash->render(); ?>
                       <div class="container-fluid">
                           <fieldset>
                               <div class="row rounded-bottom border-bottom border border-primary" style="margin-bottom: 21px;">
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style='margin: 15px 0px 0px 0px'>
                                       <div class="form-group">
                                           <label for="form"><b>विगत माह तक(7) :</b></label>
                                           <?php echo $this->Form->control('lstMnth',  [ 'label'=>'','class' => 'form-control numonly lstMnth', 'placeholder' => '0.00']); ?>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin: 15px 0px 0px 0px">
                                       <div class="form-group">
                                           <label for="form"><b>प्रतिवेदित माह में(8) :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('currMnth',  ['label'=>'', 'class' => 'form-control numonly currMnth','placeholder'=>'0.00']); ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                       <div class="form-group">
                                           <label for="form"><b>कुल(9)=(7+8) :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('total',  ['label'=>'', 'class' => 'form-control numonly total','placeholder'=>'0.00', 'readonly'=>'readonly']); ?>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </fieldset>
                           <fieldset>
                               <div class="row rounded-bottom border-bottom border border-primary" style="margin-bottom: 21px;">
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin: 15px 0px 0px 0px">
                                       <div class="form-group">
                                           <label for="form"><b>अवशेष खाद्यान{4-(8*35/100)} :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('remainBalance',  ['label'=>'', 'class' => 'form-control numonly remainBalance','placeholder'=>'0.00', 'readonly'=>'readonly']); ?>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" style="margin: 15px 0px 0px 0px">
                                       <div class="form-group">
                                           <label for="form"><b>अलाभन्वित लाभुक परिवारों की संख्या (5-8) :</b></label>
                                           <div class="Month_pick">
                                               <?php echo $this->Form->control('unpaidBenCnt',  ['label'=>'', 'class' => 'form-control numonly unpaidBenCnt','placeholder'=>'0.00', 'readonly'=>'readonly']); ?>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </fieldset>
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
<?php }?>
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

    // for ui calculation
    // उपलब्ध कुल खाद्यान की मात्रा (क्विंटल में )(4)=(1+3) :
    $(".packageingQuantity, .lstMnthRstQuantity").blur(function(){
        var lstMnthRstQuantity_val  = parseInt($(".lstMnthRstQuantity").val());
        var packageingQuantity_val  = parseInt($(".packageingQuantity").val());
        var totalQuantity_val       = parseInt($(".totalQuantity").val());
        var totalPaid               = lstMnthRstQuantity_val+packageingQuantity_val;
        if(!isNaN(totalPaid)){
            $(".totalQuantity").val(totalPaid);
        }
        /*if(totalQuantity_val){
            $('.topaysubtotal').val(totalQuantity_val - totalPaid);
        }*/
    });

    // कुल(9)=(7+8) :
    $(".currMnth").blur(function(){
        var totalQuantity_val        = parseFloat($(".totalQuantity").val());
        var currMnth_val             = parseFloat($(".currMnth").val());
        var remainBalance_val        = parseFloat($(".remainBalance").val());
        var multiply                 = parseFloat(currMnth_val*35);
        var divide                   = parseFloat(multiply/100);
        var subtract                 = totalQuantity_val-divide;
        var totalPaid                = subtract;
        if(!isNaN(totalPaid)) {
            $(".remainBalance").val(totalPaid);
        }
        /*if(topayFrom_val){
            $('.topaysubtotal').val(topayFrom_val - totalPaid);
        }*/
    });

    // अवशेष खाद्यान{4-(8*35/100)}
    $(".currMnth").blur(function(){
        var lstMnth_val     = parseFloat($(".lstMnth").val());
        var currMnth_val    = parseFloat($(".currMnth").val());
        var total_val       = parseFloat($(".total").val());
        var totalPaid       = lstMnth_val + currMnth_val ;
        if(!isNaN(totalPaid)) {
            $(".total").val(totalPaid);
        }
        /*if(topayFrom_val){
            $('.topaysubtotal').val(topayFrom_val - totalPaid);
        }*/
    });

    // अलाभन्वित लाभुक परिवारों की संख्या (5-8)
    $(".currMnth").blur(function(){
        var BenCount_val        = parseFloat($(".BenCount").val());
        var currMnth_val        = parseFloat($(".currMnth").val());
        var unpaidBenCnt_val    = parseFloat($(".unpaidBenCnt").val());
        var totalPaid           = BenCount_val - currMnth_val ;
        if(!isNaN(totalPaid)) {
            $(".unpaidBenCnt").val(totalPaid);
        }
        /*if(topayFrom_val){
            $('.topaysubtotal').val(topayFrom_val - totalPaid);
        }*/
    });


</script>


