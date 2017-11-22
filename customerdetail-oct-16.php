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
if(isset($_POST['register']))
{
	
					  $max = $db->maxOfAll("id","newusers");
					  $max=$max+1;
					  $userid="user-id-".$max."";
					 
	
			$mobile = $_POST['Mobile'];			
			$loginname = $_POST['loginname'];
			$password = $_POST['password'];	
			$confrim=$_POST['confrim'];
			$name=$_POST['name'];
			$email=$_POST['email'];	
			$area=$_POST['area'];
			 $subject="Your Registration Sucessfully done";
			  $result=mysql_query("select `user_name` from newusers where user_mail='$email'") or die(mysql_error());
	                 $row=mysql_fetch_array($result);
	                  $nam=$row['user_name'];
	           if($nam!="")
	             {
				  $errrr="Email already exist Did you".'<a href="forgotpassword.php">forgot password</a>';
	             }
				 else{
					  $errrr="";
					 }
			
			if(preg_match('/^\d{10}$/',$mobile)) 
			{
	             $mobileErr = "";
             }
			 else
			 {
				 $mobileErr = "Enter Mobile";
			 }
			
               if($password!=""){
				 
				 $passerr="";
				 }
				 else
				 {
					 $passerr="Enter Password";
				 }
				 if($password==$confrim){
				 
				 $confrimerr="";
				 }
				 else
				 {
					 $confrimerr="password not match"; 
				 }
				  if($name!=""){
				 
				 $nameerr="";
				 }
				 else{
					  $nameerr="Enter Fullname";
					 
				 }
				  if(preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $email)){
				 
				 $emailerr="";
				 }
				 else{
					$emailerr="Enter correct email"; 
				 }
				 if($area!=""){
				 
				 $areaerr="";
				 }
				 else{ 
				 $areaerr="Enter Area";
				 }
				 if($mobileErr==""&&$passerr==""&&$confrimerr==""&&$nameerr==""&&$emailerr==""&&$areaerr==""&&$errrr=="")
				 {
					 $db->query("INSERT INTO `newusers`( `user_id`, `user_name`, `user_mail`, `user_phone`, `user_address`, `date`, `password`) VALUES ('$userid','$name','$email','$mobile','$area',NOW(),'$password')");
					 
					 $message.='LoginId :'.$mobile."\r\n";
$message.='Password :'.$password."\r\n";
$message.='click here to login :http://www.maligai.net/userlogin.php';
$header='From: Maligai.com' . "\r\n" .'Reply-To:linkan650@gmail.com'."\r\n";
'X-Mailer: PHP/' . phpversion();
					 mail($email,$subject,$message,$header);
				 }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.2.css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
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


        <script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Asap:400,700:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
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
       
       
<form name="login" action="customerdetail.php" method="post">
<div class="innerallproducts">
<div class="customer2">
<h2  class="hlog" align="left">New Customer? Sign Up now!</h2>
 <div class="newlogin ">
 <h3 class="huser">Login details</h3>
 <div class="field2">
<b>Mobile Number*</b><span class="error"><?php echo $mobileErr;?></span>
<input class="textdetail" type="text" name="Mobile" value="" />
<p>This will be your login Number</p>
 </div>
 
  <div class="field2">
<b>Password*</b><span class="error"><?php echo $passerr;?></span>
<input class="textdetail" type="password" name="password" value="" />
<p> This will be your login Password</p>
 </div>
 <div class="field2">
<b>Confirm Password*</b><span class="error"><?php echo $confrimerr;?></span>
<input class="textdetail" type="password" name="confrim" value="" />
 </div>
 
 </div>
 <div class="newlogin ">
 <h3 class="huser">Personal Detail</h3>
 <div class="field2">
<b>Full Name*</b><span class="error"><?php echo $nameerr;?></span>
<input class="textdetail" type="text" name="name" value="" />
<p> As it should appear in the invoice</p>
 </div>
  <div class="field2">
<b>Email Address*</b><span class="error"><?php echo $emailerr;?></span>
<input class="textdetail" type="text" name="email" value="" />
<p>  For sending order confirmations</p>
 </div>
  <div class="field2">
<b>Customer Area*</b><span class="error"><?php echo $areaerr;?></span>
<select name="area" class="textdetail" name="area">
 <option value="default" selected="selected">select</option>
  <option value="Srirangam">Srirangam</option>
  <option value="Manapparai">Manapparai</option>
  <option value="Thuraiyur">Thuraiyur</option>
  <option value="Thuvakudi">Thuvakudi</option>
  <option value="Lalgudi">Lalgudi</option>
  <option value="Manachanallur">Manachanallur</option>
  <option value="Musiri">Musiri</option>
  <option value="Thottiyam">Thottiyam</option>
  <option value="Kolli Hills">Kolli Hills</option>
  <option value="Uppiliapuram">Uppiliapuram</option>
  <option value="Navalurkottapattu">Navalurkottapattu</option>
</select>
<p>Please note - Currently we serve only these areas in Chennai. If you do not see your area here, kindly send us a suggestion.
</p>
<div class="register">
<input  class="bbtn" type="submit" value="Register" name="register" />
 <a class="gotolog fL" href="userlogin.php">Goto login</a>
</div>
<div class="register">
<span class="error"><?php echo $errrr;?></span>
</div>
 </div>
 </div>
 </div>
 </div>
</form>
        <p align="center">&nbsp; </p>
      
</div>
<?php include 'frontfooter.php'; ?>

</div>


       
       
         
        
   
    
</body>
</html>
