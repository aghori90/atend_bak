<?php echo $this->Html->script('injection.js');
//  session_start();
//  echo session_id();
?>

<style>
    thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
        background-color: #fa4604;
        color: white;
    }
    .radio_deco{
        display: inline-block;
        width: 100%;
        text-align: center;
        margin: 13px 0px 12px -11px;
    }
    .radio_deco label{
        display: inline-block;
        max-width: 100%;
        margin: 0 20px 0;
        font-weight: 800;
    }
    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
        margin: 4px 0 0 0;
    }
    .box {
        display: inline-block;
        width: 100%;
        text-align: center;
    }
    .rowp {
        display: inline-block;
        width: 100%;
        text-align: center;
        box-sizing: border-box;
        padding: 0 200px;
    }
    .vcp {
        display: inline-block;
        width: 576px;
        margin: 0px 8px 0px -33px;
    }
    .sub_buton {
        display: inline-block;
        margin: -11px 0;
    }
</style>

<div class="container-fluid table border rounded border border-primary">
    <?php echo $this->Form->create('advanceSearch',['url'=>['controller'=>'Reports','action'=>'advanceSearch']]); ?>
        <fieldset>
            <legend><?= __('ADVANCE SEARCH') ?></legend>
            <div class="flashMessage">
                <?php echo $this->Flash->render(); ?>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 bord">
                    <div class="form-group radio_deco">
                        <?php
                        $searchBy = array('1'=>'Acknowledgement No.','2'=>'Name','3'=>'Mobile','4'=>'Dealer Licence No.','5'=>'UID No.','6'=>'Account No.');
                        echo $this->Form->radio('search', $searchBy, array('label'=>'','type'=>'radio','hiddenField'=>false, 'class'=>'radio_lable_pad','style'=>"margin: 0px 4px 1px -15px;"));?>
                    </div>
                </div>
                <div class="box">
                    <div class="rowp" align="center">
                        <div class="vcp">
                            <div class="form-group">
                                <!--                            <label for=""><b>Acknowledgement No.</b></label>-->
                                <?php echo $this->Form->control('ack',['label'=>'', 'class'=>'form-control ackNoValid','placeholder'=>'Enter Acknowledgement No.']); ?>
                            </div>
                        </div>
                        <div class="vcp">
                            <div class="form-group">
                                <!--                            <label for=""><b>Name</b></label>-->
                                <?php echo $this->Form->control('name',['label'=>'', 'class'=>'form-control','placeholder'=>'Enter Name']); ?>
                            </div>
                        </div>
                        <div class="vcp">
                            <div class="form-group">
                                <!--                            <label for=""><b>Mobile</b></label>-->
                                <?php echo $this->Form->control('mobile',['label'=>'', 'class'=>'form-control numonly phn','placeholder'=>'Enter Mobile']); ?>
                            </div>
                        </div>
                        <div class="vcp">
                            <div class="form-group">
                                <!--                            <label for=""><b>Dealer Licence No.</b></label>-->
                                <?php echo $this->Form->control('dLicence',['label'=>'', 'class'=>'form-control','placeholder'=>'Enter Dealer Licence No.']); ?>
                            </div>
                        </div>
                        <div class="vcp">
                            <div class="form-group">
                                <!--                            <label for=""><b>UID No.</b></label>-->
                                <?php echo $this->Form->control('uid',['label'=>'', 'type'=>'password', 'class'=>'form-control numonly','placeholder'=>'Enter UID No.']); ?>
                            </div>
                        </div>
                        <div class="vcp">
                            <div class="form-group">
                                <!--                            <label for=""><b>Account No.</b></label>-->
                                <?php echo $this->Form->control('acount',['label'=>'', 'type'=>'password', 'class'=>'form-control numonly','placeholder'=>'Enter Account No.']); ?>
                            </div>
                        </div>
                        <div class="sub_buton">
                            <input type="hidden" class="name" name="field"/>
                            <input type="hidden" class="value" />
                            <button class="btn btn-success float-md-left vcpbt" type="submit">Submit</button>
                        </div>

                    </div>

                </div>
            </div>
        </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<?php if(isset($searchDatas) and count($searchDatas) > 0){

?>
<div class="container-fluid table border rounded border border-primary tabBox">
    <fieldset>
        <legend><?= __('SEARCH DETAIL') ?></legend>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">ACKNOWLEDGEMENT NO.</th>
                <th scope="col">DEALER LICENSE NO.</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $i=1;
                foreach ($searchDatas as $searchData) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $searchData['name']; ?></td>
                <td><?php echo $searchData['ack_no']; ?></td>
                <td><?php echo $searchData['dealerLicence']; ?></td>
                <td>
                    <?php
                        echo $this->Form->create('form', array('url'=>['controller'=>'Reports','action'=>'detailedData']));
                        echo $this->Form->hidden('details',[ 'value'=>$searchData['id']]);
                    ?>
                    <button type="submit" name="name" style="border: none; background-color: #ffffff00;" value="<?php echo $searchData['name']; ?>"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="click to view"></i></button>
                    <?php echo $this->Form->end(); ?>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </fieldset>
</div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function(){
        // for radio check
        $(".vcp").hide();
        jQuery(".vcpbt").hide();
        jQuery("label input").click(function(){
            if(jQuery(this).is(":checked")){
                jQuery(".vcpbt").show();
                jQuery(".vcp").hide();
                jQuery(".vcp").eq(jQuery(this).parent().index()).show();
            }else{
                jQuery(".vcpbt").hide();
            }
        });

        //for tooltip
        $('[data-toggle="tooltip"]').tooltip();

        //disable submit button on empty field
        var flag = 0;
        // $(".vcpbt").attr("disabled","disabled");
        jQuery(".vcp input").blur(function () {
            jQuery(".name").val(jQuery(this).attr("name"));
            jQuery(".value").val(jQuery(this).val());
        });
        $(".vcpbt").click(function(){
            // if(jQuery('.value').val() == ''){
            //     alert('Blank Data feeded.');
            //     return false;
            // }
            /*
            if(!$('input[name="ack"]').val()){
                alert('Please Enter Acknowledgement No.');
                var flag = 1;

            }
            if(!$('input[name="name"]').val()){
                alert('Please Enter Name');
                var flag = 1;

            }
            if(!$('input[name="mobile"]').val()){
                alert('Please Enter Mobile No.');
                var flag = 1;

            }
            if(!$('input[name="dLicence"]').val()){
                alert('Please Enter Dealer Licence No.');
                var flag = 1;

            }
            if(!$('input[name="uid"]').val()){
                alert('Please Enter Aadhaar No.');
                var flag = 1;

            }
            if(!$('input[name="acount"]').val()){
                alert('Please Enter Account No.');
                var flag = 1;

            }
            if(flag == 1){
                return false;
            }
            */

        });

        $('input[name="ack"]').keyup(function(){
            if( $('input[name="ack"]').val()){
                $(".vcpbt").removeAttr("disabled");
            }
        });
        $('input[name="name"]').keyup(function(){
            if( $('input[name="name"]').val()){
                $(".vcpbt").removeAttr("disabled");
            }
        });
        $('input[name="mobile"]').keyup(function(){
            if( $('input[name="mobile"]').val()){
                $(".vcpbt").removeAttr("disabled");
            }
        });
        $('input[name="dLicence"]').keyup(function(){
            if( $('input[name="dLicence"]').val()){
                $(".vcpbt").removeAttr("disabled");
            }
        });
        $('input[name="uid"]').keyup(function(){
            if( $('input[name="uid"]').val()){
                $(".vcpbt").removeAttr("disabled");
            }
        });
        $('input[name="acount"]').keyup(function(){
            if( $('input[name="acount"]').val()){
                $(".vcpbt").removeAttr("disabled");
            }
        });

    });
</script>
