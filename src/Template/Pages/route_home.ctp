<style type="text/css">
.b-bg-image {
    background-image: url(<?php echo $this->getRequest()->webroot;?>webroot/img/bg.jpg) !important;
}
#captcha{
    background-color: #ffffff;
    padding-left: 22px;
    margin-left: 0px;
    border-radius: 5px;
    width: 50%;
    text-align: center;
}
/*#captcha {*/
/*    width: 47%;*/
/*    margin-left: 6px;*/
/*    height: 19%;*/
/*    width: 87%;*/
/*    margin-bottom: -52px;*/
/*}*/
.capBox {
    /* display: inline-block; */
    /* width: 66%;
    margin: -9px 0px 0px -18px; */
}
.capRef {
    float: right;
    margin-top: -52px;
}
</style>
<?php echo $this->Html->script('sha1');?>
<script type="text/javascript">
    function pass(){
        var random_no=Math.floor(Math.random()*90000) + 10000;
        var pass1 = sha1(document.getElementById("password").value);
        document.getElementById("password").value=sha1(pass1+random_no);
        document.getElementById("random").value = random_no;
	 }
	 // creating captcha
     function createCaptcha() {
         //clear the contents of captcha div first
         document.getElementById('captcha').innerHTML = "";
         // alert('captcha');
         var charsArray ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
         var lengthOtp  = 6;
         var captcha    = [];
         for (var i = 0; i < lengthOtp; i++) {
             //below code will not allow Repetition of Characters
             var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
             if (captcha.indexOf(charsArray[index]) == -1)
                 captcha.push(charsArray[index]);
             else i--;
         }
         var canv = document.createElement("canvas");
         canv.id     = "captcha";
         canv.width  = 100;
         canv.height = 50;
         var ctx     = canv.getContext("2d");
         ctx.font    = "25px Georgia";
         ctx.strokeText(captcha.join(""), 0, 30);
         //storing captcha so that can validate you can save it somewhere else according to your specific requirements
         code = captcha.join("");
         document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
     }
     function validateCaptcha() {
         //event.preventDefault();
         //debugger
         if (document.getElementById("cpatchaTextBox").value == code) {
             //alert("Valid Captcha")
             return true;
         }else{
             alert("Invalid Captcha.try Again");
             createCaptcha();
             return false;
         }
     }
     function validCapt() {
	     // alert ('Aghori');
         var user = document.getElementById("username").value;
         var pswd = document.getElementById("password").value;
         var cap  = document.getElementById("cpatchaTextBox").value;
         if (user == ""){
             alert("username Is Required.");
             return false;
             window.location.reload();
         }
         if (pswd == ""){
             alert("Password Is Required.");
             return false;
             window.location.reload();
         }
         if (cap == ""){
             alert("captcha Is Required.");
             return false;
             window.location.reload(true);
         }
         return true;
     }
</script>
<div class="b-bg-image py-5" style="padding-bottom: 200px!important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex b-heading-sec">
                <div class="align-self-center pr-5 b-head-in">
                    <h1 class="text-right mt-5 b-left-head">Unnat Jyoti by Affordable LEDs for All (UJALA)</h1>
                </div>
            </div>

            <div class="col-lg-6 b-login-sec">
                <div class="d-block px-5 pt-5 pb-4 border-bottom-0">
                    <h2 class="b-login-head">Log In</h2>
                </div>

                <div class="">
                    <?php echo $this->Form->create('login',['id'=>'loginFrm','name'=>'loginFrm','autocomplete'=>'off','class'=>'px-5']); ?>
                        <div class="form-group ">
                            <label for="username" class="text-white">Username:</label>
                            <?php echo $this->Form->control('username',['label'=>'','id'=>'username','name'=>'username','placeholder'=>'Enter Username','class'=>'form-control']);?>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">Password:</label>
                            <?php echo $this->Form->control('password',['label'=>'','id'=>'password','name'=>'password','placeholder'=>'Enter Password','class'=>'form-control','size' => 40, 'onBlur' => 'return pass();','onfocus'=>'this.setAttribute("type","password")']);?>
                        </div>
                        <div class="form-group">
                            <div id="captcha"></div>
                            <div class="capRef">
                                <?php echo $this->Form->button('Refresh',['label'=>'','onClick'=>'return createCaptcha()','style'=>'border-radius: 5px; padding: 12px 32px 12px 29px;']) ?>                
                            </div>
                        </div>
                        <div class="form-group">    
                            <?= $this->Form->control('captcha',['label'=>'','type'=>'text','placeholder'=>'Enter Captcha', 'id'=>'cpatchaTextBox','onchange'=>'validateCaptcha()','maxlength'=>'6','class'=>'form-control']) ?>
                            
                        </div>
                        <div class="form-group custom-control custom-checkbox">
                            <?php
                                echo $this->Form->checkbox('login_rem',['id'=>'login_rem','class'=>'custom-control-input','hiddenField' => false]);
                            ?>
                            <label class="custom-control-label text-white" for="login-rem-1">Remember me</label>
                        </div>


                        <!-- <p class="text-right b-notreg ">Don't have an account? <a href="">Sign Up</a></p> -->
                        <div class="text-center py-4">
                            <!-- <button type="submit" class="btn btn-primary b-btn">Log In</button> -->
                            <?php echo $this->Form->button('Log In',['label'=>'','class'=>'btn btn-primary b-btn','onclick'=>'return validCapt();']); ?>
                            <?=  $this->Form->hidden('random',array('id'=>'random'));?>
                        </div>
                    <?php echo $this->Form->end();?>
                </div>
            </div>

        </div>
    </div>
</div>
