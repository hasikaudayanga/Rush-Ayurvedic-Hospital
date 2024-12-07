 //registered customer count download
 $(document).ready(function() {
    
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/dashboard/getCountOfRegisteredCustomers",
        success: function(response) {

          $("#customerCount").text(response);
          
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});

//Inquiries count download
$(document).ready(function() {
    
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/dashboard/getCountOfInquiries",
        success: function(response) {

          $("#inquiryCount").text(response);
          
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});

//Received Appointments count download
$(document).ready(function() {
    
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/dashboard/getCountOfReceivedAppointments",
        success: function(response) {

          $("#receivedAppointmentCount").text(response);
          
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});

//Approved Appointments count download
$(document).ready(function() {
    
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/dashboard/getCountOfApprovedAppointments",
        success: function(response) {

          $("#approvedAppointmentCount").text(response);
          
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});

//Completed Appointments count download
$(document).ready(function() {
    
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/dashboard/getCountOfCompletedAppointments",
        success: function(response) {

          $("#completedAppointmentCount").text(response);
          
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});

//Rejected Appointments count download
$(document).ready(function() {
    
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/dashboard/getCountOfRejectedAppointments",
        success: function(response) {

          $("#rejectedAppointmentCount").text(response);
          
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});
