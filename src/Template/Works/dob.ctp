<?php echo $this->Html->css("jquery-ui.css"); ?>
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">DOB</div>
<!--            --><?php //echo $this->Form->create('dob',['url'=>['controller'=>'works', 'action'=>'dob']]); ?>
            <?php echo $this->Form->create('dob',['url'=>['controller'=>'works', 'action'=>'dob']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="upload-frm container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><b>Dob:</b></label>
                                <div class="col-sm-12"><?php echo $this->Form->control("dob", ["type" => "text", "label" => false, "placeholder" => "dd/mm/yyyy", "class" => "form-control form_datetime", "readonly" => true]); ?></div>
                            </div>
                        </div>
                        <!--                    </div>-->
                        <!--                    <div class="row">-->
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="form-group" style="margin-top: 22px;">
                                <?php echo $this->Form->button(__('Submit'),['type'=>'submit', 'class' => 'form-controlbtn btn btn-success']); ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<!--script-->
<?php echo $this->Html->script("jquery-ui.js") ?>
<script type="application/ecmascript">
    //dob
    $(function() {
        $('.form_datetime').datepicker({
            language: "es",
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true,
            maxDate: "D M -18Y",
            yearRange: "-100:-18",
            dateFormat: "yy-mm-dd",
            defaultDate: "-720m",

        });
    });
</script>
