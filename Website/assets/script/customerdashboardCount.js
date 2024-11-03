$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/dashboard/getCountOfReceivedAppointmentsByCustomer?customerEmail=" + customerEmail,
        success: function(response) {

          $("#pendingAppointmentsCount").text(response);
          
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});

$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/dashboard/getCountOfApprovedAppointmentsByCustomer?customerEmail=" + customerEmail,
        success: function(response) {

          $("#customerApprovedAppointmentsCount").text(response);
          
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});

$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/dashboard/getCountOfCompletedAppointmentsByCustomer?customerEmail=" + customerEmail,
        success: function(response) {

          $("#customerCompletedAppointmentsCount").text(response);
          
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});