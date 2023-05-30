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
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Choose File :</b></label>
                                <?php echo $this->Form->control('file', ['label' => '', 'class' => 'form-control','type'=>'file']); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group" style="margin-top: 46px;">
                                <?php echo $this->Form->button(__('Upload File'),['type'=>'submit', 'class' => 'form-controlbtn btn btn-success','id'=>'sub', 'onclick'=>"if (confirm('Click OK to continue?')) return true; else return false;"]); ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
            </hr>
            <div class="card-header bg-primary text-white">Uploaded Files</div>
            <table class="table-bordered">
                <tr style="background-color: darkgray">
                    <td>Sl No.</td>
                    <td>Uploaded On</td>
                    <td>Image</td>
                </tr>
                <?php
                $i=1;
                foreach ($upFiles as $item) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $item['created']; ?></td>
                        <td>
                            <img <?php echo $item['doc_ext']; ?>
                            <?php echo '<img src="data:image/png;base64,'.base64_encode($item['image']).'" width="50px" height="50px"/>'; ?>
<!--                            --><?php //echo '<iframe src="data:application/pdf;base64,'.base64_encode($item['image']).'" width="200px" height="200px"/>'; ?>
                            <!--modal started-->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">view</button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo '<img src="data:image/png/jpeg;base64,'.base64_encode($item['image']).'" width="400px" height="200px"/>'; ?>
<!--                                            --><?php //echo '<iframe src="data:application/pdf;base64,'.base64_encode($item['image']).'" width="1000px" height="1000px"/>'; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
<!--                                            <i class="fa-solid fa-eye"></i>-->
                                            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
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