$(document).ready(function(){
    // Handle Add button click
    $('#btnAdd').click(function(){
        // Get form values
        var staffEmail = $('#email_address').val();
        var password = $('#password').val();
        var firstName = $('#first_name').val();
        var lastName = $('#last_name').val();
        var consultaionType = $('#consultation_id').val();
        var address = $('#address').val();
        var contactNumber = $('#contact_number').val();
        var jobRole = $('#job_description').val();
        var doctorCharge = $('#doctor_charge').val();
        var userName = $('#user_name').val();
        var activeStatus = true;
       
        
          $.ajax({
            method: "POST",
            contentType: "application/json",
            url: "http://localhost/RushArurvedicHospital/api/doctors.php",
            async: true,
            data: JSON.stringify({
                "email_address": staffEmail,
                "password": password,
                "first_name": firstName,
                "last_name": lastName,
                "address" : address,
                "contact_number": contactNumber,
                "job_description" : jobRole,
                "consultation_id" :consultaionType,
                "user_name" :userName,
                'doctor_charge' :doctorCharge
                
            }),
            success: function (data) {
                console.log(data); // Log the response from the server
                fetchAllDoctors();
                // Handle the response as needed, e.g., show a success message
                alert("Staff saved successfully!");
               
            },
            error: function (error) {
                console.error("Error saving staff:", error);
                // Handle the error, show an error message, etc.
                alert("Error saving staff. Please try again.");
            }
          });
        
        
    });

    // Handle Clear button click
    $(document).ready(function() {
        $('#btnClear').click(function() {
            // Clear input fields
            $('#memberForm input[type="text"], #memberForm input[type="password"], #memberForm input[type="email"], #memberForm input[type="file"], #memberForm select').val('');
        });
    });
});

  // Function to fetch and display all staffs
  function fetchAllDoctors() {
    $.ajax({
      method: "GET",
      url: "http://localhost/RushArurvedicHospital/api/doctors.php",
      dataType: "json",  // Ensure the response is parsed as JSON
      success: function (data) {
        console.log(data); 
          // Clear existing table rows
          $('#selectedBookEntryGrid tbody').empty();
  
          // Check if `data` is actually an array before calling forEach
          if (Array.isArray(data)) {
              data.forEach(function (staff, index) {
                  $('#registeredCustomers').append(`
                      <tr>
                          <th scope="row">${index + 1}</th>
                          <td>${staff.firstName}</td>
                          <td>${staff.lastName}</td>
                          <td>${staff.consultaionType}</td>
                          <td>${staff.jobRole}</td>
                          <td>${staff.address}</td>
                          <td>${staff.contactNumber}</td>
                          <td>${staff.staffEmail}</td>
                          <td>${staff.doctorCharge}</td>
                          <td>${staff.userName}</td>
                          <td>${staff.password}</td>
                          <td>
                              <a href="#" class="delete-staff">
                                  <i class="bx bx-trash text-danger fs-4"></i>
                              </a>
                              <a href="#" class="update-staff">
                                  <i class="bx bx-edit text-primary fs-4"></i>
                              </a>
                          </td>
                      </tr>
                  `);
              });
          } else {
              console.error("Expected an array but received:", data);
          }
      },
      error: function (error) {
          console.error("Error fetching staff:", error);
      }
  });
  }

   // Function to delete a staff
   function deleteStaff(staffEmail) {
    $.ajax({
        method: "DELETE",
        url: "http://localhost:8080/api/v1/staff/delete?staffEmail=" + staffEmail,
        success: function (response) {
            console.log(response); // Log the response for debugging
            fetchAllDoctors(); // Refresh the table after successful deletion
        },
        error: function (error) {
            console.error("Error deleting staff:", error);
            // Handle error scenario
        }
    });
  }

  // Event listener for delete icon click
$(document).on('click', '.delete-staff', function() {
    var staffEmail = $(this).closest('tr').find('td:eq(1)').text(); // Extract customer email from the row
    console.log(staffEmail);
    if (confirm("Are you sure you want to delete this staff?")) {
        deleteStaff(staffEmail); // Call deleteCustomer function with the extracted email
    }
  });

  // Function to handle click on update-staff link
$(document).on('click', '.update-staff', function() {
    // Get the staff data from the row
    var row = $(this).closest('tr');
    var staffEmail = row.find('td:nth-child(3)').text(); // Assuming staff email is in the second column
    console.log(staffEmail);
    // Populate the modal with existing staff data
    $('#updateStaffFirstName').val(row.find('td:nth-child(5)').text()); // Assuming first name is in the fourth column
    // Populate other fields as needed
    $('#updateStaffLastName').val(row.find('td:nth-child(6)').text());
    $('#updateStaffAddress').val(row.find('td:nth-child(7)').text());
    $('#updateStaffContactNumber').val(row.find('td:nth-child(8)').text());
    // Store the customer email in a hidden field
    $('#staffEmailToUpdate').val(staffEmail);
  
    // Show the modal
    $('#updateStaffModal').modal('show');
  });

  // Function to handle update staff button click
function updateStaff() {
    // Get updated staff data from the form
    var updatedFirstName = $('#updateStaffFirstName').val();
    var updateLastName = $('#updateStaffLastName').val();
    var updateAddress = $('#updateStaffAddress').val();
    var updateContactNumber = $('#updateStaffContactNumber').val();
    // Get customer email
    var staffEmail = $('#staffEmailToUpdate').val();
  
    // Perform AJAX request to update staff data
    $.ajax({
      method: "PUT", // Use PUT method as defined in your backend controller
      url: "http://localhost:8080/api/v1/staff/update", // Update URL to match your backend endpoint
      contentType: "application/json", // Set content type to JSON
      data: JSON.stringify({
        staffEmail: staffEmail,
        firstName: updatedFirstName,
        lastName: updateLastName,
        address: updateAddress,
        contactNumber: updateContactNumber
        // Include other fields to update as needed
      }),
      success: function(response) {
        // Handle success response
        // Close the modal
        $('#updateStaffModal').modal('hide');
        // Optionally, refresh the table or display a success message
        alert("staff Update Successfully");
        fetchAllDoctors(); // Refresh table
      },
      error: function(error) {
        // Handle error response
        console.error("Error updating staff:", error);
        alert("error");
      }
    });
  }