<?php
if(isset($_GET['lang_del']) && ($_GET['lang_del'].'php' <> $SET['lang'])){
	if($_SERVER['SERVER_ADDR'] == '151.248.126.10'){?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <?php echo "It prohibited on demo site"?>
                    </div>
                </div>    
            </div>
<?			}else{
				$set_lang = explode('.',$SET['lang']);
				unlink('lang/'.$_GET['lang_del'].".php");
				_loc("?admin&language");
			}
}elseif(isset($_GET['gen'])){
	if($_SERVER['SERVER_ADDR'] == '151.248.126.10'){?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <?php echo "It prohibited on demo site"?>
                    </div>
                </div>    
            </div>
<?			}else{
	$files_array = array('admin','inc');
	if($_GET['gen'] != 'all'){
	include('lang/'.$_GET['gen'].".php");
	if(fopen('lang/'.$_GET['gen'].".php", "r")){
	$code_array =array();	
	$code =	'<?php $name_lang = "'.$name_lang.'";
		$lang = array(';
		foreach($files_array as $dir){
		$res=array(); 
		$fp=scandir($dir); 
			if($fp[2]){ 
				for($i=2,$c=count($fp);$i<$c;$i++){ 
				if(is_dir($fd=$dir."/".$fp[$i])){ 
					$res[$dir][$fd]=array_shift(scandir($fd)); 
				}else{ 
					$res[$dir][]=$fp[$i]; 
				} 
			} 
		} 	
		foreach($res as $file_name){
						
			foreach($file_name as $file){				
				$regexp_text = file_get_contents($dir."/".$file);
				
				$regexp_code = "|__\((.*)\)|imuUs";
				preg_match_all($regexp_code,$regexp_text,$out);
				asort($out[1]);
				foreach($out[1] as $val){
					$val = str_replace("'", '', $val);
					if(isset($lang[$val])){
						$code_array[$val] = $lang[$val];
					}else{
						$code_array[$val] = $val;
					}
				}
				
			}
		}	
		}

				$code_array=array_unique($code_array);
				ksort($code_array);
				unset($code_array['$val']);
				unset($code_array["$val"]);
				foreach($code_array as $key => $val){
					$pos = strpos($key,'[');
					if(strlen($key) > 0 && ($pos == false)){
						$val = str_replace("'", '', $val);
						if(isset($lang[$key])){
							$code .= '"'.$key.'" => "'.$val.'",'."\n";
						}else{
							$code .= '"'.$val.'" => "'.$val.'",'."\n";
							
						}
					}
				}
				$code .=')'."\n";
		$code .='?>';
		
		if(file_perms('lang/'.$_GET['gen'].".php") <> 66) {
			chmod('lang/'.$_GET['gen'].".php",0666);
		}
				$fp = fopen('lang/'.$_GET['gen'].".php", 'w+');
				$conf_test = fwrite($fp, $code);
				fclose($fp);

		}
		
	}elseif($_GET['gen'] == 'all'){
			$lg=scandir('lang/'); 
			unset($lg['0'],$lg['1']);		
			foreach($lg as $name){
				include('lang/'.$name);
				if(fopen('lang/'.$name, "r")){
				$code_array =array();	
				$code =	'<?php $name_lang = "'.$name_lang.'";
$lang = array(';
					foreach($files_array as $dir){
					$res=array(); 
					$fp=scandir($dir); 
						if($fp[2]){ 
							for($i=2,$c=count($fp);$i<$c;$i++){ 
							if(is_dir($fd=$dir."/".$fp[$i])){ 
								$res[$dir][$fd]=array_shift(scandir($fd)); 
							}else{ 
								$res[$dir][]=$fp[$i]; 
							} 
						} 
					} 	
					foreach($res as $file_name){
									
						foreach($file_name as $file){
							$regexp_text = file_get_contents($dir."/".$file);
			
							
							$regexp_code = "|__\((.*)\)|imuUs";
							preg_match_all($regexp_code,$regexp_text,$out);
							asort($out[1]);
							foreach($out[1] as $val){
								$val = str_replace(array("'","\""), '', $val);
								if(isset($lang[$val])){
									$code_array[$val] = $lang[$val];
								}else{
									$code_array[$val] = $val;
								}
							}
							
						}
					}	
					}
							
							
							$code_array=array_unique($code_array);
							ksort($code_array);
							unset($code_array['$val']);
							unset($code_array["$val"]);
							foreach($code_array as $key => $val){
								$pos = strpos($key,'[');
								if(strlen($key) > 0 && ($pos == false)){
									$val = str_replace("'", '', $val);
									if(isset($lang[$key])){
										$code .= '"'.$key.'" => "'.$val.'",'."\n";
									}else{
										$code .= '"'.$val.'" => "'.$val.'",'."\n";
										
									}
								}
							}
							$code .=')'."\n";
					$code .='?>';
					if(file_perms('lang/'.$name) != 666) {
						chmod('lang/'.$name,0666);
					}
							$fp = fopen('lang/'.$name, 'w+');
							$conf_test = fwrite($fp, $code);
							fclose($fp);
			
					}
			}
		}
		_loc("?admin&language");
		}
}
if(isset($_GET['lang_del']) && ($_GET['lang_del'] != $SET['lang']) && $_GET['lang_del'] !='gb'){
	if($_SERVER['SERVER_ADDR'] == '151.248.126.10'){?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <?php echo "It prohibited on demo site"?>
                    </div>
                </div>    
            </div>
<?			}else{
				unlink('lang/'.$_GET['lang_del'].".php");
				_loc("?admin&language");
			}
}elseif(count($_POST) && isset($_POST['language'])){
	if($_SERVER['SERVER_ADDR'] == '151.248.126.10'){?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <?php echo "It prohibited on demo site"?>
                    </div>
                </div>    
            </div>
<?			}else{
				$trans = include("lang/".$SET['lang'].".php");
				$_POST['name_file'] = strtolower($_POST['name_file']);
				if(@filesize("lang/".$_POST['name_file'].".php") < 1){
					$code =	'<?php $name_lang = "'.trim($_POST['language']).'";
					$lang = array(';
					foreach($lang as $key => $val){
								$val = str_replace("'", '', $key);
								$code .= '"'.$key.'" => "'.$key.'",'."\n";
							}
							$code .=')'."\n";
					$code .='?>';
					$fp = fopen('lang/'.$_POST['name_file'].".php", 'w+');
					$conf_test = fwrite($fp, $code);
					fclose($fp);
					
				}
				_loc("?admin&language");
				}
			}
?>
<div id="form-content" class="panel panel-default">
	<div class="panel-heading"><?php echo __('New language');?></div>
	<div class="panel-body">
    <form  method="post" action="" class="form-horizontal">
		    <input type="hidden" name="nl" value="1" />
            <div class="form-group">
              <label for="language" class="col-md-3 control-label"><?php echo __('Language');?></label>
              <div class="col-md-9">
	              <input type="text" class="form-control" id="language" name="language" >
              </div>
            </div>
		      <div class="form-group">
              <label for="name_file" class="col-md-3 control-label"><?php echo __('Short name - 2 character');?></label>
              <div class="col-md-9">
	              <input type="text" class="form-control" maxlength="2" id="name_file" name="name_file" required value="" >
              </div>
            </div>
            <hr>
        <div class="form-group">
        	<div class="col-md-offset-3 col-md-9">
	             <button type="submit" class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-floppy-o"></i></span> <?php echo __('Save')?></button>
            </div>
        </div>
    </form>
    </div>
</div>
<form action="" method="post">
<table class="table table-bordered table-hover table-striped">
	<thead>
    	<tr>
        	<th class="col-md-3"><?php echo __('Language name');?></th>
            <th class="col-md-6"><?php echo __('Progress Translate');?></th>
            <th class="col-md-2 center"><?php echo __('Operations');?></th>
        </tr>
    </thead>
    <tbody>
<?php $lang_f = scandir('lang/');
				$a = 1; 
				$count_f = count($lang_f)-2;
				foreach($lang_f as $v){
					if($v != '.' && $v != '..' && $v != '.DS_Store'){
						$nav_lang = file_get_contents("lang/".$v);
						$name_lang = explode("\n",$nav_lang);
						$regexp_code = "|\"(.*)\"|";
						$regexp_text = $name_lang[0];
						preg_match_all($regexp_code,$regexp_text,$out);
						$edit_lang = explode(".",$v);
						$edit_lang = $edit_lang[0];
						ob_start(); 
						$ret = array();
						include_once('lang/'.$v);
						$i=0;
						foreach($lang as $k=>$val){
							if($k==$val){ $i++;}
						}
						if($v == "gb.php"){
							$ret['p'] =  0;	
						}else{
							$ret['p'] = round($i*100/count($lang),2);
						}
						$ret['count'] = count($lang);
						echo serialize($ret);
						$pr = ob_get_contents(); 
						ob_end_clean();
						$pr = unserialize($pr);
				?>
                <tr>
                	<td><div class="pull-left flag flag-<?php echo $edit_lang?>" title="<?php echo $out[1][0]?>" style="margin-top:5px; margin-right:5px"></div>  <?php echo $out[1][0]?></td>
                	<td><div class="progress<?php if(round((100-$pr['p'])) != 100){echo " progress-bar-warning progress-striped active";}?>" style="margin-bottom:0">
                      <div class="progress-bar" style="width: <?php echo round((100-$pr['p']),2)?>%;"><?php echo round((100-$pr['p']),2)?>%</div>
                  </div></td>
                	<td class="center"><div class="btn-group btn-group-sm">
                       <a href="?admin&edit_lang=<?php echo $edit_lang;?>" class="btn btn-primary" title="<?php echo __('Edit');?>"><span class="fa fa-pencil"></span></a>
                       <a href="?admin&language&gen=<?php echo $edit_lang;?>" class="btn btn-primary" title="<?php echo __('Generate');?>"><span class="fa fa-refresh"></span></a>
                        <?php if($edit_lang != 'gb'){?>
                      <a href="?admin&language&lang_del=<?php echo $edit_lang;?>" class="btn btn-primary" title="<?php echo __('Remove')?>" onClick="return confirm('<?php echo __('Remove?');?>')"><span class="fa fa-times"></span></a>
                        <?php }?>
                    </div></td>  
                </tr>
                <?php } 
				}?>
	</tbody>
    <tfoot>
        <tr>
	        <td colspan="2"></td>
            <td class="center"><a href="?admin&language&gen=all" class="btn btn-primary" title="<?php echo __('Generate');?>"><span class="fa fa-refresh"></span></a></td>
        </tr>
    </tfoot>
</table>    
</form>			