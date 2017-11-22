<?php
include "dbc.php";
error_reporting(0);
if(!isset($_SESSION['adname']))
	{
		header("Location: administratorlogin.php");
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
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure u want to delete?');
}
</script>
  
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'adviewhead.php'; ?>
<div class="innerecommenuadmin">
<?php include "adminmenu.php";?>
</div>

<div class="content">

&nbsp;&nbsp;
<form name="rrr" method="post" action="custorderdetail.php">
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
       <div class="customer2">
       <?php 
	   $orderid=$_GET['order_id'];
	    $sql5 = "SELECT * FROM orders2 where order_id='$orderid'";
	$result5 = mysql_query($sql5);
	while($r9 = mysql_fetch_array($result5))
			{ 
			$date=$r9['delidate'];
			$user_id=$r9['user-id'];
			$order_id=$r9['order_id'];
			$orderdate=$r9['orderdate'];
			$deliveryaddress=$r9['deliveryaddress'];	
	         $landmark=$r9['landmark'];
			$Phone=$r9['Phone-no'];
			$useremail=$r9['user-email'];	
			$area=$r9['area'];
			$deliverydate=$r9['deliverydate'];	
			$CartAmount=$r9['CartAmount'];
			$Deliverycharge=$r9['Deliverycharge'];
			$Totalamount=$r9['Totalamount'];
			$status=$r9['orderstatus'];
	    ?>
       
         <div class="box-title2">
      <h2> Delivery Address</h2>
      <p class="fR">Order Status:<?php echo $status; ?></p>
</div>
<div class="spandash">	
Address  :<?php echo $deliveryaddress; ?><br />
Landmark : <?php echo $landmark; ?><br />
Area : <?php echo $area; ?>
 </div>
 <div class="spandash">	
Order Date :<?php echo $orderdate; ?><br />
 Delivery Date  : <?php echo $deliverydate; ?><br />
 </div>
 <div class="spandash">
<table id="my-orders-table" class="data-table" summary="Items Ordered" style="background-color:#FFFBF0;border-radius:10px;box-shadow:inset 0px 0px 20px 10px rgba(0,0,0,0.1); margin-bottom:25px">
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
 
 $sql = "SELECT * from `order detail` where `user-id`='$user_id' AND `order-id`='$order_id'";
	$result = mysql_query($sql);
			while($r11 = mysql_fetch_array($result))
			{
					$proname=$r11['proname'];
					$weight=$r11['weight'];
					$quantity=$r11['quantity'];
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
                <strong> <?php echo $weight; ?></strong>
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
 <div><a href="userdeta.php?user_id=<?php echo $user_id; ?>"><---Back to customer Details</a></div>
   <?php }

?>
</form> 
</div>


</div>

</div>
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
