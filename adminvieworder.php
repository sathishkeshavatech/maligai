<?php
include "dbc.php";
error_reporting(0);

include("functions.php");
	if(!isset($_SESSION['adname']))
	{
		header("Location: administratorlogin.php");
	}
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

<!------------------- Main Menu query ---------------->

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<!--<script>

$(document).ready(function(){
	$("#perfect").hide();
  $("button").click(function(){
    $("#perfect").toggle(1000);
	
  });
});
</script>  
     
--> 
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'adminheader.php'; ?>

<div class="innerecommenu" >
<?php include "adminmenu.php";?>
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
       <form name="form" action="adminvieworder.php" method="post">

 <?php
   $today=date("Y-m-d");
   $td=date( "l",strtotime($today));
$tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));
$dayafter = mktime(0,0,0,date("m"),date("d")+2,date("Y"));

$tom=date("Y-m-d", $tomorrow);
$tm = date( "l",strtotime($tom));
$after=date("Y-m-d", $dayafter);
$df=date( "l",strtotime($after));

?> 
 <div class="place ">
 <h2  class="hlog" align="left">View Order</h2>
 <ul class="quickmenulist">
 <li><a href="adminvieworder.php?ordstatus=<?php echo"processing";?>">Pending order</a></li>
 <li><a href="adminvieworder.php?deliverydate=<?php echo $today;?>">Today</a></li>
  <li><a href="adminvieworder.php?deliverydate=<?php echo $tom;?>">Tomorrow</a></li>
 <li><a href="adminvieworder.php?deliverydate=<?php echo $after;?>">Day after tomorrow</a></li>
  <li><a href="adminvieworder.php?deliveryda=<?php echo "1";?>">Last 7 days</a></li>
   <li><a href="adminvieworder.php?deliveryda=<?php echo "2";?>">Last 1 month</a></li>
 </ul>
 </div>
 <div class="placeorde ">
 <h2  class="hlog" align="left">Order Details</h2>
 <?php
 $delda=$_GET['deliveryda'];
 $deldate=$_GET['deliverydate'];
$ordstatus=$_GET['ordstatus'];
 if(!isset($delda))
 { 


$tbl_name="orders2";
	$adjacents = 1;
	if(isset($deldate))
{
	$deldate."-orders";
	?>
    <input type="hidden" name="head" value="<?php echo $deldate."Orders Detail";?>"/>
    <?php
	
	$date=$deldate;
	$query = "SELECT COUNT(*) as num FROM $tbl_name where `delidate`='$date'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "adminvieworder.php?deliverydate=$date"; 	//your file name  (the name of this file)
	$limit =2; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;		
 $sql5 = "SELECT * FROM `orders2` where `delidate`='$date' LIMIT $start, $limit";
	$result5 = mysql_query($sql5);
			
}
elseif(isset($ordstatus))
{
	$orderss="pending";
	 $date=date("Y-m-d");
	 $seven=mktime(0,0,0,date("m"),date("d")-20,date("Y"));
	  $seen=mktime(0,0,0,date("m"),date("d")-1,date("Y"));
	  $dd=date("Y-m-d", $seven);
	  $dd1=date("Y-m-d", $seen);
	 $query = "SELECT COUNT(*) as num FROM `orders2` where `orderstatus`='processing' AND `delidate` between '$dd' and '$dd1'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "adminvieworder.php?ordstatus=processing"; 	//your file name  (the name of this file)
	$limit =2; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;		
  $sql5 = "SELECT * FROM `orders2` where `orderstatus`='processing' AND `delidate` between '$dd' and '$dd1' LIMIT $start, $limit";
	$result5 = mysql_query($sql5);
			
	}
	else
{
	$orderss="pending-orders";
	$date=date("Y-m-d");
	 $seven=mktime(0,0,0,date("m"),date("d")-20,date("Y"));
	  $seen=mktime(0,0,0,date("m"),date("d")-1,date("Y"));
	  $dd=date("Y-m-d", $seven);
	  $dd1=date("Y-m-d", $seen);
	 $query = "SELECT COUNT(*) as num FROM `orders2` where `orderstatus`='processing' AND `delidate` between '$dd' and '$dd1'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "adminvieworder.php?ordstatus=processing"; 	//your file name  (the name of this file)
	$limit =2; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;		
  $sql5 = "SELECT * FROM `orders2` where `orderstatus`='processing' AND `delidate` between '$dd' and '$dd1' LIMIT $start, $limit";
	$result5 = mysql_query($sql5);
			
			
	}
	

			
					//your table name
	// How many adjacent pages should be shown on each side?
	
	/* Get data. */
	
	
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
			$pagination.= "<a href=\"$targetpage&page=$prev\">� previous</a>";
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
					$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$next\">next �</a>";
		else
			$pagination.= "<span class=\"disabled\">next �</span>";
		$pagination.= "</div>\n";		

	}
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
			?>	
<div class="box-titleee">
        OrderId:<?php echo $order_id; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--/*<button style="background-color:#CF0;">view order detail</button>*/-->
        </div>
        <?php
         $sql5 = "SELECT `user_name` FROM newusers where user_id='$user_id'";
$result5 = mysql_query($sql5);
			while($r9 = mysql_fetch_array($result5))
			{ 
			$username=$r9['user_name'];
			?>
<div class="spandash">
 <span >Customer Name: <b><?php echo $username; ?></b></span>
 </div>
 <?php } ?>
<div id="perfect">
 <div class="spandash">
 <span >order date: <b><?php echo $orderdate; ?></b></span>
 </div>
  <div class="spandash">
 <span >Delivery slot: <b><?php echo $deliverydate; ?></b></span>
 </div>
<div class="box-title">
        Contact Information
</div>
<div class="spandash">
<?php echo $user_id; ?><br />
<?php echo $Phone; ?><br />
<?php echo $useremail; ?>
 </div>
 <div class="box-title">
       Delivery Address
</div>
<div class="spandash">	
Address  :<?php echo $deliveryaddress; ?><br />
Landmark : <?php echo $landmark; ?><br />
Area : <?php echo $area; ?>
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
 </div>
  <?php } }
  else{
?>
 
 <?php 
 $delda=$_GET['deliveryda'];
   $today=date("Y-m-d");
$orderss=$delda."-orders";
$tbl_name="orders2";
	$adjacents = 1;
	if($delda=="1")
{
 $sev=mktime(0,0,0,date("m"),date("d")-7,date("Y"));
   $dd=date("Y-m-d", $sev);
    $query = "SELECT COUNT(*) as num FROM $tbl_name where delidate BETWEEN '$dd' AND '$today'";
	
}
else{
	$seven=mktime(0,0,0,date("m")-1,date("d"),date("Y"));
	 $dd=date("Y-m-d", $seven);
	  $query = "SELECT COUNT(*) as num FROM $tbl_name where delidate BETWEEN '$dd' AND '$today'";
	
}
$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "adminvieworder.php?deliveryda=$delda"; 	//your file name  (the name of this file)
	$limit =2; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;		
 $sql5 = "SELECT * FROM orders2 where delidate BETWEEN '$dd' AND '$today' LIMIT $start, $limit";
	$result5 = mysql_query($sql5);
			
					//your table name
	// How many adjacent pages should be shown on each side?
	
	/* Get data. */
	
	
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
			$pagination.= "<a href=\"$targetpage&page=$prev\">� previous</a>";
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
					$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$next\">next �</a>";
		else
			$pagination.= "<span class=\"disabled\">next �</span>";
		$pagination.= "</div>\n";		

	}
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
			?>	
<div class="box-titleee">
        OrderId:<?php echo $order_id; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
</div>
<div id="perfect">
 <div class="spandash">
 <span >order date: <b><?php echo $orderdate; ?></b></span>
 </div>
  <div class="spandash">
 <span >Delivery slot: <b><?php echo $deliverydate; ?></b></span>
 </div>
<div class="box-title">
        Contact Information
</div>
<div class="spandash">
<?php echo $user_id; ?><br />
<?php echo $Phone; ?><br />
<?php echo $useremail; ?>
 </div>
 <div class="box-title">
       Delivery Address
</div>
<div class="spandash">	
Address  :<?php echo $deliveryaddress; ?><br />
Landmark : <?php echo $landmark; ?><br />
Area : <?php echo $area; ?>
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
</div>
 </div>
  <?php }
}

?>
 
 
 
<div style="float:right">

 </div>

 </div>
 
 </div>
 
        <p align="center">&nbsp; </p>
       
    </form>
     <div class="pagination">
 <?php echo $pagination;?>
 </div>
    <div>

</div>

</div>

<?php include 'frontfooter.php'; ?>

</div>
</body>
</html>
