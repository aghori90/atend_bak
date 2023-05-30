<?php
echo $this->Html->css('bootstrap.min.css');
echo $this->Html->css('font-awesome.min.css');
echo $this->Html->script('fontawesome');
echo $this->Html->script('jquery');
$session_data = $this->getRequest()->getSession()->read();
//echo "<pre>";print_r($session_data);
if (isset($session_data['Auth']['User']) && !empty($session_data['Auth']['User'])) {
    $groupId = $session_data['Auth']['User']['group_id'];
    $user_id = $session_data['Auth']['User']['id'];
    $username = $session_data['Auth']['User']['username'];
    $name = $session_data['Auth']['User']['f_name'];
} else {
    $groupId = '';
    $user_id = '';
    $username = '';
}
?>
<style type="text/css">
    .bar1, .bar2, .bar3 {
        width: 25px;
        height: 3px;
        background-color: #fff;
        margin: 5px 0;
        transition: 0.4s;
    }

    .change .bar1 {
        -webkit-transform: rotate(-45deg) translate(-5px, 5px);
        transform: rotate(-45deg) translate(-5px, 5px);
    }

    .change .bar2 {
        opacity: 0;
    }

    .change .bar3 {
        -webkit-transform: rotate(45deg) translate(-5px, -7px);
        transform: rotate(45deg) translate(-5px, -7px);
    }

    /*for notification*/
    *.icon-blue {
        color: #0088cc
    }

    *.icon-grey {
        color: grey
    }

    i {
        width: 100px;
        text-align: center;
        vertical-align: middle;
        position: relative;
    }

    .badge:after {
        content: "90";
        position: absolute;
        background: rgba(0, 0, 255, 1);
        height: 2rem;
        top: 1rem;
        right: 1.5rem;
        width: 2rem;
        text-align: center;
        line-height: 2rem;;
        font-size: 1rem;
        border-radius: 50%;
        color: white;
        border: 1px solid blue;
    }

    .dropbtn {
        /* background-color: #ff0000;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none; */
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        /* background-color: #f1f1f1; */
        margin-top: -10px !important;
        background-color: #56a3da;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        margin-left: 10px;
    }

    .dropdown-content a:hover {
        /* background-color: #ddd; */
        background-color: #56a3da;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
    /*.main-menu {*/
    /*    display: inline-block;*/
    /*    padding: -8px 0px;*/
    /*    width: 100%;*/
    /*    margin-top: 4px;*/
    /*    margin-bottom: -29px;*/
    /*}*/
    .main-menu {
        display: inline-block;
        padding: -8px 0px;
        width: 100%;
        margin-top: -1px;
        margin-bottom: -33px;
    }
    /* .mt-5, .my-5 {
        margin-top: -2rem !important;
    } */
    .usernm{
        color: white;
        font-family: Arial;
        font-weight: bolder;
        margin-left: 53%;
    }

</style>
<div class="globalnav-bg">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark px-0">
            <div class="d-flex w-100 b-nav-mobile">
                <button class="navbar-toggler align-self-center b-btn-toggler" type="button" data-toggle="collapse"
                        data-target="#collapsibleNavbar" onclick="myFunction(this)">
                    <span>Menu</span>
                    <div>
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav main-menu d-flex">
                    <?php if ($groupId == 12) { // Admin ?>

                        <?php if (!empty($groupId) && !empty($user_id)) { ?>
                            <li class="nav-item d-block">
                                <?php echo $this->Html->link(__('Home', ['class' => 'nav-link']), ['controller' => 'Users', 'action' => 'admin']); ?>
                            </li>
                            <li class="nav-item d-block">
                                <?php echo $this->Html->link(__('Reports', ['class' => 'nav-link']), ['controller' => 'Works', 'action' => 'adminReports']); ?>
                            </li>
                            <!--MPR-->
                           <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" style="margin-top: 1px;">Actions</a>
                               <div class="dropdown">
                                   <div class="dropdown-content">
                                       <ul class="dropdown list-unstyled">
                                           <li>
                                              <?php echo $this->Html->link(__('Image Upload'), ['controller' => 'Works', 'action' => 'upImg']) ?>
                                           </li>
                                       </ul>
                                       <ul class="dropdown list-unstyled">
                                           <li>
                                              <?php echo $this->Html->link(__('Reset Password'), ['controller' => 'Users', 'action' => 'resetPass']) ?>
                                           </li>
                                       </ul>
                                       <ul class="dropdown list-unstyled">
                                           <li>
                                               <?php echo $this->Html->link(__('Change Password'), ['controller' => 'Users', 'action' => 'changePass']) ?>
                                           </li>
                                       </ul>
                                       <ul class="dropdown list-unstyled">
                                           <li>
                                               <?php echo $this->Html->link(__('User Status'), ['controller' => 'Users', 'action' => 'userStatus']) ?>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </li>
                            <li class="nav-item d-block usernm">
                                <?php echo 'Welcome '.$name; ?>
                            </li>
                            <li class="nav-item d-block ml-auto b-loginbut" data-toggle="modal"
                                data-target="#login-modal">
                                <?php echo $this->Html->link(__('LOG OUT', ['class' => 'nav-link']), ['controller' => 'Users', 'action' => 'logout']); ?>
                            </li>
                        <?php } ?>
                    <?php }
                    elseif ($groupId == 13) { // Users. ?>
                        <?php if (!empty($groupId) && !empty($user_id)) { ?>
                            <li class="nav-item d-block">
                                <?php echo $this->Html->link(__('Home', ['class' => 'nav-link']), ['controller' => 'Users', 'action' => 'employee']); ?>
                            </li>
                            <li class="nav-item d-block">
                                <?php echo $this->Html->link(__('Reports', ['class' => 'nav-link']), ['controller' => 'Works', 'action' => 'reports']); ?>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" style="margin-top: 1px;">Actions</a>
                               <div class="dropdown">
                                   <div class="dropdown-content">
                                       <ul class="dropdown list-unstyled">
                                           <li>
                                              <?php echo $this->Html->link(__('Image Upload'), ['controller' => 'Works', 'action' => 'upImg']) ?>
                                           </li>
                                       </ul>
                                       <ul class="dropdown list-unstyled">
                                           <li>
                                              <?php echo $this->Html->link(__('Change Password'), ['controller' => 'Users', 'action' => 'changePass']) ?>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                           </li>
                            <li class="nav-item d-block usernm">
                                <?php echo 'Welcome '.$name; ?>
<!--                                --><?php //echo $this->Html->link(__('Report', ['class' => 'nav-link']), ['controller' => 'SecySmpDmps', 'action' => '#']); ?>
                            </li>
                            <li class="nav-item d-block ml-auto b-loginbut" data-toggle="modal"
                                data-target="#login-modal">
                                <?php echo $this->Html->link(__('LOG OUT', ['class' => 'nav-link']), ['controller' => 'Users', 'action' => 'logout']); ?>
                            </li>
                        <?php } ?>
                    <?php }  ?>
                </ul>
            </div>

        </nav>
    </div>
</div>
<script>
    function myFunction(x) {
        x.classList.toggle("change");
    }
</script>
