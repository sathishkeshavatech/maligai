<div class="footer clearfix">
<div class="innerfooter">
<div class="footermenu ">
<ul class="upmenu">
   		 <li><a href="about-us.php">About Us</a></li>
         <li>|</li>
    	 <li><a href="contac.php" >Contact Us</a></li>
  	     <li>|</li>
         <li><a href="cancelisation.php" >Cancellation & Returns</a></li>
          <li>|</li>
         <li><a href="delivery.php" >Delivery</a></li>
         <li>|</li>
         <li><a href="other.php" >Other services</a></li>
      </ul>
         <div class="poweredname">POLCIES: <a href="Terms-condition.php">Terms&Conditions </a>|  <a href="privacy.php">Privacy</a> 
      
 
  </div>
         <br />
        
         <div class="line fk-footer-policy">
             <h3 style="font-family:Arial, Helvetica, sans-serif;color:#FFF; font-size:20px; text-align:center; margin-bottom:12px;">Top Brands</h3>
  <div class="line top-brand-links tpadding10 bpadding10">
<?php   $sql32 = "SELECT DISTINCT `mnufacturer` from `products` ";
$result = mysql_query($sql32);
while($r32 = mysql_fetch_array($result))
			{
					$brand=$r32['mnufacturer'];
 ?>
 <a  href="categorycollections2.php?brand=<?php echo $brand;?>" style="color:#00C5FF; padding-left:5px; text-decoration:none; margin-top:20px;margin-bottom:20px;"><?php echo $brand." ";?>-</a>
  <?php } ?>  
</div>
</div>

 <div class="line fk-footer-policy">
 <div class="footcontact">
<h3 style="font-family:Arial, Helvetica, sans-serif;color:#FFF; font-size:20px;">Contact us</h3>
<span class="phone">8012333547 & 8012333548</span>
<br />
<p style="color:#FFF;font-size:16px;">Web Designed by <a style="color:#FFF;" href="http://keshavatech.com" target="_blank">Keshavatech</a></p>
</div>
<div class="footcontact">
<h3 style="font-family:Arial, Helvetica, sans-serif;color:#FFF; font-size:20px;">Newsletter</h3>
<br />
<p style="color:#fee">sign Up for Newsletter
</p>
<form name="ghg"  method="post">
<input type="text" name="news" style="width:150px; margin-top:10px; margin-bottom:20px; height:25px;" /><input type="submit"  name="newlet" value="Go" style="width:30px; margin-top:10px; margin-bottom:20px; height:25px;background-color:#681111;color:#FFF;"/>
<?php
$eemail=$_POST['news'];
if(isset($_REQUEST['newlet']))
{
	 $db->query("INSERT INTO `newsletter`( `email`) VALUES ('$eemail')");
}
?>
</form>
</div>
<div class="footcontact">
<h3 style="font-family:Arial, Helvetica, sans-serif;color:#FFF; font-size:20px;">Contact Address</h3>
<br />

<p style="color:#fee;">Amirthaa Maligai<br/>6,SRI NAGAR,
<br />
THIRUVANAI KOIL<br />
TRICHI-620005..<br />
Phone: 8012333547 & 8012333548</p>
</div>
          <div class="footersocial">

<h3 style="font-family:Arial, Helvetica, sans-serif;color:#FFF; font-size:20px;">Touch with Us</h3>
<a href="https://www.facebook.com/TrichyMaligai" target="_blank" title="Facebook" style="margin:5px;"><img src="images/facebook.png" /></a>&nbsp;<a href="" target="_blank" title="Twitter"  style="margin:5px;"><img src="images/twitter.png" /></a>&nbsp;<a href="" target="_blank" title="Google Plus"  style="margin:5px;"><img src="images/googleplus.png" /></a><br />
          <img src="images/pay-u-money-image.png" />


</div>


        </div>


</div>
</div>
</div>
</div>