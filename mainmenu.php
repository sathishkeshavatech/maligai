<div class="oe_wrapper">
			
			<ul id="oe_menu" class="oe_menu fL">
			        <?php
			$sql5="SELECT DISTINCT `procategory` FROM `products` ";
			$result5=mysql_query($sql5) or die (mysql_error());
			while($r5=mysql_fetch_array($result5))
			{
				
				$procategory=$r5['procategory'];	
				
				
				?>
                <li><a href="categorycollections1.php?procategory=<?php echo $r5['procategory'];?>"><?php echo $r5['procategory'];?></a>
					<div >
                    <ul>
                    <?php 
				$sql6="SELECT  DISTINCT `parent_category` FROM `products` WHERE procategory='$procategory'";
					$result6=mysql_query($sql6)or die (mysql_error());
					while($r6=mysql_fetch_array($result6))
					{
					$parent_category=$r6['parent_category'];
					
					 ?>
  <li class="oe_heading"><a class="aaa" href="categorycollections1.php?procategory=<?php echo $r5['procategory'];?>&amp;parent_category=<?php echo $r6['parent_category'];?>"><?php echo $r6['parent_category']; ?></a>
					
					
                    <ul style="float:right; margin-left:50px;">
                    <?php
					$sql7="SELECT DISTINCT`sub_category` FROM `products` WHERE procategory='$procategory' AND parent_category='$parent_category'";
					$result7=mysql_query($sql7)or die (mysql_error());
					while($r7=mysql_fetch_array($result7))
					{
						$sub_category=$r7['sub_category'];
					
					?>
                   <li><a href="categorycollections1.php?procategory=<?php echo $r5['procategory'];?>&amp;parent_category=<?php echo $r6['parent_category'];?>&amp;sub_category=<?php echo $r7['sub_category']; ?>"><?php echo $r7['sub_category']; ?></a></li><?php } ?>
               
                    </ul>
                    <?php } ?>
                    </li>
                    </ul>
                    </div>
                     <?php } ?>
				</li>
                
</ul>	
</div>