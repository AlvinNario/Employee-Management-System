<?php

$conn = mysqli_connect("localhost", "root", "", "block_c");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted with the employee ID
if (isset($_GET['shift_id'])) {
    $shift_id = $_GET['shift_id'];

    // Delete the employee from the database
    $sql = "DELETE FROM shift WHERE shift_id = $shift_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error deleting record: " . mysqli_error($conn));
    }

    // Redirect back to the Employee list
    header("Location: Shift.php");
}

// Close the connection
mysqli_close($conn);
?>