<?php 
session_start(); 
include 'config.php'; // Database connection 
 
// Check if the user is logged in by verifying the session 
if (!isset($_SESSION['email'])) { 
    // If not logged in, redirect to login page 
    header("Location: userlogin.php"); 
    exit(); 
} 
 
// Fetch user details from the database using the session email 
$email = $_SESSION['email']; 
$sql = "SELECT * FROM registration WHERE email = '$email'"; 
$result = mysqli_query($conn, $sql); 
 
if (mysqli_num_rows($result) == 1) { 
    $user = mysqli_fetch_assoc($result); 
    $fname = $user['fname']; 
    $mname = $user['mname']; 
    $lname = $user['lname']; 
    $dob = $user['dob']; 
    $gender = $user['gender']; 
    $batch = $user['batch']; 
    $course = $user['course']; 
    $desig = $user['desig']; 
} else { 
    echo "User not found."; 
    exit(); 
} 
 
// Update profile details if the form is submitted 
if (isset($_POST['submit'])) { 
    $fname = $_POST['fname']; 
    $mname = $_POST['mname']; 
    $lname = $_POST['lname']; 
    $dob = $_POST['dob']; 
    $gender = $_POST['gender']; 
    $batch = $_POST['batch']; 
    $course = $_POST['course']; 
    $desig = $_POST['desig']; 
 
    // Update the user details in the database 
    $update_sql = "UPDATE registration SET fname='$fname', mname='$mname', lname='$lname', dob='$dob', gender='$gender', batch='$batch', course='$course', desig='$desig' WHERE email='$email'"; 
     
    if (mysqli_query($conn, $update_sql)) { 
        echo "Profile updated successfully!"; 
        header("Location: profedit.php"); // Redirect back to profile page 
    } else { 
        echo "Error updating profile: " . mysqli_error($conn); 
    } 
} 
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Edit Profile</title> 
    <style> 
        /* General reset */ 
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        } 
 
        /* Body styling */ 
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f4f7fc; 
            padding: 40px; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
        } 
 
        /* Profile container */ 
        .profile-container { 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100%; 
        } 
 
        /* Profile card styling */ 
        .profile-card { 
            background-color: #fff; 
            border-radius: 15px; 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); 
            overflow: hidden; 
            width: 450px; 
            padding: 30px; 
            transition: transform 0.3s ease-in-out; 
            border-top: 5px solid #2980b9; 
        } 
 
        /* Profile header */ 
        .profile-header { 
            margin-bottom: 20px; 
            text-align: center; 
        } 
 
        .profile-header h2 { 
            font-size: 2rem; 
            color: #2980b9; 
            font-weight: 600; 
        } 
 
        /* Profile form */ 
        .profile-form input, 
        .profile-form select { 
            width: 100%; 
            padding: 12px 20px; 
            margin: 10px 0; 
            border-radius: 8px; 
            border: 1px solid #ddd; 
            font-size: 1.1rem; 
            transition: border-color 0.3s ease; 
        } 
 
        .profile-form input:focus, 
        .profile-form select:focus { 
            border-color: #2980b9; 
        } 
 
        .profile-form button { 
            padding: 12px; 
            font-size: 1.1rem; 
            color: white; 
            background-color: #2980b9; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            width: 100%; 
            margin-top: 20px; 
            transition: background-color 0.3s ease; 
        } 
 
        .profile-form button:hover {background-color: #3498db; 
        } 
 
        /* Profile form input placeholders */ 
        .profile-form input::placeholder { 
            color: #aaa; 
            font-style: italic; 
        } 
 
        /* Responsive Design */ 
        @media (max-width: 768px) { 
            .profile-card { 
                width: 100%; 
                padding: 25px; 
            } 
        } 
    </style> 
</head> 
<body> 
    <div class="profile-container"> 
        <div class="profile-card"> 
            <div class="profile-header"> 
                <h2>Edit Your Profile</h2> 
            </div> 
            <form class="profile-form" method="POST" action=""> 
                <input type="text" name="fname" value="<?php echo $fname; ?>" required placeholder="First Name"> 
                <input type="text" name="mname" value="<?php echo $mname; ?>" placeholder="Middle Name"> 
                <input type="text" name="lname" value="<?php echo $lname; ?>" required placeholder="Last Name"> 
                <input type="date" name="dob" value="<?php echo $dob; ?>" required placeholder="Date of Birth"> 
                 
                <select name="gender" required> 
                    <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option> 
                    <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option> 
                    <option value="Other" <?php echo ($gender == 'Other') ? 'selected' : ''; ?>>Other</option> 
                </select> 
 
                <input type="text" name="batch" value="<?php echo $batch; ?>" required placeholder="Batch"> 
                <input type="text" name="course" value="<?php echo $course; ?>" required placeholder="Course"> 
                <input type="text" name="desig" value="<?php echo $desig; ?>" required placeholder="Designation"> 
 
                <button type="submit" name="submit">Update Profile</button> 
            </form> 
        </div> 
    </div> 
</body> 
</html>