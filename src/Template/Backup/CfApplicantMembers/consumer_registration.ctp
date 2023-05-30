<?php
use Cake\Routing\Router;
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

        alert(cap);
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
        margin-bottom: 30px;
    }
    }
    @media (min-width: 768px)
        .container, .container-md, .container-sm {
            max-width: 630px;
        }
        .container {
            width: 60%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
    /* .inpt{
        margin-top: -20px;
    } */
        .zxcf {
            display: inline-block;
            float: right;
            margin-top: 20px;
        }
        div#captcha {
            margin-top: 49px;
        }
        .succ {
            display: inline-block;
            color: limegreen;
            font-weight: 700;
            margin: 9px 0px 11px 18px;
            /* margin-right: 5px; */
        }
        label{
            margin-bottom: 0.5rem;
        }
        /*.card{*/
        /*    display:inline-block;*/
        /*    width:50%;*/
        /*    margin-left:22%;*/
        /*}*/
        /*for OTP*/
        span.otp {
            display: inline-block;
            float: right;
            margin-top: 52px;
            margin-right: 13px;
            color: forestgreen;
            font-weight: 700;
            cursor: pointer;
        }

</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark text-white">REGISTRATION</div>
            <?php echo $this->Form->create('seedUid',['url'=>['controller'=>'CfApplicantMembers', 'action'=>'consumerRegistration']]); ?>
            <div class="succ"><?php echo $this->Flash->render(); ?></div>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php
                                 $level = ['S' => 'State', 'D' => 'District'];
                                ?>
                                <label for="form"><b>Apply for District/State Level :</b></label>
                                <?php echo $this->Form->select('vaccGrp',$level, ['label'=>'', 'id'=>'state_district','class' => 'form-control  inpt','empty' => '-- Select Level --', 'required' => 'required','style'=>'margin-top: 12px;']); ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Apply For Post :</b></label>
                                <?php echo $this->Form->select('vaccId', $vacancy, ['label'=>'','id'=>'vaccId', 'class' => 'form-control  inpt', 'empty' => '-- Select Post --', 'required' => 'required','style'=>'margin-top: 12px;']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Name :</b></label>
                                <?php echo $this->Form->control('name', ['label'=>'', 'class' => 'form-control txtOnly  inpt','placeholder'=>'Enter Name']); ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" id="vac1_3">
                            <div class="form-group">
                                <label for="form"><b>DOB :</b></label>
                                <?php echo $this->Form->control('dob1', ['label'=>'','name'=>'dob1','id'=>'date1_3', 'class' => 'form-control date inpt','placeholder'=>'Enter DOB','readonly'=>'readonly']); ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" id="vac4" style="display:none;">
                            <div class="form-group">
                                <label for="form"><b>DOB :</b></label>
                                <?php echo $this->Form->control('dob4', ['label'=>'','name'=>'dob4','id'=>'date4', 'class' => 'form-control date inpt','placeholder'=>'Enter DOB','readonly'=>'readonly']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Email :</b></label>
                                <?php echo $this->Form->control('email', ['label'=>'','type'=>'email', 'class' => 'form-control  inpt','placeholder'=>'Enter Email']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Contact :</b></label>
                                <?php echo $this->Form->control('contact', ['label'=>'', 'class' => 'form-control numonly  inpt mobile','placeholder'=>'Enter Mobile No.','maxlength'=>'10','minlength'=>'10']); ?>
<!--                                <span class="otp getOtp">Get OTP</span>-->
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>OTP :</b></label>
                                <?php echo $this->Form->control('otp', ['label'=>'', 'class' => 'form-control inpt ','placeholder'=>'Enter OTP','maxlength'=>'6','minlength'=>'6','required'=>'required','disabled'=>'disabled']); ?>
<!--                                <span style="color:red">Otp is valid for 10 minutes only</span>-->
<!--                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 timmer">-->
<!--                                    <div class="form-group">-->
<!--                                        <label for="form"><b></b></label>-->
<!--                                        <span class="timer tim hid"> Otp is valid for : <span-->
<!--                                                id="countdowntimer">30</span> seconds only </span>-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <span class="otp getOtp btn btn-outline-success" id="gOtp">Get OTP</span>
                                <span class="otp getOtp btn btn-outline-success" id="rOtp">Resend OTP</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Gender :</b></label>
                                <?php echo $this->Form->select('genders',$genders, ['label'=>'', 'class' => 'form-control  inpt', 'empty' => '-- Select Gender --', 'required' => 'required','style'=>'margin-top: 12px;','id'=>'gend']); ?>
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
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="btnDeco">
                                <input type="hidden" name="tmp_vac_id" id="tmp_vac_id" />
                                <button type="submit" class="btn btn-outline-success getUid confirm" onclick="return validateCaptcha()">Register</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        createCaptcha();

        // register button disabled
        $('.getUid').hide();
        $('#state_district, #vaccId, #name, #email, #contact, #otp, #gend, #capt').blur(function(){
        // $('#capt,').blur(function(){
            var vaccGrp = $("#state_district").val();
            var vaccId = $("#vaccId").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var mobile = $("#contact").val();
            var otp = $("#otp").val();
            var gendr = $("#gend").val();
            var captcha = $("#capt").val();
            if( (vaccGrp == '') || (vaccId == '') || (name == '') || (email == '') || (mobile == '') || (otp == '') || (gendr == '') || (captcha == '') ){
                $('.getUid').hide();
            }else{
                $('.getUid').show();
            }
        });

        //otp disabled
        $('#gOtp').click(function(){
            // $('#otp').attr('disabled',false);
            $("input[name=otp]").attr('disabled',false);
        });

        //calender
        $('#date1_3').click(function(){
            $('#date4').val();
        });
        $('#date4').click(function(){
            $('#date1_3').val();
        });
        $('#vaccId').change(function(){
            var vacancy_id = $(this).val();
            if((vacancy_id == 1) || (vacancy_id == 3)){
                $('#vac1_3').show();
                $('#vac4').hide();
                $('#date4').attr('disabled', true);
            }else if(vacancy_id == 4){
                $('#vac1_3').hide();
                $('#vac4').show();
                $('#date1_3').attr('disabled', true);
            }else{
                $('#vac1_3').show();
                $('#vac4').hide();
                $('#date1_3').attr('disabled', false);
                $('#date4').attr('disabled', true);
            }

        });
        var disabledTool = new Date();
        disabledTool.setDate(disabledTool.getDate());
        disabledTool.setHours(0, 0, 0, 0);

        //if(vacancy_id == 1){
        //    var startDate = "<?php //echo date('Y', strtotime('-65 year'));?>//";
        //    var endDate = "<?php //echo date('Y', strtotime('-18 year'));?>//";
        //    year_range = startDate + ':' + endDate;
        //    alert(vacancy_id + "== " + year_range);
        //}else if(vacancy_id == 2){
        //    var startDate = "<?php //echo date('Y', strtotime('-65 year'));?>//";
        //    var endDate = "<?php //echo date('Y', strtotime('-30 year'));?>//";
        //    year_range = startDate + ':' + endDate;
        //}else if(vacancy_id == 3){
        //    var startDate = "<?php //echo date('Y', strtotime('-65 year'));?>//";
        //    var endDate = "<?php //echo date('Y', strtotime('-18 year'));?>//";
        //    year_range = startDate + ':' + endDate;
        //    alert(vacancy_id + "== " + year_range);
        //}else if(vacancy_id == 4){
        //    var startDate = "<?php //echo date('Y', strtotime('-65 year'));?>//";
        //    var endDate = "<?php //echo date('Y', strtotime('-35 year'));?>//";
        //    year_range = startDate + ':' + endDate;
        //    alert(vacancy_id + "== " + year_range);
        //}
        // var year_range = startDate + ':' + endDate;
        //alert(startDate + "==" + endDate);return false;
        //alert(year_range);

        var startDate1_3 = "<?php echo date('Y', strtotime('-65 year'));?>";
        var endDate1_3 = "<?php echo date('Y', strtotime('-18 year'));?>";
        var year_range1_3 = startDate1_3 + ':' + endDate1_3;

        var startDate4 = "<?php echo date('Y', strtotime('-65 year'));?>";
        var endDate4 = "<?php echo date('Y', strtotime('-35 year'));?>";
        var year_range4 = startDate4 + ':' + endDate4;

        $('#date1_3').datepicker({
            inline: true,
            language: "es",
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true,
            // minDate : startDate,
            // maxDate : endDate,
            //maxDate: new Date(),
            yearRange: year_range1_3,
            dateFormat: "yy-mm-dd",
            // defaultDate: "-216m",
            beforeShowDay: function (date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });
        $('#date4').datepicker({
            inline: true,
            language: "es",
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true,
            // minDate : startDate,
            // maxDate : endDate,
            //maxDate: new Date(),
            yearRange: year_range4,
            dateFormat: "yy-mm-dd",
            // defaultDate: "-216m",
            beforeShowDay: function (date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });

        // otp Generation
        $('#rOtp').hide();
        $('.getOtp').click(function () {
            var mobile = $("#contact").val();
            var name = $("#name").val();
            var email = $("#email").val();
            if(mobile == ''){
                alert('Mobile, Name and Email can not be empty.') return false;
            }
            else{
                var url = "<?php echo $this->Url->build(['controller' => 'CfApplicantMembers', 'action' => 'loginOtp']); ?>";
                var token = '<?php echo $this->getRequest()->getParam('_csrfToken'); ?>';
                $.ajax({
                    type: 'POST',
                    url: url,
                    // async: false,
                    async: true,
                    data: ({mobile: mobile, name: name, email: email}),
                    dataType: 'html',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('X-CSRF-Token', token);
                    },
                    success: function (response, textStatus) {
                        // alert(response);
                        var result = JSON.parse(response);
                        // alert (result);
                        // var otp = result['otp'];
                        var status = result['status'];
                        // if(otp != ){
                        if(status == 1){
                            $('#gOtp').hide();
                            $('#rOtp').show();
                        }else{
                            $('#gOtp').show();
                            $('#rOtp').hide();
                        }
                        // var mob = result['mobile'];
                        //var msg = result['message'];
                        //$("#otp").val(otp);
                        // $("#mskMbl").html(mob);
                        //$('#msg').val(msg);// ek span lelo jha msg dikhana hai
                    },
                    error: function (e) {
                        alert("An error occurred: " + e.responseText.message);
                        console.log(e);
                    }
                });
            }

        });



        // for OTP verification
        // $(".rsndDec").hide();
        // $(".getOtp").click(function () {
        //     var timeleft = 30;
        //     var downloadTimer = setInterval(function () {
        //         timeleft--;
        //         document.getElementById("countdowntimer").textContent = timeleft;
        //         if (timeleft <= 0)
        //             clearInterval(downloadTimer);
        //         if (timeleft <= 0) {
        //             $(".rsndDec").show();
        //             $(".hid").hide();
        //             $("#progressBar").hide();
        //             $(".sav").attr('disabled', 'disabled');
        //         } else {
        //             $(".rsndDec").hide();
        //             $(".hid").show();
        //             $("#progressBar").hide();
        //             $(".sav").removeAttr('disabled');
        //         }
        //     }, 1000);
        // });
    });

    $(document).ready(function () {
        // $('.getUid').click(function () {
        //     let uid = $(".").val();
        //     // alert(uid); return false;
        //     if(uid == ''){
        //         this('.uid').setAttribute('disabled', true);
        //     }
        // });
        $('#state_district').change(function(){ //alert("hi");return false;
            var url = "<?php echo $this->Url->build(['controller' => 'App', 'action' => 'getVacancyBasedOnStDist']);?>";
            var state_district_code = $(this).val();
            var token = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            //alert(url + " == " + token);return false;
            $.ajax({
                type: 'POST',
                url: url,
                async:true,
                data: ({code : state_district_code}),
                dataType:'html',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function(response, textStatus)
                {
                    $('#vaccId').empty();
                    var result = JSON.parse(response); //alert(result);return false;
                    $.each(result, function(val, text) {
                        $('#vaccId').append(
                            $('<option></option>').val(val).html(text)
                        );
                    });
                    $("select[id=vaccId]").prepend("<option value='' selected>-- Select Vacancy--</option>");
                },
                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });

    });
</script>
