<?php
include 'connect.php';

$id = $_GET["id"];

$sql = "SELECT * FROM employee WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<p><strong>Name:</strong> " . $row['first_name'] . " " . $row['last_name'] . "</p>";
} else {
    echo "Employee not found!";
}