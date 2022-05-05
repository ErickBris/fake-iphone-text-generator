<?php
if(isset($_GET['img_download'])){
		$query = $_GET['img_download'];
	    if (ob_get_level()) {
            ob_end_clean();
        }
		
	
		$home = str_replace(end(explode('/',$_SERVER["REQUEST_URI"])),'',curPageURL()); 
		$all_files=array();
		GetListFiles(__DIR__."/images",$all_files);
		foreach($all_files as $value){
			if(end(explode(".",end(explode("/",$value)))) == 'png' && strpos($value,$query)){
				$src = explode("/",$value);
				$img_src = $home.'images/'.$src[count($src)-2]."/".end($src);
			}
		}
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($img_src));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        //header('Content-Length: ' . filesize($img_src));
        readfile($img_src);
        exit();
    
	
}
?>