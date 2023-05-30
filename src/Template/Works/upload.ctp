<!--<h1>Upload File</h1>
<div class="content">
    <?/*= $this->Flash->render() */?>
    <div class="upload-frm">
        <?php /*echo $this->Form->create($uploadData, ['type' => 'file']); */?>
        <?php /*echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']); */?>
        <?php /*echo $this->Form->button(__('Upload File'), ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); */?>
        <?php /*echo $this->Form->end(); */?>
    </div>
</div>
-->

<!--client side Validation-->
<script type="text/javascript">
    $(document).ready(function() {
        $("#fileUplod").validate({
            alert('rama'); return false;
            rules: {
                file: "required",
                /*uid: {
                    required: true,
                    minlength: 12,
                    maxlength: 12
                },*/
                // otp: "required",
            },
            messages: {
                file: "No file is there.",
                // uid: {
                //     required: "Please enter UID No",
                //     minlength: "Minimum length of UID No should be 12 digits",
                //     maxlength: "Maximum length of UID No should be 12 digits"
                // },
                // otp: "Please enter One Day OTP sent to your Mobile No for UID Change"
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");
                if (element.is(":radio")) {
                    error.appendTo(element.parent().parent());
                } else if (element.is(":checkbox")) {
                    error.appendTo(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            onsubmit: true
        });
    });
</script>

<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">Upload Files</div>
            <?php echo $this->Form->create($uploadData,['type'=>'file', 'id'=>'fileUplod']); ?>
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
                                <?php echo $this->Form->button(__('Upload File'),['type'=>'submit', 'class' => 'form-controlbtn btn btn-success']); ?>
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
                    <td>##</td>
                    <td>File Name</td>
                    <td>Uploaded On</td>
                    <td>Image</td>
                </tr>
                <?php
                    $i=1;
//                    "<pre>"; print_r($upFiles); "</pre>"; die;
//                      debug($upFiles);die;
                    foreach ($upFiles as $item) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['created']; ?></td>
<!--                            <td>-->

<!--                                <embed src="../uploads/files--><?//= $item['name'] ?><!--" width="220px" height="150px">-->
<!--                                <img src="uploads/files/--><?php //echo $item['name']; ?><!--">-->
<!--                                --><?php //echo '<img src="data:image/png;base64,'.base64_encode($item['path'].$item['name']).'" width="50px" height="50px"/>'; ?>
<!--                                <embed type="image/png" src="--><?php //echo $item->path.$item->name ?><!--" width="50px" height="50px">-->
<!--                            </td>-->
<!--                            <td>--><?php //echo 'coming soon'?><!--</td>-->
<!--                            <td><embed src="--><?php //echo $item->path.$item->name ?><!--" width="220px" height="150px"></td>-->
                        </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

