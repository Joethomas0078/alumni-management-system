<?php
include "config.php";
session_start();
$email=$_SESSION['email'];
if(!(isset($_SESSION['email']))){
    header("Location: userlogin.php");
}
else{
    header("Location: interface.html");
}
?>