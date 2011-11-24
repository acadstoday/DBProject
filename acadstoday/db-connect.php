<?php
	//change user and pwd while connecting to your local database
	$host = "localhost"; //database location
	$user = "root"; //database username
	$pwd = "ashish"; //database password
	$db_name = "acadstoday"; //database name

	//database connection
	/*$link = mysql_connect($host, $user, $pwd);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($db_name);*/
	
	$con = mysqli_connect($host, $user, $pwd, $db_name);
	
	if (!$con) {
		die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
	}

	//sets encoding to utf8
	//mysql_query("SET NAMES utf8");
	mysqli_query("SET NAMES utf8");
?>
