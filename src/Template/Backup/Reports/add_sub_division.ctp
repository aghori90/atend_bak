<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification $notification
 */
 
echo $this->Html->script('injection');
 
?>

<style type="text/css">
    .Jerror_form{
        color: #e62511;
        font-style: italic;
        border-bottom: #f73b3b 1px dotted;
    }    
    .inputErrBorder{
        border: 1px solid #ff0000 !important;
    }
    .inputGreenBorder{
        border: 1px solid #42d213 !important;
    }
    .frm_error{
        font-style: italic;
        color: #ff0000;
    }
</style>

<section class="register">
        <div class="container">
            <fieldset>
                <legend>Add District Sub - Division</legend>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->create('AddSubDivision',['id'=>'AddSubDivision','name'=>'AddSubDivision']) ?>
                        <div class="form-group"><?php echo $this->Flash->render();?></div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="rgi_district_code">District</label>		
                                <?php echo $this->Form->control('rgi_district_code', ['label'=>'','options' => $districts,'empty'=>'--Select District--','id'=>'rgi_district_code']);?>
                                <span class="frm_error" id="rgiDistCodeErrMsg" style="display:none;"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="sub_division_name">Sub - Division Name</label>		
                                <?php echo $this->Form->control('sub_division_name',['label'=>'','id'=>'sub_division_name','class'=>'subDivisionName']);?>
                                <span class="frm_error" id="sbDivNameErrMsg" style="display:none;"></span>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12" align="right">
                                <?= $this->Form->button('Submit',['id'=>'btnSubmit']) ?>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </fieldset>
        </div>
</section> 
<script type="text/javascript">
$(document).ready(function(){
    $('#btnSubmit').click(function(){
        let rgi_district_code = $('#rgi_district_code').val();
        let sub_division_name = $('#sub_division_name').val();

        if(rgi_district_code == ''){
            $('#rgi_district_code').addClass('inputErrBorder');
            $('#rgiDistCodeErrMsg').show();
            $('#rgiDistCodeErrMsg').html('Please Select District');
            return false;
        }
        if(sub_division_name == ''){
            $('#sub_division_name').addClass('inputErrBorder');
            $('#sbDivNameErrMsg').show();
            $('#sbDivNameErrMsg').html('Please Enter Sub - Division Name');
            return false;
        }
        return true;
    });
    $('#rgi_district_code').blur(function(){
        $('#rgi_district_code').addClass('inputGreenBorder');
        $('#rgiDistCodeErrMsg').hide();
        $('#rgiDistCodeErrMsg').html('');
    });
    $('#sub_division_name').blur(function(){
        $('#sub_division_name').addClass('inputGreenBorder');
        $('#sbDivNameErrMsg').hide();
        $('#sbDivNameErrMsg').html('');
    });
});
</script>         
