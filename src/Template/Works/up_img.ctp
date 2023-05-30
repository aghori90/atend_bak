<!--<form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>
-->
<style>
    .modal-body {
        position: relative;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 3rem;
    }
</style>


<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">Upload Files</div>
            <?php echo $this->Form->create($uploadData,['type'=>'file', 'id'=>'fileUplod']); ?>
            <?php echo $this->Form->create('upImg',['type'=>'file', 'id'=>'fileUplod']); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="upload-frm container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Employee Id<span  style="color:red"> *</span> :</b></label>
                                <?php
                                    if($groups=13){
                                        echo $this->Form->control('empId', ['label'=>'', 'id' => 'empid', 'class' => 'form-control', 'value' => $username, 'readonly'=>'readonly']);
                                    }
                                     elseif($groups=12){
                                        echo $this->Form->control('empId', ['label'=>'', 'id' => 'empid', 'class' => 'form-control', 'placeholder' => '--Enter Employee Id--']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Choose File :</b></label>
                                <?php echo $this->Form->control('file', ['label' => '', 'class' => 'form-control','type'=>'file']); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="form-group" style="margin-top: 45px;">
                                <?php echo $this->Form->button(__('Upload File'),['type'=>'submit', 'class' => 'form-controlbtn btn btn-success','id'=>'sub', 'onclick'=>"if (confirm('Click OK to continue?')) return true; else return false;"]); ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>


<script>
    function submitForm() {
        return confirm('Rollback deletion of candidate table?');
    }
    // $(document).ready(function () {
    //     $('#fileUplod').submit(function() {
    //         alert(); return false;
    //         var c = confirm("Click OK to continue?");
    //         return c;
    //     });
    // });
    <script>
