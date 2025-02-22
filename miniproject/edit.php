<?php
include "config.php";
if(isset($_GET['uid']))
{
    $uid = $_GET['uid'];
    $sql="SELECT * FROM student WHERE uid = '$uid'";
    $result=mysqli_query($conn, $sql);

    if($result)
    {
      $row=mysqli_fetch_assoc($result);

    }
}
    if(isset($_POST['submit']))
    {
        $uid = $_GET['uid'];
        $sname =$_POST['sname'];
        $roll =$_POST['roll'];
        $admno =$_POST['admno'];
        $phone =$_POST['phone'];
        $dob =$_POST['dob'];

        $sql=" UPDATE student SET sname='$sname', roll='$roll',admno='$admno',phone='$phone',dob='$dob' WHERE uid='$uid'";
        if(mysqli_query($conn,$sql))
        {
        echo "record edited sucessfully";
        header("location:display.php");
        }
       else
       {
        echo mysqli_error($conn);
          } 
          
}
?>
<!DOCTYPE html>
    <head>
        <title>Edit FORM</title>
    </head>
    <body>
        <form method="POST">
            Name:<br>
            <input type="text" name="sname" value="<?php echo $row['sname'];?>" required><br>

            Roll no:<br>
            <input type="number" name="roll" value="<?php echo $row['roll'];?>" required><br>

            Admission no:<br>
            <input type="text" name="admno" value="<?php echo $row['admno'];?>" required><br>

            phone:<br>
            <input type="number" name="phone"value="<?php echo $row['phone'];?>" required><br>

            DOB:<br>
            <input type="date" name="dob"value="<?php echo $row['dob'];?>" required><br><br>

            <button type="submit" name="submit">update</button>

        </form> 
    </body>
</html>
    
