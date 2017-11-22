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
			
			$assigned_id = $_POST['assigned_id'];
			$procategory = $_POST['procategory'];
			 $sub_category=$_POST['sub_category'];
 $searchcategoryt = $_POST['searchcategory'];
 if($searchcategoryt != ""){
			$i=0;
			 foreach($searchcategoryt as $searchcategory1)
            {
           $offers=$_POST['searchcategory'][$i]; 
		   $search_type = $_POST['search_type'];
		   $pricelimitt = $_POST['pricelimit_id'];
		   if($pricelimitt != ""){
		   $j=0;
		   foreach($pricelimitt as $pricelimit1)
            {
			$pricelimit = $_POST['pricelimit_id'][$j];
		   $db->query("insert into  search_assigned(id,assigned_id,searchcategory,procategory,pricelimit_id,brand_id,discount_id,offer_name,avaoff_name,date) values(NULL,'$assigned_id','$searchcategory','$procategory','$pricelimit','$brand_id','$discount_id','$offer_name','$avaoff_name',NOW())");     
		   $j++;   
		   }
		   } 
		  $db->query("insert into searchassigned_main(sub_category,procategory,offers,search_type,date) values('$sub_category','$procategory','$offers','$search_type',NOW())");
		   $i++;
			}
			}
			 
$pricelimit_idt = $_POST['pricelimit_id'];
	$i=0;
		 foreach($pricelimit_idt as $pricelimit_id1)
           {
          $pricelimit_id=$_POST['pricelimit_id'][$i];          
		   $db->query("insert into price(procategory,sub_category,pricelimit_id,searchcategory,date) values('$procategory','$sub_category','$pricelimit_id','$searchcategory',NOW())");
		   $i++;
			}
			
			$brand_idt = $_POST['brand_id'];
			$i=0;
		 foreach($brand_idt as $brand_id1)
            {
           $brand_id=$_POST['brand_id'][$i];          
		   $db->query("insert into brand(sub_category,procategory,brand_id,searchcategory,date) values('$sub_category','$procategory','$brand_id','$searchcategory',NOW())");
		   $i++;
			}
			
			$discount_idt = $_POST['discount_id'];
			$i=0;
			 foreach($discount_idt as $discount_id1)
            {
           $discount_id=$_POST['discount_id'][$i];          
		   $db->query("insert into discount(procategory,sub_category,discount_id,searchcategory,date) values('$procategory','$sub_category','$discount_id','$searchcategory',NOW())");
		   $i++;
			}
			
			$offer_namet = $_POST['offer_name'];
			$i=0;
			 foreach($offer_namet as $offer_name1)
            {
           $offer_name=$_POST['offer_name'][$i];          
		   $db->query("insert into offer(sub_category,procategory,offer_name,searchcategory,date) values('$sub_category','$procategory','$offer_name','$searchcategory',NOW())");
		   $i++;
			}
			
			$avaoff_namet = $_POST['avaoff_name'];
			$i=0;
			 foreach($avaoff_namet as $avaoff_name1)
            {
           $avaoff_name=$_POST['avaoff_name'][$i];          
		   $db->query("insert into available_offer(sub_category,procategory,available_offer) values('$sub_category','$procategory','$available_offer')");
		   $i++;
			}
			
			$os_and_typet = $_POST['os_and_type'];
			$i=0;
			 foreach($os_and_typet as $os_and_type1)
            {
           $os_and_type=$_POST['os_and_type'][$i];          
		   $db->query("INSERT INTO `os_and_type`(`id`, `sub_category`, `os_and_type`) VALUES (NULL,'$sub_category','$os_and_type')");
		   $i++;
			}
			
			$sizet = $_POST['size'];
			$i=0;
			 foreach($sizet as $size1)
            {
           $size=$_POST['size'][$i];          
		   $db->query("INSERT INTO `size`(`id`,`sub_category`, `size`) VALUES (NULL,'$sub_category','$size')");
		   $i++;
			}
			
			$colourt = $_POST['colour'];
			$i=0;
			 foreach($colourt as $colour1)
            {
           $colour=$_POST['colour'][$i];          
		   $db->query("INSERT INTO `colour`(`id`,`sub_category`, `colour`) VALUES (NULL,'$sub_category','$colour')");
		   $i++;
			}
				$featurest = $_POST['features'];
			$i=0;
			 foreach($featurest as $features1)
            {
           $features=$_POST['features'][$i];          
		   $db->query("INSERT INTO `features`(`id`,`sub_category`, `features`) VALUES (NULL,'$sub_category','$features')");
		   $i++;
			}
			
		}
				
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ragadesigners Shoppingcart</title>
<?php include 'header.php'; ?>
<div class="content">
<div class="inner-content">
<h4 class="dash">Assign Search</h4>
<div class="bor"></div>
<form id="form3" name="form3" method="post" action="assignsearch.php" enctype="multipart/form-data" class="table_bg">
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
          <td><strong>Assign Search Id</strong></td>
          <td>
          <?php
					  $max = $db->maxOfAll("id","search_assigned");
					  $max=$max+1;
					  $auto="ASGNSEARCH-ID-".$max."";
					  ?>
          <input type="text" name="assigned_id" id="assigned_id" value="<?php echo $auto; ?>" readonly="readonly" class="addin" /></td>
          <td>&nbsp;</td>
          </tr>         
          <tr>
          <td>&nbsp;</td>
          <td><strong>Select Product Category</strong></td>
          <td>
          <select name="sub_category" id="sub_category" class="addin">
          <?php
            echo $sql5 = "SELECT DISTINCT `sub_category` FROM products";
			$result5 = mysql_query($sql5) or die (mysql_error());
			while($r = mysql_fetch_array($result5))
			{ 
			$sub_category=$r['sub_category'];
            ?>
		  <option value="<?php echo $r['sub_category']; ?>"><?php echo $r['sub_category']; ?></option>
          <?php } ?>
            </select></td>
          <td>&nbsp;</td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td><strong>Select Search Type</strong></td>
          <td>
          <select name="search_type" id="search_type" class="addin">               
               <option value="1" >Checkbox</option>
               <option value="2" >Radio Button</option>
               <option value="3" >Radio Button</option>
             </select></td>
          <td>&nbsp;</td>
          </tr>        
           <tr>
          <td>&nbsp;</td>
          <td><strong>Select Search Category</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM search_main_category";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="searchcategory[]" value="<?php echo $r['mains_name']; ?>"> <?php echo $r['mains_name']; ?><br />  
          <?php } ?></p></td>
          <td>&nbsp;</td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td><strong>Select Price Limit</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM price_limit";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="pricelimit_id[]" value="<?php echo $r['start_price']; ?>"> Rs.<?php echo $r['start_price']; ?> - Rs.<?php echo $r['end_price']; ?><br />           <?php } ?></p></td>
          <td>&nbsp;</td>
          </tr> 
          <tr>
          <td>&nbsp;</td>
          <td><strong>Select Brand</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM brands";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="brand_id[]" value="<?php echo $r['brand_name']; ?>"> <?php echo $r['brand_name']; ?><br /><?php } ?></p></td>
          <td>&nbsp;</td>
          </tr>  
         <tr>
          <td>&nbsp;</td>
          <td><strong>Select Discount Range</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM discount_range";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="discount_id[]" value="Rs.<?php echo $r['start_percent']; ?> - Rs.<?php echo $r['end_percent']; ?>"> Rs.<?php echo $r['start_percent']; ?> - Rs.<?php echo $r['end_percent']; ?><br />           <?php } ?></p></td>
          <td>&nbsp;</td>
          </tr>    
          <tr>
          <td>&nbsp;</td>
          <td><strong>Select Special Offer</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM specialoffers";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="offer_name[]" value="<?php echo $r['offer_name']; ?>"> <?php echo $r['offer_name']; ?><br /><?php } ?></p></td>
          <td>&nbsp;</td>
          </tr> 
          <tr>
          <td>&nbsp;</td>
          <td><strong>OS and TYPE</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM os_and_type2";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="os_and_type[]" value="<?php echo $r['os_and_type']; ?>"> <?php echo $r['os_and_type']; ?><br /><?php } ?></p></td>
          <td>&nbsp;</td>
          </tr>   
           </tr>  
            <tr>
          <td>&nbsp;</td>
          <td><strong>size</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM size1";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="size[]" value="<?php echo $r['size']; ?>"> <?php echo $r['size']; ?><br /><?php } ?></p></td>
          <td>&nbsp;</td>
          </tr>   
           <tr>
          <td>&nbsp;</td>
          <td><strong>colour</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM colrs";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="colour[]" value="<?php echo $r['colour']; ?>"> <?php echo $r['colour']; ?><br /><?php } ?></p></td>
          <td>&nbsp;</td>
          </tr>  
           <tr>
          <td>&nbsp;</td>
          <td><strong>features</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM features1";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="features[]" value="<?php echo $r['features']; ?>"> <?php echo $r['features']; ?><br /><?php } ?></p></td>
          <td>&nbsp;</td>
          </tr>                    
          <tr>
          <td>&nbsp;</td>
          <td><strong>Select available Offer</strong></td>
          <td>
          <p class="procag">
          <?php
            $sql5 = "SELECT * FROM  available_offer1";
			$result5 = mysql_query($sql5);
			while($r = mysql_fetch_array($result5))
			{ 
            ?>
            <input type="checkbox" name="avaoff_name[]" value="<?php echo $r['avaoff_name']; ?>"> <?php echo $r['avaoff_name']; ?><br /><?php } ?></p></td>
          <td>&nbsp;</td>
          </tr>      
          <tr align="center">
          <td height="35">&nbsp;</td>          
    	  <td>&nbsp;</td>
          <td><div align="left">
            <input name="Submit" type="submit" class="button sub" id="Save" value="Save" />
          </div></td>
          <td>&nbsp;</td>
          </tr>
          
</table>
</form>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>