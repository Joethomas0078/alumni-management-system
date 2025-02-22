<?php
include "config.php";
session_start();
$email=$_SESSION['email'];
if(!(isset($_SESSION['email']))){
    header("Location: adminlogin.php");
}
else{
    header("Location: responsivecard.html");
}
?>