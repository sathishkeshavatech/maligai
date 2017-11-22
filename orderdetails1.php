
<?php
include "dbc.php"; 
page_protect();
//$id1=$_SESSION['raga_id'];
//srand((double) microtime( ) *1000000);
	//$random=rand();
	//$autoid=$random;
//if(!checkAdmin()) {
//header("Location: login.php");
//exit();
//}
error_reporting (E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Niceforms</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />
</head>

<body>
<div id="container">
<div class="fL">
        <form action="orderdetails1.php" method="post" class="niceform">
    <fieldset>
      <legend>Order Details</legend>
      <div class="customer-heading-text" style="text-align: left; padding-left: 20px; color: ##666; font-style:normal; color:#0000FF; display:inline-block;">Fill in your
        information</div>
      <dl>
        <dt>
          <label for="email">Name:</label>
        </dt>
        <dd>
        
          <input type="text" name="Name" id="Name" size="32" maxlength="128" placeholder="Name"  required="required" />
        </dd>
      </dl>
      <dl>
        <dt>
          <label for="password">EmailId:</label>
        </dt>
        <dd>
          <input type="text" name="EmailId" placeholder="Email Address" id="EmailId" size="32" maxlength="32" required="required" />
        </dd>
      </dl>
      <dl>
        <dt>
          <label for="email">password:</label>
        </dt>
        <dd>
          <input type="password" name="password" id="password" size="32" maxlength="10" placeholder="password" required="required"/>
        </dd>
      </dl>
      
      <div class="button-outer">
       <input type="submit" name="submit" value="submit" />
      </div>  
 </form>
      <?php 
	  
	  $name=$_POST['Name'];
	  $Email=$_POST['EmailId'];
	  $password=$_POST['password'];
	  if(isset($_REQUEST['submit']))
	  {
		 
	if(!empty($_POST['password'])) {
  $pwd = $post['password'];	
  $hash = PwdHash($post['password']);
 }  
 else
 {
  $pwd = GenPwd();
  $hash = PwdHash($pwd);
  
 }
if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
{
	echo "Please Enter your Valid email";
}
else
{
		  $sql=mysql_query("INSERT INTO `user_details`( `Name`, `EmailId`, `password`) VALUES ('$name','$Email','$hash')");
		  if($sql)
		  {
			 header("location:shopping.php");
			  
		  }
		  else
		  {
			  echo "insertion failure";
		  }
	  }
	  }
	  
	  ?> 

</div>
<form name="aa" action="orderdetails1.php" method="post">
<div class="checkout-signin-boxWrapper fL" style="margin-top:-170PX;">
        <div class="checkout-signbox">
          <div class="checkout-alreday-head">Already Have an Account</div>
          <div class="checkout-already_button signinToCheckout">
            <input type="submit" name="submit1" value="Sign In" style="background-color:#999999; margin-top:3px;padding-bottom:-1px;  display:inline-block;" />
            
            <?php 
			if(isset($_REQUEST['submit1']))
			{
				header("location:signin.php");
			}
			
			?>
            
          </div>
        </div>
      </div>
      </form>
</div>
</body>
</html>