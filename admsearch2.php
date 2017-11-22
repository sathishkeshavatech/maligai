<?php
include "dbc.php";
error_reporting(0);

if($_POST)
{
$q=$_POST['text7'];
$sql_res=mysql_query("SELECT * FROM  `newusers` WHERE user_id like '%$q%' OR user_phone like '%$q%';   ");
while($row=mysql_fetch_array($sql_res))
{
$username=$row['user_name'];

$b_username='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username,$username);
$userid=$row['user_id'];
?>
<div class="show" style="overflow:hidden;">
<div style="margin-top:10px;margin-bottom:5px;">
<span class="name" style="margin-left:10px;margin-bottom:10px;"><a href="userdeta.php?user_id=<?php echo $row['user_id']; ?>" ><?php echo $row['user_name']; ?></a></span>&nbsp;<br/>
</div>
</div>
<?php
}
}
?>
