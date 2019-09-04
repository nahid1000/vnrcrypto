<?php include('includes/header.php'); ?>
<?php include('includes/left-navigation.php'); ?>
<?php if($session->is_signed_in()) : ?>
<?php $user = Users::find_user_by_id($session->user_id); ?>
<?php require_once('controller/buy.controller.php'); ?>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include('includes/right-header.php'); ?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">   
            <?php include('pages/buy.content.php'); ?>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
<?php include('includes/footer.php'); ?>
<?php else: ?>
<?php redirect('../login.php'); ?>
<?php endif; ?>