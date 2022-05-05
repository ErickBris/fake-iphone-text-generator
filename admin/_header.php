<?php
	if(isset($_GET['del_images']) && $SET['images_save_days'] > 0){
		$days_sec = time()-$SET['images_save_days']*24*60*60;
		$all_files = array();
        GetListFiles(dirname(__DIR__)."/images",$all_files);
		foreach($all_files as $key=>$val){
			if(filemtime($val) < $days_sec){
				unlink($val);
			}
		}
		_loc('/?admin&gallery');
	}
?>
<div class="container"  style="padding-top:120px; padding-bottom:50px; background-color:#fff">
    <div class="row">
        <div class="col-md-3">
            <?php require_once('admin/_nav.php');?>
        </div>
        <div class="col-md-9">