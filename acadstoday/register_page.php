<?php
session_start();
require('err.php');
include("db-connect.php");
$timestamp = time()+19800;

if(isset($_POST['ldap_id']))
{	
	function clean($str)
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc()) { $str = stripslashes($str); }
		return $str;
	}
	$login = clean($_POST['ldap_id']);
	$password = clean($_POST['ldap_pwd']);
	$newpwd = clean($_POST['pwd1']);
		if($login == '') {
		$err[] = 'Login ID missing';
		$errflag = true;
	}
       	if($password == '') {
		$err[] = 'Password missing';
		$errflag = true;
	}
	err_chk('login.php');
    $lc = @ldap_connect("ldap.iitb.ac.in");
    if(!$lc) { 
        $err[] = "Connection error";
		$errflag = true;
    }
   
    $bind = @ldap_bind($lc);
    if(!$bind) {
        $err[] = "Bind error";
		$errflag = true;
    }
    
    $base_dn = "ou=People,dc=iitb,dc=ac,dc=in";
    $filter = "uid=".$login;
    $getThese = array("employeenumber","employeetype");
    $result = ldap_search($lc,$base_dn,$filter,$getThese );
    $info = ldap_get_entries($lc,$result);
    if(!$result) {
        $err[] = "Search failed";
		$errflag=true;
    }
    if($info["count"] == 0) {
		$err[]= "Unknown user - please fill details again";
		$errflag = true;
	}
	err_chk('login.php');
	
	$et=$info[0]["employeetype"][0];
/*	if($et!="ug" || $et!="dd" || $et!="pg" || $et!="rs")
	{
		$err[]= "Unknown user - please fill details again";
		$errflag = true;
	}
*/
	$user_dn = $info[0]["dn"];
	$bind=@ldap_bind($lc,$user_dn,$password);
	if(!$bind) {
        	
        	$err[]= "Wrong Username or password";
			$errflag = true;
			err_chk('login.php');
    	}
	$roll=$info[0]["employeenumber"][0];

	$_SESSION['uid'] = $login;
	$_SESSION['roll'] = $roll;
	
	//enter a new user in the user table
	//username same as ldap id, new password and date of joining
	//forward user to his edit profile page
	
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, "INSERT INTO User(user_name, password) VALUES (? , ?)") or die(mysqli_error());
	mysqli_stmt_bind_param($stmt, 'ss', $login, $newpwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	header("location:edit_profile.php");
}
include("db-disconnect.php");
//echo "Login ID : ".$_SESSION['uid']."<br />Roll No : ".$_SESSION['roll'];

?>
