<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>	
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
    url: "admsearch2.php",
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
<div class="logo"><a href="index.php"><img src="images/llogo.png" style="width:370px; height:254px; margin-top:-61px;"/></a></div>
<div class="admintoopmenu">
 <ul class="toopmenu">
  <?php
if(!isset($_SESSION['adname']))
 {
 ?>
   		 <li style="font-size:18px;"><a href="administratorlogin.php">Login</a></li>
         <li>|</li>
       <?php  }
	   else{
		   ?>
		   <li style="font-size:18px;"><a href=""><?php echo $_SESSION['adname']; ?></a></li>
         <li>|</li
		><?php   }
	   ?>
        <?php
if($_SESSION['adname']!="")
 {
 ?>
       
  	     
         
         <li style="font-size:18px;"><a href="changeprofile.php">change profile</a></li>
         <li>|</li>
    	 <li style="font-size:18px;"><a href="admlogout.php" >logout</a></li>
           
  	     <?php  }
	   else{
		   ?>
           
         
         <li style="font-size:18px;"><a href="admlogout.php">change profile</a></li>
         <li>|</li>
    	 <li style="font-size:18px;"><a href="admlogout.php">logout</a></li>
  	     
         <?php
	   }
	   ?>
       
  

</ul>
</div>

<div class="searbecom clearfix">
<div class="admsear">
<span style="font:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif; font-size:20px; color:#FFF;" >Search user&nbsp;&nbsp;&nbsp;:</span>
</div>
<div class="boxsearch">
              <form  method="post"  action="admsearch2.php" class="serachstyle sb_wrapper" id="ui_element">
 <input name="book" id="searchid" type="text"  class="text7"/>
<input name="search" type="submit" value="Search"   class="sb_input"/><br />
 <span style="font:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif; font-size:20px; color:#FFF;" >Enter user-id or Mobile*</span>

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