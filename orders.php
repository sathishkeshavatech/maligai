<?php
include "dbc.php"; 
page_protect();
//if(!checkAdmin()) {
//header("Location: login.php");
//exit();
//}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</script> 
<?php include 'header.php'; ?>
<div class="content">
<div class="inner-content">
<h4 class="dash">Orders</h4>
<div class="bor"></div> 
 <iframe width="100%" height="1005" frameborder="0" src="iframeorders.php" marginheight="0" scrolling="yes"></iframe>
</div>
</div>
<?php include 'footer.php'; ?>
</head>
</html>