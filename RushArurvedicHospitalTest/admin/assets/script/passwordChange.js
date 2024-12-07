function getStaffPasswordToUpdate() {
    var urlParams = new URLSearchParams(window.location.search);
    var staffEmail = urlParams.get('staffEmail');
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/api/v1/staff/get-staff-by-email?staffEmail=" + staffEmail,
        success: function(response) {
            
          $("#staffPasswordToUpdate").val(response.password);
            
        },
        error: function(xhr, status, error) {
            alert("Error: " + xhr.responseText);
        }
    });
  }

  function updateStaffPassword() {
    // Get updated Appointment data from the form
    var urlParams = new URLSearchParams(window.location.search);
    var staffEmail = urlParams.get('staffEmail');
    var oldCorrectPassword = $('#staffPasswordToUpdate').val();
    var oldEnteredPassword = $('#oldPassword').val();
    var newPassword1 = $('#newPassword1').val();
    var newPassword2 = $('#newPassword2').val();
    
    if(oldCorrectPassword == oldEnteredPassword && newPassword1 == newPassword2){
        $.ajax({
            method: "PUT", // Use PUT method as defined in your backend controller
            url: "http://localhost:8080/api/v1/staff/updatePassword", // Update URL to match your backend endpoint
            contentType: "application/json", // Set content type to JSON
            data: JSON.stringify({
                staffEmail: staffEmail,
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