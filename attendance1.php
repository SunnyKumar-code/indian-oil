    <!-- atendance.php -->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Attendance</title>


        <link rel="stylesheet" type="text/css" href="attendance.css">
    </head>

    <body>
        <h2>Mark Attendance for a Whole Month</h2>
        <div class="calendar-controls-container">
            <div class="calendar-controls">
                <label for="month">Select Month:</label>
                <select id="month">
                    <option value="0">January</option>
                    <option value="1">February</option>
                    <option value="2">March</option>
                    <option value="3">April</option>
                    <option value="4">May</option>
                    <option value="5">June</option>
                    <option value="6">July</option>
                    <option value="7">August</option>
                    <option value="8">September</option>
                    <option value="9">October</option>
                    <option value="10">November</option>
                    <option value="11">Decender</option>
                </select>
                <label for="year">Select Year:</label>
                <input type="number" id='year' name="attendance_year" min="2015" max="2060" required>

                <button onclick="generateCalendar()">Generate Calendar</button>
            </div>
        </div>


        <form method="post" action="process_attendance.php">
            <!-- Include a hidden input field for the apprentice's vendor_code -->

            <input type="hidden" name="vendor_code" value="<?php echo $_GET['vendor_code']; ?>">


            <label>Attendance Status:</label>
            <select name="attendance_status" id="attendance_status" required onchange="toggleLeaveTypeDropdown()">
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
            </select><br><br>
            <div id="leave_type_container" style="display:none;">
                <label for="leave_type">Leave Type:</label>
                <select name="leave_type" id="leave_type">
                    <option value="Sick Leave">General Leave</option>
                    <option value="Casual Leave">Casual Leave</option>
                    <option value="Unauthorized Leave">Unauthorized Leave</option>
                    <!-- Add more options as needed -->
                </select><br><br>
            </div>
            <label>Select Dates:</label><br>
            <!-- Calendar container to hold the generated calendar -->
            <div class="day-labels">
                <div class="day-label">Sun</div>
                <div class="day-label">Mon</div>
                <div class="day-label">Tue</div>
                <div class="day-label">Wed</div>
                <div class="day-label">Thu</div>
                <div class="day-label">Fri</div>
                <div class="day-label">Sat</div>
            </div>
            <div id="calendar-container">
                <!-- Calendar will be generated here -->
            </div>

            <!-- Add a button to trigger the action -->
            <input type="submit" name="mark_selected_dates" value="Mark Selected Dates">
        </form>



        <script src="attendance.js"></script>
    </body>

    </html>