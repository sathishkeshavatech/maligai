<?php
include "dbc.php";
error_reporting(0);
include("functions.php");

    
	

    
 
//$id1=$_SESSION['raga_id'];
//srand((double) microtime( ) *1000000);
	//$random=rand();
	//$autoid=$random;
//if(!checkAdmin()) {
//header("Location: login.php");
//exit();
//}

if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		header("location:shoppingcart.php");
		exit();
		
		
		
		
	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.2.css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
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

<link rel="stylesheet" href="css/menuuu.css" type="text/css" media="screen">
<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />

<!------------------- Main Menu query ---------------->
        
  
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'frontheader.php'; ?>
<div class="ecommenu">
<div class="innerecommenu" >
<div class="emenu" >
<div class="nav-container">
<div class="nav">
<?php include "mainmenunew.php";?>
<div class="cart"><a href="#" class="big-link" data-reveal-id="myModal"  title="View Cart"><img src="images/cartbck.png" /></a></div>
</div>

</div>
</div>
</div>


<div class="content">
&nbsp;&nbsp;

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
       <div class="conta clearfix">


<form name="ahgjh" action="placeorder.php" method="get">
 <div class="place ">
 <h2  class="hlog" align="left">Your order</h2>
 <ul class="quickmenulist">
 <li><a href="mydash.php">Dashboard</a></li>
  <li><a href="placeorder.php">Your Order</a></li>
 <li><a href="previous.php">Previous Order</a></li>
 </ul>
 </div>
 <div class="placeorde " id="placeorde">
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
 $sql5 = "SELECT user_id FROM newusers where user_name='$user'";
$result5 = mysql_query($sql5);
			while($r9 = mysql_fetch_array($result5))
			{ 
			$user_id=$r9['user_id'];
  $sql20 = "SELECT * FROM `orders2` where `user-id`='$user_id' ORDER BY id DESC LIMIT 1";
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
			$orderstatus=$r10['orderstatus'];
            ?>
 <div class="spandash">
  <span >order date: <b><?php echo $order_id; ?></b></span><br /><br />
 <span >order date: <b><?php echo $orderdate; ?></b></span><br /><br />
 
 <span >Delivery slot: <b><?php echo $deliverydate; ?></b></span><br /><br />
 
 <span >order status: <b><?php echo $orderstatus; ?></b></span>
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
 <div class="order-items" id="order-items">
 
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
 <?php }}?>
</tbody>
<tfoot>

    <tr class="subtotal first">
        <td class="a-right" colspan="4">subtotal </td>
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
        <td class="a-right" colspan="4">
Delivery charges
        </td>
        <td class="last a-right">
            <span class="price">
           <?php echo $Deliverycharge; ?>
            </span>
        </td>
    </tr>
    <tr class="grand_total last">
        <td class="a-right" colspan="4">
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


 </div>
<div style="float:right">

 </div>
  <?php
   $pdfuser=$_SESSION['pdf'];
  echo "<a href='pdf/$pdfuser' target='_blank' style='color:#6e3389;font-size:15px;'><b>Download PDF</b></a>";
			}
  ?>
 </div>
 </form>
 <div id="editor"></div>

 </div>
 </div>
        <p align="center">&nbsp; </p>


<?php include 'frontfooter.php'; ?>

</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#cmd').click(function() {
		window.print();
		return false;
	});
});
</script>

</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
