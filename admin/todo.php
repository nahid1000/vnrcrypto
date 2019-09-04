<?php include('includes/header.php'); ?>
<?php include('includes/left-navigation.php'); ?>
<?php if($session->is_admin_signed_in()) : ?>
<?php $user = Users::find_admin_by_id($session->admin_id); ?>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php include('includes/right-header.php'); ?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            
            <?php include('pages/todo.content.php'); ?>
            
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
<?php include('includes/footer.php'); ?>
<?php else: ?>
<?php redirect('logout.php'); ?>
<?php endif; ?>