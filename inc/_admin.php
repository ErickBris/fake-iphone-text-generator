<?php
if($admin == true){
require_once('admin/_header.php');
if(count($_GET) == 1 || isset($_GET['general'])){
	require_once('admin/_geniral.php');
}elseif(isset($_GET['gallery'])){
	require_once('admin/_gallery.php');
}elseif(isset($_GET['language'])){
	require_once('admin/_language.php');
}elseif(isset($_GET['edit_lang'])){
	require_once('admin/edit_lang.php');
}
require_once('admin/_footer.php');      
}else{?>
<div class="container" style="padding-top:120px;">
	<div class="row">
	    <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default redir">
                <div class="panel-body">
                	<?php if($_SERVER['SERVER_ADDR'] == '151.248.126.10'){?>
                	<div class="alert alert-info">Login: <strong><?php echo $SET['admin_name']?></strong><br>Password: <strong><?php echo $SET['admin_pass']?></strong></div>
                    <?php }?>
                    <form action="" method="post" role="form" class="form-horizontal">
                        <div class="form-group">
                            <label for="login" class="col-md-3 control-label"><?php echo __('Login')?></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-lg" id="login" name="login" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-md-3 control-label"><?php echo __('Password')?></label>
                            <div class="col-md-9">
                                <input type="password" class="form-control input-lg" id="pass" name="pass" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <?php echo _b("b","","fa-sign-in",__('Login'))?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
     </div>
</div>        
<?php }?>