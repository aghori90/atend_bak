
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

        /*.inpt {
            margin-top: -20px;
        }*/

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
        label{
            margin-bottom: 0.5rem;
        }
        .lgt > a{
            color: #ffffff;
            font-weight:bold;
        }
        .fieldClass{
            border: 2px solid #ff0000;
            padding: 5px;
            margin-top: 10px !important;
        }
        .fieldClass > legend{
            background-color: #ff0;
            color: #fff;
            padding:2px;
        }
        .printContain{
            margin:10px !important;
            float:right;
            /*margin-bottom:10px !important;*/
        }
</style>
<?php //echo "<pre>";print_r($data);die;
//$data = $data[0];
?>
<fieldset>
    <div class="printContain">
        <button class="btn btn-outline-primary btnDec" width="40px" height="40px" onclick="print_pdf('printtt')">Print</button>
    </div>
    <div class="container-fluid" id="printtt">
        <?php $sln = 1;
        foreach($applicantData as $key => $data){
            $regis_no = $data['registration_no'];?>
        <fieldset style="border: 2px solid #ccc;padding: 5px;margin-top: 65px !important;">
            <legend style="background-color: #00adff !important;color: #fff;padding:2px;"><?php echo 'जिला  में अध्यक्ष पद पर नियुक्ति हेतु (विज्ञापन संख्या -03/2021 )'; ?></legend>
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
                        <?php echo $this->Form->control('post', ['label' => '', 'class' => 'form-control inpt', 'value' => $vacancy[$data['vaccancy_id']], 'disabled' => 'disabled']); ?>
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
            <div class="container-fluid" >
                <div class="card-header bg-primary text-white">निवेदक विवरण : </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पद का नाम  :</b></label>
                            <!--                            --><?php //$wrkPlace = ['1'=>'अध्यक्ष,जिला आयोग'] ?>
                            <?php echo $this->Form->control('post', ['label' => '', 'class' => 'form-control', 'readonly' => 'readonly', 'value' => 'अध्यक्ष,जिला आयोग']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पद के विरुद्ध में जिला की प्राथमिकता (24 जिलों की प्राथमिकता क्रमानुसार अनिवार्य)  :</b></label>
                            <?php //$wrkPlace = ['1'=>'सदस्य', '2'=>'जिला आयोग'] ?>
                            <!--                            --><?php //echo $this->Form->select('multiiDist',$districts, ['label' => '','id'=>'multiDist', 'class' => 'form-control','multiple'=>'multiple']); ?>
                            <?php echo $this->Form->control('multiiDist', ['label' => '', 'class' => 'form-control','value'=>$data['district_priority_by_post'], 'readonly' => 'readonly']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>आवेदक का नाम (हिन्दी) :</b></label>
                            <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English', 'readonly' => 'readonly', 'value' => $data['name_hn']]); ?>
                            <!--<script language="javascript">
                                CreateCustomHindiTextBox("namHn", "<?php /*if(!empty($data['name_hn'])){ echo $data['name_hn']; }*/?>", "form-control txtOnly inpt", true);
                            </script>-->
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पिता का नाम (अंग्रेजी) :</b></label>
                            <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English', 'readonly' => 'readonly', 'value' => $data['fathername']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पिता का नाम (हिन्दी) :</b></label>
                            <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English', 'readonly' => 'readonly', 'value' => $data['fathername_hn']]); ?>

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>आयु (01 जुलाई 2021 को) :</b></label>
                            <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Age as on 01-July-2021', 'readonly' => 'readonly', 'value' => $data['age']]); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>श्रेणी :</b></label>
                            <?php $wrkPlace = ['GEN'=>'GEN', 'OBC'=>'OBC', 'ST'=>'ST', 'SC'=>'SC','OTHERS'=>'OTHERS']; ?>
                            <?php echo $this->Form->select('cat',$wrkPlace, ['label' => '', 'class' => 'form-control','empty' => '--श्रेणी चुने --', 'readonly' => 'readonly', 'value' => $data['catagory']]); ?>
                        </div>
                    </div>
                </div>
                <div class="card-header bg-primary text-white">पत्राचार :</div>
                <div class="addBox">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group boxAddrss">
                                <label for="form"><b>स्थायी राज्य :</b></label>
                                <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt', 'placeholder'=>'Enter Permanent State', 'readonly' => 'readonly','options'=>$state, 'value' => $data['permanent_state']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group boxAddrss">
                                <label for="form"><b>अस्थायी राज्य :</b></label>
                                <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control  inpt', 'placeholder'=>'Enter Current State', 'readonly' => 'readonly','options'=>$state, 'value' => $data['temporary_state']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी जिला :</b></label>
                                <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Permanent District','options'=>$cfPrmDistricts, 'readonly' => 'readonly', 'value' => $data['permanent_district']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी जिला :</b></label>
                                <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Current District', 'readonly' => 'readonly','options'=>$cfDistricts, 'value' => $data['temporary_district']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control ads inpt', 'placeholder'=>'Enter Permanent Address', 'readonly' => 'readonly', 'value' => $data['permanent_address']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control ads inpt', 'placeholder'=>'Enter Current Address ', 'readonly' => 'readonly', 'value' => $data['temporary_address']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी पिनकोड :</b></label>
                                <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode', 'readonly' => 'readonly', 'value' => $data['permanent_pincode']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी पिनकोड :</b></label>
                                <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode', 'readonly' => 'readonly', 'value' => $data['temporary_pincode']]); ?>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <?php echo $this->Form->radio('expp', $apprve, ['label' => '', 'class' => 'rad', 'readonly' => 'readonly', 'value' => $data['experience']]); ?>
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
                            <?php echo $this->Form->control('expInMnth', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Exp In Months', 'readonly' => 'readonly', 'value' => $data['experience_duration_month']]); ?>
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
                            <?php echo $this->Form->radio('ghosna1', $apprve, ['label' => '', 'class' => 'rad', 'readonly' => 'readonly', 'value' => $data['declaration_1']]); ?>
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
                            <?php echo $this->Form->radio('ghosna2', $apprve, ['label' => '', 'class' => 'rad', 'readonly' => 'readonly', 'value' => $data['declaration_2']]); ?>
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
                            <?php echo $this->Form->radio('ghosna3', $apprve, ['label' => '', 'class' => 'rad', 'readonly' => 'readonly', 'value' => $data['declaration_3']]); ?>
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
                            <?php echo $this->Form->radio('ghosna4', $apprve, ['label' => '', 'class' => 'rad', 'readonly' => 'readonly', 'value' => $data['declaration_4']]); ?>
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
                            <?php echo $this->Form->radio('ghosna5', $apprve, ['label' => '', 'class' => 'rad', 'readonly' => 'readonly', 'value' => $data['declaration_5']]); ?>
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
                            <?php echo $this->Form->radio('ghosna6', $apprve, ['label' => '', 'class' => 'rad', 'readonly' => 'readonly', 'value' => $data['declaration_6']]); ?>
                        </div>
                    </div>
                </div>
<!--            </div>-->
            <!-- UPloaded documents -->
            <div class="card-header bg-primary text-white">अपलोड दस्तावेज़ : </div>
            <div class="row">
                <?php
                $getCfDocs = $this->Document->getDocuments($regis_no);
                if(!empty($getCfDocs)){
                    $sl = 1;
                    foreach($getCfDocs as $docKey => $docVal){
                        $docLabel = $docVal['document_type_id'];
                        $explodeName = explode('.', $docVal['name']);
                        //echo "<pre>";print_r($explodeName);
                        $docType = $explodeName[1];
                        $cf_reg_no = $docVal['cf_registration_no'];
                        $docPath = CF_DOC_PATH.'/'.$cf_reg_no.'/';
                        $docId = $docVal['id'];
                        $docs = $docVal['document_path'].'/'.$docVal['name'];

                        ?>

                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b><?php if((strtoupper($docLabel) == 'PHOTO') || (strtoupper($docLabel) == 'SIGNATURE')) { echo strtoupper($docLabel);}else{ echo strtoupper($docLabel) ." CERTIFICATE";} ?></b></label>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <div class="form-group radee">
                                <?php
                                if(!empty($docVal['name']) || $docVal['name'] != ''){ ?>
                                    <img src="../webroot/img/corect.png" alt="" width="30px" height="30px">
                                <?php }else{ ?>
                                    <img src="../webroot/img/wrng.png" alt="" width="30px" height="30px">
                                <?php } ?>

                            </div>
                        </div>
                        <?php $sl++;
                    }
                }else{
                    echo "No Documents";
                }
                ?>
            </div>
        </fieldset>
            <p class="break" style="height: 0px; width: 1131px; margin-top: 20px; margin-bottom: 0px;">&nbsp;</p>
            <?php $sln++ ;
        } ?>
    </div>
</fieldset>

<script type="text/javascript">
    function print_pdf(divName,regis_no){
        jQuery("#printtt fieldset").each(function(){
            // var vqwer = document.getElementById(this).offsetHeight;
            jQuery('#printtt b,#printtt p').css("font-size","10px");
            jQuery('#printtt b,#printtt p').css("margin-top","140px");
            jQuery('.form-group, .form-control,#printtt label').css({"margin":"0","padding":"0"});
            jQuery('#printtt label').each(function(){
                if(jQuery(this).is(':empty')){
                    jQuery(this).remove();
                }
            });

            var vqwe = document.getElementsByTagName(this).offsetHeight;
            // alert(vqwe);
            // if(vqwe<1450){
            //     vadd = 1450 - vqwe;
            //     document.getElementsByTagName(this).style.height = vadd+"px";
            // }

            // var printContents = document.getElementsByTagName(this).innerHTML;
            // document.body.innerHTML += printContents;

        });
        window.print('');
        // document.getElementById(divName).style.fontSize = "xx-small";
        // var printContents = document.getElementById(divName).innerHTML;
        // document.body.innerHTML = printContents;
        // window.print('');
        // window.location.reload();
        // document.body.innerHTML = originalContents;
    }
</script>
