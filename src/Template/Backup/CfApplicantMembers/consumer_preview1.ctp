<?php
//use Cake\Routing\Router;
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
        .form-group.boxAddrss {
            margin-top: 50px;
        }
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <?php
                if($sessionVacId == 1){ echo 'Form I'; }
                if($sessionVacId == 2){ echo 'राज्य आयोग में सदस्य पद'; }
                if($sessionVacId == 3){ echo 'Form III'; }
                if($sessionVacId == 4){ echo 'Form IV'; }

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
                                <?php echo $this->Form->control('contact', ['label' => '', 'class' => 'form-control inpt', 'disabled' => 'disabled', 'value' => $data['mobile']]); ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($sessionVacId == 1){ ?>
                    <div class="card-header bg-dark text-white">Form I</div>
                    <!--            --><?php //echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerForms']]); ?>
                    <div class="valid">
                        <?php echo $this->Flash->render(); ?>
                    </div>
                    <div class="container-fluid">
                        <!--                    <fieldset>-->
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Registration No. :</b></label>
                                    <?php echo $this->Form->control('regNo', ['label' => '', 'class' => 'form-control numonly inpt']); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Post Applied For:</b></label>
                                    <?php echo $this->Form->control('post', ['label' => '', 'class' => 'form-control inpt']); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Name :</b></label>
                                    <?php echo $this->Form->control('name', ['label' => '', 'class' => 'form-control numonly inpt']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Date Of Birth :</b></label>
                                    <?php echo $this->Form->control('dob', ['label' => '', 'class' => 'form-control inpt', 'id' => 'date']); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Email :</b></label>
                                    <?php echo $this->Form->control('email', ['label' => '', 'class' => 'form-control numonly inpt']); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Gender :</b></label>
                                    <?php echo $this->Form->control('gender', ['label' => '', 'class' => 'form-control inpt']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Contact :</b></label>
                                    <?php echo $this->Form->control('contact', ['label' => '', 'class' => 'form-control inpt']); ?>
                                </div>
                            </div>
                        </div>
                </fieldset>
                <!--                --><?php //echo $this->Form->end(); ?>
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
                        <!--                        --><?php //$wrkPlace = ['Judicial'=>'न्यायिक ', 'Non-Judicial'=>'गैर न्यायिक'] ?>
                        <?php $wrkPlace = ['1' => 'न्यायिक ', '2' => 'गैर न्यायिक'] ?>
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
                        <?php echo $this->Form->control('age', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Age ']); ?>
                    </div>
                </div>
            </div>
            <div class="card-header bg-primary text-white">Address</div>
            <div class="addBox">
                <div class="row">
                    <!--                    <div class="addressHeader">-->
                    <!--                        <span>Permanent Address</span>-->
                    <!--                        <span>-->
                    <!--                            --><?php //echo $this->Form->checkbox('sameAsPereAdd', ['label' => '', 'class' => 'sameAsPereAdd']); ?>
                    <!--                            Current Address-->
                    <!--                        </span>-->
                    <!--                    </div>-->
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>स्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('permantStat', ['label' => '', 'class' => 'form-control  inpt', 'placeholder'=>'Enter Permanent State ']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group boxAddrss">
                            <label for="form"><b>अस्थायी राज्य :</b></label>
                            <?php echo $this->Form->control('currStat', ['label' => '', 'class' => 'form-control  inpt', 'placeholder'=>'Enter Current State ']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>स्थायी जिला :</b></label>
                            <?php echo $this->Form->control('permantDist', ['label' => '', 'class' => 'form-control inpt', 'placeholder'=>'Enter Permanent District']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी जिला :</b></label>
                            <?php echo $this->Form->control('currDist', ['label' => '', 'class' => 'form-control inpt', 'placeholder'=>'Enter Current District ']); ?>
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
                            <?php echo $this->Form->control('permantPin', ['label' => '', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Permanent Pincode ']); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>अस्थायी पिनकोड :</b></label>
                            <?php echo $this->Form->control('currPin', ['label' => '', 'class' => 'form-control numonly inpt', 'placeholder'=>'Enter Current Pincode']); ?>
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
        <!--Document Upload-->
        <div class="card-header bg-primary text-white">अपलोड दस्तावेज़ :</div>
        <div class="row">
            <!--1-->
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>मैट्रिक प्रमाण-पत्र / जन्म तिथि प्रमाण पत्र :</b></label>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->file('matric',['label' => '', 'class' => 'form-control']); ?>
                </div>
            </div>
            <!--2-->
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>अपने द्वारा पारित सिविल केस के संबंध में दो नयाय्देशों की छायाप्रति  :</b></label>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->file('civilCase',['label' => '', 'class' => 'form-control']); ?>
                </div>
            </div>
            <!--3-->
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>अपने द्वारा पारित सिविल केस के संबंध में दो नयाय्देशों की छायाप्रति  :</b></label>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->file('crimnalCase',['label' => '', 'class' => 'form-control']); ?>
                </div>
            </div>
            <!--3-->
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>कार्यानुभव के पक्ष में प्रमाण अभिलेख :</b></label>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->file('wrkExp',['label' => '', 'class' => 'form-control']); ?>
                </div>
            </div>
            <!--4-->
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>पिछले पांच वर्षों का गोपनीय चारीत्री :</b></label>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->file('confidentialDoc',['label' => '', 'class' => 'form-control']); ?>
                </div>
            </div>
            <!--5-->
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>Photo :</b></label>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->file('pic',['label' => '', 'class' => 'form-control']); ?>
                </div>
            </div>
            <!--6-->
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>Sinature :</b></label>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->file('sign',['label' => '', 'class' => 'form-control']); ?>
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
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form">
                        <?php echo $this->Form->checkbox('finGhosna', ['label' => '', 'class' => 'finGhsna']); ?>
                        मैं यह घोषित करता हूँ / करती हूँ कि मेरे द्वारा दी गई सभी सूचना मेरे संज्ञान से सत्य एवं पूर्ण सही हैं | अगर दी गयी सूचना गलत अथवा असत्य पाया जाता है तो कभी  भी मेरी उम्मीदवारी /नियुक्ति को रद कर फि जा सकती है एवं मेरे ऊपर कानूनी करवाई की जा सकती है |
                    </label>
                </div>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>Place</b></label>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->control('plce', ['label' => '', 'class' => 'form-control pldt txtOnly', 'placeholder'=>'Enter Place']); ?>
                </div>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="form"><b>Date</b></label>
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                <div class="form-group">
                    <?php echo $this->Form->control('dat', ['label' => '', 'class' => 'form-control ','id'=>'date', 'placeholder'=>'--Select Date--']); ?>
                </div>
            </div>
        </div>
    </div>
    <!--Submit-->
    <div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="btnDeco">
                <!--                        <button type="submit" class="btn btn-outline-success">Save & Next</button>-->
                <button type="" class="btn btn-outline-success">Edit</button>
            </div>
        </div>
    </div>
        <!--Submit-->
        <div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="btnDeco">
                    <button type="submit" class="btn btn-outline-success">Final Submit</button>
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
    <div class="card-header bg-primary text-white">Form III</div>
    <div class="container-fluid">
        <div class="row">

        </div>
    </div>
</div>
<?php } ?>
<?php if ($sessionVacId == 4) { ?>
    <div class="card-header bg-primary text-white">Form IV</div>
    <div class="container-fluid">
        <div class="row">

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
        setTimeout(function () {
            $("#success").hide('blind', {}, 500)
        }, 300);

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
                $("input[name=exp2]").prop('required', false);
                $('#exp2month').hide();
            }
        });

        // exp3mnth
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


    });
</script>
