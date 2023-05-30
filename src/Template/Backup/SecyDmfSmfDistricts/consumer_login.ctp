<?php
//use Cake\Routing\Router;
echo $this->Html->script('injection.js');
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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
            width: 40%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .inpt{
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
        .invalid {
            text-align: center;
            font-weight: 600;
            color: red;
        }
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark text-white">LOGIN</div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'consumerLogin']]); ?>
            <div class="invalid">
                <?php echo $this->Flash->render(); ?>
            </div>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Registration No. :</b></label>
                                <?php echo $this->Form->control('regNo', ['label'=>'', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Registration No','maxlength'=>'10' ,'minlength'=>'10']); ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Date Of Birth :</b></label>
                                <?php echo $this->Form->control('dob', ['label'=>'', 'class' => 'form-control inpt', 'id'=>'date','Placeholder'=>'Enter DOB as Password']); ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="btnDeco">
                                <button type="submit" class="btn btn-outline-success">Login</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // createCaptcha();
    });
    // datepicker
    $(function(){
        var disabledTool = new Date();
        disabledTool.setDate(disabledTool.getDate());
        disabledTool.setHours(0, 0, 0, 0);

        var startDate = "<?php echo date('Y', strtotime('-70 year'));?>";
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
</script>
