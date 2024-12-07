$(document).ready(function(){
    // Handle Add button click
    $('#btnAddStaff').click(function(){
        // Get form values
        var staffEmail = $('#staffEmail').val();
        var password = $('#staffPassword').val();
        var firstName = $('#staffFirstName').val();
        var lastName = $('#staffLastName').val();
        var address = $('#staffAddress').val();
        var contactNumber = $('#staffContactNumber').val();
        var jobRole = $('#jobRole').val();
        var activeStatus = true;
       
        if(password == "" || firstName=="" || lastName=="" || address=="" || contactNumber=="" || jobRole==""){
          alert("Please Fill All Inputs");
        }else{
          $.ajax({
            method: "POST",
            contentType: "application/json",
            url: "http://localhost:8080/api/v1/staff/save",
            async: true,
            data: JSON.stringify({
                "staffEmail": staffEmail,
                "password": password,
                "firstName": firstName,
                "lastName": lastName,
                "address" : address,
                "contactNumber": contactNumber,
                "jobRole" : jobRole,
                "activeStatus" :activeStatus
                
            }),
            success: function (data) {
                staffMemberPictureSave(staffEmail);
                console.log(data); // Log the response from the server
                fetchAllStaffs();
                // Handle the response as needed, e.g., show a success message
                alert("Staff saved successfully!");
               
            },
            error: function (error) {
                console.error("Error saving staff:", error);
                // Handle the error, show an error message, etc.
                alert("Error saving staff. Please try again.");
            }
          });
        }
        
    });

    // Handle Clear button click
    $(document).ready(function() {
        $('#btnClearStaff').click(function() {
            // Clear input fields
            $('#memberForm input[type="text"], #memberForm input[type="password"], #memberForm input[type="email"], #memberForm input[type="file"], #memberForm select').val('');
        });
    });
});

//staff profile photo save function
function staffMemberPictureSave(staffEmail){
  var formData = new FormData();
  formData.append('image', $('#staffMemberImage')[0].files[0]);
  formData.append('staffEmail',staffEmail); // Add customer email to formData

  $.ajax({
      type: 'POST',
      url: 'http://localhost:8080/api/v1/staff/uploadImage', // Change the URL to match your backend endpoint
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log("picture uploaded");
      },
      error: function (xhr, status, error) {
          console.error(xhr.responseText);
      }
  });
}


  // Function to fetch and display all staffs
  function fetchAllStaffs() {
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/staff/getAllStaff",
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with staff data
            data.forEach(function (staff, index) {
                // Call the downloadStaffImage function to get staff picture
                  downloadStaffImage(staff.staffEmail,index);
                $('#registeredStaff').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td><img src="" id="staffImage_${index}" width="40" height="40" style="border-radius: 50%;" alt="Staff Image"></td>
                        <td>${staff.staffEmail}</td>
                        <td>${staff.password}</td>
                        <td>${staff.firstName}</td>
                        <td>${staff.lastName}</td>
                        <td>${staff.address}</td>
                        <td>${staff.contactNumber}</td>
                        <td>${staff.jobRole}</td>
                        <td>${staff.activeStatus}</td>
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
        },
        error: function (error) {
            console.error("Error fetching staffs:", error);
        }
    });
  }

  // Funtion to download customer images for registered customers table
  function downloadStaffImage(staffEmail, index){
    $.ajax({
      type: 'GET',
      url: 'http://localhost:8080/api/v1/staff/download?staffEmail=' + staffEmail, // Change the URL to match your backend endpoint
      xhrFields: {
          responseType: 'blob'
      },
      success: function (response) {
        var imageUrl = URL.createObjectURL(response);
        $('#staffImage_' + index).attr('src', imageUrl);
      },
      error: function (xhr, status, error) {
          console.error(xhr.responseText);
          
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
            fetchAllStaffs(); // Refresh the table after successful deletion
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
        fetchAllStaffs(); // Refresh table
      },
      error: function(error) {
        // Handle error response
        console.error("Error updating staff:", error);
        alert("error");
      }
    });
  }