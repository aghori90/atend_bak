<?php
use Cake\Routing\Router;
?>
<style type="text/css">
    .row {
        display: -ms-flexbox;
        display: flex;
        width: 100%;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: 0px;
        margin-left: 0px;
        margin-top: 14px;
    }
    input#uidseed {
        margin-top: -51px;
        margin-left: 190px;
    }
    .btnDeco {
        display: inline-block;
        float: right;
        margin-top: -5px;
        margin-right: 25px;
    }
</style>
<!--After Search Form -->
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">UID SEEDING</div>
            <?php echo $this->Form->create('seedUid',['url'=>['controller'=>'SecyDmfSmfDistricts', 'action'=>'uidSeeding']]); ?>
            <?php echo $this->Flash->render(); ?>
            <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="form"><b>Enter Rationcard No. :</b></label>
                                <?php echo $this->Form->control('uidSeed', ['label'=>'', 'class' => 'form-control numonly','placeholder'=>'Enter Rationcard No.']); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="btnDeco">
                                <button type="submit" class="btn btn-outline-success getUid">Success</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.getUid').click(function () {
            let uid = $(".numonly").val();
            // alert(uid); return false;
            if(uid == ''){
                this('.uid').setAttribute('disabled', true);
            }
        });

    });
</script>
