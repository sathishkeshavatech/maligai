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
		header("location:shoppingcart.php");
		exit();
		
		
		
		
	}
error_reporting (E_ALL ^ E_NOTICE);				
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="all" />
<title>jQuery Mega Drop Down Menu Plugin v 1.3.3</title>
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

</head>
<body>
<div class="wrap">

<div class="green">  
<ul id="mega-menu-7" class="mega-menu">
  <?php
			$sql5="SELECT DISTINCT `procategory` FROM `products` ";
			$result5=mysql_query($sql5) or die (mysql_error());
			while($r5=mysql_fetch_array($result5))
			{
				
				$procategory=$r5['procategory'];	
				
			
				?>
	<li><a href="categorycollections1.php?procategory=<?php echo $r5['procategory'];?>"><?php echo $r5['procategory'];?></a>
		<ul>
         <?php 
				$sql6="SELECT  DISTINCT `parent_category` FROM `products` WHERE procategory='$procategory'";
					$result6=mysql_query($sql6)or die (mysql_error());
					while($r6=mysql_fetch_array($result6))
					{
					$parent_category=$r6['parent_category'];
					
					 ?>
        
			<li><a class="aaa" href="categorycollections1.php?procategory=<?php echo $r5['procategory'];?>&amp;parent_category=<?php echo $r6['parent_category'];?>"><?php echo $r6['parent_category']; ?></a>
				<ul>
                  <?php
					$sql7="SELECT DISTINCT`sub_category` FROM `products` WHERE procategory='$procategory' AND parent_category='$parent_category'";
					$result7=mysql_query($sql7)or die (mysql_error());
					while($r7=mysql_fetch_array($result7))
					{
						$sub_category=$r7['sub_category'];
					
					?>
					<li><a href="categorycollections1.php?procategory=<?php echo $r5['procategory'];?>&amp;parent_category=<?php echo $r6['parent_category'];?>&amp;sub_category=<?php echo $r7['sub_category']; ?>"><?php echo $r7['sub_category']; ?></a></li><?php } ?>
					
				</ul>
			</li>
	<?php } ?>
			
		</ul>
	</li>
	<?php } ?>
</ul>
</div>
</body>
</html>
