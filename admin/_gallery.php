<?php
if(isset($_GET['del_images'])){
	unlink($_GET['del_images']);
?>
		<script type="text/javascript">
			document.location.href="/?admin&gallery";
		</script>
<?php

}
$dir = scandir(dirname(__DIR__).'/images/');?>
<div id="gallery">
    <div class="col-md-12 filter_holder">
        <div id="filters">
                 <a href="#" data-filter="*" class="btn btn-default filter_button filter_current"><?php echo __('All Works')?></a>
        <?php 
		$d = array();
        foreach($dir as $val){
            if(!in_array($val,array(".",".."))){
				$dat = explode("-",$val);
				$d[] = $dat[1]."-".$dat[2];
				}
        }
		$d = array_unique($d);
		foreach($d as $val){?>
                <a href="#" data-filter=".g_<?php echo $val?>" class="btn btn-default filter_button"><?php echo $val?></a>
		<?php } ?>
        </div>
    <hr>
    <div class="row foxsash_container">	
    <?php
        $all_files = $path = array();
        GetListFiles(dirname(__DIR__)."/images",$all_files);
        foreach($all_files as $key=>$value){
            $path = explode("/",$value);
            $d = $path[count($path)-2];
            $pp = end($path);
			$ppp = explode(".",$pp);
            $ext = end($ppp);
			$img_src = '';
            if($ext == 'png'){
                $src = explode("/",$value);
                $img_src = $home.'images/'.$src[count($src)-2]."/".end($src);
            }
		if(strlen($img_src)>0){
		
        $dat = explode("-",$d);
		$dd = $dat[1]."-".$dat[2];
		?>
     <div class="col-md-3 g_<?php echo $dd?> foxsash_item">
         <div class="thumbnail">
             <a href="<?php echo $img_src?>" data-lightbox="roadtrip" target="_blank"><img src="<?php echo $img_src?>" alt=""></a>
             <div class="caption text-center">
             	<?php echo 'size: '.formatBytes(filesize('images/'.$src[count($src)-2]."/".end($src)))?>
                 <p style="bottom:10px; position:absolute">
                 <a href="?admin&gallery&del_images=<?php echo 'images/'.$src[count($src)-2]."/".end($src);?>" class="btn btn-danger btn-sm"><i class="fa fa-eye fa-fw"></i> <?php echo __('Delete')?></a>
                 <a href="<?php echo $img_src?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-download fa-fw"></i> <?php echo __('Link')?></a>
                 </p>
             </div>
         </div>
     </div>
    <?php }} ?>
    </div>
</div>
</div>
