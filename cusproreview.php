<?php
include "dbc.php"; 
page_protect();
//$id1=$_SESSION['raga_id'];
//srand((double) microtime( ) *1000000);
	//$random=rand();
	//$autoid=$random;
//if(!checkAdmin()) {
//header("Location: login.php");
//exit();
//}
error_reporting (E_ALL ^ E_NOTICE);

if($_POST['Submit'] == 'Save') 	

            {
			$review_id = $_POST['review_id'];
			$author = $_POST['author'];
			$pro_name = $_POST['pro_name'];
			$review_desc = $_POST['review_desc'];
			$review_rating = $_POST['review_rating'];
			
			
			$db->query("insert into reviews(id,review_id,author,pro_name,review_desc,review_rating,date) values(NULL,'$review_id','$author','$pro_name','$review_desc','$review_rating',NOW())");
			
		}
				
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/backendstyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/backtotop.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.2.css" media="screen" />
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
<script src="http://cdn.webrupee.com/js" type="text/javascript"></script>
<!------------------- Main Menu query ---------------->
<script type="text/javascript">
            $(function() {
				var $oe_menu		= $('#oe_menu');
				var $oe_menu_items	= $oe_menu.children('li');
				var $oe_overlay		= $('#oe_overlay');

                $oe_menu_items.bind('mouseenter',function(){
					var $this = $(this);
					$this.addClass('slided selected');
					$this.children('div').css('z-index','9999').stop(true,true).slideDown(200,function(){
						$oe_menu_items.not('.slided').children('div').hide();
						$this.removeClass('slided');
					});
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('selected').children('div').css('z-index','1');
				});

				$oe_menu.bind('mouseenter',function(){
					var $this = $(this);
					$oe_overlay.stop(true,true).fadeTo(200, 0.6);
					$this.addClass('hovered');
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('hovered');
					$oe_overlay.stop(true,true).fadeTo(200, 0);
					$oe_menu_items.children('div').hide();
				})
            });
        </script>
        <script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Asap:400,700:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); </script>
</head>
<body id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<div class="header">
<div class="innerheader">
<div class="logo"><a href="index.html"><img src="images/logo.png" /></a></div>
<div class="headertopmenu">
      <ul class="topmenu">
   		 <li><a id="various1" href="#inline1" title="">Signup</a></li>
         <li>|</li>
    	 <li><a id="various2" href="#inline1" title="">Login</a></li>
  	     <li>|</li>
  	     <li><a href="contact.html">Customer Support</a></li>
         <li>|</li>
          <li><a href="trackorder.html">Track Order</a></li>
        
  </ul>
  <div style="display: none;">
		<div id="inline1" style="width:400px;height:500px;">
        <div id="container">
	  	 <section class="tabs">
			 <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
			<span for="tab-1" class="tab-label-1">Signup</span>

			<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
			<span for="tab-2" class="tab-label-2">Login</span>

            <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
			<span for="tab-3" class="tab-label-3">Forget Password</span>
	
		<div class="clear-shadow"></div>
		
		<div id="content">
			<div class="content-1">
				<p>
					<a href="#" class="media tw">Twitter</a><a href="#" class="media fb">Facebook</a>
				</p>	
				<form  action="" autocomplete="on">
				  <p>
					<label for="usernamesignup" class="uname" data-icon="u">Your username</label>
					<input class="field" name="usernamesignup" required="required" type="text" placeholder="myusername" />
				  </p>
				  <p>
					<label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
					<input class="field" name="emailsignup" required="required" type="email" placeholder="myusername@gmail.com"/>
				  </p>
				  <p>
					<label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
					<input class="field" name="passwordsignup" required="required" type="password" placeholder="mypassword"/>
				  </p>
				  <p>
					<label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
					<input class="field" name="passwordsignup_confirm" required="required" type="password" placeholder="mypassword"/>
				  </p>
				  <p class="signin button">
					<input type="checkbox" required="required" /> I agree with terms and conditions 
					<input type="submit" value="Sign up"/>
				  </p>
				</form>
			</div>
			<div class="content-2">
				<p>
					<a href="#" class="media tw">Facebook</a><a href="#" class="media fb">Twitter</a>
				</p>
				<form  action="" autocomplete="on">
				  <p>
					<label for="username" class="uname" data-icon="u" > Your email or username </label>
					<input class="field" name="username" required="required" type="text" placeholder="myusername or myusername@gmail.com"/>
				  </p>
				  <p>
					<label for="password" class="youpasswd" data-icon="p"> Your password </label>
					<input class="field" name="password" required="required" type="password" placeholder="mypassword" />
				  </p>
				  <p class="keeplogin">
					<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> Keep me logged in
					<input type="submit" value="Login" />
				  </p>
				</form>
			</div>
			<div class="content-3">
				<form  action="" autocomplete="on">
				  <p>
					<label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
					<input class="field" name="emailsignup" required="required" type="email" placeholder="myusername@gmail.com"/>
				  </p>
				  <p class="signin button">
					<input type="submit" value="Get New Password"/>
				  </p>
				</form>
		    	</div>
	    	</div>
    	</section>
     </div>
		</div>
	</div>
</div>

<div class="searboxecom">
<div class="boxsearch">
                <form id="ui_element" class="sb_wrapper">
                    <p>
						<span class="sb_down"></span>
						<input class="sb_input" type="text" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; What are you looking for?" />
						<input class="sb_search" type="submit" value=""/>
					</p>
					<ul class="sb_dropdown" style="display:none;">
						<li class="sb_filter">Filter your search</li>
						<li><input type="checkbox"/><label for="all"><strong>All Categories</strong></label></li>
						<li><input type="checkbox"/><label for="Automotive">Automotive</label></li>
						<li><input type="checkbox"/><label for="Baby">Baby</label></li>
						<li><input type="checkbox"/><label for="Beauty">Beautys</label></li>
						<li><input type="checkbox"/><label for="Books">Books</label></li>
						<li><input type="checkbox"/><label for="Cell">Cell Phones &amp; Service</label></li>
						<li><input type="checkbox"/><label for="Cloth">Clothing &amp; Accessories</label></li>
						<li><input type="checkbox"/><label for="Electronics">Electronics</label></li>
						<li><input type="checkbox"/><label for="Gourmet">Gourmet Food</label></li>
						<li><input type="checkbox"/><label for="Health">Health &amp; Personal Care</label></li>
						<li><input type="checkbox"/><label for="Home">Home &amp; Garden</label></li>
						<li><input type="checkbox"/><label for="Industrial">Industrial &amp; Scientific</label></li>
						<li><input type="checkbox"/><label for="Jewelry">Jewelry</label></li>
						<li><input type="checkbox"/><label for="Magazines">Magazines</label></li>
					</ul>
                </form>
      </div>


</div>
</div>
</div>
<?php include 'frontmenu.php'; ?><div class="productview">
<div class="innerproductview">
<h4 class="dash">Add Product Reviews</h4>
<div class="bor"></div>
<?php
		   $id = $_GET['id'];
			$sqlquery = "select * from products where id = '$id'"; // query on table
			$sqlresult = mysql_query($sqlquery);
			while($row = mysql_fetch_array($sqlresult))
			{
				?>
<form id="form3" name="form3" method="post" action="cusproreview.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data" class="table_bg">
<table class="addprotbl">
 <tr>
          <?php	
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* Error - $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }
	  ?>
          <td>&nbsp;</td>
          <td><strong>Manufacturer Id</strong></td>
          <td>
          <?php
					  $max = $db->maxOfAll("id","reviews");
					  $max=$max+1;
					  $auto="REVIEW-ID-".$max."";
					  ?>
          <input type="text" name="review_id" id="review_id" value="<?php echo $auto; ?>" readonly="readonly" class="addin" /></td>
          <td>&nbsp;</td>
          </tr>
           <tr>
          <td>&nbsp;</td>
          <td><strong>Author</strong></td>
          <td>
          <input type="text" name="author" id="author" class="addin" /></td>
          <td>&nbsp;</td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td><strong>Product</strong></td>
          <td>
          <input type="text" name="pro_name" id="pro_name" value="<?php echo $row['proname']; ?>" readonly="readonly" class="addin" /></td>
          <td>&nbsp;</td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td><strong>Description</strong></td>
          <td>
           <textarea name="review_desc" id="review_desc" class="textarea"></textarea></td>
          <td>&nbsp;</td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td><strong>Rating</strong></td>
          <td>
          <select name="review_rating" id="review_rating" class="addin">
               <option value="Very Bad" >Very Bad</option>
               <option value="Bad" >Bad</option>
               <option value="Average" >Average</option>
               <option value="Good" >Good</option>
               <option value="Very Good" >Very Good</option>
               <option value="Excellent" >Excellent</option>
             </select></td>
          <td>&nbsp;</td>
          </tr>
          <?php } ?>
          <tr align="center">
          <td height="35">&nbsp;</td>
          
    <td>&nbsp;</td>
          <td><div align="left">
            <input name="Submit" type="submit" class="button sub" id="Save" value="Save" style="margin-bottom: 20px;background-color: #333333;" />
          </div></td>
          <td>&nbsp;</td>
          </tr>
          
</table>
</form>
</div>
</div>
<?php include 'frontfooter.php'; ?>
</body>
</html>