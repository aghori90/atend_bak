<?php
use Cake\Routing\Router;
echo $this->Html->css('monthpicker');
echo $this->Html->script('jquery');
echo $this->Html->script('monthpicker.min');
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
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">पात्र गृहस्थ योजनान्तर्गत जिला स्तरीय मासिक वित्तीय प्रतिवेदन</div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Form Name :</b></label>
                                <?php //echo $this->Form->select('secy_smp_dmp_id', $formType, ['id' => 'secy_smp_dmp_id', 'class' => 'form-control', 'empty' => '--Select Form--']); ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Months :</b></label>
                                <div class="Month_pick">
                                    <?php //echo $this->Form->control('month',  ['label'=>'','id' => 'demo-1', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>District :</b></label>
                                <div class="Month_pick">
                                    <?php //echo $this->Form->control('month',  ['label'=>'','id' => 'demo-1', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
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

<!--FORM WITH SINGLE INPUT-->

<?php
//use Cake\Routing\Router;
?>
<style type="text/css">
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
    input#uidseed {
        margin-top: -51px;
        margin-left: 190px;
    }
    .btnDeco {
        display: inline-block;
        float: right;
        margin-top: -5px;
        margin-right: 25px;
    }
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">UID SEEDING</div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Enter Rationcard No. :</b></label>
                                <?php echo $this->Form->control('uidSeed', ['label'=>'', 'class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="btnDeco">
                                <button type="button" class="btn btn-outline-success">Success</button>
                            </div>
                        </div>
                    </div>

                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<!--==========================================================-->


<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">पात्र गृहस्थ योजनान्तर्गत जिला स्तरीय मासिक वित्तीय प्रतिवेदन</div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <table class="table table-hover tab" rules="all" border="1">
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
                                <td colspan="2" class="tabb">Total</td>
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
                            <button type="submit" class="btn btn-outline-info submitt">ADD</button>
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
            <div class="card-header bg-primary text-white">विगत माह तक</div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <div class="container-fluid">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Block :</b></label>
                                    <?php  echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control', 'empty' => '--Select Form--']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Items :</b></label>
                                    <div class="Month_pick">
                                        <?php echo $this->Form->control('month',  ['label'=>'','class' => 'form-control','placeholder'=>'--Select Month--']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>कार्ड का प्रकार चुनें :</b></label>
                                    <div class="Month_pick">
                                        <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>डी एस डी की गयी खाद्यान की मात्रा(किवंटल में) :</b></label>
                                    <?php echo $this->Form->control('',  [ 'label'=>'','class' => 'form-control', 'empty' => '--Select Form--']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>भुगतेय राशि (रूपये में ) :</b></label>
                                    <div class="Month_pick">
                                        <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>भुगतान की गयी राशि (रूपये में ) :</b></label>
                                    <div class="Month_pick">
                                        <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
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
            <div class="card-header bg-primary text-white">प्रतिवेदित माह तक</div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecySmpDmps', 'action'=>'addDmfPhh']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Block :</b></label>
                                <?php  echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control', 'empty' => '--Select Form--']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Items :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('month',  ['label'=>'','class' => 'form-control','placeholder'=>'--Select Month--']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>कार्ड का प्रकार चुनें :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>डी एस डी की गयी खाद्यान की मात्रा(किवंटल में) :</b></label>
                                <?php echo $this->Form->control('',  [ 'label'=>'','class' => 'form-control', 'empty' => '--Select Form--']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>भुगतेय राशि (रूपये में ) :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>भुगतान की गयी राशि (रूपये में ) :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('',  ['label'=>'', 'class' => 'form-control','placeholder'=>'--Select Month--']); ?>
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

