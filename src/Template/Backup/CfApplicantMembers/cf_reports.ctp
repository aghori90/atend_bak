<?php
//use Cake\Routing\Router;
echo $this->Html->css('bootstrap.min.css');
echo $this->Html->script('injection.js');
echo $this->Html->css("cf_jquery_ui");
echo $this->Html->css('jquery-ui.css');
echo $this->Html->script('jquery-3.4.0.min');
echo $this->Html->script('bootstrap.min');
echo $this->Html->script('jquery-ui');
?>
<script>
    function print_pdf(divName,regis_no){
        var printContents = document.getElementById(divName).innerHTML;
        document.title = regis_no;
        document.body.innerHTML = printContents;
        window.print('');
        window.location.reload();
        document.body.innerHTML = originalContents;
    }
</script>
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
        margin-top: -58px;
        margin-right: 25px;
        margin-bottom: 11px;
    }

    /*excdel image*/
    img.suk_st {
        display: inline-block;
        float: right;
        margin: 0px 2px 0px 0px;
        cursor: pointer;
        height: 48px;
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
        label{
            margin-bottom: 0.5rem;
        }
        .lgt > a{
            color: #ffffff;
            font-weight:bold;
        }
    /* print btn*/
        button.btn.btn-outline-primary.btnDec {
            display: inline-block;
            float: right;
            margin-bottom: 13px;
            margin-right: 14px;
        }
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="valid"><?php echo $this->Flash->render(); ?></div>
            <div class="card-header bg-primary text-white">Applied Applicant</div>
            <div class="container-fluid">
                <?php echo $this->Form->create('report', ['url' => ['controller' => 'CfApplicantMembers', 'action' => 'cfReports']]); ?>
                <div class="valid">
                    <?php echo $this->Flash->render(); ?>
                </div>
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>Select Vacancies :</b></label>
                            <?php /*$wrkPlace = ['1'=>'GEN', '2'=>'OBC', '3'=>'ST', '4'=>'SC'] */ ?>
                            <?php echo $this->Form->select('post', $vacancy, ['label' => '', 'id'=>'post','class' => 'form-control', 'empty' => '--Select Vacancies --', 'required' => 'required']); ?>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="form"><b>Report Type :</b></label>
                            <?php $wrkPlace = ['1' => 'All', '2' => 'Approve', '3' => 'Reject'] ?>
                            <?php echo $this->Form->select('report', $wrkPlace, ['label' => '', 'class' => 'form-control', 'empty' => '--Select Report --', 'required' => 'required']); ?>
                        </div>
                    </div>
<!--                </div>-->
<!--                <div class="row">-->
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12" style="margin-top: auto">
                        <div class="btnDeco">
                            <button type="submit" class="btn btn-outline-success" id="btnSaveVacancy">Search</button>
                        </div>
                    </div>
                </div>
                <!--            </div>-->
                <!--        </div>-->
                <?php echo $this->Form->end(); ?>
                <?php
                $regis_no = '';
                $all_regis_no = '';
                if ($this->request->is('post')){ ?>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div id="distlist">
                            <?php /*echo $this->Form->create('applicantDetails',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'applicantDetails']]); */ ?>
                            <td style="text-align:center;">
                            </td>
                            <table class="table table-bordered table-striped" id="pdfPrint">
                                <thead>
                                <tr style="background-color: #007bff;color: white; text-align:center;">
                                    <th>Sl No</th>
                                    <th>Registration No</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Mobile No</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (count($data) != 0) { ?>
                                    <?php $i = 1;
                                    foreach ($data as $Report) {
                                        //echo "<pre>";print_r($data);die;
                                        $regis_no = $Report['registration_no'];
                                        $all_regis_no .= $regis_no.',';
                                        ?>
                                        <tr style="text-align:center;">
                                            <td><?php echo $i++ ?></td>
                                            <td style="text-align:center;"><?php echo $Report['registration_no']; ?></td>
                                            <td><?php echo strtoupper($Report['name']); ?></td>
                                            <td><?php echo strtoupper($Report['fathername']); ?></td>
                                            <td><?php echo strtoupper($Report['mobile']); ?></td>
                                        </tr>
                                    <?php }
                                    echo $all_regis_no;
                                } else { ?>
                                    <tr>
                                        <td colspan="10" align="center">No Record Found</td>
                                    </tr>
                                <?php } ?>
                                </tbody>

                            </table>
                        </div>
                        <?php
                        if($post == 1){
                            $action = 'printAllApplicant';
                        }else if($post == 3){
                            $action = 'printAllApplicantVacancyThree';
                        }else if($post == 4){
                            $action = 'printAllApplicantVacancyFour';
                        }else{
                            $action = '';
                        }
                        echo $this->Form->create('frmPrint',['name'=>'frmPrint','url'=>['controller'=>'CfApplicantMembers','action'=>$action],'method'=>'post']);
                        echo $this->Form->hidden('all_registration_no',['name'=>'all_registration_no','value'=>$all_regis_no]);
                        echo $this->Form->hidden('vac',['name'=>'vac','value'=>$post]);
                        ?>
                        <button class="btn btn-outline-primary btnDec" width="40px" height="40px" type="submit">Print</button>
                        <?php echo  $this->Form->end();?>
                        <?php } ?>

                    </div>
                </div>
            </div>
    </div>
</div>
<script type="text/javascript">

    $(function(){
        var disabledTool = new Date();
        disabledTool.setDate(disabledTool.getDate());
        disabledTool.setHours(0, 0, 0, 0);

        var startDate = "<?php echo date('Y', strtotime('0 year'));?>";
        var endDate = "<?php echo date('Y', strtotime('-1 year'));?>";
        var year_range = startDate + ':' + endDate;

        $('#from_date').datepicker({
            inline: true,
            language: "es",
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true,
            maxDate: new Date(),
            yearRange: year_range,
            dateFormat: "yy-mm-dd",
             //defaultDate: "0m",
            beforeShowDay: function (date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });
        $('#to_date').datepicker({
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
</script>

