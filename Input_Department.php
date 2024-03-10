<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $dept_id = $_POST['dept_id'];
    $dept_name = $_POST['dept_name'];
    $status = $_POST['status'];

    $sql = "INSERT INTO department(dept_id, dept_name, status) 
    VALUES ('$dept_id', '$dept_name', '$status')";

if(mysqli_query($conn, $sql)){
    // echo "Record inserted successfully";
    header('location:Department.php');
} else {
    echo "Could not insert record: ". mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance Management System</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="sidebar">
        <a href="#">
            <i class="fa fa-user fa-4x" aria-hidden="true"></i>
        </a>
        <h2>Admin</h2>
        <ul class="nav">
        <li>
                <a href="Dashboard.php">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="Employee.php">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Employee</span>
                </a>
            </li>
            <li>
                <a href="Department.php">
                    <i class="fa fa-building-o" aria-hidden="true"></i>
                    <span>Department</span>
                </a>
            </li>
            <li>
                <a href="Shift.php">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span>Shift</span>
                </a>
            </li>
            <li>
                <a href="Report.php">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span>Report</span>
                </a>
            </li>
            <li>
                <a href="login.html" onclick="return confirm('Are you sure you want to logout?')">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

    </div>
    <div class="dept-main">
        <a href="Department.php"><input type="button" class="back-button" value="Back"></a>

    <form method="post" class="dept-form-card">
    <h2>DEPARTMENT</h2>
<div class="column">
<div class="input-box">
        <label for="dept_id">Department ID</label>
        <input type="text" name="dept_id" placeholder="Enter ID" required><br>
        <label for="dept_name">Department Name</label>
        <input type="text" name="dept_name" placeholder="Enter Department Name" required><br>
        <label for='status'>Status</label>
            <select name='status' id='status'>
            <option value='Active'>Active</option>
            <option value='Inactive'>Inactive</option>
            </select>
</div>
</div>
        <input type="submit" name="submit" class="add-dept" value="Add Department">
    </form>
    </div>
</body>
</html>