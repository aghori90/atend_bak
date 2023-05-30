<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'SDC-Attendance:';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('base-responsive.css') ?>
    <?= $this->Html->css('animate.min.css') ?>
    <?= $this->Html->css('slicknav.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
<!--    --><?php //$this->Html->css('all.min.css') ?>
    <?= $this->Html->css('monthpicker'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php //echo $this->Html->script('Chart'); ?>
    <?php //echo $this->Html->script('moment.min'); ?>
    <?php //echo $this->Html->script('popper.min'); ?>
    <?php echo $this->Html->css('jquery-ui.css'); ?>
    <?php echo $this->Html->script('jquery-3.4.0.min'); ?>
    <?php echo $this->Html->script('bootstrap.min.js'); ?>
    <?php echo $this->Html->script('monthpicker.min'); ?>
    <?php  echo $this->Html->script('jquery-ui'); ?>
    <?php echo $this->Html->script('monthpicker.min'); ?>
    <?php  echo $this->Html->script('yearpicker'); ?>
    <?php //echo $this->Html->script('sha1.js') ?>
    <?php //echo $this->Html->script('injection.js') ?>
    <?php //echo $this->Html->script('fontawesome'); ?>
    <?php //echo $this->Html->script('jquery.progressTimer'); ?>
</head>
<!--<body onLoad="createCaptcha()">-->
<body>
    <div style="display:none;">
		<h1>Heading1</h1><h2>Heading2</h2>
	</div>
    <?php echo $this->Element('top_bar'); ?>
    <?php echo $this->Element('menu'); ?>
    <?= $this->Flash->render() ?>
    <!-- <div class="container clearfix">
        <?php //echo $this->fetch('content'); ?>
    </div> -->
    <div class="clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <?php echo $this->Element('footer'); ?>
</body>
</html>
