
<?php
include "dbc.php";
error_reporting(0);
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Product</title>
</head>

<body>
<?php 
$autoid=$_GET['autoid'];
	$result=mysql_query("DELETE FROM `products` WHERE autoid='$autoid'");
	if($result)
	{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=adminedit.php">';
	}
		
	
 ?>
</body>
</html>