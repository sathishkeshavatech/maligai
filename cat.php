
<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;border-radius: 5px;margin-bottom:20px;font-size: 12px; padding:20px; color:#FFF;" width="100%">
<?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr style="font-weight:bold;height:30px;padding:10px;"><td style="padding-left:5px;">product</td><td style="padding-left:5px;">Price</td><td style="padding-left:5px;">Qty</td><td style="padding-left:5px;">Amount</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid);
					$image1=get_product_image($pid);
					
					if($q==0) continue;
			?>
              <tr><td width="16%" style="padding-left:5px;"><img src="<?php echo $image1;?>" width="50px" height="50px" style="margin-top: 5px;margin-bottom: 10px;"></td>
			<td width="9%" style="padding-left:5px;"><?php echo get_price($pid)?></td>
                    <td width="6%" style="padding-left:5px;"><?php echo $q?></td> 
                     <td width="11%" style="padding-left:5px;"><?php echo get_price($pid)*$q?></td></tr>
                     <?php }} ?>
                     
                    <?php
if(isset($_SESSION['uuser']))
{?>                <tr><td></td><td></td><td colspan="2"><a class="newreg2 fL" href="shoppingcart.php">update</a></td></tr>
                     <?php }
					 else{ ?>
					<tr><td></td><td></td><td colspan="2"><a class="newreg2 fL" href="userlogin.php">update</a></td></tr>
					 <?php } ?>
  </table>                   
 