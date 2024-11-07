<?php
include("db/iocldb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchType = $_POST["searchType"];
    $searchInput = $_POST["searchInput"];

    if ($searchType == "vendor") {
        $srchsql = "SELECT * FROM apprentice WHERE vendor_code = '$searchInput'";
    } elseif ($searchType == "employee") {
        $srchsql = "SELECT * FROM ragister WHERE employeeid = '$searchInput'";
    } else {
        echo "Invalid search type.";
    }
    // echo $searchType;
    // echo $searchInput;
    // echo $srchsql;

    $srchresult = $conn->query($srchsql);
    $srchrow = mysqli_fetch_assoc($srchresult);

    // //$srchresult = mysqli_query($conn, $srchsql);
    // echo $srchresult;
    // if (!$srchresult) {
    //     die("Error: " . $conn->error);
    // }
    // // Check the number of rows
    // $numRows = mysqli_num_rows($srchresult);
    // echo "Number of rows: $numRows";

    // if ($numRows > 0) {
    //     echo "number of rows>1";
    //     while ($row = mysqli_fetch_assoc($srchresult)) {
    //         if ($searchType == "vendor") {
    //             echo "Vendor Code: " . $row["vendor_code"] . "<br>";
    //         } elseif ($searchType == "employee") {
    //             echo "Employee Code: " . $row["employeeid"] . "<br>";
    //         }
    //         // Add more fields as needed
    //     }
    // } else {
    //     echo "No results found.";
    // }

}
