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

error_reporting (E_ALL ^ E_NOTICE);	
if(isset($_POST['submit']))
{
	
			$mobile = $_POST['Mobile'];			
			
			$name=$_POST['name'];
			$email=$_POST['email'];	
	        $comment=$_POST['comment'];
			if(preg_match('/^\d{10}$/',$mobile)) 
			{
	             $mobileErr = "";
             }
			 else
			 {
				 $mobileErr = "Enter Mobile";
			 }
			  if(preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $email)){
				 
				 $emailerr="";
				 }
				 else{
					$emailerr="Enter correct email"; 
				 }
				 if($name!=""){
				 
				 $nameerr="";
				 }
				 else{
					  $nameerr="Enter Fullname";
					 
				 }
				  if($comment!=""){
					  
				 
				 $comenterr="";
				 }
				 else{
					  $comenterr="Enter your comment";
					 
				 }
				 $subject="Thanks for Enquery";
				 $subject1="Enquery Detail";
				 $msg="Dear Customer,
Thanks for sending mail on inquiry.

if you require urgent assistance  Call us at +8012333547 & 801233548. Mostly we will get back to you within few business hours.<br>


Thanks & Sincerely,
Maligai.com 

Our Mission: Online shopping .


Maligai.net Inc.,

Fax: (416) 369-0515<br>
E-mail: sales@maligai.net";
$admin="admin@maligai.net";
	$message1.='Name :'.$name."\r\n";
		
$message1.='phone number :'.$mobile."\r\n";
$message1.='email :'.$email."\r\n";
$header='From: Maligai.net' . "\r\n" .'Reply-To:sales@maligai.net'."\r\n";
'Name:'.$name.'';'X-Mailer: PHP/' . phpversion();
if($mobileErr==""&&$nameerr==""&&$emailerr==""&&$comenterr=="")
{
	mail($email,$subject,$msg,$header);
	mail($admin,$subject1,$message1,$header);
	$mess="Thanks for Enquery please check your email..";
}
else{
	$mess="Error for sending Email..";
}

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

<h2  class="hlog" align="left">Contact Us</h2>
 <div class="newlogin ">
 <div class="field2">
<b>Name*</b>
<input class="textdetail" type="text" name="name" value="" /><br />
<span class="error"><?php echo $nameerr;?></span>
 </div>
 
  <div class="field2 ">
<b>Email*</b>
<input class="textdetail" type="text" name="email" value="" /><br />
<span class="error"><?php echo $emailerr;?></span>
 </div>
 <div class="field2">
<b>Mobile*</b>
<input class="textdetail" type="text" name="Mobile" value="" /><br />
<span class="error"><?php echo $mobileErr;?></span>
 </div>

 </div>
 <div class="newlogin fL ">
 <div class="field2">
<b>Comment*</b>
<textarea id="comment" class="teaxrea" name="comment" title="Comment" cols="5" rows="3"></textarea>
 <div class="register">
<input  class="bbtn" type="submit" value="submit" name="submit" />
</div>
<span class="error"><?php echo $comenterrr;?></span>
 </div>
 <span class="error"><?php echo $mess;?></span>
 </div>
 
 <div class="newlogin">
<div class="newcontact ">
 <h2  class="hlog" align="left">Email Us</h2>
 <div class="page-contat">
 For any enquiries, mail us at  <b>sales@maligai.net</b>
 </div>
 </div>
 <div class="newcontact ">
 <h2  class="hlog" align="left">Call Us</h2>
 <div class="page-contat">
 We can be reached over phone at  <b>8012333547 & 8012333548</b>
 </div>
 </div>
 <div class="newcontact ">
 <h2  class="hlog" align="left">Visit Us</h2>
 <div class="page-contat">
<b>Our Address: </b>
<p>Amirthaa Maligai<br/>
<p>6,SRI NAGAR<br />
THIRUVANAI KOIL<br />
TRICHI-620005.<br />
Phone: 8012333547 & 8012333548</p>
 </div>
 </div>
 </div>
  <div class="newlogin">
<iframe width="400" height="275" frameborder="0" src="https://maps.google.co.in/maps?q=india+tamilnadu+trichy=en&sll=13.0…23.885942,45.079162&spn=12.108008,42.539063&z=5&output=embed" ></iframe>
</div>
 </div>
 </div>
        <p align="center">&nbsp; </p>
    </form>


<?php include 'frontfooter.php'; ?>

</div>
</body>
</html>
