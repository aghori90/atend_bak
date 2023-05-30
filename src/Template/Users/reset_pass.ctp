<style>
    thead {
        background-color: crimson;
        color: white;
        font-family: 'FontAwesome';
        font-size: medium;
    }

    .corct {
        color: mediumspringgreen;
        font-weight: bold;
        font-size: x-large;
    }

    .wrng {
        color: orangered;
        font-weight: bold;
        font-size: x-large;
    }

    .vcp_cover {
        display: inline-block;
        width: 100%;
        text-align: center;
    }

    .vcp_box {
        display: inline-block;
        width: 32%;
        /*width: 50%;*/
        text-align: center;
        box-sizing: border-box;
        margin: 5px 0;
    }

</style>

<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card" style="width: 66%; margin-left: 17%;">
            <div class="Search">
                <!--For Search-->
                <div class="card-header bg-primary text-white">Reset Password</div>
                <div class="container-fluid">
                    <fieldset>
                        <?php echo $this->Form->create('username', ['url' => ['controller' => 'users', 'action' => 'resetPass']]); ?>
                        <div class="row">
                            <div class="vcp_cover">
                                <div class="vcp_box"><span><b>Username:</b></span></div>
                                <div
                                    class="vcp_box"><?php echo $this->Form->control('username', ['label' => '', 'type' => '', 'class' => 'form-control username', 'autocomplete' => 'off', 'placeholder' => 'Enter Username', 'required' => 'required']); ?></div>
                                <div class="vcp_box">
                                    <button type="submit" class="btn btn-outline-info submitt">Reset</button>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // for empty
        $(".username").onblur(function () {
            if ($(this).val() == '') {
                alert('empty');
            }
        });

    });
</script>


