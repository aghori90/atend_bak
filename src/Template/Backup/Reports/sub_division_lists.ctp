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
                <legend>District Sub - Division Lists</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div style="margin-bottom:10px;">
                            <span style="float:right;margin-bottom:10px;"><a class="btn btn-info"  href="<?php echo $this->Url->build(["controller"=>"Reports",'action'=>"addSubDivision"]); ?>"  style="color: #ffffff;">Add</a></span>
                        </div>
                        <table class="table table-striped">
                            <thead style="background-color: darkcyan; color: white;">
                                <tr>
                                    <th>Sl No.</th>
                                    <th>District Name</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!empty($subDivisions)){ 
                                        $slNo = 1;
                                        echo $this->Form->create('MapSubDivision',['id'=>'MapSubDivision','name'=>'MapSubDivision','url'=>['controller'=>'Reports','action'=>'mapSubDivision']]);
                                        foreach($subDivisions as $subDivKey => $subDivVal){
                                            $subDivId = $subDivVal['id'];
                                            $rgiDist = $subDivVal['rgi_district_code'];
                                            $subDivName = $subDivVal['name'];
                                ?>
                                <tr>
                                    <td><?php echo $slNo; ?></td>
                                    <td><?php echo $subDivVal['districtName']; ?></td>
                                    <td><?php echo $subDivVal['name']; ?></td>
                                    <td>
                                        <?php //echo $subDivVal['name']; ?>
                                        <button id="btn_<?php echo $subDivVal['id'];?>" type="button" class="btn btn-outline-success map" onclick="submitFrm('<?php echo $subDivId; ?>','<?php echo $rgiDist;?>','<?php echo $subDivName;?>')">Map with Block</button>
                                    </td>
                                </tr>
                                <?php            
                                        $slNo++;
                                        }
                                        echo $this->Form->hidden('rgiDistCode',['id'=>'rgiDistCode']);
                                        echo $this->Form->hidden('subDivisionId',['id'=>'subDivisionId']);
                                        echo $this->Form->hidden('subDivisionName',['id'=>'subDivisionName']);
                                        echo $this->Form->end();
                                    }else{
                                ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Sorry !. No Records Found</td>
                                    </tr>
                                <?php        
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
        </div>
</section> 
<script type="text/javascript">
function submitFrm(id, distCode, subDivName){
    //alert("ID = " + id + ", District COde = " + distCode);return false;
    document.getElementById('subDivisionId').value = id;
    document.getElementById('rgiDistCode').value = distCode;
    document.getElementById('subDivisionName').value = subDivName;
    document.getElementById('MapSubDivision').submit();
}
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
