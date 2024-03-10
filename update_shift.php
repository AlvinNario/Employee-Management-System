<?php
// Create a connection to the database
$conn = mysqli_connect("localhost", "root", "", "block_c");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $shift_id = $_POST['shift_id'];
    $am_start = date('h:i A', strtotime($_POST['am_start']));
    $am_end = date('h:i A', strtotime($_POST['am_end']));
    $pm_start = date('h:i A', strtotime($_POST['pm_start']));
    $pm_end = date('h:i A', strtotime($_POST['pm_end']));

    // Update the department details in the database
    $sql = "UPDATE shift SET am_start='$am_start',  am_end='$am_end',  pm_start='$pm_start',  pm_end='$pm_end' WHERE shift_id=$shift_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error updating record: " . mysqli_error($conn));
    }

    // Redirect back to the Employee list
    header("Location: Shift.php");
}

// Close the connection
mysqli_close($conn);
?>