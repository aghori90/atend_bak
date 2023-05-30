<?php
use Cake\Routing\Router;
echo $this->Html->css('monthpicker');
echo $this->Html->script('jquery');
echo $this->Html->script('monthpicker.min');
//echo $form_name; die;
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
                        <div class="col-md- col-lg-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Months :</b></label>
                                <div class="Month_pick">
                                    <?php echo $mnths[$month].' '.$year; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>District :</b></label>
                                <div class="Month_pick">
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
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <table class="table tab" rules="all" border="1">
                            <tr align="center">
                                <td rowspan="4" class="tabb">BLOCK</td>
                                <td rowspan="4">Item(वस्तु)</td>
                                <td colspan="6">डोर स्टेप डिलीवरी हेतु व्यय की गयी राशि की विवरणी</td>
                                <td rowspan="4">कुल व्यय(रुपये में)(3+6)</td>
                                <td rowspan="4" class="tabb">Edit</td>
                            </tr>
                            <tr align="center" class="tab">
                                <td colspan="3">विगत माह तक</td>
                                <td colspan="3">प्रतिवेदित माह तक</td>
                            </tr>
                            <tr align="center" class="tab">
                                <td>डी एस डी की गयी खाद्यान की मात्रा(किवंटल में)</td>
                                <td>भुगतेय राशि(रूपये में)</td>
                                <td>भुगतान की गयी राशि (रूपये में)</td>
                                <td>डी एस डी की गयी खाद्यान की मात्रा(किवंटल में)</td>
                                <td>भुगतेय राशि (रूपये में)</td>
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
                            <tr>
                                <td colspan="2" class="tabb">कुल</td>
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
                        <div style="float: left; margin-right: 16px; margin-bottom: 15px; margin-left: 89%;">
                            <button type="submit" class="btn btn-outline-info submitt" style="border-radius: 0 17px 0 0;">ADD</button>
                        </div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- NEW PAGE -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white"><?php echo $formNameHn; ?></div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <div class="container-fluid">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Block :</b></label>
                                    <?php  echo $this->Form->control('block',  ['label'=>'', 'class' => 'form-control', 'placeholder' => '']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Panchayat :</b></label>
                                    <div class="Month_pick">
                                        <?php echo $this->Form->control('month',  ['label'=>'','class' => 'form-control','placeholder'=>'']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>गठित कोष स्तर :</b></label>
                                    <div class="Month_pick">
                                        <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <?php echo $this->Form->end(); ?>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
<!--            <div class="card-header bg-primary text-white">प्रतिवेदित माह तक</div>-->
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>बैंक खाता संख्या :</b></label>
                                <?php  echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control', 'placeholder' => 'Enter Bank Account No.']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>खाता संचालक का नाम :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('month',  ['label'=>'','class' => 'form-control','placeholder'=>'Enter Account Holder Name']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>खाता संचालक का पदनाम :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'Enter Designation of Account Holder']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>खाता संचालक का मोबाइल नंबर :</b></label>
                                <?php echo $this->Form->control('',  [ 'label'=>'','class' => 'form-control', 'placeholder' => 'Enter Mobile No. of Account Holder']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>01.04.2020 को कोष में अवशेष राशि (in Rs) :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'Enter Balance Fund as on 01.04.2020']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>वर्तमान वित्तीय वर्ष में उपायुक्त द्वारा उपलब्ध कराई गयी राशि (in Rs) :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'Enter Current Financial Year Fund']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>कुल उपलब्ध की गयी राशि (in Rs) :</b></label>
                                <?php  echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control', 'placeholder' => 'Total Allocated Fund']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>विगत माह तक व्यय की गयी राशि(in Rs) :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('month',  ['label'=>'','class' => 'form-control','placeholder'=>'Previous Month Expenditure Amount']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>प्रतिवेदित माह में व्यय की गयी राशि (in Rs) :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'Current Month Expenditure Amount']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>विगत माह तक लाभान्वित व्यक्ति की संख्या (in Rs) :</b></label>
                                <?php echo $this->Form->control('',  [ 'label'=>'','class' => 'form-control', 'placeholder' => 'Last Month Beneficiary Count']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>प्रतिवेदित माह में लाभान्वित व्यक्ति की संख्या :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'Last Month Beneficiary Count']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अवशेष राशि :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'Remaining Amount']); ?>
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

