// supervisor's names download for approve appointment 
$(document).ready(function() {
    // Function to fetch supervisor's names data from backend
    function fetchSupervisorDetails() {
        $.ajax({
            url: "http://localhost:8080/api/v1/staff/getAllSupervisors", // Endpoint to fetch supervisor's names
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Clear previous options
                $('#assignedSupervisor').empty();
                // Add default option
                $('#assignedSupervisor').append($('<option>', {
                    value: "",
                    text: "Please choose Supervisor",
                    selected: true,
                    disabled: true
                }));
                // Add new options
                data.forEach(function(staff) {
                    $('#assignedSupervisor').append($('<option>', {
                        value: staff.firstName,
                        text: staff.firstName
                    }));
                });
            },
            error: function(xhr, status, error) {
                console.error("Failed to fetch supervisors: " + error);
            }
        });
    }
  
    // Fetch supervisors on page load
    fetchSupervisorDetails();
  });