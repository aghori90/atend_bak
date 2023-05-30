<?php
$session_data = $this->getRequest()->getSession()->read();

//echo "<pre>";print_r($session_data);
if(isset($session_data['regNo']) && !empty($session_data['regNo'])){
    $regNo = $session_data['regNo'];
}else{
    $regNo = '';
}
?>
<style>
    .b-appname {
        font-size: 62px;
    }
    #b-header {
        height: 110px;
        overflow: hidden;
        margin-left: -23px;
    }
    .navbar-brand {
        display: inline-block;
        padding-top: -3.6875rem;
        padding-bottom: 1.3125rem;
        margin-right: 1rem;
        font-size: 1.25rem;
        line-height: inherit;
        white-space: nowrap;
    }
    .main-menu {
        display: inline-block;
        padding: -8px 0px;
        width: 100%;
        margin-top: 4px;
        margin-bottom: -29px;
    }

</style>
<div class="container d-flex clearfix" ></div>

<!-- Login Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://localhost/atend_bak/users/login">State Data Center</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
<!--    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">-->
<!--        <div class="navbar-nav">-->
<!--            <ul>-->
<!--                <li class="nav-item d-block">-->
<!--                    --><?php //echo $this->Html->link(__('Registration', ['class' => 'nav-item nav-link sr-only']), ['controller' => 'Users', 'action' => 'registration']); ?>
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
</nav>
