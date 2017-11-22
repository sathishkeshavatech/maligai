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
error_reporting (E_ALL ^ E_NOTICE);	
	
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
<div class="cart"><a href="#" class="big-link" data-reveal-id="myModal"  title="View Cart"><img src="images/cartbck.png" /><span class="cart1"><?php echo get_total_count(); ?></span></a></div>
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
<div style="margin-bottom:25px;">
 

<div style="margin-bottom:25px;">
<h2  class="hlog" align="left">Delivery</h2>
 
 <h2  class="hlog" align="left">When will I get my products?</h2>
 
 <p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;">During the checkout process, you can choose your preferred time slot for delivery (i.e. Early Morning, Day Time & Late Evening) and then you can be rest assured of your order reaching your home at that specified time slot</p> 
 </div>
<div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">Cancellation by maligai.net</h2>
 
<p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;">If Maligai.net suspects any fraudulent or misleading transactions by any of the customer, Maligai at its sole discretion can cancel their orders and also deny their access to maligai.net in the future. </p>
 </div>
 <div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">Do I have to pay any delivery charges?</h2>
 
<p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;"> When you buy stuffs worth Rs.700 and above, we’ll do a free delivery at your doorstep. If the purchase amount is less than Rs.700, our CSE (Customer Satisfaction Executive) will collect a nominal charge of Rs.30 at the time of delivery.But we recommend all our customers to avoid delivery charges. </p>
 </div>
 <div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">Who will delivery my products?</h2>
 
<p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;">Our CSE would make a call to you well in advance before the delivery slot to confirm your availability. On confirmation our CSE would deliver those products at your doorstep.</p>  
 </div>
<div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">What if I am not available at the time of delivery?</h2>
 
<p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;">Kindly let us know well in advance if you would not be available at that specified time and we will make the necessary changes to accommodate your order in the next delivery schedule.
If we haven’t got any intimation on your non-availability and our CSE has reached your place, kindly make sure there is someone who can receive your orders and make the necessary payments for that order. </p>  
 </div>
 <div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">Will I be charged for re-delivering my order?</h2>
 
<p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;">A Nominal Charge of Rs.30 will be collected by our CSE in case of delivering the order for the second time.But we recomented all our customers to avoid delivery charges.</p>  
 </div>

 </div> 
 
 
        <p align="center">&nbsp; </p>
    

</div>
</div>
<?php include 'frontfooter.php'; ?>

</div>
</body>
</html>
