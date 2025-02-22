<?php
include "config.php";
if(isset($_POST['submit']))
{
       $fname=$_POST['fname'];
       $mname=$_POST['mname'];
       $lname=$_POST['lname'];
       $email=$_POST['email'];
       $pwd=$_POST['pwd'];
       $cpwd=$_POST['cpwd'];
       $desig=$_POST['desig'];
       $dob=$_POST['dob'];
       $gender=$_POST['gender'];
       $batch=$_POST['batch'];
       $course=$_POST['course'];
       $user=$_POST['user'];
       $sql ="INSERT INTO registration (fname,mname,lname,email,pwd,cpwd,desig,dob,gender,batch,course,user) VALUES ('$fname','$mname','$lname','$email','$pwd','$cpwd','$desig','$dob','$gender','$batch','$course','$user')";
       $result=mysqli_query($conn,$sql);
       if($result){
        //echo "new record created sucessfully";

        

        header("location:displayaluminiaction.php");
       }
       else{
      
        echo mysqli_error($conn);
          } 
         
          
}
?>

