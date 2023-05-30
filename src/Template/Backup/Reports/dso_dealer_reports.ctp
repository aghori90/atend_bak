<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DealerTemp[]|\Cake\Collection\CollectionInterface $dealerTemps
 */
echo $this->Html->css('jquery-ui.css');
echo $this->Html->script('bootstrap.min');
?>
<style type="text/css">
.rectangle{
    box-shadow: 1.5px 2px 2px #150f0fb0;
    border-radius: 5px;
    /*padding: 9px 0px;*/
    position:relative;
    display: table-cell;
    margin-right: 10px !important;
    vertical-align: middle;
    padding:2px;
    width: 130px;
}
.trHead{
    background-color:#12b1a2;
    color: #ffffff;
}
#licence{
    color: #19b50e;
    font-weight: bold;
}
</style>
<?php
$session_data   = $this->getRequest()->getSession()->read();
?>
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
            	<div class="frmContent">
            		<?php echo $this->Form->create('dealerListFrm',['name'=>'dealerListFrm','id'=>'dealerListFrm','class'=>'register']); ?>
                        <div class="form-group">
                            <?php echo $this->Flash->render();?>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label for="rgi_district_code">District <sup class="superscr_star">*</sup></label>
                                <?php
                                echo $this->Form->hidden(' ',['label'=>'','name'=>'rgi_district_code','id'=>'rgi_district_code','class'=>'form-control','value'=>$rgi_district_code,'readonly'=>'readonly']);
                                echo $this->Form->control(' ',['label'=>'','name'=>'districtName','id'=>'districtName','class'=>'form-control','value'=>$districtName,'readonly'=>'readonly']);
                                ?>
                                <span class="frm_error" id="rgiDistErrMsg" style="display:none;"></span>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label>Block  <sup class="superscr_star">*</sup></label>
                                <?php echo $this->Form->control('rgi_block_code',['label'=>'','name'=>'rgi_block_code','id'=>'rgi_block_code','class'=>'form-control','empty'=>'-- Select Block --','options'=>$blocks,'required'=>'required','value'=>$rgi_block_code]); ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label>Panchayat <sup class="superscr_star">*</sup> </label>
                                <?php echo $this->Form->control('panchayat_id',['label'=>'','name'=>'panchayat_id','id'=>'panchayat_id','class'=>'form-control','empty'=>'-- Select Panchayat --','options'=>$panchayats,'value'=>$panchayat_id]); ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label>Status <sup class="superscr_star">*</sup> </label>
                                <?php echo $this->Form->control('dealer_status',['label'=>'','name'=>'dealer_status','id'=>'dealer_status','class'=>'form-control','options'=>$dealer_status_arr,'value'=>$dealer_approval_statuses_id,'required'=>'required']); ?>
                                <span class="frm_error" id="dlrEntryErrMsg" style="display:none;"></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <!--<label>Select Dealer Entry Type </label>
                                <?php /*echo $this->Form->control('dealer_entry_type',['label'=>'','name'=>'dealer_entry_type','id'=>'dealer_entry_type','class'=>'form-control','empty'=>'All','options'=>$dealerShipTypes,'value'=>$dealerShipEntryType]); */?>
                                <span class="frm_error" id="dlrEntryErrMsg" style="display:none;"></span>-->
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div style="margin-top: 18px;">
                                    <?php echo $this->Form->button('Submit',['id'=>'btnSubmit','class'=>'btnEdit','style'=>'margin-top: 8px;padding: 10px;width: 100px;float: right;border:none;']);?>
                                </div>
                            </div>
                        </div>
                    <?php echo $this->Form->end(); ?>
            	</div>
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                	<div class="flashMessage">
                        <?php echo $this->Flash->render();?>
                    </div>
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <thead>
                            <tr class="trHead">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Acknowledgement No.</th>
                                <th scope="col">Panchayat Name</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($dealerData)) {
                            $SlNo = 1;
                            foreach ($dealerData as $key => $value) {
                                //echo "<pre>"; print_r($value); die();
                                ?>
                            <tr>
                                <td><?php echo $SlNo;?></td>
                                <td><?php echo $value['ack_no'];?></td>
                                <td><?php echo $value['name'];?></td>
                                <td><?php echo $value['panchayatName'];?></td>
                                <td><?php echo $value['dealer_approval_statuses_id'];?></td>
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
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var disabledTool = new Date();
        disabledTool.setDate(disabledTool.getDate());
        disabledTool.setHours(0, 0, 0, 0);

        var startDate = "<?php echo date('Y');?>";
        var endDate = "<?php echo date('Y');?>";
        var year_range = startDate + ':' + endDate;

        var tostartDate = "<?php echo date('Y');?>";
        var toendDate = "<?php echo date('Y', strtotime('+2 year'));?>";
        var toyear_range = tostartDate + ':' + toendDate;

        $('#validFrom').datepicker({
            language: "es",
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true,
            //maxDate: new Date(),
   			yearRange: year_range,
            dateFormat: "yy-mm-dd",
            //defaultDate: "-720m",
            beforeShowDay: function (date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });

        $('#validTo').datepicker({
            language: "es",
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true,
            //maxDate: new Date(),
   			yearRange: toyear_range,
            dateFormat: "yy-mm-dd",
            //defaultDate: "-720m",
            beforeShowDay: function (date) {
                var tooltipDate = "This date is DISABLED!!";
                if (date.getTime() == disabledTool.getTime()) {
                    return [false, 'redday', tooltipDate];
                } else {
                    return [true, '', ''];
                }
            }
        });
    });
    /** Start : Modal Display */
    var modal = document.getElementById("myModal");
    var licenceModal = document.getElementById('licenceModal');
    // Get the <span> element that closes the modal
    //var span = document.getElementsByClassName("close")[0];

    $(document).ready(function(){
        /** Start : Close licenceModal */
        $('#closeLicenceModal').click(function(){
            $('#licenceModal').hide();
        });
        /** Ended : Close licenModal */
        $('.forwardToBsoInspection').click(function(){
            let id = $(this).attr('id');
            let token = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            let url = '<?php echo $this->Url->build(["controller"=>"DealerTemps",'action'=>"forwardDealerToBsoInspection"]); ?>';
            //alert(id + " ==");return false;
            //modal.style.display = "block";
            $('#dlrId').val(id);

            $.ajax({
                type: 'POST',
                url: url,
                async:true,
                data: ({id : id}),
                dataType:'html',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function(response, textStatus)
                {
                    //alert(response);return false;
                    let result = JSON.parse(response);
                    //alert(result);return false;
                    if(result == 1){
                        alert("Application Successfully Forwarded to BSO for Inspection.");return false;
                        //modal.style.display = "block";
                    }else{
                        alert('ERROR ! Something Wrong While Application Forwarding...');return false;
                    }

                },
                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });

        });
        $('.close').click(function(){
            modal.style.display = "none";
        });

        $('#renew').click(function(){
            let id = $(this).attr('class');
            let token = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            let url = '<?php echo $this->Url->build(["controller"=>"App",'action'=>"getDealerData"]); ?>';
            //alert(id + " ==");return false;
            //modal.style.display = "block";
            $('#dlrId').val(id);

            $.ajax({
                type: 'POST',
                url: url,
                async:true,
                data: ({id : id}),
                dataType:'html',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function(response, textStatus)
                {
                    //alert(response);//return false;
                    let result = JSON.parse(response);
                    //alert(result.dealer_code);return false;
                    if(response != ""){
                        $('#dlrName').html(result.name);
                        $('#dlrCode').html(result.dealer_code);
                        modal.style.display = "block";
                    }else{
                        alert('ERROR ! Something Wrong While Licence Generation...');return false;
                    }

                },
                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });

        });
        $('.close').click(function(){
            modal.style.display = "none";
        });
    });
    /** Ended : Modal Display */
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
        /** Start : Generate Licence for Dealer Made Payment */
        $('.generateLicence').click(function(){
            let dealerId = $(this).attr('id');
            let rgi_district_code = "<?php $session_data = $this->getRequest()->getSession()->read(); echo $session_data['Auth']['User']['rgi_district_code']; ?>";
            let token = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            let url = '<?php echo $this->Url->build(["controller"=>"App",'action'=>"generateDealerLicence"]); ?>';
            //alert(dealerId);return false;
            $.ajax({
                type: 'POST',
                url: url,
                async:true,
                data: ({dealerId : dealerId, rgi_district_code : rgi_district_code}),
                dataType:'html',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function(response, textStatus)
                {
                    //alert(response);return false;
                    if(response != 2){
                        $('#'+dealerId).html('');
                        //$('#generateLicence').css("background-color", "#0a6b03f2");
                        licenceModal.style.display = "block";
                        $('#licence').html(response);
                        $('#'+dealerId).html('Licence Generated');
                        //alert('Licence Generated Successfully.');
                        return false;
                    }else{
                        alert('ERROR ! Something Wrong While Licence Generation...');return false;
                    }

                },
                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });
        /** Ended : Generate Licence for Dealer Made Payment */
        // Start : Get Blocks Based on District Change
        $('#rgi_district_code').change(function(){
            var url = $(this).attr('rel');
            var rgi_district_code = $(this).val();
            var token = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            $.ajax({
                type: 'POST',
                url: url,
                async:true,
                data: ({id : rgi_district_code}),
                dataType:'html',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function(response, textStatus)
                {
                    $('#rgi_block_code').empty();
                    var result = JSON.parse(response); //alert(result);return false;
                    $.each(result, function(val, text) {
                        $('#rgi_block_code').append(
                            $('<option></option>').val(val).html(text)
                        );
                    });
                    $("select[name=rgi_block_code]").prepend("<option value='' selected>-- Select Block--</option>");
                },
                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });
        // Ended : Get Blocks Based on District Change
        // Start : Get Dealers Based on Block Change
        $('#rgi_block_code').change(function(){
            var url = "<?php echo $this->Url->build(['controller' => 'App', 'action' => 'getPanchayatsByBlock']); ?>";
            var rgi_block_code = $(this).val();
            var token = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            $.ajax({
                type: 'POST',
                url: url,
                async:true,
                data: ({id : rgi_block_code}),
                dataType:'html',
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-CSRF-Token', token);
                },
                success: function(response, textStatus)
                {
                    $('#panchayat_id').empty();
                    var result = JSON.parse(response); //alert(result);return false;
                    $.each(result, function(val, text) {
                        $('#panchayat_id').append(
                            $('<option></option>').val(val).html(text)
                        );
                    });
                    $("select[name=panchayat_id]").prepend("<option value='' selected>-- Select Panchayat--</option>");
                },
                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        });
        // Ended : Get Dealers Based on Block Change
    });
</script>
