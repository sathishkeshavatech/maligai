<?php
include "dbc.php";
error_reporting(0);



error_reporting (E_ALL ^ E_NOTICE);	
if(isset($_POST['log']))
{
	$adminname=$_POST['lname'];
	$adminpassword=$_POST['lpass'];
	
	$result=mysql_query("select * from adminlog where password='$adminpassword' AND username='$adminname'") or die(mysql_error());
	 $row=mysql_fetch_array($result);
	$name=$row['username'];
	$password=$row['password'];
	if($adminname==$name&&$password==$adminpassword)
	{
		$_SESSION['adname']=$adminname;
		$_SESSION['adpass']=$adminpassword;
		header("Location:insertprod.php");
	}
	else
	{
		$errrrr="your username or password incorrect";
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

<!------------------- Main Menu query ---------------->

        
  
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'adminheader.php'; ?>




<div class="content">
&nbsp;&nbsp;
<form action="administratorlogin.php" method="post" name="logForm" id="logForm" >
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
               <h2 class="hlog" align="center" >Admin Login</h2>
             </tr> 
              <tr ><td class="td">LoginName</td><td class="td"><input type="text" class="tee" name="lname" value="" /></td> </tr>
<tr><td class="td">Password</td><td class="td"><input class="tee" type="password" name="lpass" value="" /></td> </tr>
<tr><td class="td">

</td>
<td class="td">
<input  class="bbtn" type="submit" value="login" name="log"></input></td>
<span class="error"><?php echo $errrrr;?></span>
 </tr> 
          </table>
         </div>
      
      </div>
        <p align="center">&nbsp; </p>
      </form>

</div>
<?php include 'frontfooter.php'; ?>

</div>

<!-------- Search box query ------------>
    
      
      



         
         <!-------------------login popup ------------------>

     
     <!----------- Top to Bottom page query------------>

<!--------------------form lightbox------------------------>

	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.2.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

	

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>
    <!--------------------End form lightbox------------------------>      
</body>
</html>
