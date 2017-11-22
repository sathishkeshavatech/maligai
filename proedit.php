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
			error_reporting (E_ALL ^ E_NOTICE);

if(isset($_POST['submit'])) 	
{
	$autoid = $_POST['id'];
			$category = $_POST['cat'];			
			$subcategory = $_POST['sub'];
			$typecate = $_POST['type'];	
			$proname=$_POST['name'];
			$brand=$_POST['brand'];
			$price=$_POST['price'];	
			$offer=$_POST['offer'];
			$descri=$_POST['des'];
			$pimg=$_POST['immag'];
			$proimage=$_POST['proimg'];
			$qun=$_POST['quan'];
			 $ofer=($offer/100)*$price;
			 $actual=$price-$ofer;
			 $proimg = $_FILES['proimg']['name'];
			 if($proimage!="")
			 {
			 $db->query("UPDATE `products` SET `proname`='$proname',`procategory`='$category',`parent_category`='$subcategory',`sub_category`='$typecate',`price`='$price',`prodesc`='$descri',`proimg`='$proimage',`mnufacturer`='$brand',`weightclass`='$qun',`offer`='$actual',`date`=NOW(),`percenoffer`='$offer' WHERE autoid='$autoid'");
			$confrimerr="updated sucessfully";
			 }
			 else
			 {
			 $db->query("UPDATE `products` SET `proname`='$proname',`procategory`='$category',`parent_category`='$subcategory',`sub_category`='$typecate',`price`='$price',`prodesc`='$descri',`proimg`='$pimg',`mnufacturer`='$brand',`weightclass`='$qun',`offer`='$actual',`date`=NOW(),`percenoffer`='$offer' WHERE autoid='$autoid'");
			 $confrimerr="updated sucessfully";
			 }

			if($proimg != "")
				{
				$secondname=rand(0,10000000000);
			    $uploaddir = "productimages/";
			    $upload_pic = $uploaddir.$proimg;			
				copy($_FILES['proimg']['tmp_name'], $upload_pic);
				chmod("$upload_pic",0777);
				mysql_query("UPDATE products SET `proimg` = '$upload_pic' WHERE autoid ='$autoid'");
		}
			 
			 	
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
margin-top:50px;
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
<?php include 'adminheader.php'; ?>
<div class="innerecommenuadmin" >
<?php include "adminmenu.php";?>
</div>
 <div class="innerallproducts">
<div class="conta">
 <form id="form1" name="form1" method="post" action="proedit.php?autoid=<?php echo $_GET['autoid'];?>" enctype="multipart/form-data" class="table_bg">
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
<h1 align="center" style="color:#6e3389">Edit Product</h1>
<?php 
$aut=$_GET['autoid'];
$sql1=mysql_query("SELECT * FROM `products` WHERE autoid='$aut'");
while($row1=mysql_fetch_array($sql1))
				{
			$autid=$row1['autoid'];
					
?>
<table class="custpro" align="center" width="600">
 
<tr class="tr"><td class="td">product-Id</td><td class="td"><input class="tee" type="text" name="id" value="<?php echo $row1['autoid']; ?>" /></td> </tr>
<tr class="tr"><td class="td">Category</td><td class="td"><input type="text" class="tee" name="cat" value="<?php echo $row1['procategory'];?>" />
 </td> </tr>
<tr class="tr"><td class="td">Subcategory</td><td class="td"><input type="text" class="tee" name="sub" value="<?php echo $row1['parent_category']; ?>" /></td> </tr>
<tr class="tr"><td class="td">Type-Category</td><td class="td"><input class="tee" type="text" name="type" value="<?php echo $row1['sub_category']; ?>" /></td> </tr>
<tr class="tr"><td class="td">ProductName</td><td class="td"><input class="tee" type="text" name="name" value="<?php echo $row1['proname']; ?>" /></td> </tr>
<tr><td class="td">Brand</td><td class="td"><input class="tee" type="text" name="brand" value="<?php echo $row1['mnufacturer']; ?>" /></td> </tr>
<tr><td class="td">Prize</td><td class="td"><input class="tee" type="text" name="price" value="<?php echo $row1['price']; ?>" /></td> </tr>
<tr><td class="td">Percentage Offer</td><td class="td"><input class="tee" type="text" name="offer" value="<?php echo $row1['percenoffer']; ?>" /></td> </tr>
<tr><td class="td">Description</td><td class="td"><input class="tee" type="text" name="des" value="<?php echo $row1['prodesc']; ?>" /></td> </tr>
<tr><td class="td">Quantity</td><td class="td"><input class="tee" type="text" name="quan" value="<?php echo $row1['weightclass']; ?>" /></td> </tr>
<tr><td class="td">Image</td><td class="td"><img src="<?php echo $row1['proimg']; ?>"width="50px" height="50px" /><input type="hidden" name="immag" value="<?php echo $row1['proimg']; ?>" /></td> </tr>
<tr><td class="td">want to changeimage</td><td class="td"><input id="proimg" type="file" name="proimg" class="prim" value="Browse"></input></td> </tr>
<tr><td class="td"></td><td class="td"></td> </tr>
<tr><td class="td"><a href="adminedit.php" class="newreg fL"><--continue to edit</a></td><td class="td" ><input  class="bbtn" type="submit" value="update" name="submit" ></input></td> </tr>
<tr><td colspan="2" style="text-align:center"><span class="error"><?php echo $confrimerr;?></span></td></tr>
</table>
<?php } ?>
</form>
</div>
</div>
<?php include 'frontfooter.php'; ?>

</div>

<!-------- Search box query ------------>
    <script type="text/javascript">
            $(function() {
				/**
				* the element
				*/
				var $ui 		= $('#ui_element');
				
				/**
				* on focus and on click display the dropdown, 
				* and change the arrow image
				*/
				$ui.find('.sb_input').bind('focus click',function(){
					$ui.find('.sb_down')
					   .addClass('sb_up')
					   .removeClass('sb_down')
					   .andSelf()
					   .find('.sb_dropdown')
					   .show();
				});
				
				/**
				* on mouse leave hide the dropdown, 
				* and change the arrow image
				*/
				$ui.bind('mouseleave',function(){
					$ui.find('.sb_up')
					   .addClass('sb_down')
					   .removeClass('sb_up')
					   .andSelf()
					   .find('.sb_dropdown')
					   .hide();
				});
				
				/**
				* selecting all checkboxes
				*/
				$ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click',function(){
					$(this).parent().siblings().find(':checkbox').attr('checked',this.checked).attr('disabled',this.checked);
				});
            });
        </script>
      
      <script src="js/jquery-1.6.js" type="text/javascript"></script>
<script src="js/jquery.jqzoom-core.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
        });
	
});


</script>

<script type="text/javascript" src="js/jquery.quickflip.js" ></script>
<script type="text/javascript" >
	$('document').ready(function(){
		$('#flip-container').quickFlip();
		
		$('#flip-navigation li a').each(function(){
			$(this).click(function(){
				$('#flip-navigation li').each(function(){
					$(this).removeClass('selected');
				});
				$(this).parent().addClass('selected');
				var flipid=$(this).attr('id').substr(4);
				$('#flip-container').quickFlipper({ }, flipid, 1);
				
				return false;
			});
		});
	});
</script>


<!------------- login Query ---------------->
        
        <script type="text/javascript">
            $(function() {
                $(window).scroll(function(){
					var scrollTop = $(window).scrollTop();
					if(scrollTop != 0)
						$('#nav').stop().animate({'opacity':'0.2'},400);
					else	
						$('#nav').stop().animate({'opacity':'1'},400);
				});
				
				$('#nav').hover(
					function (e) {
						var scrollTop = $(window).scrollTop();
						if(scrollTop != 0){
							$('#nav').stop().animate({'opacity':'1'},400);
						}
					},
					function (e) {
						var scrollTop = $(window).scrollTop();
						if(scrollTop != 0){
							$('#nav').stop().animate({'opacity':'0.2'},400);
						}
					}
				);
            });
        </script>
       
        <!------------ Scroller Jquery --------------->  
<script type="text/javascript" src="js/amazon_scroller.js"></script>
<script language="javascript" type="text/javascript">

            $(function() {
                $("#amazon_scroller1").amazon_scroller({
                    scroller_title_show: 'enable',
                    scroller_time_interval: '4000',
                   
                    scroller_window_padding: '10',
                    scroller_border_size: '1',
                    scroller_border_color: '#000',
                    scroller_images_width: '124',
                    scroller_images_height: '160',
                    scroller_title_size: '12',
                    scroller_title_color: 'black',
                    scroller_show_count: '4',
                    directory: 'images'
                });
				$("#amazon_scroller2").amazon_scroller({
                    scroller_title_show: 'disable',
                    scroller_time_interval: '3000',
                    scroller_window_background_color: "none",
                    scroller_window_padding: '10',
                    scroller_border_size: '0',
                    scroller_border_color: '#CCC',
                    scroller_images_width: '110',
                    scroller_images_height: '160',
                    scroller_title_size: '12',
                    scroller_title_color: 'black',
                    scroller_show_count: '2',
                    directory: 'images'
                });
				$("#amazon_scroller3").amazon_scroller({
                    scroller_title_show: 'enable',
                    scroller_time_interval: '3000',
                    scroller_window_background_color: "none",
					scroller_window_background_border: "none",
                    scroller_window_padding: '10',
                    scroller_border_size: '2',
                    scroller_border_color: '#9C6',
                    scroller_images_width: '160',
                    scroller_images_height: '160',
                    scroller_title_size: '11',
                    scroller_title_color: 'black',
                    scroller_show_count: '3',
                    directory: 'images'
                });
            });
        </script>
         
         <!-------------------login popup ------------------>
<script type="text/javascript">
$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
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
<!--------------------form lightbox------------------------>
<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.2.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

	

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>
    <!--------------------End form lightbox------------------------>      
</body>
</html>
