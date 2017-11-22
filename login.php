<?php 
include 'dbc.php';

$err = array();

foreach($_GET as $key => $value) {
	$get[$key] = filter($value); //get variables are filtered.
}

if ($_POST['doLogin']=='Login')
{

foreach($_POST as $key => $value) {
	$data[$key] = filter($value); // post variables are filtered
}


$user_email = $data['usr_email'];
$pass = $data['pwd'];


if (strpos($user_email,'@') === false) {
    $user_cond = "user_name='$user_email'";
} else {
      $user_cond = "user_email='$user_email'";
    
}
	
$result = mysql_query("SELECT `id`,`pwd`,`full_name`,`approved`,`user_level`,`raga_id` FROM users WHERE 
           $user_cond
			AND `banned` = '0'
			") or die (mysql_error()); 
$num = mysql_num_rows($result);

  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num > 0 ) { 
	
	list($id,$pwd,$full_name,$approved,$user_level,$raga_id) = mysql_fetch_row($result);
	
	if(!$approved) {
	//$msg = urlencode("Account not activated. Please check your email for activation code");
	$err[] = "Account not activated. Please check your email for activation code";
	
	//header("Location: login.php?msg=$msg");
	 //exit();
	 }
	 
		//check against salt
	if ($pwd === PwdHash($pass,substr($pwd,0,9))) { 
	if(empty($err)){			

     // this sets session and logs user in  
       session_start();
	   session_regenerate_id (true); //prevent against session fixation attacks.

	   // this sets variables in the session 
		$_SESSION['user_id']= $id;  
		$_SESSION['user_name'] = $full_name;
		$_SESSION['user_level'] = $user_level;
		$_SESSION['raga_id'] = $raga_id;
		$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
		
		//update the timestamp and key for cookie
		$stamp = time();
		$ckey = GenKey();
		mysql_query("update users set `ctime`='$stamp', `ckey` = '$ckey' where id='$id'") or die(mysql_error());
		
		//set a cookie 
		
	   if(isset($_POST['remember'])){
				  setcookie("user_id", $_SESSION['user_id'], time()+60*60*24*COOKIE_TIME_OUT, "/");
				  setcookie("raga_id", $_SESSION['raga_id'], time()+60*60*24*COOKIE_TIME_OUT, "/");
				  setcookie("user_key", sha1($ckey), time()+60*60*24*COOKIE_TIME_OUT, "/");
				  setcookie("user_name",$_SESSION['user_name'], time()+60*60*24*COOKIE_TIME_OUT, "/");
				  
				  }
		  header("Location: dashboard.php");
		 }
		}
		else
		{
		//$msg = urlencode("Invalid Login. Please try again with correct user email and password. ");
		$err[] = "Invalid Login. Please try again with correct user email and password.";
		//header("Location: login.php?msg=$msg");
		}
	} else {
		$err[] = "Error - Invalid login. No such user exists";
	  }		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/backendstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script src="js/jquery1.js" type="text/javascript"></script>
<script src="js/settings.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.date_input.js"></script>
<link rel="stylesheet" href="css/date_input.css" type="text/css">
<!--<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>-->
<title>Raga Designers Shoppingcart</title>
<body>
<div class="wrapper">
<div class="header">
<div class="inner-header">
<div class="inner-header-top">
<div class="logo"><a href="index.php" class="alogo"></a></div>
    <div class="topmenu">
<?php if (isset($_SESSION['user_id'])) { ?>
  <span class="table0 wel">Welcome</span><a href="index.php" class="table0"> <?php echo $_SESSION['user_name'];?></a><span class="table0"> | </span><a href="logout.php" class="table0"> Logout</a> | 
  <?php } else { ?>
  <a href="myaccount.php" class="table0">Login</a> | 
  <?php } ?>
 <a href="frontindex.php" class="table0">View Store</a> | 
<a href="feedback.php" class="table0">FeedBack</a> | 
<a href="sitemap.php" class="table0">Sitemap</a>
</div>
</div>
<div class="inner-header-bottom">
</div>
</div>
</div>
<div class="content">
<div class="inner-content">
&nbsp;&nbsp;
<form action="login.php" method="post" name="logForm" id="logForm" >
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
        <div align="center">
        <div class="loginbg">
          <table width="400" height="216" border="0" align="center" cellpadding="4" cellspacing="4" class="table_bg">
            <tr> 
              <td height="36" colspan="4"><h2 align="center">Member Login</h2></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="20">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="27%">&nbsp;</td> 
              <td width="19%" height="30"><strong>Email ID</strong></td>
              <td width="27%"><input name="usr_email" type="text" class="required addin" id="txtbox" size="25" /></td>
              <td width="27%">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td> 
              <td height="30"><strong>Password</strong></td>
<td><input name="pwd" type="password" class="required password addin" id="txtbox" size="25" />
                  <a href="forgot.php"></a></td>
                <td><div align="left"><a href="forgot.php">?</a></div>
                <div align="left"></div></td>
            </tr>
            
            <tr>
              <td height="30" colspan="4">&nbsp;</td>
            </tr>
            <tr> 
              <td height="30" colspan="4"> <div align="center"> 
                <p> 
                  <input name="doLogin" type="submit" id="doLogin" value="Login" class="button log">
                </p>
                    </div></td>
              </tr>
          </table></div>
      </div>
        <p align="center">&nbsp; </p>
      </form>
</div>
</div><?php include 'footer.php'; ?>
</body>
</html>