<?php
include "dbc.php";
error_reporting(0);

if($_POST)
{
$q=$_POST['text7'];
$sql_res=mysql_query("SELECT distinct proname,autoid, proimg FROM  `products` WHERE proname like '%$q%'  ");
while($row=mysql_fetch_array($sql_res))
{
$proname=$row['proname'];

$b_proname='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_proname, $proname);
$proimg=$row['proimg'];
?>
<div class="show" style="overflow:hidden;">
<div style="margin-top:10px;">
<img src="<?php echo $proimg;?>" style="width:30px; height:30px; float:left; margin-right:6px; padding-bottom:10px; padding-left:10px; padding-right:10px;" />
<span class="name"><a href="productview.php?id=<?php echo $row['autoid']; ?>" ><?php echo $row['proname']; ?></a></span>&nbsp;<br/>
</div>
</div>
<?php
}
}
?>
