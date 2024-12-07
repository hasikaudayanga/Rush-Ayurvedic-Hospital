function login() {
    var customerEmail = $('#customerEmail').val();
    var password = $('#password').val();
    console.log(customerEmail);
    $.ajax({
        method: "POST",
        contentType: "application/json",
        url: "http://localhost:8080/api/v1/customer/customerLogIn",
        async: true,
        data: JSON.stringify({
            "customerEmail": customerEmail,
            "password": password
        }),
        success: function (response) {
            if (response === 'ok') {
                // Redirect to dashboard page if login is successful
                //window.location.href = 'dashboard.html';
                window.location.href = "dashboard.html?customerEmail=" + customerEmail;
            } else {
                // Show alert if login is unsuccessful
                alert('Incorrect email or password');
            }
        },
        error: function (error) {
            console.error("Error during login:", error);
            alert("Error during login. Please try again.");
        }
    });
}

$(document).ready(function(){
    // Handle Add button click
    $('#registerCustomer').click(function(){
        // Get form values
        var customerEmail = $('#customerEmail').val();
        var password = $('#password').val();
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var address = $('#address').val();
        var contactNumber = $('#contactNumber').val();
        var registrationDate = $('#registrationDate').val();
        var activeStatus = true;
       
        $.ajax({
        method: "POST",
        contentType: "application/json",
        url: "http://localhost:8080/api/v1/customer/save",
        async: true,
        data: JSON.stringify({
            "customerEmail": customerEmail,
            "password": password,
            "firstName": firstName,
            "lastName": lastName,
            "address" : address,
            "contactNumber": contactNumber,
            "registrationDate" : registrationDate,
            "activeStatus" :activeStatus
            
        }),
        success: function (data) {
            customerPictureSave(customerEmail);
            console.log(data); // Log the response from the server
             // to update registered customers table when adding new customer
            // Handle the response as needed, e.g., show a success message
            alert("Customer saved successfully!");
            window.location.href = "index.html";
        },
        error: function (error) {
            console.error("Error saving customer:", error);
            // Handle the error, show an error message, etc.
            alert("Error saving customer. Please try again.");
        }
      });
    });

    // Handle Clear button click
    $('#btnClear').click(function(){
        // Clear all form fields
        $('form')[0].reset();
    });
});

//customer profile photo save function
  function customerPictureSave(customerEmail){
    var formData = new FormData();
    formData.append('image', $('#customerImage')[0].files[0]);
    formData.append('customerEmail',customerEmail); // Add customer email to formData

    $.ajax({
        type: 'POST',
        url: 'http://localhost:8080/api/v1/customer/uploadImage', // Change the URL to match your backend endpoint
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

  function registerCustomer(){
    window.location.href = "customerRegister.html";
  }


