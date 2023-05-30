
<?php /*echo $this->Html->script('jquery-3.4.0.min'); */?><!--
<?php /*echo $this->Html->script('bootstrap.min.js'); */?>
--><?php /* echo $this->Html->script('jquery-ui'); */?>

<script type="text/javascript">
    function createCaptcha() {
        document.getElementById('captcha').innerHTML = "";
        //var charsArray ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
        var charsArray ="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var lengthOtp  = 6;
        var captcha    = [];
        for (var i = 0; i < lengthOtp; i++) {
            //below code will not allow Repetition of Characters
            var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
            if (captcha.indexOf(charsArray[index]) == -1)
                captcha.push(charsArray[index]);
            else i--;
        }
            var cptv    = captcha['0']+captcha['1']+captcha['2']+captcha['3']+captcha['4']+captcha['5'];
            document.getElementById('ran_value').value = cptv;
            var canv    = document.createElement("canvas");
            canv.id     = "captcha";
            canv.width  = 100;
            canv.height = 50;
            // canv.color  = white;
            var ctx     = canv.getContext("2d");
            ctx.font    = "25px Georgia";
            ctx.strokeText(captcha.join(""), 0, 30);
            //storing captcha so that can validate you can save it somewhere else according to your specific requirements
            code = captcha.join("");
            document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
    }
</script>





<body>
<div>
    <div class="capBox">
        <?= $this->Form->control('captcha',['label'=>'','type'=>'text','placeholder'=>'Enter Captcha', 'id'=>'cpatchaTextBox','onchange'=>'validateCaptcha()','style'=>'margin-left: 18px;','maxlength'=>'6']) ?>
    </div>
    <form id="form1" runat="server">
        <input type = "hidden" name="ran_value" id="ran_value" readonly="readonly"/>
        <span type = "button" onclick = "createCaptcha()"><img src="<?php echo $this->request->webroot.'webroot/img/ref.png'; ?>" alt="" class="refBtn"></span>
        <span type = "button" onclick = "play_it()"><img src="<?php echo $this->request->webroot.'webroot/img/audio.png'; ?>" alt="" class="sndBtn"></span>
    </form>
</div>
</body>