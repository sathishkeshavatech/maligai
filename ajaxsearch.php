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
      url: "search.php",
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
 <ul class="sb_dropdown" style="display:none;">
						<li class="sb_filter">Filter your search</li>
                        <?php 
					$sql10="SELECT * FROM `products`";
					$result10=mysql_query($sql10) or die(mysql_error());
					while($r10=mysql_fetch_array($result10))
					{
					
					
					?>
						
					
						<li><a href="categorycollections1.php?id=<?php echo $r10['autoid'];?>"><?php echo $r10['proname']; ?></a></li>
                     	<?php }?>
						
					</ul>