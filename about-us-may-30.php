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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50451271-1', 'maligai.net');
  ga('send', 'pageview');

</script>
        
  
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
<form action="contac.php" method="post" name="logForm" id="logForm" >
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
<form name="login" action="customerdetail.php" method="post">
 
 <div class="newcontact ">
 <h2  class="hlog" align="left">About Us</h2>
 <div class="page-contat">
 <b>Maligai.net</b> is Trichy's new online grocery store. With over thousands of products and brands to choose from, grocery shopping has never been this easy for Trichy. It’s time to put an end to all your chaotic shopping visits to our very own neighbourhood.
 </div>
 </div>
 <div class="newcontact ">
 <h2  class="hlog" align="left">What’s in store?</h2>
 <div class="page-contat">
Provisions to Cook, Biscuits to Eat, Coffee to Drink, Soaps & Creams to take care of you, Cleaning liquids to take care of your home, Razors for Him, Lip Gloss for Her, Diapers for your baby and Gifts for your loved ones (Are we missing out anything?? Ahh No way!!) 
 </div>
 </div>
 <div class="newcontact ">
 <h2  class="hlog" align="left">Why shop Online?</h2>
 <div class="page-contat">
Shopping can be fun but not at the cost of your friends & family. We at Maligai strongly believe in human emotions and relationships, which is why we would like you to strike a perfect work-life balance amidst your busy schedule. By shopping online you don’t just save your money but also your valuable time, which otherwise could be spent with your loved ones.
 </div>
 </div>
 <div class="newcontact ">
 <h2  class="hlog" align="left">But why Maligai?</h2>
  <div class="page-contat">
Maligai is not just an online platform to sell groceries rather it is much more focused in delivering happiness at your doorstep. With three delivery slots to choose from at your convenience, lowest prices and our firm commitment towards next day delivery, it is surely the best place in town for all your grocery needs. 
 </div>
 </div>
 </div>
 
        <p align="center">&nbsp; </p>
    </form>

</div>
<?php include 'frontfooter.php'; ?>

</div>
</body>
</html>
