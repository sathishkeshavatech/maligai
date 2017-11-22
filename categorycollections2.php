<?php
include("dbc.php");
error_reporting(0);
checkadmin_function();
include("functions.php");
	
if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		$auto=$_POST['auto'];
		addtocart($pid,1);
		header("location:categorycollections2.php?brand=$auto");
		exit();
		
		
		
		
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

										
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/backtotop.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/menuuu.css" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.2.css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
<script src="http://cdn.webrupee.com/js" type="text/javascript"></script>
<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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

<!------------------- Main Menu query ---------------->
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
        

<script type="text/javascript">

$(function(){
$(".sb_input").keyup(function() 
{ 
var inputSearch = $(this).val();
var dataString = 'searchword='+ inputSearch;
if(inputSearch!='')
{
      $.ajax({
      type: "POST",
      url: "frontheader.php",
      data: dataString,
      cache: false,
      success: function(html)
      {
      $("#divResult").html(html).show();
      }
      });
}return false;    
});

jQuery("#divResult").live("click",function(e){ 
      var $clicked = $(e.target);
      var $name = $clicked.find('.name').html();
      var decoded = $("<div/>").html($name).text();
      $('#search_query').val(decoded);
});
jQuery(document).live("click", function(e) { 
      var $clicked = $(e.target);
      if (! $clicked.hasClass("search")){
      jQuery("#divResult").fadeOut(); 
      }
});
$('#search_query').click(function(){
      jQuery("#divResult").fadeIn();
});
});
</script>


<!------------------- Main Menu query ---------------->
  
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'frontheader.php'; ?>
<div class="ecommenu">
<div class="innerecommenu" >
<div class="emenu" >

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
<?php include"carrrt.php";?>

</div>
</div>
<div class="clearer">
</div>
</div>
<div class="clearer">
</div>
</div>
<div class="aboutus">
<div class="inneraboutus clearfix">
<div class="place2">
<?php 
 $manufacture=$_GET['brand'];
 ?>
   <input type="hidden" name="auto" value="<?php echo $manufacture; ?>" />
<ul class="quickmenulist1">
 <li style="color:#fff; font-size:18px; text-align:center;"><b><?php echo $manufacture; ?></b></li>
<?php 
 $manufacture=$_GET['brand'];
$sqlquery2 = "select DISTINCT `sub_category`,`mnufacturer` from `products` where `mnufacturer`= '$manufacture' ";
$sqlresult2 = mysql_query($sqlquery2) or die (mysql_error());
			while($r10 = mysql_fetch_array($sqlresult2))
			{ 
 ?>
 
 <li><a href="categorycollections2.php?brand=<?php echo $r10['mnufacturer']?>&amp;sub_category=<?php echo $r10['sub_category'];?>"><?php echo $r10['sub_category'];?></a></li>
<?php
			}
			?>
 </ul>
 </div>
<div class="productallview">
<div class="itemproducts">
<div class="tiltlebckpro">
<h5>Our Products</h5>
</div>
<?php
   $manufacture=$_GET['brand'];
 
		$sub_category=$_GET['sub_category'];
		
		
		if(isset($manufacture)&&(!isset($sub_category)))
		{
	
		$sqlquery1 = "select * from `products` where `mnufacturer`= '$manufacture' ";
		}
		elseif(isset($sub_category))
		{
			
		$sqlquery1 = "select * from `products` where  `mnufacturer` = '$manufacture' AND `sub_category`='$sub_category'";
		}
			$sqlresult1 = mysql_query($sqlquery1) or die (mysql_error());
			while($r9 = mysql_fetch_array($sqlresult1))
			{ 
            ?>	
            <div class="firsproduct">
<section class="row">
<div class="container-item">
<div class="item">
<img src="<?php echo $r9['proimg']; ?>"  width="170" height="180"/>
<div class="item-overlay">
<a href="#" class="item-button play"><i class="play"></i></a>
						<a href="#" class="item-button share share-btn"><i class="play"></i></a>
						<div class="sale-tag"><span>SALE</span></div>
					</div>
					<div class="item-content">
						<div class="item-top-content">
								
						</div>
						<div class="item-add-content">
							<div class="item-add-content-inner">
							
							</div>
						</div>
					</div>
				</div>
			
                    </div>
</section>
<div class="iitem">

<div class="item-product">
<div class="cartbut">
									<form name="for" action="categorycollections2.php?brand=<?php echo $auto; ?>" method="post">
	<input type="hidden" name="productid" value="<?php echo $r9['id']; ?>"  />
    <input type="hidden" name="command" value="add" />
  <input type="hidden" name="auto" value="<?php echo $manufacture;?>" />
		   <input type="submit" name="add" value="Add to Cart" class="bbtn"/>
           
</form>

                                    </div>
                                    </div>

								<div class="item-product">
									<div class="item-top-title">
										<p><?php echo $r9['proname']; ?></p>
										<!--<p class="subdescription">
											Low skateshoes - Grey
										</p>-->
									</div>
								</div>
								<div class="item-product-price">
									<span style="color:#2d133b;"><?php echo $r9['weightclass']; ?></span>
								</div>
                         <div class="iitemfo">      
  <span class="price-num fL">Rs:<?php echo $r9['offer']; ?></span>  <p class="subdescription fR">Rs:<?php echo $r9['price']; ?></p>
                                  
									<div class="oold-price"></div> 
                                    </div> 
                                                         
</div>
  
</div>
     
    <?php }?>
<!-----Fourth product----->


  
            
            
<!-----Fourth product----->
</div>
<div class="clearer">
</div>
</div>

 <p id="back-top">
		<a href="#top"><span></span>Back to Top</a>
	</p>
    <div class="clearer">
</div>

</div>
<?php include 'frontfooter.php'; ?>

</div>
    
        
        <!----------- disable mouse right click on a web page query------------>
<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>


 <!----------- Top to Bottom page query------------>
<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
<!-------------- Toggle Plus Minu query-------->

<script type="text/javascript">
	$(document).ready(function() {
		$("li").click(function(){
			$(this).toggleClass("active");
			$(this).next("div").stop('true','true').slideToggle("slow");
		});
	});
	</script>
    
    
   
</body>
</html>
