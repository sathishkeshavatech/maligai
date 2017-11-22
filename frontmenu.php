<ul id="oe_menu" class="oe_menu fL">
  <?php
			$sql5="SELECT DISTINCT `parent_category` FROM `products` ";
			$result5=mysql_query($sql5) or die (mysql_error());
			while($r5=mysql_fetch_array($result5))
			{
				$sub_category	=$r5['sub_category'];
				$parent_category=$r5['parent_category'];
				$proname=$r5['proname'];
				echo'<li><a href="">'.$r5['parent_category'].'</a>';
				?>
  <div class="fL">
    <ul>
      <?php 
				$sql6="SELECT  DISTINCT `sub_category` FROM `products` WHERE parent_category='$parent_category'";
					$result6=mysql_query($sql6)or die (mysql_error());
					while($r6=mysql_fetch_array($result6))
					{
					$sub_category=$r6['sub_category'];
					
					 ?>
      <li class="oe_heading"><a href="categorycollections1.php?sub_category=<?php echo $r6['sub_category'];?>"><?php echo $r6['sub_category']; ?></a>
        <ul>
          <?php
					$sql7="SELECT DISTINCT `proname` FROM `products` WHERE parent_category='$parent_category' AND sub_category='$sub_category'";
					$result7=mysql_query($sql7)or die (mysql_error());
					while($r7=mysql_fetch_array($result7))
					{
					$autoid	=$r7['autoid'];
					$proname=$r7['proname'];
					?>
          <li><a href="categorycollections1.php?autoid=<?php echo $r7['proname']; ?>"><?php echo $r7['proname']; ?></a></li>
          <?php } ?>
        </ul>
        <?php } ?>
      </li>
    </ul>
  </div>
  <?php } ?>
  </li>
</ul>
