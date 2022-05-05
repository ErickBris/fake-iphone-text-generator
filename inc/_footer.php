	</div>
</div>
<!-- footer -->
   <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                 <?php if(isset($SET['page_about']) && $SET['page_about'] == 1){?>
                <a href="?about"><i class="fa fa-book fa-fw"></i> <?php echo __('About us'); ?></a>	|		
                <?php }?>
                <?php if(isset($SET['page_police']) && $SET['page_police'] == 1){?>
                <a href="?policy"><i class="fa fa-gavel fa-fw"></i> <?php echo __('Policy and Term'); ?></a>			
                <?php }?>
                    <div class="pull-right font9">
                    © 2015 <?php echo $SET['site_name']?> <a href="change_log.html" target="_blank"><?php echo $SET['version']?></a>. <?php echo $SET['copyright']?>
                    </div>
                </div>
            </div>
        </div>
   </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-switch.min.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/html2canvas.js"></script>
    <script src="assets/js/jquery.plugin.html2canvas.js"></script>
    <script src="assets/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.waitforimages.js"></script>

    <script src="assets/js/custom.js?<?php echo time()?>"></script>
    <?php if(isset($SET['google_analytics']) && strlen($SET['google_analytics'])){?>
    <?php echo $SET['google_analytics']."\n"?>
    <?php } ?>
  </body>
</html>
<!-- footer -->