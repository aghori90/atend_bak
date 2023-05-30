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
        .bxDco {
            display: inline-block;
        }
        .viewCertificate{
            border-radius: 3px;
            background-color: #00C0EF;
            padding: 5px;
            color: #ffffff;
            width: 200px;
        }.viewCertificate:hover{
            border-radius: 3px;
            background-color: #1dab0c;
            padding: 5px;
            color: #ffffff;
            width: 200px;
        }
        .ms-options > ul >li{
            list-style : none !important;
        }
        .ms-options-wrap > button {
            color: #495057;
        }
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">

            <div class="card-header bg-dark text-white">राज्य आयोग में सदस्य पद </div>
            <!--            --><?php //echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerForms']]); ?>
            <div class="valid">
                <?php echo $this->Flash->render(); ?>
            </div>
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
                                <?php echo $this->Form->control('dob', ['label' => '', 'class' => 'form-control inpt', 'id' => 'date', 'disabled' => 'disabled', 'value' => $data['dob']]); ?>
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
                                <?php echo $this->Form->control('gender', ['label' => '', 'class' => 'form-control inpt', 'id' => 'date', 'disabled' => 'disabled', 'value' => $data['gender']]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Contact :</b></label>
                                <?php echo $this->Form->control('contact', ['label' => '', 'class' => 'form-control inpt', 'id' => 'date', 'disabled' => 'disabled', 'value' => $data['mobile']]); ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($sessionVacId == 1){ ?>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'updateCfUser']]); ?>
            <div class="valid">
                <?php echo $this->Flash->render(); ?>
            </div>
            <div class="container-fluid">
                <div class="card-header bg-primary text-white">निवेदक विवरण : </div>
                <div class="row">

                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>नाम (हिन्दी) :</b></label>
                        <?php echo $this->Form->control('namHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in Hindi', 'disabled' => 'disabled', 'value' => $data['name_hn']]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>पिता का नाम (अंग्रेजी) :</b></label>
                        <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English', 'disabled' => 'disabled', 'value' => $data['fathername']]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>पिता का नाम (हिन्दी) :</b></label>
                        <?php echo $this->Form->control('fatNamHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name In Hindi', 'disabled' => 'disabled', 'value' => $data['fathername_hn']]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>आयु (01 जुलाई 2021 को) :</b></label>
                        <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Age', 'disabled' => 'disabled', 'value' => $data['age']]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>श्रेणी :</b></label>
                    <?php $wrkPlace = ['GEN'=>'GEN', 'OBC'=>'OBC', 'ST'=>'ST', 'SC'=>'SC','OTHERS'=>'OTHERS']; ?>
                    <?php echo $this->Form->select('cat',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--श्रेणी चुने --', 'disabled' => 'disabled', 'value' => $data['catagory']]); ?>
                </div>
                </div>
            </div>
                    <div class="card-header bg-primary text-white">Address</div>
            <div class="addBox">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>स्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt','id'=>'state_code', 'empty'=>'--Select Current State-- ','options'=>$state, 'disabled' => 'disabled', 'value' => $data['permanent_state']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>अस्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control  inpt', 'id'=>'temp_state_code','empty'=>'--Select Current State ','options'=>$state, 'disabled' => 'disabled', 'value' => $data['temporary_state']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी जिला :</b></label>
                            <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt',  'empty'=>'--Select Permanent District--','options'=>$cfPrmDistricts, 'disabled' => 'disabled', 'value' => $data['permanent_district']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी जिला :</b></label>
                            <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'-- Select Current District--', 'disabled' => 'disabled','options'=>$cfDistricts, 'value' => $data['temporary_district']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                            <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Permanent Address ', 'disabled' => 'disabled', 'value' => $data['permanent_address']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                            <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Current Address', 'disabled' => 'disabled', 'value' => $data['temporary_address']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी पिनकोड :</b></label>
                            <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode ', 'disabled' => 'disabled', 'value' => $data['permanent_pincode']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी पिनकोड :</b></label>
                            <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode', 'disabled' => 'disabled', 'value' => $data['temporary_pincode']]); ?>
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
                            <?php echo $this->Form->radio('highCrtJudge', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['high_court_judge']]); ?>
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
                                <?php echo $this->Form->control('courtNam', ['label' => '', 'class' => 'form-control textonly inpt','placeholder'=>'Name of the Court', 'disabled' => 'disabled', 'value' => $data['high_court_name']]); ?>
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
                                <?php echo $this->Form->control('highCrtExp', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['high_court_exp']]); ?>
                            </div>
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
                            <?php echo $this->Form->radio('exp7', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['other_exp']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group">
                            <label for="form"><b>अन्य विशेष अनुभव का विवरण दे  :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group ">
                            <?php echo $this->Form->control('knownAddress', ['label' => '', 'class' => 'form-control radee', 'disabled' => 'disabled', 'value' => $data['other_exp_details']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group">
                            <label for="form"><b>संबंधित कार्यालय का पता :</b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 kwnAdd">
                        <div class="form-group ">
                            <?php echo $this->Form->control('knownAddress', ['label' => '', 'class' => 'form-control radee', 'disabled' => 'disabled', 'value' => $data['other_exp_off_address']]); ?>
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
                            <?php echo $this->Form->radio('ghosna1', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_1']]); ?>
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
                            <?php echo $this->Form->radio('ghosna2', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_2']]); ?>
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
                            <?php echo $this->Form->radio('ghosna3', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_3']]); ?>
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
                            <?php echo $this->Form->radio('ghosna4', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_4']]); ?>
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
                            <?php echo $this->Form->radio('ghosna5', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_5']]); ?>
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
                            <?php echo $this->Form->radio('ghosna6', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_6']]); ?>
                        </div>
                    </div>
                </div>
                <!-- UPloaded documents -->
                <div class="card-header bg-primary text-white">नUploaded Documents : </div>
                <div class="row">
                    <?php
                    if(!empty($getCfDocs)){
                        $sl = 1;
                        foreach($getCfDocs as $docKey => $docVal){
                            $docLabel = $docVal['document_type_id'];
                            $explodeName = explode('.', $docVal['name']);
                            //echo "<pre>";print_r($explodeName);
                            $docType = $explodeName[1];
                            $cf_reg_no = $docVal['cf_registration_no'];
                            $docPath = CF_DOC_PATH.'/'.$cf_reg_no.'/';
                    ?>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b><?php echo strtoupper($docLabel) ." CERTIFICATE";?></b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php //echo $docVal['name'];?>
                            <p data-toggle="<?php echo $docType;?>"id="<?php echo $sl;?>_doc" class="viewCertificate doc_img" alt="<?php echo $docVal['name'];?>" rel="<?php echo $this->Document->showFIle($docPath.$docVal['name']);?>" title="VIEW CERTIFICATE" style="cursor: pointer;">
                                Click Here To View Certificate
                            </p>
                        </div>
                    </div>
                    <?php $sl++;
                        }
                    }else{
                        echo "No Documents";
                    }
                    ?>
                </div>
            </div>
            <!--Submit-->
            <div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="btnDeco">
                        <button type="submit" class="btn btn-outline-success">Print</button>
                    </div>
                </div>
            </div>
            <div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="btnDeco" id="allowToUpdate">
                        <button type="button" class="btn btn-outline-success" id="btnEdit">Edit</button>
                    </div>
                    <div class="btnDeco" id="update" style="display:none;">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                    </div>
                </div>
            </div>
            <?php
            echo $this->Form->hidden('vacId', ['name' => 'vacancyId', 'value' => $sessionVacId]);
            echo $this->Form->hidden('regNo', ['name' => 'regNo', 'value' => $sessionReg]);
            echo $this->Form->end(); ?>
            </div>
    </div>
</div>
    </div>
        <?php } ?>
                    <?php if ($sessionVacId == 2){ ?>
        <?php echo $this->Form->create('member2', ['url' => ['controller' => 'SecyDmfSmfDistricts', 'action' => 'updateCfUser']]); ?>
        <!--        <div class="valid">--><?php //echo $this->Flash->render(); ?><!--</div>-->
        <div class="container-fluid">
            <div class="card-header bg-primary text-white">Details</div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>कार्य पृष्ठ भूमि :</b></label>
                                                <?php $wrkPlace = ['judicial'=>'न्यायिक ', 'non-judicial'=>'गैर न्यायिक'] ?>
<!--                        --><?php //$wrkPlace = ['1' => 'न्यायिक ', '2' => 'गैर न्यायिक'] ?>
                        <?php echo $this->Form->select('workPlc', $wrkPlace, ['label' => '', 'class' => 'form-control', 'empty' => '-- कार्य पृष्ठ भूमि --', 'disabled' => 'disabled', 'value' => $data['work_skill']]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>नाम (हिन्दी) :</b></label>
                        <?php echo $this->Form->control('namHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in Hindi', 'disabled' => 'disabled', 'value' => $data['name_hn']]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>पिता का नाम (अंग्रेजी) :</b></label>
                        <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English', 'disabled' => 'disabled', 'value' => $data['fathername']]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>पिता का नाम (हिन्दी) :</b></label>
                        <?php echo $this->Form->control('fatNamHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name In Hindi', 'disabled' => 'disabled', 'value' => $data['fathername_hn']]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>आयु (01 जुलाई 2021 को) :</b></label>
                        <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Age', 'disabled' => 'disabled', 'value' => $data['age']]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>श्रेणी :</b></label>
                        <?php $wrkPlace = ['GEN'=>'GEN', 'OBC'=>'OBC', 'ST'=>'ST', 'SC'=>'SC','OTHERS'=>'OTHERS']; ?>
                        <?php echo $this->Form->select('cat',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--श्रेणी चुने --', 'disabled' => 'disabled', 'value' => $data['catagory']]); ?>
                    </div>
                </div>
            </div>
            <div class="card-header bg-primary text-white">Address</div>
            <div class="addBox">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>स्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt', 'placeholder'=>'Enter Permanent State ','options'=>$state, 'disabled' => 'disabled', 'value' => $data['permanent_state']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>अस्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control  inpt','id'=>'temp_state_code', 'empty'=>'--Select Current State-- ','options'=>$state, 'disabled' => 'disabled', 'value' => $data['temporary_state']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी जिला :</b></label>
                            <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt',  'empty'=>'--Select Permanent District--','options'=>$cfPrmDistricts, 'disabled' => 'disabled', 'value' => $data['permanent_district']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी जिला :</b></label>
                            <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'-- Select Current District--', 'disabled' => 'disabled','options'=>$cfDistricts, 'value' => $data['temporary_district']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                            <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Permanent Address ', 'disabled' => 'disabled', 'value' => $data['permanent_address']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                            <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Current Address', 'disabled' => 'disabled', 'value' => $data['temporary_address']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी पिनकोड :</b></label>
                            <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode ', 'disabled' => 'disabled', 'value' => $data['permanent_pincode']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी पिनकोड :</b></label>
                            <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode', 'disabled' => 'disabled', 'value' => $data['temporary_pincode']]); ?>
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
                        <?php echo $this->Form->radio('exp1', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience']]); ?>
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
                        <?php echo $this->Form->control('exp1_1', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'In Months', 'disabled' => 'disabled', 'value' => $data['experience_duration_month']]); ?>
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
                                <td><?php echo $this->Form->control('graduTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks', 'disabled' => 'disabled', 'value' => $data['graduation_total_marks']]); ?></td>
                                <td><?php echo $this->Form->control('graduObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco','placeholder'=>'Enter Obtain Marks', 'disabled' => 'disabled', 'value' => $data['graduation_obtain_marks']]); ?></td>
                                <td><?php echo $this->Form->control('graduPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco','placeholder'=>'Enter Percentage', 'disabled' => 'disabled', 'value' => $data['graduation_percentage']]); ?></td>
                            </tr>
                            <tr>
                                <td><b>स्नातोकोत्तर</b></td>
                                <td>
                                    <?php $app = ['1' => 'हाँ', '2' => 'नहीं'] ?>
                                    <?php echo $this->Form->radio('master', $app, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['master_degree']]); ?>
                                </td>
                                <td><?php echo $this->Form->control('masterTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks', 'disabled' => 'disabled', 'value' => $data['master_degree_total_marks']]); ?></td>
                                <td><?php echo $this->Form->control('masterObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Obtain Marks', 'disabled' => 'disabled', 'value' => $data['master_degree_obtain_marks']]); ?></td>
                                <td><?php echo $this->Form->control('masterPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Percentage', 'disabled' => 'disabled', 'value' => $data['master_degree_percentage']]); ?></td>
                            </tr>
                            <tr>
                                <td><b>Ph.D.</b></td>
                                <td>
                                    <?php $appr = ['1' => 'हाँ', '2' => 'नहीं'] ?>
                                    <?php echo $this->Form->radio('phd', $appr, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['phd_degree']]); ?>
                                </td>
                                <td><?php echo $this->Form->control('phdTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks', 'disabled' => 'disabled', 'value' => $data['phd_degree_total_marks']]); ?></td>
                                <td><?php echo $this->Form->control('phdObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Obtain Marks', 'disabled' => 'disabled', 'value' => $data['phd_degree_obtain_marks']]); ?></td>
                                <td><?php echo $this->Form->control('phdPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Percentage', 'disabled' => 'disabled', 'value' => $data['phd_degree_percentage']]); ?></td>
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
                        <?php echo $this->Form->radio('exp2', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_1']]); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp2Month', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'In Months', 'disabled' => 'disabled', 'value' => $data['experience_1_duration']]); ?>
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
                        <?php $apprve = ['1' => 'हाँ ', '2' => 'नहीं '] ?>
                        <?php echo $this->Form->radio('exp3', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_2']]); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp3Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'In Months', 'disabled' => 'disabled', 'value' => $data['experience_2_duration']]); ?>
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
                        <?php echo $this->Form->radio('exp4', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_3']]); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnt">
                        <?php echo $this->Form->control('exp4Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['experience_3_duration']]); ?>
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
                        <?php echo $this->Form->radio('exp5', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_4']]); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp5Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['experience_4_duration']]); ?>
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
                        <?php echo $this->Form->radio('exp6', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_5']]); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp6Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['experience_5_duration']]); ?>
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
                        <?php echo $this->Form->radio('exp7', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['pds_st_dist_work']]); ?>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="form-group mnth">
                        <?php echo $this->Form->control('exp7Mnth', ['label' => '', 'class' => 'form-control numonly','placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['pds_st_dist_work_duration']]); ?>
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
                        <?php echo $this->Form->control('knownAddress', ['label' => '', 'class' => 'form-control radee txtOnly','placeholder'=>'Enter Worked Office Address', 'disabled' => 'disabled', 'value' => $data['pds_st_dist_work_address']]); ?>
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
                        <?php echo $this->Form->radio('minExp20', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['exp_duration_20yrs']]); ?>
                    </div>
                </div>
            </div>
            <!-- UPloaded documents -->
                <div class="card-header bg-primary text-white">नUploaded Documents : </div>
                <div class="row">
                    <?php
                    if(!empty($getCfDocs)){
                        $sl = 1;
                        foreach($getCfDocs as $docKey => $docVal){
                            $docLabel = $docVal['document_type_id'];
                            $explodeName = explode('.', $docVal['name']);
                            //echo "<pre>";print_r($explodeName);
                            $docType = $explodeName[1];
                            $cf_reg_no = $docVal['cf_registration_no'];
                            $docPath = CF_DOC_PATH.'/'.$cf_reg_no.'/';
                    ?>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b><?php echo strtoupper($docLabel) ." CERTIFICATE";?></b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php //echo $docVal['name'];?>
                            <p data-toggle="<?php echo $docType;?>"id="<?php echo $sl;?>_doc" class="viewCertificate doc_img" alt="<?php echo $docVal['name'];?>" rel="<?php echo $this->Document->showFIle($docPath.$docVal['name']);?>" title="VIEW CERTIFICATE" style="cursor: pointer;">
                                Click Here To View Certificate
                            </p>
                        </div>
                    </div>
                    <?php $sl++;
                        }
                    }else{
                        echo "No Documents";
                    }
                    ?>
                </div>

        </div>

        <!--Submit-->
        <div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="btnDeco">
                    <button type="submit" class="btn btn-outline-success">Print</button>
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="btnDeco" id="allowToUpdate">
                    <button type="button" class="btn btn-outline-success" id="btnEdit">Edit</button>
                </div>
                <div class="btnDeco" id="update" style="display:none;">
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </div>
        </div>
        <?php
        echo $this->Form->hidden('vacId', ['name' => 'vacancyId', 'value' => $sessionVacId]);
        echo $this->Form->hidden('regNo', ['name' => 'regNo', 'value' => $sessionReg]);
        echo $this->Form->end(); ?>
    </div>
    <!--</div>-->
    <?php } ?>
                    <?php if ($sessionVacId == 3) { ?>
    <!--    <div class="card-header bg-primary text-white">Form III</div>-->
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->Form->create('vaccThree',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'updateCfUser']]); ?>
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
                            <?php echo $this->Form->select('post',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--पद चुने --', 'disabled' => 'disabled', 'value' => $data['post_name']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>आवेदक का नाम (हिन्दी) :</b></label>
                            <?php echo $this->Form->control('namHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Applicant Name', 'disabled' => 'disabled', 'value' => $data['name_hn']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पिता का नाम (अंग्रेजी) :</b></label>
                            <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English', 'disabled' => 'disabled', 'value' => $data['fathername']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पिता का नाम (हिन्दी) :</b></label>
                            <?php echo $this->Form->control('fatNamHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name In Hindi', 'disabled' => 'disabled', 'value' => $data['fathername_hn']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>आयु (01 जुलाई 2021 को) :</b></label>
                            <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Age as on 01-July-2021', 'disabled' => 'disabled', 'value' => $data['age']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>श्रेणी :</b></label>
                            <?php $wrkPlace = ['GEN'=>'GEN', 'OBC'=>'OBC', 'ST'=>'ST', 'SC'=>'SC','OTHERS'=>'OTHERS']; ?>
                            <?php echo $this->Form->select('cat',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--श्रेणी चुने --', 'disabled' => 'disabled', 'value' => $data['catagory']]); ?>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-primary text-white">पत्राचार :</div>
                <div class="addBox">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group boxAddrss">
                                <label for="form"><b>स्थायी राज्य :</b></label>
                                <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt', 'placeholder'=>'Enter Permanent State', 'disabled' => 'disabled','options'=>$state, 'value' => $data['permanent_state']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group boxAddrss">
                                <label for="form"><b>अस्थायी राज्य :</b></label>
                                <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control  inpt', 'placeholder'=>'Enter Current State', 'disabled' => 'disabled','options'=>$state, 'value' => $data['temporary_state']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी जिला :</b></label>
                                <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Permanent District','options'=>$cfPrmDistricts, 'disabled' => 'disabled', 'value' => $data['permanent_district']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी जिला :</b></label>
                                <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Current District', 'disabled' => 'disabled','options'=>$cfDistricts, 'value' => $data['temporary_district']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Permanent Address', 'disabled' => 'disabled', 'value' => $data['permanent_address']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Current Address ', 'disabled' => 'disabled', 'value' => $data['temporary_address']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी पिनकोड :</b></label>
                                <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode', 'disabled' => 'disabled', 'value' => $data['permanent_pincode']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी पिनकोड :</b></label>
                                <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode', 'disabled' => 'disabled', 'value' => $data['temporary_pincode']]); ?>
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
                            <?php echo $this->Form->radio('expp', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience']]); ?>
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
                            <?php echo $this->Form->control('expInMnth', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Exp In Months', 'disabled' => 'disabled', 'value' => $data['experience_duration_month']]); ?>
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
                            <?php echo $this->Form->radio('ghosna1', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_1']]); ?>
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
                            <?php echo $this->Form->radio('ghosna2', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_2']]); ?>
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
                            <?php echo $this->Form->radio('ghosna3', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_3']]); ?>
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
                            <?php echo $this->Form->radio('ghosna4', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_4']]); ?>
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
                            <?php echo $this->Form->radio('ghosna5', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_5']]); ?>
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
                            <?php echo $this->Form->radio('ghosna6', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_6']]); ?>
                        </div>
                    </div>
                </div>
                <!-- UPloaded documents -->
                <div class="card-header bg-primary text-white">नUploaded Documents : </div>
                <div class="row">
                    <?php
                    if(!empty($getCfDocs)){
                        $sl = 1;
                        foreach($getCfDocs as $docKey => $docVal){
                            $docLabel = $docVal['document_type_id'];
                            $explodeName = explode('.', $docVal['name']);
                            //echo "<pre>";print_r($explodeName);
                            $docType = $explodeName[1];
                            $cf_reg_no = $docVal['cf_registration_no'];
                            $docPath = CF_DOC_PATH.'/'.$cf_reg_no.'/';
                    ?>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b><?php echo strtoupper($docLabel) ." CERTIFICATE";?></b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php //echo $docVal['name'];?>
                            <p data-toggle="<?php echo $docType;?>"id="<?php echo $sl;?>_doc" class="viewCertificate doc_img" alt="<?php echo $docVal['name'];?>" rel="<?php echo $this->Document->showFIle($docVal['name']);?>" title="VIEW CERTIFICATE" style="cursor: pointer;">
                                Click Here To View Certificate
                            </p>
                        </div>
                    </div>
                    <?php $sl++;
                        }
                    }else{
                        echo "No Documents";
                    }
                    ?>
                </div>
            </div>
            <!--Submit-->
            <div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="btnDeco">
                        <button type="submit" class="btn btn-outline-success">Print</button>
                    </div>
                </div>
            </div>
            <div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="btnDeco" id="allowToUpdate">
                        <button type="button" class="btn btn-outline-success" id="btnEdit">Edit</button>
                    </div>
                    <div class="btnDeco" id="update" style="display:none;">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                    </div>
                </div>
            </div>
            <?php
            echo $this->Form->hidden('vacId', ['name' => 'vacancyId', 'value' => $sessionVacId]);
            echo $this->Form->hidden('regNo', ['name' => 'regNo', 'value' => $sessionReg]);
            echo $this->Form->end(); ?>
        </div>
    </div>
    </div>
<?php } ?>
                    <?php if ($sessionVacId == 4) { ?>
    <?php echo $this->Form->create('member2',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'updateCfUser']]); ?>
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
                            <?php echo $this->Form->select('post',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--पद चुने --', 'disabled' => 'disabled', 'value' => $data['post_name']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पद के विरुद्ध में जिला की प्राथमिकता :</b></label>
                            <?php //$wrkPlace = ['1'=>'सदस्य', '2'=>'जिला आयोग'] ?>
                            <?php
                            $selected_districts  = [];
                            if(!empty($data['district_priority_by_post'])){
                                $seltd_dist = explode(',', $data['district_priority_by_post']);
                                for($s=0;$s<count($seltd_dist);$s++){
                                    array_push($selected_districts, $seltd_dist[$s]);
                                }
                            }
                            echo $this->Form->select('multiiDist',$districts, ['label' => '','id'=>'multiDist', 'class' => 'form-control','multiple'=>'multiple',  'value' => $selected_districts]);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>श्रेणी :</b></label>
                            <?php $category = ['GEN'=>'GEN', 'OBC'=>'OBC', 'ST'=>'ST', 'SC'=>'SC','OTHERS'=>'OTHERS'];?>
                            <?php echo $this->Form->select('cat',$category, ['label' => '', 'class' => 'form-control','empty' => '--श्रेणी चुने --', 'disabled' => 'disabled', 'value' => $data['catagory']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>नाम (हिन्दी) :</b></label>
                            <?php echo $this->Form->control('namHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in Hindi', 'disabled' => 'disabled', 'value' => $data['name_hn']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पिता का नाम (अंग्रेजी) :</b></label>
                            <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English', 'disabled' => 'disabled', 'value' => $data['fathername']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पिता का नाम (हिन्दी) :</b></label>
                            <?php echo $this->Form->control('fatNamHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name In Hindi', 'disabled' => 'disabled', 'value' => $data['fathername_hn']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>आयु (01 जुलाई 2021 को) :</b></label>
                            <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Age', 'disabled' => 'disabled', 'value' => $data['age']]); ?>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-primary text-white">पत्राचार :</div>
                <div class="addBox">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group boxAddrss">
                                <label for="form"><b>स्थायी राज्य :</b></label>
                                <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt', 'empty'=>'--Select Prmanent State-- ','options'=>$state, 'disabled' => 'disabled', 'value' => $data['permanent_state']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group boxAddrss">
                                <label for="form"><b>अस्थायी राज्य :</b></label>
                                <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control  inpt', 'empty'=>'--Select Current State-- ','options'=>$state, 'disabled' => 'disabled', 'value' => $data['temporary_state']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी जिला :</b></label>
                                <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Permanent District','options'=>$cfPrmDistricts, 'disabled' => 'disabled', 'value' => $data['permanent_district']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी जिला :</b></label>
                                <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Current District', 'disabled' => 'disabled','options'=>$cfDistricts, 'value' => $data['temporary_district']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Permanent Address', 'disabled' => 'disabled', 'value' => $data['permanent_address']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Current Address ', 'disabled' => 'disabled', 'value' => $data['temporary_address']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी पिनकोड :</b></label>
                                <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode', 'disabled' => 'disabled', 'value' => $data['permanent_pincode']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी पिनकोड :</b></label>
                                <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode', 'disabled' => 'disabled', 'value' => $data['temporary_pincode']]); ?>
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
                            <?php echo $this->Form->radio('minExp15', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['exp_duration_15yrs']]); ?>
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
                                    <td><?php echo $this->Form->control('graduTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks', 'disabled' => 'disabled', 'value' => $data['graduation_total_marks']]); ?></td>
                                    <td><?php echo $this->Form->control('graduObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco','placeholder'=>'Enter Obtain Marks', 'disabled' => 'disabled', 'value' => $data['graduation_obtain_marks']]); ?></td>
                                    <td><?php echo $this->Form->control('graduPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco','placeholder'=>'Enter Percentage', 'disabled' => 'disabled', 'value' => $data['graduation_percentage']]); ?></td>
                                </tr>
                                <tr>
                                    <td><b>स्नातोकोत्तर</b></td>
                                    <td>
                                        <?php $app = ['1' => 'हाँ', '2' => 'नहीं'] ?>
                                        <?php echo $this->Form->radio('master', $app, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['master_degree']]); ?>
                                    </td>
                                    <td><?php echo $this->Form->control('masterTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks', 'disabled' => 'disabled', 'value' => $data['master_degree_total_marks']]); ?></td>
                                    <td><?php echo $this->Form->control('masterObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Obtain Marks', 'disabled' => 'disabled', 'value' => $data['master_degree_obtain_marks']]); ?></td>
                                    <td><?php echo $this->Form->control('masterPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Percentage', 'disabled' => 'disabled', 'value' => $data['master_degree_percentage']]); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ph.D.</b></td>
                                    <td>
                                        <?php $appr = ['1' => 'हाँ', '2' => 'नहीं'] ?>
                                        <?php echo $this->Form->radio('phd', $appr, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['phd_degree']]); ?>
                                    </td>
                                    <td><?php echo $this->Form->control('phdTotMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Total Marks', 'disabled' => 'disabled', 'value' => $data['phd_degree_total_marks']]); ?></td>
                                    <td><?php echo $this->Form->control('phdObtMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Obtain Marks', 'disabled' => 'disabled', 'value' => $data['phd_degree_obtain_marks']]); ?></td>
                                    <td><?php echo $this->Form->control('phdPrecntMrk', ['label' => '', 'class' => 'form-control numonly bxDco', 'placeholder'=>'Enter Percentage', 'disabled' => 'disabled', 'value' => $data['phd_degree_percentage']]); ?></td>
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
                            <?php echo $this->Form->radio('exp2', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_1']]); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp2Month', ['label' => '', 'class' => 'form-control', 'placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['experience_1_duration']]); ?>
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
                            <?php echo $this->Form->radio('exp3', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_2']]); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp3Mnth', ['label' => '', 'class' => 'form-control', 'placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['experience_2_duration']]); ?>
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
                            <?php echo $this->Form->radio('exp4', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_3']]); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnt">
                            <?php echo $this->Form->control('exp4Mnth', ['label' => '', 'class' => 'form-control', 'placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['experience_3_duration']]); ?>
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
                            <?php echo $this->Form->radio('exp5', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_4']]); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp5Mnth', ['label' => '', 'class' => 'form-control', 'placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['experience_4_duration']]); ?>
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
                            <?php echo $this->Form->radio('exp6', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['experience_5']]); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp6Mnth', ['label' => '', 'class' => 'form-control', 'placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['experience_5_duration']]); ?>
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
                            <?php echo $this->Form->radio('exp7', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['pds_st_dist_work']]); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                        <div class="form-group mnth">
                            <?php echo $this->Form->control('exp7Mnth', ['label' => '', 'class' => 'form-control', 'placeholder'=>'Exp In Months', 'disabled' => 'disabled', 'value' => $data['pds_st_dist_work_duration']]); ?>
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
                            <?php echo $this->Form->control('knownAddress', ['label' => '', 'class' => 'form-control radee', 'placeholder'=>'Enter Office Address', 'disabled' => 'disabled', 'value' => $data['pds_st_dist_work_address']]); ?>
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
                            <?php echo $this->Form->radio('ghosna1', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_1']]); ?>
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
                            <?php echo $this->Form->radio('ghosna2', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_2']]); ?>
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
                            <?php echo $this->Form->radio('ghosna3', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_3']]); ?>
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
                            <?php echo $this->Form->radio('ghosna4', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_4']]); ?>
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
                            <?php echo $this->Form->radio('ghosna5', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_5']]); ?>
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
                            <?php echo $this->Form->radio('ghosna6', $apprve, ['label' => '', 'class' => 'rad', 'disabled' => 'disabled', 'value' => $data['declaration_6']]); ?>
                        </div>
                    </div>
                </div>
                <!-- UPloaded documents -->
                <div class="card-header bg-primary text-white">नUploaded Documents : </div>
                <div class="row">
                    <?php
                    if(!empty($getCfDocs)){
                        $sl = 1;
                        foreach($getCfDocs as $docKey => $docVal){
                            $docLabel = $docVal['document_type_id'];
                            $explodeName = explode('.', $docVal['name']);
                            //echo "<pre>";print_r($explodeName);
                            $docType = $explodeName[1];
                            $cf_reg_no = $docVal['cf_registration_no'];
                            $docPath = CF_DOC_PATH.'/'.$cf_reg_no.'/';
                    ?>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b><?php echo strtoupper($docLabel) ." CERTIFICATE";?></b></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group radee">
                            <?php //echo $docVal['name'];?>
                            <p data-toggle="<?php echo $docType;?>"id="<?php echo $sl;?>_doc" class="viewCertificate doc_img" alt="<?php echo $docVal['name'];?>" rel="<?php echo $this->Document->showFIle($docPath.$docVal['name']);?>" title="VIEW CERTIFICATE" style="cursor: pointer;">
                                Click Here To View Certificate
                            </p>
                        </div>
                    </div>
                    <?php $sl++;
                        }
                    }else{
                        echo "No Documents";
                    }
                    ?>
                </div>
            </div>
    <!--Submit-->
    <div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="btnDeco">
                <button type="submit" class="btn btn-outline-success">Print</button>
            </div>
        </div>
    </div>
    <div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="btnDeco" id="allowToUpdate">
                <button type="button" class="btn btn-outline-success" id="btnEdit">Edit</button>
            </div>
            <div class="btnDeco" id="update" style="display:none;">
                <button type="submit" class="btn btn-outline-success">Update</button>
            </div>
        </div>
    </div>
    <?php
    echo $this->Form->hidden('vacId', ['name' => 'vacancyId', 'value' => $sessionVacId]);
    echo $this->Form->hidden('regNo', ['name' => 'regNo', 'value' => $sessionReg]);
    echo $this->Form->end(); ?>
    </div>    </div>
<?php } ?>
</div>
</div>
<!-- Start : Modal for Document Display -->
<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <span id="docName"></span>
                <button type="button" class="close">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- Ended : Modal for Document Display -->
<style type="text/css">
.iframe-container {
    padding-bottom: 50%;
    padding-top: 00px;
    /*height: 0;*/
    overflow: hidden;
}

.iframe-container iframe,
.iframe-container object,
.iframe-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
<script type="text/javascript">
// Start : to display document in modalbox

$(function() {
    $('.close').click(function(){
        $('#myModal').hide();
    });
    $('.doc_img').on('click', function() {
        $('#docName').html();
        //$('.modal-body').html();
        var pdf_link = $(this).attr('rel');
        var docName = $(this).attr('alt');
        var dataType = $(this).attr('data-toggle');
        //alert(dataType + " == " + pdf_link);return false;
        $('#docName').html(docName);
        $('#myModal').show();
        if(dataType == 'pdf'){
            var iframe = '<div class="iframe-container"><embed src="' + pdf_link + '" width="100%" /></div>';
        }else{
            var iframe = '<div class="iframe-container"><img src="' + pdf_link + '" width="100%" /></div>';
        }
        $('.modal-body').html(iframe);
        // $.createModal({
        //     title: docName,
        //     message: iframe,
        //     closeButton: true,
        //     scrollable: false
        // });
        // return false;
    });
});
// Ended : to display document in modalbox
    $(document).ready(function () {
    //     $(button)
    // .closest('.ms-options-wrap')
    // .find(' button')
    // .addClass('form-control');

        setTimeout(function () {
            $("#success").hide('blind', {}, 500)
        }, 300);

        $('#multiDist').removeClass('jqmsLoaded');
        $('#multiDist').multiselect({
            // columns: 2,
            placeholder: '--Select Districts--'
        });

        // experience
        // $('.exp1_1').hide();
        // $('.kwnAdd').hide();
        // $('#exp2month').hide();
        // $('#exp3mnth').hide();
        // $('#exp4mnth').hide();
        // $('#exp5mnth').hide();
        // $('#exp6mnth').hide();
        // $('#exp7mnth').hide();
        // $('#mastertotmrk').hide();
        // $('#masterobtmrk').hide();
        // $('#masterprecntmrk').hide();
        // $('#phdtotmrk').hide();
        // $('#phdobtmrk').hide();
        // $('#phdprecntmrk').hide();
        // $('#courtnam').hide();
        // $('#highcrtexp').hide();
        // $('.hcrt').hide();
        // $('.sav').hide();

        var expMinLength = 2;
        var expMaxLength = 3;
        //exp1_1
        // $("input[name=exp1]").click(function(){
        $("#exp1-1").click(function () {
            if ($(this).is(":Checked")) {
                $('.exp1_1').show();
                $("input[name=exp1_1]").prop('required', true);
            }
        });
        $("#exp1-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp1_1]").prop('required', false);
                $('.exp1_1').hide();
            }
        });

        // exp2month
        $("#exp2-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp2month').show();
                $("input[name=exp2]").prop('required', true);
            }
        });
        $("#exp2-2").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp2month').hide();
                $("input[name=exp2]").prop('required', false);

            }
        });
        if ($("radio[id=exp2-2]").is(":Checked")) {
            $('#exp2month').hide();
            $("input[name=exp2]").prop('required', false);

        }


        // exp3mnth
        if($("radio[name=exp3]").is(":Checked")){
            $('#exp3mnth').show();
            //$("input[name=exp3]").prop('required', true);
        }

        $("#exp3-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp3mnth').show();
                $("input[name=exp3]").prop('required', true);
            }
        });
        $("#exp3-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp3]").prop('required', false);
                $('#exp3mnth').hide();
            }
        });

        // exp4mnth
        $("#exp4-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp4mnth').show();
                $("input[name=exp4]").prop('required', true);
            }
        });
        $("#exp4-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp4]").prop('required', false);
                $('#exp4mnth').hide();
            }
        });

        // exp5mnth
        $("#exp5-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp5mnth').show();
                $("input[name=exp5]").prop('required', true);
            }
        });
        $("#exp5-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp5]").prop('required', false);
                $('#exp5mnth').hide();
            }
        });

        // exp6mnth
        $("#exp6-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp6mnth').show();
                $("input[name=exp6]").prop('required', true);
            }
        });
        $("#exp6-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp6]").prop('required', false);
                $('#exp6mnth').hide();
            }
        });

        // exp7mnth
        $("#exp7-1").click(function () {
            if ($(this).is(":Checked")) {
                $('#exp7mnth').show();
                $('.kwnAdd').show();
                $("input[name=exp7]").prop('required', true);
                $("input[name=knownAddress]").prop('required', true);
            }
        });
        $("#exp7-2").click(function () {
            if ($(this).is(":Checked")) {
                $("input[name=exp7]").prop('required', false);
                $("input[name=knownAddress]").prop('required', false);
                $('#exp7mnth').hide();
                $('.kwnAdd').hide();
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

// phd
//         $("#phd-1").click(function(){
//             if($(this).is(":Checked")){
//                 $('#phdtotmrk').show();
//                 $('#phdobtmrk').show();
//                 $('#phdprecntmrk').show();
//                 $("input[name=phdTotMrk]").prop('required',true);
//                 $("input[name=phdObtMrk]").prop('required',true);
//                 $("input[name=phdPrecntMrk]").prop('required',true);
//             }
//         });
//         $("#phd-2").click(function(){
//             if($(this).is(":Checked")){
//                 $('#phdtotmrk').hide();
//                 $('#phdobtmrk').hide();
//                 $('#phdprecntmrk').hide();
//                 $("input[name=phdTotMrk]").prop('required',false);
//                 $("input[name=phdObtMrk]").prop('required',false);
//                 $("input[name=phdPrecntMrk]").prop('required',false);
//             }
//         });
//         $('#mastertotmrk').hide();
//         $('#masterobtmrk').hide();
//         $('#masterprecntmrk').hide();
//         $('#phdtotmrk').hide();
//         $('#phdobtmrk').hide();
//         $('#phdprecntmrk').hide();

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
        })

        // Start : Enable / Disable input for Edit
        $('#btnEdit').click(function(){
            $('#allowToUpdate').hide();
            $('#update').show();
            $("select[name=permantStat]").prop('disabled',false);
            $("select[name=currStat]").prop('disabled',false);
            $("select[name=permantDist]").prop('disabled',false);
            $("select[name=post]").prop('disabled',false);
            $("select[name=cat]").prop('disabled',false);
            $("select[name=workPlc]").prop('disabled',false);
            $("select[id=multiiDist]").prop('disabled',false);
            $("input[name=permantStat]").attr('disabled',false);
            $("input[name=currStat]").attr('disabled',false);
            $("input[name=permantDist]").attr('disabled',false);
            $("select[name=currDist]").attr('disabled',false);
            $("input[name=permantAdd]").attr('disabled',false);
            $("input[name=currAdd]").attr('disabled',false);
            $("input[name=permantPin]").attr('disabled',false);
            $("input[name=currPin]").attr('disabled',false);
            $("input[name=namHn]").attr('disabled',false);
            $("input[name=fatNam]").attr('disabled',false);
            $("input[name=fatNamHn]").attr('disabled',false);
            $("input[name=age]").attr('disabled',false);
            $("input[name=add]").attr('disabled',false);
            $("input[name=localAdd]").attr('disabled',false);
            $("input[name=graduTotMrk]").attr('disabled',false);
            $("input[name=graduObtMrk]").attr('disabled',false);
            $("input[name=graduPrecntMrk]").attr('disabled',false);
            $("input[name=minExp15]").prop('disabled',false);
            $("input[name=master]").prop('disabled',false);
            $("input[name=masterTotMrk]").attr('disabled',false);
            $("input[name=masterObtMrk]").attr('disabled',false);
            $("input[name=masterPrecntMrk]").attr('disabled',false);
            $("input[name=phd]").prop('disabled',false);
            $("input[name=phdTotMrk]").attr('disabled',false);
            $("input[name=phdObtMrk]").attr('disabled',false);
            $("input[name=phdPrecntMrk]").attr('disabled',false);
            $("input[name=exp2]").prop('disabled',false);
            $("input[name=exp3]").prop('disabled',false);
            $("input[name=exp4]").prop('disabled',false);
            $("input[name=exp5]").prop('disabled',false);
            $("input[name=exp6]").prop('disabled',false);
            $("input[name=exp7]").prop('disabled',false);
            $("input[name=exp2Month]").attr('disabled',false);
            $("input[name=exp3Mnth]").attr('disabled',false);
            $("input[name=exp4Mnth]").attr('disabled',false);
            $("input[name=exp5Mnth]").attr('disabled',false);
            $("input[name=exp6Mnth]").attr('disabled',false);
            $("input[name=exp7Mnth]").attr('disabled',false);
            $("input[name=expInMnth]").attr('disabled',false);
            $("input[name=courtNam]").attr('disabled',false);
            $("input[name=highCrtExp]").attr('disabled',false);
            $("input[name=ghosna1]").prop('disabled',false);
            $("input[name=ghosna2]").prop('disabled',false);
            $("input[name=ghosna3]").prop('disabled',false);
            $("input[name=ghosna4]").prop('disabled',false);
            $("input[name=ghosna5]").prop('disabled',false);
            $("input[name=ghosna6]").prop('disabled',false);
            $("input[name=exp1]").prop('disabled',false);
            $("input[name=minExp20]").prop('disabled',false);
            $("input[name=expp]").prop('disabled',false);
            $("input[name=highCrtJudge]").prop('disabled',false);
            $("input[name=knownAddress]").prop('disabled',false);

            $('.exp1_1').show();
            $('.kwnAdd').show();
            // $('#exp2month').show();
            $('#exp3mnth').show();
            $('#exp4mnth').show();
            $('#exp5mnth').show();
            $('#exp6mnth').show();
            $('#exp7mnth').show();
            $('#mastertotmrk').show();
            $('#masterobtmrk').show();
            $('#masterprecntmrk').show();
            $('#phdtotmrk').show();
            $('#phdobtmrk').show();
            $('#phdprecntmrk').show();
            $('#courtnam').show();
            $('#highcrtexp').show();
            $('.hcrt').show();

            // vacancy id 4
            var exp2_1 = $('#exp2-1').val();
            var exp2_2 = $('#exp2-2').val();

            var exp3_1 = $('#exp3-1').val();
            var exp3_2 = $('#exp3-2').val();

            var exp4_1 = $('#exp4-1').val();
            var exp4_2 = $('#exp4-2').val();

            var exp5_1 = $('#exp5-1').val();
            var exp5_2 = $('#exp5-2').val();

            var exp6_1 = $('#exp6-1').val();
            var exp6_2 = $('#exp6-2').val();

            var exp7_1 = $('#exp7-1').val();
            var exp7_2 = $('#exp7-2').val();

            if($('#exp2-1').is(":Checked")){
                $('#exp2Month').show();
            }else{
                $('#exp2Month').hide();
            }

            if($('#exp3-1').is(":Checked")){
                $('#exp3mnth').show();
            }else{
                $('#exp3mnth').hide();
            }

            if($('#exp4-1').is(":Checked")){
                $('#exp4mnth').show();
            }else if($('#exp4-2').is(":Checked")){
                $('#exp4mnth').hide();
            }

            if($('#exp5-1').is(":Checked")){
                $('#exp5mnth').show();
            }else{
                $('#exp5mnth').hide();
            }

            if($('#exp6-1').is(":Checked")){
                $('#exp6mnth').show();
            }else{
                $('#exp6mnth').hide();
            }

            if($('#exp7-1').is(":Checked")){
                $('#exp7mnth').show();
            }else{
                $('#exp7mnth').hide();
            }

        });
        // Ended : Enable / Disable input for Edit
    });
</script>
