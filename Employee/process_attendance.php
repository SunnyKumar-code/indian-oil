<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include("../db/iocldb.php");

if (
    isset($_POST['mark_selected_dates']) &&
    isset($_POST['attendance_status']) &&
    isset($_POST['vendor_code']) &&
    isset($_POST['selected_dates']) &&
    isset($_POST['leave_type'])
) {
    $attendance_status = $_POST['attendance_status'];
    $vendor_code = $_POST['vendor_code'];
    $selected_dates = $_POST['selected_dates'];
    $leave_type = ($_POST['attendance_status'] === "Absent") ? "'" . $_POST['leave_type'] . "'" : "NULL";
    $marked_dates = [];

    if ($_POST['leave_type'] === "General Leave") {
        $get_gl_balance_query = "SELECT gl_balance FROM apprentice WHERE vendor_code = '$vendor_code'";
        $gl_balance_result = mysqli_query($conn, $get_gl_balance_query);

        if ($gl_balance_result) {
            $gl_balance = mysqli_fetch_assoc($gl_balance_result)['gl_balance'];
            $update_gl_balance = $gl_balance;
        } else {
            echo "<script>alert('Error fetching General Leave balance: " . mysqli_error($conn) . "');</script>";
            exit;
        }
    } elseif ($_POST['leave_type'] === "Casual Leave") {
        $get_cl_balance_query = "SELECT cl_balance FROM apprentice WHERE vendor_code = '$vendor_code'";
        $cl_balance_result = mysqli_query($conn, $get_cl_balance_query);

        if ($cl_balance_result) {
            $cl_balance = mysqli_fetch_assoc($cl_balance_result)['cl_balance'];
            $update_cl_balance = $cl_balance;
        } else {
            echo "<script>alert('Error fetching Casual Leave balance: " . mysqli_error($conn) . "');</script>";
            exit;
        }
    }
    foreach ($selected_dates as $date) {
        $formatted_date = date('Y-m-d', strtotime($date));

        // Check if a record already exists for the same date and vendor code
        $check_query = "SELECT * FROM attendance WHERE vendor_code = '$vendor_code' AND attendance_date = '$formatted_date'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) == 0) {
            // Insert a new record only if it doesn't already exist
            $attendance_records[] = "('$vendor_code', '$formatted_date', '$attendance_status', $leave_type)";

            // Decrement the cl_balance if leave type is cl
            if ($_POST['leave_type'] === "Casual Leave" && $_POST['attendance_status'] === "Absent") {
                if ($update_cl_balance == 0) {
                    echo "<script>alert('You have only  $cl_balance  remaining casual leave. ');</script>";
                    echo "<script>window.location.href = 'attendance.php?vendor_code=$vendor_code';</script>";
                    exit;
                } else {
                    $update_cl_balance = $update_cl_balance - 1;
                }
            } elseif ($_POST['leave_type'] === "General Leave" && $_POST['attendance_status'] === "Absent") {
                // Decrement the gl_balance if leave type is gl
                if ($update_gl_balance == 0) {
                    echo "<script>alert('You have only  $gl_balance  remaining casual leave. ');</script>";
                    echo "<script>window.location.href = 'attendance.php?vendor_code=$vendor_code';</script>";
                    exit;
                } else {
                    $update_gl_balance = $update_gl_balance - 1;
                }
            }
        } else {
            // Record already exists, add it to marked_dates array
            $marked_dates[] = $date;
        }
    }

    if (!empty($attendance_records)) {
        if ($_POST['leave_type'] === "Casual Leave") {
            $update_cl_balance_query = "UPDATE apprentice SET cl_balance = '$update_cl_balance' WHERE vendor_code = '$vendor_code'";
            $update_cl_balance_result = mysqli_query($conn, $update_cl_balance_query);

            if (!$update_cl_balance_result) {
                echo "<script>alert('Error updating Casual Leave balance: " . mysqli_error($conn) . "');</script>";
                exit;
            }
        } elseif ($_POST['leave_type'] === "General Leave") {
            $update_gl_balance_query = "UPDATE apprentice SET gl_balance = '$update_gl_balance' WHERE vendor_code = '$vendor_code'";
            $update_gl_balance_result = mysqli_query($conn, $update_gl_balance_query);

            if (!$update_gl_balance_result) {
                echo "<script>alert('Error updating General Leave balance: " . mysqli_error($conn) . "');</script>";
                exit;
            }
        }
        $query = "INSERT INTO attendance (vendor_code, attendance_date, attendance_status, leave_type) VALUES " . implode(", ", $attendance_records);
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Attendance recorded successfully for the selected dates.');</script>";
        } else {
            echo "<script>alert('Error recording attendance: " . mysqli_error($conn) . "');</script>";
        }
    }

    if (!empty($marked_dates)) {
        echo "<script>alert('The following dates were already marked: " . implode(", ", $marked_dates) . "');</script>";
    }
} else {
    echo "<script>alert('Invalid data submitted.');</script>";
}
echo "<script>window.location.href = 'attendance.php?vendor_code=$vendor_code';</script>";

mysqli_close($conn);
