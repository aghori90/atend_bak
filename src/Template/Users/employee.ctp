<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
//echo "<pre>";print_r($chkInTime);die;
//echo $chkInTime;die;
// echo $this->Html->css('bootstrap.min');
// echo $chkInTime; die;
?>
<style>
    .main-menu {
        display: inline-block;
        padding: -8px 0px;
        width: 100%;
        margin-top: -1px;
        margin-bottom: -33px;
    }
    .checkin {
        padding: 8px 24px !important;
        margin: 4px 4px 5px 19%;
    }
    .detail{
        text-align: center;
        font-weight: bolder;
        font-size: large;

    }
    .ckout{
        margin: -47px 0px 0px 27%;
    }
    #clock {
        font-size: 175px;
        width: 900px;
        margin: 200px;
        text-align: center;
        border: 2px solid black;
        border-radius: 20px;
    }
</style>
<script>
    // $(document).ready(function(){
    //     $("button").click(function(){
    //         $("p").hide();
    //     });
    // });
</script>
<!--For Check In-->
<?php if($getchekin == 1) { ?>
<!--    <button type="button" class="btn btn-primary checkin" data-toggle="modal" data-target="#checkin">-->
<!--        check In-->
<!--    </button>-->
<?php }else{ ?>
    <button type="button" class="btn btn-primary checkin" data-toggle="modal" data-target="#checkin">
        check In
    </button>
<?php } ?>
<!-- Modal -->
<?php echo $this->Form->create('chkin',['url'=>['controller'=>'works', 'action'=>'checkIn']]); ?>
<?php //echo $this->Flash->render(); ?>
<div class="modal fade" id="checkin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>State Data Center</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body detail">
            <table class="table table-bordered table-warning">
                <!-- <thead> -->
<!--                <div class="refIcon">-->
<!--                    <img src="../img/varified.gif" alt="" style="height: 50px; margin-top: -113px;">-->
<!--                </div>-->
                    <tr>
                        <!-- <img src="<php echo $img;  ?>" alt=""> -->
                        <th>Image</th>
                        <td>
                            <?php echo '<img src="data:image/png;base64,'.base64_encode($img).'" width="150px" height="150px"/>'; ?>
<!--                            <img src="../img/varified.gif" alt="" id="varified" style="height: 50px; margin: 79px 13px 10px -31px;">-->
                        </td>
                        <!-- <td><?php //echo $img; ?></td> -->

                    </tr>
                    <tr>
                        <th>Employee Id</th>
                        <td><?php echo $uname; ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $fname.' '.$lname; ?></td>
                    </tr>
                    <tr>
                        <th>Check In</th>
                            <td>
                                <?php
                                    date_default_timezone_set('Asia/Kolkata');
                                    echo date('h:i:s');
                                ?>
                            </td>
                    </tr>
                <!-- </thead> -->
            </table>
                <!-- : <?php //echo $uname; ?><br>
                Name: <?php //echo $fname.' '.$lname; ?><br>
                Designation: <?php //echo $fname; ?><br>
                Check In: <?php
                    //date_default_timezone_set('Asia/Kolkata');
                    //echo date('h:i:s');
                ?><br> -->
                <?php echo $this->Form->hidden('id',['name'=>'user_id','id'=>'userId','value'=>$user_id]); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="clz">Close</button>
                <?php if (count($record)==1){ ?>

                <?php } else { ?>
                    <button type="submit" class="btn btn-primary">Check In</button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Form->end(); ?>

<!--For Check Out-->
<div class="ckout">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#checkout">
        check Out
    </button>
</div>
<!-- Modal-->
<?php echo $this->Form->create('chkout',['url'=>['controller'=>'works', 'action'=>'checkOut']]); ?>
<div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>State Data Center</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body detail">
            <table class="table table-bordered table-warning">
                <!-- <thead> -->
                    <tr>
                        <!-- <img src="<php echo $img;  ?>" alt=""> -->
                        <th>Image</th>
                        <td><?php echo '<img src="data:image/png;base64,'.base64_encode($img).'" width="150px" height="150px"/>'; ?></td>
                        <!-- <td><?php //echo $img; ?></td> -->
                    </tr>
                    <tr>
                        <th>Employee Id</th>
                        <td><?php echo $uname; ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $fname.' '.$lname; ?></td>
                    </tr>
                    <tr>
                        <th>Check In At</th>
                        <td>
                            <?php
                                if($chkInTime > 0){
                                    echo $chkInTime;
                                }else{
                                    echo 'Not CheckIn Yet';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Check Out At</th>
                            <td>
                                <?php
                                    date_default_timezone_set('Asia/Kolkata');
                                    echo date('h:i:s');
                                ?>
                            </td>
                    </tr>
                <!-- </thead> -->
            </table>
                <?php echo $this->Form->hidden('id',['name'=>'user_id','id'=>'userId','value'=>$user_id]); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="clzz">Close</button>
                <button type="submit" class="btn btn-primary">check out</button>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>
<div class="mt-4" id="b-inner-sec">
    <div class="container">
        <h2 class="">Employee Attendence</h2>
        <h3 class="text-center mt-5"><span>Sub Heading</span></h3>
        <p>Description of the heading 1 goes here. An informative text section that outlines the work portfolio of the
            ministry and the initiatives/ schemes and other useful purpose that the ministry website serves. Description
            of the main heading goes here. An informative text section that outlines the work portfolio of the ministry
            and the initiatives/ schemes and other useful purpose that the ministry website serves. Description of the
            main heading goes here. An informative text section that outlines the work portfolio of the ministry and the
            initiatives/ schemes and other useful purpose that the ministry website serves.</p>

        <p>Description of the heading 1 goes here. An informative text section that outlines the work portfolio of the
            ministry and the initiatives/ schemes and other useful purpose that the ministry website serves. Description
            of the main heading goes here. An informative text section that outlines the work portfolio of the ministry
            and the initiatives/ schemes and other useful purpose that the ministry website serves. Description of the
            main heading goes here. An informative text section that outlines the work portfolio of the ministry and the
            initiatives/ schemes and other useful purpose that the ministry website serves.</p>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#clz').click(function(){
            location.reload();
        });
        $('#clzz').click(function(){
            location.reload();
        });

    });
</script>
