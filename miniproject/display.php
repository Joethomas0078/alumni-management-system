<?php
include "config.php";
$sql ="SELECT * FROM student";
$result = mysqli_query($conn,$sql);
if(!$result){
    mysqli_error($conn);
}
else{
    echo "<h2>Student data</h2>
   <table border='1'>
   <tr><th>Name</th>
   <th>Roll no</th>
   <th>Admission no</th>
   <th>Phone</th>
   <th>DOB</th>
   <th>Edit</th>
   <th>Delete</th>
   </tr>";
   while($row=mysqli_fetch_assoc($result)){
    echo "<tr>
    <td>".$row['sname']."</td>
    <td>".$row['roll']."</td>
    <td>".$row['admno']."</td>
    <td>".$row['phone']."</td>
    <td>".$row['dob']."</td>
    <td><a href='edit.php?uid=" .$row['uid']. "'>Edit</a></td>
    <td><a href='dele.php?uid=" .$row['uid']. "'>Delete</a></td>
    </tr>";
   }
   echo "</table";
}
?>