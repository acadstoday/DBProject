<?php
	//change user and pwd while connecting to your local database
	$host = "localhost"; //database location
	$user = "root"; //database username
	$pwd = ""; //database password
	$db_name = "acadstoday"; //database name

	//$link = mysql_connect($host, $user, $pwd);
	$con = mysqli_connect($host, $user, $pwd, $db_name);
	
	//mysql_close($link);
	mysqli_close($con);
?>
