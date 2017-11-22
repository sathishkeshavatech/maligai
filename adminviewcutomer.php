<?php
include "dbc.php";
error_reporting(0);
if(!isset($_SESSION['adname']))
	{
		header("Location: administratorlogin.php");
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ECommerce</title>
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/backtotop.css" type="text/css" media="screen" />

<!------------------- Main Menu query ---------------->
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure u want to delete?');
}
</script>
  
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<?php include 'adviewhead.php'; ?>
<div class="innerecommenuadmin">
<?php include "adminmenu.php";?>
</div>

<div class="content">
&nbsp;&nbsp;
<form name="rrr" method="post" action="adminviewcutomer.php">
<?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	  if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "$e <br>";
	    }
	  echo "</div>";	
	   }
	  /******************************* END ********************************/	  
	  ?>
        <div class="innerallproducts">
       <div class="customer2">
        <table border="0" cellpadding="5px" cellspacing="1px" class="admitab" >
    	<?php
		$prona=$_GET['user_id'];
			
            	echo '<tr style="font-weight:bold; height:30px;padding:10px;"><td style="padding-left:5px;">Serial</td><td style="padding-left:5px;">Name</td><td style="padding-left:5px;">view</td></tr>';
				if($prona!="")
				{
				 $sql=mysql_query("SELECT * FROM `newusers` where user_name='$prona'");
				}
				else
				{
					$sql=mysql_query("SELECT * FROM `newusers`");
				}
				while($row=mysql_fetch_array($sql))
				{
			$autoid=$row['user_id'];
					$pname=$row['user_name'];
					
			?>
            		<tr>
                    <td width="20%" style="padding-left:5px;"><?php echo $row['user_id'];?></td>
            		<td width="35%" style="padding-left:5px;"><?php echo $row['user_name'];?></td>
                     <td width="12%" style="padding-left:5px;padding-right:10px;"><a href="userdeta.php?user_id=<?php echo $row['user_id'];?>" ><span>viewcustomer</span></a></td>                           
   		  </tr>
        
        
     
<?php } ?>
</table>

</div>
<form>
</div>
</div>

<?php include 'frontfooter.php'; ?>

</div>


<!-------- Search box query ------------>
    
      
      



         
         <!-------------------login popup ------------------>

     
     <!----------- Top to Bottom page query------------>

<!--------------------form lightbox------------------------>

	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.2.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images

			*/

	

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>
    <!--------------------End form lightbox------------------------>      
</body>
</html>
