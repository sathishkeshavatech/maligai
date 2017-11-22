<ul id="nav">
<?php
 $procategory=$_GET['procategory'];
?>
                <h3 style="text-align:center;height:30px; text-decoration:none;"><a href="categorycollections1.php?procategory=<?php echo $procategory;?>"> <?php echo $procategory;?></a></h3>
                <?php 
				$sql11="SELECT  DISTINCT `parent_category` FROM `products` WHERE procategory='$procategory'";
					$result6=mysql_query($sql11)or die (mysql_error());
					while($r6=mysql_fetch_array($result6))
					{
					$parent_category=$r6['parent_category'];
					
					 ?>
                <li><a class="sub" href="categorycollections1.php?procategory=<?php echo $procategory;?>&amp;parent_category=<?php echo $r6['parent_category'];?>"><?php echo $r6['parent_category']; ?></a><img src="images/up.gif" alt="" /> 
                    <ul>
                     <?php
					$sql12="SELECT DISTINCT`sub_category` FROM `products` WHERE procategory='$procategory' AND parent_category='$parent_category'";
					$result7=mysql_query($sql12)or die (mysql_error());
					while($r7=mysql_fetch_array($result7))
					{
						$sub_category=$r7['sub_category'];
					
					?>
                        <li><a href="categorycollections1.php?procategory=<?php echo $procategory;?>&amp;parent_category=<?php echo $r6['parent_category'];?>&amp;sub_category=<?php echo $r7['sub_category']; ?>"><?php echo $r7['sub_category']; ?></a></li><?php } ?></li>
                       
                    </ul>
                    <?php } ?>
               </li>
                
            </ul>
          