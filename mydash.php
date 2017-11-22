<?php
include "dbc.php";
error_reporting(0);
include("functions.php");
//$id1=$_SESSION['raga_id'];
//srand((double) microtime( ) *1000000);
	//$random=rand();
	//$autoid=$random;
//if(!checkAdmin()) {
//header("Location: login.php");
//exit();
//}

if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		header("location:shoppingcart.php");
		exit();
		
		
		
		
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/backtotop.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.2.css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>	
<script src="http://cdn.webrupee.com/js" type="text/javascript"></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js/jquery.dcmegamenu.1.3.3.js'></script>
<script type="text/javascript">
$(document).ready(function($){
	
	$('#mega-menu-7').dcMegaMenu({
		rowItems: '3',
		speed: 'fast',
		effect: 'slide'
	});
	
});
</script>

<link href="css/green.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/menuuu.css" type="text/css" media="screen">
<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />

<!------------------- Main Menu query ---------------->

        
  
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'frontheader.php'; ?>
<div class="ecommenu">
<div class="innerecommenu" >
<div class="emenu" >
<div class="nav-container">
<div class="nav">
<?php include "mainmenunew.php";?>
<div class="cart"><a href="#" class="big-link" data-reveal-id="myModal"  title="View Cart"><img src="images/cartbck.png" /></a></div>
</div>
</div>
</div>
</div>


<div class="content">
&nbsp;&nbsp;
<?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	  if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "$e <br>";
	    }
	  echo "</div>";	
	   }
	  /******************************* END ********************************/	  
	  ?>
        <div class="innerallproducts">
       <div class="conta clearfix">


 <div class="place ">
 <h2  class="hlog" align="left">Your order</h2>
 <ul class="quickmenulist">
 <li><a href="mydash.php">Dashboard</a></li>
  <li><a href="placeorder.php">Your Order</a></li>
 <li><a href="previous.php">Previous order</a></li>
 </ul>
 </div>
 <div class="placeorde ">
 <h2  class="hlog" align="left">MyDashboard</h2>
<div class="spanda">
 <h3 >Account Information</h3>
 </div>
<div class="box-title">
        Contact Information
</div>
<?php 
$user=$_SESSION['uuser'];
$phone=$_SESSION['user_phone'];
$sql5 = "SELECT * FROM newusers where user_name='$user'";
$result5 = mysql_query($sql5);
			while($r9 = mysql_fetch_array($result5))
			{ 
			$user_mail=$r9['user_mail'];
			$user_phone=$r9['user_phone'];
			$user_id=$r9['user_id'];
?>
 <div class="spandash">
<?php echo $user; ?><br />
<?php echo $user_phone; ?><br />
<?php echo $user_mail; ?>
 </div>
 <div class="box-title">
        Default shipping Address
</div>
<?php
 $sql4 = "SELECT * FROM orders2 where `Phone-no`='$user_phone' AND `user-id`='$user_id' ORDER BY order_id DESC LIMIT 1";
			$result4 = mysql_query($sql4);
			while($r4 = mysql_fetch_array($result4))
			{
				$deliveryaddress=$r4['deliveryaddress'];
				 $landmark=$r4['landmark'];
				 $area=$r4['area'];
			?>
<div class="spandash">	
Address :<?php echo $deliveryaddress; ?><br />
Landmark : <?php echo $landmark; ?><br />
Area : <?php echo $area; ?>
 </div>
 <?php }} ?>
  <div class="box-title">
       Savings from maligai.com
</div>
<div class="spandash">
<p>You have saved <b style="color:#851F56;"> Rs. 355.1</b> from your purchases at Maligai.</p>
 </div>
 
<div style="float:right">

 </div>
 </div>
 
 </div>
 </div>
        <p align="center">&nbsp; </p>
    </form>


<?php include 'frontfooter.php'; ?>

</div>
</body>
</html>
