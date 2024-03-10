<?php
// Create a connection to the database
$conn = mysqli_connect("localhost", "root", "", "block_c");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    // Add other form fields as needed

    // Update the employee details in the database
    $sql = "UPDATE employee SET first_name='$first_name', last_name='$last_name', username='$username', email='$email', mobile='$mobile', gender='$gender', status='$status' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error updating record: " . mysqli_error($conn));
    }

    // Redirect back to the Employee list
    header("Location: Employee.php");
}

// Close the connection
mysqli_close($conn);
?>
