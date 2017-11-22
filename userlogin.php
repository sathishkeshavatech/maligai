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
if(isset($_POST['log']))
{
	$loginname=$_POST['lname'];
	$password=$_POST['lpass'];
	// echo 'name '.$loginname; echo "<br><br>"; echo 'pass '.$password; 
	
	$result=mysql_query("select `user_phone`,`user_name` from newusers where password='$password'") or die(mysql_error());
	// echo 'name '.$loginname; echo "<br><br>"; echo 'query '.$result; 
	 $row=mysql_fetch_array($result);
	 //echo '<pre>row '; print_r($row); exit;
	$nam=$row['user_phone'];
	$usernam=$row['user_name'];
	if($loginname==$nam)
	{
		
		$_SESSION['uuser']=$usernam;
		$_SESSION['user_phone']=$nam;
		header("location:index.php");
	}
	else{
		$errrrr="your username or password incorrect";
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>
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

<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />

        
  
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
<form action="userlogin.php" method="post" name="logForm" id="logForm" >
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
       
       <div class="newlogin ">
       <h2 class="hlog" align="left" >Login or Create Account</h2>
       <h3 class="hlog1">New Customers</h3>
       <p>By creating an account at Maligai.net, you will be able to re-order your regular items, plan your next month purchase, keep track of your monthly savings and much more. Having an account with us is mandatory to make a purchase.</p>
       <a class="newreg fR" href="customerdetail.php">New Registration</a>
       </div>
        <div class="newlogin">
          <table class="tab1 fR" >
            <tr> 
               <h2 class="hlog" align="center" >Registered User</h2>
             </tr> 
              <tr ><td class="td">Mobile</td><td class="td"><input type="text" class="tee" name="lname" value="" /></td> </tr>
<tr><td class="td">Password</td><td class="td"><input class="tee" type="password" name="lpass" value="" /></td> </tr>
<tr><td class="td">
<a  href="forgotpassword.php">Forgot password</a>
</td>
<td class="td">
<input  class="bbtn" type="submit" value="login" name="log"></input></td>
<span class="error"><?php echo $errrrr;?></span>
 </tr> 
          </table>
         </div>
      
      </div>
      </div>
        <p align="center">&nbsp; </p>
      </form>


<?php include 'frontfooter.php'; ?>

</div>
   
</body>
</html>
