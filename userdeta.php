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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
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


</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'adviewhead.php'; ?>
<div class="ecommenu">
<div class="innerecommenu" >

<div class="nav-container">
<div class="nav">
<?php include "adminmenu.php";?>

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
       <div class="customer2">
 <form name="edit" action="userdeta.php" method="post">

      <?php
       $userid=$_GET['user_id'];

$sql1=mysql_query("SELECT * FROM `newusers` WHERE `user_id`='$userid'");
while($row1=mysql_fetch_array($sql1))
				{

			?>
<h2  class="hlog" align="center">user Detail</h2>
 <div class="newlogin ">
 <h3 class="huser">Login details</h3>
 <div class="field2">
<b>Mobile Number :</b>
<span style="margin-left:20px;"><?php echo $row1['user_phone']; ?></span>

 </div>
 <input  type="hidden" name="userid" value="<?php echo $row1['user_id']; ?>" />



 <div class="field2">
<b>Full Name :</b>
<span style="margin-left:50px;"><?php echo $row1['user_name']; ?><span>
 </div>
  <div class="field2">
<b>Email Address :</b>
<span style="margin-left:20px;"><?php  echo $row1['user_mail'];?></span>
 </div>
<div class="field2">
<b>Customer Area :</b>
<span style="margin-left:20px;"><?php echo $row1['user_address']; ?></span>
</div>
<h3 class="huser" style="margin-top:30px;">Default Shipping Address Detail</h3>
<?php
       $userid=$_GET['user_id'];

$sql2=mysql_query("SELECT * FROM `orders2` WHERE `user-id`='$userid' order by id  ASC LIMIT 1");
while($row2=mysql_fetch_array($sql2))
				{

			?>
<div class="field2">
<b>Address:</b>
<span style="margin-left:20px;"><?php  echo $row2['deliveryaddress'];?></span>
</div>
<div class="field2">
<b>Landmark :</b>
<span style="margin-left:20px;"><?php  echo $row2['landmark'];?></span>
</div>
<div class="field2">
<b>Area&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b>
<span style="margin-left:20px;"><?php  echo $row2['area'];?></span>
</div>
<h3 class="huser" style="margin-top:30px;">Orders</h3>
<div style"">
<table border="0" cellpadding="5px" cellspacing="1px" class="administab" >
    	<?php

            	echo '<tr style="font-weight:bold; height:30px;padding:10px;"><td style="padding-left:5px;">Serial</td><td style="padding-left:5px;">orderdate</td><td style="padding-left:5px;">DeliveryDate</td><td style="padding-left:5px;">vieworder</td></tr>';
				   $userid=$_GET['user_id'];

$sql3=mysql_query("SELECT * FROM `orders2` WHERE `user-id`='$userid'");
while($row3=mysql_fetch_array($sql3))
				{

			?>
            		<tr>
                    <td width="20%" style="padding-left:5px;"><?php echo $row3['order_id'];?></td>
            		<td width="30%" style="padding-left:5px;"><?php echo $row3['orderdate'];?></td>
                    <td width="30%" style="padding-left:5px;"><?php echo $row3['delidate'];?></td>
                     <td width="20%" style="padding-left:5px;padding-right:10px;"><a href="custorderdetail.php?order_id=<?php echo $row3['order_id'];?>">vieworder</a></td>
   		  </tr>


 <?php }} }?>
</table>
</div>
 </div>
 </div>
 </div>
 </div>

</form>
        <p align="center">&nbsp; </p>

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
