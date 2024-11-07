var calendarVisible = false;
var calendarContainer;

$(document).ready(function() {
  $('.status').on('click', function() {
    var vendorCode = $(this).data('vendor-code');
    var currentStatus = $(this).text();

    var newStatus;
    switch (currentStatus) {
      case 'Active':
        newStatus = 'Inactive';
        break;
      case 'Inactive':
        newStatus = 'Withdrawn';
        break;
      case 'Withdrawn':
        newStatus = 'Active';
        break;
    }

    // Update UI
    $(this).text(newStatus);

    // Send AJAX request to update status in the database
    $.ajax({
      url: 'update_status.php',
      type: 'POST',
      data: {
        vendor_code: vendorCode,
        status: newStatus
      },
      success: function(response) {
        // Handle success response (if needed)
      },
      error: function(error) {
        // Handle error (if needed)
      }
    });
  });
});


function toggleAttendanceCalendar() {
  if (calendarVisible) {
    hideAttendanceOptions();
  } else {
    showAttendanceCalendar();
  }
}

function showAttendanceCalendar() {
  if (!calendarVisible) {
    // Create a container element for the calendar
    calendarContainer = document.createElement('div');
    calendarContainer.id = 'attendanceCalendar';

    // Append the container to the document body
    document.body.appendChild(calendarContainer);

    // Initialize the jQuery UI datepicker
    $(calendarContainer).datepicker({
      onSelect: function(dateText) {
        // Get the selected date
        var selectedDate = new Date(dateText);

        // Format the date as desired
        var formattedDate = selectedDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

        // Show the attendance options
        showAttendanceOptions(formattedDate);
      }
    });

    calendarVisible = true;
  }
}

function hideAttendanceOptions() {
  // Remove the options container from the document body
  var optionsContainer = document.getElementById('attendanceOptions');
  if (optionsContainer) {
    document.body.removeChild(optionsContainer);
  }
}var calendarVisible = false;


function showAttendanceOptions(date) {
  // Remove any existing attendance options
  hideAttendanceOptions();

  // Create a container element for the attendance options
  var optionsContainer = document.createElement('div');
  optionsContainer.id = 'attendanceOptions';

  // Create the "Present" button
  var presentButton = document.createElement('button');
  presentButton.innerText = 'Present';
  presentButton.className = 'attendance-button present-button';
  presentButton.onclick = function() {
    markAttendance(date, 'present');
  };

  // Create the "Absent" button
  var absentButton = document.createElement('button');
  absentButton.innerText = 'Absent';
  absentButton.className = 'attendance-button absent-button';
  absentButton.onclick = function() {
    markAttendance(date, 'absent');
  };

  // Append the buttons to the options container
  optionsContainer.appendChild(presentButton);
  optionsContainer.appendChild(absentButton);

  // Append the options container to the document body
  document.body.appendChild(optionsContainer);
}

function markAttendance(date, status) {
    function markAttendance(date, status) {
        // Update the date color based on the attendance status
        var dateElement = document.querySelector('.ui-datepicker-calendar a[data-date="' + date + '"]');
        
        if (status === 'present') {
          dateElement.style.backgroundColor = 'green';
          dateElement.style.color = 'white';
        } else if (status === 'absent') {
          dateElement.style.backgroundColor = 'red';
          dateElement.style.color = 'white';
        } else {
          // Reset the date color to the default
          dateElement.style.backgroundColor = '';
          dateElement.style.color = '';
        }
    }var calendarVisible = false;
    var calendarContainer;
    
    function toggleAttendanceCalendar() {
      if (calendarVisible) {
        hideAttendanceCalendar();
      } else {
        showAttendanceCalendar();
      }
    }
    
    function showAttendanceCalendar() {
      if (!calendarVisible) {
        // Create a container element for the calendar
        calendarContainer = document.createElement('div');
        calendarContainer.id = 'attendanceCalendar';
    
        // Append the container to the document body
        document.body.appendChild(calendarContainer);
    
        // Initialize the jQuery UI datepicker
        $(calendarContainer).datepicker({
          onSelect: function(dateText) {
            // Get the selected date
            var selectedDate = new Date(dateText);
    
            // Format the date as desired
            var formattedDate = selectedDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
    
            // Set the selected date as the value of the input field or do something with it
            document.getElementById('selectedDate').value = formattedDate;
    
            // Get the attendance status from the user (e.g., using prompt or a dropdown)
            var attendanceStatus = prompt('Enter attendance status (present/absent):');
            markAttendance(formattedDate, attendanceStatus);
    
            // Hide the attendance calendar
            // hideAttendanceCalendar();
          }
        });
    
        calendarVisible = true;
      }
    }
    
    function hideAttendanceCalendar() {
      if (calendarVisible) {
        // Remove the calendar container from the document body
        document.body.removeChild(calendarContainer);
    
        calendarVisible = false;
      }
    }
    
    function markAttendance(date, status) {
      // Update the date color based on the attendance status
      var dateElement = document.querySelector('.ui-datepicker-calendar a[data-date="' + date + '"]');
    
      if (status === 'present') {
        dateElement.classList.remove('absent');
        dateElement.classList.add('present');
      } else if (status === 'absent') {
        dateElement.classList.remove('present');
        dateElement.classList.add('absent');
      } else {
        dateElement.classList.remove('present', 'absent');
      }
    }
    
}
