<?php
// Create a connection to the database
$conn = mysqli_connect("localhost", "root", "", "block_c");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $dept_id = $_POST['dept_id'];
    $dept_name = $_POST['dept_name'];

    // Update the department details in the database
    $sql = "UPDATE department SET dept_name='$dept_name' WHERE dept_id=$dept_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error updating record: " . mysqli_error($conn));
    }

    // Redirect back to the Employee list
    header("Location: Department.php");
}

// Close the connection
mysqli_close($conn);
?>