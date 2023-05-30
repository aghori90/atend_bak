<?php
use Cake\Routing\Router;
echo $this->Html->css('monthpicker');
echo $this->Html->script('jquery');
echo $this->Html->script('monthpicker.min');
echo $this->Html->script('injection');
?>
<style type="text/css">
    .b-bg-image {
        background-image: url(<?php echo $this->getRequest()->webroot;?>webroot/img/servers.jpg) !important;
    }

    .rectangle{
        box-shadow: 1.5px 2px 2px #150f0fb0;
        border-radius: 5px;
        padding: 9px 0px;
        position:relative;
        display: table-cell;
        margin-right: 10px !important;
        vertical-align: middle;
        padding:2px;
        width: 130px;
    }
    /*.trHead{*/
    /*    background-color:#12b1a2;*/
    /*    color: #ffffff;*/
    /*}*/
    #licence{
        color: #19b50e;
        font-weight: bold;
    }
    button.btnBx {
        background-color: none;
        background-color: #fdfdfd00;
        border: none;
        color: blue;
        cursor: pointer;
    }
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
    label.orTag {
        border: 1px solid red;
        margin-top: 32px;
        margin-right: -20px;
        padding: 4px 8px 5px 7px;
        border-radius: 18px;
        color: red;
        margin-left: 53px;
    }
    .input.text {
        margin-top: -2px;
    }
    *, ::after, ::before {
        box-sizing: border-box;
        border-radius: 3px;
        /*font-weight: bolder;*/
    }
    .fldDc {
        margin-left: 67px;
    }
    .table {
        width: 95%;
        margin-bottom: 1rem;
        background-color: rgba(0,0,0,0);
        margin-left: 21px;
        border-radius: 23px;
    }
    sub, sup {
        position: relative;
        font-size: 100%;
        line-height: 0;
        vertical-align: baseline;
        color: red;
    }
    /*gender*/
    .gen {
        margin-top: 21px;
    }
    a {
        color: #fff;
        text-decoration: none;
        background-color: transparent;
        font-size: 100%;
        font-weight: bolder;
    }
</style>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php
// echo "test";
?>
<div class="bg-light">
    <div class="container">
        <ul class="breadcrumb bg-light pl-0">
        </ul>
    </div>
</div>
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white"><strong>Users Registration</strong>
            <button class="btn btn-warning" style="float: right;">
                <?php echo $this->Html->link(__('Login', ['class' => 'nav-item nav-link sr-only']), ['controller' => 'Users', 'action' => 'login']); ?>
            </button>
            </div>
            <?php echo $this->Form->create('register',['url'=>['controller'=>'users', 'action'=>'registration']]); ?>
            <?php //echo $this->Form->create('$uploadData',['type'=>'file', 'id'=>'fileUpload']); ?>
            <?php //echo $this->Form->create('registration',['type'=>'file', 'id'=>'fileUpload']); ?>

            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <!--1st Row-->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Designation<span  style="color:red"> *</span> :</b></label>
                                <div class="gen">
                                    <?php //$desig = [1=>'A',2=>'B',3=>'C']  ?>
                                    <?php echo $this->Form->select('desig', $desig, ['id' => 'desig', 'class' => 'form-control', 'empty' => '--Select Designation--']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>DOB<span  style="color:red"> *</span> :</b></label>
                                <div class="Month_pick gen">
                                    <div class="col-sm-12"><?php echo $this->Form->control("dob", ["type" => "text", "label" => false, "placeholder" => "dd/mm/yyyy", "class" => "form-control form_datetime", "readonly" => true]); ?></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--2nd Row-->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>First Name<span  style="color:red"> *</span> :</b></label>
                                <?php echo $this->Form->control('fname', ['label'=>'', 'id' => 'fname', 'class' => 'form-control txtOnly', 'placeholder' => '--Enter First Name--']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Last Name<span  style="color:red"> *</span> :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('lname', ['label'=>'', 'id' => 'lname', 'class' => 'form-control txtOnly', 'placeholder' => '--Enter Last Name--']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--3rd Row-->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Employee Id<span  style="color:red"> *</span> :</b></label>
                                <?php echo $this->Form->control('empId', ['label'=>'', 'id' => 'empid', 'class' => 'form-control', 'placeholder' => '--Enter Employee Id--']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Password<span  style="color:red"> *</span> :</b></label>
                                <div class="Month_pick">
                                    <?php echo $this->Form->control('Pass', ['label'=>'', 'type'=>'password', 'id' => 'pswd', 'class' => 'form-control', 'placeholder' => '--Enter Password--']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--4th Row-->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Confirm Password<span  style="color:red"> *</span> :</b></label>
                                <?php echo $this->Form->control('cpass', ['label'=>'','type'=>'password', 'id' => 'cmpswd', 'class' => 'form-control', 'placeholder' => '--Enter Username--']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Gender<span  style="color:red"> *</span> :</b></label>
                                <?php $gend=[1=>'Male',2=>'Female',3=>'others'] ?>
                                <div class="gen">
                                    <?php echo $this->Form->select('gend', $gend, ['id' => 'gen', 'class' => 'form-control', 'empty' => '--Select Gender--']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--5th Row-->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Email<span  style="color:red"> *</span> :</b></label>
                                <?php echo $this->Form->control('email', ['label'=>'', 'id' => 'eml', 'class' => 'form-control', 'placeholder' => '--Enter Email--']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Mobile<span style="color:red"> *</span> :</b></label>
<!--                                <div class="gen">-->
                                    <?php echo $this->Form->control('mob', ['label'=>'','id' => 'mbl', 'class' => 'form-control numonly', 'placeholder' => '--Enter Mobile No--','maxlength'=>'10','minlength'=>'10']);?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- for pic upload  -->
<!--                    <div class="row">-->
<!--                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">-->
<!--                            <div class="form-group">-->
<!--                                <label for="form"><b>Choose File<span  style="color:red"> *</span> :</b></label>-->
<!--                                <div class="gen">-->
<!--                                    --><?php //echo $this->Form->control('file',  ['label'=>'', 'id' => 'img', 'type'=>'file', 'class' => 'form-control', 'placeholder' => '--Select Image--']); ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <!-- <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Choose File :</b></label>
                                <?php //echo $this->Form->control('file', ['label' => '', 'class' => 'form-control','type'=>'file']); ?>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Mobile<span style="color:red"> *</span> :</b></label>
                               <div class="gen">
                                    <?php //echo $this->Form->control('mob', ['label'=>'','id' => 'mbl', 'class' => 'form-control numonly', 'placeholder' => '--Enter Mobile No--']);?>
                                </div>
                            </div>
                        </div> -->
<!--                    </div>-->
                    <!--Form Submit Button-->
                    <div style="float: right; margin-right: 16px; margin-bottom: 15px;">
                        <button type="submit" class="btn btn-outline-info submitt confirm" id="bt">Submit</button>
                    </div>
                </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

    <?php echo $this->Html->script("jquery-ui.js") ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#bt').click(function(){
                let email = $('#eml').val();
                let passwd = $('#pswd').val();
                let cnpswd = $('#cmpswd').val();
                let desig = $('#desig').val();
                let dob = $('#dob').val();
                let fname = $('#fname').val();
                let lname = $('#lname').val();
                let empid = $('#empid').val();
                let gen = $('#gen').val();
                let mbl = $('#mbl').length();
                alert(mbl); return false;
                // alert(passwd);return false;
                // let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
                // let regex = "^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$";
                // alert(cal2);
                if(desig==''||dob==''||fname==''||lname==''||empid==''||passwd==''||cnpswd==''||gen==''||email==''||mbl==''){
                    alert('All fields are mandatory.');return false;
                }

                if(passwd!=cnpswd){
                    alert('Password don not match to confirm password.');return false;
                }
                // if(email!=regex){
                //     // $('#from').html('Please Select date');
                //     alert('Enter correct Email');return false;
                // }
                if(mbl!=10){
                    alert('Mobile should be 10 digit');return false;
                }
                // return false;
            });
        });
        // todo: monthPicker
        $('#demo-1').Monthpicker();
        $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                changeYear: true
            });
        });
        /*datepicker*/
            $(function() {
            $('.form_datetime').datepicker({
                language: "es",
                autoclose: true,
                todayHighlight: true,
                changeMonth: true,
                changeYear: true,
                maxDate: "D M Y",
                yearRange: "-40:-0",
                dateFormat: "yy-mm-dd",
                // defaultDate: "-720m",

            });
        });
    </script>
