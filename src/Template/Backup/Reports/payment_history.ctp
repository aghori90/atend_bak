<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DealerTemp[]|\Cake\Collection\CollectionInterface $dealerTemps
 */
echo $this->Html->script('jquery-validate');
echo $this->Html->script('custom');
echo $this->Html->script('formValidation');
echo $this->Html->script('validate');
echo $this->Html->script('jsapi');
echo $this->Html->css('jquery-ui.css');
echo $this->Html->script('injection');
echo $this->Html->css('modal.css');
?>
<style type="text/css">
    .btnContainer{
        margin-right: -120px;
        margin-bottom: 10px;
    }
    .inputErrBorder{
        border: 1px solid #ff0000 !important;
    }
    .frm_error{
        font-style: italic;
        color: #ff0000;
    }
    .inputGreenBorder{
        border: 1px solid #42d213 !important;
    }
</style>
<!-- Register -->
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--<div style="margin-bottom: 10px;">
                    <span style="float:right"><a class="btn btn-info"  href="<?php /*echo $this->request->webroot; */?>ListWholesalers"  style="color: #ffffff;margin-top:25px;margin-right:32px;">List Wholesalers</a></span>
                </div>-->
                <?php echo $this->Form->create('PaymentHistoryFrm',['name'=>'PaymentHistoryFrm','id'=>'PaymentHistoryFrm','method'=>'post','url'=>array('controller'=>'Reports','action'=>'paymentHistory')]);?>
                <div class="form-group">
                    <?php echo $this->Flash->render();?>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>From Date<sup class="superscr_star">*</sup></label>
                        <?php  echo $this->Form->control('from_date',['label'=>'','name'=>'from_date','id'=>'from_date','Placeholder'=>'Select From Date','class'=>'form-control','autocomplete'=>'off']); ?>
                        <span id="from_dateErrMsg" class="frm_error"></span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>To Date<sup class="superscr_star">*</sup></label>
                        <?php  echo $this->Form->control('to_date',['label'=>'','name'=>'to_date','id'=>'to_date','Placeholder'=>'Select To Date','class'=>'form-control','autocomplete'=>'off']); ?>
                        <span id="to_dateErrMsg" class="frm_error"></span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12" align="right">
                        <?= $this->Form->button('Submit', array('label'=>'','id'=>'btnSubmit','class'=>'btn btn-lg btn-primary','onclick'=>'return confirmFormSubmission();')) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <div class="flashMessage">
                        <?php echo $this->Flash->render();?>
                    </div>
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <thead>
                        <!--<tr>
                            <td colspan="7">
                                <div style="float:right; display:flex;width: 43%;">
                                    <small style="display: inline-block;width: 13%;margin-right: 5px; color: #ff0202;font-weight: bold;">Note :</small>
                                    <div style="background-color: #19b50e; width: 10px; height:10px; margin-right:5px; border-radius: 8px;margin-top: 5px;"></div><span>Approved</span>
                                    <div style="background-color: #000000; width: 10px; height:10px; margin-right:5px; margin-left:5px; border-radius: 8px;margin-top: 5px;"></div><span>Pending</span>
                                    <div style="background-color: #ea0109; width: 10px; height:10px; margin-right:5px; margin-left:5px; border-radius: 8px;margin-top: 5px;"></div><span>Rejected</span>
                                    <div style="background-color: #e09f0df2; width: 10px; height:10px; margin-right:5px; margin-left:5px; border-radius: 8px;margin-top: 5px;"></div><span>Licence Generate</span>
                                </div>
                            </td>
                        </tr>-->
                        <tr class="trHead">
                            <th scope="col">#</th>
                            <th scope="col">Dealer Code</th>
                            <th scope="col">Dealer Name</th>
                            <th scope="col">District</th>
                            <th scope="col">Payment Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(!empty($getPaymentDetails)) {
                            $SlNo = 1;
                            foreach ($getPaymentDetails as $key => $value) {
                                /*$dealerStatus = $value['dealer_approval_statuses_id'];
                                $dealerId = $value['id'];
                                $encDealerId = base64_encode($dealerId);
                                $dealerShipType = $value['dealership_types_id'];
                                $payment_status = $value['payment_status'];*/
                                ?>
                                <tr>
                                    <td><?php echo $SlNo;?></td>
                                    <td><?php echo $value['dealer_code'];?></td>
                                    <td><?php echo $value['name'];?></td>
                                    <td><?php echo $value['districtName'];?></td>
                                    <td><?php echo $value['payment_status'];?></td>
                                </tr>
                                <?php
                                $SlNo++;
                            }
                        }else{
                            ?>
                            <tr>
                                <td colspan="5">Sorry ! No Records Found.</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<script type="text/javascript">
    // Start : confirmation function on form submit
    function confirmFormSubmission(){
        var message = confirm("Are you sure to proceed with provided information ?");
        if(message == true){
            return true;
        }else{
            return false;
        }
    }
    // Ended : confirmation function on form submit
    $(document).ready(function(){
        /** Start : Form Validation */
        $('#btnSubmit').click(function(){
            let from_date   = $('#from_date').val();
            let to_date 	= $('#to_date').val();
            //alert(rgiDist + " ==");return false;
            if(from_date == ''){
                $('#from_date').addClass('inputErrBorder');
                //$('#from_date').attr('placeholder', 'From Date is Required !');
                $('#from_dateErrMsg').html('From Date is Required !');
                return false;
            }else if(to_date == ''){
                $('#to_date').addClass('inputErrBorder');
               // $('#to_date').attr('placeholder', 'To Date is Required !');
                $('#to_dateErrMsg').html('To Date is Required !');
                return false;
            }else{
                $('#from_date').addClass('inputGreenBorder');
                $('#to_date').addClass('inputGreenBorder');
                return true;
            }
        });
        /** Ended : Form Validation */
    });
    $(function(){
        var disabledTool = new Date();
        disabledTool.setDate(disabledTool.getDate());
        disabledTool.setHours(0, 0, 0, 0);

        var startDate = "<?php echo date('Y', strtotime('-2 year'));?>";
        var endDate = "<?php echo date('Y');?>";
        var year_range = startDate + ':' + endDate;
        //var tostartDate = "<?php //echo date('Y', strtotime('-2 year'));?>//";
        //var toendDate = "<?php //echo date('Y');?>//";
        //var to_year_range = tostartDate + ':' + toendDate;
        // Start : Advertisement Start Date
        $('#from_date').datepicker({
            language: "es",
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true,
            // maxDate: new Date(),
            yearRange: year_range,
            dateFormat: "yy-mm-dd",
            //defaultDate: "-12m",
            beforeShowDay: function (date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });
        // Ended : Advertisement Start Date
        // Start : Advertisement End Date
        $('#to_date').datepicker({
            language: "es",
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true,
            //maxDate: new Date(),
            yearRange: year_range,
            dateFormat: "yy-mm-dd",
            beforeShowDay: function (date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });
        // Ended : Advertisement End Date
    });
</script>
