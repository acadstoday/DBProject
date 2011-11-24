<?php
	//change user and pwd while connecting to your local database
	$host = "localhost"; //database location
	$user = "root"; //database username
	$pwd = ""; //database password
	$db_name = "acadstoday"; //database name

	$link = mysql_connect($host, $user, $pwd);
	
	mysql_close($link);
?>
