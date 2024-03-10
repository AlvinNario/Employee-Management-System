<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('location: emp_login.php');
}

include 'connect.php';

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Handle form submission
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $dob = $_POST['dob'];
  // Repeat similar lines for other fields like last_name, username, email, mobile, dob

  // Handle profile image upload
  if ($_FILES['image']['name'] != "") {
    $image_name = $_FILES['image']['name'];
    $temp_image_name = $_FILES['image']['tmp_name'];
    $upload_path = "images/" . $image_name;

    move_uploaded_file($temp_image_name, $upload_path);

    // Update the image path in the database
    $update_image_sql = "UPDATE employee SET image = '$image_name' WHERE username = '$username'";
    mysqli_query($conn, $update_image_sql);
  }

  // Update the other profile information in the database
  $update_profile_sql = "UPDATE employee SET first_name = '$first_name', last_name='$last_name', username='$username', email='$email', mobile='$mobile', dob='$dob' WHERE username = '$username'";
  // Repeat similar lines for other fields like last_name, username, email, mobile, dob
  mysqli_query($conn, $update_profile_sql);

  // Redirect back to the profile page after updating
  header('location: profile.php');
} else {
  // If not a POST request, redirect to the edit profile page
  header('location: edit_profile.php');
}

?>