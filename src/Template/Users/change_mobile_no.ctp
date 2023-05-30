<?php
echo $this->Html->script('injection.js');
//echo $requestStatus; die;
?>
<style>
    thead {
        background-color: crimson;
        color: white;
        font-family: 'FontAwesome';
        font-size: medium;
    }

    .corct {
        color: mediumspringgreen;
        font-weight: bold;
        font-size: x-large;
    }

    .wrng {
        color: orangered;
        font-weight: bold;
        font-size: x-large;
    }

    .vcp_cover {
        display: inline-block;
        width: 100%;
        text-align: center;
    }

    .vcp_box {
        display: inline-block;
        width: 32%;
        /*width: 50%;*/
        text-align: center;
        box-sizing: border-box;
        margin: 5px 0;
    }
    .vcp_boxx {
        display: inline-block;
        width: 32%;
        /* width: 50%; */
        text-align: center;
        box-sizing: border-box;
        margin: 14px -20px 10px 36%;
    }
    button.btn.btn-primary.submitt {
        float: right;
        margin: -9px -15px 0px 0px;
        background: crimson;
    }
    label {
        display: inline-block;
        margin-bottom: -4.5rem;
    }
    img.suk_st {
        display: inline-block;
        float: right;
        margin: -33px 5px 0px 0px;
        cursor: pointer;
        height: 27px;
    }
    #time {
        font-size: 20px;
        /*margin-left: 42%;*/
    }
    span.tim {
        margin-left: 35%;
    }
    .resend {
        display: inline-block;
        width: 100%;
    }
</style>

<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card" style="width: 66%; margin-left: 17%;">
            <div class="card-header bg-primary text-white">Change Mobile No</div>
            <!--            <span style="color: red">--><?php //echo $mOtp; ?><!--</span>-->
            <?php if(!empty($requestStatus) == 1 ) { ?>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <span style="color:red; font-weight: bold">You have already applied for change of mobile No., please wait until it gets approved. </span>
                    </div>
                </div>
            <?php } else{ ?>
                <?php echo $this->Form->create('password', ['url' => ['controller' => 'users', 'action' => 'changeMobileNo']]); ?>
                <!--            --><?php //if() ?>
                <div class="container-fluid">
                    <fieldset>
                        <div class="row">
                            <!--                        <span id="msg">Otp has been sent to your registered mobile no. : --><?php //echo $sMobile ?><!--</span>-->
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Username :</b></label>
                                    <?= $this->Form->control('Username', ['label' => '', 'class' => 'form-control', 'autocomplete' => 'off', 'value' => $sUserNm, 'readonly' => 'readonly']) ?>
                                    <!--                                <span data-toggle="tooltip" data-placement="top" title="Passoword Policy: 1 charcter upper,lower,digit and 1 special charcter"><img src="../webroot/img/info.png" class="suk_st"></span>-->
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Current Mobile No. :</b></label>
                                    <?= $this->Form->control('currMobNo', ['label' => '', 'class' => 'form-control', 'value' => $mobiNo, 'readonly' => 'readonly']) ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>New Mobile NO. :</b></label>
                                    <?= $this->Form->control('newMobileNo',['label'=>'', 'class' => 'form-control numonly mob','autocomplete'=>'off','minlength' => '10','maxlength'=>'10', 'placeholder' => 'Enter New Mobile No.','required'=>'required']) ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>Letter No. :</b></label>
                                    <?= $this->Form->control('ltrNo',['label'=>'', 'class' => 'form-control addr ltr','autocomplete'=>'off','placeholder' => 'Enter Letter No.','required'=>'required']) ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="form"><b>OTP :</b></label>
                                    <?php echo $this->Form->control('otp', ['label' => '','id'=>'otp', 'type' => 'text', 'class' => 'form-control','disabled'=>'disabled', 'autocomplete' => 'off', 'placeholder' => 'Enter OTP','value'=>$otp]); ?>
                                </div>
                            </div>
                            <div style=" margin-left: 276px; margin-bottom: 15px;">
                                <button type="submit" class="btn btn-outline-info submitt" >Submit</button>
                                <?php //echo $this->Form->end(); ?>

                                <?php //echo $this->Form->create('password', ['url' => ['controller' => 'users', 'action' => 'getOtp']]); ?>
                                <button type="button" class="btn btn-outline-primary getOtp" >Get OTP</button><!-- onclick="hidShw()"-->
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 timmer">
                                <div class="form-group">
                                    <label for="form"><b></b></label>
                                    <span class="timer tim">
                                    Otp is valid for :
                                    <span id="time">05:00</span> seconds only
                                </span>
                                </div>
                            </div>
                            <div class="resend" align="center"><h3>Click on Get OTP </h3></div>
                        </div>
                    </fieldset>
                    <?php echo $this->Form->end(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script type="application/ecmascript">

    $(document).ready(function(){ //alert("response");return false;
        var user_id = "<?php echo "we";?>";
        // var user_id = $('#')
        // alert(user_id); return false;
        $('.getOtp').click(function(){
            var url = "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'getOtp']); ?>";
            var token = '<?php echo $this->getRequest()->getParam('_csrfToken'); ?>';
            $.ajax({
                type: 'POST',
                url: url,
                async:false,
                data: ({user_id : user_id}),
                dataType:'html',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function(response, textStatus)
                {
                    var result = JSON.parse(response);
                    //alert(result['otp']);return false;
                    $("#otp").val(result['otp']);
                    $('#msg').val(result['message']);// ek span lelo jha msg dikhana hai
                },
                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });

        // mobile Validation
        /* VALIDATION FOR MOBILE NO. 6,7,8,9*/
        $(".mob").keyup(function () {
            let mobNo       = $(this).val();
            let mobNoLength = $(this).val().length;
            // alert(mobNoLength); return false;
            if (mobNoLength == 1) {
                if (mobNo == 6 || mobNo == 7 || mobNo == 8 || mobNo == 9 ) {
                }else {
                    alert('Wrong Mobile no entered.');
                    $(this).val('');
                }
            } else {
                // alert('Mobile no should be of 10 characters.');
            }
        });

        // hide show timer
        $(".timmer").hide();
        $(".getOtp").click(function(){
            //jQuery(this).hide();
            jQuery(this).attr('disabled','disabled');
            if(jQuery('.timmer').is(':visible')){
                $(".timmer").hide();
                var interval = null;
                clearInterval(interval);
            }else{
                $(".timmer").show();
                $('.resend').html(" ");
                var timer2 = "0:10";
                var interval = null;
                //clearInterval(interval);
                // if(clearInterval(interval)) {
                    var interval = setInterval(function () {
                        var timer = timer2.split(':');
                        //by parsing integer, I avoid all extra string processing
                        var minutes = parseInt(timer[0], 10);
                        var seconds = parseInt(timer[1], 10);
                        --seconds;
                        minutes = (seconds < 0) ? --minutes : minutes;
                        if (minutes < 0) clearInterval(interval);
                        seconds = (seconds < 0) ? 59 : seconds;
                        seconds = (seconds < 10) ? '0' + seconds : seconds;
                        minutes = (minutes < 10) ? minutes : minutes;
                        // $('.countdown').html(minutes + ':' + seconds);
                        $('.countdown').html("<h3>Click on Get OTP </h3>");
                        var border = minutes + ':' + seconds;
                        $('#time').html(border);
                        // timer2 = minutes + ':' + seconds;
                        if(border == '0:00'){
                            jQuery(".getOtp").removeAttr('disabled');
                            //var timer2 = "0:10";
                            $(".timmer").hide();
                            //jQuery(".resend").html("<h3>Click on Get OTP </h3>");
                            window.location = 'change_mobile_no';
                        }else{
                            timer2 = minutes + ':' + seconds;
                        }
                    }, 1000);
                    // if(border == '0:00'){
                    //     clearInterval(interval);
                    // }


                // }else{
                //     alert("not cleared");
                // }
            }
        });

        // time counter for 10 seconds
        /*var counter = 10;
        var interval = setInterval(function() {
            counter--;
            // Display 'counter' wherever you want to display it.
            if (counter <= 0) {
                clearInterval(interval);
                $('.timer').html("<h3>Click on Get OTP </h3>");
                return;
            }else{
                $('#time').text(counter);
                console.log("Timer --> " + counter);
            }
        }, 1000);*/

        // time counter for 5 minutes

        //otp disabled
        $('.getOtp').click(function(){
            $("input[name=otp]").attr('disabled',false);
        });

    });

    var random_no=Math.floor(Math.random()*90000) + 10000;

    function pass_word(){
        var pass1 = sha1(document.getElementById("oldpassword").value);
        document.getElementById("oldpassword").value=sha1(pass1+random_no);
        document.getElementById("random").value = random_no;
    }

    function policy_hash() {
        var password = document.querySelector('#new_pass').value;
        var policy = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$&*_])(?=.*[A-Z]).{6,20}$/;
        if (password.match(policy)) {
            var pass1 = sha1(document.getElementById("new_pass").value);
            document.getElementById("new_pass").value=sha1(pass1+random_no);
        } else {
            alert('Passoword Policy Failed');
            // jQuery('#new_pass').focus();
        }
    }

    function conf_policy_hash() {
        var password = document.querySelector('#conf_pass').value;
        var policy = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$&*_])(?=.*[A-Z]).{6,20}$/;
        if (password.match(policy)) {
            var pass1 = sha1(document.getElementById("conf_pass").value);
            document.getElementById("conf_pass").value=sha1(pass1+random_no);
            document.getElementById("random_one").value = password;
        } else {
            alert('Passoword Policy Failed');
            // jQuery('#conf_pass').focus();
        }
    }

</script>
