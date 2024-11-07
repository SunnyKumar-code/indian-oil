<?php
include("../db/iocldb.php");

// Fetch attendance data along with apprentice details
$query = "SELECT attendance.*, apprentice.* 
          FROM attendance 
          INNER JOIN apprentice ON attendance.vendor_code = apprentice.vendor_code";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error fetching data: ' . mysqli_error($conn));
}

// Define file name and headers
$file_name = "attendance_data_with_details.csv";
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=' . $file_name);

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output column headers (adjust these as per your database schema)
fputcsv($output, array('ID', 'Attendance Date', 'Attendance Status', 'Vendor Code', 'Created At', 'Leave Type', 'Name', 'Email', 'Other Details'));

// Output data rows
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
mysqli_close($conn);
