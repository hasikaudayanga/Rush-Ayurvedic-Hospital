// Function to handle click on approve-appointment button in the raw
$(document).on('click', '#approve', function() {
    // Get approve Appointment data from the form
    var row = $(this).closest('tr');
    var receivedAppointmentId = row.find('td:nth-child(2)').text(); 
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
    

     // Store the ServiceId in a hidden field
     $('#receivedAppointmentIdToSave').val(receivedAppointmentId);
     $('#customersEmailToSave').val(customersEmail);
     $('#firstNameToSave').val(firstName);
     $('#contactNumberToSave').val(contactNumber);
     $('#addressToSave').val(address);
     $('#vehicleNumberToSave').val(vehicleNumber);
     $('#carBrandToSave').val(carBrand);
     $('#carModelToSave').val(carModel);
     $('#serviceCategoryToSave').val(serviceCategory);
     $('#serviceDateToSave').val(serviceDate);
     $('#requisitionDateToSave').val(requisitionDate);
     
    // Show the modal
    $('#approveAppointmentModal').modal('show');
  });



   // Function to handle approve Appointment button click
  function approveAppointment() {
        var customersEmail = $('#customersEmailToSave').val();
        var firstName = $('#firstNameToSave').val();
        var contactNumber = $('#contactNumberToSave').val();
        var address = $('#addressToSave').val();
        var vehicleNumber = $('#vehicleNumberToSave').val();
        var carBrand = $('#carBrandToSave').val();
        var carModel = $('#carModelToSave').val();
        var serviceCategory = $('#serviceCategoryToSave').val();
        var serviceDate = $('#serviceDateToSave').val();
        var requisitionDate = $('#requisitionDateToSave').val();
        var supervisorName = $('#assignedSupervisor').val();
        var helpersCount = $('#helpersCount').val();
        var startTime = $('#startTime').val();

    $.ajax({
        method: "POST",
        contentType: "application/json",
        url: "http://localhost:8080/api/v1/appointment/saveApprovedAppointment",
        async: true,
        data: JSON.stringify({
            "approvedAppointmentId": 0,
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
            "startTime": startTime
            
        }),
        success: function (data) {
            console.log(data); // Log the response from the server
            // Handle the response as needed, e.g., show a success message
            sendEmailToCustomer(customersEmail, "Dear "+ firstName +
             ".Your car service job has been approved.","Regarding The Car Service");
            alert("Approved successfully!");
            deleteAppointment();        
        },
        error: function (error) {
            console.error("Error Approve:", error);
            // Handle the error, show an error message, etc.
            alert("ErrorApprove. Please try again.");
        }
    });
  }


  // Function to delete  received appointment when approving
  function deleteAppointment() {
    var receivedAppointmentId = $('#receivedAppointmentIdToSave').val();
    $.ajax({
        method: "DELETE",
        url: "http://localhost:8080/api/v1/appointment/delete?receivedAppointmentId=" + receivedAppointmentId,
        success: function (response) {
            console.log(response); // Log the response for debugging
            fetchAllAppointments(); // Refresh the table after successful deletion
        },
        error: function (error) {
            console.error("Error deleting appointment:", error);
            // Handle error scenario
        }
    });
  }

  // Function to fetch and display all approved appoinments
function fetchAllApprovedAppointments() {
    $.ajax({
        method: "GET",
        url: "http://localhost/RushArurvedicHospital/api/approvedAppointments.php",
        success: function (data) {

            //console.log(data);
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with appointments data
            data.forEach(function (approvedAppointments, index) {
               
                $('#approvedAppointments').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${approvedAppointments.appoinment_id}</td>
                        <td>${approvedAppointments.email_address}</td>
                        <td>${approvedAppointments.p_name}</td>
                        <td>${approvedAppointments.contact_number}</td>
                        <td>${approvedAppointments.address}</td>
                        <td>${approvedAppointments.description}</td>
                        <td>${approvedAppointments.d_name}</td>
                        <td>${approvedAppointments.appoinment_date_time}</td>
                        <td>${approvedAppointments.status_id}</td>
                                    
                        <td><button id="complete" class="btn btn-success approve-btn" data-appointment-id="${approvedAppointments.approvedAppointmentId}">Complete</button></td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching approved appointments:", error);
        }
    });
  }

  //jQuery script for filtering
  $(document).ready(function() {
    $("#emailInputApproved").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectedBookEntryGrid tbody tr").filter(function() {
            $(this).toggle($(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1);
        });
    });
});