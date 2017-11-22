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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ragadesigners Shoppingcart</title>
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script src="js/jquery1.js" type="text/javascript"></script>
<script src="js/settings.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.date_input.js"></script>
<link rel="stylesheet" href="css/date_input.css" type="text/css">
<script type="text/javascript">
$(function() {
    $("#from_pro_date").date_input();
    $("#to_pro_date").date_input();
});

function pro_report_fn() 
{ 
 window.open("product_report.php?from_pro_date="+$('#from_pro_date').val()+"&to_pro_date="+$('#to_pro_date').val(),"myNewWinsr","width=1000,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
   
}
</script> 
<?php include 'header.php'; ?>
<div class="content">
<div class="inner-content">
<h4 class="dash">Edit Products</h4>
<div class="bor"></div>
 <table width="100%" height="64" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
      <td><strong> Product Report </strong></td>
      <td><div align="right">From</div></td>
      <td><input name="from_pro_date" type="text" id="from_pro_date" class="addin"></td>
      <td><div align="right">To</div></td>
      <td><input name="to_pro_date" type="text" id="to_pro_date" class="addin"></td>
      <td><input name="submit" type="button" value="Show" onclick='pro_report_fn();' class="button sub2" /></td>
      <form action="product_report.php" method="post" name="quote_report" target="_blank">
      </form>
  </tr>
</table>
 <iframe width="100%" height="1005" frameborder="0" src="iframeeditproducts.php" marginheight="0" scrolling="yes"></iframe>
</div>
</div>
<?php include 'footer.php'; ?>
</head>
</html>