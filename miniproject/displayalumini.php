<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Details</title>
   
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="retrunkey">
    <a href="interface.html"> HOME </a> / <a href="displayalumini.php"> ALUMNI DETAILS</a>
      </div>
   
        <div class="text-center mb-3">
            <h1>ALUMNI DETAILS</h1>
           
        </div>
        
        <table id="alumniTable" class="display table table-bordered table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Batch</th>
                    <th>Course</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                // Include your database configuration
                include "config.php";
                
                // Fetch alumni data
                $sql = "SELECT * FROM registration";
                $result = mysqli_query($conn, $sql);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['fname']}</td>
                                <td>{$row['mname']}</td>
                                <td>{$row['lname']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['desig']}</td>
                                <td>{$row['dob']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['batch']}</td>
                                <td>{$row['course']}</td>
                                
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10' class='text-center'>No Alumni Found</td></tr>";
                }
                ?>
            </tbody>
        </table>
   

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#alumniTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true
            });
        });
    </script>
</body>
</html>
<style>
  .retrunkey a{
  color: #000;
  text-decoration: none;
  font-size: small;
}
.retrunkey a:hover{
  text-decoration: underline;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

h1 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #000;
}



table {
    width: 100%;
}

th {
    background-color: #009879;
    color: #ffffff;
    text-transform: uppercase;
   
    
}

table.dataTable tbody tr {
  text-align: center; 
  padding: 8px;
    background-color: #ffffff;
    transition: all 0.3s ease-in-out;
}

table.dataTable tbody tr:hover {
    background-color: #f1f1f1;
}

.btn {
    font-size: 0.875rem;
    
}

.btn-primary {
    color: white;
    background-color: #2980b9;

    width: 10%; 
    height: 45%;
    
    border-radius: 5px;
    padding:5px 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1); 
    cursor: pointer; 
    font-size: 16px;  
    font-weight: 600;
    
}

.btn-primary:hover {
  background-color: #3498db;
    
}

.btn-warning {
  text-align: center;
    background-color: #2872c1;
    border-color: #1961c6;
    color: #fff;
}

.btn-warning:hover {
  
    background-color: #175cbc;
    border-color: #1167bd;
    color: #fff;
}

.btn-danger {
 
    background-color: #d9534f;
    border-color: #d43f3a;
    color: #fff;
}

.btn-danger:hover {
    background-color: #c9302c;
    border-color: #ac2925;
   
}

</style>
