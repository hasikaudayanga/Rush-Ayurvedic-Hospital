//create new appointment----------------------------------------

$(document).ready(function(){
    // Handle Add button click
    $('#btnAddAppointment').click(function(){
        // Get form values
        var urlParams = new URLSearchParams(window.location.search);
        var customerEmail = urlParams.get('customerEmail');
        var vehicleNumber = $('#vehicleNumber').val();
        var carBrand = $('#carBrand').val();
        var carModel = $('#carModel').val();
        var serviceCategory = $('#serviceCategory').val();
        var serviceDate = $('#serviceDate').val();
        var requisitionDate = new Date();
        
        if(vehicleNumber == "" || carBrand=="" || carModel=="" || serviceCategory=="" || serviceDate=="" ){
            alert("Please Give All The Inputs");
        }else{
            $.ajax({
                type: "GET",
                url: "http://localhost:8080/api/v1/customer/get-customer-by-email?customerEmail=" + customerEmail,
                success: function(response) {
                 
            
                  $.ajax({
                    method: "POST",
                    contentType: "application/json",
                    url: "http://localhost:8080/api/v1/appointment/save",
                    async: true,
                    data: JSON.stringify({
                        "receivedAppointmentId": 0,
                        "customersEmail": customerEmail,
                        "firstName": firstName,
                        "contactNumber": contactNumber,
                        "address": address,
                        "vehicleNumber": vehicleNumber,
                        "carBrand": carBrand,
                        "carModel": carModel,
                        "serviceCategory": serviceCategory,
                        "serviceDate": serviceDate,
                        "requisitionDate": requisitionDate
                        
                    }),
                    success: function (data) {
                        console.log(data); // Log the response from the server
                        fetchAllAppointments();
                        alert("Appointment saved successfully!");
                    },
                    error: function (error) {
                        console.error("Error saving appointment:", error);
                        // Handle the error, show an error message, etc.
                        alert("Error saving appointment. Please try again.");
                    }
                  });
    
                },
                error: function(xhr, status, error) {
                    alert("Error: " + xhr.responseText);
                }
            });
        }
        

        
    });

    // Handle Clear button click
    $('#btnClearAppointment').click(function(){
        // Clear all form fields
        $('form')[0].reset();
    });
});


// Function to fetch and display all pending appoinments
function fetchAllAppointments() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/appointment/get-appointment-by-customer-email?customerEmail=" + customerEmail,
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with appointments data
            data.forEach(function (appointments, index) {
               
                $('#pendingAppointments').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${appointments.receivedAppointmentId}</td>
                        <td>${appointments.customersEmail}</td>
                        <td>${appointments.firstName}</td>
                        <td>${appointments.contactNumber}</td>
                        <td>${appointments.address}</td>
                        <td>${appointments.vehicleNumber}</td>
                        <td>${appointments.carBrand}</td>
                        <td>${appointments.carModel}</td>
                        <td>${appointments.serviceCategory}</td>
                        <td>${appointments.serviceDate}</td>
                        <td>${appointments.requisitionDate}</td>
                        <td>
                            <a href="#" class="delete-appointment">
                                <i class="bx bx-trash text-danger fs-4"></i>
                            </a>
                            <a href="#" class="update-appointment">
                                <i class="bx bx-edit text-primary fs-4"></i>
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
$(document).on('click', '.delete-appointment', function() {
    var receivedAppointmentId = $(this).closest('tr').find('td:eq(0)').text(); // Extract serviceId from the row
    console.log(receivedAppointmentId);
    if (confirm("Are you sure you want to delete this appointment?")) {
        
        deleteAppointment(receivedAppointmentId); // Call deleteAppointment() function with the extracted email
    }
  });

  // Function to delete a appointment
  function deleteAppointment(receivedAppointmentId) {
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


  // Function to handle click on update-appointment link
$(document).on('click', '.update-appointment', function() {
    // Get the service data from the row
    var row = $(this).closest('tr');
    var receivedAppointmentId = row.find('td:nth-child(2)').text(); 
    // Populate the modal with existing service data
    $('#updateAppointmentVehicleNumber').val(row.find('td:nth-child(7)').text()); // Assuming title is in the fourth column
    // Populate other fields as needed
    $('#updateAppointmentCarBrand').val(row.find('td:nth-child(8)').text());
    $('#updateAppointmentCarModel').val(row.find('td:nth-child(9)').text());
    $('#updateAppointmentServiceCategory').val(row.find('td:nth-child(10)').text());
    $('#updateAppointmentServiceDate').val(row.find('td:nth-child(11)').text());
    // Store the ServiceId in a hidden field
    $('#receivedAppointmentIdToUpdate').val(receivedAppointmentId);
  
    // Show the modal
    $('#updateAppointmentModal').modal('show');
  });

  // Function to handle update Appointment button click
function updateAppointment() {
    // Get updated Appointment data from the form
    var updateVehicleNumber = $('#updateAppointmentVehicleNumber').val();
    var updateCarBrand = $('#updateAppointmentCarBrand').val();
    var updateCarModel = $('#updateAppointmentCarModel').val();
    var updateServiceCategory = $('#updateAppointmentServiceCategory').val();
    var updateServiceDate = $('#updateAppointmentServiceDate').val();
    // Get receivedAppointmentId
    var receivedAppointmentId = $('#receivedAppointmentIdToUpdate').val();
  
    // Perform AJAX request to update Appointment data
    $.ajax({
      method: "PUT", // Use PUT method as defined in your backend controller
      url: "http://localhost:8080/api/v1/appointment/update", // Update URL to match your backend endpoint
      contentType: "application/json", // Set content type to JSON
      data: JSON.stringify({
        receivedAppointmentId: receivedAppointmentId,
        vehicleNumber: updateVehicleNumber,
        carBrand: updateCarBrand,
        carModel: updateCarModel,
        serviceCategory: updateServiceCategory,
        serviceDate: updateServiceDate
        // Include other fields to update as needed
      }),
      success: function(response) {
        // Handle success response
        // Close the modal
        $('#updateAppointmentModal').modal('hide');
        // Optionally, refresh the table or display a success message
        alert("Appointment Update Successfully");
        fetchAllAppointments(); // Refresh table
      },
      error: function(error) {
        // Handle error response
        console.error("Error updating Appointment:", error);
        alert("error");
      }
    });
  }


  // Services category download

$(document).ready(function() {
    // Function to fetch service categories data from backend
    function fetchServiceCategories() {
        $.ajax({
            url: "http://localhost:8080/api/v1/services/getAllServices", // Endpoint to fetch service categories
            type: "GET",
            dataType: "json",
            success: function(data) {
                // Clear previous options
                $('#serviceCategory').empty();
                // Add default option
                $('#serviceCategory').append($('<option>', {
                    value: "",
                    text: "Please choose Service Category",
                    selected: true,
                    disabled: true
                }));
                // Add new options
                data.forEach(function(services) {
                    $('#serviceCategory').append($('<option>', {
                        value: services.serviceId,
                        text: services.title
                    }));
                });
                data.forEach(function(services) {
                  $('#updateAppointmentServiceCategory').append($('<option>', {
                      value: services.serviceId,
                      text: services.title
                  }));
              });
            },
            error: function(xhr, status, error) {
                console.error("Failed to fetch service categories: " + error);
            }
        });
    }
  
    // Fetch service categories on page load
    fetchServiceCategories();
  });