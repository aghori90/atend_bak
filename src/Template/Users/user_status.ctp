<style>
    thead {
        background-color: blue;
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
    /*excdel image*/
    img.suk_st {
        display: inline-block;
        float: right;
        margin: 0px 2px 0px 0px;
        cursor: pointer;
        height: 36px;
    }
    .box {
        background-color: transparent;
        border: 0;
        color: blue;
        font-size: larger;
    }

</style>

<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <div class="card" style="width: 66%; margin-left: 17%;">
            <div class="Search">
                <!--For Search-->
                <div class="card-header bg-primary text-white">User Status</div>
                <div class="container-fluid">
                    <fieldset>
                        <?php echo $this->Form->create('username', ['url' => ['controller' => 'users', 'action' => 'userStatus']]); ?>
                        <div class="row">
                            <div class="vcp_cover">
                                <div class="vcp_box"><span><b>Username:</b></span></div>
                                <div
                                    class="vcp_box"><?php echo $this->Form->control('username', ['label' => '', 'type' => '', 'class' => 'form-control username', 'autocomplete' => 'off', 'placeholder' => 'Enter Username', 'required' => 'required']); ?></div>
                                <div class="vcp_box">
                                    <button type="submit" class="btn btn-outline-info submitt">Update</button>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <?php if($details!= 1) { ?>
                            <span data-toggle="tooltip" data-placement="top" title="Download as Excel" onClick = "table_excel('exclDnld', 'Transaction Distribution Report');"><img src="../webroot/img/excle.png" class="suk_st"></span>
                            <div>
                                <div class="tabb">
                                    <table class="table table-bordered border-primary " id="exclDnld">
                                        <thead style="" align="center">
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Id</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                           <th>Status</th>
                                           <!-- <th>Action</th> -->
<!--                                            <th>Out Time</th>-->
                                        </tr>
                                        </thead>
                                        <tbody style="" align="center">
                                            <?php
//                                            echo "<pre>";print_r($details);die;
                                            $i=1;
                                            foreach ($details as $server) { ?>

                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $server['username']; ?></td>
                                                    <td><?php echo $server['f_name'].' '.$server['l_name']; ?></td>
                                                    <td><?php echo $desig[$server['desig']]; ?></td>
                                                    <td>
                                                        <?php
                                                            if($server['status'] == 0){
                                                                echo '<span style="color:red">Inactive</span>';
                                                            }
                                                            else{
                                                                echo '<span style="color:green">Active</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <!-- <td>                                                        
                                                    <?php //echo $this->Form->create('status',['name'=>'status','url'=>['controller'=>'users','action'=>'userStatus']]) ?>
                                                        <input type="hidden" name="status" value="<?php //echo $server['username']; ?>">
                                                        <button type="submit" class="btn btn-outline-warning">Update</button>
                                                    </td> -->
                                                </tr>
                                            <?php } ?>
                                            <!-- <?php //echo $this->Form->end(); ?> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <span style="color: red; font-weight: bold">Sorry No Records found</span>
                        <?php } ?>
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


