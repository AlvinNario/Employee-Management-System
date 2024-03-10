<?php
// Create a connection to the database
$conn = mysqli_connect("localhost", "root", "", "block_c");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $image = $_POST['image'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob']; // date of birth
    $status = $_POST['status'];
    $gender = $_POST['gender'];
    $shift_time = $_POST['shift_time'];
    $department_name = $_POST['department_name'];

    // Handling file upload
    $imageFileName = $_FILES['image']['name'];
    $imageTempName = $_FILES['image']['tmp_name'];
    $imageFilePath = "D:" . DIRECTORY_SEPARATOR . "xampp" . DIRECTORY_SEPARATOR . "htdocs" . DIRECTORY_SEPARATOR . "Web" . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . $imageFileName;
    if (!file_exists("D:/xampp/htdocs/Web/images")) {
        mkdir("D:/xampp/htdocs/Web/images", 0777, true);
    }


    move_uploaded_file($imageTempName, $imageFilePath);

    $sql = "INSERT INTO employee(id, image, first_name, last_name, username, email, password, mobile, dob, status, gender, shift_time, department_name) 
    VALUES ('$id', '$imageFileName', '$first_name', '$last_name', '$username', '$email', '$password', '$mobile', '$dob', '$status', '$gender', '$shift_time', '$department_name')";

if(mysqli_query($conn, $sql)){
    // echo "Record inserted successfully";
    header('location:Employee.php');
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
                <a href="login.html">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

    </div>
    <div class="emp-main">
        <a href="Employee.php"><input type="button" class="back-button" value="Back"></a>
    <form method="post" class="form-card" enctype="multipart/form-data">
    <h2>EMPLOYEE</h2>
    <div class="input-box">
         <label for="image">Profile Image:</label>
        <input type="file" name="image">
</div>
<div class="column">
        <div class="input-box">
        <label for="id">Employee ID</label>
        <input type="text" name="id" size="30" placeholder="Enter ID">
</div>
        <div class="input-box">
        <label fo="first_name">First Name:</label>
        <input type="text" name="first_name" placeholder="Enter First Name">
</div>
</div>
<div class="column">
<div class="input-box">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" placeholder="Enter Last Name">
</div>
<div class="input-box">
        <label>Username:</label>
        <input type="text" name="username" placeholder="Enter Username">
</div>
</div>
<div class="column">
<div class="input-box">
        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="Enter Email" required>
</div>
        <div class="input-box">
        <label for="password">Password:</label>
        <input type="text" name="password" placeholder="Enter Password" required>
</div>
</div>
<div class="column">
<div class="input-box">
        <label>Mobile:</label>
        <input type="text" name="mobile" placeholder="Enter Mobile">
</div>
<div class="input-box">
        <label for="dob">Date of Birth:</label>
        <input type="date" id="date" name="dob" required>
</div>
</div>
<div class="column">
<div class="input-box">
        <label for="shift_time">Shift:</label>
        <select name="shift_time">
  <option value="shift_id"></option>
  <?php 
  
    $sql = "SELECT am_start, am_end, pm_start, pm_end FROM shift";
    $result = $conn->query($sql);
  
  while ($row = $result->fetch_assoc()) : ?>
    <option value="<?php echo $row['am_start'] . "-" . $row['am_end'] . " " . "AM" . " " . $row['pm_start'] . "-" . $row['pm_end'] . " " . "PM"; ?>">
      <?php echo $row['am_start'] . "-" . $row['am_end'] . " " . "AM" . " " . $row['pm_start'] . "-" . $row['pm_end'] . " " . "PM"; ?>
    </option>
  </option>
  <?php endwhile; ?>
</select></div>

<div class="input-box">
        <label for="department_name">Department:</label>
        <select name="department_name">
  <option value='dept_name'></option>
  <?php 
  
    $sql = "SELECT dept_name FROM department";
    $result = $conn->query($sql);
  
  while ($row = $result->fetch_assoc()) : ?>
    <option value="<?php echo $row['dept_name']; ?>">
      <?php echo $row['dept_name']; ?>
    </option>
  <?php endwhile; ?>
</select>
  </div>
  </div>
<div class="column">
  <div class="input-box">
        <label for='status'>Status:</label>
            <select name='status' id='status'>
            <option value='Active'>Active</option>
            <option value='Inactive'>Inactive</option>
            </select>
  </div>
            <div class="input-box">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
            </div>
            </div>
            <input type="submit" class="add-button" name="submit" value="Add Employee">
    </form>
  </div>
  </div>
</body>
</html>