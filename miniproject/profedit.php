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
?> 
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>My Profile - Alumni Management System</title> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet"> 
    <style> 
        /* Reset Styles */ 
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Roboto', sans-serif; /* Default font */ 
        } 
 
        body { 
            background-color: #f8f9fa; 
            color: #343a40; 
        } 
 
        /* Back Button */ 
        .back-button { 
            position: absolute; 
            top: 20px; 
            left: 20px; 
            padding: 10px 20px; 
            background-color: #007bff; 
            color: #fff; 
            font-size: 1rem; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            transition: background-color 0.3s ease; 
        } 
 
        .back-button:hover { 
            background-color: #0056b3; 
        } 
 
        /* Navbar */ 
        .navbar { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 30px 10%; 
            background: rgba(0, 0, 0, 0.7); 
        } 
 
        .navbar h1 { 
            font-size: 2rem; 
            font-family: 'Montserrat', sans-serif; /* Modern and professional font */ 
            font-weight: 600; 
            color: #007bff; /* Corporate blue accent */ 
        } 
 
        .navbar ul { 
            list-style: none; 
            display: flex; 
            gap: 25px; 
        } 
 
        .navbar ul li a { 
            text-decoration: none; 
            color: #fff; 
            font-weight: 500; 
            font-family: 'Roboto', sans-serif; 
            transition: color 0.3s ease; 
        } 
 
        .navbar ul li a:hover { 
            color: #ff4757; /* Red accent on hover */ 
        } 
 
        /* Banner Section */ 
        .banner { 
            position: relative; 
            width: 100%; 
            height: 10vh; 
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('bgpic.jpg') no-repeat center center/cover; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            color: #fff; 
        } 
 
        /* Profile Section */ 
        .profile-container { 
            display: flex; 
            justify-content: center; 
            align-items: flex-start; 
            flex-direction: row; /* Align side-by-side */ 
            padding: 50px 10%; 
        } 
 
        .welcome-message { 
            flex: 1; 
            text-align: left; 
        } 
 
        .profile-card { 
            background: #fff; 
            padding: 30px; 
            border-radius: 15px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            width: 400px; 
            margin-left: 50px; 
        } 
 
        .profile-header { 
            margin-bottom: 30px; 
        } 
 
        .profile-header h2 {
            font-size: 2.5rem; 
            font-family: 'Montserrat', sans-serif; 
            font-weight: 600; 
            color: #333; 
        } 
 
        .profile-header p { 
            font-size: 1.1rem; 
            color: #555; 
        } 
 
        .profile-info { 
            text-align: left; 
            margin-top: 20px; 
        } 
 
        .profile-info p { 
            font-size: 1.1rem; 
            margin: 10px 0; 
            color: #555; 
        } 
 
        .profile-info strong { 
            color: #007bff; 
        } 
 
        .btn-container { 
            margin-top: 40px; 
        } 
 
        .btn-container a { 
            padding: 15px 30px; 
            font-size: 1.1rem; 
            font-weight: bold; 
            color: #fff; 
            background: #007bff; 
            border-radius: 30px; 
            text-decoration: none; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); 
            transition: background 0.3s ease, transform 0.3s ease; 
        } 
 
        .btn-container a:hover { 
            background: #0056b3; 
            transform: translateY(-3px); 
        } 
 
        /* Footer */ 
        footer { 
            text-align: center; 
            padding: 10px 0; 
            font-size: 0.9rem; 
            background: #222; 
            color: #dcdcdc; 
            border-top: 2px solid #007bff; 
        } 
 
        footer a { 
            color: #007bff; 
            text-decoration: none; 
            transition: color 0.3s ease; 
        } 
 
        footer a:hover { 
            color: #ff4757; 
        } 
 
        /* Responsive Design */ 
        @media (max-width: 768px) { 
            .profile-container { 
                flex-direction: column; /* Stack vertically on smaller screens */ 
                padding: 20px; 
            } 
 
            .profile-card { 
                width: 90%; 
                margin-left: 0; 
            } 
        } 
    </style> 
</head> 
<body> 
    <!-- Back Button --> 
    <button class="back-button" onclick="window.location.href='interface.html';">Back</button> 
 
    <!-- Navbar --> 
    <div class="navbar"> 
        <h1>Alumni Management System</h1> 
        <ul> 
            <li><a href="aboutus.html">About Us</a></li> 
            <li><a href="facultydescrip.html">Faculty</a></li> 
            <li><a href="aluminidescrip.html">Alumni</a></li> 
            <li><a href="contactus.html">Contact</a></li> 
        </ul> 
    </div> 
 
    <!-- Banner Section --> 
    <div class="banner"> 
        <div class="content"> 
            <h1>Welcome, <span><?php echo $fname . ' ' . $lname; ?></span></h1> 
            <p>Your profile details are below. Let's keep in touch!</p> 
        </div> 
    </div> 
 
    <!-- Profile Section --> 
    <div class="profile-container"> 
        <!-- Welcome Message --> 
        <div class="welcome-message"> 
            <h2>Welcome to Your Profile</h2> 
            <p>We're happy to have you back. View and update your information as needed.</p> 
        </div> 
 
        <!-- Profile Card --> 
        <div class="profile-card"> 
            <div class="profile-header"> 
                <h2>My Profile</h2> 
                <p>Details about you and your time at the alma mater.</p> 
            </div> 
 
            <div class="profile-info"> 
                <p><strong>Full Name:</strong> <?php echo $fname . ' ' . $mname . ' ' . $lname; ?></p> 
                <p><strong>Email:</strong> <?php echo $email; ?></p> 
                <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p> 
                <p><strong>Gender:</strong> <?php echo $gender; ?></p> 
                <p><strong>Batch:</strong> <?php echo $batch; ?></p> 
                <p><strong>Course:</strong> <?php echo $course; ?></p> 
                <p><strong>Designation:</strong> <?php echo $desig; ?></p> 
            </div> 
 
            <div class="btn-container"> 
                <a href="editprofile.php">Edit Profile</a> 
                <a href="logout.php">Logout</a> 
            </div> 
        </div> 
    </div> 
 
    <!-- Footer --> 
    <footer> 
        &copy; 2024 <a href="#">BVM Holy Cross College</a>. All rights reserved. 
    </footer> 
</body> 
</html>