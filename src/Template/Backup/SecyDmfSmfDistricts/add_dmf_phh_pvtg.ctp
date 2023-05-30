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
    button {
        border: none;
        background: transparent;
        font-size: xx-large;
        /* color: red; */
    }
</style>

<?php
    if(!empty($data)){
        $rgi_dist                       = $data['districtName'];
        $rgi_block                      = $data['rgi_block_code'];
        $item                           = $data['item_id'];
        $totalAllo                      = $data['total_allocation'];
        $quantity1                      = $data['previous_month_lifting'];
        $forPay1                        = $data['previous_month_allocation'];
        $toPay1                         = $data['previous_month_distribution'];
        $quantity2                      = $data['current_month_lifting'];
        $forPay2                        = $data['current_month_allocation'];
        $toPay2                         = $data['current_month_distribution'];
        $total                          = $data['total_expense'];
        $balance                        = $data['balance'];
    }else{
        $rgi_dist                       = '';
        $rgi_block                      = '';
        $item                           = '';
        $totalAllo                      = '';
        $quantity1                      = '';
        $forPay1                        = '';
        $toPay1                         = '';
        $quantity2                      = '';
        $forPay2                        = '';
        $toPay2                         = '';
        $total                          = '';
        $balance                        = '';
    }
?>
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
                                        <td rowspan="4" class="tabb" style="padding-top: 15%;">DISTRICTS</td>
                                        <td rowspan="4" style="padding-top: 15%;">Item(वस्तु)</td>
                                        <td rowspan="3" style="padding-top: 10%;">वित्तीय वर्ष में कुल प्राप्त आवंटन (रुपये में )</td>
                                        <td colspan="6">खाद्यान्न के परिवहन हेतु व्यय की गई राशि</td>
                                        <td rowspan="3" style="padding-top: 15%;">कुल व्यय(रुपये में)(3+6)</td>
                                        <td rowspan="3" style="padding-top: 15%;">अवशेष आवंटन(रुपये में )</td>
                                        <td rowspan="4" class="tabb" style="padding-top: 15%;">Edit</td>
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
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                    </tr>
                                    <?php
                                        foreach($dmfSmfDistData as $dsKey => $dsval){
                                            //echo "<pre>"; print_r($dsval); "<pre>"; //die;
                                    ?>
                                      <tr>
                                          <td class="tabb"><?php echo $dsval['districtName'];?></td>
                                          <td><?php echo $items[$dsval['item_id']];?></td>
                                          <td><?php echo $dsval['total_allocation'];?></td>
                                          <td><?php echo $dsval['previous_month_lifting'];?></td>
                                          <td><?php echo $dsval['previous_month_allocation'];?></td>
                                          <td><?php echo $dsval['previous_month_distribution'];?></td>
                                          <td><?php echo $dsval['current_month_lifting'];?></td>
                                          <td><?php echo $dsval['current_month_allocation'];?></td>
                                          <td><?php echo $dsval['current_month_distribution'];?></td>
                                          <td><?php echo $dsval['previous_month_distribution'] + $dsval['current_month_distribution']; ?></td>
                                          <td><?php echo $dsval['balance'];?></td>
                                          <td class="tabb">
                                              <?php echo $this->Form->create('edit',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'addDmfPhhPvtg']]); ?>
                                              <?php echo $this->Form->hidden('montId',['value'=> $month]); ?>
                                              <?php echo $this->Form->hidden('yearId',['value'=> $year]); ?>
                                              <?php echo $this->Form->hidden('blkId',['value'=> $dsval['rgi_district_code']]); ?>
                                              <?php echo $this->Form->hidden('id',['value'=> $dsval['id']]); ?>
                                              <button type="submit" name="edit" value="aghori"><i class="fa fa-pencil"></i></button>
                                              <?php echo $this->Form->end(); ?>
                                          </td>
                                      </tr>
                                    <?php
                                        }
                                    ?>
                                    <tr>
                                        <td colspan="2" class="tabb">कुल</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="tabb"></td>
                                    </tr>

                                </table>
                                <?php if(empty($id)){ ?>
                                <div style="float: left; margin-right: 16px; margin-bottom: 15px; margin-left: 89%;">
                                    <span type="submit" class="btn btn-outline-info submitt" style="border-radius: 0 17px 0 0;">ADD</span>
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
<!-- SMF-06-PVTG -->

<?php
if(!empty($id)){
    $disp = "block";
    $action = 'updateSmfDmfDist';
}else{
    $disp = "none";
    $action = 'addDmfPhhPvtg';
}
?>
        <div class="boxHid" style="display: <?php echo $disp; ?>">
        <div class="mt-4" id="b-inner-sec">
            <div class="container">
                <div class="card">
                    <div class="card-header bg-primary text-white">विगत माह तक</div>
                    <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>$action]]); ?>
                    <?php echo $this->Flash->render(); ?>
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>Block :</b></label>
                                            <?php echo $this->Form->select('blocks', $blocks, ['label' => '', 'class' => 'form-control','value'=>$rgi_block]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>Items :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->select('items', $items, ['label' => '', 'class' => 'form-control','value'=>$item]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>कार्ड का प्रकार चुनें :</b></label>
                                            <div class="Month_pick">
                                                <?php
                                                echo $this->Form->select('card', $cards, ['label' => '', 'class' => 'form-control','value'=>$cards]);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>वित्तीय वर्ष में कुल प्राप्त आवंटन (रुपये में )(1) :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->control('lstYramt', ['label' => '', 'class' => 'form-control numonly topayFrom', 'placeholder' => '0.00','value'=>$totalAllo]); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>परिवहन की गई खाद्यान्न की मात्रा (क्विंटल में)(2) :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->control('quantity1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00','value'=>$quantity1]); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>भुगतेय राशि (रूपये में)(3) :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->control('forPay1', ['label' => '', 'class' => 'form-control numonly', 'placeholder' => '0.00','value'=>$forPay1]); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>भुगतान की गयी राशि (रूपये में)(4) :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->control('toPay1', ['label' => '', 'class' => 'form-control numonly topay1', 'placeholder' => '0.00','value'=>$toPay1]); ?>

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
                                            <label for="form"><b>परिवहन की गई खाद्यान्न की मात्रा (क्विंटल में)(5) :</b></label>
                                            <?php echo $this->Form->control('quantity2',  [ 'label'=>'','class' => 'form-control numonly', 'placeholder' => '0.00','value'=>$quantity2]); ?>
                                        </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>भुगतेय राशि (रूपये में)(6) :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->control('forPay2',  ['label'=>'', 'class' => 'form-control numonly','placeholder'=>'0.00','value'=>$forPay2]); ?>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>भुगतान की गयी राशि (रूपये में)(7) :</b></label>
                                            <div class="Month_pick">
                                                <?php echo $this->Form->control('toPay2',  ['label'=>'', 'class' => 'form-control numonly topay2','placeholder'=>'0.00','value'=>$toPay2]); ?>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row rounded-bottom border-bottom border border-primary" style="margin-bottom: 21px;">
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec">
                                    <div class="form-group">
                                        <label for="form"><b>कुल व्यय((8=4+7))(रुपये में) :</b></label>
                                        <div class="Month_pick">
                                            <?php echo $this->Form->control('totalPayable',  ['readonly'=>'readonly','label'=>'', 'class' => 'form-control numonly totalPaid','placeholder'=>'0.00','value'=>$total]); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 frmDec">
                                    <div class="form-group">
                                        <label for="form"><b>अवशेष आवंटन((1-8)) (रुपये में) :</b></label>
                                        <div class="Month_pick">
                                            <?php echo $this->Form->control('balAllocated',  ['readonly'=>'readonly','label'=>'', 'class' => 'form-control numonly topaysubtotal','placeholder'=>'0.00','value'=>$balance]); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                echo $this->Form->hidden('id',['value'=> $id]);
                                ?>
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
        // for claculation of 8th box
        $(".topay1").blur(function(){
            var topay1_val = parseInt($(".topay1").val());
            var topay2_val = parseInt($(".topay2").val());
            var topayFrom_val = parseInt($(".topayFrom").val());
            var totalPaid = topay1_val+topay2_val;
            if(!isNaN(totalPaid)){
                $(".totalPaid").val(totalPaid);
            }
            if(topayFrom_val){
                $('.topaysubtotal').val(topayFrom_val - totalPaid);
            }
        });
        $(".topay2").blur(function(){
            var topay1_val = parseInt($(".topay1").val());
            var topay2_val = parseInt($(".topay2").val());
            var topayFrom_val = parseInt($(".topayFrom").val());
            var totalPaid = topay1_val+topay2_val;
            if(!isNaN(totalPaid)) {
                $(".totalPaid").val(totalPaid);
            }
            if(topayFrom_val){
                $('.topaysubtotal').val(topayFrom_val - totalPaid);
            }
        });
        $(".topayFrom").blur(function(){
            var topay1_val = parseInt($(".topay1").val());
            var topay2_val = parseInt($(".topay2").val());
            var topayFrom_val = parseInt($(".topayFrom").val());
            var totalPaid = topay1_val+topay2_val;
            if(!isNaN(totalPaid)) {
                $(".totalPaid").val(totalPaid);
            }
            if(topayFrom_val){
                $('.topaysubtotal').val(topayFrom_val - totalPaid);
            }
        });
    });
</script>


