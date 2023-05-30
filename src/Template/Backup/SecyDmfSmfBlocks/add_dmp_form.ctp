<?php
use Cake\Routing\Router;
echo $this->Html->css('monthpicker');
echo $this->Html->script('jquery');
echo $this->Html->script('monthpicker.min');
//echo $this->Html->css('fontawesome');
echo $this->Html->script('injection');
//echo $this->Html->script('fontawesome');
//echo $blocks[$dsval['rgi_block_code']]; die;

// for edit part
if(!empty($data)){
    $rgi_block                      = $data['rgi_block_code'];
    $item                           = $data['item_id'];
//    $dsdQuantity1                   = $data['previous_month_quantity'];
//    $forPay1                        = $data['previous_month_payable_amount'];
//    $toPay1                         = $data['previous_month_paid_amount'];
//    $dsdQuantity2                   = $data['current_month_quantity'];
//    $forPay2                        = $data['current_month_payable_amount'];
//    $toPay2                         = $data['current_month_paid_amount'];
}else{
    $rgi_block                      = '';
    $item                           = '';

//    $dsdQuantity1                   = '';
//    $forPay1                        = '';
//    $toPay1                         = '';
//    $dsdQuantity2                   = '';
//    $forPay2                        = '';
//    $toPay2                         = '';
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
    .frmDec{
        margin: 15px 0 0 0px;
    }
</style>
<!--After Search Form/ Add form -->
<div class="mt-4" id="b-inner-sec vcover">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white"><?php echo $formNameHn; ?><span class="frmNam">प्रपत्र-<?php echo $form_name ?></span></div>
            <?php echo $this->Form->create('dmpForm',['url'=>['controller'=>'SecyDmfSmfBlocks', 'action'=>'addDmpForm']]); ?>
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
                        <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>District :</b></label>
                                <?php echo $distrcts[$dist] ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>Block :</b></label>
                                <?php  echo $this->Form->select('blocks',$blocks,  ['label'=>'', 'class' => 'form-control blk', 'empty' => '--Select Block--','value'=>$rgi_block]); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>Items :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->select('items',$items,  ['label'=>'','class' => 'form-control itms','value'=>$item]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>कार्ड का प्रकार चुनें :</b></label>
                                <div class="Month_pick">
                                    <?php
                                    echo $this->Form->select('card',$cards,  ['label'=>'', 'class' => 'form-control crds']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row rounded-bottom border-bottom border border-primary">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>विगत माह की अवशेष मात्रा (क्विंटल में) (1) :</b></label>
                                <?php echo $this->Form->control('lstMnthRstQuantity', ['label' => '', 'class' => 'form-control lstMnthRstQuantity numonly', 'placeholder' => '0.00']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>प्रतिवेदित माह हेतु आवंटित मात्रा (क्विंटल में) (2)
                                        :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('currAllocation', ['label' => '', 'class' => 'form-control currAllocation numonly', 'placeholder' => '0.00']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row rounded-bottom border-bottom border border-primary">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>उठाव किये गये मात्रा (क्विंटल में) (3) :</b></label>
                                <?php echo $this->Form->control('liftedAllocation', ['label' => '', 'class' => 'form-control liftedAllocation numonly', 'placeholder' => '0.00']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>उपलब्ध कुल मात्रा (क्विंटल में) (4 = 1+3)
                                        :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('totalAllocation', ['label' => '', 'class' => 'form-control totalPaid totalAllocation numonly', 'placeholder' => '0.00','readonly'=>'readonly']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row rounded-bottom border-bottom border border-primary">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>सुपात्र लाभुकों की संख्या (5) :</b></label>
                                <?php echo $this->Form->control('allocatedQuantity', ['label' => '', 'class' => 'form-control allocatedQuantity numonly', 'placeholder' => '0.00']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>लाभान्िवत लाभुकों की संख्या (6)
                                        :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('benefitedBeneficiary', ['label' => '', 'class' => 'form-control benefitedBeneficiary numonly', 'placeholder' => '0.00']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row rounded-bottom border-bottom border border-primary">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>वितरित मात्रा (क्विंटल में) (7) :</b></label>
                                <?php echo $this->Form->control('distributedQuantity', ['label' => '', 'class' => 'form-control numonly distributedQuantity', 'placeholder' => '0.00']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>अवशेष मात्रा (क्विंटल में) (8 = 4-7)
                                        :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('restQuantity', ['label' => '', 'class' => 'form-control totalSub restQuantity numonly', 'placeholder' => '0.00','readonly'=>'readonly']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec vip_boxes">
                            <div class="form-group">
                                <label for="form"><b>अलाभान्िवत लाभुक (9 = 5-6)
                                        :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('totalBenefitedBeneficiary', ['label' => '', 'class' => 'form-control totalSub9 totalBenefitedBeneficiary numonly', 'placeholder' => '0.00','readonly'=>'readonly']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vip_save" style="float: left; margin-right: 16px; margin-bottom: 15px; margin-left: 89%; margin-top: 20px;">
                        <button type="submit" class="btn btn-outline-info submitt" >Submit</button>
                    </div>
                </fieldset>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<script>
    jQuery(document).ready(function(){
        // 4 = 1+3
        $(".liftedAllocation, .lstMnthRstQuantity").blur(function(){
            var lstMnth_val = parseInt($(".lstMnthRstQuantity").val());
            var liftedAlloc_val = parseInt($(".liftedAllocation").val());
            var total_val = parseInt($(".totalAllocation").val());
            var totalPaid = lstMnth_val+liftedAlloc_val;
            if(!isNaN(totalPaid)){
                $(".totalPaid").val(totalPaid);
            }
            /*if(total_val){
                $('.topaysubtotal').val(total_val - totalPaid);
            }*/
        });

        // 8 = 4-7
        $(".distributedQuantity, .liftedAllocation, .lstMnthRstQuantity").blur(function(){
            var ttlAlloc_val = parseInt($(".totalAllocation").val());
            var distribtd_val = parseInt($(".distributedQuantity").val());
            var total_val = parseInt($(".totalAllocation").val());
            var totalSub = ttlAlloc_val-distribtd_val;
            if(!isNaN(totalSub)){
                $(".totalSub").val(totalSub);
            }
            /*if(total_val){
                $('.topaysubtotal').val(total_val - totalSub);
            }*/
        });

        //9 = 5-6
        // 8 = 4-7
        $(".benefitedBeneficiary,.allocatedQuantity").blur(function(){
            var ttlAlloc_val = parseInt($(".allocatedQuantity").val());
            var distribtd_val = parseInt($(".benefitedBeneficiary").val());
            var total_val = parseInt($(".totalBenefitedBeneficiary").val());
            var totalSub9 = ttlAlloc_val-distribtd_val;
            if(!isNaN(totalSub9)){
                $(".totalSub9").val(totalSub9);
            }
            /*if(total_val){
                $('.topaysubtotal').val(total_val - totalSub);
            }*/
        });

        // for empty submission validation
        var index = ['First','second','Third','Forth'];
        $(".submitt").click(function(){
            jQuery("span").remove();
            var a = 0;
            jQuery(".vip_boxes").each(function(){
                if(!jQuery(this).find("input").val()){
                    jQuery(this).append("<span>Please "+jQuery(this).find("input").attr('placeholder')+" "+index[a]+"</span>");
                    a++;
                }
            });
        });
    });
</script>
