<?php echo $this->Html->script('injection.js'); ?>
<style>
    .submitt {
        margin-top: 40px;
    }
    .table {
        width: 95%;
        margin-bottom: 1rem;
        background-color: rgba(0,0,0,0);
        margin-left: 21px;
        border-radius: 23px;
    }
    .trHead{
        background-color:#12b1a2;
        color: #ffffff;
    }
    .orOption{
        border: 1px solid red;
        margin-top: 38px;
        margin-right: -5px;
        padding: 4px 8px 5px 7px;
        border-radius: 18px;
        color: red;
        margin-left: 53px;
    }
    img {
        vertical-align: middle;
        border-style: none;
        height: 35px;
    }
    button.btt {
        border: none;
        background-color: transparent;
        cursor: pointer;
    }
     .inpt{
        margin-top: -20px;
    }
</style>
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card" style="width: 100%; margin-left: 0%;">
            <div class="card-header bg-primary text-white">Approve Mobile No</div>
            <!--            <span style="color: red">--><?php //echo $mOtp; ?><!--</span>-->
            <?php echo $this->Form->create('mobileChange', ['id'=>'mobileChange','url' => ['controller' => 'users', 'action' => 'approveMobile']]); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <!--                        <span id="msg">Otp has been sent to your registered mobile no. : --><?php //echo $sMobile ?><!--</span>-->
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group" style="margin-top: 4%;">
                                <label for="form" ><b>District :</b></label>
                                <?= $this->Form->select('rgi_district_code', $districts, ['label' => '', 'class' => 'form-control dst', 'autocomplete' => 'off', 'empty' => '--Select District--','style'=>'margin-top: 6px;']) ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                            <div class="form-group" style="margin-top: 4%;">
                                <label for="form" class="orOption"><b>OR</b></label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group" style="margin-top: 4%;">
                                <label for="form" ><b>Mobile No. :</b></label>
                                <?= $this->Form->control('mobile', ['label' => '', 'class' => 'form-control mobb inpt mobile', 'autocomplete' => 'off', 'placeholder' => 'Enter Mobile No.', 'maxlength'=>'10', 'minlength'=>'10']) ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-outline-info submitt" >Submit</button>
                        </div>
                        <!--<div style=" margin-left: 215px; margin-bottom: 15px;">
                            <button type="submit" class="btn btn-outline-info submitt" >Submit</button>
                        </div>-->
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
            <?php if ($this->getRequest()->is('post')) { ?>
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none; margin: 0px 18px 0px 17px;">
                    <div class="flashMessage">
                        <?php echo $this->Flash->render(); ?>
                    </div>
                    <table class="table table-bordered" >
                        <thead align="center">
                        <tr class="trHead">
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Name</th>
                            <th scope="col">Applied Mobile No.</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo $this->Form->create('mobChnz', ['id'=>'mobChnz','url' => ['controller' => 'users', 'action' => 'approveUserMobile']]); ?>
                        <?php
                        if (!empty($datas)) {
                            $SlNo = 1;
//                            echo "<pre>"; print_r($datas); "<pre>"; die;
                            foreach ($datas as $key => $value) {
                                ?>
                                <tr align="center">
                                    <td><?php echo $SlNo; ?></td>
                                    <td><?php echo $value['username']; ?></td>
                                    <td><?php echo $value['f_name'].' '.$value['l_name']; ?></td>
                                    <td><?php echo $value['mobile_no']; ?></td>
                                    <td>
                                        <?php echo $this->Form->create('mobileChange', ['url' => ['controller' => 'users', 'action' => 'approveUserMobile']]); ?>
                                        <?php echo $this->Form->hidden('id', ['value' => $value['user_id']]); ?>
                                        <?php echo $this->Form->hidden('mobile', ['value' => $value['mobile_no']]); ?>
<!--                                        <button class="btt verify" --><?php //echo $value['user_id']; ?><!-- > <img src="../webroot/img/aprv.png" alt="" > </button>-->
<!--                                        <button class="btt reject" --><?php //echo $value['user_id']; ?><!-- > <img src="../webroot/img/rejct.png" alt="" > </button>-->
                                        <button class="btt verify btn btn-outline-success" <?php echo $value['user_id']; ?> > Approve </button>
<!--                                        <button class="btt reject btn btn-outline-danger" --><?php //echo $value['user_id']; ?><!-- > Reject </button>-->

                                        <!--model for reject -->
                                        <!-- Trigger the modal with a button -->
                                        <button type="button" class="btt btn btn-outline-danger " data-toggle="modal"
                                                data-target="#myModal">Reject
                                        </button>
                                        <!-- Modal -->
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Rejection Reason</h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo $this->Form->control('rejectReason', ['label' => '', 'class' => 'form-control txtOnly', 'placeholder' => 'Enter Reason For Rejection']); ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btt btn btn-outline-info" data-dismiss="modal"> Close </button>
                                                        <button type="submit" class="btt btn btn-outline-danger reject" <?php echo $value['id']; ?> > Reject </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </tr>
                                <?php
                                $SlNo++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="6">Sorry ! No Records Found.</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <?php echo $this->Form->hidden('aprvRjtFlag', ['id'=>'aprvRjtFlag']); ?>
                        <?php echo $this->Form->end(); ?>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        $('.verify').click(function () {
            $('#aprvRjtFlag').val('1');
            $('#mobChnz').submit();
            // alert($('#aprvRjtFlag').val());
            // return false
        });

        $('.reject').click(function () {
            $('#aprvRjtFlag').val('2');
            // return false;
            $('#mobChnz').submit();
            // alert($('#aprvRjtFlag').val());
            // return false
        });

        /*$('.submitt').click(function () {
            var field1 = $('.dst').val('');
            var field2 = $('.mobb').val('');
            if(field1){
                alert("Please chose one Filed");
                return false;
            }else{
                return true;
            }
        });*/

        //Disableing submit button
        var flag = 0;
        $(".submitt").attr("disabled","disabled");
        $(".submitt").click(function(){
            if(document.getElementsByName("rgi_district_code").selectedIndex == 0){
                alert('Please select atleast one Checkbox');
                var flag = 1;
            }
            if(document.getElementsByName("mobile").value == ''){
                alert('Please select atleast one Checkbox');
                var flag = 1;
            }
            if(flag == 1){
                return false;
            }
        });
        $('select[name="rgi_district_code"]').change(function(){
            if( jQuery(this).parent().find("option:selected").val() && jQuery('select[name="rgi_district_code"] option:selected').val() ){
                $(".submitt").removeAttr("disabled");
            }
            else{
                $(".submitt").attr("disabled","disabled");
            }
        });
        $('input[name="mobile"]').keyup(function(){
            var mobi = $('.mobb').val();
            if(mobi.length == 10){
                $(".submitt").removeAttr("disabled");
            }
            else{
                $(".submitt").attr("disabled","disabled");
            }
        });



    });
</script>



