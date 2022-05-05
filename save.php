<?php 
	require_once('inc/function.php');
	if(file_exists('config.php')){  
		require_once('config.php');
		$SET = stripslashes_deep($SET);
	}
if (isset($_POST["data"])) {
	 
		$words = $words_new = array();
		$low = range('a','z');
		$words = array_merge($words, $low);
		$upper = range('A','Z');
		$words = array_merge($words, $upper);
		$numerals = range('0','9');
		$words = array_merge($words, $numerals);
		
		for($n=0;$n<=5;$n++){
			$words_new[]=$words[array_rand($words,1)];
		}
		$short_url = implode('',$words_new);
		
	 	$img = $_POST["data"];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		
		

		$uploaddir = 'images/';
		$folder = date('d-m-Y',time());
		if(!is_dir('images/'.$folder)){
			mkdir('images/'.$folder,0777);
			//chmod('images/'.$folder,0777);
		}
		$uploadfile = $uploaddir.$folder."/".$short_url.".png";
		$p_ar = explode('/',$_SERVER["REQUEST_URI"]);
		$p_end = end($p_ar);
		$home = str_replace($p_end,'',curPageURL());
		
		$success = file_put_contents($uploaddir.$folder."/".$short_url.".png", $data);
		if(isset($SET['watermark']) && $SET['watermark'] == 1 && $SET['watermark_image']==1){
			AddWatermark($uploaddir.$folder."/".$short_url.".png",'png','watermark.png');
		}elseif(isset($SET['watermark']) && $SET['watermark'] == 1 && strlen($SET['watermark_text']) > 0){
			$img_src = str_replace($home,"",$uploaddir.$folder."/".$short_url.".png");
			$size = getimagesize($img_src);
			$im = imagecreatefrompng($img_src);
			$text = $SET['watermark_text'];
			$wat_color = hex2rgb($SET['watermark_color']);
			$white2 = imagecolorallocatealpha($im, $wat_color[0], $wat_color[1], $wat_color[2], $SET['watermark_opacity']); 
			imagettftext($im, 20, 0, 70, ($size[1]/2), $white2, "assets/fonts/OpenSans-Bold.ttf", $text);
			imagepng ($im,$img_src);
			imagedestroy($im);
		}
		$link = trim($home.$uploaddir.$folder."/".$short_url.".png");
		$BBCode = "[url=".$home."][img]".$link."[/img][/url]";
		$html = "<a href='".$home."' target='_blank'><img src='".$link."' border='0' alt='Fake iPhone Text Generator iOS' /></a>";
		$down = $home."?img_download=".$short_url;
		$result = $link."||".$short_url."||".$BBCode."||".$html."||".$down; 
		echo $result;
		
	}

?>