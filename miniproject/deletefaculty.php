<?php
include "config.php";
if(isset($_GET['fid']))
{
    $fid = $_GET['fid'];
    $sql="DELETE FROM faculty WHERE fid = '$fid'";
    $result=mysqli_query($conn, $sql);
    if($result){
        echo "Record deleted sucessfully";
       
        header("location: bcatutors.php");
    }
    else{
        echo mysqli_error($conn);
    
    }
}
?>