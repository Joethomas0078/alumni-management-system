<?php
include "config.php";
session_start();
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    
    $sql="SELECT * FROM adminlogin WHERE email='$email' and pwd='$pwd'";
    $result=mysqli_query($conn,$sql);

    if(!$result){
        echo "error".$sql."<br>".mysqli_error($conn);
    }
    else{
        if(mysqli_num_rows($result)==1)
        {
            $_SESSION['email']=$email;
            header("Location:mainpage.php");
        }
        else{
            
            header("Location:adminlogin.html?error=invaild");
            exit();
        }
    }
  

}
?>