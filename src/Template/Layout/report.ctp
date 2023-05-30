<?php echo $this->element("admin_header"); ?>
<div class="app-main">
    <?php echo $this->element("report_sidebar"); ?>
    <!--main content start-->
    <div class="app-main__outer">
        <div class="app-main__inner">
            <?php echo $this->fetch('content'); ?>
        </div>
        <!--main content end-->
        <?php echo $this->element("admin_footer"); ?>
    </div>
</div>