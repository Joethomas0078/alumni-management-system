<?php
include "config.php";
if(isset($_POST['submit']))
{
       $sname=$_POST['sname'];
       $roll=$_POST['roll'];
       $admno=$_POST['admno'];
       $phone=$_POST['phone'];
       $dob=$_POST['dob'];

       $sql ="INSERT INTO student (sname,roll,admno,phone,dob) VALUES ('$sname','$roll','$admno','$phone','$dob')";
       $result=mysqli_query($conn,$sql);
       if(!$result){
        echo "new record created sucessfully";
       }
       else{
        echo mysqli_error($conn);
          } 
          
}
?>