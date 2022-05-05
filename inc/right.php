<!-- right panel -->
<div class="col-md-3 text-center hidden-sm hidden-xs" id="right-panel">
    <div class="p20">
    <?php if(strlen($SET['ads_right_frame'])>0){ echo $SET['ads_right_frame'];}?>
    </div>
    <?php if(strlen($SET['right_frame_text'])>0){?>
        <div class="p20">
            <?php echo $SET['right_frame_text']?>        
        </div>
    <?php }?>
    <div>
        <hr>
        <?php if($SET['btn_purchase'] == 1){?>
        <a href="http://codecanyon.net/item/fake-iphone-text-generator/11195782?ref=FoxSash" target="_blank" rel="tooltip" data-placement="bottom" title="" data-original-title="Buy Now" class="btn btn-warning"><i class="fa fa-usd fa-fw"></i> Purchase</a>
        <?php } ?>
        <?php if($SET['btn_works'] == 1){?>
        <a href="?works" class="btn btn-primary"><i class="fa fa-star fa-fw"></i> Other works</a>
        <?php }?>
        <?php if($_SERVER['SERVER_ADDR'] == '151.248.126.10'){?>
        	<div class="text-center mt15">
	        	<a href="?admin" class="btn btn-primary"><i class="fa fa-sign-in fa-fw"></i> Admin panel</a>
            </div>
        <?php }?>
    </div>
</div>
<!-- right panel -->