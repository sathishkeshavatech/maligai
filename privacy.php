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
 <h2  class="hlog" align="left">Privacy</h2>
 
 <p style="margin-left:15px; margin-right:15px; font-size:15px;    font-family: Arial;">Maligai Store respects your privacy and the personal information collected from you at the time of signup will only be used for communication and delivery purposes. As a Krocery customer, you are advised to kindly read through our terms and conditions carefully before accessing the site and using the services provided by Maligai.</p>  
 
</div>
<div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">Service</h2>
 
 <p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;">Services of <b>maligai.net</b> are now available only to selected areas in Trichy city. Orders can be placed at krocery.com 24 x 7 and phone orders will be taken from 6am – 10pm.</p>  
 </div>
 <div style="margin-bottom:25px;">

 <h2  class="hlog" align="left">Pricing</h2>
 
<p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;">Products displayed in <b>maligai.net</b> are sold at MRP and only in the case of any discounts they are sold below MRP as displayed in the website. An order can be placed 4 days in advance and the prices shown at the time of order are indicative prices and the applicable prices will be the actual prices at the time of delivery.</p>  
 </div>

<div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">Cancellation by maligai.net</h2>
 
 <p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;">In case of any cancellation or modification of the order, you can call us at 7200 117 117 or write to us at maligai.net Kindly make sure we hear from you at least 12 hours before the scheduled delivery time</p> 
 </div>
<div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">Color & appearance</h2>
 
<p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;"> Maligai.net has taken its best efforts to portray the color and appearance of the products displayed in the website as accurate as possible. Color and image of those products displayed in the website may vary depending on the monitor settings and maligai.net cannot guarantee you for any color variations under such circumstances.</p>
 </div>
 <div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">Copyrights</h2>
 
<p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;">  Maligai.Net website (whole / partial) cannot be duplicated, sold or exploited for any commercial purposes by any individual or a merchant unless they have an express written consent from krocery.com. Krocery Store would not entertain any form of resale of goods bought from maligai.net. Unless a written express consent from Krocery, a merchant or an individual is not authorized to copy the product images, product listings, descriptions and logo from maligai.net for any personal / commercial use.</p>  
 </div>
<div style="margin-bottom:25px;">
 <h2  class="hlog" align="left">Arbitrationt</h2>
 
<p style="margin-left:15px; margin-right:15px; font-size:15px;font-family: Arial;"> Maligai.net may at any time modify the Terms & Conditions of Use of the website without any prior notification to you. You shall access the latest version of these Terms & Conditions at any given time at krocery.com. You should regularly review the Terms & Conditions on maligai.net. In the event the modified Terms & Conditions is not acceptable to you, you should discontinue from using this Service. However, if you continue to use the service you shall be deemed to have agreed to accept and abide by the modified Terms & Conditions of use of this website.</p>  
 </div>
 </div> 
 
 
        <p align="center">&nbsp; </p>
    

</div>
<?php include 'frontfooter.php'; ?>

</div>
</body>
</html>
