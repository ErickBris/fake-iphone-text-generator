<div style="padding:60px; margin-bottom:10px; background:#fff">
    <h3 class="page-header mt0"><i class="fa fa-book fa-fw"></i> <?php echo __('About us'); ?></a></h3>
    <p class="lead">
    <!-- About-->
	<?php if(isset($admin) && $admin==true){?>
    <div class="alert alert-danger">
		<?php echo "You need to edit file <strong>inc/about.php</strong>"?>
    </div>
    <?php } ?>
    Your text here
    <!-- About-->
    </p>
</div>