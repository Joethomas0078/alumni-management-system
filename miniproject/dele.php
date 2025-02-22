<?php
include "config.php";
if(isset($_GET['uid']))
{
    $uid = $_GET['uid'];
    $sql="DELETE FROM student WHERE uid = '$uid'";
    $result=mysqli_query($conn, $sql);
    if($result){
        echo "Record deleted sucessfully";
        header("location:display.php");
    }
    else{
        echo mysqli_error($conn);
    
    }
}
?>