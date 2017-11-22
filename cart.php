<?php 
include 'dbc.php';
error_reporting (E_ALL ^ E_NOTICE);
if($_GET['del'] == 'd')
{
$id = $_GET['product_id'];
mysql_query("delete from `cart table` where product_id='$id'");
}
checkadmin_function();
	$user_id = $_SESSION['user_id'];
  	$procategory=$_GET['procategory'];
  	$sql10="SELECT * FROM `procateg` WHERE autoid='$procategory'";
  	$sqlresult23 = mysql_query($sql10);
  	$r23 = mysql_fetch_array($sqlresult23);
  	$autoid=$r23['autoid'];
  	$proname=$r23['procategory'];
  	$sql11="SELECT * FROM `products` WHERE procategory='$proname'";
  	$sqlresult11 = mysql_query($sql11);
  	$r11 = mysql_fetch_array($sqlresult11);
  	$price = $r11['price'];
   	$image=$r11['proimg'];
  	$prodesc=$r11['prodesc'];
	$sum=$price;
	$quantity=1;
	$sql12="SELECT * FROM `cart table` WHERE userid='$user_id' AND product_id='$autoid'";
  	$sqlresult12 = mysql_query($sql12);
  	$r12 = mysql_fetch_array($sqlresult12);
	$product = $r12['product_id'];
if($product == ""){  
$db->query("INSERT INTO `cart table`(`id`, `userid`, `product_id`, `productname`, `proimg`, `prodesc`,`quantity`, `price`,`sum`,`date`) VALUES (NULL,'$user_id','$autoid','$proname','$image','$prodesc','$quantity','$price','$sum',NOW())");
}

$id1 = $_GET['product_id'];
 $sql3="SELECT * FROM `cart table` where product_id='$id1'";
  $sqlresult13 = mysql_query($sql3);
 while( $r1 = mysql_fetch_array($sqlresult13))
 {
     $price1 = $r1['price'];
	 $quantity=$_POST['quantity'];
	 $sum1=$price1 * $quantity;
     echo $sum1;
	}
?>

<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script>
function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}


</script>
</script>

<!--<script type="text/javascript">

  function callAutoAsignValue(idname)
	{
			
			 var name1 = parseInt(idname,10);
			 
			var quantity1 = name1+1;
			
			 var rate1 =  quantity1+1;
			 var total1 = rate1+1;
			
			 if(parseInt(idname)>0)
			 {
			 quantity1="00"+quantity1;
			 rate1="000"+rate1;
			 total1="00000"+total1;
			 
			 }
			 else
			 {
			  quantity1="00";
			  rate1="000";
			  total1="00000";
			  
			 }
							
	}
	function callQKeyUp(Qidname)
	{		
	
			 var quantity = parseInt(Qidname,10);
			 var rate =  quantity+1;
			 var total = rate+1;
			 var rowcount = parseInt((total+1)/5);
			 if(rowcount==0)
			 rowcount=1;
			
			 if(parseInt(Qidname)>0)
			 {
			 quantity="00"+quantity;
			 rate="000"+rate;
			 total="00000"+total
			 }
			 else
			 {
			  quantity="00";
			  rate="000";
			  total="00000";
			 }
			var result= parseFloat($("#"+quantity).val()) * parseFloat( $("#"+rate).val() );
			result=result.toFixed(2);
			$("#"+total).val(result);
			
			updateSubtotal();
			
	}
	function callRKeyUp(Ridname)
	{
			 var brate = parseInt(Ridname,10);
			 var quantity =  brate-1;
			 var srate =  brate+1;
			 var total = srate+1;
			 
			 
			 callQKeyUp(brate-1)

			 /*if(parseInt(Ridname)>0)
			 {
			 quantity="00"+quantity;
			 brate="000"+brate;
			 srate="0000"+srate;
			 total="000000"+total
			 
			 }
			 else
			 {
			  quantity="00";
			  brate="000";
			  srate="0000";
			  total="000000";
			  
			 }
			
			var result= parseFloat($("#"+quantity).val()) * parseFloat( $("#"+brate).val() );
			result=result.toFixed(2);
			$("#"+total).val(result);
			
			updateSubtotal();*/
	}
	function balanceCalc()
	{		if(parseFloat($("#payment").val()) > parseFloat($("#subtotal").val()))
			$("#payment").val(parseFloat($("#subtotal").val()));
			
			var result= parseFloat($("#subtotal").val()) - parseFloat( $("#payment").val() );
			result=result.toFixed(2);
			$("#balance").val(result);
	}
	
	function updateSubtotal()
	{					
					var temp=0;
					for (i=0;i<=400;i=i+1)
					{
					if($("#00000"+i).length>0)
					{
					 temp=parseFloat(temp)+parseFloat($("#00000"+i).val());
				 	 
					}
					}
				
			
			var subtotal=parseFloat(temp);
			
			if($("#00000").length>0)
			{
			var firstrowvalue=$("#00000").val();
			
			subtotal=parseFloat(subtotal)+parseFloat(firstrowvalue);
			}
			subtotal=subtotal.toFixed(2);
			$("#subtotal").val(subtotal);
			/*var vat = 12.3;
			if($("#subtotal").length>0)
			{
			var vatnew = $("#subtotal").val();
			var vatfinal = ((vatnew * vat) / 100 );
			}
			vatfinal=vatfinal.toFixed(2);
			$("#vat").val(vatfinal);
			if($("#vat").length>0)
			{
			var maintotal = parseFloat(vatnew) + parseFloat(vatfinal);
			}
			maintotal=maintotal.toFixed(2);
			$("#maintotal").val(maintotal);*/
			
			
	}
function linetotal()
	{		
			var result= parseFloat($("#quantity").val()) * parseFloat( $("#price").val() );
			result=result.toFixed(2);
			$("#linetotal").val(result);
	}
</script>-->
<title>Home News</title>
 <link href="css/bootstrap-combined.no-icons.min.css" rel="stylesheet">

   
</head>
<body>





<div style="position:relative; margin-top:52px; ">
<br/>

<table width="98%" border="0" bgcolor="#FFFFFF"   id="example-table" class="table table-striped table-hover table-condensed" >
  <tr>
    <td width="109">userid<i class="icon-filter"></i></td>
    <td width="109">Product id<i class="icon-filter"></i></td>
    <td width="123">productname<i class="icon-filter"></i></td>
    <td width="123">product image<i class="icon-filter"></i></td>
    <td width="232">product description<i class="icon-filter"></i></td>
    <td width="114">quantity<i class="icon-filter"></i></td>    
    <td width="110">price<i class="icon-filter"></i></td>
    <td width="157">sum<i class="icon-filter"></i></td>
    <td width="72">Function</td>
    <td width="129"></td>
  </tr>
  <tr>
    <td colspan="10"></td>
  </tr>
  
  <form  name="test" action="cart.php" method="post">
  <?php
   $autoid=$r23['autoid'];
  $proname=$r23['procategory'];
  $sql2="SELECT * FROM `cart table`";
  $sqlresult12 = mysql_query($sql2);
 while( $r = mysql_fetch_array($sqlresult12))
 {
   $desc2 = substr( $r['prodesc'], 0, 100 ); 
   ?>
  <tr>
  
    <td height="20">
     
     <?php echo $r['userid']; ?></td>
    <td><?php echo $r['product_id']; ?><input type="hidden" name="rr" value="<?php echo $r['product_id']; ?>"/></td>
    <td><?php echo $r['productname']; ?></td>
    <td><img src="<?php echo $r['proimg']; ?>"></td>
    <td><?php echo $desc2; ?></td>
    <td><input type="text" name="quantity" placeholder="1" value=""/><a href="cart.php?product_id=<?php echo $r['product_id']; ?>">save</a></td>
    <td><?php echo $r['price']; ?></td>
   
    <td><?php echo $r['sum']; ?></td>  
     <td width="90" valign="top" class="arial"><p align="left"> <a href="cart.php?del=d&product_id=<?php echo $r['product_id']; ?>" onClick="return confirm('Are you sure?');"><img src="images/Delete.png" alt="1" width="40" height="40" title="Delete Product" border="0" /></a></p></td><td><a href="index.php">continue shopping</a></td>
    </tr>
    
    <?php }?>
    </form>
    <tr>
    <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="subtotal" id="subtotal" type="text" readonly="" style="width:100px; text-align:right; color:#333333; font-weight:bold; font-size:16px;" value="0.00" /></td>
    <td valign="top" class="arial">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    </table>

   
</div>
    
    </body>
    </html>
