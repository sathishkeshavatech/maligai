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
<div id="myModal" class="reveal-modal">
<h1>MY CART(<?php echo get_total_count(); ?>)Items</h1>
<form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
	<div style="margin:0px auto; width:570px;" >
    <div style="padding-bottom:10px">
    	<h1 align="center" class="carth" style="font-size: 12px;color: #7b7b7b;">Your Shopping Cart</h1>
    <input type="button" value="Continue Shopping" onclick="window.location='index.php'" class="cinp" style="background:url(images/bg-nav.png)repeat scroll left top transparent; border: none;padding: 5px 5px 5px 5px;color: #ffffff;font-size: 13px;border-radius: 5px;"/>
    </div>
    	<div style="color:#F00"></div>
    	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1;border-radius: 5px;margin-bottom:20px; padding:20px;font-size: 12px; box-shadow: 5px 5px 5px #888888;" width="100%">
    	<?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr style="font-weight:bold;height:30px;padding-left:5px;""><td style="padding-left:5px;">Serial</td><td style="padding-left:5px;">Name</td><td style="padding-left:5px;">Image</td><td style="padding-left:5px;">Price</td><td style="padding-left:5px;">Qty</td><td style="padding-left:5px;">Amount</td><td style="padding-left:5px;padding-right:10px;">Options</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid);
					$image1=get_product_image($pid);
					
					if($q==0) continue;
			?>
            		<tr><td width="5%" ><?php echo $i+1?></td>
            		<td width="30%" ><?php echo $pname?></td>
                    <td width="16%" ><img src="<?php echo $image1;?>" width="50px" height="50px" style="margin-top: 5px;margin-bottom: 10px;"></td>
                    <td width="9%" ><?php echo get_price($pid)?></td>
                    <td width="6%" ><input type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>                    
                    <td width="11%"><?php echo get_price($pid)*$q?></td>
          <td width="4%" style="padding-left:5px;padding-right:10px;"><a href="javascript:del(<?php echo $pid?>)"><img src="images/Cross.png" alt="1" width="20" height="20" title="Delete Product" border="0" /></a></td>
   		  </tr>
            <?php					
				}
			?>
				<tr>
				  <td>&nbsp;</td>
				  <td align="right">&nbsp;</td>
				  <td colspan="3" align="right" style="padding-top: 13px;"><b>Order Total : </b></td>
				  <td align="left" style="padding-top: 13px;"><b> Rs. <?php echo get_order_total()?></b></td>
				  <td>&nbsp;</td>
		  </tr>
				<tr><td colspan="7" align="center" style="padding-bottom: 16px;padding-top: 20px;"><input type="button" value="Clear Cart" onclick="clear_cart()" style="background:url(images/bg-nav.png)repeat scroll left top transparent;border: none;padding: 5px 5px 5px 5px;color: #ffffff;font-size: 13px;border-radius: 5px;">
                 <input type="button" value="Update Cart" onclick="update_cart()" style="background:url(images/bg-nav.png)repeat scroll left top transparent;border: none;padding: 5px 5px 5px 5px;color: #ffffff;font-size: 13px;border-radius: 5px;">
			     		      <input type="button" value="Place Order" onclick="window.location='payment1.php'"style="background:url(images/bg-nav.png)repeat scroll left top transparent;border: none;padding: 5px 5px 5px 5px;color: #ffffff;font-size: 13px;border-radius: 5px;"></td>
		  </tr>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
			}
		?>
        </table>
  </div>
</form><a class="close-reveal-modal">×</a></div>