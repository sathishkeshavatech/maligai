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
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/backtotop.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.2.css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>	
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


 <div class="place ">
 <h2  class="hlog" align="left">Your order</h2>
 <ul class="quickmenulist">
 <li><a href="mydash.php">Dashboard</a></li>
  <li><a href="placeorder.php">Your Order</a></li>
 <li><a href="">Previous order</a></li>
 </ul>
 </div>
 <div class="placeorde ">
 <h2  class="hlog" align="left">My Previous Order</h2>
 <?php 
$user=$_SESSION['uuser'];
$phone=$_SESSION['user_phone'];
 $sql5 = "SELECT user_id FROM newusers where user_name='$user'";
$result5 = mysql_query($sql5);
			while($r9 = mysql_fetch_array($result5))
			{ 
			$user_id=$r9['user_id'];
					//your table name
	// How many adjacent pages should be shown on each side?
	$tbl_name="orders2";
	$adjacents = 3;
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where `user-id`='$user_id'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "previous.php"; 	//your file name  (the name of this file)
	$limit =3; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT order_id,orderdate,orderstatus from orders2 where `user-id`='$user_id' LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">� previous</a>";
		else
			$pagination.= "<span class=\"disabled\">� previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next �</a>";
		else
			$pagination.= "<span class=\"disabled\">next �</span>";
		$pagination.= "</div>\n";		

	}
		
	

			while($r5 = mysql_fetch_array($result))
			{ 
			$order_id=$r5['order_id'];
			$orderdate=$r5['orderdate'];
			$orderstatus=$r5['orderstatus'];
					
?>
<div class="box-titleee">
        OrderDate:<?php echo $orderdate; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OrderId:<?php echo $order_id; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status:<?php echo $orderstatus; ?>
</div>

 <div class="spandash">
<table id="my-orders-table" class="data-table" summary="Items Ordered" style="background-color:#FFFBF0;border-radius:10px;box-shadow:inset 0px 0px 20px 10px rgba(0,0,0,0.1);">
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
					$amount=$r11['amount'];
					$weight=$r11['weight'];
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


 </table>

 </div>
  <?php }}
?>
 

 
 
<div style="float:right">

 </div>
 </div>
 
 </div>
 </div>
 
        <p align="center">&nbsp; </p>
    </form>
<?php echo $pagination;?>


<?php include 'frontfooter.php'; ?>

</div>
</body>
</html>
