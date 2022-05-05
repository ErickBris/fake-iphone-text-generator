<?php
if(isset($_GET['del_lang']) && ($_GET['del_lang'].'php' <> $_SET['lang'])){
	if($_SERVER['SERVER_ADDR'] == '151.248.126.11'){?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <?php echo "It prohibited on demo site"?>
                    </div>
                </div>    
            </div>
<?			}else{
				$set_lang = explode('.',$_SET['lang']);
				echo $set_lang[0];
				unlink('lang/'.$_GET['del_lang'].".php");
				exit();
				_loc("?admin&edit_lang=".$set_lang[0]);
			}
}
if(count($_POST)>0 && isset($_POST['la'])){
	if($_SERVER['SERVER_ADDR'] == '151.248.126.11'){?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <?php echo "It prohibited on demo site"?>
                    </div>
                </div>    
            </div>
<?			}else{
				if(fopen('lang/'.$_POST['la'].".php", "r")){
					$code =	'<?php $name_lang = "'.$_POST['name_lang'].'";
					$lang = array(';
					foreach($_POST['lang'] as $key => $val){
						$key = str_replace("\'", '', $key);
						$code .= "'".$key."' => '".$val."',\n";
					}
					
					$code .=')'."\n";
					$code .='?>';
					$code  = str_replace("''", "\"", $code);
			
							$fp = fopen('lang/'.$_POST['la'].".php", 'w+');
							$conf_test = fwrite($fp, $code);
							fclose($fp);
				}
				_loc("?admin&edit_lang=".$_POST['la']);
			}
}
if(isset($_GET['generation'])){
	if($_SERVER['SERVER_ADDR'] == '151.248.126.101'){?>
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
				include('lang/'.$_GET['generation'].".php");
				if(fopen('lang/'.$_GET['generation'].".php", "r")){
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
					if(file_perms('lang/'.$_GET['generation'].".php") != 666) {
						chmod('lang/'.$_GET['generation'].".php",0666);
					}
							$fp = fopen('lang/'.$_GET['generation'].".php", 'w+');
							$conf_test = fwrite($fp, $code);
							fclose($fp);
			
				}
				_loc("?admin&edit_lang=".$_GET['edit_lang']);
			}
} 
if(strlen($_GET['edit_lang'])>1){ include('lang/'.$_GET['edit_lang'].".php");} ?>
			<?php foreach($lang as $key=> $val){
					$lang_alf[$key[0]][] = array($key=>$val);
				}
					//array_unique($lang_alf);
					ksort($lang_alf);
					echo '<div class="btn-group">';
					$edit_lang = explode(".",$val);
					$edit_lang = $edit_lang[0];
					foreach($lang_alf as $key => $val){
						echo '<a href="?admin&edit_lang='.$_GET['edit_lang'].'#'.$key.'" class="btn btn-sm btn-default loot">'.$key.'</a>';
					}?>
					<a class="btn btn-primary  btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
					<?php echo __('Action');?>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu pull-right">
                    <!-- dropdown menu links -->
                    <li><a href="?admin&edit_lang=<?php echo  $_GET['edit_lang']?>&generation=<?php echo  $_GET['edit_lang']?>" title="<?php echo __('Refresh language');?>"><i class="fa fa-refresh"></i> <?php echo __('Refresh language');?></a></li>
                    <?php if($_GET['edit_lang'] != 'gb' || $_GET['edit_lang'] != $SET['lang']){?>
                    <li class="divider"></li>                                
                    <li><a href="?admin&edit_lang=<?php echo  $_GET['edit_lang']?>&del_lang=<?php echo  $_GET['edit_lang']?>" onClick="return confirm('<?php echo __('Remove?');?>');"><i class="fa fa-times"></i> <?php echo __('Remove');?></a></li>
                    <?php } ?>
                  </ul> 
					</div>
                    <hr>
                    <h4><?php echo $name_lang?></h4><hr>
                    <form action="" method="post">
                    <input type="hidden" name="la" value="<?php echo  $_GET['edit_lang']?>">
                    <input type="hidden" name="name_lang" value="<?php echo  $name_lang?>">                   
                    <div id="alf">
                    </div>
								<table class="table table-bordered table-hover">	
                                	<thead>
                                    	<tr>
                                        	<th class="col-md-1 center">##</th>
	                                    	<th class="col-md-5"><?php echo __('Key');?></th>
                                            <th class="col-md-8"><?php echo __('Value');?></th>
                                        </tr>    
                                    </thead>
                                    <tbody>
									<?php ksort($lang);
									$nn=1;
									$af = "";
									foreach($lang as $key => $val){
										echo "<tr";
										if($af == "" || $key[0] != $af){
											$af = $key[0];
											echo " id='".$af."'";
										}
										if($key == $val && $name_lang != 'English'){
													 echo " class ='danger'";
										}else{	 echo " class ='info'";}
										echo ">";
										?>
                                        	<td class="center"><?php echo  $nn++;?></td>
                                        	<td><?php echo  $key?></td>
                                            <td><input type="text" value="<?php echo  $val?>" name="lang['<?php echo  $key?>']" class="form-control"></td>
                                        </tr>
									<?php }?>
                                    </tbody>
                                    <tfoot>
                                    	<tr>
                                        	<th colspan="3"><?php _b();?></th>
                                        </tr>
                                    </tfoot>
								</table>         
							</form>
                         </div>   		
			</div>