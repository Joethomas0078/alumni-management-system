<?php
include "config.php";
if(isset($_GET['jid']))
{
    $jid = $_GET['jid'];
    $sql="SELECT * FROM job WHERE jid = '$jid'";
    $result=mysqli_query($conn, $sql);

    if($result)
    {
      $row=mysqli_fetch_assoc($result);

    }
}
    if(isset($_POST['submit']))
    {
        $jid = $_GET['jid'];
        $companyname =$_POST['companyname'];
        $applydate =$_POST['applydate'];
        $designation =$_POST['designation'];
        $qualification =$_POST['qualification'];
        $salary =$_POST['salary'];
        $contact =$_POST['contact'];
        $detail =$_POST['detail'];

        $sql=" UPDATE job SET companyname='$companyname',applydate='$applydate',designation='$designation',qualification='$qualification',
        salary='$salary',contact='$contact,detail='$detail'WHERE jid='$jid'";
        if(mysqli_query($conn,$sql))
        {
        echo "record edited sucessfully";
        header('Location:displayjobaction.php');
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
    <title>jobs</title> 
  </head>
  <body>
  <section class="container">
        <header>JOBS</header>
        <form action="" method="post" class="form">
            <div class="column">
                <div class="input-box">
                    <label></label>
                    <input type="text" placeholder="company name" name="companyname" value="<?php echo $row['companyname'];?>" required>
                </div>
                <div class="input-box">
                <label></label>
                <input type="date" placeholder="date to apply" name="applydate" value="<?php echo $row['applydate'];?>" required >
    
            </div>
             
            </div>
            <div class="column">
            
            <div class="input-box">
                <label></label>
                <input type="text" placeholder="designation" name="designation"  value="<?php echo $row['designation'];?>"required >
            </div>
            <div class="input-box">
                <label></label>
                <input type="text" placeholder="qualifications" name="qualification"  value="<?php echo $row['qualification'];?>"required >
            </div>
            <div class="input-box">
                <label></label>
                <input type="text" placeholder="salary" name="salary"  value="<?php echo $row['salary'];?>"required >
            </div>
            </div>
       
       
    </div>
    
    
    <div class="column">
        <div class="input-box">
            <label></label>
            <input type="text" placeholder="contact no" name="contact" value="<?php echo $row['contact'];?>" required >

        </div>
        <div class="input-box">
            <label></label>
            <input type="text" placeholder="details" name="detail" value="<?php echo $row['detail'];?>" required >

        </div>
    </div>
    
    
       
       
   
    
        <button type="submit" name="submit">Update</button>
       <br><br> 
    </form>
     </section>
     <script></script>
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


