<?php
include 'connect.php';

date_default_timezone_set('Asia/Manila');
        $current_time = date('h:i:s A');

if (isset($_POST['submit'])) {
    // Collect form data
    $emp_id = $_POST['emp_id'];
    $atlog_type = $_POST['atlog_type'];

    // Build SQL query
    $sql = "INSERT INTO atlog (emp_id, $atlog_type, {$atlog_type}_late, {$atlog_type}_undertime, atlog_date)
            VALUES ('$emp_id', '1', '0', '0', NOW())";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Record inserted successfully
        echo "Record inserted successfully.";
    } else {
        // Error inserting record
        echo "Could not insert record: " . mysqli_error($conn);
    }
    exit; // Stop further execution to avoid rendering HTML content
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="sidebar">
        <div class="top"></div>
        <?php
          session_start();
    
          if (!isset($_SESSION['username'])) {
            header('location: emp_login.php');
          }
    
          include 'connect.php';
    
          $username = $_SESSION['username'];
    
          $sql = "SELECT first_name, last_name FROM employee WHERE username = '$username'";
          $result = mysqli_query($conn, $sql);
    
          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $employee_name = $row['first_name'] . " " . $row['last_name'];
          } else {
            echo "Error: " . mysqli_error($conn);
          }
        ?>
        <h2><?php echo $employee_name; ?></h2>
        <ul class="nav">
        <li>
                    <a href="profile.php">
                        <i class="fa fa-user fa" aria-hidden="true"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="Attendance.php">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <span>Attendance</span>
                    </a>
                </li>
                <li>
                <a href="emp_login.php" onclick="return confirm('Are you sure you want to logout?')">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span>Logout</span>
                    </a>
                </li>
          </ul>
      </div>

	  <div class="main">
        <div class="attendance">
    <h1>Attendance System</h1>
    <label for="id">Employee ID:</label>
    <input type="text" id="id" placeholder="Enter your ID" required>
    <button class="search-btn" onclick="searchEmployee()">Search</button>

    <div class="employee_info" id="employee_info"></div>

    <div class="attendance_buttons" id="attendance_buttons" style="display: none;">
        <h3>AM</h3>
        <input type="submit" name="submit" class='am-btn' onclick="logTime('AM_IN')" value="In">
        <input type="submit" name="submit" class='am-btn' onclick="logTime('AM_OUT')" value="Out">
       
        <h3>PM</h3>
        <input type="submit" name="submit" class='pm-btn' onclick="logTime('PM_IN')" value="In">
        <input type="submit" name="submit" class='pm-btn' onclick="logTime('PM_OUT')" value="Out">
        </div>
    </div>
    </div>
    <script>
        function searchEmployee() {
            var employeeId = document.getElementById("id").value;
            
            fetch("search_employee.php?id=" + employeeId)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("employee_info").innerHTML = data;
                    document.getElementById("attendance_buttons").style.display = "block";
                })
                .catch(error => {
                    console.error("Error searching employee:", error);
                    alert("Error searching employee!");
                });
        }

        function logTime(type) {
            var employeeId = document.getElementById("id").value;
            
            fetch("log_time.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: "emp_id=" + employeeId + "&atlog_type=" + type,
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
            })
            .catch(error => {
                console.error("Error logging time:", error);
                alert("Error logging time!");
            });
        }
    </script>
</body>
</html>
