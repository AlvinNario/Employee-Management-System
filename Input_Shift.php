<?php
include 'connect.php';

date_default_timezone_set('Asia/Manila');

if(isset($_POST['submit'])){
    $shift_id = $_POST['shift_id'];
    $am_start = date('h:i A', strtotime($_POST['am_start']));
    $am_end = date('h:i A', strtotime($_POST['am_end']));
    $pm_start = date('h:i A', strtotime($_POST['pm_start']));
    $pm_end = date('h:i A', strtotime($_POST['pm_end']));

    $sql = "INSERT INTO shift(shift_id, am_start, am_end, pm_start, pm_end)
	VALUES ('$shift_id', '$am_start', '$am_end', '$pm_start', '$pm_end')";

    if(mysqli_query($conn, $sql)){
        // echo "Record inserted successfully";
        header('location:Shift.php');
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
<style>
    form {
        margin-left: 500px;
    }
</style>
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
    <div class="shift-main">
        <a href="Shift.php"><input type="button" class="back-button" value="Back"></a>

    <form method="post" class="shift-form-card">
    <h2>SHIFT TIME</h2>
    <div class="column">
        <div class="input-box">
    <label for="am_start">Morning Start Time:</label>
        <input type="time" id="am_start" name="am_start" required>
       
        <label for="am_end">Morning End Time:</label>
        <input type="time" id="am_end" name="am_end" required>
</div>
</div>
<div class="column">
        <div class="input-box">
        <label for="pm_start">Afternoon Start Time:</label>
        <input type="time" id="pm_start" name="pm_start" required>
        
        <label for="pm_end">Afternoon End Time:</label>
        <input type="time" id="pm_end" name="pm_end" required>
        </div>
</div>
  <input type="submit" name="submit" class="add-shift" value="Add Shift">
</form>
</div>
</body>
</html>