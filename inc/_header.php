<!-- header -->  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $SET['site_description']?>">
    <meta name="keywords" content="<?php echo $SET['site_keywords']?>">
    <meta name="author" content="<?php echo $SET['site_author']?>">

    <title><?php echo $SET['site_name']?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:light&v1' rel='stylesheet' type='text/css'>
    <link href="assets/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/bootstrap-switch.min.css">
	<link rel="stylesheet" href="assets/css/emoji.css">
    <link rel="stylesheet" href="assets/css/ios.css">
    <link rel="shortcut icon" href="assets/images/1428673215_386423.ico">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div id="top-panel" <?php if(strlen($SET['top_bg_color'])>0){echo "style='background-color:".$SET['top_bg_color']."'";}?>>
        <div class="container-fluid">
            <div class="row">
                 <div class="col-md-5 hidden-sm hidden-xs text-left">
                    <?php if(strlen($SET['ads_top_frame'])> 0){ echo $SET['ads_top_frame'];}?>
                </div>
                <div class="col-md-4 col-sm-8">
                    <a href="<?php echo $home?>" onClick="renderImg();"><h3 style="margin-top:15px; color:#fff"><?php echo $SET['site_name']?></h3></a>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div id="dlbtn" class="pull-left mt15">
                        <a class="btn btn-success"><i class="fa fa-arrow-circle-down"></i> <?php echo __('Download image')?></a>
                    </div>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'true'){?>
                    <div class="pull-right mt15 btn-group hidden-sm hidden-xs">
                        <a class="btn btn-primary" href="?admin"><i class="fa fa-sign-in"></i></a>
                        <a class="btn btn-danger" href="?logout"><i class="fa fa-sign-out"></i></a>                	
                    </div>
                    <?php }?>
                </div>   
            </div>
        </div>
  </div>
<!-- header --> 
<div class="container-fluid">   
	<div class="row">