<?php
include "dbc.php";
error_reporting(0);

if(!isset($_SESSION['adname']))
	{
		header("Location: administratorlogin.php");
	}
	

error_reporting (E_ALL ^ E_NOTICE);	
$orderid=$_POST['lname'];
$orderstatus=$_POST['today'];
	 $sql20 = "SELECT `user-id` FROM `orders2` where `order_id`='$orderid' ";
			$result10 = mysql_query($sql20);
			while($r10 = mysql_fetch_array($result10))
			{ 
			$userid=$r10['user-id'];
			}
if(isset($_REQUEST['status']))
{
	
	if($userid!="")
	{
	$result=mysql_query("UPDATE `orders2` SET `orderstatus`='$orderstatus' WHERE order_id='$orderid'") or die(mysql_error());
	
	if($result)
	{
	$errrrr="order-status updated sucessfully";	
	}
	else
	{
		$errrrr="Unable to update status";
	}
	}
	else
	{
		$errrrr="order_id not found...";
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

<div class="innerecommenuadmin" >
<?php include "adminmenu.php";?>
</div>


<div class="content">
<div class="inner-content">
&nbsp;&nbsp;
<form action="orderstatus.php" method="post" name="logForm" id="logForm" >
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
               <h2 class="hlog" align="center" >Order-Status</h2>
             </tr> 
              <tr ><td class="td">Order-id</td><td class="td"><input type="text" class="tee" name="lname" value="" /></td> </tr>
<tr><td class="td">status</td><td class="td"><input type="radio" name="today" value="processing"  >&nbsp;Processing</input><br /><input type="radio" name="today" value="Delivered"  >&nbsp;Delivered</input><br /><input type="radio" name="today" value="canceled"  >&nbsp;Canceled</input></td></tr>
<tr><td class="td">

</td>
<td class="td">
<input  class="bbtn" type="submit" value="update" name="status"></input></td>
<span class="error"><?php echo $errrrr;?></span>
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
