function getStaffDetailsToUpdate() {
    var urlParams = new URLSearchParams(window.location.search);
    var staffEmail = urlParams.get('staffEmail');
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/staff/get-staff-by-email?staffEmail=" + staffEmail,
        success: function(response) {

          $("#editFirstName").val(response.firstName);
          $("#editLastName").val(response.lastName);
          $("#editAddress").val(response.address);
          $("#editContactNumber").val(response.contactNumber);
        
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
  }

  function updateStaffProfile() {
    // Get updated Appointment data from the form
    var urlParams = new URLSearchParams(window.location.search);
    var staffEmail = urlParams.get('staffEmail');
    var updateFirstName = $('#editFirstName').val();
    var updateLastName = $('#editLastName').val();
    var updateAddress = $('#editAddress').val();
    var updateContactNumber = $('#editContactNumber').val();
    
    // Perform AJAX request to update Appointment data
    $.ajax({
      method: "PUT", // Use PUT method as defined in your backend controller
      url: "http://localhost:8080/api/v1/staff/update", // Update URL to match your backend endpoint
      contentType: "application/json", // Set content type to JSON
      data: JSON.stringify({
        staffEmail: staffEmail,
        firstName: updateFirstName,
        lastName: updateLastName,
        address: updateAddress,
        contactNumber: updateContactNumber
        // Include other fields to update as needed
      }),
      success: function(response) {
        alert("Profile Update Successfully");
        
      },
      error: function(error) {
        // Handle error response
        console.error("Error updating profile:", error);
        alert("error");
      }
    });
  }