<?php 
include "config.php"; 
if(isset($_POST['submit'])) 
{ 
       $eventname=$_POST['eventname']; 
       $dates=$_POST['dates']; 
       $timess=$_POST['timess']; 
       $detail=$_POST['detail']; 
        
       $sql ="INSERT INTO event (eventname,dates,timess,detail) VALUES ('$eventname','$dates','$timess','$detail')"; 
       $result=mysqli_query($conn,$sql); 
       if($result){ 
        echo "new record created sucessfully"; 
        header("Location: displayeventaction.php");
       } 
       else{ 
        echo mysqli_error($conn); 
          }  
           
} 
?>