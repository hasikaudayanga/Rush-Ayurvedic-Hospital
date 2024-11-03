function getCustomerPasswordToUpdate() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/customer/get-customer-by-email?customerEmail=" + customerEmail,
        success: function(response) {

          $("#passwordToUpdate").val(response.password);
        
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
  }

  function updateCustomerPassword() {
    // Get updated Appointment data from the form
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    var oldCorrectPassword = $('#passwordToUpdate').val();
    var oldEnteredPassword = $('#oldPassword').val();
    var newPassword1 = $('#newPassword1').val();
    var newPassword2 = $('#newPassword2').val();
    
    if(oldCorrectPassword == oldEnteredPassword && newPassword1 == newPassword2){
        $.ajax({
            method: "PUT", // Use PUT method as defined in your backend controller
            url: "http://localhost:8080/api/v1/customer/updatePassword", // Update URL to match your backend endpoint
            contentType: "application/json", // Set content type to JSON
            data: JSON.stringify({
              customerEmail: customerEmail,
              password: newPassword1
              // Include other fields to update as needed
            }),
            success: function(response) {
              alert("Password Update Successfully");
            },
            error: function(error) {
              // Handle error response
              console.error("Error updating password:", error);
              alert("error");
            }
          });
    }else if(oldCorrectPassword != oldEnteredPassword){
        alert("Old password incorrect");
    }else if(newPassword1 != newPassword2){
        alert("Please Enter same password for both new password input fields");
    }
     
  }