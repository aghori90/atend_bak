<?php
$loggeduser = $this->request->getSession()->check('Auth.User');
$loggedFlag = false;
if (!empty($loggeduser))
    $loggedFlag = true;
if ($loggeduser) {
    if ($this->request->getSession()->check('Auth.User.id')) {
        $group_id = $this->request->getSession()->read('Auth.User.group_id');
    }
}
?>
<style>
    .vertical-nav-menu li a {
        float: left;
        width: 100%;
        height: auto;
        word-wrap: break-word;
    }
</style>

<!--------------------------side bar-- start --------------------------------->
<div class="app-sidebar">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <!--<li class="app-sidebar__heading">Menu</li>-->
                <li>
<!--                    <a href="--><?//= $baseurl ?><!--JsfssDistrictReports/reportsHome">-->
<!--                        <i class="metismenu-icon fa fa-home"></i>Reports Home-->
<!--                    </a>-->
                </li>

                <?php if ($group_id == 12) { ?>
                <!-- <li>
                    <a href="<?= $baseurl ?>JsfssDistrictReports/smsReport">
                        <i class="metismenu-icon fa fa-mobile"></i>SMS Report
                    </a>
                </li> -->
                <?php } ?>


                <!-- <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-align-justify"></i>Report 1
                        <i class="metismenu-state-icon fa fa-angle-down"></i>
                    </a>
                    <ul>
                        <li>
                            <?php echo $this->Html->link('Stock Receive', ['controller' => 'DepotReceives', 'action' => 'index'], ['class' => 'metismenu-icon']) ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Salt/Sugar Receive', ['controller' => 'DepotReceives', 'action' => 'SaltSugarReceive'], ['class' => 'metismenu-icon']) ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Stock Dispatch', ['controller' => 'DepotReceives', 'action' => 'DepotDispatch'], ['class' => 'metismenu-icon']) ?>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-align-justify"></i>Report 2
                        <i class="metismenu-state-icon fa fa-angle-down"></i>
                    </a>
                    <ul>
                        <li>
                            <?php echo $this->Html->link('Stock Receive', ['controller' => 'DepotReceives', 'action' => 'index'], ['class' => 'metismenu-icon']) ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Salt/Sugar Receive', ['controller' => 'DepotReceives', 'action' => 'SaltSugarReceive'], ['class' => 'metismenu-icon']) ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Stock Dispatch', ['controller' => 'DepotReceives', 'action' => 'DepotDispatch'], ['class' => 'metismenu-icon']) ?>
                        </li>
                    </ul>
                </li> -->

            </ul>
        </div>
    </div>
</div>
<!--------------------------side bar end --------------------------------->
