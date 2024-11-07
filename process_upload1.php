<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet autoloader

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];

    // Check if the file is an Excel file
    $allowed_extensions = array("xls", "xlsx");
    $file_extension = pathinfo($file["name"], PATHINFO_EXTENSION);

    if (in_array(strtolower($file_extension), $allowed_extensions)) {
        // Move the file to a temporary location
        $temp_file = $file["tmp_name"];

        // Load the Excel file
        $spreadsheet = IOFactory::load($temp_file);
        $sheet = $spreadsheet->getActiveSheet();

        // Assuming the Excel file has columns matching your database table
        foreach ($sheet->getRowIterator() as $row) {
            $data = $row->getValues();

            // Assuming the columns in Excel match your database table
            $registration = your_escape_function($data[1]);
            $vendor_code = your_escape_function($data[2]);
            $name = your_escape_function($data[3]);
            $dob = your_escape_function($data[4]);
            $status = your_escape_function($data[5]);
            $discipline = your_escape_function($data[6]);
            $enrollment_id = your_escape_function($data[7]);
            $contact_no = your_escape_function($data[8]);
            $state = your_escape_function($data[9]);
            $state_office = your_escape_function($data[10]);
            $location = your_escape_function($data[11]);
            $mobile_no = your_escape_function($data[12]);
            $email = your_escape_function($data[13]);
            $date_of_joining = your_escape_function($data[14]);
            $cl_balance = your_escape_function($data[15]);
            $gl_balance = your_escape_function($data[16]);
            $password = your_escape_function($data[17]);

            // Perform database update based on your requirements
            // Example: $your_database_connection->query("INSERT INTO your_table_name (Registration, vendor_code, Name, dob, Status, Discipline, Enrollment_ID, Contact_No, State, State_Office, Location, Mobile_No, Email, Date_Of_Joining, cl_balance, gl_balance, Password) VALUES ('$registration', '$vendor_code', '$name', '$dob', '$status', '$discipline', '$enrollment_id', '$contact_no', '$state', '$state_office', '$location', '$mobile_no', '$email', '$date_of_joining', '$cl_balance', '$gl_balance', '$password')");
        }

        echo "File uploaded and database updated successfully.";
    } else {
        echo "Invalid file format. Please upload a valid Excel file.";
    }
} else {
    echo "Invalid request.";
}
?>
