<?php

include 'connect.php';

date_default_timezone_set('Asia/Manila');
        $current_time = date('h:i:A');

// Get all login records
$sql = "SELECT * FROM login_records ORDER BY login_time DESC LIMIT 5"; // Assuming login records are stored in a table called 'login_records'
$result = $conn->query($sql);
$login_records = [];
while ($row = $result->fetch_assoc()) {
  $login_records[] = $row;
}

// Count departments
$sql = "SELECT COUNT(*) FROM department";
$result = $conn->query($sql);
$department_count = $result->fetch_row()[0];

// Count shifts
$sql = "SELECT COUNT(*) FROM shift";
$result = $conn->query($sql);
$shift_count = $result->fetch_row()[0];

// Count employees
$sql = "SELECT COUNT(*) FROM employee";
$result = $conn->query($sql);
$employee_count = $result->fetch_row()[0];

// Get all employees
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);
$employees = [];
while ($row = $result->fetch_assoc()) {
  $employees[] = $row;
}
// Close connection
$conn->close();

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
            <a href="admin.html" onclick="return confirm('Are you sure you want to logout?')">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
          <span>Logout</span>
                </a>
            </li>
        </ul>

    </div>
  </div>
  <div class="dash-main">
  <h1>DASHBOARD</h1>
  
  <div class="emps-card">
    <i class="fa fa-users" aria-hidden="true"></i>
    <span class="number"><?php echo $employee_count; ?></span>
    <div class="inside-box">
            <span class="label">Employees</span>
            <div class="icon-container">
                <i class="fa fa-check-circle" aria-hidden="true"></i>   
            </div>
        </div>
  </div>

  <div class="dept-card">
    <i class="fa fa-building" aria-hidden="true"></i>
    <span class="number"><?php echo $department_count; ?></span>
    <div class="inside-box">
            <span class="label">Departments</span>
            <div class="icon-container">
                <i class="fa fa-check-circle" aria-hidden="true"></i>   
            </div>
        </div>
  </div>

  <div class="shift-card">
    <i class="fa fa-calendar" aria-hidden="true"></i>
    <span class="number"><?php echo $shift_count; ?></span>
    <div class="inside-box"><span class="label">Shift</span>
            <div class="icon-container">
                <i class="fa fa-check-circle" aria-hidden="true"></i>   
            </div>
  </div>

  <div class="emp-view">
        <h2>Recent Login</h2>
        
        <?php if ($login_records): ?>
      <table>
            <tr>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Login Time</th>
            </tr>

        <?php foreach ($login_records as $record): ?>
          <tr>
            <td><?php echo $record['first_name'] . " " . $record['last_name']; ?></td>
            <td><?php echo $record['email']; ?></td>
            <td><?php echo $record['gender']; ?></td>
            <td><?php echo $record['mobile']; ?></td>
            <td><?php echo $record['login_time']; ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    <?php else: ?>
      <p>No recent logins.</p>
    <?php endif; ?>
  </div>
  </div>
</body>
</html>
