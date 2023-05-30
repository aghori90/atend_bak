<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notification $notification
 */
 
//echo $this->Html->css('jquery.multiselect');
// echo $this->Html->script('jquery.multi-select.min');
// echo $this->Html->script('jquery.multi-select');
echo $this->Html->script('jquery.multiselect');
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
    /* .ms-options > ul > li{
        margin-bottom:8px !important;
    } */
</style>

<section class="register">
        <div class="container">
            <fieldset>
                <legend>Map Sub - Division</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div style="margin-bottom:10px;">
                            <span style="float:left;margin-bottom:10px;margin-top:10px;margin-left:10px;">
                                <strong>District : </strong><?php echo $distName;?> , <strong>Sub - Division : </strong><?php echo $subDivName?>
                            </span>
                        </div>
                        <?= $this->Form->create('subDivisionMapping',['id'=>'subDivisionMapping','name'=>'subDivisionMapping','url'=>['controller'=>'Reports','action'=>'subDivisionMapping']]) ?>
                        <div class="form-group"><?php echo $this->Flash->render();?></div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="rgi_block_code">Blocks</label>		
                                <?php echo $this->Form->control('rgi_block_code', ['label'=>'','options' => $blocks,'id'=>'rgi_block_code','class'=>'form-control','multiple'=>'multiple','empty'=>'--Select Blocks--']);?>
                                <span class="frm_error" id="rgiBlkCodeErrMsg" style="display:none;"></span>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12" align="right">
                                <?php
                                    echo $this->Form->hidden('rgiDistCde',['id'=>'rgiDistCde','value'=> $rgiDistCde]);
                                    echo $this->Form->hidden('subDivId',['id'=>'subDivId','value'=> $subDivisId]);
                                ?>
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
    $('#rgi_block_code').removeClass('jqmsLoaded');
    $('#rgi_block_code').multiselect({
        // columns: 2,
        placeholder: '--Select Blocks--'
    });
    $('#btnSubmit').click(function(){
        let rgi_block_code = $('#rgi_block_code').val();

        if(rgi_block_code == ''){
            $('#rgi_block_code').addClass('inputErrBorder');
            $('#rgiDistCodeErrMsg').show();
            $('#rgiDistCodeErrMsg').html('Please Select Block');
            return false;
        }
        return true;
    });
    $('#rgi_block_code').blur(function(){
        $('#rgi_block_code').addClass('inputGreenBorder');
        $('#rgiBlkCodeErrMsg').hide();
        $('#rgiBlkCodeErrMsg').html('');
    });
});
</script>         
