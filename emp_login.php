<?php
include 'connect.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM employee WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Fetch user data
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $gender = $row['gender'];

    // Start session
    session_start();
    $_SESSION['username'] = $username;

    date_default_timezone_set('Asia/Manila');
    $current_time = date("h:i A");

    // Insert login record
    $insertSql = "INSERT INTO login_records (first_name, last_name, email, gender, mobile, login_time)
                  VALUES ('$first_name', '$last_name', '$email', '$gender', '$mobile', NOW())";
    mysqli_query($conn, $insertSql);

    // Redirect to profile page
    header('location: profile.php');
  } else {
    echo "<script>alert('Invalid username and password');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Attendance Management System - Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="title">
        <h1>Employee Attendance Management System</h1>  
    </div>
    
<div class="container-responsive">

    <div class="login-form">

        <h2>Employee Login</h2>

        <form method="post" action="emp_login.php">
        <div class="input-box">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" placeholder="Username" required>
</div>
<div class="input-box">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" placeholder="Password" required>
</div>
<div class="remember">
      <a href="forgot_password.php">
                    <span>Forgot Password?</span>
                </a>
</div>
            <input type="submit" class="button" name="login" value="Login"></a>
      <a href="login.html"><input type="button" class="button" value="Cancel"></a>
        </form>
    </div>
</body>
</html>
