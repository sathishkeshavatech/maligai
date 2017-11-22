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
		header("location: http://maligai.net/index.php");

		//header("location:index.php");
		exit();
		}
error_reporting (E_ALL ^ E_NOTICE);				
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
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

<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />

<!------------------- Main Menu query ---------------->

        
  
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'frontheader.php'; ?>
<div class="innerecommenu" >
<div class="emenu" >
<div class="nav-container">
<div class="nav">
<?php include "mainmenunew.php";?>
<?php
if(isset($_SESSION['uuser']))
{?>

<div class="cart"><a href="shoppingcart.php" class="big-link"><img src="images/cartbck.png" /><span class="cart1"><?php echo get_total_count(); ?></span></a></div>
<?php
}
else{?>
	<div class="cart"><a href="userlogin.php" class="big-link" ><img src="images/cartbck.png" /><span class="cart1"><?php echo get_total_count(); ?></span></a></div>
<?php } ?>
</div>
</div>
</div>
</div>

<div class="productview">
<div class="innerproductview">
<div class="tiltlebckpro2"><h5>OUR PRODUCTS</h5></div>
<?php
		   $id = $_GET['id'];
		   $_SESSION['page']=$id;
			$sqlquery = "select * from products where autoid = '$id'"; // query on table
			$sqlresult = mysql_query($sqlquery);
			while($row = mysql_fetch_array($sqlresult))
			{
				?>
<div class="zoomprice">

<div class="productzoom">
<h3  style="margin-left:20px;"><?php echo $row['proname']; ?></h3>
        <a href="" >
            <img src="<?php echo $row['proimg']; ?>"  title="triumph"  style="border: 1px solid #C9C9C9; width:200px; height:200px; margin-left:30px;margin-top:20px;">
        </a>
	
	<br/>

</div>
<div class="productbuy">
<br />
<div class="productname">
<h3>Brand:&nbsp;&nbsp;<?php echo $row['mnufacturer']; ?></h3>

<br />
</div>

<div class="pricebuy">
<div class="productamount">
<span class="WebRupee">Rs.</span> <?php echo $row['price']; ?><br />
<span class="taxestext"> Inclusive of all Taxes</span>
</div>
<div class="buynow">
<form name="form1">
	<input type="hidden" name="productid" value="<?php echo $row['id']; ?>"  />
    <input type="hidden" name="command" value="add" />
   
		   <input type="submit" name="add" value="Add to Cart" class="bbtn"/>
       
</form>
</div>

</div>
<br />


<table class="bordered" border="0"> 
    <tr>
       <h4>Prodect Description</h4>
    </tr>        
    <tr>
       <div class="tttb">  
  <?php echo $row['prodesc']; ?>
    
</div>
    </tr>
    
</table>
<br />

	</div>
</div> <!---- End Product Zoom ---->
<?php } ?>
</div>
<?php include 'frontfooter.php'; ?>

</div>
    
</body>
</html>
