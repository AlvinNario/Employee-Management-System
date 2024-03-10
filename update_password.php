<?php
include 'connect.php';

if (isset($_POST['forgot_pass'])) {
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];

    // Update the password in the employee table
    $updatePasswordQuery = "UPDATE employee SET password='$newPassword' WHERE email='$email'";
    $result = mysqli_query($conn, $updatePasswordQuery);

    if ($result) {
        echo "<p>Password reset successful.</p>";
    } else {
        echo "<p>Error updating password. Please try again.</p>";
    }
}

    // Redirect back to the Employee list
    header("Location: emp_login.php");
?>