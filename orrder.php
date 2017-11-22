 <div class="place ">
 <h2  class="hlog" align="left">Your order</h2>
 <ul class="quickmenulist">
 <li><a href="mydash.php">Dashboard</a></li>
  <li><a href="placeorder.php">Your Order</a></li>
 <li><a href="previous.php">Privious Order</a></li>
 </ul>
 </div>
 <div class="placeorde ">
 <h2  class="hlog" align="left">Order Placed</h2>
 <div class="tiltlebck">
 Thanks for your order!
 </div>
 <div class="tiltlebck">
 About this order!
 </div>
 <?php
 $user=$_SESSION['uuser'];
 $phone=$_SESSION['user_phone'];
  $sql20 = "SELECT * FROM `orders2` where `Phone-no`='$phone' ORDER BY id DESC LIMIT 1";
			$result10 = mysql_query($sql20);
			while($r10 = mysql_fetch_array($result10))
			{ 
			$orderdate=$r10['orderdate'];
			$deliverydate=$r10['deliverydate'];
			$deliveryaddress=$r10['deliveryaddress'];
			$order_id=$r10['order_id'];
			$CartAmount=$r10['CartAmount'];
			$Deliverycharge=$r10['Deliverycharge'];
			$Totalamount=$r10['Totalamount'];
			$landmark=$r10['landmark'];
            ?>
 <div class="spandash">
 <span >order date: <b><?php echo $orderdate; ?></b></span>
 </div>
  <div class="spandash">
 <span >Delivery slot: <b><?php echo $deliverydate; ?></b></span>
 </div>
 <div class="deliebck" style="box-shadow:inset 0px 0px 5px 0px rgba(0,0,0,0.3);">
  <h4 class="fL" style="color:#851F56; margin-bottom:20px;">shoping address</h4>
 
   <h4 class="h3class fL">landmark</h4>
    <p style="width:180px;"><?php echo $deliveryaddress; ?></p>
    <p class="pppclass "><?php echo $landmark; ?></p>
 </div>
  <div class="spanda">
 <h3 >Items Ordered</h3>
 </div>
 <div class="order-items ">
 
 <table id="my-orders-table" class="data-table" summary="Items Ordered" style="box-shadow:inset 0px 0px 10px 0px rgba(0,0,0,0.2);">
 <colgroup>

    <col></col>
    <col width="1"></col>
    <col width="1"></col>
    <col width="1"></col>
    <col width="1"></col>

</colgroup>
<thead>

    <tr class="first last">
        <th>

            Product Name

        </th>
         <th class="a-center">

           weight

        </th>
        <th class="a-center">

            Qty

        </th>
        <th class="a-right">

            Price

        </th>
        <th class="a-right">amount</th>
    </tr>
    </thead>
    <tbody class="odd">
 <?php
 $sql11 = "SELECT * FROM `order detail` where `order-id`='$order_id' ";
			$result11 = mysql_query($sql11);
			while($r11 = mysql_fetch_array($result11))
			{
					 $proname=$r11['proname'];
					 $quantity=$r11['quantity'];
					 $weight=$r11['weight'];
					 $amount=$r11['amount'];
					$tamount=$quantity*$amount;
					
				?> 
    <tr id="order-item-row-29" class="border first last">
   
        <td>
            <h3 class="product-name" style="text-align: left;">

               <?php echo $proname; ?>

            </h3>
        </td>
         
           <td class="a-right">
            <span class="nobr">
                <strong><?php echo $weight; ?></strong>
                <br></br>
            </span>
        </td>
       
        <td class="a-right">
            <span class="nobr">
                <strong><?php echo $quantity; ?></strong>
                <br></br>
            </span>
        </td>
        <td class="a-right">
            <span class="price-excl-tax">
                <span class="cart-price">
                    <span class="price"><?php echo $amount; ?></span>
                </span>
            </span>
            <br></br>
        </td>
       
        <td class="a-right last">
            <span class="price-excl-tax">
                <span class="cart-price">
                    <span class="price">
                        <span class="WebRupee"></span>

                      <?php echo $tamount; ?>

                    </span>
                </span>
            </span>
            <br></br>
        </td>
        <!--


                                                        <…

        -->
    </tr>
 <?php }?>
</tbody>
<tfoot>

    <tr class="subtotal first">
        <td class="a-right" colspan="3">subtotal </td>
        <td class="last a-right">
            <span class="price">
                <span class="WebRupee">

                    Rs. 

                </span>

                 <?php echo $CartAmount; ?>

            </span>
        </td>
    </tr>
    <tr class="shipping">
        <td class="a-right" colspan="3">
Delivery charges
        </td>
        <td class="last a-right">
            <span class="price">
           <?php echo $Deliverycharge; ?>
            </span>
        </td>
    </tr>
    <tr class="grand_total last">
        <td class="a-right" colspan="3">
            <strong>

                Grand Total

            </strong>
        </td>
        <td class="last a-right">
            <strong>
                <span class="price">
                    <span class="WebRupee"></span>

                    <?php echo $Totalamount; ?>

                </span>
            </strong>
        </td>
    </tr>

</tfoot>
 </table>
 <?php } ?>

 </div>
<div style="float:right">

 </div>
 </div>
