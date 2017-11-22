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
if(isset($_REQUEST['update']))
{
	
					 
					 
	        $userid=$_POST['userid'];
			$mobile = $_POST['Mobile'];			
			$loginname = $_POST['loginname'];
			$password = $_POST['password'];	
			$confrim=$_POST['confrim'];
			$name=$_POST['name'];
			$email=$_POST['email'];	
			$area=$_POST['area'];
			 $subject="Your Registration Sucessfully done";
			  
	          
			
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
				 if($mobileErr==""&&$nameerr==""&&$emailerr==""&&$areaerr=="")
				 {
					echo $db->query("UPDATE `newusers` SET `user_name`='$name',`user_mail`='$email',`user_phone`='$mobile',`user_address`='$area' WHERE `user_id`='$userid'");
					$errrrr="updated sucessfully";
					 
					
				 }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
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

<!------------------- Main Menu query ---------------->

        
 
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'frontheader.php'; ?>
<div class="ecommenu">
<div class="innerecommenu" >

<div class="nav-container">
<div class="nav">
<?php include "mainmenunew.php";?>
<div class="cart"><a href="#" class="big-link" data-reveal-id="myModal"  title="View Cart"><img src="images/cartbck.png" /><span class="cart1"><?php echo get_total_count(); ?></span></a></div>
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
       <div class="customer2">
 <form name="edit" action="edit-profile.php" method="post">

      <?php
       $naam=$_SESSION['uuser'];
	   $phn=$_SESSION['user_phone'];
$sql1=mysql_query("SELECT * FROM `newusers` WHERE `user_name`='$naam' AND `user_phone`='$phn'");
while($row1=mysql_fetch_array($sql1))
				{
			
			?>
<h2  class="hlog" align="center">Edit Profile</h2>
 <div class="newlogin ">
 <h3 class="huser">Customer details</h3>
 <div class="field2">
<b>Mobile Number*</b><span class="error"><?php echo $mobileErr;?></span>
<input class="textdetail" type="text" name="Mobile" value="<?php echo $row1['user_phone']; ?>" />
<p>this is will we your login Name</p>
 </div>
 <input  type="hidden" name="userid" value="<?php echo $row1['user_id']; ?>" />
 
 
 
 <div class="field2">
<b>Full Name*</b><span class="error"><?php echo $nameerr;?></span>
<input class="textdetail" type="text" name="name" value="<?php echo $row1['user_name']; ?>" />
<p> As it should appear in the invoice</p>
 </div>
  <div class="field2">
<b>Email Address</b><span class="error"><?php echo $emailerr;?></span>
<input class="textdetail" type="text" name="email" value="<?php echo $row1['user_mail']; ?>" />
<p>  For sending order confirmations</p>
 </div>
  <div class="field2">
<b>Customer Area*</b><span class="error"><?php echo $areaerr;?></span>
<input class="textdetail" type="text" name="area" value="<?php echo $row1['user_address']; ?>" />

<div class="register">
<input  class="bbtn" type="submit" value="update" name="update" />
</div>
<div class="register">
<span class="error"><?php echo $errrrr;?></span>

</div>
 </div>
 </div>
 </div>
 </div>
 <?php } ?>
</form>
        <p align="center">&nbsp; </p>
      
</div>
<?php include 'frontfooter.php'; ?>

</div> 
</body>
</html>
