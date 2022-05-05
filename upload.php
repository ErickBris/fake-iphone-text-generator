<?php 
if(count($_FILES) > 0){
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
	
	$sFileName = $_FILES['image_file']['name'];
	$sFileType = $_FILES['image_file']['type'];
	
	$target = "images/"; 
	$target = $target . basename( $_FILES['uploaded']['name']) ; 
	$ok=1;
	$error=$_FILES["image_file"]["error"];
	
	
	$uploaddir = 'images/';
	$folder = date('d-m-Y',time());
	if(!is_dir($folder)){
		mkdir('images/'.$folder,0777);
	}
	$uploadfile = $uploaddir.$folder."/".basename($_FILES['image_file']['name']);

	move_uploaded_file($_FILES['image_file']['tmp_name'],$uploadfile);
	
}