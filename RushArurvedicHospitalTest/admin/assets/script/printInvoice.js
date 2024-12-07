$(document).ready(function() {
    // Getstaff email from URL parameter
    var urlParams = new URLSearchParams(window.location.search);
    var invoiceId = urlParams.get('invoiceId');
    // Make AJAX request to get staff details
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/invoice/get-invoice-by-invoiceId?invoiceId=" + invoiceId,
        success: function(response) {

          $("#customerNamePrint").text(response.customerName);
          $("#contactNumberPrint").text("MOBILE : "+response.customerNumber);
          $("#addressPrint").text("ADDRESS : "+response.customerAddress);
          $("#serviceCategoryPrint").text("SERVICE TYPE : "+response.serviceCategory);
          $("#vehicleNumberPrint").text("VEHICLE NUMBER : "+response.vehicleNumber);
          $("#serviceChargePrint").text(response.fixedCharge + " /=");
          $("#additionalChargePrint").text(response.additionalCharge + " /=");
          $("#totalChargePrint").text(response.totalCharge + " /=");
          $("#vehicleNumberPrint").text("DATE : "+response.serviceDate);
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
});