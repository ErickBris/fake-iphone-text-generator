<?php
require_once('inc/function.php');
echo "images/".date('d-m-Y',time())."/".current(scan_dir($folder = "images/".date('d-m-Y',time())."/")); 
?>
