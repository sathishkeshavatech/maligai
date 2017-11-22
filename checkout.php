<?php
	include("dbc.php");
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
<title>Shopping cart</title>
<link href="css/backendstyle.css" rel="stylesheet" type="text/css" />
</head>
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


</script>
<body>
<div class="cartheader">
<div class="subcart">
</div></div>
<div class="cartcontent"><h1 class="shopping">SHOPPING CART</h1></div>

<table width="800" class="carttable" cellspacing="0" cellpadding="0">

  <tr class="carttabletr">
    <th scope="col" class="cartth">serial</th>
    <th scope="col" class="cartth">Name</th>
    <th scope="col" class="cartth">Image</th>
    <th scope="col" class="cartth">Price</th>
    <th scope="col" class="cartth">Quantity</th>
    <th scope="col" class="cartth">Amount</th>
    <th scope="col" class="cartth">Options</th>
  </tr>
  <?php
			if(is_array($_SESSION['cart'])){
            	
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid);
					$image1=get_product_image($pid);
					
					if($q==0) continue;
					
			?>
  <tr class="carttabletr">
    <td class="carttabletd"><?php echo $i+1?></td>
    <td class="carttabletd"><?php echo $pname?></td>
    <td class="carttabletd"><img src="<?php echo $image1;?>" width="100px" height="100px"></td>
    <td class="carttabletd"><?php echo get_price($pid)?></td>
    <td class="carttabletd"><input type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>
    <td class="carttabletd"><?php echo get_price($pid)*$q?></td>
    <td class="carttabletd"><a href="javascript:del(<?php echo $pid?>)"><img src="images/Cross.png" alt="1" width="20" height="20" title="Delete Product" border="0" /></a></td>
    
  </tr>
 	<tr><td colspan="7" align="center"><input type="button" value="Clear Cart" onclick="clear_cart()">
			      <input type="button" value="Update Cart" onclick="update_cart()">			      <input type="button" value="Place Order" onclick="window.location='billing.php'"></td>
		  </tr>
			 
  <?php }}?>
  <tr class="carttabletr">
    <td class="carttabletd">&nbsp;</td>
    <td class="carttabletd">&nbsp;</td>
    <td class="carttabletd">&nbsp;</td>
    <td class="carttabletd">&nbsp;</td>
    <td class="carttabletd">&nbsp;</td>
    <td class="carttabletd">&nbsp;</td>
    <td class="carttabletd">&nbsp;</td>
  </tr>
</table>


<div class="cartfooter"></div>
</body>
</html>
