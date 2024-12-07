// Function to handle click on approve-appointment button in the raw
$(document).on('click', '#reportMake', function() {
    // Get approve Appointment data from the form
    var row = $(this).closest('tr');
    var completedAppointmentId = row.find('td:nth-child(2)').text(); 
    var customersEmail = row.find('td:nth-child(3)').text(); 
    var firstName = row.find('td:nth-child(4)').text(); 
    var contactNumber = row.find('td:nth-child(5)').text(); 
    var address = row.find('td:nth-child(6)').text(); 
    var vehicleNumber = row.find('td:nth-child(7)').text(); 
    var carBrand = row.find('td:nth-child(8)').text();
    var carModel = row.find('td:nth-child(9)').text();  
    var serviceCategory = row.find('td:nth-child(10)').text(); 
    var serviceDate = row.find('td:nth-child(11)').text(); 
    var requisitionDate = row.find('td:nth-child(12)').text(); 
    var supervisedBy = row.find('td:nth-child(13)').text();
    var helpers = row.find('td:nth-child(14)').text(); 
    var startTime = row.find('td:nth-child(15)').text(); 
    var completeTime = row.find('td:nth-child(16)').text(); 
    var remarks = row.find('td:nth-child(17)').text();  
    

     // Store the ServiceId in a hidden field
     $('#completedId').val(completedAppointmentId);
     $('#completedCustomersEmail').val(customersEmail);
     $('#completedFirstName').val(firstName);
     $('#completedContactNumber').val(contactNumber);
     $('#completedAddress').val(address);
     $('#completedVehicleNumber').val(vehicleNumber);
     $('#completedCarBrand').val(carBrand);
     $('#completedCarModel').val(carModel);
     $('#completedServiceCategory').val(serviceCategory);
     $('#completedServiceDate').val(serviceDate);
     $('#completedRequisitionDate').val(requisitionDate);
     $('#completedSupervisor').val(supervisedBy);
     $('#completedHelpers').val(helpers);
     $('#completedStartTime').val(startTime);
     $('#completedCompleteTime').val(completeTime);
     $('#completedremarks').val(remarks);
     
    // Show the modal
    $('#invoiceAppointmentModal').modal('show');
  });

  
  // Function to handle make invoice button click
  function makeInvoiceAndReport() {
    var customersEmail = $('#completedCustomersEmail').val();
    var firstName = $('#completedFirstName').val();
    var contactNumber = $('#completedContactNumber').val();
    var address = $('#completedAddress').val();
    var vehicleNumber = $('#completedVehicleNumber').val();
    var carBrand = $('#completedCarBrand').val();
    var carModel = $('#completedCarModel').val();
    var serviceCategory = $('#completedServiceCategory').val();
    var serviceDate = $('#completedServiceDate').val();
    var requisitionDate = $('#completedRequisitionDate').val();
    var supervisorName = $('#completedSupervisor').val();
    var helpersCount = $('#completedHelpers').val();
    var startTime = $('#completedStartTime').val();
    var completeTime = $('#completedCompleteTime').val();
    var remarks = $('#completedremarks').val();

    var fixedCharge = parseFloat($('#fixedCharge').val());
    var additionalCharge = parseFloat($('#additionalCharge').val());
    var totalCharge = fixedCharge + additionalCharge;
   

$.ajax({
    method: "POST",
    contentType: "application/json",
    url: "http://localhost:8080/api/v1/report/save",
    async: true,
    data: JSON.stringify({
        "reportId": 0,
        "customersEmail": customersEmail,
        "customerName": firstName,
        "customerNumber": contactNumber,
        "customerAddress": address,
        "vehicleNumber": vehicleNumber,
        "carBrand": carBrand,
        "carModel": carModel,
        "serviceCategory": serviceCategory,
        "serviceDate": serviceDate,
        "requisitionDate": requisitionDate,
        "supervisorName": supervisorName,
        "helpersCount": helpersCount,
        "startTime": startTime,
        "completeTime": completeTime,
        "remarks": remarks,
        "fixedCharge": fixedCharge,
        "additionalCharge": additionalCharge,
        "totalCharge": totalCharge
        
        
    }),
    success: function (data) {
        console.log(data); // Log the response from the server
        // Handle the response as needed, e.g., show a success message
        sendDataToInvoice();
        deleteCompletedAppointment();
        sendEmailToCustomer(customersEmail, "Dear "+ firstName + ".Your car service job has been completed.","Regarding The Car Service");
        alert(" successfully!");   
        $('#invoiceAppointmentModal').modal('hide');  
    },
    error: function (error) {
        console.error("Error Approve:", error);
        // Handle the error, show an error message, etc.
        alert("Error invoice. Please try again.");
    }
});
}

 // Function to delete  completed appointment when invoicing
 function deleteCompletedAppointment() {
    var completedAppointmentId = $('#completedId').val();
    $.ajax({
        method: "DELETE",
        url: "http://localhost:8080/api/v1/appointment/deleteCompletedAppointment?completedAppointmentId=" + completedAppointmentId,
        success: function (response) {
            console.log(response); // Log the response for debugging
            fetchAllCompletedAppointments(); // Refresh the table after successful deletion
        },
        error: function (error) {
            console.error("Error deleting appointment:", error);
            // Handle error scenario
        }
    });
  }

  // Function to fetch and display report
function fetchReport() {
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/report/getReport",
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with report data
            data.forEach(function (report, index) {
               
                $('#report').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${report.reportId}</td>
                        <td>${report.customersEmail}</td>
                        <td>${report.customerName}</td>
                        <td>${report.customerNumber}</td>
                        <td>${report.customerAddress}</td>
                        <td>${report.vehicleNumber}</td>
                        <td>${report.carBrand}</td>
                        <td>${report.carModel}</td>
                        <td>${report.serviceCategory}</td>
                        <td>${report.serviceDate}</td>
                        <td>${report.requisitionDate}</td>
                        <td>${report.supervisorName}</td>
                        <td>${report.helpersCount}</td>
                        <td>${report.startTime}</td>
                        <td>${report.completeTime}</td>
                        <td>${report.remarks}</td>
                        <td>${report.fixedCharge}</td>
                        <td>${report.additionalCharge}</td>
                        <td>${report.totalCharge}</td>
                        <td>
                            <a href="#" id="delete-report">
                                <i class="bx bx-trash text-danger fs-4"></i>
                            </a>
                        </td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching report:", error);
        }
    });
  }

   // Event listener for delete icon click
$(document).on('click', '#delete-report', function() {
    var reportId = $(this).closest('tr').find('td:eq(0)').text(); // Extract serviceId from the row
    console.log(reportId);
    if (confirm("Are you sure you want to delete this report?")) {
        
        deleteReport(reportId); // Call deleteAppointment() function with the extracted email
    }
  });

  // Function to delete a report
  function deleteReport(reportId) {
    $.ajax({
        method: "DELETE",
        url: "http://localhost:8080/api/v1/report/deleteReport?reportId=" + reportId,
        success: function (response) {
            console.log(response); // Log the response for debugging
            fetchReport(); // Refresh the table after successful deletion
        },
        error: function (error) {
            console.error("Error deleting deleteReport:", error);
            // Handle error scenario
        }
    });
  }

  

   // Function to handle send Email to customer
   function sendEmailToCustomer(customersEmail,message,subject) {
    var customersEmail = customersEmail;
    var message = message;
    var subject = subject;

        $.ajax({
            method: "POST",
            contentType: "application/json",
            url: "http://localhost:8080/api/v1/email/save",
            async: true,
            data: JSON.stringify({
      
                "toMail": customersEmail,
                "message": message,
                "subject": subject  
        
            }),
            success: function (data) {
               
            },
            error: function (error) {
                
            }
        });
        }

        //jQuery script for filtering
  $(document).ready(function() {
    $("#emailInputReport").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectedBookEntryGrid tbody tr").filter(function() {
            $(this).toggle($(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1);
        });
    });
});