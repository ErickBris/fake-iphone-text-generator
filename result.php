<div class="container" id="download-result">
		<div class="row">
        	<div class="col-md-12" style="padding-top:60px;">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <div id="image-container text-center">
                            <img src="" id="image-result" style="display:none;">
                            <img id="blurred-result" class="img-responsive">
                        </div>		
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control input-lg" id="img_url" value="" onclick="this.select();">
                        </div>
                        <div class="form-group">
                            <label for="BBCode">BBCode</label>
                            <input type="text" class="form-control input-lg" id="BBCode" value="" onclick="this.select();">
                        </div>
		                <div class="form-group">
                            <label for="HTML">HTML</label>
                            <input type="text" class="form-control input-lg" id="HTML" value="" onclick="this.select();">
                        </div>
                        <br>
                        <br>
                        <?php 
						if($SET['social']['facebook'] == 1 || $SET['social']['google'] == 1 || $SET['social']['twitter'] == 1 || $SET['social']['pinterest'] == 1){						
							?>
                        <div class="text-center">
                            <div class="btn-group" id="social">
                              <?php if(isset($SET['social']['facebook']) && $SET['social']['facebook'] == 1){?>                            
                              <a class="btn btn-default social" href="https://www.facebook.com/sharer/sharer.php?display=popup&amp;u="><i class="fa fa-facebook-square fa-fw"></i> Facebook</a>
                              <?php }?>
                              <?php if(isset($SET['social']['google']) && $SET['social']['google'] == 1){?>                           
                              <a class="btn btn-default social" href="https://plus.google.com/share?url="><i class="fa fa-google-plus-square fa-fw"></i> Google Plus</a>
                              <?php }?>
                              <?php if(isset($SET['social']['twitter']) && $SET['social']['twitter'] == 1){?>                           
                              <a class="btn btn-default social" href="https://twitter.com/intent/tweet?text=<?php echo urlencode($SET['site_name'])?>&amp;url="><i class="fa fa-twitter fa-fw"></i> Twitter</a>
                              <?php }?>
                              <?php if(isset($SET['social']['pinterest']) && $SET['social']['pinterest'] == 1){?>                                                         
                              <a class="btn btn-default social" href="http://pinterest.com/pin/create/button?description=<?php echo urlencode($SET['site_name'])?>&amp;media="><i class="fa fa-pinterest fa-fw"></i> Pinterest</a>
                              <?php }?>
                            </div>
                          </div>
                        <?php }?> 
                        <br>
                        <a href="<?php echo $home?>" class="btn btn-primary"><i class="fa fa-pencil fa-fw"></i> Build another</a>
                        <a href="" class="btn btn-primary" id="img_down"><i class="fa fa-download fa-fw"></i> Download image</a>
                    </div>
        
                </div>
            </div>
		</div>
</div>    