<?php 
	$query = $_SERVER['REDIRECT_QUERY_STRING'];
	require_once('inc/function.php');
	$p_ar = explode('/',$_SERVER["REQUEST_URI"]);
	$p_end = end($p_ar);
	$home = str_replace($p_end,'',curPageURL()); 
	$all_files=array();
	GetListFiles(__DIR__."/images",$all_files);
	foreach($all_files as $value){
		$a = explode("/",$value);
		$a1 = end($a);
		$a2 = explode(".",$a1);
		if(end($a2) == 'png' && strpos($value,$query)){
			$src = explode("/",$value);
			$img_src = $home.'images/'.$src[count($src)-2]."/".end($src);
		}
	}
	if(file_exists('config.php')){  
		require_once('config.php');
	}
	require_once('inc/_header.php');
	if(isset($img_src)){	?>
    <div class="container redir">
    	<div class="row">
            <div class="col-md-12" style="padding-top:120px; padding-bottom:100px;">
            	<div class="clearfix"></div><br>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="text-center">
                            <a href="<?php echo $img_src?>" data-lightbox="roadtrip" target="_blank"><img src="<?php echo $img_src?>" id="image-result" class="img-responsive"></a>
                        </div>	
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control input-lg" id="link" value="<?php echo $img_src?>" onclick="this.select();">
                        </div>
                        <div class="form-group">
                            <label for="BBCode">BBCode</label>
                            <input type="text" class="form-control input-lg" id="BBCode" value="[url=<?php echo $home?>][img]<?php echo $img_src?>[/img][/url]" onclick="this.select();">
                        </div>
		                <div class="form-group">
                            <label for="HTML">HTML</label>
                            <input type="text" class="form-control input-lg" id="HTML" value="<a href=&quot;<?php echo $home?>&quot; target=&quot;_blank&quot;><img src=&quot;<?php echo $img_src?>&quot; border=&quot;0&quot; alt=&quot;Fake iPhone Text Generator iOS&quot; /></a>" onclick="this.select();">
                        </div>
                        <br>
                        <br>
                        <?php if($SET['social']['facebook'] == 1 || $SET['social']['google'] == 1 || $SET['social']['twitter'] == 1 || $SET['social']['pinterest'] == 1){?>
                        <div class="text-center">
                            <div class="btn-group">
                              <?php if(isset($SET['social']['facebook']) && $SET['social']['facebook'] == 1){?>                            
                              <a class="btn btn-default" href="https://www.facebook.com/sharer/sharer.php?display=popup&amp;u=<?php echo urlencode($img_src)?>"><i class="fa fa-facebook-square fa-fw"></i> Facebook</a>
                              <?php }?>
                              <?php if(isset($SET['social']['google']) && $SET['social']['google'] == 1){?>                           
                              <a class="btn btn-default" href="https://plus.google.com/share?url=<?php echo urlencode($img_src)?>"><i class="fa fa-google-plus-square fa-fw"></i> Google Plus</a>
                              <?php }?>
                              <?php if(isset($SET['social']['twitter']) && $SET['social']['twitter'] == 1){?>                           
                              <a class="btn btn-default" href="https://twitter.com/intent/tweet?text=<?php echo urlencode($SET['site_name'])?>&amp;url=<?php echo urlencode($img_src)?>"><i class="fa fa-twitter fa-fw"></i> Twitter</a>
                              <?php }?>
                              <?php if(isset($SET['social']['pinterest']) && $SET['social']['pinterest'] == 1){?>                                                         
                              <a class="btn btn-default" href="http://pinterest.com/pin/create/button?description=<?php echo urlencode($SET['site_name'])?>&amp;media=<?php echo urlencode($img_src)?>"><i class="fa fa-pinterest fa-fw"></i> Pinterest</a>
                              <?php }?>
                            </div>
                          </div>
                        <?php }?>  
                        <br>
                        <div class="text-center">
                            <a href="<?php echo $home?>" class="btn btn-primary"><i class="fa fa-pencil fa-fw"></i> Build another</a>
                            <a href="<?php echo $home?>?img_download=<?php echo end(explode("/",$query))?>" class="btn btn-primary" id="img_down" data-title="<?php echo $img_src?>"><i class="fa fa-download fa-fw"></i> Download image</a>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
<?php	}
	require_once('inc/_footer.php');?>