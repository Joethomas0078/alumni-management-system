<?php
include "config.php";
if(isset($_POST['submit']))
{
       $fname=$_POST['fname'];
       $email=$_POST['email'];
       $position=$_POST['position'];
       $department=$_POST['department'];
       $sql ="INSERT INTO faculty (fname,email,position,department) VALUES ('$fname','$email','$position','$department')";
       $result=mysqli_query($conn,$sql);
       if($result){
       header("Location:bcatutors.php");
       }
       else{
        echo mysqli_error($conn);
          } 
          
}
?>