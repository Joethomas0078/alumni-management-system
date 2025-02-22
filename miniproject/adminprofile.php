<?php 
session_start(); 
include 'config.php'; // Database connection 
 
// Check if the user is logged in by verifying the session 
if (!isset($_SESSION['email'])) { 
    // If not logged in, redirect to login page 
    header("Location: adminlogin.php"); 
    exit(); 
} 
 
// Fetch admin details from the database using the session email 
$email = $_SESSION['email']; 
$sql = "SELECT * FROM adminlogin WHERE email = '$email'"; 
$result = mysqli_query($conn, $sql); 
 
if (mysqli_num_rows($result) == 1) { 
    $admin = mysqli_fetch_assoc($result); 
    $email = $admin['email']; 
} else { 
    echo "Admin not found."; 
    exit(); 
} 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Admin Profile</title> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet"> 
    <style> 
        /* General reset */ 
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        } 
 
        body { 
            background-color: #f8f9fa; 
            color: #343a40; 
            font-family: 'Roboto', sans-serif; 
            display: flex; 
            flex-direction: column; 
            height: 100vh; 
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
            font-family: 'Montserrat', sans-serif; 
            font-weight: 600; 
            color: #007bff; 
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
            color: #ff4757; 
        } 
 
        /* Main content container */ 
        .main-content { 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            flex-grow: 1; 
            padding: 50px 10%; 
            text-align: center; 
        } 
 
        /* Profile Card */ 
        .profile-card { 
            background: #fff; 
            border-radius: 15px; 
            padding: 30px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            width: 350px; 
            text-align: center; 
        } 
 
        .profile-header { 
            margin-bottom: 20px; 
        } 
 
        .profile-header img { 
            width: 120px; 
            height: 120px; 
            border-radius: 50%; 
            background-color: #ddd; /* Placeholder profile image */ 
            margin-bottom: 20px; 
        } 
 
        .profile-header h2 { 
            font-size: 2rem; 
            font-family: 'Montserrat', sans-serif; 
            font-weight: 600; 
            color: #333; 
        } 
 
        .profile-body p { 
            font-size: 1.1rem; 
            color: #555; 
            margin: 10px 0; 
        } 
 
        .btn { 
            display: inline-block; 
            padding: 10px 20px; 
            font-size: 1rem; 
            text-decoration: none; 
            border-radius: 5px; 
            margin-top: 20px; 
            transition: background-color 0.3s; 
        } 
 
        .logout-btn { 
            background-color: #e74c3c; 
            color: #ffffff; 
            border: none; 
        } 
 
        .logout-btn:hover { 
            background-color: #c0392b; 
        } 
 
        .back-btn { 
            background-color: #3498db; 
            color: #ffffff; 
            border: none; 
        } 
 
        .back-btn:hover { 
            background-color: #2980b9; 
        }/* Back button on the top left */ 
        .back-btn-top { 
            position: absolute; 
            top: 20px; 
            left: 20px; 
            background-color: #3498db; 
            color: white; 
            padding: 10px 15px; 
            border-radius: 5px; 
            cursor: pointer; 
            font-weight: bold; 
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
    </style> 
</head> 
<body> 
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
 
    <!-- Back button --> 
    <button class="back-btn-top" onclick="window.location.href='responsivecard.html';">Back</button> 
 
    <!-- Main Content --> 
    <div class="main-content"> 
        <div class="profile-card"> 
            <div class="profile-header"> 
                <!-- Default profile image --> 
                <img src="default-profile.jpg" alt="Admin Profile Picture"> 
                <h2>Admin Profile</h2> 
            </div> 
            <div class="profile-body"> 
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p> 
            </div> 
            <div class="profile-footer"> 
                <a href="responsivecard.html" class="btn back-btn">Back to Dashboard</a> 
                <a href="logout.php" class="btn logout-btn">Logout</a> 
            </div> 
        </div> 
    </div> 
 
    <!-- Footer --> 
    <footer> 
        &copy; 2024 <a href="#">BVM Holy Cross College</a>. All rights reserved. 
    </footer> 
</body> 
</html>