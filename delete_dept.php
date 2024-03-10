<?php

$conn = mysqli_connect("localhost", "root", "", "block_c");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted with the shift ID
if (isset($_GET['dept_id'])) {
    $dept_id = $_GET['dept_id'];

    // Delete the department from the database
    $sql = "DELETE FROM department WHERE dept_id = $dept_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error deleting record: " . mysqli_error($conn));
    }

    // Redirect back to the Employee list
    header("Location: Department.php");
}

// Close the connection
mysqli_close($conn);
?>