<?php

include 'connect.php';

// Check if 'emp_id' is set in the $_POST array
if (isset($_POST["emp_id"])) {
    $id = $_POST["emp_id"];

    date_default_timezone_set('Asia/Manila');
    $current_time = date("h:i A");

    // Start a transaction
    mysqli_autocommit($conn, false);

    // Check for shift existence
    $sql = "SELECT am_start, am_end, pm_start, pm_end FROM shift";
    $result = $conn->query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Get the shift information
        $row = mysqli_fetch_assoc($result);
        $am_start = $row['am_start'];
        $am_end = $row['am_end'];
        $pm_start = $row['pm_start'];
        $pm_end = $row['pm_end'];

        // Assume you have columns like 'am_in', 'am_out', 'pm_in', 'pm_out', 'am_late', 'am_undertime', 'pm_late', 'pm_undertime' in your 'atlog' table
        $atlog_type = isset($_POST["atlog_type"]) ? $_POST["atlog_type"] : '';

        if ($atlog_type === "AM_IN") {
            $am_late = ($current_time > $am_start) ? 1 : 0;
            $am_undertime = 0;
            $sql = "INSERT INTO atlog (emp_id, atlog_date, am_in, am_late, am_undertime)
                    VALUES ('$id', CURDATE(), '$current_time', '$am_late', '$am_undertime')";
        } elseif ($atlog_type === "AM_OUT") {
            $am_late = 0;
            $am_undertime = ($current_time < $am_end) ? 1 : 0;
            $sql = "UPDATE atlog SET am_out='$current_time', am_undertime='$am_undertime' WHERE emp_id='$id' AND atlog_date=CURDATE()";
        } elseif ($atlog_type === "PM_IN") {
            $am_late = 0;
            $am_undertime = 0;
            $pm_late = ($current_time > $pm_start) ? 1 : 0;
            $sql = "UPDATE atlog SET pm_in='$current_time', pm_late='$pm_late' WHERE emp_id='$id' AND atlog_date=CURDATE()";
        } elseif ($atlog_type === "PM_OUT") {
            $am_late = 0;
            $am_undertime = 0;
            $pm_late = 0;
            $pm_undertime = ($current_time < $pm_end) ? 1 : 0;
            $sql = "UPDATE atlog SET pm_out='$current_time', pm_undertime='$pm_undertime' WHERE emp_id='$id' AND atlog_date=CURDATE()";
        } 

        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Commit the transaction
            mysqli_commit($conn);

            // Echo a success message
            echo "Time logged successfully!";
        } else {
            // Rollback the transaction and echo an error message
            mysqli_rollback($conn);
            echo "Error logging time! " . mysqli_error($conn);
        }
    } else {
        // Rollback the transaction and echo an error message
        mysqli_rollback($conn);
        echo "Shift not found!";
    }

    // Restore autocommit mode
    mysqli_autocommit($conn, true);

    mysqli_close($conn);
} else {
    // Echo an error message if 'emp_id' is not set
    echo "Error: 'emp_id' is not set in the POST request.";
}
?>
