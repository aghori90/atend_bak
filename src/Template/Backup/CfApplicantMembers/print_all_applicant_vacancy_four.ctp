<link href="../main.css" rel="stylesheet" type="text/css" media="print" />
<style type="text/css">
    .single_record{
        page-break-after: always;
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
        .printContainer{
            margin:10px !important;
            float:right;
            /*margin-bottom:10px !important;*/
        }
</style>
<?php //echo "<pre>";print_r($data);die;
//$data = $data[0];
?>
<fieldset>
    <div class="printContainer">
        <button class="btn btn-outline-primary btnDec" width="40px" height="40px" onclick="print_pdf('print')">Print</button>
    </div>
    <div class="container-fluid single_record" id="printtt">
        <?php $sln = 1;foreach($applicantData as $key => $data){
            $regis_no = $data['registration_no'];?>
            <fieldset style="border: 2px solid #ccc;padding: 5px;margin-top: 65px !important;">
                <legend style="background-color: #00adff !important;color: #fff;padding:2px;"><?php echo 'जिला  आयोग में सदस्य  पद पर नियुक्ति हेतु (विज्ञापन संख्या -04/2021 )'; ?></legend>
<!--            <legend>--><?php //echo $data['name'].' - '.$data['registration_no'].' ('.$sln.')'; ?><!--</legend>-->
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
            <div class="container-fluid" id="print">
                <div class="card-header bg-primary text-white">निवेदक विवरण : </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पद का नाम  :</b></label>
                            <!--                                    --><?php //$wrkPlace = ['1'=>'अध्यक्ष,जिला आयोग'] ?>
                            <?php echo $this->Form->control('post',['label' => '', 'class' => 'form-control','value' => 'सदस्य, जिला आयोग','disabled'=>'disabled']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>पद के विरुद्ध में जिला की प्राथमिकता (24 जिलों की प्राथमिकता क्रमानुसार अनिवार्य)  :</b></label>
                            <?php echo $this->Form->control('multiiDist', ['label' => '', 'disabled' => 'disabled', 'class' => 'form-control ','value'=>$data['district_priority_by_post']]); ?>
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
                            <?php //echo $this->Form->control('namHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in Hindi', 'disabled' => 'disabled', 'value' => $data['name_hn']]); ?>
                            <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English', 'disabled' => 'disabled', 'value' => $data['name_hn']]); ?>
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
                            <?php //echo $this->Form->control('fatNamHn', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name In Hindi', 'disabled' => 'disabled', 'value' => $data['fathername_hn']]); ?>
                            <?php echo $this->Form->control('fatNam', ['label' => '', 'class' => 'form-control txtOnly inpt', 'placeholder'=>'Enter Name in English', 'disabled' => 'disabled', 'value' => $data['fathername_hn']]); ?>
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
                                <?php
                                $prmtateCode = $data['permanent_district'];
                                $cfDistricts = $this->Document->getCfDistrictsBasedOnState($prmtateCode);
                                echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt', 'empty'=>'Enter Permanent District','options'=>$cfPrmDistricts, 'disabled' => 'disabled', 'value' => $data['permanent_district']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी जिला :</b></label>
                                <?php
                                $tempStateCode = $data['temporary_district'];
                                $cfDistricts = $this->Document->getCfDistrictsBasedOnState($tempStateCode);
                                echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control ads inpt', 'empty'=>'Enter Current District', 'disabled' => 'disabled','options'=>$cfDistricts, 'value' => $data['temporary_district']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('permantAdd', ['label' => '', 'class' => 'form-control ads inpt', 'placeholder'=>'Enter Permanent Address', 'disabled' => 'disabled', 'value' => $data['permanent_address']]); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अस्थायी पत्राचार का पता :</b></label>
                                <?php echo $this->Form->control('currAdd', ['label' => '', 'class' => 'form-control ads inpt', 'placeholder'=>'Enter Current Address ', 'disabled' => 'disabled', 'value' => $data['temporary_address']]); ?>
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
        <?php $sln++ ;} ?>
    </div>
</fieldset>

<script type="text/javascript">
    function print_pdf(divName,regis_no){
        jQuery("#printtt fieldset").each(function(){
            // var vqwer = document.getElementById(this).offsetHeight;
            jQuery('#printtt b,#printtt p').css("font-size","10px");
            jQuery('#printtt b,#printtt p').css("margin-top","700%");
            jQuery('.form-group, .form-control,#printtt label').css({"margin":"0","padding":"0"});
            jQuery('#printtt label').each(function(){
                if(jQuery(this).is(':empty')){
                    jQuery(this).remove();
                }
            });

            var vqwe = document.getElementsByTagName(this).offsetHeight;
        });
        window.print('');
    }
    // function print_pdf(divName,regis_no){
    //     var printContents = document.getElementById(divName).innerHTML;
    //     //document.title = regis_no;
    //     document.body.innerHTML = printContents;
    //     window.print('');
    //     window.location.reload();
    //     document.body.innerHTML = originalContents;
    // }
</script>
