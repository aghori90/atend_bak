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
        input#dat {
            display: initial;
        }
        small {
            color: red;
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
            <!--            --><?php //echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerDocuments']]); ?>
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
                                <?php echo $this->Form->control('dob', ['label' => '', 'class' => 'form-control inpt','disabled' => 'disabled', 'value' => $data['dob']]); ?>
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
                                <?php echo $this->Form->create('frmSrch',['type'=>'file','url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerDocuments']]); ?>
                    <div class="valid">
                        <?php echo $this->Flash->render(); ?>
                    </div>
                    <div class="container-fluid">
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
                                    <small>FileType: Pdf and size between 100-500kb</small>
                                </div>
                            </div>
                            <!--2-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>अपने द्वारा पारित सिविल केस के संबंध में दो नयायेदेशो की छायाप्रति :</b></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->file('civilCase',['label' => '', 'class' => 'form-control']); ?>
                                    <small>FileType: Pdf and size between 100-500kb</small>
                                </div>
                            </div>
                            <!--3-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>अपने द्वारा पारित क्रिमिनल  केस के संबंध में दो नयायेदेशो की छायाप्रति  :</b></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->file('crimnalCase',['label' => '', 'class' => 'form-control']); ?>
                                    <small>FileType: Pdf and size between 100-500kb</small>
                                </div>
                            </div>
                            <!--3-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>कार्यानुभव के पझ में प्रमाण /अभिलेख :</b></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->file('wrkExp',['label' => '', 'class' => 'form-control']); ?>
                                    <small>FileType: Pdf and size between 100-500kb</small>
                                </div>
                            </div>
                            <!--4-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>पिछले पाँच वर्षो का गोपनीय चरित्री :</b></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->file('confidentialDoc',['label' => '', 'class' => 'form-control']); ?>
                                    <small>FileType: Pdf and size between 100-500kb</small>
                                </div>
                            </div>
                            <?php if($data['other_exp'] == 1){ ?>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>यदि अन्य कोई विशेष कार्य अनुभव के सम्बन्ध में हा है तो विवरणी संलग्न करे :</b></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->file('otherDoc',['label' => '', 'class' => 'form-control']); ?>
                                    <small>FileType: Pdf and size between 100-500kb</small>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>अपलोड फोटो  :</b></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->file('photo',['label' => '', 'class' => 'form-control']); ?>
                                    <small>FileType: Jpeg and size between 100-200kb</small>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>अपलोड हस्ताक्षर :</b></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <?php echo $this->Form->file('signature',['label' => '', 'class' => 'form-control']); ?>
                                    <small>FileType: jpeg and size between 100-200kb</small>
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
                                    <?php $today = date('Y-m-d H:i:s') ?>
                                    <?php echo $this->Form->control('dat', ['label' => '', 'class' => 'form-control  datt', 'value'=>$today]); ?>
                                </div>
                            </div>
                        </div>
                        </div>
<!--                    <div>-->
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="btnDeco">
                                <!-- <button type="submit" class="btn btn-outline-success">Save & Next</button>-->
                                <button type="submit" class="btn btn-outline-success sav">Save</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $this->Form->hidden('vacId',['name'=>'vacancyId','value'=>$sessionVacId]);
                    // echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code']);
                    echo $this->Form->end(); ?>
                </fieldset>
            </div>
        </div>
        <?php } ?>
                <?php if ($sessionVacId == 2){ ?>
                    <?php echo $this->Form->create('member2',['type'=>'file','url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerDocuments']]); ?>
<!--        <div class="valid">--><?php //echo $this->Flash->render(); ?><!--</div>-->
        <div class="container-fluid">
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
                        <small>FileType: Pdf and size between 100-500kb</small>
                    </div>
                </div>
                <!--2-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>स्नातक प्रमाण-पत्र :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo $this->Form->file('graduate',['label' => '', 'class' => 'form-control']); ?>
                        <small>FileType: Pdf and size between 100-500kb</small>
                    </div>
                </div>
                <!--3-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>स्नातक अंक-पत्र :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo $this->Form->file('graduateMarks',['label' => '', 'class' => 'form-control']); ?>
                        <small>FileType: Pdf and size between 100-500kb</small>
                    </div>
                </div>
                <!--3-->
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>यदि स्नातकोतर (परास्नातक ) हो तो प्रामण -पत्र   :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo $this->Form->file('pg',['label' => '', 'class' => 'form-control']); ?>
                        <small>FileType: Pdf and size between 100-500kb</small>
                    </div>
                </div>
                <!--4-->
                <?php if($data['master_degree'] == 1){ ?>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>यदि स्नातकोतर (परास्नातक ) हो तो अंक-पत्र :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo $this->Form->file('pgMarks',['label' => '', 'class' => 'form-control']); ?>
                        <small>FileType: Pdf and size between 100-500kb</small>
                    </div>
                </div>
                <?php } ?>
                <?php if($data['phd_degree'] == 1){ ?>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>यदि Ph.D हो तो प्रामण-पत्र :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo $this->Form->file('phd',['label' => '', 'class' => 'form-control']); ?>
                        <small>FileType: Pdf and size between 100-500kb</small>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>यदि Ph.D हो तो अंक-पत्र :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo $this->Form->file('phdMarks',['label' => '', 'class' => 'form-control']); ?>
                        <small>FileType: Pdf and size between 100-500kb</small>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>कार्यानुभव  के पक्ष में प्रमाण /अभिलेख :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo $this->Form->file('expCertificate',['label' => '', 'class' => 'form-control']); ?>
                        <small>FileType: Pdf and size between 100-500kb</small>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>अपलोड फोटो  :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo $this->Form->file('photo',['label' => '', 'class' => 'form-control']); ?>
                        <small>FileType: jpeg and size between 100-200kb</small>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="form"><b>अपलोड हस्ताक्षर :</b></label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo $this->Form->file('signature',['label' => '', 'class' => 'form-control']); ?>
                        <small>FileType: jpeg and size between 100-200kb</small>
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
                        <?php $today = date('Y-m-d H:i:s') ?>
                        <?php echo $this->Form->control('dat', ['label' => '', 'class' => 'form-control ', 'value'=>$today]); ?>
                    </div>
                </div>
            </div>
        </div>
            <!--Submit-->
            <div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="btnDeco">
<!--                        <button type="submit" class="btn btn-outline-success">Save & Next</button>-->
                        <button type="submit" class="btn btn-outline-success sav">Save</button>
                    </div>
                </div>
            </div>
            <?php
             echo $this->Form->hidden('vacId',['name'=>'vacancyId','value'=>$sessionVacId]);
//            echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code']);
            echo $this->Form->end(); ?>
        </div>
    </div>
    <?php } ?>
                <?php if ($sessionVacId == 3){ ?>
                <?php echo $this->Form->create('member2',['type'=>'file','url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerDocuments']]); ?>
                <!--        <div class="valid">--><?php //echo $this->Flash->render(); ?><!--</div>-->
                <div class="container-fluid">
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
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <!--2-->

                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अपने द्वारा पारित सिविल केस के संबंध में दो न्यायदेशो की छायाप्रति :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('civilCase',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अपने द्वारा पारित क्रिमिनल केस के संबंध में दो न्यायदेशो की छायाप्रति :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('crimnalCase',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>कार्यानुभव  के पक्ष में प्रमाण /अभिलेख :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('expCertificate',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>पिछले पांच वर्षों का गोपनीय चारित्री :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('confidentialCerti',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अपलोड फोटो  :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('photo',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: jpeg and size between 100-200kb</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अपलोड हस्ताक्षर :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('signature',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: jpeg and size between 100-200kb</small>
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
                                <?php $today = date('Y-m-d H:i:s') ?>
                                <?php echo $this->Form->control('dat', ['label' => '', 'class' => 'form-control ', 'value'=>$today]); ?>
                            </div>
                        </div>
                    </div>
                    <!--Submit-->
                    <div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="btnDeco">
                                <!--                        <button type="submit" class="btn btn-outline-success">Save & Next</button>-->
                                <button type="submit" class="btn btn-outline-success sav">Save</button>
                            </div>
                        </div>
                    </div>
<!--                </div>-->
</div>
<?php } ?>
                <?php if ($sessionVacId == 4) { ?>
                <?php echo $this->Form->create('member2',['type'=>'file','url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerDocuments']]); ?>
                <!--        <div class="valid">--><?php //echo $this->Flash->render(); ?><!--</div>-->
                <div class="container-fluid">
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
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <!--2-->
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्नातक प्रमाण-पत्र :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('graduate',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <!--3-->
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>स्नातक अंक-पत्र :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('graduateMarks',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <!--3-->
                        <?php if($data['master_degree'] == 1){ ?>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>यदि स्नातकोतर (परास्नातक ) हो तो प्रामण -पत्र   :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('pg',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <!--4-->
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>यदि स्नातकोतर (परास्नातक ) हो तो अंक-पत्र :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('pgMarks',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($data['phd_degree'] == 1){ ?>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>यदि Ph.D हो तो प्रामण-पत्र :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('phd',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>यदि Ph.D हो तो अंक-पत्र :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('phdMarks',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>कार्यानुभव  के पक्ष में प्रमाण /अभिलेख :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('expCertificate',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: Pdf and size between 100-500kb</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अपलोड फोटो  :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('photo',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: jpeg and size between 100-200kb</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>अपलोड हस्ताक्षर :</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo $this->Form->file('signature',['label' => '', 'class' => 'form-control']); ?>
                                <small>FileType: jpeg and size between 100-200kb</small>
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
                                <?php $today = date('Y-m-d H:i:s') ?>
                                <?php echo $this->Form->control('dat', ['label' => '', 'class' => 'form-control ', 'value'=>$today]); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Submit-->
                <div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="btnDeco">
                            <!--                        <button type="submit" class="btn btn-outline-success">Save & Next</button>-->
                            <button type="submit" class="btn btn-outline-success sav">Save</button>
                        </div>
                    </div>
                </div>


                <?php
                echo $this->Form->hidden('vacId',['name'=>'vacancyId','value'=>$sessionVacId]);
//            echo $this->Form->hidden('rgi_dist_code',['name'=>'rgi_dist_code','id'=>'rgi_dist_code']);
                echo $this->Form->end(); ?>
                </div>
                </div>
            <?php } ?>
    </div>
</div>
<script type="text/javascript">
    // for date
    $(function(){
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
            // defaultDate: "1m",
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

        $('.sav').hide();
        // hide and show on checkbox
        $('input[type="checkbox"]').click(function(){
            if ($(this).is(":Checked")) {
                $('.sav').show();
            }else{
                $('.sav').hide();
            }
        });
    });
</script>
