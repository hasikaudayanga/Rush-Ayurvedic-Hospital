function getCustomerDetailsToUpdate() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/customer/get-customer-by-email?customerEmail=" + customerEmail,
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

  function updateCustomerProfile() {
    // Get updated Appointment data from the form
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    var updateFirstName = $('#editFirstName').val();
    var updateLastName = $('#editLastName').val();
    var updateAddress = $('#editAddress').val();
    var updateContactNumber = $('#editContactNumber').val();
    
    // Perform AJAX request to update Appointment data
    $.ajax({
      method: "PUT", // Use PUT method as defined in your backend controller
      url: "http://localhost:8080/api/v1/customer/update", // Update URL to match your backend endpoint
      contentType: "application/json", // Set content type to JSON
      data: JSON.stringify({
        customerEmail: customerEmail,
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