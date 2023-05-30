<?php
//use Cake\Routing\Router;
echo $this->Html->css('jquery.multiselect');
echo $this->Html->script('jquery.multiselect');

echo $this->Html->script('injection.js');

//echo $sessionVacId; die;
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.6.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

    /*input#uidseed {*/
    /*    margin-top: -51px;*/
    /*    margin-left: 190px;*/
    /*}*/
    .btnDeco {
        display: inline-block;
        float: right;
        margin-top: -5px;
        margin-right: 25px;
        margin-bottom: 11px;
    }

    @media (min-width: 768px)
        .container, .container-md, .container-sm {
            max-width: 630px;
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .inpt {
            margin-top: -20px;
        }

        .zxcf {
            display: inline-block;
            float: right;
            margin-top: 20px;
        }

        div#captcha {
            margin-top: 24px;
        }

        .success {
            color: #38e210;
            font-weight: bold;
        }
        .error {
            color: #fe0909;
            font-weight: bold;
        }

        .valid {
            text-align: center;
            font-weight: 600;
            color: greenyellow;
        }

        /*for radio*/
        .form-group.radii {
            display: inline-block;
            margin-top: 36px;
            margin-left: 95px;
        }

        .form-group.radee {
            display: inline-block;
            /*margin-top: 36px;*/
            margin-left: 95px;
        }

        /*input#regno-2 {*/
        /*    display: inline-block;*/
        /*    margin-left: 36px;*/
        /*}*/
        .rad {
            display: inline-block;
            margin-left: 36px;
        }

        .form-group.mnth {
            display: inline-block;
            margin-top: -30px;
        }

        input#plce {
            display: inline-block;
        }

        input#date {
            display: inline-block;
        }

        .bxDco {
            display: inline-block;
        }
        .addBox {
            border: 1px solid black;
            margin: 10px 0 10px 0px;
        }
        /*.form-group.boxAddrss {*/
        /*    margin-top: 50px;*/
        /*}*/
    .ms-options > ul{
        list-style: none !important;
    }
    .frm_error{
        font-style: italic;
        color: #ff0000;
    }
    .inputErrBorder{
        border: 1px solid #ff0000 !important;
    }
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <?php
                if($sessionVacId == 1){ echo 'राज्य आयोग में अध्यक्ष पद पर नियुक्ति हेतु (विज्ञापन संख्या -01/2021 )'; }
                if($sessionVacId == 2){ echo 'राज्य आयोग में सदस्य  पद पर नियुक्ति हेतु (विज्ञापन संख्या -02/2021 ) '; }
                if($sessionVacId == 3){ echo 'जिला  में अध्यक्ष पद पर नियुक्ति हेतु (विज्ञापन संख्या -03/2021 )'; }
                if($sessionVacId == 4){ echo 'जिला  आयोग में सदस्य  पद पर नियुक्ति हेतु (विज्ञापन संख्या -04/2021 )'; }

                ?>
            </div>
            <!--            --><?php //echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerForms']]); ?>
            <div class="valid"><?php echo $this->Flash->render(); ?></div>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Registration No. :</b></label>
                                <?php echo $this->Form->control('regNo', ['label' => '', 'class' => 'form-control numonly inpt', 'disabled' => 'disabled', 'value' => $data['registration_no']]); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Post Applied For:</b></label>
                                <?php echo $this->Form->control('post', ['label' => '', 'class' => 'form-control inpt', 'value' => $data['vaccancy_id'], 'disabled' => 'disabled']); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Name :</b></label>
                                <?php echo $this->Form->control('name', ['label' => '', 'class' => 'form-control numonly inpt', 'disabled' => 'disabled', 'value' => $data['name']]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Date Of Birth :</b></label>
                                <?php echo $this->Form->control('dob', ['label' => '', 'class' => 'form-control inpt', 'disabled' => 'disabled', 'value' => $data['dob']]); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Email :</b></label>
                                <?php echo $this->Form->control('email', ['label' => '', 'class' => 'form-control numonly inpt', 'disabled' => 'disabled', 'value' => $data['email']]); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Gender :</b></label>
                                <?php echo $this->Form->control('gender', ['label' => '', 'class' => 'form-control inpt', 'disabled' => 'disabled', 'value' => $data['gender']]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Contact :</b></label>
                                <?php echo $this->Form->control('contact', ['label' => '', 'class' => 'form-control inpt mobile', 'disabled' => 'disabled', 'value' => $data['mobile']]); ?>
                            </div>
                        </div>
                    </div>
        <?php if ($sessionVacId == 1){ ?>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerForms']]); ?>
            <div class="valid">
                <?php echo $this->Flash->render(); ?>
            </div>
            <div class="container-fluid">
                <div class="card-header bg-primary text-white">निवेदक विवरण : </div>
                <div class="row">
<!--                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">-->
<!--                    <div class="form-group">-->
<!--                        <label for="form"><b>कार्य पृष्ठ भूमि :</b></label>-->
<!--                        <?php ////$wrkPlace = ['Judicial'=>'न्यायिक ', 'Non-Judicial'=>'गैर न्यायिक'] ?>
<!--                        --><?php //$wrkPlace = ['1' => 'न्यायिक ', '2' => 'गैर न्यायिक'] ?>
<!--                        --><?php //echo $this->Form->select('workPlc', $wrkPlace, ['label' => '', 'class' => 'form-control', 'empty' => '-- कार्य पृष्ठ भूमि --',]); ?>
<!--                    </div>-->
<!--                </div>-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>नाम (हिन्दी) :</b></label>
                        <?php echo $this->Form->control('namHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in Hindi ']); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>पिता का नाम (अंग्रेजी) :</b></label>
                        <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English']); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>पिता का नाम (हिन्दी) :</b></label>
                        <?php echo $this->Form->control('fatNamHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name In Hindi']); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>आयु (01 जुलाई 2021 को) :</b></label>
                        <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'value'=>$age,'readonly'=>'readonly']); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>श्रेणी :</b></label>
                    <?php $wrkPlace = ['1'=>'GEN', '2'=>'OBC', '3'=>'ST', '4'=>'SC'] ?>
                    <?php echo $this->Form->select('cate',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--श्रेणी चुने --',]); ?>
                </div>
                </div>
            </div>
                    <div class="card-header bg-primary text-white">Address</div>
            <div class="addBox">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>स्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt','id'=>'state_code', 'empty'=>'--Select Current State-- ','options'=>$state]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>अस्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control  inpt', 'id'=>'temp_state_code','empty'=>'--Select Current State ','options'=>$state]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी जिला :</b></label>
                            <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt',  'empty'=>'--Select Permanent District--','options'=>$cfDistricts]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी जिला :</b></label>
                            <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'-- Select Current District--','options'=>$cfDistricts]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                            <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Permanent Address ']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                            <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Current Address ']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी पिनकोड :</b></label>
                            <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode ','maxlength'=>'6' ,'minlength'=>'6']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी पिनकोड :</b></label>
                            <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode','maxlength'=>'6' ,'minlength'=>'6']); ?>
                        </div>
                    </div>

                </div>
            </div>
                </div>
                <!--Minimum Exprience-->
                <div class="card-header bg-primary text-white">अनुभव क्षेत्र :</div>
                <div class="row">
                    <!--7-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>उच्च न्यायालय के नयायधीश हो अथवा रहे हो ? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('highCrtJudge', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 hcrt" >
                            <div class="form-group">
                                <label for="form"><b>अनुभव कार्य  :</b></label>
                                <p>उच्च न्यायालय का नाम जहाँ न्यायधीश के रूप में हो अथवा कार्य कर चुके हैं</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group radee">
                                <?php echo $this->Form->control('courtNam', ['label' => '', 'class' => 'form-control txtOnly inpt','placeholder'=>'Name of the Court']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 hcrt" >
                            <div class="form-group">
                                <label for="form"><b>अनुभव अवधि :</b></label>
                                <p>उच्च न्यायालय में न्यायधीश के रूप में कार्य की गई अवधि (माह में )</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group radee">
                                <?php echo $this->Form->control('highCrtExp', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Exp In Months']); ?>
                            </div>
                            <span id="highCrtExpErrMsg" class="frm_error" style="display:none;"></span>
                        </div>
                </div>
                <!-- Educational Qualifications-->
                <div class="card-header bg-primary text-white">अन्य विशेष अनुभव :</div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अन्य विशेष अनुभव  :</b></label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('exp7', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group">
                            <label for="form"><b>अन्य विशेष अनुभव का विवरण दे  :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group ">
                            <?php echo $this->Form->control('othrExpDetails', ['label' => '', 'class' => 'form-control radee']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group">
                            <label for="form"><b>संबंधित कार्यालय का पता :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group ">
                            <?php echo $this->Form->control('knownAddress', ['label' => '', 'class' => 'form-control  radee']); ?>
                        </div>
                    </div>
                </div>
                <!--Self Declaration -->
                <div class="card-header bg-primary text-white">स्वा-घोषणा :</div>
                <div class="row">
                    <!--1-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या सभी शैक्षणिक योग्यताएँ किसी मान्यता प्राप्त संस्थान/विश्वविद्यालय से प्राप्त है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna1', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--2-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या किसी ऐसे अपराध जिसमें नैतिक अधमता सम्मिलित हो, के लिए अभियोजित किया गया है और कारावास की सजा प्राप्त है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna2', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--3-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या दिवालिया घोषित किया गया है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna3', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--4-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या किसी सक्षम न्यायालय द्वारा अस्वस्थ मस्तिष्क और सोच के घोषित किए गए हैं? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna4', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--5-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या राज्य सरकार अथवा केन्द्रीय सरकार अथवा ऐसी सरकार के स्वामित्वाधीन अथवा नियंत्रणाधीन किसी निगमित निकाय की सेवा से हटाया गया है अथवा निष्कासित किया गया है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna5', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--6-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या राज्य सरकार की राय में, ऐसे वित्तीय या अन्य हित रखता है, जिनसे अध्यक्ष के रूप में उनके कृत्यों के निर्वहन पर प्रतिकूल प्रभाव पड़ने की संभावना है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna6', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="btnDeco">
                        <button type="submit" class="btn btn-outline-success" id="btnSaveVacancyOne">Save & Next</button>
                    </div>
                </div>
            </div>
            <?php
            echo $this->Form->hidden('vacId', ['name' => 'vacancyId', 'value' => $sessionVacId]);
            echo $this->Form->end(); ?>
    </div>
</div>
            </div>
        </div>
        <?php } ?>
        <?php if ($sessionVacId == 2){ ?>
        <?php echo $this->Form->create('member2', ['url' => ['controller' => 'SecyDmfSmfDistricts', 'action' => 'consumerForms']]); ?>
        <!--        <div class="valid">--><?php //echo $this->Flash->render(); ?><!--</div>-->
        <div class="container-fluid">
            <div class="card-header bg-primary text-white">Details</div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>कार्य पृष्ठ भूमि :</b></label>
                                                <?php $wrkPlace = ['judicial'=>'न्यायिक ', 'non-judicial'=>'गैर न्यायिक'] ?>
<!--                        --><?php //$wrkPlace = ['1' => 'न्यायिक ', '2' => 'गैर न्यायिक'] ?>
                        <?php echo $this->Form->select('workPlc', $wrkPlace, ['label' => '', 'class' => 'form-control', 'empty' => '-- कार्य पृष्ठ भूमि --',]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>नाम (हिन्दी) :</b></label>
                        <?php echo $this->Form->control('namHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in Hindi ']); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>पिता का नाम (अंग्रेजी) :</b></label>
                        <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English']); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>पिता का नाम (हिन्दी) :</b></label>
                        <?php echo $this->Form->control('fatNamHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name In Hindi']); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>आयु (01 जुलाई 2021 को) :</b></label>
                        <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'value'=>$age, 'readonly'=>'readonly']); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>श्रेणी :</b></label>
                    <?php $wrkPlace = ['1'=>'GEN', '2'=>'OBC', '3'=>'ST', '4'=>'SC'] ?>
                    <?php echo $this->Form->select('cate',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--श्रेणी चुने --',]); ?>
                </div>
                </div>
            </div>
            <div class="card-header bg-primary text-white">Address</div>
            <div class="addBox">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>स्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt','id'=>'state_code', 'empty'=>'--Select Permanent State-- ','options'=>$state]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>अस्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control inpt','id'=>'temp_state_code', 'empty'=>'--Select Current State-- ','options'=>$state]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी जिला :</b></label>
                            <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Permanent District','options'=>$cfDistricts]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी जिला :</b></label>
                            <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'--Select Current District--','options'=>$cfDistricts]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                            <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Permanent Address ']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                            <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Current Address ']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी पिनकोड :</b></label>
                            <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode ','maxlength'=>'6' ,'minlength'=>'6']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी पिनकोड :</b></label>
                            <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode','maxlength'=>'6' ,'minlength'=>'6']); ?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Experience Field -->
            <div class="card-header bg-primary text-white">अनुभव क्षेत्र :</div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>अनुभव क्षेत्र (न्यायिक पृष्ठ भूमि के आवेदकों क लिए) :</b></label>
                        <p>क्या जिला अस्तर क न्यायालय या समतुल्य अस्तर के किसी अधिकरण में पीठासीन पदाधिकारी / जिला सत्र
                            न्यायधीश के रूप में कम से कम 10 वर्सो की अवधि का ज्ञान और अनुभव प्राप्त है|</p>
                        <!--                        --><?php //echo $this->Form->control('regNo', ['label' => '', 'class' => 'form-control numonly inpt']); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group radii">
                        <?php $apprve = ['1' => 'हाँ ', '2' => 'नहीं '] ?>
                        <?php echo $this->Form->radio('exp1', $apprve, ['label' => '', 'class' => 'rad']); ?>
                    </div>
                </div>
            </div>
            <div class="row exp1_1">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>अनुभव अवधि (न्यायिक पृष्ठ भूमि के आवेदकों क लिए) :</b></label>
                        <p>पीठासीन पदाधिकारी / जिला सत्र न्यायधीश / प्रधान जिला सत्र न्यायधीश क रूप में कार्य की गईं
                            अवधि (माह में)</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group mnt">
                        <?php echo $this->Form->control('exp1_1', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'In Months']); ?>
                    </div>
                </div>
            </div>
            <!-- Educational Qualifications-->
            <div class="card-header bg-primary text-white">शैक्षणिक योग्यता :</div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <table class="table table-bordered" border="1">
                            <thead align="center">
                            <tr>
                                <th colspan="2">शैक्षणिक विवरण</th>
                                <th>पूर्णांक</th>
                                <th>प्राप्तांक</th>
                                <th>प्रतिशत</th>
                            </tr>
                            <tr>
                                <td><b>स्नातक</b></td>
                                <td><b>अनिवार्य</b></td>
                                <td><?php echo $this->Form->control('graduTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks']); ?></td>
                                <td><?php echo $this->Form->control('graduObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco','placeholder'=>'Enter Obtain Marks']); ?></td>
                                <td><?php echo $this->Form->control('graduPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco','placeholder'=>'Enter Percentage']); ?></td>
                            </tr>
                            <tr>
                                <td><b>स्नातोकोत्तर</b></td>
                                <td>
                                    <?php $app = ['1' => 'हाँ', '2' => 'नहीं'] ?>
                                    <?php echo $this->Form->radio('master', $app, ['label' => '', 'class' => 'rad']); ?>
                                </td>
                                <td><?php echo $this->Form->control('masterTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks']); ?></td>
                                <td><?php echo $this->Form->control('masterObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Obtain Marks']); ?></td>
                                <td><?php echo $this->Form->control('masterPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Percentage']); ?></td>
                            </tr>
                            <tr>
                                <td><b>Ph.D.</b></td>
                                <td>
                                    <?php $appr = ['1' => 'हाँ', '2' => 'नहीं'] ?>
                                    <?php echo $this->Form->radio('phd', $appr, ['label' => '', 'class' => 'rad']); ?>
                                </td>
                                <td><?php echo $this->Form->control('phdTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks']); ?></td>
                                <td><?php echo $this->Form->control('phdObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Obtain Marks']); ?></td>
                                <td><?php echo $this->Form->control('phdPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Percentage']); ?></td>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
            <!-- Experince Fields-->
            <div class="card-header bg-primary text-white">अनुभव क्षेत्र :</div>
            <div class="row">
                <!--1-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>केंद्र सरकार क राजपत्रित पदाधिकारी के रूप में :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group radee">
                        <?php $apprve = ['1' => 'हाँ ', '2' => 'नहीं '] ?>
                        <?php echo $this->Form->radio('exp2', $apprve, ['label' => '', 'class' => 'rad']); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp2Month', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'In Months']); ?>
                    </div>
                    <span id="exp2monthErrMsg" class="frm_error" style="display:none;"></span>
                </div>
                <!--2-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>राज्य सरकार क राजपत्रित पदाधिकारी के रूप में :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group radee">
                        <?php $apprve = ['1' => 'हाँ ', '2' => 'नहीं '] ?>
                        <?php echo $this->Form->radio('exp3', $apprve, ['label' => '', 'class' => 'rad']); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp3Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'In Months']); ?>
                    </div>
                </div>
                <!--3-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>केंद्र सरकार के सार्वजनिक क्षेत्र इकाई के कर्मी रूप में :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group radee">
                        <?php $apprve = ['1' => 'हाँ ', '2' => 'नहीं '] ?>
                        <?php echo $this->Form->radio('exp4', $apprve, ['label' => '', 'class' => 'rad']); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnt">
                        <?php echo $this->Form->control('exp4Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'Exp In Months']); ?>
                    </div>
                </div>
                <!--4-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>राज्य सरकार के सार्वजनिक क्षेत्र इकाई के कर्मी या झारखण्ड उपभोक्ता निवारण
                                आयोग / जिला उपभोक्ता विवाद निवारण फोरम में अध्यक्ष / सदस्य के रूप में :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group radee">
                        <?php $apprve = ['1' => 'हाँ ', '2' => 'नहीं '] ?>
                        <?php echo $this->Form->radio('exp5', $apprve, ['label' => '', 'class' => 'rad']); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp5Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'Exp In Months']); ?>
                    </div>
                </div>
                <!--5-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>अन्य क्षेत्र:</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group radee">
                        <?php $apprve = ['1' => 'हाँ ', '2' => 'नहीं '] ?>
                        <?php echo $this->Form->radio('exp6', $apprve, ['label' => '', 'class' => 'rad']); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp6Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'Exp In Months']); ?>
                    </div>
                </div>
                <!--6-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>क्या खाद्य सार्वजनिक वितरण एवं उपभोक्ता मामले विभाग, झारखण्ड अथवा झारखण्ड
                                उपभाक्ता विवाद निवारण आयोग अथवा झारखण्ड के जिला उपभाक्ता विवाद निवारण फोरम में (राज्य
                                आयोग / जिला फोरम के सम्बन्ध में अध्यक्ष / सदस्य से अलग) किसी पद पर भी कार्य किया है?
                                :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group radee">
                        <?php $apprve = ['1' => 'हाँ ', '2' => 'नहीं '] ?>
                        <?php echo $this->Form->radio('exp7', $apprve, ['label' => '', 'class' => 'rad']); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp7Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'Exp In Months']); ?>
                    </div>
                </div>
                <!--knownAddress-->
                <!--                <div class="kwnAdd">-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                    <div class="form-group">
                        <label for="form"><b>संबंधित कार्यालय का पता :</b></label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                    <div class="form-group ">
                        <?php echo $this->Form->control('knownAddress', ['label' => '', 'class' => 'form-control radee txtOnly','placeholder'=>'Enter Worked Office Address']); ?>
                    </div>
                </div>
                <!--                </div>-->
            </div>
            <!--Minimum Exprience-->
            <div class="card-header bg-primary text-white">अनुभव अवधि :</div>
            <div class="row">
                <!--7-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>क्या न्यूनतम 20 वर्षों कार्यानुभव है? :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group radee">
                        <?php $apprve = ['1' => 'हाँ ', '2' => 'नहीं '] ?>
                        <?php echo $this->Form->radio('minExp20', $apprve, ['label' => '', 'class' => 'rad']); ?>
                    </div>
                </div>
            </div>

        </div>

        <!--Submit-->
        <div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="btnDeco">
                    <button type="submit" class="btn btn-outline-success" id="btnSaveVacancyTwo">Save & Next</button>
                </div>
            </div>
        </div>
        <?php
        echo $this->Form->hidden('vacId', ['name' => 'vacancyId', 'value' => $sessionVacId]);
        echo $this->Form->end(); ?>
    </div>
<!--</div>-->
<?php } ?>
        <?php if ($sessionVacId == 3) { ?>
        <!--    <div class="card-header bg-primary text-white">Form III</div>-->
            <div class="container-fluid">
                <div class="row">
                                <?php echo $this->Form->create('vaccThree',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerForms']]); ?>
                    <div class="valid">
                        <?php echo $this->Flash->render(); ?>
                    </div>
                    <div class="container-fluid">
                        <div class="card-header bg-primary text-white">निवेदक विवरण : </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>पद का नाम  :</b></label>
                                    <?php $wrkPlace = ['1'=>'अध्यक्ष', '2'=>'जिला आयोग'] ?>
                                    <?php echo $this->Form->select('post',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--पद चुने --',]); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>आवेदक का नाम (हिन्दी) :</b></label>
                                    <?php echo $this->Form->control('namHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Applicant Name']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>पिता का नाम (अंग्रेजी) :</b></label>
                                    <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>पिता का नाम (हिन्दी) :</b></label>
                                    <?php echo $this->Form->control('fatNamHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name In Hindi']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>आयु (01 जुलाई 2021 को) :</b></label>
                                    <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'value'=>$age, 'readonly'=>'readonly']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>श्रेणी :</b></label>
                                    <?php $wrkPlace = ['1'=>'GEN', '2'=>'OBC', '3'=>'ST', '4'=>'SC'] ?>
                                    <?php echo $this->Form->select('cate',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--श्रेणी चुने --',]); ?>
                                </div>
                            </div>
                        </div>
                            <div class="card-header bg-primary text-white">पत्राचार :</div>
                            <div class="addBox">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group boxAddrss">
                                            <label for="form"><b>स्थायी राज्य :</b></label>
                                            <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt','id'=>'state_code', 'empty'=>'--Select Current State-- ','options'=>$state]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group boxAddrss">
                                            <label for="form"><b>अस्थायी राज्य :</b></label>
                                            <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control  inpt', 'id'=>'temp_state_code','empty'=>'--Select Current State ','options'=>$state]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>स्थायी जिला :</b></label>
                                            <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Permanent District','options'=>$cfDistricts]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>अस्थायी जिला :</b></label>
                                            <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'--Select Current District--','options'=>$cfDistricts]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                                            <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Permanent Address ']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                                            <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Current Address ']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>स्थायी पिनकोड :</b></label>
                                            <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode ','maxlength'=>'6' ,'minlength'=>'6']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="form"><b>अस्थायी पिनकोड :</b></label>
                                            <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode','maxlength'=>'6' ,'minlength'=>'6']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                        </div>-->
                        <!-- Experience Field -->
                        <!--Minimum Exprience-->
                        <div class="card-header bg-primary text-white">अनुभव क्षेत्र :</div>
                        <div class="row">
                            <!--7-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>क्या जिला न्यायधीश है , या रह चुके है या होने के लिए अर्हित है ? :</b></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group radee">
                                    <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                                    <?php echo $this->Form->radio('expp', $apprve, ['label' => '', 'class' => 'rad']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-header bg-primary text-white">अनुभव अवधि :</div>
                        <div class="row">
                            <!--7-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>प्रधान जिला सत्र  न्यायधीश /जिला सत्र न्यायधीश /पीठासीन अधिकारी  के रूप में कार्य  की गयी अवधि  (माह में ) :</b></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group radee">
                                    <?php echo $this->Form->control('expInMnth', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Exp In Months']); ?>
                                </div>
                                <span id="expinmonthErrMsg" class="frm_error" style="display:none;"></span>
                            </div>
                        </div>
                        <!--Self Declaration -->
                        <div class="card-header bg-primary text-white">स्वा-घोषणा :</div>
                        <div class="row">
                            <!--1-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>क्या सभी शैक्षणिक योग्यताएँ किसी मान्यता प्राप्त संस्थान/विश्वविद्यालय से प्राप्त है? :</b></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group radee">
                                    <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                                    <?php echo $this->Form->radio('ghosna1', $apprve, ['label' => '', 'class' => 'rad']); ?>
                                </div>
                            </div>
                            <!--2-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>क्या किसी ऐसे अपराध जिसमें नैतिक अधमता सम्मिलित हो, के लिए अभियोजित किया गया है और कारावास की सजा प्राप्त है? :</b></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group radee">
                                    <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                                    <?php echo $this->Form->radio('ghosna2', $apprve, ['label' => '', 'class' => 'rad']); ?>
                                </div>
                            </div>
                            <!--3-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>क्या दिवालिया घोषित किया गया है? :</b></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group radee">
                                    <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                                    <?php echo $this->Form->radio('ghosna3', $apprve, ['label' => '', 'class' => 'rad']); ?>
                                </div>
                            </div>
                            <!--4-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>क्या किसी सक्षम न्यायालय द्वारा अस्वस्थ मस्तिष्क और सोच के घोषित किए गए हैं? :</b></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group radee">
                                    <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                                    <?php echo $this->Form->radio('ghosna4', $apprve, ['label' => '', 'class' => 'rad']); ?>
                                </div>
                            </div>
                            <!--5-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>क्या राज्य सरकार अथवा केन्द्रीय सरकार अथवा ऐसी सरकार के स्वामित्वाधीन अथवा नियंत्रणाधीन किसी निगमित निकाय की सेवा से हटाया गया है अथवा निष्कासित किया गया है? :</b></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group radee">
                                    <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                                    <?php echo $this->Form->radio('ghosna5', $apprve, ['label' => '', 'class' => 'rad']); ?>
                                </div>
                            </div>
                            <!--6-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>क्या राज्य सरकार की राय में, ऐसे वित्तीय या अन्य हित रखता है, जिनसे अध्यक्ष के रूप में उनके कृत्यों के निर्वहन पर प्रतिकूल प्रभाव पड़ने की संभावना है? :</b></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group radee">
                                    <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                                    <?php echo $this->Form->radio('ghosna6', $apprve, ['label' => '', 'class' => 'rad']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Submit-->
                    <div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="btnDeco">
                                <button type="submit" class="btn btn-outline-success" id="btnSaveVacancyThree">Save & Next</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->hidden('vacId', ['name' => 'vacancyId', 'value' => $sessionVacId]);
                    echo $this->Form->end(); ?>
<!--                </div>    </div>-->
                </div>
            </div>
            </div>
        <?php } ?>
        <?php if ($sessionVacId == 4) { ?>
<!--    <div class="card-header bg-primary text-white">Form IV</div>-->
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->Form->create('member2', ['url' => ['controller' => 'SecyDmfSmfDistricts', 'action' => 'consumerForms']]); ?>
            <div class="valid">
                <?php echo $this->Flash->render(); ?>
            </div>
            <div class="container-fluid">
                <div class="card-header bg-primary text-white">निवेदक विवरण : </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पद का नाम  :</b></label>
                            <?php $wrkPlace = ['1'=>'सदस्य', '2'=>'जिला आयोग'] ?>
                            <?php echo $this->Form->select('post',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--पद चुने --',]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पद के विरुद्ध में जिला की प्राथमिकता  :</b></label>
                            <?php //$wrkPlace = ['1'=>'सदस्य', '2'=>'जिला आयोग'] ?>
                            <?php echo $this->Form->select('multiiDist',$districts, ['label' => '','id'=>'multiDist', 'class' => 'form-control','multiple'=>'multiple']); ?>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>नाम (हिन्दी) :</b></label>
                            <?php echo $this->Form->control('namHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in Hindi ']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पिता का नाम (अंग्रेजी) :</b></label>
                            <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पिता का नाम (हिन्दी) :</b></label>
                            <?php echo $this->Form->control('fatNamHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name In Hindi']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>आयु (01 जुलाई 2021 को) :</b></label>
                            <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'value'=>$age, 'readonly'=>'readonly']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>श्रेणी :</b></label>
                            <?php $category = ['1'=>'GEN', '2'=>'OBC', '3'=>'ST', '4'=>'SC'] ?>
                            <?php echo $this->Form->select('cat',$category, ['label' => '', 'class' => 'form-control','empty' => '--श्रेणी चुने --',]); ?>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-primary text-white">पत्राचार :</div>
                <div class="addBox">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group boxAddrss">
                                <label for="form"><b>स्थायी राज्य :</b></label>
                                <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt','id'=>'state_code', 'empty'=>'--Select Permanent State-- ','options'=>$state]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group boxAddrss">
                                <label for="form"><b>अस्थायी राज्य :</b></label>
                                <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control  inpt', 'id'=>'temp_state_code', 'empty'=>'--Select Current State-- ','options'=>$state]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी जिला :</b></label>
                                <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Permanent District','options'=>$cfDistricts]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी जिला :</b></label>
                                <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'--Select Current District--','options'=>$cfDistricts]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Permanent Address ']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Current Address ']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी पिनकोड :</b></label>
                                <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode ','maxlength'=>'6' ,'minlength'=>'6']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी पिनकोड :</b></label>
                                <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode','maxlength'=>'6' ,'minlength'=>'6']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Experience Field -->
                <!--Minimum Exprience-->
                <div class="card-header bg-primary text-white">अनुभव अवधि :</div>
                <div class="row">
                    <!--7-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या न्यूनतम 15 वर्षों कार्यानुभव है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('minExp15', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                </div>
                <!-- Educational Qualifications-->
                <div class="card-header bg-primary text-white">योग्यता :</div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <table class="table table-bordered" border="1">
                                <thead align="center">
                                <tr>
                                    <th colspan="2">शैक्षणिक विवरण</th>
                                    <th>पूर्णांक</th>
                                    <th>प्राप्तांक</th>
                                    <th>प्रतिशत</th>
                                </tr>
                                <tr>
                                    <td><b>स्नातक</b></td>
                                    <td><b>अनिवार्य</b></td>
                                    <td><?php echo $this->Form->control('graduTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks','maxlength'=>'3' ,'minlength'=>'2']); ?></td>
                                    <td><?php echo $this->Form->control('graduObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco','placeholder'=>'Enter Obtain Marks','maxlength'=>'3' ,'minlength'=>'2']); ?></td>
                                    <td><?php echo $this->Form->control('graduPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco','placeholder'=>'Enter Percentage','maxlength'=>'3' ,'minlength'=>'2']); ?></td>
                                </tr>
                                <tr>
                                    <td><b>स्नातोकोत्तर</b></td>
                                    <td>
                                        <?php $app = ['1' => 'हाँ', '2' => 'नहीं'] ?>
                                        <?php echo $this->Form->radio('master', $app, ['label' => '', 'class' => 'rad']); ?>
                                    </td>
                                    <td><?php echo $this->Form->control('masterTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks','maxlength'=>'3' ,'minlength'=>'2']); ?></td>
                                    <td><?php echo $this->Form->control('masterObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Obtain Marks','maxlength'=>'3' ,'minlength'=>'2']); ?></td>
                                    <td><?php echo $this->Form->control('masterPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Percentage','maxlength'=>'3' ,'minlength'=>'2']); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ph.D.</b></td>
                                    <td>
                                        <?php $appr = ['1' => 'हाँ', '2' => 'नहीं'] ?>
                                        <?php echo $this->Form->radio('phd', $appr, ['label' => '', 'class' => 'rad']); ?>
                                    </td>
                                    <td><?php echo $this->Form->control('phdTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks','maxlength'=>'3' ,'minlength'=>'2']); ?></td>
                                    <td><?php echo $this->Form->control('phdObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Obtain Marks','maxlength'=>'3' ,'minlength'=>'2']); ?></td>
                                    <td><?php echo $this->Form->control('phdPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Percentage','maxlength'=>'3' ,'minlength'=>'2']); ?></td>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- Experince Fields-->
                <div class="card-header bg-primary text-white">अनुभव क्षेत्र :</div>
                <div class="row">
                    <!--1-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>केंद्र सरकार क राजपत्रित पदाधिकारी के रूप में :</b></label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('exp2', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12 mnthExp">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp2Month', ['label' => '', 'class' => 'form-control   numonly expMnt', 'placeholder'=>'Exp In Months','maxlength'=>'3' ,'minlength'=>'2']); ?>
                        </div>
                    </div>
                    <!--2-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>राज्य सरकार क राजपत्रित पदाधिकारी के रूप में :</b></label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('exp3', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12 mnthExp">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp3Mnth', ['label' => '', 'class' => 'form-control  numonly expMnt', 'placeholder'=>'Exp In Months','maxlength'=>'3' ,'minlength'=>'2']); ?>
                        </div>
                    </div>
                    <!--3-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>केंद्र सरकार के सार्वजनिक क्षेत्र इकाई के कर्मी रूप में  :</b></label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('exp4', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnt">
                            <?php echo $this->Form->control('exp4Mnth', ['label' => '', 'class' => 'form-control numonly expMnt', 'placeholder'=>'Exp In Months','maxlength'=>'3' ,'minlength'=>'2']); ?>
                        </div>
                    </div>
                    <!--4-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>राज्य सरकार के सार्वजनिक क्षेत्र इकाई के कर्मी या झारखण्ड उपभोक्ता निवारण आयोग / जिला उपभोक्ता विवाद निवारण फोरम में अध्यक्ष / सदस्य के रूप में :</b></label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('exp5', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp5Mnth', ['label' => '', 'class' => 'form-control numonly expMnt', 'placeholder'=>'Exp In Months','maxlength'=>'3' ,'minlength'=>'2']); ?>
                        </div>
                    </div>
                    <!--5-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अन्य क्षेत्र:</b></label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('exp6', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp6Mnth', ['label' => '', 'class' => 'form-control numonly expMnt', 'placeholder'=>'Exp In Months','maxlength'=>'3' ,'minlength'=>'2']); ?>
                        </div>
                    </div>
                    <!--6-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या खाद्य सार्वजनिक वितरण एवं उपभोक्ता मामले विभाग, झारखण्ड अथवा झारखण्ड उपभाक्ता विवाद निवारण आयोग अथवा झारखण्ड के जिला उपभाक्ता विवाद निवारण फोरम में (राज्य आयोग / जिला फोरम के सम्बन्ध में अध्यक्ष / सदस्य से अलग) किसी पद पर भी कार्य किया है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('exp7', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp7Mnth', ['label' => '', 'class' => 'form-control numonly expMnt', 'placeholder'=>'Exp In Months','maxlength'=>'3' ,'minlength'=>'2']); ?>
                        </div>
                    </div>
                    <!--knownAddress-->
                    <!--                <div class="kwnAdd">-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group">
                            <label for="form"><b>संबंधित कार्यालय का पता :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group ">
                            <?php echo $this->Form->control('knownAddress', ['label' => '', 'class' => 'form-control radee', 'placeholder'=>'Enter Office Address']); ?>
                        </div>
                    </div>
                    <!--                </div>-->
                </div>
                <!--Self Declaration -->
                <div class="card-header bg-primary text-white">स्वा-घोषणा :</div>
                <div class="row">
                    <!--1-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या सभी शैक्षणिक योग्यताएँ किसी मान्यता प्राप्त संस्थान/विश्वविद्यालय से प्राप्त है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna1', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--2-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या किसी ऐसे अपराध जिसमें नैतिक अधमता सम्मिलित हो, के लिए अभियोजित किया गया है और कारावास की सजा प्राप्त है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna2', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--3-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या दिवालिया घोषित किया गया है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna3', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--4-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या किसी सक्षम न्यायालय द्वारा अस्वस्थ मस्तिष्क और सोच के घोषित किए गए हैं? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna4', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--5-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या राज्य सरकार अथवा केन्द्रीय सरकार अथवा ऐसी सरकार के स्वामित्वाधीन अथवा नियंत्रणाधीन किसी निगमित निकाय की सेवा से हटाया गया है अथवा निष्कासित किया गया है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna5', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                    <!--6-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>क्या राज्य सरकार की राय में, ऐसे वित्तीय या अन्य हित रखता है, जिनसे अध्यक्ष के रूप में उनके कृत्यों के निर्वहन पर प्रतिकूल प्रभाव पड़ने की संभावना है? :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php $apprve = ['1'=>'हाँ ', '2'=>'नहीं '] ?>
                            <?php echo $this->Form->radio('ghosna6', $apprve, ['label' => '', 'class' => 'rad']); ?>
                        </div>
                    </div>
                </div>

            </div>
            <!--Submit-->
            <div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="btnDeco">
                        <button type="submit" class="btn btn-outline-success" id="btnSaveVacancyFour">Save & Next</button>
                    </div>
                </div>
            </div>
            <?php
            echo $this->Form->hidden('vacId', ['name' => 'vacancyId', 'value' => $sessionVacId]);
            echo $this->Form->end(); ?>

<!--        </div>    -->
        </div>
        </div>
    </div>
<?php } ?>
<!--</div>-->
</div>
<script type="text/javascript">
    // for date
    $(function () {
        var disabledTool = new Date();
        disabledTool.setDate(disabledTool.getDate());
        disabledTool.setHours(0, 0, 0, 0);

        var startDate = "<?php echo date('Y', strtotime('-30 year'));?>";
        var endDate = "<?php echo date('Y', strtotime('-0 year'));?>";
        var year_range = startDate + ':' + endDate;

        $('#date').datepicker({
            inline: true,
            language: "es",
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true,
            maxDate: new Date(),
            yearRange: year_range,
            dateFormat: "yy-mm-dd",
            // defaultDate: "-720m",
            beforeShowDay: function (date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });
    });

    $(document).ready(function () {
        var vacancy_id = "<?php echo $sessionVacId;?>";//highCrtExp
        // validation for vacancy id 1
        if(vacancy_id == 1){
            $('#highcrtexp').blur(function(){
                //var highcrtexp = $('#highcrtexp').val();
                var highcrtexp = $(this).val();
                if(highcrtexp < 180){
                    $('#highCrtExpErrMsg').show();
                    $('#highcrtexp').addClass('inputErrBorder');
                    $('#highCrtExpErrMsg').html('Minimum 15 yrs experience required in months !.');
                    $('#highcrtexp').attr('placeholder', 'Minimum 15 yrs experience required in months !.');
                    $('#btnSaveVacancyOne').attr('disabled', true);
                }else{
                    $('#highcrtexp').removeClass('inputErrBorder');
                    $('#highCrtExpErrMsg').html('');
                    $('#btnSaveVacancyOne').attr('disabled', false);
                }
            });
        }
        if(vacancy_id == 3){
            $("input[name=ghosna1]").click(function(){
                var expinmnth = $('#expinmnth').val();
                if(expinmnth < 180){
                    $('#expinmonthErrMsg').show();
                    $('#expinmnth').addClass('inputErrBorder');
                    $('#expinmonthErrMsg').html('Minimum 15 yrs experience required in months !.');
                    $('#expinmnth').attr('placeholder', 'Required Field !.');
                    $('#btnSaveVacancyThree').attr('disabled', true);
                }else{
                    $('#expinmnth').removeClass('inputErrBorder');
                    $('#expinmonthErrMsg').html('');
                    $('#btnSaveVacancyThree').attr('disabled', false);
                }
            });
            $('#expinmnth').blur(function(){
                var expinmnth = $('#expinmnth').val();
                if(expinmnth < 180){
                    $('#expinmonthErrMsg').show();
                    $('#expinmnth').addClass('inputErrBorder');
                    $('#expinmonthErrMsg').html('Minimum 15 yrs experience required in months !.');
                    $('#expinmnth').attr('placeholder', 'Required Field !.');
                    $('#btnSaveVacancyThree').attr('disabled', true);
                }else{
                    $('#expinmnth').removeClass('inputErrBorder');
                    $('#expinmonthErrMsg').html('');
                    $('#btnSaveVacancyThree').attr('disabled', false);
                }
            });

        }

        setTimeout(function () {
            $("#success").hide('blind', {}, 500)
        }, 300);

        // multi select
        $('#multiDist').removeClass('jqmsLoaded');
        $('#multiDist').multiselect({
            // columns: 2,
            placeholder: '--Select Districts--'
        });
        // experience
        $('.exp1_1').hide();
        $('.kwnAdd').hide();
        $('#exp2month').hide();
        $('#exp3mnth').hide();
        $('#exp4mnth').hide();
        $('#exp5mnth').hide();
        $('#exp6mnth').hide();
        $('#exp7mnth').hide();
        $('#mastertotmrk').hide();
        $('#masterobtmrk').hide();
        $('#masterprecntmrk').hide();
        $('#phdtotmrk').hide();
        $('#phdobtmrk').hide();
        $('#phdprecntmrk').hide();
        $('#courtnam').hide();
        $('#highcrtexp').hide();
        $('.hcrt').hide();
        // $('.sav').hide();

        var expMinLength = 2;
        var expMaxLength = 3;
        //exp1_1
        // $("input[name=exp1]").click(function(){
        $("#exp1-1").click(function () {
            if ($(this).is(":Checked")) {
                $('.exp1_1').show();
                $("input[name=exp1_1]").prop('required', true);
                $("input[id=gradutotmrk]").click(function(){ //alert("sfdsf");return false;
                    if($("input[name=exp1_1]").val() == ''){
                        $("input[name=exp1_1]").addClass('inputErrBorder');
                        $("input[name=exp1_1]").attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
                $("input[name=exp1_1]").blur(function(){
                    if($(this).val() > 0){
                        $("input[name=exp1_1]").removeClass('inputErrBorder');
                        $('#exp1monthErrMsg').html('');
                        $('#btnSaveVacancyTwo').attr('disabled', false);
                        $('#btnSaveVacancyFour').attr('disabled', false);
                    }else{
                        $("input[name=exp1_1]").addClass('inputErrBorder');
                        $("input[name=exp1_1]").attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
            }
        });
        $("#exp1-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp1_1]").prop('required', false);
                $('.exp1_1').hide();
                $('#btnSaveVacancyTwo').attr('disabled', false);
                $('#btnSaveVacancyFour').attr('disabled', false);
            }
        });

        // exp2month
        $("#exp2-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp2month').show();
                $("input[name=exp2]").prop('required', true);
                $("input[name=exp3]").click(function(){
                    if($('#exp2month').val() == ''){
                        $('#exp2month').addClass('inputErrBorder');
                        $('#exp2month').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
                $('#exp2month').blur(function(){
                    if($(this).val() > 0){
                        $('#exp2month').removeClass('inputErrBorder');
                        $('#exp2monthErrMsg').html('');
                        $('#btnSaveVacancyTwo').attr('disabled', false);
                        $('#btnSaveVacancyFour').attr('disabled', false);
                    }else{
                        $('#exp2month').addClass('inputErrBorder');
                        $('#exp2month').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
            }
        });
        $("#exp2-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp2]").prop('required', false);
                $('#exp2month').hide();
                $('#exp2month').removeClass('inputErrBorder');
                $('#exp2monthErrMsg').html('');
                $('#btnSaveVacancyTwo').attr('disabled', false);
                $('#btnSaveVacancyFour').attr('disabled', false);
            }
        });

        // exp3mnth
        $("#exp3-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp3mnth').show();
                $("input[name=exp3]").prop('required', true);
                $("input[name=exp4]").click(function(){
                    if($('#exp3mnth').val() == ''){
                        $('#exp3mnth').addClass('inputErrBorder');
                        $('#exp3mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
                $('#exp3mnth').blur(function(){
                    if($(this).val() > 0){
                        $('#exp3mnth').removeClass('inputErrBorder');
                        $('#exp3monthErrMsg').html('');
                        $('#btnSaveVacancyTwo').attr('disabled', false);
                        $('#btnSaveVacancyFour').attr('disabled', false);
                    }else{
                        $('#exp3mnth').addClass('inputErrBorder');
                        $('#exp3mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
            }
        });
        $("#exp3-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp3]").prop('required', false);
                $('#exp3mnth').hide();
                $('#exp3mnth').removeClass('inputErrBorder');
                $('#exp3monthErrMsg').html('');
                $('#btnSaveVacancyTwo').attr('disabled', false);
                $('#btnSaveVacancyFour').attr('disabled', false);
            }
        });

        // exp4mnth
        $("#exp4-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp4mnth').show();
                $("input[name=exp4]").prop('required', true);
                $("input[name=exp5]").click(function(){
                    if($('#exp4mnth').val() == ''){
                        $('#exp4mnth').addClass('inputErrBorder');
                        $('#exp4mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
                $('#exp4mnth').blur(function(){
                    if($(this).val() > 0){
                        $('#exp4mnth').removeClass('inputErrBorder');
                        $('#exp4monthErrMsg').html('');
                        $('#btnSaveVacancyTwo').attr('disabled', false);
                        $('#btnSaveVacancyFour').attr('disabled', false);
                    }else{
                        $('#exp4mnth').addClass('inputErrBorder');
                        $('#exp4mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
            }
        });
        $("#exp4-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp4]").prop('required', false);
                $('#exp4mnth').hide();
                $('#exp4mnth').removeClass('inputErrBorder');
                $('#exp4monthErrMsg').html('');
                $('#btnSaveVacancyTwo').attr('disabled', false);
                $('#btnSaveVacancyFour').attr('disabled', false);
            }
        });

        // exp5mnth
        $("#exp5-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp5mnth').show();
                $("input[name=exp5]").prop('required', true);
                $("input[name=exp6]").click(function(){
                    if($('#exp5mnth').val() == ''){
                        $('#exp5mnth').addClass('inputErrBorder');
                        $('#exp5mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                    }
                });
                $('#exp5mnth').blur(function(){
                    if($(this).val() > 0){
                        $('#exp5mnth').removeClass('inputErrBorder');
                        $('#exp5monthErrMsg').html('');
                        $('#btnSaveVacancyTwo').attr('disabled', false);
                        $('#btnSaveVacancyFour').attr('disabled', false);
                    }else{
                        $('#exp5mnth').addClass('inputErrBorder');
                        $('#exp5mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
            }
        });
        $("#exp5-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp5]").prop('required', false);
                $('#exp5mnth').hide();
                $('#exp4mnth').removeClass('inputErrBorder');
                $('#exp4monthErrMsg').html('');
                $('#btnSaveVacancyTwo').attr('disabled', false);
                $('#btnSaveVacancyFour').attr('disabled', false);
            }
        });

        // exp6mnth
        $("#exp6-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp6mnth').show();
                $("input[name=exp6]").prop('required', true);
                $("input[name=exp7]").click(function(){
                    if($('#exp6mnth').val() == ''){
                        $('#exp6mnth').addClass('inputErrBorder');
                        $('#exp6mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
                $('#exp6mnth').blur(function(){
                    if($(this).val() > 0){
                        $('#exp6mnth').removeClass('inputErrBorder');
                        $('#exp6monthErrMsg').html('');
                        $('#btnSaveVacancyTwo').attr('disabled', false);
                        $('#btnSaveVacancyFour').attr('disabled', false);
                    }else{
                        $('#exp6mnth').addClass('inputErrBorder');
                        $('#exp6mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
            }
        });
        $("#exp6-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp6]").prop('required', false);
                $('#exp6mnth').hide();
                $('#exp4mnth').removeClass('inputErrBorder');
                        $('#exp4monthErrMsg').html('');
                $('#btnSaveVacancyTwo').attr('disabled', false);
                $('#btnSaveVacancyFour').attr('disabled', false);
            }
        });

        // exp7mnth
        $("#exp7-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp7mnth').show();
                $('.kwnAdd').show();
                $("input[name=exp7]").prop('required', true);
                $("input[name=knownAddress]").prop('required', true);
                $("input[name=minExp20]").click(function(){
                    if($('#exp7mnth').val() == ''){
                        $('#exp7mnth').addClass('inputErrBorder');
                        $('#exp7mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                    if($('#knownaddress').val() == ''){
                        $('#knownaddress').addClass('inputErrBorder');
                        $('#knownaddress').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
                $('#exp7mnth').blur(function(){
                    if($(this).val() > 0){
                        $('#exp7mnth').removeClass('inputErrBorder');
                        $('#exp7monthErrMsg').html('');
                        $('#btnSaveVacancyTwo').attr('disabled', false);
                        $('#btnSaveVacancyFour').attr('disabled', false);
                    }else{
                        $('#exp7mnth').addClass('inputErrBorder');
                        $('#exp7mnth').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
                $('#knownaddress').blur(function(){
                    if($(this).val() > 0){
                        $('#knownaddress').removeClass('inputErrBorder');
                        $('#knownaddressErrMsg').html('');
                        $('#btnSaveVacancyTwo').attr('disabled', false);
                        $('#btnSaveVacancyFour').attr('disabled', false);
                    }else{
                        $('#knownaddress').addClass('inputErrBorder');
                        $('#knownaddress').attr('placeholder', 'Required Field !.');
                        $('#btnSaveVacancyTwo').attr('disabled', true);
                        $('#btnSaveVacancyFour').attr('disabled', true);
                    }
                });
            }
        });
        $("#exp7-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp7]").prop('required', false);
                $("input[name=knownAddress]").prop('required', false);
                $('#exp7mnth').hide();
                $('.kwnAdd').hide();
                $('#exp4mnth').removeClass('inputErrBorder');
                        $('#exp4monthErrMsg').html('');
                $('#btnSaveVacancyTwo').attr('disabled', false);
                $('#btnSaveVacancyFour').attr('disabled', false);
            }
        });

        //master
        $("#master-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#mastertotmrk').show();
                $('#masterobtmrk').show();
                $('#masterprecntmrk').show();
                $("input[name=masterTotMrk]").prop('required', true);
                $("input[name=masterObtMrk]").prop('required', true);
                $("input[name=masterPrecntMrk]").prop('required', true);
            }
        });
        $("#master-2").click(function () {
            if ($(this).is(":Checked")) {
                $('#mastertotmrk').hide();
                $('#masterobtmrk').hide();
                $('#masterprecntmrk').hide();
                $("input[name=masterTotMrk]").prop('required', false);
                $("input[name=masterObtMrk]").prop('required', false);
                $("input[name=masterPrecntMrk]").prop('required', false);
            }
        });

        // phd
        $("#phd-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#phdtotmrk').show();
                $('#phdobtmrk').show();
                $('#phdprecntmrk').show();
                $("input[name=phdTotMrk]").prop('required', true);
                $("input[name=phdObtMrk]").prop('required', true);
                $("input[name=phdPrecntMrk]").prop('required', true);
            }
        });
        $("#phd-2").click(function () {
            if ($(this).is(":Checked")) {
                $('#phdtotmrk').hide();
                $('#phdobtmrk').hide();
                $('#phdprecntmrk').hide();
                $("input[name=phdTotMrk]").prop('required', false);
                $("input[name=phdObtMrk]").prop('required', false);
                $("input[name=phdPrecntMrk]").prop('required', false);
            }
        });

        // high court
        $("#highcrtjudge-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#courtnam').show();
                $('#highcrtexp').show();
                $('.hcrt').show();
                $("input[name=courtNam]").prop('required', true);
                $("input[name=highCrtExp]").prop('required', true);

            }
        });
        $("#highcrtjudge-2").click(function () {
            if ($(this).is(":Checked")) {
                $('#courtnam').hide();
                $('#highcrtexp').hide();
                $('.hcrt').hide();
                $("input[name=courtNam]").prop('required', false);
                $("input[name=highCrtExp]").prop('required', false);
            }
        });

        // get district based on state (permanent)
        $('#state_code').change(function(){ //alert("hi");return false;
            var url = "<?php echo $this->Url->build(['controller' => 'App', 'action' => 'getCfDistrictsBasedOnState']);?>";
            var state_code = $(this).val();
            var token = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            //alert(url + " == " + token);return false;
            $.ajax({
                type: 'POST',
                url: url,
                async:true,
                data: ({state_code : state_code}),
                dataType:'html',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function(response, textStatus)
                {
                    $('#permantdist').empty();
                    var result = JSON.parse(response); //alert(result);return false;
                    $.each(result, function(val, text) {
                        $('#permantdist').append(
                            $('<option></option>').val(val).html(text)
                            );
                    });
                    $("select[id=permantdist]").prepend("<option value='' selected>-- Select Permanent District--</option>");
                },
                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });

        // get district based on state (Temprory)
        $('#temp_state_code').change(function(){ //alert("hi");return false;
            var url = "<?php echo $this->Url->build(['controller' => 'App', 'action' => 'getCfDistrictsBasedOnState']);?>";
            var temp_state_code = $(this).val();
            var token = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            //alert(url + " == " + token);return false;
            $.ajax({
                type: 'POST',
                url: url,
                async:true,
                data: ({state_code : temp_state_code}),
                dataType:'html',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function(response, textStatus)
                {
                    $('#currdist').empty();
                    var result = JSON.parse(response); //alert(result);return false;
                    $.each(result, function(val, text) {
                        $('#currdist').append(
                            $('<option></option>').val(val).html(text)
                            );
                    });
                    $("select[id=currdist]").prepend("<option value='' selected>-- Select Current District--</option>");
                },
                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });

        //Expeience Validation
        /*
        var expMnth = 0;
        $('.input,.text .expMnt').keyup(function(){
            $('.input,.text .expMnt').each(function(){
                var exp = $(this).val();
                var expMnth = parseInt(expMnth) + parseInt(exp);
            });
            console.log(expMnth);
        });
        */
        // var expMnth = 0;
        // var exp = 0;
        // jQuery(".mnthExp").delegate(".expMnt","keyup",function(){
        //     if(typeof(expMnth) == "undefined" && expMnth == null){
        //                 var expMnth = 0;
        //             }
        //     /*
        //     jQuery(".mnthExp").delegate(".expMnt","each",function(){
        //         var exp = $(this).val();
        //         var expMnth = parseInt(expMnth) + parseInt(exp);
        //     });
        //     */
        //     // $(".mnthExp").delegate('input[class="expMnt"][style="display: block;"]','each',function(){
        //     jQuery(".expMnt").each(function(){
        //         if($(this).val()){
        //
        //             alert(expMnth);
        //             var expMnth = expMnth + parseInt($(this).val());
        //         }
        //         alert(expMnth);
        //         console.log(expMnth);
        //     });

        // });





    });
</script>
