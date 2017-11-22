<?php
ob_start();
include 'dbc.php';

$autoid=$_GET['autoid'];
	$result=mysql_query("DELETE FROM `products` WHERE autoid='$autoid'");
	if($result)
	{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=adminedit.php">';
	}
 ?>
