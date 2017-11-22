<?php
include "dbc.php"; 
page_protect();
//if(!checkAdmin()) {
//header("Location: login.php");
//exit();
//}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ragadesigners Shoppingcart</title>
<?php include 'header.php'; ?>
<div class="content">
<div class="inner-content">
<h4 class="dash">Dashboard</h4>
<div class="bor"></div>
<div class="div1">
<div class="div11">
<h5 class="ord">Orders</h5>
<p class="p1"><a href="orders.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM orders");?></a></p>
</div>
<div class="div12">
<h5 class="ord">Sales</h5>
<p class="p1"><a href="salesreport.php" target="_blank">Rs.<?php echo  $age = $db->queryUniqueValue("SELECT sum(total) FROM sales");?></a></p>
</div>
<div class="div13">
<h5 class="ord">Taxes</h5>
<p class="p1"><a href="salesreport.php" target="_blank">Rs.<?php echo  $age = $db->queryUniqueValue("SELECT sum(ptax) FROM sales");?></a></p>
</div>
</div>
<div class="div3">
<div class="div31">
<h5 class="prdet">Active Products</h5>
<p class="p3"><a href="activeproducts.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM products where prostatus	='1'");?></a></p>
</div>
<div class="div32">
<h5 class="prdet">Out Of Stack</h5>
<p class="p3"><a href="outofstock.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM products where prostatus	='0'");?></a></p>
</div>
<div class="div33">
<h5 class="prdet">Registered Customers</h5>
<p class="p3"><a href="registeredcustomers.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM customer");?></a></p>
</div>
<div class="div34">
<h5 class="prdet">Product Categories</h5>
<p class="p3"><a href="editproductcategories.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM procateg");?></a></p>
</div>
<div class="div35">
<h5 class="prdet">Completed Orders</h5>
<p class="p3"><a href="completedorders.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(order_id) FROM main_order where order_status ='1'");?></a></p>
</div>
<div class="div36">
<h5 class="prdet">Pending Orders</h5>
<p class="p3"><a href="pendingorders.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(order_id) FROM main_order where order_status	='0'");?></a></p>
</div>
</div>
<div class="div3">
<div class="div31">
<h5 class="prdet">Return Orders</h5>
<p class="p3"><a href="editreturnproducts.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM returnproducts");?></a></p>
</div>
<div class="div32">
<h5 class="prdet">Total Users</h5>
<p class="p3"><a href="edituser.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM newusers");?></a></p>
</div>
<div class="div33">
<h5 class="prdet">Total User Groups</h5>
<p class="p3"><a href="editusergroup.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM usergroup");?></a></p>
</div>
<div class="div34">
<h5 class="prdet">Product Reviews</h5>
<p class="p3"><a href="editreviews.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM reviews");?></a></p>
</div>
<div class="div35">
<h5 class="prdet">Total Sales</h5>
<p class="p3"><a href="salesreport.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM sales");?></a></p>
</div>
<div class="div36">
<h5 class="prdet">Total Orders</h5>
<p class="p3"><a href="orders.php" target="_blank"><?php echo  $age = $db->queryUniqueValue("SELECT COUNT(id) FROM orders");?></a></p>
</div>
</div>
<div class="div2">
<div class="div21">
<h3 class="rec">Recent Orders</h3>
<table class="ortable">
<tr>
<th>Oredr Id</th>
<th>Date</th>
<th>Customer Name</th>
<th>Price</th>
<th>Status</th>
</tr>
<?php
            $sql5 = "SELECT * FROM orders order by id desc limit 15";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
<tr>
<td><a href="editorder.php" target="_blank"><?php echo $r['order_id']; ?></a></td>
<td><?php echo $r['date']; ?></td>
<td><?php echo $r['cus_name']; ?></td>
<td><?php echo $r['total']; ?></td>
<td><?php echo $r['order_status']; ?></td> 
</tr><?php } ?>
</table>
</div>
<div class="div22">
<h3 class="rec">Statistics</h3>
</div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
</head>
</html>
