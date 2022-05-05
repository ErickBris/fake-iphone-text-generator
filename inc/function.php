<?php
	function __($val){
		global $lang;
		if(isset($lang[$val])){
			return $lang[$val];
		}else{
			return "<i class='fa fa-exclamation-circle fa-fw'></i> ".$val;
		}
	}
	function stripslashes_deep($value)
	{
		$value = is_array($value) ?
					array_map('stripslashes_deep', $value) :
					stripslashes($value);
	
		return $value;
	}
	function curPageURL()
     {
         $pageURL = 'http://';
         if ($_SERVER["SERVER_PORT"] != "80") {
             $pageURL .=
             $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
         }
         else {
             $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
         }
		 
         return $pageURL;
     }
	 
	function GetListFiles($folder,&$all_files){
		$fp=opendir($folder);
		while($cv_file=readdir($fp)) {
			if(is_file($folder."/".$cv_file)) {
				$all_files[]=$folder."/".$cv_file;
			}elseif($cv_file!="." && $cv_file!=".." && is_dir($folder."/".$cv_file)){
				GetListFiles($folder."/".$cv_file,$all_files);
			}
		}
		closedir($fp);
	}
	function hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
	
	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   return $rgb;
	}
	function file_perms($file, $octal = false)
	{
		if(!file_exists($file)) return false;
		$perms = fileperms($file);
		$cut = $octal ? 2 : 3;
		return substr(decoct($perms), $cut);
	}
	
	function scan_dir($dir) {
		$ignored = array('.', '..', '.svn', '.htaccess');
	
		$files = array();    
		foreach (scandir($dir) as $file) {
			if (in_array($file, $ignored)) continue;
			$files[$file] = filemtime($dir . '/' . $file);
		}
	
		arsort($files);
		$files = array_keys($files);
	
		return ($files) ? $files : false;
	}
	function formatBytes($size, $precision = 2)
	{
		$base = log($size, 1024);
		$suffixes = array('', 'k', 'M', 'G', 'T');   
	
		return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
	}
	function _loc($data){
		echo '<script type="application/javascript">
	        document.location.href="'.$data.'";
        </script>';
		exit();
	}
	function is_image($path)
	{
		$a = getimagesize($path);
		$image_type = $a[2];
	
		if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
		{
			return true;
		}
		return false;
	}
	
	if(isset($SET['images_save_days']) && $SET['images_save_days'] > 0){
		$days_sec = time()-$SET['images_save_days']*24*60*60;
		$all_files = array();
        GetListFiles(dirname(__DIR__)."/images",$all_files);
		foreach($all_files as $key=>$val){
			if(is_image($val) == 0){ unlink($val);}
			if(filemtime($val) < $days_sec){
				unlink($val);
			}
		}
	}
	$all_files = array();
	GetListFiles(dirname(__DIR__)."/images",$all_files);
	foreach($all_files as $key=>$val){
		if(is_image($val) == 0){ unlink($val);}
	}
	
	function _b($type = "b", $link='', $icon = "fa-floppy-o", $value = '', $id ="", $class="btn-primary"){
		if($value =='') {$value = __('Save');}
		if($type == "b"){
			$result = '<button type="submit" class="btn btn-labeled '.$class.'"><span class="btn-label"><i class="fa '.$icon.'"></i></span> '.$value.'</button>';
		}elseif($type == "a"){
			if(strlen($id) > 0) {$id = "id='".$id."' ";} else{ $id = '';}
			$result = '<a href="'.$link.'" '.$id.'class="btn btn-labeled '.$class.'"><span class="btn-label"><i class="fa '.$icon.'"></i></span> '.$value.'</a>';		
		}
		echo $result;
	}
	$watermark = $SET['watermark_image'];
	function AddWatermark($img_file, $filetype, $watermark ='watermark.png'){
		$offset = 5;
		$image = GetImageSize($img_file);
		$xImg = $image[0];
		$yImg = $image[1];
		switch ($image[2]) {
			case 1:
				$img=imagecreatefromgif($img_file);
			break;
			case 2:
				$img=imagecreatefromjpeg($img_file);
			break;
			case 3:
				$img=imagecreatefrompng($img_file);
			break;
			}
	
		$r = imagecreatefrompng($watermark);
		$x = imagesx($r);
		$y = imagesy($r);
	
		$xDest = $xImg - ($x + $offset);
		$yDest = $yImg - ($y + $offset);
		imageAlphaBlending($img,1);
		imageAlphaBlending($r,1);
		imagesavealpha($img,1);
		imagesavealpha($r,1);
		imagecopyresampled($img,$r,$xDest,$yDest,0,0,$x,$y,$x,$y);
		switch ($filetype) {
				case "jpg":
					imagejpeg($img,$img_file,100);
				break;
				case "jpeg":
					imagejpeg($img,$img_file,100);
				break;
				case "gif":
					imagegif($img,$img_file);
				break;
				case "png":
					imagepng($img,$img_file);
				break;
			}
		imagedestroy($r);
		imagedestroy($img);
	}
?>	 