<?php
include "config.php";
if(isset($_GET['uid']))
{
    $uid = $_GET['uid'];
    $sql="DELETE FROM registration WHERE uid = '$uid'";
    $result=mysqli_query($conn, $sql);
    if($result){
        echo "Record deleted sucessfully";
       
        header("location:displayaluminiaction.php");
    }
    else{
        echo mysqli_error($conn);
    
    }
}
?>