<?php
include "dbc.php";
error_reporting(0);
checkadmin_function();
include "functions.php";
	
	if($_REQUEST['command']=='delete' && $_REQUEST['pid']!=''){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
//$user_id = $_SESSION['user_id']; 
//if($user_id=="") {
//session_start();
//srand((double) microtime( ) *1000000);
//$random=rand();
//$autoid=$random;
//$_SESSION['user_id']= $autoid;
//exit();
//}
error_reporting (E_ALL ^ E_NOTICE);
if($_POST['Submit'] == 'Save') 	

            {
			$cus_name = $_POST['cus_name'];
			$user_name = $_POST['user_name'];
			$cus_mail = $_POST['cus_mail'];
			$cpwd = $_POST['cpwd'];
			
				if(!empty($_POST['pwd'])) {
  $pwd = $post['pwd'];	
  $hash = PwdHash($post['pwd']);
 }  
 else
 {
  $pwd = GenPwd();
  $hash = PwdHash($pwd);
  
 }	
			
			$db->query("insert into customer(cus_name,cus_mail) values('$cus_name','$cus_mail')");
			
			$db->query("insert into users(user_name,`pwd`,cpwd,cus_id,cus_mail,date) values('$user_name','$hash','$cpwd','$raga_id','$user_email',NOW())");
			
		}
										
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Shopping</title>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/backtotop.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>	
<script type="text/javascript" src="js/popup.js"></script>
<script src="http://cdn.webrupee.com/js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
$("#form1").submit(function(){
dataString = $("#form1").serialize();
$.ajax({
type: "POST",
url: "index1.php",
data: dataString,
dataType: "json",
timeout: 5000,
error: function (xhr, err) {
$("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
},
success: function(data) {
$("#msg").html("Hi " + data.nName + ", your email is " + data.email);
}
});
return false;
});
});
</script>
<!------------------- Main Menu query ---------------->0
<script type="text/javascript">
            $(function() {
				var $oe_menu		= $('#oe_menu');
				var $oe_menu_items	= $oe_menu.children('li');
				var $oe_overlay		= $('#oe_overlay');

                $oe_menu_items.bind('mouseenter',function(){
					var $this = $(this);
					$this.addClass('slided selected');
					$this.children('div').css('z-index','9999').stop(true,true).slideDown(200,function(){
						$oe_menu_items.not('.slided').children('div').hide();
						$this.removeClass('slided');
					});
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('selected').children('div').css('z-index','1');
				});

				$oe_menu.bind('mouseenter',function(){
					var $this = $(this);
					$oe_overlay.stop(true,true).fadeTo(200, 0.6);
					$this.addClass('hovered');
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('hovered');
					$oe_overlay.stop(true,true).fadeTo(200, 0);
					$oe_menu_items.children('div').hide();
				})
            });
        </script>
        <script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}


</script>
        <style  type="text/css">
		.reveal-modal h1
{
color: #000;
font-family: Arial, Helvetica, sans-serif;
margin: 0 0 12px;
font-size: 23px;
font-weight: normal;
text-shadow: 0 0 1px rgba(0, 0, 0, .01);
padding-top: 10px;
}
.big-link { display:block; margin-top: 0px; text-align: center; font-size: 70px; color: #06f; }
.reveal-modal p
{
margin: 0 0 12px;
font-size: 12px;
font-family: Arial, Helvetica, sans-serif;
line-height: 20px;
color: #616161;
padding-left: 10px;
padding-right: 10px;
}
/*	--------------------------------------------------
	Reveal Modals
	-------------------------------------------------- */
		
	.reveal-modal-bg { 
		position: fixed; 
		height: 100%;
		width: 100%;
		background: #000;
		background: rgba(0,0,0,.8);
		z-index: 100;
		display: none;
		top: 0;
		left: 0; 
		}
	
	.reveal-modal {
		visibility: hidden;
top: 100px;
left: 50%;
margin-left: -416px;
width: 787px;
min-height: 330px;
background: #eee url(modal-gloss.png) no-repeat -200px -80px;
position: absolute;
z-index: 101;
padding: 30px 40px 34px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
-moz-box-shadow: 0 0 10px rgba(0,0,0,.4);
-webkit-box-shadow: 0 0 10px rgba(0,0,0,.4);
-box-shadow: 0 0 10px rgba(0,0,0,.4);
		}
		
	.reveal-modal.small 		{ width: 200px; margin-left: -140px;}
	.reveal-modal.medium 		{ width: 400px; margin-left: -240px;}
	.reveal-modal.large 		{ width: 600px; margin-left: -340px;}
	.reveal-modal.xlarge 		{ width: 800px; margin-left: -440px;}
	
	.reveal-modal .close-reveal-modal {
		font-size: 22px;
		line-height: .5;
		position: absolute;
		top: 8px;
		right: 11px;
		color: #aaa;
		text-shadow: 0 -1px 1px rbga(0,0,0,.6);
		font-weight: bold;
		cursor: pointer;
		} 
		</style>
        <script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Asap:400,700:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); </script>
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<div class="header">
<div class="innerheader">
<div class="logo"><a href="index.html"><img src="images/logo.png" /></a></div>
<div class="headertopmenu">
      <ul class="topmenu">
   		 <li><a href="" onclick="openOffersDialog();">Login</a></li>
         <li>|</li>
    	 <li><a href="" >Signup</a></li>
  	     <li>|</li>
  	     <li><a href="contact.html">Customer Support</a></li>
         <li>|</li>
         <li><a href="trackorder.html">Track Order</a></li>
   
  <div id="overlay" class="overlay"></div>
    <div id="boxpopup" class="box">
	          <a onclick="closeOffersDialog('boxpopup');" class="boxclose"></a>
	
    <div id="contenttt">
	<div id="container">
	  	 <section class="tabs">
			 <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
			<span for="tab-1" class="tab-label-1">Signup</span>

			<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
			<span for="tab-2" class="tab-label-2">Login</span>

            <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
			<span for="tab-3" class="tab-label-3">Forget Password</span>
	
		<div class="clear-shadow"></div>
		
		<div id="content">
			<div class="content-1">
				<p>
					<a href="#" class="media tw">Twitter</a><a href="#" class="media fb">Facebook</a>
				</p>	
				<form  action="" autocomplete="on">
				  <p>
					<label for="usernamesignup" class="uname" data-icon="u">Your username</label>
					<input class="field" name="usernamesignup" required="required" type="text" placeholder="myusername" />
				  </p>
				  <p>
					<label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
					<input class="field" name="emailsignup" required="required" type="email" placeholder="myusername@gmail.com"/>
				  </p>
				  <p>
					<label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
					<input class="field" name="passwordsignup" required="required" type="password" placeholder="mypassword"/>
				  </p>
				  <p>
					<label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
					<input class="field" name="passwordsignup_confirm" required="required" type="password" placeholder="mypassword"/>
				  </p>
				  <p class="signin button">
					<input type="checkbox" required="required" /> I agree with terms and conditions 
					<input type="submit" value="Sign up"/>
				  </p>
				</form>
			</div>
			<div class="content-2">
				<p>
					<a href="#" class="media tw">Facebook</a><a href="#" class="media fb">Twitter</a>
				</p>
				<form  action="" autocomplete="on">
				  <p>
					<label for="username" class="uname" data-icon="u" > Your email or username </label>
					<input class="field" name="username" required="required" type="text" placeholder="myusername or myusername@gmail.com"/>
				  </p>
				  <p>
					<label for="password" class="youpasswd" data-icon="p"> Your password </label>
					<input class="field" name="password" required="required" type="password" placeholder="mypassword" />
				  </p>
				  <p class="keeplogin">
					<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> Keep me logged in
					<input type="submit" value="Login" />
				  </p>
				</form>
			</div>
			<div class="content-3">
				<form  action="" autocomplete="on">
				  <p>
					<label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
					<input class="field" name="emailsignup" required="required" type="email" placeholder="myusername@gmail.com"/>
				  </p>
				  <p class="signin button">
					<input type="submit" value="Get New Password"/>
				  </p>
				</form>
		    	</div>
	    	</div>
    	</section>
     </div>
	</div>
</div>
  <!------------------trackorder------------------>
        
        
        
        
        
        
        
        <!------------------track order end --------------------->
        
  </ul>
</div>

<div class="searboxecom">
<div class="boxsearch">
                <form id="ui_element" class="sb_wrapper">
                    <p>
						<span class="sb_down"></span>
						<input class="sb_input" type="text" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; What are you looking for?" />
						<input class="sb_search" type="submit" value=""/>
					</p>
					<ul class="sb_dropdown" style="display:none;">
						<li class="sb_filter">Filter your search</li>
						<li><input type="checkbox"/><label for="all"><strong>All Categories</strong></label></li>
						<li><input type="checkbox"/><label for="Automotive">Automotive</label></li>
						<li><input type="checkbox"/><label for="Baby">Baby</label></li>
						<li><input type="checkbox"/><label for="Beauty">Beautys</label></li>
						<li><input type="checkbox"/><label for="Books">Books</label></li>
						<li><input type="checkbox"/><label for="Cell">Cell Phones &amp; Service</label></li>
						<li><input type="checkbox"/><label for="Cloth">Clothing &amp; Accessories</label></li>
						<li><input type="checkbox"/><label for="Electronics">Electronics</label></li>
						<li><input type="checkbox"/><label for="Gourmet">Gourmet Food</label></li>
						<li><input type="checkbox"/><label for="Health">Health &amp; Personal Care</label></li>
						<li><input type="checkbox"/><label for="Home">Home &amp; Garden</label></li>
						<li><input type="checkbox"/><label for="Industrial">Industrial &amp; Scientific</label></li>
						<li><input type="checkbox"/><label for="Jewelry">Jewelry</label></li>
						<li><input type="checkbox"/><label for="Magazines">Magazines</label></li>
					</ul>
                </form>
      </div>


</div>
</div>
</div>
<div class="ecommenu">
<div class="innerecommenu" >
<div class="emenu" >
<div class="nav-container">
<div class="nav">
<div class="oe_wrapper">
			<div id="oe_overlay" class="oe_overlay"></div>
			<ul id="oe_menu" class="oe_menu">
             <?php
			$sql="SELECT  `categtitle`, `parent_categ`, `stores` FROM `procateg` ";
			$result=mysql_query($sql) or die (mysql_error());
			while($r=mysql_fetch_array($result))
			{
				$categtitle=$r['categtitle'];
				$parent_categ=$r['parent_categ'];
				$stores=$r['stores'];
				echo'<li><a href="">'.$r['parent_categ'].'</a>';
				?>
                	<div>
                    <ul>
                    <?php echo' <li class="oe_heading">'.$r['categtitle'].'</li>';?>
                    <?php echo'<li><a href="#">'.$r['stores'].'</a></li>';?>
                    </ul>
                    </div>
                    </li>
			<?php }?>   
	 			</ul>	

     </div>
        <div class="cart"><a href="#" class="big-link" data-reveal-id="myModal"  title="View Cart"><img src="images/cartbck.png" /><span class="cart1"><?php echo get_total_count(); ?></span></a></div>
        <div id="myModal" class="reveal-modal">
			<h1>MY CART (0 ITEMS)</h1>
 
<form id="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
	<div style="margin:0px auto; width:800px;" >
    <div style="padding-bottom:10px">
    	<h1 align="center" class="carth" style="font-size: 25px;color: #7b7b7b;">Your Shopping Cart</h1>
    <input type="button" value="Continue Shopping" onclick="window.location='index.php'" class="cinp" style="background-color: #280b0b;border: none;padding: 5px 5px 5px 5px;color: #ffffff;font-size: 17px;border-radius: 5px;"/>
    </div>
    	
        
        
        
        
        
</form>
			<a class="close-reveal-modal">&#215;</a>
		</div>

</div>
</div>
</div>
</div>
</div>
<div class="secondheader">
<div class="innersecondheader">
<div class="quickmenu">
<div class="quickmenutitlebck">
<h5>GO QUICKLY TO</h5></div>
	<ul class="quickmenulist">
		    <?php
            $sql5 = "SELECT * FROM products order by id desc limit 8";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
			$autoid = $r['procategory'];  
			$sqlquery1 = "select * from procateg where procategory = '$autoid'";
			$sqlresult1 = mysql_query($sqlquery1);
			$r1 = mysql_fetch_array($sqlresult1); 
            ?>
		<li><a href="categorycollections.php?procategory=<?php echo $r1['autoid']; ?>"><?php echo $r['proname']; ?></a></li><?php } ?>
		

	</ul>
</div>
<div class="ecomslider">
<div class="smallquotes"><center><b class="quotes">Life has no Answers ... But Have many Questions ...</b></center>
</div>
<div id="menu">
			<a href="#"><img src="images/slider001.png" title="New Model"/></a>
			<a href="#"><img src="images/slide002.jpg" title="Enjoy"/></a>
			<a href="#"><img src="images/slide003.jpg" title="Fast"/></a>
           <a href="#"><img src="images/slide004.gif" title="Easy"/></a>
  </div>
</div>
<div class="dealoftheday">
<div class="quickmenutitlebck">
<h5>DEAL OF THE DAY</h5></div>
<?php
			
            $sql5 = "SELECT * FROM products where procategory='Offer' order by id desc limit 1";
			$result5 = mysql_query($sql5);
			while($r8 = mysql_fetch_array($result5))
			{ 
			$autoid = $r8['procategory'];  
			$sqlquery21 = "select * from procateg where procategory = '$autoid'";
			$sqlresult21 = mysql_query($sqlquery21);
			$r21 = mysql_fetch_array($sqlresult21); 
            ?>
<div class="dealproductname"><h5 class="blackcolor"><?php echo $r8['proname']; ?> </h5></div>
<div class="dealoffer"><img src="images/offer.png" /></div>
<div class="dealimg"><img src="<?php echo $r8['proimg']; ?>" /></div>
<div class="amount"> 
<table width= "150"  height="30" border="0">
 <tr>
    <td class="stirkout"><span class="WebRupee">Rs.</span> <?php echo $r8['price']; ?></td>
    <td class="nonstirkout">Rs. <?php echo $r8['dprice']; ?></td>
</tr>
</table>
</div>
<div class="detaildashed">
<a href="productview.php?id=<?php echo $r8['id']; ?>"><div class="detailslist"><h5 class="blackcolor">Details</h5></div></a>
<a href="categorycollections.php?procategory=<?php echo $r21['autoid']; ?>"><div class="viewall"><h5>View All</h5></div></a><?php } ?>
</div>

</div>
</div>
</div>
<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
<div class="thirdheader">
<div class="innerthirdheader">
<div class="latestoffer">
<div class="quickmenutitlebck">
<h5>LATEST OFFERS</h5></div>
<div class="dealproductname"><h5 class="blackcolor"></h5></div>
<div id="amazon_scroller1" class="amazon_scroller">
                   <div class="amazon_scroller_mask">
                       <ul>
                        <?php
            $sql5 = "SELECT * FROM products order by id desc limit 5";
			$result5 = mysql_query($sql5);
			while($r5 = mysql_fetch_array($result5))
			{ 
			$autoid = $r5['procategory'];  
			$sqlquery22 = "select * from procateg where procategory = '$autoid'";
			$sqlresult22 = mysql_query($sqlquery22);
			$r22 = mysql_fetch_array($sqlresult22); 
			
			 
			
            ?>
                           <li><a href="categorycollections.php?procategory=<?php echo $r22['autoid']; ?>" title="Rs. <?php echo $r5['price']; ?>"><img src="<?php echo $r5['proimg']; ?>"  alt="title"/></a>
                           <div class="detaildashed">
    <div class="viewall"></div>
  </div>
  
                           </li><?php } ?>  
                          
                     </ul>
                     
                   </div>
                   
 
                      
                   <ul class="amazon_scroller_nav" style="top:150px !important;">
                       <li style="margin-top:-60px !important; background:url(images/arrows.png) no-repeat !important; width:30px !important; position: relative;
left: -10px !important;"></li>
                       <li style="margin-top:-60px !important; background:url(images/arrowleft.png) no-repeat !important; width:30px !important; right:22px !important; "></li>
                   </ul>
                   <div style="clear: both"></div>
    </div>
    <br />
    
    
</div>
<div class="bestseller">
<div class="titlebckimg"><h5>BEST SELLERS</h5></div>
<div id="amazon_scroller3" class="amazon_scroller"  >
                   <div class="amazon_scroller_mask" style="width:500px !important;
height:195px !important; margin-left:40px !important;">
                       <ul>
                       <?php
            $sql5 = "SELECT * FROM products order by id desc limit 5";
			$result5 = mysql_query($sql5);
			while($r6 = mysql_fetch_array($result5))
			{
			$autoid = $r6['procategory'];  
			$sqlquery23 = "select * from procateg where procategory = '$autoid'";
			$sqlresult23 = mysql_query($sqlquery23);
			$r23 = mysql_fetch_array($sqlresult23);  
            ?>
                                            <li><a href="categorycollections.php?procategory=<?php echo $r23['autoid']; ?>" title="Rs. <?php echo $r6['price']; ?>"><img src="<?php echo $r6['proimg']; ?>"  alt="title" width="130" /></a></li><?php } ?>

                     </ul>
                   </div>
                   <ul class="amazon_scroller_nav">
                      <li style="margin-top:-66px !important; background:url(images/arrows.png) no-repeat !important; width:30px !important; position: relative;
left: -10px !important; "></li>
                       <li style="margin-top:-66px !important; background:url(images/arrowleft.png) no-repeat !important; width:30px !important; right:-25px !important; "></li>
                   </ul>
                   <div style="clear: both"></div>
      </div>

</div>
<div class="newarrivals">
<div class="quickmenutitlebck">
<h5>NEW ARRIVALS</h5></center>
<div class="dealproductname">
<h5 class="blackcolor"> </h5></div>
<div id="amazon_scroller2" class="amazon_scroller">
                   <div class="amazon_scroller_mask">
                       <ul>
                       <?php
            $sql5 = "SELECT * FROM products order by id desc limit 5";
			$result5 = mysql_query($sql5);
			while($r7 = mysql_fetch_array($result5))
			{ 
			$autoid = $r7['procategory'];  
			$sqlquery24 = "select * from procateg where procategory = '$autoid'";
			$sqlresult24 = mysql_query($sqlquery24);
			$r24 = mysql_fetch_array($sqlresult24); 
            ?>
                           <li><a href="categorycollections.php?procategory=<?php echo $r24['autoid']; ?>" title="Rs. <?php echo $r7['price']; ?>"><img src="<?php echo $r7['proimg']; ?>"  alt="title"/></a></li><?php } ?>
                      
                     </ul>
                   </div>
                   <ul class="amazon_scroller_nav">
                       <li style="margin-top:-55px !important; background:url(images/arrows.png) no-repeat !important; width:30px !important; position: relative;
left: -10px !important; "></li>
                       <li style="margin-top:-55px !important; background:url(images/arrowleft.png) no-repeat !important; width:30px !important; right:22px !important; "></li>
                   </ul>
                   <div style="clear: both"></div>
    </div>
    <br />
     <div class="detaildashed">
    <div class="detailslist"><h5 class="blackcolor">Details</h5></div>
    <div class="viewall"><h5>Add Cart</h5></div>
  </div>
</div>
</div>
</div>

<div class="allproducts">
<div class="innerallproducts">
<div class="itemproducts">
<div class="tiltlebckpro">
<h5>Our Products</h5>
</div>
<?php

 $sql5 = "SELECT * FROM products where `show`='home' LIMIT 16";
			$result5 = mysql_query($sql5);
			while($r9 = mysql_fetch_array($result5))
			{ 
			$autoid=$r9['procategory'];
			$sqlquery25 = "select * from procateg where procategory = '$autoid'";
			$sqlresult25 = mysql_query($sqlquery25);
			$r25 = mysql_fetch_array($sqlresult25); 
			
            ?>
<div class="firsproduct">
<section class="row">

            
			<div class="container-item">
				<div class="item"><img src="<?php echo $r9['proimg']; ?>"  width="200" height="240"/>
					<div class="item-overlay">
						<a href="#" class="item-button play"><i class="play"></i></a>
						<a href="#" class="item-button share share-btn"><i class="play"></i></a>
						<div class="sale-tag"><span>SALE</span></div>
					</div>
					<div class="item-content">
						<div class="item-top-content">
							<div class="item-top-content-inner">
								<div class="item-product">
									<div class="item-top-title">
										<h2><?php echo $r9['proname']; ?></h2>
										<!--<p class="subdescription">
											Low skateshoes - Grey
										</p>-->
									</div>
								</div>
								<div class="item-product-price">
									<span class="price-num"><?php echo $r9['dprice']; ?></span>
                                    <p class="subdescription"><?php echo $r9['price']; ?></p>
									<div class="old-price"></div>
								</div>
							</div>	
						</div>
						<div class="item-add-content">
							<div class="item-add-content-inner">
							<div class="section">
<!--									<h4>Sizes</h4>
									<p>40,41,42,43,44,45</p>-->
								</div> 
								<div class="section">
                                
									<a href="productview.php?id=<?php echo $r9['id']; ?>" class="btn buy expand">Buy now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="item-menu popout-menu">
	    <ul>
						<li><a href="#" class="popout-menu-item">Share</a></li>
						<li><a href="#" class="popout-menu-item">Info</a></li>
						<li><a href="#" class="popout-menu-item">Seller</a></li>
					</ul>
                    </div>
				</div>
		</section></div>
			<?php } ?>


<!-----Fourth product----->

        
        
        
        
        
        
        
        <p id="back-top">
		<a href="#top"><span></span>Back to Top</a>
	</p>
</div>
</div>
</div>
<?php include 'frontfooter.php'; ?>
</body>
</html>
