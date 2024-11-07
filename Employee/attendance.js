
function toggleLeaveTypeDropdown() {
    const attendanceStatus = document.getElementById("attendance_status").value;
    const leaveTypeContainer = document.getElementById("leave_type_container");

    if (attendanceStatus === "Absent") {
        leaveTypeContainer.style.display = "block";
    } else {
        leaveTypeContainer.style.display = "none";
    }
}

function generateCalendar() {
    console.log("generateCalendar() called");
    const month = document.getElementById("month").value;
    const year = document.getElementById("year").value;
    const calendarContainer = document.getElementById("calendar-container");
    console.log(`Month: ${month}, Year: ${year}`);

    // Clear the previous calendar
    calendarContainer.innerHTML = "";



    let daysInMonth;

    if (month == 1) {
        // February: Check if it's a leap year (29 days) or not (28 days)
        if ((year % 4 == 0 && year % 100 != 0) || (year % 400 == 0)) {
            daysInMonth = 29;
        } else {
            daysInMonth = 28;
        }
    } else {
        daysInMonth = new Date(year, parseInt(month) + 1, 0).getDate();


    }


    const firstDay = new Date(year, month, 1).getDay();
    let date = 1;

    const dateGrid = document.createElement("div");
    dateGrid.className = "date-grid";

    for (let i = 0; i < 6; i++) {
        for (let j = 0; j < 7; j++) {
            const dateLabel = document.createElement("label");
            dateLabel.className = "date-label";

            if (i === 0 && j < firstDay) {
                // Empty cells before the first day of the month
                dateLabel.textContent = "";
                dateLabel.className += " empty-cell";
            } else if (date <= daysInMonth) {
                dateLabel.textContent = date;
                dateLabel.setAttribute("data-date", date);
                date++;

                const dayOfWeek = new Date(year, month, date - 1).getDay();
                if (dayOfWeek !== 0 && dayOfWeek !== 6) {
                    const checkbox = document.createElement("input");
                    checkbox.type = "checkbox";
                    checkbox.name = "selected_dates[]"; // Make sure it's an array
                    checkbox.value = `${year}-${parseInt(month) + 1}-${dateLabel.textContent}`;
                    dateLabel.appendChild(checkbox);
                    console.log(`Checkbox value: ${checkbox.value}`);
                } else {
                    dateLabel.classList.add("weekend"); // Add class for styling
                }
            } else {
                // Remove any additional cells after the last day of the month
                dateLabel.textContent = "";
                dateLabel.className += " empty-cell";
            }

            dateGrid.appendChild(dateLabel);
        }
    }

    calendarContainer.appendChild(dateGrid);
}
