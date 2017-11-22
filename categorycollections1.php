<?php
error_reporting(0);
include("dbc.php");
ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);

checkadmin_function();
include("functions.php");
	
if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		$auto=$_POST['auto'];
		addtocart($pid,1);
		header("location:categorycollections1.php?procategory=$auto");
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

<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/style4.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js/jquery.dcmegamenu.1.3.3.js'></script>
<script type="text/javascript" language="JavaScript" src="js/functions.js"></script>
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

<script type="text/javascript" src="js/jquery.reveal.js"></script>	

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
<?php include"sidemenunew.php";?>
</div>
<div class="productallview">
<div class="itemproducts">

<?php
   $procategory=$_GET['procategory'];
 $_SESSION['procategory']= $procategory; 
   
 $parent_category = $_GET['parent_category'];
		$sub_category=$_GET['sub_category'];
		 $pron=$_GET['proname'];
		 ?>
          <div class="tiltlebckpro">
<h5><?php echo $procategory; ?> Products</h5>
</div>	
         <?php  
		$tbl_name="products";
	$adjacents = 3;
		if(isset($sub_category))
		{
			$query = "SELECT COUNT(*) as num FROM $tbl_name where procategory = '$procategory' AND parent_category='$parent_category' AND sub_category = '$sub_category'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	$targetpage = "categorycollections1.php"; 	//your file name  (the name of this file)
	$limit = 12; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;	
	/* Setup vars for query. */
	
		$sqlquery1 = "select * from $tbl_name where  procategory = '$procategory' AND parent_category='$parent_category' AND sub_category = '$sub_category' LIMIT $start, $limit";
		}
		elseif(isset($pron))
		{
			$query = "SELECT COUNT(*) as num FROM $tbl_name where proname = '$pron' ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	$targetpage = "categorycollections1.php"; 	//your file name  (the name of this file)
	$limit = 12; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;	
		$sqlquery1 = "select * from products where  proname = '$pron' LIMIT $start, $limit";
		}
		elseif((!isset($sub_category))&&(isset($parent_category)))
		{
			$query = "SELECT COUNT(*) as num FROM $tbl_name where  procategory = '$procategory' AND parent_category='$parent_category' ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	$targetpage = "categorycollections1.php"; 	//your file name  (the name of this file)
	$limit = 12; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;	
		$sqlquery1 = "select * from products where  procategory = '$procategory' AND parent_category='$parent_category' LIMIT $start, $limit";
		}
		
		else{
			$query = "SELECT COUNT(*) as num FROM $tbl_name where  procategory = '$procategory'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
			$targetpage = "categorycollections1.php"; 	//your file name  (the name of this file)
	$limit = 12; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;	
			$sqlquery1 = "select * from products where  procategory = '$procategory'LIMIT $start, $limit";
		}
		if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
						//last page minus 1
	
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
			$pagination.= '<a href='.$targetpage.'?page='.$prev.'&procategory='.$_SESSION['procategory'].'>� previous</a>';
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
					$pagination.= '<a href='.$targetpage.'?page='.$counter.'&procategory='.$_SESSION['procategory'].'>'.$counter.'</a>';					
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
						$pagination.= '<a href='.$targetpage.'?page='.$counter.'&procategory='.$_SESSION['procategory'].'>'.$counter.'</a>';					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= '<a href='.$targetpage.'?page='.$counter.'&procategory='.$_SESSION['procategory'].'>'.$counter.'</a>';					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= '<a href='.$targetpage.'?page='.$counter.'&procategory='.$_SESSION['procategory'].'>$counter</a>';					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= '<a href='.$targetpage.'?page='.$next.'&procategory='.$_SESSION['procategory'].'>next �</a>';
		else
			$pagination.= "<span class=\"disabled\">next �</span>";
		$pagination.= "</div>\n";		

	}
		
	
			$sqlresult1 = mysql_query($sqlquery1);
			while($r9 = mysql_fetch_array($sqlresult1))
			{ 
            ?>
           
            <div class="firsproduct">
<section class="row">
<div class="container-item">
<div class="item">
<a href="productview.php?id=<?php echo $r9['autoid']; ?>"><img src="<?php echo $r9['proimg']; ?>"  width="170" height="180"/></a>

					
				</div>
			
                    </div>
</section>
<div class="iitem">

<div class="item-product">
<div class="cartbut">
									<form name="for" action="categorycollections1.php?id=<?php echo $r9['autoid']; ?>" method="post">
	<input type="hidden" name="productid" value="<?php echo $r9['id']; ?>"  />
    <input type="hidden" name="command" value="add" />
  <input type="hidden" name="auto" value="<?php echo $procategory ?>" />
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
  <span class="price-num fL">Rs:<?php echo $r9['offer']; ?></span>  
  
  <?php
  if( $r9['price'] != $r9['offer'])
  {
 echo '<p class="subdescription fR">Rs:'.$r9['price'].'</p>';
 echo '<div class="oold-price"></div>';
  }								
?>	
								
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
<div class="pagination">
 <?php echo $pagination;?>
 
 <?php
//echo $_SESSION['procategory'];
?>
 </div>
<?php include 'frontfooter.php'; ?>

</div>
</body>
</html>

 <!---------------------menu scroll jquery---------------->
         
<!------------- login Query ---------------->
        
        
      <!------------ Scroller Jquery --------------->  


        
        
        <!------------Product Jquery --------------->



<!----------Slider Jquery ---------------->

    
    
<!-------- Search box query ------------>
    
        
        <!----------- disable mouse right click on a web page query------------>



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
    
    
    <!----------- End Toggle -------------------->
    
    <!--------------------form lightbox------------------------>

	
   
