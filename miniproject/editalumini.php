<?php
include "config.php";
if(isset($_GET['uid']))
{
    $uid = $_GET['uid'];
    $sql="SELECT * FROM registration WHERE uid = '$uid'";
    $result=mysqli_query($conn, $sql);

    if($result)
    {
      $row=mysqli_fetch_assoc($result);

    }
}
    if(isset($_POST['submit']))
    {
        $uid = $_GET['uid'];
        $fname =$_POST['fname'];
        $mname =$_POST['mname'];
        $lname =$_POST['lname'];
        $email =$_POST['email'];
        $desig =$_POST['desig'];
        $dob =$_POST['dob'];
        $gender =$_POST['gender'];
        $batch =$_POST['batch'];
        $course =$_POST['course'];

        $sql=" UPDATE registration SET fname='$fname', mname='$mname',lname='$lname',email='$email',desig='$desig',dob='$dob',gender='$gender',batch='$batch',course='$course' WHERE uid='$uid'";
        if(mysqli_query($conn,$sql))
        {
        echo "record edited sucessfully";
        header("location:displayaluminiaction.php");
        }
       else
       {
        echo mysqli_error($conn);
          } 
          
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Registration form</title> 
  </head>
  <body>
     <section class="container">

        <header>Registration form</header>
        <form action="" method="post" class="form">
            <div class="column">
                <div class="input-box">
                    <label></label>
                    <input type="text" placeholder="first name" name="fname" value="<?php echo $row['fname'];?>" required>
                </div>
                <div class="input-box">
                    <label></label>
                    <input type="text" placeholder=" middle name(not req)" name="mname" value="<?php echo $row['mname'];?>" >
                </div>
                <div class="input-box">
                    <label></label>
                    <input type="text" placeholder="last name" name="lname" value="<?php echo $row['lname'];?>" required>
                </div>
            </div>
            <div class="column">
            <div class="input-box">
                <label></label>
                <input type="email" placeholder="email" name="email" value="<?php echo $row['email'];?>" required >
    
</div>
        <div class="input-box">
            <label></label>
            <input type="text" placeholder="designation" name="desig" value="<?php echo $row['desig'];?>" required>
        </div>
        <div class="input-box">
            <label></label>
            <input type="date" placeholder="date of birth" name="dob" value="<?php echo $row['dob'];?>" required>
        </div>
    </div>
    <div class="column">
        <div class="select-box">
            <select name="gender" value="<?php echo $row['gender'];?>" required >
                
             
                <option value="male">male</option>
                <option value="female">female</option>
                <option value="other">other</option>
            </select>
        </div>
    
    
        <div class="select-box">
            <select name="batch" value="<?php echo $row['batch'];?>" required>
              
                <option value="2000-2004">2000-2004</option>
                <option value="2004-2007">2004-2007</option>
                <option value="2007-2010">2007-2010</option>
                <option value="2010-2013">2010-2013</option>
                
            </select>
        </div>
        <div class="select-box">
            <select name="course" value="<?php echo $row['course'];?>" required >
                
                <option value="BCA">BCA</option>
                <option value="BCOM">BCOM</option>
                <option value="BSW">BSW</option>
                <option value="maths">maths</option>
            </select>
        </div>
       <!-- <div class="select-box">
            <select name="user" >
                <option value="">user</option>
                <option value="alumini">alumini</option>
                <option value="admin">admin</option>
               
            </select>
        </div>-->
    </div>
    
        <button type="submit" name="submit">update</button>
       <br><br> 
    </form>
     </section>
     
 
  </body>
</html>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family:"Poppins",sans-serif ;
    }
    body {
        background-image: url(bgpic.jpg);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding:20px;
        
        
    }
    .container {
        position: relative;
        max-width: 700px;
        width: 100%;
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .container header {
        font-size: 1.5rem;
        color: #333;
        font-weight: 500;
        text-align: center;
    }
    .container .form {
        margin-top: 8px;
    }
    .form .input-box {
        width: 100%;
        margin-top: 8px;
    }
    .input-box label {
        color: #333;

    }
    .form :where(.input-box input, .select-box) {
        position: relative;
        height: 50px;
        width: 100%;
        outline: none;
        font-size: 1rem;
        color: #707070;
        margin-top: 8px;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 0 15px;
    }
    .form .column{
        display: flex;
        column-gap: 15px;
        margin-top: 10px;
    }
    .form .gender-box{
        margin-top: 10px;
        
    }
    .gender-box h3{
        color: #333;
        font-size: 1rem;
        font-weight: 400;
        margin-bottom: 8px;

    }
    .form :where(.gender-option, .gender){
        display: flex;
        align-items: center;
        column-gap: 50px;
        flex-wrap: wrap;
    }
    .form .gender{
        column-gap: 5px;
        cursor: pointer;
    }
    .form :where( .gender input, .gender label){
        cursor: pointer;

    }
    .select-box select{
        height: 100%;
        width: 100%;
        outline: none;
        border: none;
        color: #707070;
        font-size: 1rem;

    }
    .form button{
        height: 55px;
        width: 100%;
        color: #fff;
        font-size: 1rem;
        font-weight: 400;
        border: none;
        margin-top: 30px;
        cursor: pointer;
        border-radius:6px;
        transition: all 0.2s ease;
        background-color: rgba(130,106,251);
    }
    .form button:hover{
        background-color: rgba(88,56,250);
    }
    .form p{
        color: #333; 
    }
    .form p a{
        color: rgb(40, 36, 36); 
        text-decoration: none; 
        font-weight: 600;
    }
    .form p a:hover{
        text-decoration: underline;
    }

    
    @media screen and (max-width: 500px){
        .form .column {
            flex-wrap: wrap;
        }
       
    }
</style>


