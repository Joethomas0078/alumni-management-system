<?php
include "config.php";
if(isset($_GET['jid']))
{
    $jid = $_GET['jid'];
    $sql="DELETE FROM job WHERE jid = '$jid'";
    $result=mysqli_query($conn, $sql);
    if($result){
        echo "Record deleted sucessfully";
       
        header("location: displayjobaction.php");
    }
    else{
        echo mysqli_error($conn);
    
    }
}
?>