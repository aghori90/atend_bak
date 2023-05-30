<?php echo $this->Html->script('sha1'); ?>

<!--<script src='https://www.jqueryscript.net/demo/Easy-jQuery-Progress-Bar-Timer-Plugin-For-Bootstrap-3-progressTimer/js/jquery.progressTimer.js'></script>-->

<script type="text/javascript">
    function pass() {
        const random_no = Math.floor(Math.random() * 90000) + 10000;
        const pass1 = sha1(document.getElementById("password").value);
        document.getElementById("password").value = sha1(pass1 + random_no);
        document.getElementById("random").value = random_no;
    }

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
        if (document.getElementById("cpatchaTextBox").value == code) {
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
    .b-bg-image {
        /* background-image: url(<?php //echo $this->getRequest()->webroot;?>webroot/img/dc1.gif) !important; */
        background-image: url(<?php echo $this->getRequest()->webroot;?>webroot/img/servers.jpg) !important;
        /* background-image: url(<?php echo $this->getRequest()->webroot;?>webroot/img/dcenter.gif) !important; */
    }

    #captcha {
        background-color: #ffffff;
        padding: 0px 0px 3px 12px;
        /* padding-left: 22px; */
        border-radius: 5px;
        width: 93%;
        text-align: center;
        padding: 0px 11px 0px 11px;
        margin: 0px 70px -5px 0px;
        /*background-color: blue;*/
    }

    div#captcha {
        display: inline-block;
        width: 30%;
        float: right;
        margin-bottom: 16px;
        margin-left: -190px;
        margin-top: -53px;
        /*background-color: blue;*/
    }

    .bxDeco {
        margin-top: -20px;
    }

    .refIcon {
        display: inline-block;
        float: right;
        margin: 7px -22px 3px 0px;
    }

    .capRef {
        float: right;
        margin-top: 3px;
    }

    span.rsndDec {
        float: right;
        margin: -32px 13px 0px 3px;
        font-weight: 700;
        color: #e3a00a;
        cursor: pointer;
    }

    /*#progressBar {*/
    /*    width: 100%;*/
    /*    margin: 10px auto;*/
    /*    height: 3px;*/
    /*    background-color: #ececee;*/
    /*    border-radius: 15px;*/
    /*    overflow: hidden;*/
    /*}*/

    /*#progressBar div {*/
    /*    height: 100%;*/
    /*    text-align: right;*/
    /*    padding: 0; !* remove padding *!*/
    /*    line-height: 22px;*/
    /*    width: 0;*/
    /*    background-color: #7ac843;*/
    /*    box-sizing: border-box;*/
    /*    overflow: visible;*/
    /*}*/

    #progressTimer {
        width: 473px;
        height: 5px;
        margin-top: 15px;
        margin-left: -12px;
    }
    .progress {
        display: -ms-flexbox;
        display: flex;
        height: 0.2rem;
        overflow: hidden;
        font-size: .75rem;
        background-color: #e9ecef;
        border-radius: .25rem;
        /* color: red; */
    }

    .cpt {
        display: inline-block;
        margin-top: 10px;
        margin-left: 2px;
        padding: 0px 5px 0px 5px;
    }
    a {
        color: #fff;
        text-decoration: none;
        background-color: transparent;
        font-size: 100%;
        font-weight: bolder;
    }

</style>

<div class="b-bg-image py-5" style="padding-bottom: 200px!important;">
    <div class="container">
        <div class="row">
<!--            <div class="col-lg-6 d-flex b-heading-sec">-->
<!--                <div class="align-self-center pr-5 b-head-in">-->
<!--                    <h1 class="text-right mt-5 b-left-head" align="center">Workspace</h1>-->
<!--                </div>-->
<!--            </div>-->
            <div class="col-lg-6 b-login-sec" style="margin: 0% 35%;">
                <div class="d-block px-5 pt-5 pb-4 border-bottom-0">
                    <button class="btn btn-warning" style="float: right;">
                        <?php echo $this->Html->link(__('Registration', ['class' => 'nav-item nav-link sr-only']), ['controller' => 'Users', 'action' => 'registration']); ?>
                    </button>
                    <h2 class="b-login-head">Log In</h2>

                </div>
                <div class="">
                    <?php echo $this->Form->create('login', ['id' => 'loginFrm', 'autocomplete' => 'off', 'class' => 'px-5']); ?>
                    <div class="form-group ">
                        <label for="username" class="text-white">Employee Id:</label>
                        <?php echo $this->Form->control('username', ['label' => '', 'id' => 'username', 'value' => '', 'class' => 'form-control bxDeco','placeholder'=>'Employee Id']); ?>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password:</label>
                        <?php echo $this->Form->control('password', ['label' => '', 'id' => 'password', 'placeholder' => 'Enter Password', 'class' => 'form-control bxDeco', 'size' => 40, 'onBlur' => 'return pass();', 'onfocus' => 'this.setAttribute("type","password")', 'autocomplete'=>'off']); ?>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label for="auth" class="text-white">Verification Mode:</label>-->
<!--                        --><?php //$autTyp = ['' => '--Select Verification Mode--', '1' => 'OTP', '2' => 'APP'] ?>
<!--                        --><?php //= $this->Form->select('authType', $autTyp, ['label' => '', 'type' => 'text', 'placeholder' => 'select Verification Mode ', 'class' => 'form-control auth']) ?>
<!--                    </div>-->
                    <div class="capInput">
                        <div class="form-group">
                            <label for="auth" class="text-white">Captcha:</label>
                            <?= $this->Form->control('captchaInput', ['label' => '', 'type' => 'text', 'placeholder' => 'Enter Captcha', 'id' => 'cpatchaTextBox', 'onchange' => 'validateCaptcha()', 'maxlength' => '6', 'class' => 'form-control cpt', 'style' => 'width: 160px;']) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control" id="captcha"></div>
                    </div>

                    <div class="refIcon">
                        <img src="../img/refresh.png" alt="" onclick="return createCaptcha()"
                             style="height: 50px; margin-top: -113px;">
                    </div>
                    <div class="text-center py-4">
                        <?php echo $this->Form->button('Verify', ['label' => '', 'class' => 'btn btn-primary b-btn appVerify', 'onclick' => 'return validateCaptcha();', 'type'=>'button']); ?>
                        <?php echo $this->Form->button('Yes', ['label' => '', 'class' => 'btn btn-outline-success appYes', 'type'=>'button']); ?>

<!--                        <div id="progressTimer"></div>-->
                        <!-- Trigger the modal with a button -->
<!--                        <span class="btt btn btn-outline-info getOtp" data-toggle="modal"-->
<!--                              data-target="#myModal" onclick=" return validateCaptcha()">Get OTP-->
<!--                        </span>-->
                        <!-- Modal -->
<!--                        <div id="myModal" class="modal fade" role="dialog">-->
<!--                            <div class="modal-dialog">-->
                                <!-- Modal content-->
<!--                                <div class="modal-content">-->
<!--                                    <div class="modal-header">-->
                                        <!-- <button type="button" class="close" data-dismiss="modal">&times; </button> -->
<!--                                        <h4 class="modal-title ">OTP</h4>-->
<!--                                    </div>-->
<!--                                    <div class="modal-body">-->
<!--                                        <span>Otp has been sent to your registered mobile:</span>-->
<!--                                        <strong style="color: #3e8e41" id="mskMbl"></strong>-->
<!--                                        --><?php //echo $this->Form->control('otp', ['label' => '', 'class' => 'form-control txtOnly otp', 'placeholder' => 'Enter OTP']); ?>
                                        <!--OTP Resend-->
<!--                                        <span class="rsndDec getOtp">Resend OTP</span>-->
                                        <!--OTP Timer-->
<!--                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 timmer">-->
<!--                                            <div class="form-group">-->
<!--                                                <label for="form"><b></b></label>-->
<!--                                                <span class="timer tim hid"> Otp is valid for : <span-->
<!--                                                        id="countdowntimer">30</span> seconds only </span>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="modal-footer">-->
<!--                                        <button type="button" class="btt btn btn-outline-info" data-dismiss="modal">-->
<!--                                            Close-->
<!--                                        </button>-->
<!--                                        --><?php //echo $this->Form->button('submit', ['label' => '', 'class' => 'btn btn-outline-success sav']); ?>
                                        <!--                                        --><?php //echo $this->Form->hidden('otp') ?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <?= $this->Form->hidden('random', array('id' => 'random')); ?>
                        <?php echo $this->Form->button('submit', ['label' => '', 'class' => 'btn btn-dark sav']); ?>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        createCaptcha()
        // button show hide
        $(".rsndDec").hide();
        $("#progressBar").hide();
        $('.appVerify').hide();
        $('.appYes').hide();
        $('.getOtp').hide();
        $('.auth').click(function () {
            let auth = $(this).val();
            if (auth == 1) {
                $('.getOtp').show();
            } else {
                $('.getOtp').hide();
                $('.appYes').hide();
                $("#progressBar").hide();
            }
            if (auth == 2) {
                $('.appVerify').show();
                // $('.appYes').show();
                // $("#progressBar").show();
            } else {
                $('.appVerify').hide();
                $('.appYes').hide();
                $("#progressBar").hide();
            }
        });

        // otp Generation
        $('.getOtp').click(function () {
            var user_id = $("#username").val();
            var url = "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'loginOtp']); ?>";
            var token = '<?php echo $this->getRequest()->getParam('_csrfToken'); ?>';
            // console.log(user_id); die();
            $.ajax({
                type: 'POST',
                url: url,
                async: false,
                data: ({user_id: user_id}),
                dataType: 'html',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function (response, textStatus) {
                    // alert(response);
                    var result = JSON.parse(response);
                    // alert (result);
                    var otp = result['otp'];
                    var mob = result['mobile'];
                    var msg = result['message'];
                    $("#otp").val(otp);
                    $("#mskMbl").html(mob);
                    $('#msg').val(msg);// ek span lelo jha msg dikhana hai
                },
                error: function (e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });

        // for OTP verification
        // $(".rsndDec").hide();
        $(".getOtp").click(function () {
            var timeleft = 30;
            var downloadTimer = setInterval(function () {
                timeleft--;
                document.getElementById("countdowntimer").textContent = timeleft;
                if (timeleft <= 0)
                    clearInterval(downloadTimer);
                if (timeleft <= 0) {
                    $(".rsndDec").show();
                    $(".hid").hide();
                    $("#progressBar").hide();
                    $(".sav").attr('disabled', 'disabled');
                } else {
                    $(".rsndDec").hide();
                    $(".hid").show();
                    $("#progressBar").hide();
                    $(".sav").removeAttr('disabled');
                }
            }, 1000);
        });

        // for APP verification
        $(".appVerify").click(function () {
            var user_id = $("#username").val();
            var url = "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'appVerify']); ?>";
            var token = '<?php echo $this->getRequest()->getParam('_csrfToken'); ?>';
            // console.log(user_id);
            $.ajax({
                type: 'POST',
                url: url,
                async: false,
                data: ({user_id: user_id}),
                dataType: 'html',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                // ajaxComplete(function(event,xhr,options){
                //
                // }),
                success: function (response, textStatus) {
                    $('.appYes').show();
                    // alert(response);
                    // alert(response); return false;
                    var result = JSON.parse(response);
                    // alert (result);
                    var mob = result['mobile'];
                    var msg = result['message'];
                    // $("#mskMbl").html(mob); // show msg within span
                    // $('#msg').val(msg); // show msg within span
                },
                error: function (e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
            // alert(token); return false;
            $("#progressTimer").progressTimer({
                timeLimit: 20,
                warningThreshold: 10,
                baseStyle: 'progress-bar-warning',
                warningStyle: 'progress-bar-danger',
                completeStyle: 'progress-bar-info',
                onFinish: function() {
                    window.location = 'http://localhost:90/forms42/';
                    // console.log("I'm done");
                }
            });
        });

        // change app auth token
        $(".appYes").click(function () {
            var user_id = $("#username").val();
            var url = "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'checkAppToken']); ?>";
            var token = '<?php echo $this->getRequest()->getParam('_csrfToken'); ?>';
            // console.log(user_id);
            $.ajax({
                type: 'POST',
                url: url,
                async: false,
                data: ({user_id: user_id}),
                dataType: 'html',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                // ajaxComplete(function(event,xhr,options){
                //
                // }),
                success: function (response, textStatus) {
                    // alert(response); return false;
                    var result = JSON.parse(response);
                    // alert (result);
                    var yesFlag = result['flag'];
                    $('#loginFrm').submit();
                },
                error: function (e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });
    });
</script>
