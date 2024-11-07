<?php
session_start();
include("db/iocldb.php");
include("count.php");
include("search.php");

if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
    exit();
}


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="styles.css"> <!-- Add this line to include the new CSS file -->
    <title>Admin Page</title>
</head>

<body>
    <nav>
        <a href="#"><i class="fas fa-home"></i></a>
        <a href="admindata.php?username=<?php echo $_SESSION['username']; ?>" <i class="fas fa-chart-bar"></i></a>
        <a href="adminedit.php?username=<?php echo $_SESSION['username']; ?>"><i class="fas fa-cog"></i></a>
        <a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i></a>
    </nav>
    ?>
    <div class="content-container">
        <div class="search-container">
            <form method="POST">
                <label for="searchType">Search Type:</label>
                <select id="searchType" name="searchType">
                    <option value="vendor">Vendor Code</option>
                    <option value="employee">Employee Code</option>
                </select>
                <input type="text" id="searchInput" name="searchInput" placeholder="Enter code...">
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Display the counts in the top right corner -->
        <!-- Display the counts in separate boxes -->
        <div id="apprenticeContainer" class="counts-box">
            <?php echo "Apprentice Count: " . $recordCountApprentice; ?>
        </div>

        <div id="employeeContainer" class="counts-box">
            <?php echo "Employee Count: " . $recordCountEmployee; ?>
        </div>
        <div id="resultContainer">
            <!-- Your search results go here -->
            <?php
            if ($searchType == "vendor" && isset($srchrow['vendor_code'])) {
                echo "<table class='search-results'>
                <tr>
                    <th>Vendor Code</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Info</th>
                </tr>
                <tr>
                    <td>" . $srchrow['vendor_code'] . "</td>
                    <td>" . $srchrow['Name'] . "</td>
                    <td>" . $srchrow['Status'] . "</td>

                    <td><a href='Employee/update_apprentice.php?vendor_code=" . $srchrow['vendor_code'] . "' class='edit-button'>Edit</a></td>
                </tr>
              </table>";
            } elseif ($searchType == "employee" && isset($srchrow['employeeid'])) {
                echo "<table class='search-results'>
                <tr>
                    <th>Employee Code</th>
                    <th>Name</th>
                    <th>Info</th>
                </tr>
                <tr>
                    <td>" . $srchrow['employeeid'] . "</td>
                    <td>" . $srchrow['fullname'] . "</td>
                    <td><a href='empedit.php?employeeid=" . $srchrow['employeeid'] . "' class='edit-button'>Edit</a></td>
                   
    
      
                </tr>
              </table>";
            } else {
                echo "No results found.";
            }
            ?>
        </div>

    </div>


    </div>

    <script src="admin.js"></script>
</body>

</html>