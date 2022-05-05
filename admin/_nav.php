<div class="list-group fixed">
    <a href="?admin&general" class="list-group-item<?php if(count($_GET) == 1 || isset($_GET['general'])){?> active<?php } ?>"><i class="fa fa-dashboard fa-fw"></i> <?php echo __('General')?></a>
    <a href="?admin&gallery" class="list-group-item<?php if(isset($_GET['gallery'])){?> active<?php } ?>"><i class="fa fa-image fa-fw"></i> <?php echo __('Gallery')?></a>
    <a href="?admin&language" class="list-group-item<?php if(isset($_GET['language']) || isset($_GET['edit_lang'])){?> active<?php } ?>"><i class="fa fa-flag fa-fw"></i> <?php echo __('Languages')?></a>
</div>
<?php if(isset($SET['images_save_days']) && $SET['images_save_days'] > 0){?>
	<a href="?admin&del_images" class="btn btn-danger btn-block"><i class="fa fa-trash fa-fw"></i> <?php echo __('Delete images older than','i')." ".$SET['images_save_days']." ".__('days','i')?></a>
<?php }?>
