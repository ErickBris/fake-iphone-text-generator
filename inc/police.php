<div style="padding:60px; margin-bottom:10px; background:#fff">
    <h3 class="page-header mt0"><i class="fa fa-gavel fa-fw"></i> <?php echo __('Policy and Term'); ?></a></h3>
    <p class="lead">
    <!-- Police -->
   	<?php if(isset($admin) && $admin==true){?>
    <div class="alert alert-danger">
		<?php echo "You need to edit file <strong>inc/police.php</strong>"?>
    </div>
    <?php } ?>
    Your text here
    <!-- Police -->
    </p>
</div>