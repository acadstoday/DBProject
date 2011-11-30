<?php
session_start();
require('err.php');
session_destroy();
header("location:login.php");
?>
