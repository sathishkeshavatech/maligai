<?php
include "dbc.php"; 
page_protect();
//if(!checkAdmin()) {
//header("Location: login.php");
//exit();
//}
error_reporting (E_ALL ^ E_NOTICE);

if($_GET['Submit'] == 'Update') 	
            {
			$cus_id = $_GET['cus_id'];
			$cus_name = $_GET['cus_name'];
			$user_name = $_GET['user_name'];
			$cus_mail = $_GET['cus_mail'];
			$cus_phone = $_GET['cus_phone'];
			$cus_image = $_FILES['cus_image']['name'];
			$cus_address = $_GET['cus_address'];
			$status = $_GET['status'];
			$pro_id = $_GET['pro_id'];
			$pro_name = $_GET['pro_name'];
			$total = $_GET['total'];
			$paid = $_GET['paid'];
			$balance = $_GET['balance'];
			$order_status = $_GET['order_status'];
		
			if(mysql_query("UPDATE customer SET `cus_name` = '$cus_name',`user_name` = '$user_name',`cus_mail` = '$cus_mail',`cus_phone` = '$cus_phone',`cus_address` = '$cus_address',`status` = '$status',`pro_id` = '$pro_id',`pro_name` = '$pro_name',`total` = '$total',`paid` = '$paid',`balance` = '$balance',`order_status` = '$order_status' WHERE cus_id ='$cus_id'"));
			
			if($cus_image != "")
				{
				$secondname=rand(0,10000000000);
			    $uploaddir = "customerimages/";
			    $upload_pic = $uploaddir.$secondname.$cus_image;			
				copy($_FILES['cus_image']['tmp_name'], $upload_pic);
				chmod("$upload_pic",0777);
				mysql_query("UPDATE customer SET `cus_image` = '$upload_pic' WHERE cus_id ='$cus_id'");
		}
			
		}
					
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ragadesigners Shoppingcart</title>
<?php include 'header.php'; ?>
<div class="content">
<div class="inner-content">
<h4 class="dash">Update Customer Details</h4>
<div class="bor"></div>
<?php
		   $id = $_GET['id'];
			$sqlquery = "select * from customer where id = '$id'"; // query on table
			$sqlresult = mysql_query($sqlquery);
			while($row = mysql_fetch_array($sqlresult))
			{
				?>
<form id="form4" name="form4" method="GET" action="customeredit.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" class="table_bg">
    <table class="addprotbl">
     <tr>
          <?php	
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* Error - $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }
	  ?>
          <td>&nbsp;</td>
          <td><strong>Customer Id</strong></td>
          <td>           
          <input type="text" name="cus_id" id="cus_id" value="<?php echo $row['cus_id']; ?>" readonly="readonly" class="addin" /></td>
          <td>&nbsp;</td>
          </tr>
             <tr>
          <td>&nbsp;</td>
          <td><strong>Customer Name</strong></td>
          <td>
          <input type="text" name="cus_name" id="cus_name" class="addin" value="<?php echo $row['cus_name']; ?>"/></td>
          <td>&nbsp;</td>
          </tr>  
          <tr>
          <td>&nbsp;</td>
          <td><strong>Customer Mail</strong></td>
          <td>
          <input type="text" name="cus_mail" id="cus_mail" class="addin" value="<?php echo $row['cus_mail']; ?>" /></td>
          <td>&nbsp;</td>
          </tr>  
          <tr>
          <td>&nbsp;</td>
          <td><strong>Customer Phone</strong></td>
          <td>
          <input type="text" name="cus_phone" id="cus_phone" class="addin" value="<?php echo $row['cus_phone']; ?>" /></td>
          <td>&nbsp;</td>
          </tr>        
          <tr>
          <td>&nbsp;</td>
          <td><strong>Customer Address</strong></td>
          <td>
          <textarea name="cus_address" id="cus_address" class="textarea"><?php echo $row['cus_address']; ?></textarea></td>
          <td>&nbsp;</td>
          </tr> 
          <tr>
          <td>&nbsp;</td>
          <td><strong>Customer Image</strong></td>
          <td><input type="file" name="cus_image" id="cus_image" /></td>
          <td>&nbsp;</td>
          </tr>
           <tr>
          <td>&nbsp;</td>
          <td><strong>Customer Status</strong></td>
          <td>
          <select name="status" id="status" class="addin" value="<?php echo $row['status']; ?>">
               <option value="0" >Unapproved</option>
               <option value="1" >Approved</option>
             </select></td>
          <td>&nbsp;</td>
          </tr>  
          <tr>
          <td>&nbsp;</td>
          <td><strong>Product Id</strong></td>
          <td>
          <input type="text" name="pro_id" id="pro_id" class="addin" value="<?php echo $row['pro_id']; ?>" /></td>
          <td>&nbsp;</td>
          </tr> 
          <tr>
          <td>&nbsp;</td>
          <td><strong>Product Name</strong></td>
          <td>
          <input type="text" name="pro_name" id="pro_name" class="addin" value="<?php echo $row['pro_name']; ?>" /></td>
          <td>&nbsp;</td>
          </tr> 
          <tr>
          <td>&nbsp;</td>
          <td><strong>Total Amount</strong></td>
          <td>
          <input type="text" name="total" id="total" class="addin" value="<?php echo $row['total']; ?>" /></td>
          <td>&nbsp;</td>
          </tr> 
          <tr>
          <td>&nbsp;</td>
          <td><strong>Paid Amount</strong></td>
          <td>
          <input type="text" name="paid" id="paid" class="addin" value="<?php echo $row['paid']; ?>" /></td>
          <td>&nbsp;</td>
          </tr> 
          <tr>
          <td>&nbsp;</td>
          <td><strong>Balance Amount</strong></td>
          <td>
          <input type="text" name="balance" id="balance" class="addin" value="<?php echo $row['balance']; ?>" /></td>
          <td>&nbsp;</td>
          </tr> 
          <tr>
          <td>&nbsp;</td>
          <td><strong>Order Status Status</strong></td>
          <td>
          <select name="order_status" id="order_status" class="addin" value="<?php echo $row['order_status']; ?>">
               <option value="pending" >Pending</option>
               <option value="completed" >Completed</option>
             </select></td>
          <td>&nbsp;</td>
          </tr> 
          <tr align="center">
          <td height="35">&nbsp;</td>
          
    <td>&nbsp;</td>
          <td><div align="left">
            <input name="Submit" type="submit" class="button sub" id="Save" value="Update" />
          </div></td>
          <td>&nbsp;</td>
          </tr><?php } ?>
    </table>
</form>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>