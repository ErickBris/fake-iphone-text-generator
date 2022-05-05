<!-- left panel -->
<div class="col-md-3" id="left-panel">
	<?php if(isset($SET['show_startup_help']) && $SET['show_startup_help'] == 1){?>
    <!-- startup -->
    <div id="startup-help" class="hidden-sm hidden-xs"><i class="fa fa-info-circle"></i> <?php echo __('Modify your iPhone message. Click on the icons to open the options and tools')?><br><br><i class="fa fa-info-circle"></i> <?php echo __('Add at least 1 message to download the image');?></div>
    <!-- startup -->
    <?php }?>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
			 <input type="hidden" name="default_ios_type" id="default_ios_type" value="<?php echo $SET['default_ios_type']?>" id="default_ios_type">
             <?php if(isset($SET['show_ios_type']) && $SET['show_ios_type'] == 1){?>
             <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                        <header>
                            <span class="fa-stack fa-lg pull-left">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                            </span>
                            <div><?php echo __('Type')?></div>
                        </header>
                    </a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse"> 
                <div class="panel-body">
                    <div class="text-center">
                            <input type="radio" name="ios_type" value="ios7" id="ios7" class="switch" data-size="mini" data-label-text="iOS 7" <?php if($SET['default_ios_type'] == 'ios7'){?> checked="checked" <?php } ?>>
                            <input type="radio" name="ios_type" value="ios8" id="ios8" class="switch" data-size="mini" data-label-text="iOS 8" <?php if($SET['default_ios_type'] == 'ios8'){?> checked="checked" <?php } ?>>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <header>
                            <span class="fa-stack fa-lg pull-left">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
                            </span>
                            <div><?php echo __('Settings')?></div>
                        </header>
                    </a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse"> 
                <div class="panel-body">
                    <div>                        
                        <div class="form-group text-center">
                            <label for="exampleInput"><?php echo __('Name')?></label>
                            <input type="text" class="form-control text-center inputVal" placeholder="<?php echo __('Enter name')?>" value="<?php echo __('John Doe')?>" id="name">
                        </div>
                        
                        <div class="form-group text-center">
                            <label for="exampleInput"><?php echo __('Operator')?></label>
                            <input type="text" class="form-control text-center inputVal" placeholder="<?php echo __('Enter operator')?>" value="AT&T" id="operator">
                        </div>                        
                        <div class="form-group text-center">
                            <label for="exampleInput"><i class="glyphicon glyphicon glyphicon-time"></i> <?php echo __('Clock')?></label>
                            <input type="text" class="form-control text-center inputVal" placeholder="<?php echo __('Enter clock')?>" value="9:41 AM" id="clock">
                        </div>                        
                        <div class="form-group text-center">
                            <label for="exampleInput">"<?php echo __('Messages')?>"</label>
                            <input type="text" class="form-control text-center inputVal" placeholder='<?php echo __('Enter word for messages')?>' value="<?php echo __('Messages')?>" id="text-messages">
                        </div>                        
                        <div class="form-group text-center">
                            <label for="exampleInput">"<?php echo __('Contact')?>"</label>
                            <input type="text" class="form-control text-center inputVal" placeholder='<?php echo __('Enter word for contact')?>' value="<?php echo __('Contact')?>" id="text-contact">
                        </div>
                        
                        <div class="form-group text-center">
                            <label for="exampleInput">"<?php echo __('Text Message')?>"</label>
                            <input type="text" class="form-control text-center inputVal" placeholder='<?php echo __('Enter word for Text Message')?>' value="<?php echo __('Text Message')?>" id="text-textmessage">
                        </div>
                        
                        <div class="form-group text-center" id="send-block">
                            <label for="exampleInput">"<?php echo __('Send')?>"</label>
                            <input type="text" class="form-control text-center inputVal" placeholder='<?php echo __('Enter word for Send')?>' value="<?php echo __('Send')?>" id="text-send">
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="expandIphone" value="true" class="switch" data-size="mini" checked>
                            <?php echo __('Expand iPhone screen')?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="expandIphone" value="false" class="switch" data-size="mini">
                            <?php echo __('Keep original screen size')?>
                          </label>
                        </div>
	                        <input type="hidden" class="exIph" value="true">
                    </div>
                </div>
            </div>
        </div>        
        <div class="line m-t-none-none"></div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        <header class="c-3">
                            <span class="fa-stack fa-lg pull-left">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-play fa-stack-1x fa-inverse"></i>
                            </span>
                            <div><?php echo __('Battery')?></div>
                        </header>
                    </a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">    
                    <div>                    
                        <p>
                            <label for="amount"><?php echo __('Battery percent')?>:</label>
                            <input type="text" id="battery-slider-amount" style="border:0; color:#f6931f; font-weight:bold;width:50px;font-size:12px;text-align:right;" class="pull-right" readonly>
                        </p>                        
                        <div id="battery-slider"></div>                        
                        <br>                        
                        <div class="text-center">
                           <input type="checkbox" id="battery-show-percent" checked class="switch" data-size="mini"  data-label-text="<?php echo __('Show percent')?>">
                        </div>
                    
                    </div>               
                </div>
            </div>
        </div>        
        <div class="line m-t-none-none"></div>        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        <header class="c-1">
                            <span class="fa-stack fa-lg pull-left">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-signal fa-stack-1x fa-inverse"></i>
                            </span>
                            <div class="pull-left"><?php echo __('Connection')?></div>
                        </header>
                    </a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                    <div>                    
                        <div class="text-center">
                            <label>
                                <input type="radio" name="connectionType" value="<?php echo __('empty')?>" class="switch" data-size="mini" data-label-text="<?php echo __('Empty')?>">
                            </label>
                        </div>                    
                        <div class="text-center">
                            <label>
                                <input type="radio" name="connectionType" value="3g" class="switch" data-size="mini" data-label-text="3G">
                            </label>
                        </div>
                    
                        <div class="text-center">
                            <label>
                                <input type="radio" name="connectionType" value="4g" class="switch" data-size="mini" data-label-text="4G">
                            </label>
                        </div>
                        <div class="text-center">
                            <label>
                                <input type="radio" name="connectionType" value="LTE" class="switch" data-size="mini" data-label-text="LTE">
                            </label>
                        </div>                        
                        <div class="text-center">
                            <label>
                                <input type="radio" name="connectionType" value="wifi" class="switch" data-size="mini" checked data-label-text="WiFi">
                            </label>
                        </div>                    
                        <div class="connection-slider connection-slider-wifi mb15">
                            <strong><?php echo __('WiFi connection')?></strong>
                            <img src="assets/images/wifi-3.png" id="wifi" class="pull-right">
                            <div id="wifi-slider"></div>
                        </div>
                        
                        <div class="connection-slider">
                            <strong><?php echo __('Signal')?></strong>
                            <img src="assets/images/3g-3.png" id="connection" class="pull-right">
                            <div id="connection-slider"></div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>

        <div class="line m-t-none-none"></div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        <header class="c-2">
                            <span class="fa-stack fa-lg pull-left">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-comments fa-stack-1x fa-inverse"></i>
                            </span>
                            <div><?php echo __('Messages')?></div>
                        </header>
                    </a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse in">
                <div class="panel-body">                
                    <div class="ml45">
                        <div class="checkbox-grey">
                            <input type="radio" name="sender" value="grey" class="switch" data-size="mini" checked>                     
                            <label><span><?php echo __('Grey')?></span></label>
                        </div>                        
                        <div class="checkbox-green">
                           <input type="radio" name="sender" value="green" class="switch" data-size="mini">
                           <label><span><?php echo __('Green')?> (SMS text)</span></label>
                        </div>                        
                        <div class="checkbox-blue">
                           <input type="radio" name="sender" value="blue" class="switch" data-size="mini">
                           <label><span><?php echo __('Blue')?> (iMessages)</span></label>
                        </div>                        
                        <div class="checkbox-transparent">
                           <input type="radio" name="sender" value="transparent" class="switch" data-size="mini">
                           <label><span><?php echo __('Timestamp')?></span></label>
                        </div>
                    </div>
                    <div>    
                        <div class="text-center mtmb20">  
        	                <div>                 
	        	                <input id="img_pos" name="img_pos" type="checkbox" checked data-on-text="<?php echo __('Left')?>" data-size="mini" data-off-text="<?php echo __('Right')?>" class="switch">
                                <label><span><?php echo __('Image position')?></span></label>
                                <input type="hidden" class="img_pos" value="true">
    	                    </div>
                        <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
         					<div class="fileUpload btn btn-default btn-sm">
                                    <span><i class="fa fa-picture-o"></i> <?php echo __('Click here to upload image')?></span>
                                    <input type="file" class="upload" value="<?php echo __('Upload image')?>" name="image_file" id="image_file" accept="image/*" onchange="startUploading()" capture>
                            </div>   
                            <div id="error" style="display:none" class="alert alert-danger mt15 text-left"><?php echo __('Invalid file type')?></div> 
                            <div id="warnsize" style="display:none" class="alert alert-danger mt15 text-left"><?php echo __('File is too large')?></div>                             
                            <div id="upload_response"></div>                                  
                        </form>
                        </div>
                        <textarea class="form-control" id="msg-content" style="height:120px;" placeholder="<?php echo __('Type message ...')?>"></textarea>
                        <div id="emoji_list" class="mb15">
                           <img src="assets/emojis/smile.png" data-src="smile" class="emoji">
                           <img src="assets/emojis/sweat_smile.png" data-src="sweat_smile" class="emoji">
                           <img src="assets/emojis/smirk.png" data-src="smirk" class="emoji">
                           <img src="assets/emojis/heart_eyes.png" data-src="heart_eyes" class="emoji">
                           <img src="assets/emojis/relaxed.png" data-src="relaxed" class="emoji">
                           <img src="assets/emojis/kissing_closed_eyes.png" data-src="kissing_closed_eyes" class="emoji">
                           <img src="assets/emojis/stuck_out_tongue_winking_eye.png" data-src="stuck_out_tongue_winking_eye" class="emoji">
                           <img src="assets/emojis/rage.png" data-src="rage" class="emoji">
                           <img src="assets/emojis/smiley.png" data-src="smiley" class="emoji">
                           <img src="assets/emojis/grin.png" data-src="grin" class="emoji">
                           <img src="assets/emojis/laughing.png" data-src="laughing" class="emoji">
                           <img src="assets/emojis/sunglasses.png" data-src="sunglasses" class="emoji">
                           <img src="assets/emojis/sweat.png" data-src="sweat" class="emoji">
                           <img src="assets/emojis/kissing_heart.png" data-src="kissing_heart" class="emoji">
                           <img src="assets/emojis/stuck_out_tongue_closed_eyes.png" data-src="stuck_out_tongue_closed_eyes" class="emoji">
                           <img src="assets/emojis/disappointed_relieved.png" data-src="disappointed_relieved" class="emoji">
                           <img src="assets/emojis/joy.png" data-src="joy" class="emoji">
                           <img src="assets/emojis/confounded.png" data-src="confounded" class="emoji">
                           <img src="assets/emojis/imp.png" data-src="imp" class="emoji">
                           <img src="assets/emojis/heart.png" data-src="heart" class="emoji">
                           

                        </div>
                        <div class="text-right mt5"><a href="#" data-toggle="modal" data-target="#emojiModal" class="btn btn-default btn-xs mt5" target="_blank"><?php echo __('Emoji list')?></a></div>
                        <div class="text-center">
                            <a class="btn btn-primary sendMessage mt30"><i class="fa fa-comment"></i> <?php echo __('Add message')?></a>
                        </div>                    
                    </div>               
                </div>
            </div>            
        </div>        
    </div>			
</div>
<!-- left panel -->
<!-- Modal -->
<div class="modal fade" id="emojiModal" tabindex="-1" data-target=".bs-example-modal-lg" role="dialog" aria-labelledby="emojiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Emoji</h4>
      </div>
      <div class="modal-body" style="max-height:350px">
        <?php require_once('inc/emoji.php');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->