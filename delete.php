<?php

$conn = mysqli_connect("localhost", "root", "", "block_c");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted with the employee ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the employee from the database
    $sql = "DELETE FROM employee WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error deleting record: " . mysqli_error($conn));
    }

    // Redirect back to the Employee list
    header("Location: Employee.php");
}

// Close the connection
mysqli_close($conn);
?>