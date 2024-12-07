// Function to handle click on approve-appointment button in the raw
$(document).on('click', '#complete', function() {
    // Get approve Appointment data from the form
    var row = $(this).closest('tr');
    var approvedAppointmentId = row.find('td:nth-child(2)').text(); 
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
    

     // Store the ServiceId in a hidden field
     $('#approvedId').val(approvedAppointmentId);
     $('#approvedCustomersEmail').val(customersEmail);
     $('#approvedFirstName').val(firstName);
     $('#approvedContactNumber').val(contactNumber);
     $('#approvedAddress').val(address);
     $('#approvedVehicleNumber').val(vehicleNumber);
     $('#approvedCarBrand').val(carBrand);
     $('#approvedCarModel').val(carModel);
     $('#approvedServiceCategory').val(serviceCategory);
     $('#approvedServiceDate').val(serviceDate);
     $('#approvedRequisitionDate').val(requisitionDate);
     $('#approvedSupervisor').val(supervisedBy);
     $('#approvedHelpers').val(helpers);
     $('#approvedStartTime').val(startTime);
     
    // Show the modal
    $('#completeAppointmentModal').modal('show');
  });


  // Function to handle complete Appointment button click
  function completeAppointment() {
    var customersEmail = $('#approvedCustomersEmail').val();
    var firstName = $('#approvedFirstName').val();
    var contactNumber = $('#approvedContactNumber').val();
    var address = $('#approvedAddress').val();
    var vehicleNumber = $('#approvedVehicleNumber').val();
    var carBrand = $('#approvedCarBrand').val();
    var carModel = $('#approvedCarModel').val();
    var serviceCategory = $('#approvedServiceCategory').val();
    var serviceDate = $('#approvedServiceDate').val();
    var requisitionDate = $('#approvedRequisitionDate').val();
    var supervisorName = $('#approvedSupervisor').val();
    var helpersCount = $('#approvedHelpers').val();
    var startTime = $('#approvedStartTime').val();
    
    var completeTime = $('#completeTime').val();
    var remarks = $('#remarks').val();
   

$.ajax({
    method: "POST",
    contentType: "application/json",
    url: "http://localhost:8080/api/v1/appointment/saveCompleteAppointment",
    async: true,
    data: JSON.stringify({
        "completeAppointmentId": 0,
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
        "remarks": remarks
        
    }),
    success: function (data) {
        console.log(data); // Log the response from the server
        // Handle the response as needed, e.g., show a success message
        deleteApprovedAppointment();
        alert("Completed job successfully!");
       
      
    },
    error: function (error) {
        console.error("Error Approve:", error);
        // Handle the error, show an error message, etc.
        alert("Error complete. Please try again.");
    }
});
}

 // Function to delete  received appointment when approving
 function deleteApprovedAppointment() {
    var approvedAppointmentId = $('#approvedId').val();
    $.ajax({
        method: "DELETE",
        url: "http://localhost:8080/api/v1/appointment/deleteApprovedAppointment?approvedAppointmentId=" + approvedAppointmentId,
        success: function (response) {
            console.log(response); // Log the response for debugging
            fetchAllApprovedAppointments(); // Refresh the table after successful deletion
        },
        error: function (error) {
            console.error("Error deleting appointment:", error);
            // Handle error scenario
        }
    });
  }


  // Function to fetch and display all Completed appoinments
function fetchAllCompletedAppointments() {
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/appointment/getAllCompletedAppointment",
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with appointments data
            data.forEach(function (completedAppointment, index) {
               
                $('#completedAppointments').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${completedAppointment.completeAppointmentId}</td>
                        <td>${completedAppointment.customersEmail}</td>
                        <td>${completedAppointment.customerName}</td>
                        <td>${completedAppointment.customerNumber}</td>
                        <td>${completedAppointment.customerAddress}</td>
                        <td>${completedAppointment.vehicleNumber}</td>
                        <td>${completedAppointment.carBrand}</td>
                        <td>${completedAppointment.carModel}</td>
                        <td>${completedAppointment.serviceCategory}</td>
                        <td>${completedAppointment.serviceDate}</td>
                        <td>${completedAppointment.requisitionDate}</td>
                        <td>${completedAppointment.supervisorName}</td>
                        <td>${completedAppointment.helpersCount}</td>
                        <td>${completedAppointment.startTime}</td>
                        <td>${completedAppointment.completeTime}</td>
                        <td>${completedAppointment.remarks}</td>
                        <td><button id="reportMake" class="btn btn-success approve-btn" data-appointment-id="${completedAppointment.completeAppointmentId}">Invoice</button></td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching completed appointments:", error);
        }
    });
  }

  //jQuery script for filtering
  $(document).ready(function() {
    $("#emailInputCompleted").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectedBookEntryGrid tbody tr").filter(function() {
            $(this).toggle($(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1);
        });
    });
});