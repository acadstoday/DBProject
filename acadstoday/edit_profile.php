<?php
session_start();
if(!(isset($_SESSION['uid']))) {header("location:login.php");}
$uid = $_SESSION['uid'];

?>



<?php 
//Called from edit_profile_form.php when user wants to edit his/her profile
//Take data from $_POST and write update queries
//Finally, display a edit successfully messsage
?>
