// Function to handle click on approve-appointment button in the raw
$(document).on('click', '#reject', function() {
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
     $('#customersEmailToReject').val(customersEmail);
     $('#firstNameToReject').val(firstName);
     $('#contactNumberToReject').val(contactNumber);
     $('#addressToReject').val(address);
     $('#vehicleNumberToReject').val(vehicleNumber);
     $('#carBrandToReject').val(carBrand);
     $('#carModelToReject').val(carModel);
     $('#serviceCategoryToReject').val(serviceCategory);
     $('#serviceDateToReject').val(serviceDate);
     $('#requisitionDateToReject').val(requisitionDate);
     
    // Show the modal
    $('#rejectAppointmentModal').modal('show');
  });

  // Function to handle reject Appointment button click
  function rejectAppointment() {
    var customersEmail = $('#customersEmailToReject').val();
    var firstName = $('#firstNameToReject').val();
    var contactNumber = $('#contactNumberToReject').val();
    var address = $('#addressToReject').val();
    var vehicleNumber = $('#vehicleNumberToReject').val();
    var carBrand = $('#carBrandToReject').val();
    var carModel = $('#carModelToReject').val();
    var serviceCategory = $('#serviceCategoryToReject').val();
    var serviceDate = $('#serviceDateToReject').val();
    var requisitionDate = $('#requisitionDateToReject').val();

    var reason = $('#rejectedReason').val();
    

    $.ajax({
        method: "POST",
        contentType: "application/json",
        url: "http://localhost:8080/api/v1/rejectedAppointment/saveRejectedAppointment",
        async: true,
        data: JSON.stringify({
            "rejectedAppointmentId": 0,
            "customersEmail": customersEmail,
            "firstName": firstName,
            "contactNumber": contactNumber,
            "address": address,
            "vehicleNumber": vehicleNumber,
            "carBrand": carBrand,
            "carModel": carModel,
            "serviceCategory": serviceCategory,
            "serviceDate": serviceDate,
            "requisitionDate": requisitionDate,
            "rejectedReason": reason
        
        }),
        success: function (data) {
            console.log(data); // Log the response from the server
            // Handle the response as needed, e.g., show a success message
            sendEmailToCustomer(customersEmail, "Dear "+ firstName + ".Your car service job has been rejected.","Regarding The Car Service");
            alert("Rejected successfully!");
            deleteAppointment();
            fetchAllAppointments();
      
        },
        error: function (error) {
            console.error("Error Reject:", error);
            // Handle the error, show an error message, etc.
            alert("ErrorRejected. Please try again.");
     }
    });
    }

    function fetchAllRejectedAppointments() {
        $.ajax({
            method: "GET",
            url: "http://localhost:8080/api/v1/rejectedAppointment/getAllRejectedAppointment",
            success: function (data) {
                // Clear existing table rows
                $('#selectedBookEntryGrid tbody').empty();
                // Populate table with appointments data
                data.forEach(function (rejectAppointments, index) {
                   
                    $('#rejectAppointments').append(`
                        <tr>
                            <th scope="row">${index + 1}</th>
                            <td>${rejectAppointments.rejectedAppointmentId}</td>
                            <td>${rejectAppointments.customersEmail}</td>
                            <td>${rejectAppointments.firstName}</td>
                            <td>${rejectAppointments.contactNumber}</td>
                            <td>${rejectAppointments.address}</td>
                            <td>${rejectAppointments.vehicleNumber}</td>
                            <td>${rejectAppointments.carBrand}</td>
                            <td>${rejectAppointments.carModel}</td>
                            <td>${rejectAppointments.serviceCategory}</td>
                            <td>${rejectAppointments.serviceDate}</td>
                            <td>${rejectAppointments.requisitionDate}</td>
                            <td>${rejectAppointments.rejectedReason}</td>
                            <td>
                                <a href="#" class="delete-rejectAppointment">
                                    <i class="bx bx-trash text-danger fs-4"></i>
                                </a>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function (error) {
                console.error("Error fetching appointments:", error);
            }
        });
      }

       // Event listener for delete icon click
$(document).on('click', '.delete-rejectAppointment', function() {
    var rejectedAppointmentId = $(this).closest('tr').find('td:eq(0)').text(); // Extract serviceId from the row
    console.log(rejectedAppointmentId);
    if (confirm("Are you sure you want to delete this rejected appointment?")) {
        
        deleteRejectedAppointment(rejectedAppointmentId); 
    }
  });

  // Function to delete a reject appointment
  function deleteRejectedAppointment(rejectedAppointmentId) {
    $.ajax({
        method: "DELETE",
        url: "http://localhost:8080/api/v1/rejectedAppointment/deleteRejectedAppointment?rejectedAppointmentId=" + rejectedAppointmentId,
        success: function (response) {
            console.log(response); // Log the response for debugging
            fetchAllRejectedAppointments(); // Refresh the table after successful deletion
        },
        error: function (error) {
            console.error("Error deleting reject appointment:", error);
            // Handle error scenario
        }
    });
  }

  //jQuery script for filtering
  $(document).ready(function() {
    $("#emailInputRejected").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectedBookEntryGrid tbody tr").filter(function() {
            $(this).toggle($(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1);
        });
    });
});