<?php
//use Cake\Routing\Router;
echo $this->Html->script('injection.js');
echo $this->Html->css("cf_jquery_ui");
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<?php
echo $this->Html->script('cf_jquery_ui.js');
?>
<script>
    // creating captcha
    function createCaptcha() {
        //clear the contents of captcha div first
        document.getElementById('captcha').innerHTML = "";
        // alert('captcha');
        const charsArray = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
        const lengthOtp = 1;
        const captcha = [];
        for (var i = 0; i < lengthOtp; i++) {
            //below code will not allow Repetition of Characters
            const index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
            if (captcha.indexOf(charsArray[index]) == -1)
                captcha.push(charsArray[index]);
            else i--;
        }
        const canv = document.createElement("canvas");
        canv.id = "captcha";
        canv.width = 100;
        canv.height = 40;
        const ctx = canv.getContext("2d");
        ctx.font = "25px Georgia";
        ctx.strokeText(captcha.join(""), 0, 30);
        //storing captcha so that can validate you can save it somewhere else according to your specific requirements
        code = captcha.join("");
        document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
    }

    function validateCaptcha() {
        // event.preventDefault();
        if (document.getElementById("capt").value == code) {
            // alert("Valid Captcha");
            return true;
        } else {
            alert("Invalid Captcha.try Again");
            createCaptcha();
            return false;

        }
    }

    function validCapt() {
        // alert ('Aghori');
        const user = document.getElementById("username").value;
        const pswd = document.getElementById("password").value;
        const cap = document.getElementById("captchaInput").value;

        // alert(cap);
        return false;

        if (user == "") {
            alert("username Is Required.");
            return false;
            window.location.reload();
        }
        if (pswd == "") {
            alert("Password Is Required.");
            return false;
            window.location.reload();
        }
        if (cap == "") {
            alert("captcha Is Required.");
            return false;
            window.location.reload(true);
        }
        return true;
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
        label{
            margin-bottom: 0.5rem;
        }
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark text-white">LOGIN</div>
            <?php echo $this->Form->create('frmSrch',['url'=>['controller'=>'CfApplicantMembers', 'action'=>'consumerLogin']]); ?>
            <div class="invalid">
                <?php echo $this->Flash->render(); ?>
            </div>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Registration No. :</b></label>
                                <?php echo $this->Form->control('regNo', ['label'=>'', 'class' => 'form-control numonly inpt','placeholder'=>'Enter Registration No']); ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Date Of Birth :</b></label>
                                <?php echo $this->Form->control('dob', ['label'=>'', 'class' => 'form-control inpt', 'id'=>'date','Placeholder'=>'Enter DOB as Password','readonly'=>'readonly']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Captcha :</b></label>
                                <?php echo $this->Form->control('capt', ['label'=>'', 'class' => 'form-control  inpt','placeholder'=>'Enter Captcha']); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div id="captcha"></div>
                                <div class="zxcf">
                                    <img src="../img/refresh.png" alt="" onclick="return createCaptcha()"
                                         style="height: 50px; margin-top: -113px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="btnDeco">
                                <button type="submit" class="btn btn-outline-success" onclick="return validateCaptcha()" >Login</button>
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
        createCaptcha();
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
