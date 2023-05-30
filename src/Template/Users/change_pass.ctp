<?php echo $this->Html->script('sha1'); ?>
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

</style>

<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card" style="width: 66%; margin-left: 17%;">
            <div class="card-header bg-primary text-white">Change Password</div>
<!--            <span style="color: red">--><?php //echo $mOtp; ?><!--</span>-->
            <?php echo $this->Form->create('password', ['url' => ['controller' => 'users', 'action' => 'changePass']]); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Current Password :</b></label>
                                <?= $this->Form->control('oldpassword', ['label' => '', 'type' => 'password', 'class' => 'form-control', 'autocomplete' => 'off', 'onblur' => 'pass_word();', 'placeholder' => 'Enter Current Password']) ?>

                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>New Password :</b></label>
                                <?= $this->Form->control('password', ['id' => 'new_pass', 'label' => '', 'type' => 'password', 'class' => 'form-control', 'size' => 40, 'autocomplete' => 'off', 'minlenth' => '8', 'maxlength' => '16', 'onblur' => 'policy_hash();', 'placeholder' => 'Enter New Password']) ?>
                                <span data-toggle="tooltip" data-placement="top" title="Passoword Policy: 1 charcter upper,lower,digit and 1 special charcter"><img src="../webroot/img/info.png" class="suk_st"></span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Confirm Password :</b></label>
                                <?= $this->Form->control('confirmpassword',['id'=>'conf_pass','label'=>'','type'=>'password',  'class' => 'form-control','autocomplete'=>'off','onblur' => 'conf_policy_hash();','placeholder'=>'Enter Confirm Password']) ?>
                            </div>
                        </div>
<!--                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">-->
<!--                            <div class="form-group">-->
<!--                                <label for="form"><b>OTP:</b></label>-->
<!--                                --><?php //echo $this->Form->control('otp', ['label' => '','id'=>'otp', 'type' => 'text', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Enter OTP','value'=>$otp]); ?>
<!--                            </div>-->
<!--                        </div>-->
                        <div style=" margin-left: 41%; margin-bottom: 15px;">
                            <?=  $this->Form->hidden('random',array('id'=>'random'));?>
                            <?=  $this->Form->hidden('random_one',array('id'=>'random_one'));?>
                            <button type="submit" class="btn btn-outline-info submitt confirm" >Submit</button>
                            <?php //echo $this->Form->end(); ?>

                            <?php //echo $this->Form->create('password', ['url' => ['controller' => 'users', 'action' => 'getOtp']]); ?>
<!--                            <button type="button" class="btn btn-outline-primary getOtp">Get OTP</button>-->
                        </div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<script type="application/ecmascript">
    $(document).ready(function(){ //alert("response");return false;
        var user_id = "<?php echo "we";?>";
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

    //for tooltip
    $('[data-toggle="tooltip"]').tooltip();
</script>
