<?php
include "dbc.php";
error_reporting(0);
include("functions.php");
session_start();
//$id1=$_SESSION['raga_id'];
//srand((double) microtime( ) *1000000);
	//$random=rand();
	//$autoid=$random;
//if(!checkAdmin()) {
//header("Location: login.php");
//exit();
//}
 include_once('phpToPDF.php') ;
  $today1=date('m-d-Y(h A');
  $today2=substr($time,0,16);
$deliver=@$_POST['deli'];
$land=@$_POST['land'];
$area=@$_POST['area'];
$time=@$_POST['today'];
$ordertotal=@$_POST['ordtot'];
$delicharge=@$_POST['orddel'];
$totalamount=@$_POST['tott'];
 $user=$_SESSION['uuser'];
 $delidate=substr($time,0,10);
 $ty=date("Y-m-d");

  $max = $db->maxOfAll("id","orders2");
					  $max=$max+1;
					  $orderid="order-id-".$max."";

if(isset($_REQUEST['submit']))
{

		  $result=mysql_query("select *from newusers where user_name='$user'") or die(mysql_error());
	 $row=mysql_fetch_array($result);

			$user_id=$row['user_id'];

			 $user_mail=$row['user_mail'];
			 $user_phone=$row['user_phone'];
			 $user_address=$row['user_address'];
 $html='<div class="logo"><img src="http://www.maligai.net/images/llogo.png" style="width:304px; height:132px;" /></a></div><div class="box-titleee" style"margin-top=50px;">
        OrderDate:'.$ty.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;deliveryDate:'.$time.'</div></br><h3 style="color:#730D3E">userdetail</h3></br> <table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#FFFAF0;border-radius: 5px;margin-bottom:20px;font-size: 12px; " width="100%"> <tr style="font-weight:bold;height:30px;padding:10px;"><td style="padding-left:5px;">user-id</td><td style="padding-left:5px;">Name</td><td style="padding-left:5px;">Phone</td><td style="padding-left:5px;">Order-id</td><td style="padding-left:5px;">DeliveryAddress</td><td style="padding-left:5px;">Email</td></tr>
  			  	            		<td width="12%" style="padding-left:5px;">'.$user_id.'</td>

  			  	                    <td width="12%" style="padding-left:5px;">'.$user.'</td>
									<td width="12%" style="padding-left:5px;">'.$user_phone.'</td>
									<td width="12%" style="padding-left:5px;">'.$orderid.'</td>
  			  	                    <td width="25%" style="padding-left:5px;">'.$deliver.'<br>'.$land.'<br>'.$area.'</td>
									<td width="27%" style="padding-left:5px;">'. $user_mail.'</td>


  			     		  </tr>
						  </table>';



						 $puser = base64_encode($orderid);
						 $pdfuser=$puser.".pdf";
						 $_SESSION['pdf']= $pdfuser;

	if($errr=="")
	{


	 $db->query("INSERT INTO `orders2`( `order_id`, `user-id`, `user-email`, `Phone-no`, `orderdate`, `deliverydate`,`delidate`, `deliveryaddress`, `landmark`, `area`, `CartAmount`, `Deliverycharge`, `Totalamount`,`orderstatus`) VALUES ('$orderid','$user_id','$user_mail','$user_phone',NOW(),'$time','$delidate','$deliver','$land','$area','$ordertotal','$delicharge','$totalamount','processing')");


	}


}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
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
<title>Untitled Document</title>
<style>

* {
	margin: 0;
	padding: 0;
}
html {
	height: 100%;
	/*Image only BG fallback*/
	/*background = gradient + image pattern combo*/
	background:
}
body {
	font-family: montserrat, arial, verdana;
}
/*form styles*/
#msform {
	width: 700px;
	margin-left: 75px;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: #FFFAF0;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	box-sizing: border-box;
	width: 90%;
	margin: 20% 10%;
	/*stacking fieldsets above each other*/
	position: relative;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
 display: none;
}
/*inputs*/

/*buttons*/
#msform .action-button {
	width: auto;
	background: #851F56;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin-left:28px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
#msform .action-butt {
	width: auto;
	background: #851F56;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin-left:28px;
}
#msform .action-butt:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
}

.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
}
/*progressbar*/



/*progressbar connectors*/

#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none;
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
	background: #27AE60;
	color: white;
}
#checkout-already_button signinToCheckout {
	border-radius: 5px;
	-moz-border-radius: 5px;
-webkit-border-radius:
font-size: 14px;
	font-weight: bold;
	color: #FFF;
	display: block;
	text-decoration: none;
	width: 87px;
	margin: 0 auto;
	padding: 1px 0 4px 0;
	cursor: pointer;
	cursor: hand;
	border: 0;
	position:absolute;
}
.checkout-already_button, #signin_submit {
	background: url(images/subnit-btn.png) repeat-x scroll 0 0 #6F6D6D;
	border: 0 none;
	border-radius: 5px;
	color: #FFFFFF;
	cursor: pointer;
	display: block;
	font-size: 14px;
	font-weight: bold;
	margin: 0 auto;
	padding: 1px 0 4px;
	text-decoration: none;
	width: 87px;
}
.checkout-cart-box {
    margin-bottom: 8px;
    padding: 2px;
}
.content-right-common, .checkout-cart-box {
    background: none repeat scroll 0 0 #C0C2C3;
    border-radius: 8px;
    margin-top: 0;
    padding: 3px;
}
.checkout-cart-box-head {
    overflow: hidden;
}
.checkout-mycart {
    background: url("/img/checkout/checkout-mycart-ico.gif") no-repeat scroll 0 1px rgba(0, 0, 0, 0);
    color: #383838;
    float: left;
    font-weight: bold;
    height: 27px;
    margin-left: 4px;
    overflow: hidden;
    padding-left: 17px;
}

#cartQty {
    color: #FFFFFF;
    display: block;
    float: left;
    font-size: 11px;
}
.ch-mycart-text {
    display: block;
    float: left;
    font-size: 14px;
    padding: 3px 0 0 7px;
}

.ch-pay-outer {
    background: none repeat scroll 0 0 #E6E6E6;
    border-radius: 0 0 6px 6px;
    border-top: 1px solid #DADADA;
    font-size: 12px;
    font-weight: bold;
    overflow: hidden;
    padding: 2px 0;
}
.cont-right {
    float: right;
    overflow: hidden;
    width: 245px;
}
.ch-cart-items {
    padding-left: 6px;
    width: 95px;
}
.checkout-cart-list-outer {
    border-bottom: 1px dotted #B2B2B2;
    clear: both;
    overflow: hidden;
    padding: 3px 0 4px;
}
.ch-shipcrg-box {
    padding: 2px 0 3px 8px;
}
</style>
</head>

<body>

<div class="wrapper">
<?php include 'frontheader.php'; ?>
<div class="ecommenu">
<div class="innerecommenu" >
<div class="emenu" >
<div class="nav-container">
<div class="nav">
<?php include "mainmenunew.php";?>
<div class="cart"><a href="# class="big-link" data-reveal-id="myModal"  title="View Cart"><img src="images/cartbck.png" /><span class="cart1"><?php echo get_total_count(); ?></span></a></div>
</div>
</div>
</div>
</div>
 <div class="innerallproducts">
<div class="customerdelivery">
<form id="msform" name="msform" action="payment1.php" method="post">

  <!-- progressbar -->

  <!-- fieldsets -->

  <fieldset>
    <h3 class="hloog">Delivery Address</h3>
    <table class="tableDeli">
    <tr class="tr"><td class="td">Delivery Address</td><td class="td"><textarea id="comment" class="tearea" rows="3" cols="5" title="Comment" name="deli"></textarea></td> </tr>
    <tr class="tr"><td class="td">Landmark</td><td class="td"><input type="text" class="teeee" name="land" value="" required="required" /></td> </tr>
    <tr class="tr"><td class="td">Area</td><td class="td"><select name="area" class="tedrop" required="required">
 <option value="" selected="selected">select</option>
  <option value="Manapparai">Manapparai</option>
  <option value="Thuraiyur">Thuraiyur</option>
  <option value="Thuvakudi">Thuvakudi</option>
  <option value="Lalgudi">Lalgudi</option>
  <option value="Manachanallur">Manachanallur</option>
  <option value="Musiri">Musiri</option>
  <option value="Thottiyam">Thottiyam</option>
  <option value="Kolli Hills">Kolli Hills</option>
  <option value="Uppiliapuram">Uppiliapuram</option>
  <option value="Navalurkottapattu">Navalurkottapattu</option>
  <option value="Trichy Town Areas">Trichy Town Areas</option>
  <option value="mambalasalai">mambalasalai</option>
  <option value="T.V.Koil">T.V.Koil</option>
  <option value="Sri Rangam">Sri Rangam</option>
  <option value="Tolgate">Tolgate</option>
  <option value="utthamarkoil">utthamarkoil</option>
  <option value="k.k.nagar">k.k.nagar</option>
  <option value="srinivasa Nagar">srinivasa Nagar</option>
  <option value="ponnagar">ponnagar</option>
  <option value="Thiruvarumbur">Thiruvarumbur</option>


  </select></td> </tr>
    </table>
    <input type="button" name="next" class="next action-button" value="procede to slotselection" />
  </fieldset>
  <fieldset>
    <h3 class="hloog">
Select your preferred date and time
</h3>
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
    <table class="tableDeli" id="field1">
     <tr class="tr"><td class="td">Date</td><td class="td">chose your slots</td> </tr>
     <form action="payment1.php" method="post" name="dfghi">
     <tr class="tr"><td class="td"><?php echo $today."<br>(".$td.")"; ?></td><td class="td"><input type="radio" name="today" value="<?php echo $today;?>
    (06 AM to 09 AM)" onclick="date()" id="1" ><p>Early Morning
    (6 AM to 9 AM)</p></input></td><td class="td"><input type="radio" name="today" onclick="date1()" id="2"  value="<?php echo $today;?>(10 AM to 04 PM)"  ><p>Day Time(10 AM to 4 PM)</p></input></td><td class="td"><input type="radio"  value="<?php echo $today;?>(07 PM to 10 PM)"  name="today" onclick="date2()" id="3"><p>Late Evening(7 PM to 10 PM)</p></input></td> </tr>
    </form>
    <tr class="tr"><td class="td"><?php echo $tom."<br>(".$tm.")"; ?></td><td class="td"><input type="radio" name="today" value="<?php echo $tom;?>(6 AM to 9 AM)"  ><p>Early Morning
    (6 AM to 9 AM)</p></input></td><td class="td"><td class="td"><input type="radio" name="today" value="<?php echo $tom;?>(10 AM to 4 PM)"  name="tommarow"><p>Day Time(10 AM to 4 PM)</p></input></td><td class="td"><input type="radio" name="today" value="<?php echo $tom;?>(7 PM to 10 PM)"  ><p>Late Evening(7 PM to 10 PM)</p></input></td> </tr>
    <tr class="tr"><td class="td"><?php echo $after."<br>(".$df.")"; ?></td><td class="td"><input type="radio" name="today" value="<?php echo $after;?>(6 AM to 9 AM)"  ><p>Early Morning
    (6 AM to 9 AM)</p></input></td><td class="td"><td class="td"><input type="radio" name="today" value="<?php echo $after;?>(10 AM to 4 PM)"  ><p>Day Time(10 AM to 4 PM)</p></input></td><td class="td"><input type="radio" name="today" value="<?php echo $after;?>(7 PM to 10 PM)"  ><p>Late Evening(7 PM to 10 PM)</p></input></td> </tr>

    </table>
    <input type="hidden" name="error" value="<?php echo $errr?>" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
   <input type="button" name="next1" class="next1 action-butt" value="procede to payment" />

  </fieldset>

  <fieldset>
    <h2 class="fs-title">Cart Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#FFFAF0;border-radius: 5px;margin-bottom:20px;font-size: 12px; " width="100%">
    	<?php
    	 $html.='</br><h3 style="color:#730D3E">OrderDetail</h3> <table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#FFFAF0;border-radius: 5px;margin-bottom:20px;font-size: 12px; " width="100%"> <tr style="font-weight:bold;height:30px;padding:10px;"><td style="padding-left:5px;">Serial</td><td style="padding-left:5px;">Name</td><td style="padding-left:5px;">Price</td><td style="padding-left:5px;">Weight</td><td style="padding-left:5px;">Qty</td><td style="padding-left:5px;">Amount</td></tr>';
			if(is_array($_SESSION['cart'])){
            	echo '<tr style="font-weight:bold;height:30px;padding:10px;"><td style="padding-left:5px;">Serial</td><td style="padding-left:5px;">Name</td><td style="padding-left:5px;">Price</td><td style="padding-left:5px;">Qty</td><td style="padding-left:5px;">Amount</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid);
					$image1=get_product_image($pid);
					$weight=get_weight($pid);
					$i1=$i+1;
					$amm= get_price($pid)*$q;
					$pp=get_price($pid);


						$html.=' <tr>
  			  	            		<td width="10%" style="padding-left:5px;">'.$i1.'</td>
  			  	                   <td width="30%" style="padding-left:5px;">'.$pname.'</td>

								   <td width="15%" style="padding-left:5px;">'.$pp.'</td>
								   <td width="15%" style="padding-left:5px;">'.$weight.'</td>
  			  	                    <td width="10%" style="padding-left:5px;">'.$q.'</td>
  			  	                    <td width="15%" style="padding-left:5px;">'.$amm.'</td>


  			     		  </tr>';


					if($_REQUEST['submit'])
					{
						$price=get_price($pid);
						if($errr=="")
						{

							   $result1=mysql_query("select autoid from products where proname='$pname'");
			   $row1=mysql_fetch_array($result1);
			   $proid=$row1['autoid'];
							echo $db->query("INSERT INTO `order detail`(`order-id`, `user-id`, `pro-id`, `proname`,`weight`,`quantity`, `orderdate`, `delivery date`, `amount`) VALUES ('$orderid','$user_id','$proid','$pname','$weight','$q',NOW(),'$time','$price')");

$message.= 'prodect :'  .$pname.'   Quantity:'  .$q.  'Price:'  .$price."\r\n";



	}

					}

					if($q==0) continue;

			?>
            		<tr><td width="5%" style="padding-left:5px;"><?php echo $i+1?></td>
            		<td width="30%" style="padding-left:5px;"><?php echo $pname?></td>
                    <input type="hidden" name="pronn" value="<?php echo $pname?>" />
                    <td width="16%" style="padding-left:5px;"><img src="<?php echo $image1;?>" width="50px" height="50px" style="margin-top: 5px;margin-bottom: 10px;"></td>
                    <td width="9%" style="padding-left:5px;"><?php echo get_price($pid)?></td>

                    <td width="6%" style="padding-left:5px;"><input type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>
                    <input type="hidden" name="qty" value="<?php echo $q?>" />
                    <td width="11%" style="padding-left:5px;"><?php echo get_price($pid)*$q?></td>
                    <input type="hidden" name="price" value="<?php echo get_price($pid)*$q?>" />
          <td width="4%" style="padding-left:5px;padding-right:10px;"><a href="javascript:del(<?php echo $pid?>)"><img src="images/Cross.png" alt="1" width="10" height="10" title="Delete Product" border="0" /></a></td>
   		  </tr>
            <?php
				}
				$ordertot=get_order_total();
				if($ordertot<750)
				{
				$deli=30;
				}
				else
				{
					$deli=0;
				}
				$tot=$ordertot+$deli;
				?>
                   <input type="hidden" name="ordtot" value="<?php echo $ordertot; ?>" />
                      <input type="hidden" name="orddel" value="<?php echo $deli;?>" />
                         <input type="hidden" name="tott" value="<?php echo $tot; ?>" />
                <?php
				$html.='<tr>

				  <td colspan="5" align="right" style=" text-align:right; font-size:12px;"><b>Order Total : </b></td>
				  <td colspan="1" align="left" style=" text-align:left; font-size:12px;"><b> Rs.'. $ordertot.'</b></td>

		  </tr>
          <tr>

				  <td colspan="5" align="right" style="padding-top: 10px; text-align:right; font-size:12px;"><b>Delivery charges : </b></td>
				  <td colspan="1" align="left" style="padding-top: 10px; text-align:left; font-size:12px;"><b> Rs.'.$deli.'</b></td>

		  </tr>
           <tr>

				  <td colspan="5" align="right" style=" padding-top: 10px;text-align:right; font-size:12px;"><b>Total : </b></td>
				  <td colspan="1" align="left" style="padding-top: 10px; text-align:left; font-size:12px;"><b> Rs. '.$tot.'</b></td>

		  </tr></table>';
		  $html.='<span style="color:#093;">Thanks for business at<b> maligai.net</b></span>';

				phptopdf_html($html,'pdf/',$pdfuser);

				ini_set("SMTP","127.0.0.1");
        ini_set("smtp_port","25");
		$subject="Your orders";
		$subject2=$user."Ordered Products";
		$message.='Name :'.$user."\r\n";
		$admin="sales@maligai.net";
		$separator = md5(time());
		$attachment = chunk_split(base64_encode($pdfuser));

		$eol = PHP_EOL;
		$message1="Dear Customer,<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>Please find your order details and download your invoice.<p><br>";
		$message1.='click here to find your orders <br> :http://www.maligai.net/pdf/'.$pdfuser.'';
		$message1.="<br><br> Thanks,<br>Maligai.net team.<br>Phone:&nbsp;&nbsp;&nbsp;&nbsp;9789470164.";
$message.='phone number :'.$user_phone."\r\n";
$message.='email :'.$user_mail."\r\n";

$message.='click here to find orders :http://www.maligai.net/pdf/'.$pdfuser.'';
$header='From: sales@maligai.net' . "\r\n" .'Reply-To:sales@maligai.net'."\r\n";
'Name:'.$user.'';'X-Mailer: PHP/' . phpversion();
 $header .= 'MIME-Version: 1.0' . "\r\n";
  $header .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
$headers2.='From: ' .$user_mail. "\r\n" .'Reply-To:'.$user_mail."\r\n";
 $headers2 .= 'MIME-Version: 1.0' . "\r\n";

  $headers2 .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
'Name:'.$user.'';'X-Mailer: PHP/' . phpversion();
if($_REQUEST['submit'])
					{

						if($errr=="")
						{
mail($user_mail,$subject,$message1,$header);
mail($admin,$subject2,$message,$header2);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=placeorder.php">';
						unset($_SESSION['cart']);
						}}
			?>
				<tr>

				  <td colspan="5" align="right" style=" text-align:right; font-size:12px;"><b>Order Total : </b></td>
				  <td colspan="2" align="left" style=" text-align:left; font-size:12px;"><b> Rs. <?php echo $ordertot?></b></td>

		  </tr>
          <tr>

				  <td colspan="5" align="right" style="padding-top: 10px; text-align:right; font-size:12px;"><b>Delivery charges : </b></td>
				  <td colspan="2" align="left" style="padding-top: 10px; text-align:left; font-size:12px;"><b> Rs. <?php echo $deli;?></b></td>

		  </tr>
           <tr>

				  <td colspan="5" align="right" style=" padding-top: 10px;text-align:right; font-size:12px;"><b>Total : </b></td>
				  <td colspan="2" align="left" style="padding-top: 10px; text-align:left; font-size:12px;"><b> Rs. <?php echo $tot;?></b></td>

		  </tr>


        </table>
  <input type="button" name="previous" class="previous action-button" value="Previous" />
   <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>
</div>

</div>

</div>
</div>
  <?php
  }
  else{
    				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
  			}

?>
<?php

?>
<?php include 'frontfooter.php'; ?>
</div>
</div>

<!-- jQuery -->
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script>
function update_cart(){
		document.msform.command.value='update';
		document.msform.submit();
	}
</script>
<script type="text/javascript">
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating;

$(".next").click(function(){
	if ((document.msform.deli.value!="")&&(document.msform.land.value!="")&&(document.msform.area.value!=""))
    {
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();
	}
	else
	{
		alert ("You must fill in all of the required .fields!");
		}
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
radioArray = document.msform.today


for (i=0; i < radioArray.length; i++){
   if (radioArray[i].checked){
      var selected=radioArray[i].Value;
 //flag to prevent quick multi-click glitches
 }
}
$(".next1").click(function(){
	if ((selected!=""))
    {
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();
	}
	else
	{
		alert ("you must enter time slot");
		}
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});


$(".previous").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	//show the previous fieldset
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return true;
})

</script>
<script>
var formatDate = (function () {
    function addZero(num) {
        return (num >= 0 && num < 10) ? "0" + num : num + "";
    }

    return function (dt, withTime) {
        var formatted = '';

        if (dt) {
            formatted = [addZero(dt.getMonth() + 1), addZero(dt.getDate()), dt.getFullYear()].join("/");
            if (withTime) {
                var hours24 = dt.getHours();
                var hours = ((hours24 + 11) % 12) + 1;
                formatted = [formatted, [addZero(hours24), addZero(dt.getMinutes())].join(":"), hours24 > 11 ? "pm" : "am"].join(" ");
            }
        }
        return formatted;
    }
})();

function date()
{
	var fromdt=formatDate(new Date(), true);

 var todt=formatDate(new Date());
 var tod=todt.concat(" 09:00am");

if (fromdt > tod){
alert("please select your delivery time after 3hour from your order time");
document.getElementById("1").disabled=true;
}

}

function date1()
{

var fromdt=formatDate(new Date(), true);

 var todt=formatDate(new Date());
 var tod=todt.concat(" 13:00pm");

if (fromdt > tod){
alert("please select your delivery time after 3hour from your order time");
document.getElementById("2").disabled=true;
}
}
function date2()
{


var fromdt=formatDate(new Date(), true);

 var todt=formatDate(new Date());
 var tod=todt.concat(" 18:00pm");

if (fromdt > tod){
alert("please select your delivery time after 3hour from your order time");
document.getElementById("3").disabled=true;
}
}


</script>

</body>
</html>
