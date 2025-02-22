<?php 
include "config.php"; 
if(isset($_POST['submit'])) 
{ 
       $companyname=$_POST['companyname']; 
       $applydate=$_POST['applydate']; 
       $designation=$_POST['designation']; 
       $qualification=$_POST['qualification']; 
       $salary=$_POST['salary']; 
       $contact=$_POST['contact']; 
       $detail=$_POST['detail']; 
        
       $sql ="INSERT INTO job (companyname,applydate,designation,qualification,salary,contact,detail) VALUES ('$companyname','$applydate','$designation','$qualification','$salary','$contact','$detail')"; 
       $result=mysqli_query($conn,$sql); 
       if($result){ 
        echo "new record created sucessfully"; 
        header("location:displayjobaction.php");
       } 
       else{ 
        echo mysqli_error($conn); 
          }  
           
} 
?>