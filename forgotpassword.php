<?php
include "dbc.php";
error_reporting(0);
$email=$_POST['email'];
$subject="Your password";
if(preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $email)){
				 
				 $emailerr="";
				 }
				 else{
					$emailerr="Enter correct email"; 
				 }
				 if(isset($_REQUEST['log']))
				 {
					 if($emailerr=="")
					 {
 $result=mysql_query("select `user_name`,`password`,`user_phone` from newusers where user_mail='$email'") or die(mysql_error());
	                 $row=mysql_fetch_array($result);
	                  $nam=$row['user_name'];
					  $mobile=$row['user_phone'];
					  $password=$row['password'];
	           if($nam!="")
	             {
				
				$message.='LoginId :'.$mobile."\r\n";
$message.='Password :'.$password."\r\n";

$header='From: Maligai.com' . "\r\n" .'Reply-To:linkan650@gmail.com'."\r\n";
'X-Mailer: PHP/' . phpversion();
					 mail($email,$subject,$message,$header);
					echo "<script>
alert('please check your mail');
window.location.href='userlogin.php';
</script>";

	             }
				 else{
					  $errrr="The email is not exist";
					 }
					 }
				 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/backtotop.css" type="text/css" media="screen" />

<!------------------- Main Menu query ---------------->

        
  
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'frontheader.php'; ?>
<div class="content">
<div class="inner-content">
&nbsp;&nbsp;
<form action="forgotpassword.php" method="post" name="logForm" id="logForm" >
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
       <div class="customer">
       
        <div class="nelogaa">
          <table class="tab1" align="center" >
            <tr> 
               <h2 class="hlog" align="center" ></h2>
             </tr> 
              <tr ><td class="td">Enter email</td><td class="td"><input type="text" class="tee" name="email" value="" /><br><span class="error"><?php echo $emailerr;?></span></td> </tr>
                
<tr><td class="td">

</td>
<td class="td">
<input  class="bbtn" type="submit" value="update" name="log"></input></td>
<span class="error"><?php echo $errrr;?></span>
<span class="error"><?php echo $eee;?></span>
 </tr> 
          </table>
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