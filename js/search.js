// JavaScript Document$(function(){
$(".sb_input").keyup(function() 
{ 
var inputSearch = $(this).val();
var dataString = 'searchword='+ inputSearch;
if(inputSearch!='')
{
      $.ajax({
      type: "POST",
      url: "index.php",
      data: dataString,
      cache: false,
      success: function(html)
      {
      $(".boxsearch").html(html).show();
      }
      });
}return false;    
});

jQuery(".divResult").live("click",function(e){ 
      var $clicked = $(e.target);
      var $name = $clicked.find('.name').html();
      var decoded = $("<div/>").html($name).text();
      $('#inputSearch').val(decoded);
});
jQuery(document).live("click", function(e) { 
      var $clicked = $(e.target);
      if (! $clicked.hasClass("search")){
      jQuery(".boxsearch").fadeOut(); 
      }
});
$('#inputSearch').click(function(){
      jQuery(".boxsearch").fadeIn();
});
});
