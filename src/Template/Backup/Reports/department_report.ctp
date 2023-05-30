<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div style="width:100%;">
                <div style="font-size:24px;">Dealer Reports</div>
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3" style="border:none;">
                    <?php echo $this->Form->create('dealer_activities',['name'=>'dealer_activities','id'=>'dealer_activities']); ?>
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="rgi_district_code">District</label>
                            <?php
                            if(($groupId == 31) || ($groupId == 12)) {
                                echo $this->Form->hidden('rgi_district_code', ['label' => '', 'name' => 'rgi_district_code', 'id' => 'rgi_district_code', 'class' => 'form-control', 'value' => $rgi_district_code]);
                                echo $this->Form->control('districtName', ['label' => '', 'name' => 'districtName', 'id' => 'districtName', 'class' => 'form-control', 'value' => $districtName]);
                            }else if(($groupId == 2) || ($groupId == 1) || ($groupId == 13)){
                                echo $this->Form->control('rgi_district_code', ['label' => '', 'name' => 'rgi_district_code', 'id' => 'rgi_district_code', 'class' => 'form-control', 'empty' => '--Select District--', 'options' => $districts]);

                            }
                            ?>
                            <span class="frm_error" id="rgiDistErrMsg" style="display:none;"></span>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="rgi_block_code">Block</label>
                            <?php
                            if(($groupId == 12)  || ($groupId == 31)) {
                                echo $this->Form->control('rgi_block_code', ['label' => '', 'name' => 'rgi_block_code', 'id' => 'rgi_block_code', 'class' => 'form-control', 'empty' => '--Select Block--', 'options' => $blocks]);
                            }else if(($groupId == 20)) {
                                echo $this->Form->hidden('rgi_block_code', ['label' => '', 'name' => 'rgi_block_code', 'id' => 'rgi_block_code', 'class' => 'form-control', 'value' => $rgi_block_code]);
                                echo $this->Form->control('blockName', ['label' => '', 'name' => 'blockName', 'id' => 'blockName', 'class' => 'form-control', 'value' => $blockName]);
                            }else if(($groupId == 2) || ($groupId == 1) || ($groupId == 13)){
                                echo $this->Form->control('rgi_block_code', ['label' => '', 'name' => 'rgi_block_code', 'id' => 'rgi_block_code', 'class' => 'form-control', 'empty' => '--Select Block--', 'options' => $blocks]);

                            }
                            ?>
                            <span class="frm_error" id="rgiBlkErrMsg" style="display:none;"></span>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="panchayat_id">Panchayat</label>
                            <?php
                            echo $this->Form->control('panchayat_id',['label'=>'','name'=>'panchayat_id','id'=>'panchayat_id','class'=>'form-control','empty'=>'--Select Panchayat--','options'=>$panchayats,'value'=>$panchayat_id]);
                            ?>
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                            <div class="btnContainer">
                                <?= $this->Form->button('Submit',['id'=>'search','class'=>'btn btn-outline-primary pull-right']) ?>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end();?>
                </div>
                <!-- Start : Display Table Row -->
                <?php if(!empty($resultData)){ ?>
                <div class="form-group col-lg-12 col-sm-12 card px-0 pt-4 pb-0 mt-3 mb-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Acknowledgement No.</th>
                                <th>Name</th>
                                <th>Group</th>
                            </tr>
                        </thead>
                        <?php 
                        $slNo = 1;
                            foreach($resultData as $rsKey => $rsVal){ 
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $slNo; ?></td>
                                <td><?php echo $rsVal['ack_no'];?></td>
                                <td><?php echo $rsVal['name'];?></td>
                                <td><?php echo $dlrGroups[$rsVal['dealer_groups_id']];?></td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <?php } ?>
                <!-- Ended : Display Table Row -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#rgi_district_code').change(function(){
            var url = "<?php echo $this->Url->build(['controller' => 'App', 'action' => 'getBlocksByDistrict']);?>";
            var rgi_district_code = $(this).val();
            var token = '<?php echo $this->request->getParam('_csrfToken'); ?>';
            //alert(url + " == " + token);return false;
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
        //  Get Blocks Based on District Change
        //  Get Panchayats Based on Block Change
        $('#rgi_block_code').change(function(){
            var url = "<?php echo $this->Url->build(['controller' => 'App', 'action' => 'getPanchayatsByBlock']);?>";
            var rgi_block_code = $(this).val();
            //var panchayat_id = $('#panchayat_id').val();
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
        // Get Panchayats Based on Block Change
    });
</script>
