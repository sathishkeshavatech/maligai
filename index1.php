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
    <tr><td width="5%" style="padding-left:5px;"><?php echo $i+1?></td>
            		<td width="30%" style="padding-left:5px;"><?php echo $pname?></td>
                    <td width="16%" style="padding-left:5px;"><img src="<?php echo $image1;?>" width="100px" height="100px" style="margin-top: 5px;margin-bottom: 10px;"></td>
                    <td width="9%" style="padding-left:5px;"><?php echo get_price($pid)?></td>
                    <td width="6%" style="padding-left:5px;"><input type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>                    
                    <td width="11%" style="padding-left:5px;"><?php echo get_price($pid)*$q?></td>
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
				<tr><td colspan="7" align="center" style="padding-bottom: 16px;padding-top: 20px;"><input type="button" value="Clear Cart" onclick="clear_cart()" style="background-color: #280b0b;border: none;padding: 5px 5px 5px 5px;color: #ffffff;font-size: 17px;border-radius: 5px;">
			      <input type="button" value="Update Cart" onclick="update_cart()" style="background-color: #280b0b;border: none;padding: 5px 5px 5px 5px;color: #ffffff;font-size: 17px;border-radius: 5px;">			      <input type="button" value="Place Order" onclick="window.location='billing.php'" style="background-color: #280b0b;border: none;padding: 5px 5px 5px 5px;color: #ffffff;font-size: 17px;border-radius: 5px;"></td>
		  </tr>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
			}
		?>
        </table>
  </div>