




<script type="text/javascript" language="JavaScript" src="js/functions.js"></script>

<div id="navigation">
<?php
 $procategory=$_GET['procategory'];
?>

	<ul id="menu3">
    <h2 style="color:#fff;background-color:#44155e; text-align:center; font-family: 'Asap',sans-serif; text-decoration:none; border-bottom:#FFF;margin-left:-14px;"><a href="categorycollections1.php?procategory=<?php echo $procategory;?>"> <?php echo $procategory;?></a></h2>
		 <?php 
		 
				$sql11="SELECT  DISTINCT `parent_category` FROM `products` WHERE procategory='$procategory'";
					$result6=mysql_query($sql11)or die (mysql_error());
					while($r6=mysql_fetch_array($result6))
					{
					$parent_category=$r6['parent_category'];
					
					 ?>
		<li>
			<a href="categorycollections1.php?procategory=<?php echo $procategory;?>&amp;parent_category=<?php echo $r6['parent_category'];?>" title="Item with a submenu" class=""><?php echo $r6['parent_category']; ?></a>
			<ul>
             <?php
					$sql12="SELECT DISTINCT`sub_category` FROM `products` WHERE procategory='$procategory' AND parent_category='$parent_category'";
					$result7=mysql_query($sql12)or die (mysql_error());
					while($r7=mysql_fetch_array($result7))
					{
						$sub_category=$r7['sub_category'];
					
					?>
				<li><a href="categorycollections1.php?procategory=<?php echo $procategory;?>&amp;parent_category=<?php echo $r6['parent_category'];?>&amp;sub_category=<?php echo $r7['sub_category']; ?>" title="Submenu item"><?php echo $r7['sub_category']; ?></a></li><?php } ?>
				
			</ul>
		</li>
		<?php } ?>
	</ul>


</div>
