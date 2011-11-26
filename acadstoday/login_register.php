<?php
session_start();
require('err.php');

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
	err_chk('login_page.php');
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
    $getThese = array("employeenumber","employeetype","cn"); //'cn' -user's full name ;  
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
	err_chk('login_page.php');
	
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
			err_chk('login_page.php');
    	}
	$roll=$info[0]["employeenumber"][0];
	$user_name = $info[0]["cn"][0];
	/*$usedids=fopen("datfiles/usedids.dat", 'r');
    while(!feof($usedids))
    {
        if (trim(fgets($usedids))==$roll)
        {
            $err[]="This LDAP ID has been used once.";
			$errflag=true;
            fclose($usedids);
			err_chk('login_page.php');
        }
    }*/

	//these two session variables are always present [non null] when session active
	$_SESSION['uid'] = $login;
	$_SESSION['user_name'] = $user_name;
	
	//enter a new user in the user table
	//user_id same as ldap id($login), user_name as $user_name, new password and date of joining ; rest all attributes are null for the time being
	//forward user to his edit profile page with $user_name [method get]

}

//echo "Login ID : ".$_SESSION['uid']."<br />Roll No : ".$_SESSION['roll'];

?>
