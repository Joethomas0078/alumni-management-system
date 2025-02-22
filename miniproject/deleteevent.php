<?php
include "config.php";
if(isset($_GET['eid']))
{
    $eid = $_GET['eid'];
    $sql="DELETE FROM event WHERE eid = '$eid'";
    $result=mysqli_query($conn, $sql);
    if($result){
        echo "Record deleted sucessfully";
       
        header("location: displayeventaction.php");
    }
    else{
        echo mysqli_error($conn);
    
    }
}
?>