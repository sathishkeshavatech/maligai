<?php
	include("dbc.php");
	error_reporting(0);
	include("functions.php");
	if($_REQUEST['command']=='delete' && $_REQUEST['pid']!=''){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
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

<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />

</head>
<body id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'frontheader.php'; ?>

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
<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}

function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}
</script>
</head>

<body>
<form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
	<div style="margin:0px auto; width:800px;" >
    <div style="padding-bottom:10px">
    	<h2 align="center" style="color:#fff">Your Shopping Cart</h2>
    
   </div>
    	<div style="color:#F00"></div>
    	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#FFFAF0;border-radius: 5px;margin-bottom:20px;font-size: 12px; padding:20px;box-shadow:inset 0px 0px 10px 0px rgba(0,0,0,0.1);" width="100%">
    	<?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr style="font-weight:bold;height:30px;padding:10px;"><td style="padding-left:5px;">Serial</td><td style="padding-left:5px;">Name</td><td style="padding-left:5px;">Image</td><td style="padding-left:5px;">Price</td><td style="padding-left:5px;">Qty</td><td style="padding-left:5px;">Amount</td><td style="padding-left:5px;">Options</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid);
					$image1=get_product_image($pid);
					
					if($q==0) continue;
			?>
            		<tr><td width="5%" style="padding-left:5px;"><?php echo $i+1?></td>
            		<td width="30%" style="padding-left:5px;"><?php echo $pname?></td>
                    <td width="16%" style="padding-left:5px;"><img src="<?php echo $image1;?>" width="50px" height="50px" style="margin-top: 5px;margin-bottom: 10px;"></td>
                    <td width="9%" style="padding-left:5px;"><?php echo get_price($pid)?></td>
                    <td width="6%" style="padding-left:5px;"><input type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="3" style=" border: 2px inset #EBE9ED; background-color:#FF3;" /></td>                    
                    <td width="11%" style="padding-left:5px;"><?php echo get_price($pid)*$q?></td>
          <td width="4%" style="padding-left:5px;padding-right:10px;"><a href="javascript:del(<?php echo $pid?>)"><img src="images/Cross.png" alt="1" width="10" height="10" title="Delete Product" border="0" /></a></td>
   		  </tr>
            <?php					
				}
				$ordertot=get_order_total();
				if($ordertot<700)
				{
				$deli=30;
				}
				else
				{
					$deli=0;
				}
				$tot=$ordertot+$deli;
			?>
				<tr>
				 
				  <td colspan="5" align="right" style=" text-align:right; font-size:12px;"><b>Order Total : </b></td>
				  <td colspan="2" align="left" style=" text-align:left; font-size:12px;"><b> Rs. <?php echo $ordertot?></b></td>
				 
		  </tr>
          <tr>
				 
				  <td colspan="5" align="right" style="padding-top: 10px; text-align:right; font-size:12px;"><b>Delivery charges : </b></td>
				  <td colspan="2" align="left" style="padding-top: 10px; text-align:left; font-size:12px;"><b> Rs. <?php echo $deli;?></b></td>
				  
		  </tr>
           <tr>
				  
				  <td colspan="5" align="right" style=" padding-top: 10px;text-align:right; font-size:12px;"><b>Total : </b></td>
				  <td colspan="2" align="left" style="padding-top: 10px; text-align:left; font-size:12px;"><b> Rs. <?php echo $tot;?></b></td>
				  
		  </tr>
				<tr><td colspan="7" align="center" style="padding-bottom: 16px;padding-top: 20px; text-align:center"><input type="button" value="Clear Cart" onclick="clear_cart()" class="bbtn">
			      <input type="button" value="Update Cart" onclick="update_cart()" class="bbtn">
                  <?php
				  if($ordertot>=350)
				  {
					  ?>
                  <input type="button" value="Place Order" onclick="window.location='payment1.php'" class="bbtn">
                  <?php } 
				  else{
					  ?>
                     <input type="button" value="Place Order" onclick="showDiv()" class="bbtn">              <div id="welcomeDiv"  style="display:none; color:#F03; font-size:14px;margin-top:15px;" class="answer_list" > You can buy only above Rs 350/-</div>
                     <?php
				  }
				  ?>
                  
                  </td>
		  </tr>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
			}
		?>
        </table>
        <div class="shop">
          <a href="index.php" class="newreg fL"><---&nbsp;&nbsp;continue to shopping</a>
          </div>
  </div>
</form>
<?php include 'frontfooter.php'; ?>
</body>
</html>