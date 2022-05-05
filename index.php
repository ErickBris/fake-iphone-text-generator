<?php
	if (!isset($_SESSION)) session_start();
	if(file_exists('config.php')){  
		require_once('config.php');
	}else{?>
		<div class="row">
        	<div class="col-md-4"></div>
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <?php echo "Rename the file <strong>config.dist.php</strong> to <strong>config.php</strong> "?>
                </div>
            </div>    
        </div>
<?php	}
	require_once('inc/function.php');
	require_once('lang/'.$SET['lang'].".php");
	
	
	ini_set('display_errors', 1);
	error_reporting (E_ALL);
	
	
	if(count($_POST)>0 && count($SET)>0 && !isset($_POST['ad']) && !isset($_POST['nl']) && !isset($_POST['la'])){
		if(isset($SET['admin_name']) && isset($SET['admin_pass']) && isset($SET['admin_name']) && $SET['admin_name'] == trim($_POST['login']) && $SET['admin_pass'] == trim($_POST['pass'])){
			$_SESSION['admin'] = 'true';	
		}
	}
	if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'true'){
		$admin = true;
	}else{
		$admin = false;
	}
	
	
	if(isset($_GET['img_download'])){
		require_once('_img_download.php');
	}else{ 
		$p_ar = explode('/',$_SERVER["REQUEST_URI"]);
		$p_end = end($p_ar);
		$home = str_replace($p_end,'',curPageURL());
		if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['logout'])) {
			$_SESSION = array();
			session_destroy();
			?>
			<script type="text/javascript">
				document.location.href="<?php echo $home?>";
			</script>
	<?php	}
		if(!file_exists('config.php')){ ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-6">
					<div class="alert alert-danger">
						<?php echo "Rename the file <strong>config.dist.php</strong> to <strong>config.php</strong> "?>
					</div>
				</div>    
			</div>
		<? exit();}
		require_once('inc/_header.php');
		if(!count($_GET) || isset($_GET['main'])){require_once('inc/_main.php');}
		elseif(isset($_GET['works'])){require_once('inc/_works.php');}	
		elseif(isset($_GET['admin'])){require_once('inc/_admin.php');}	
		elseif(isset($_GET['policy']) && isset($SET['page_police']) && $SET['page_police'] == 1){require_once('inc/police.php');}	
elseif(isset($_GET['about']) && isset($SET['page_about']) && $SET['page_about'] == 1){require_once('inc/about.php');}	
		require_once('inc/_footer.php');
	}
?>	