
	<script type="text/javascript">
$(function(){
$(".text7").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'text7='+ searchid;
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "search.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});

jQuery("#result").live("click",function(e){ 
 var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<div/>").html($name).text();
    $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("text7")){
    jQuery("#result").fadeOut(); 
    }
});
$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>
<div class="header">
<div class="innerheader">
<div class="logo"><a href="index.php"><img src="images/llogo.png"  style="width:370px; height:254px; margin-top:-61px;"/></a></div>
<div class="headertopmenu">
 <ul class="topmenu">
  <li><a href="index.php">Home</a></li>
         <li>|</li>
 <?php
if(!isset($_SESSION['uuser']))
 {
 ?>

   		 <li><a href="userlogin.php">Login</a></li>
         <li>|</li>
         
       <?php  }
	   else{
		   ?>
		   <li><a href=""><?php echo $_SESSION['uuser']; ?></a></li>
         <li>|</li>
           <li><a href="edit-profile.php">Edit-Profile</a></li>
         <li>|</li>
          <li><a href="userlogout.php" >logout</a></li>
  	     <li>|</li>
          <li><a href="placeorder.php">Track Order</a></li>
          <li>|</li>
		<?php   }
	   ?>
    	
  	     <li><a href="contac.php">Customer Support</a></li>
         
        
  
<li><a href=" https://www.facebook.com/TrichyMaligai" target="_blank" title="Facebook"><img src="images/facebook.png" /></a><li><li><a href="https://twitter.com/" target="_blank" title="Twitter"><img src="images/twitter.png" /></a></li><li><a href="https://plus.google.com/" target="_blank" title="Google Plus"><img src="images/googleplus.png" /></a></li>
</ul>
</div>
<div class="searboxecom">
<div class="boxsearch">
              <form  method="post"  action="search.php" class="serachstyle sb_wrapper" id="ui_element">
 <input name="book" id="searchid" type="text"  class="text7"/>
<input name="search" type="submit" value="Search"   class="sb_input"/>


 <div id="result"></div>
 </form>
</div>
</div>
<div class="clearer">
</div>
</div>
<div class="clearer">
</div>
</div>