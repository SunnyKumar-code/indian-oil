<?php
include("db/iocldb.php");

$apprentice_id = $_GET['vendor_code'];

// Get the selected month and year from the user (you can implement a form to input these values)
$selectedMonth = isset($_POST['month']) ? $_POST['month'] : date('m'); // Default to the current month if not specified
$selectedYear = isset($_POST['year']) ? $_POST['year'] : date('Y'); // Default to the current year if not specified

//fetch cl_balance
$cl_balance_query = "SELECT cl_balance FROM apprentice WHERE vendor_code = '$apprentice_id'";
$result_cl_balance = mysqli_query($conn, $cl_balance_query);
$row_cl_balance = $result_cl_balance->fetch_assoc();
$remaningcl = $row_cl_balance['cl_balance'];

//fetch gl_balance
$gl_balance_query = "SELECT gl_balance FROM apprentice WHERE vendor_code = '$apprentice_id'";
$result_gl_balance = mysqli_query($conn, $gl_balance_query);
$row_gl_balance = $result_gl_balance->fetch_assoc();
$remaninggl = $row_gl_balance['gl_balance'];
// Check if the "Show Attendance" button was clicked
if (isset($_POST['show_attendance'])) {
    // Fetch the total counts for "Present" and "Absent" without filtering
    $sql = "SELECT attendance_status, leave_type, COUNT(*) as count FROM attendance WHERE vendor_code = '$apprentice_id'
            AND MONTH(attendance_date) = '$selectedMonth' AND YEAR(attendance_date) = '$selectedYear'
            GROUP BY attendance_status, leave_type";
    $result = $conn->query($sql);



    // Initialize variables for counts
    $totalPresent = 0;
    $totalAbsent = 0;
    $totalcl = 0;
    $totalsl = 0;




    // Process the query results for total counts
    while ($row = $result->fetch_assoc()) {
        if ($row['attendance_status'] === 'Present') {
            $totalPresent = $row['count'];
        } elseif ($row['leave_type'] === 'Casual Leave') {
            $totalcl = $row['count'];
            $totalAbsent += $row['count'];
        } elseif ($row['leave_type'] === 'General Leave') {
            $totalsl = $row['count'];
            $totalAbsent += $row['count'];
        }
    }
}

// Check if the "Present" or "Absent" button was clicked
if (isset($_POST['filter'])) {
    $filter = $_POST['filter'];

    // Fetch the dates for the selected status from the database
    $sql = "SELECT attendance_date  FROM attendance WHERE vendor_code = '$apprentice_id'
            AND MONTH(attendance_date) = '$selectedMonth' AND YEAR(attendance_date) = '$selectedYear'
            AND attendance_status = '$filter'";
    $result = $conn->query($sql);

    // Initialize an array for dates
    $dates = [];

    // Process the query results for dates
    while ($row = $result->fetch_assoc()) {

        $dates[] = $row['attendance_date'];
    }
} else {
    $filter = ""; // Default to no filter
}
if (isset($_POST['filter_leave'])) {
    $filter = $_POST['filter_leave'];
    // Fetch the dates for the selected status from the database
    $sql = "SELECT attendance_date  FROM attendance WHERE vendor_code = '$apprentice_id'
            AND MONTH(attendance_date) = '$selectedMonth' AND YEAR(attendance_date) = '$selectedYear'
            AND  leave_type = '$filter'";
    $result = $conn->query($sql);
    // Initialize an array for dates
    $dates = [];

    // Process the query results for dates
    while ($row = $result->fetch_assoc()) {

        $dates[] = $row['attendance_date'];
    }
} else {
    $filter = ""; // Default to no filter
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apprentice Attendance Summary</title>

    <style>
        body {
            background-image: url("IMAGE/ATT.jpg");
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(5px);
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        label,
        select,
        input[type="submit"] {
            margin: 10px;
        }

        .cl{
            padding: 10px;
            width:26% ;
            border: 1px;
            color: #007BFF;
            font-weight: bold;
            transition: background-color 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .date-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .date-container h3 {
            color: #007BFF;
            margin-top: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 5px 0;
        }

        .table {
            margin: 20px auto;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .btn-green {
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-green:hover {
            background-color: #45a049;
        }

        /* Red button */
        .btn-red {
            padding: 10px;
            border: none;
            background-color: #FF5733;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-red:hover {
            background-color: #ff4d28;
        }

        .show {
            padding: 10px;
            /* text-shadow: -1px 1px 0 #000,
                          1px 1px 0 #000,
                         1px -1px 0 #000,
                        -1px -1px 0 #000; */
            border: none;
            background-color: #08c725;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .show:hover {
            background-color: #10980e;
        }

        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            h1 {
                font-size: 24px;
            }

            select,
            input[type="submit"] {
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Attendance Summary for
            <?php echo date('F Y', strtotime($selectedYear . '-' . $selectedMonth . '-01')); ?>
        </h2>

        <!-- Create a form to select the month and year -->
        <form method="post">
            <label for="month">Select Month:</label>
            <select name="month" id="month">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $month = date('F', mktime(0, 0, 0, $i, 1));
                    $selected = ($i == $selectedMonth) ? 'selected' : '';
                    echo "<option value='$i' $selected>$month</option>";
                }
                ?>
            </select>
            <label for="year">Select Year:</label>
            <select name="year" id="year">
                <?php
                $currentYear = date('Y');
                for ($i = $currentYear - 10; $i <= $currentYear; $i++) {
                    $selected = ($i == $selectedYear) ? 'selected' : '';
                    echo "<option value='$i' $selected>$i</option>";
                }
                ?>
            </select>
            <input class="show" type="submit" name="show_attendance" value="Show Attendance">
        </form>

        <!-- Add buttons to filter by "Present" and "Absent" -->
        <form method="post">
            <input type="hidden" name="month" value="<?php echo $selectedMonth; ?>">
            <input type="hidden" name="year" value="<?php echo $selectedYear; ?>">
            <input class="btn-green" type="submit" name="filter" value="Present">
            <input class="btn-red" type="submit" name="filter" value="Absent">
            <input class="btn-green" type="submit" name="filter_leave" value="Casual Leave">
            <input class="btn-red" type="submit" name="filter_leave" value="General Leave">


            <div><input class="cl" type="text" value="Remaining Casual leave: <?php echo $remaningcl ?>" readonly>
            <input class="cl" type="text" value="Remaining General leave: <?php echo $remaninggl ?>" readonly></div>
        </form>

    </div>
    <br>

    <div class="date-container">
        <!-- Display total counts or dates based on the selected filter or "Show Attendance" -->
        <?php if (isset($_POST['show_attendance'])) : ?>
            <table class="table">
                <tr>
                    <th>|Total Present|</th>
                    <th>|Total Absent|</th>
                    <th>|Casual leave (CL)|</th>
                    <th>|General leave (SL)|</th>


                </tr>
                <tr>
                    <td>
                        <?php echo $totalPresent; ?>
                    </td>
                    <td>
                        <?php echo $totalAbsent; ?>
                    </td>
                    <td>
                        <?php echo $totalcl; ?>
                    </td>
                    <td>
                        <?php echo $totalsl; ?>
                    </td>

                </tr>
                <br>
            </table>

        <?php elseif (isset($_POST['filter']) || isset($_POST['filter_leave'])) : ?>
            <h3>
                <?php echo $filter; ?> Dates:
            </h3>
            <?php if (!empty($dates)) : ?>
                <ul>
                    <?php foreach ($dates as $date) : ?>
                        <li>
                            <?php echo date('d-m-y', strtotime($date)); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>No
                    <?php echo $filter; ?> dates found.
                </p>
            <?php endif; ?>

    </div>
<?php endif; ?>

</body>

</html>