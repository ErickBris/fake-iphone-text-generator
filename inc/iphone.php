<div id="center-panel" class="col-md-6">
<?php
	$error = array();
	if(file_perms('images') <> 77) {$error[]= "Set permission '<strong>777</strong>' to folder <b>images</b>";}
	if(count($error) > 0){?>
    	<div class="row">
        	<div class="col-md-4"></div>
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <?php echo "<li>".implode('<li>',$error)?>
                </div>
            </div>    
        </div>
      <?php }  ?>

    <?php if(!file_exists('config.php')){ ?>
        <div class="row">
        	<div class="col-md-4"></div>
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <?php echo "Rename the file <strong>config.dist.php</strong> to <strong>config.php</strong> "?>
                </div>
            </div>    
        </div>
     <?php }?>
    <div id="download-loading">
		<i class="fa fa-mobile-phone fa-spin il"></i>
		<br>
		<strong><?php echo __('Generating image &amp; Download link')?></strong>
		<br>
		<span class="text-o"><?php echo __('Hold on a sec...')?></span>
	</div>
	<?php require_once('result.php');?>   
	<div id="iphone">
		<div id="top"></div>
		<div id="center">
			<div id="msg">
				<div id="msg-top">
					<div class="col-md-4 col-xs-4">
						<div id="connection" class="pull-left">
							<img src="assets/images/3g-3.png" id="signal-img">
						</div>
						<div id="operator" class="pull-left">
							<span id="operator-result" class="result"></span>
						</div>
						<div id="connection-type" class="pull-left">
							<div id="connection-type-wifi-wrapper">
								<img src="assets/images/wifi-3.png" id="connection-type-wifi">
							</div>
							<div id="connection-type-3g">3G</div>
							<div id="connection-type-4g">4G</div>
							<div id="connection-type-lte">LTE</div>                            
						</div>
					</div>
					<div class="col-md-4 col-xs-4 text-center">
						<div id="clock"><span id="clock-result" class="result"></span></div>
					</div>
					<div class="col-md-4 col-xs-4 text-center">
						<div class="pull-right">
							<div id="battery"><div id="battery-percent"></div></div>
						</div>
						<div class="pull-right mr5">
							<div id="battery-percent-number-container">
								<span id="battery-percent-number">50</span>%
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-4 col-xs-4" id="txt-messages-container">
						<div id="txt-messages">
							<div class="pull-left">
								<img src="assets/images/messages-arrow.jpg">
							</div>
							<div class="pull-left mt1ml5" id="text-messages-result-container">
								<span id="text-messages-result" class="result"><?php echo __('Messages')?></span>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-4 text-right" id="txt-name-container">
						<div id="txt-name">
							<span id="name-result" class="result"><?php echo __('John Doe')?></span>
						</div>
					</div>
					<div class="col-md-4 col-xs-4 text-right" id="text-contact-result-container">
						<div id="txt-contact">
							<span id="text-contact-result" class="result"><?php echo __('Contact')?></span>
						</div>
					</div>
				</div>
				<div id="msgs-wrapper">
					<ul id="msgs" class="ui-sortable">
                        <li class="msg-timestamp example-msg" id="example-msg">
                            <div class="content"><p><span><?php echo __('Today')?></span> 8:32 AM</p></div>
                            <div class="sep"></div>
                        </li>
						<li class="msg green example-msg">
						<div class="content">
                        	<p><?php echo __('asd Is this really a Fake iOS iPhone message?')?></p>
							<div class="sep"></div>
						</div>
						</li>
						<li class="msg example-msg">
                            <div class="content"><p><?php echo __('Yeah it is! And you can make one too. Use the tools to the left to build your own.')?></p></div>
                            <div class="sep"></div>
						</li>
						<li class="msg blue example-msg">
                            <div class="content"><p><?php echo __('And I can even write an iMessage and upload a photo from my desktop or smartphone! Nice!')?></p></div>
                            <div class="sep"></div>
						</li>
						<li class="msg-img example-msg">
                            <div class="top-left-border img-borders"></div>
                            <div class="top-right-border img-borders"></div>
                            <div class="bottom-left-border img-borders"></div>
                            <div class="bottom-right-border img-borders"></div>
                            <img src="assets/images/img.jpg">
						</li>
					</ul>
				</div>
				<div id="msgs-bottom">
					<div id="text-textmessage-result"><?php echo __('Text Message')?></div>
					<div id="text-send-result"><?php echo __('Send')?></div>
				</div>
			</div>
		</div>
		<div id="bottom"></div>
        
	</div>
</div>    