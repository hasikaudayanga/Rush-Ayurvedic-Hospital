function saveCustomer(){
    var customerEmail = $('#customerEmail').val();
    let password = $('#password').val();
    let firstName = $('#firstName').val();
    let lastName = $('#lastName').val();
    let address = $('#address').val();
    let contactNumber = $('#contactNumber').val();
    var registrationDate = $('#registrationDate').val();
    var activeStatus = true;
    
    if(password == "" || firstName=="" || lastName=="" || address=="" || contactNumber=="" || registrationDate==""){
        alert("Please Give All The Inputs");
    }else{
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
                console.log(data); // Log the response from the server
                customerPictureSave(customerEmail);
                alert("Customer Registered successfully!");
                window.location.href = "index.html";
               
            },
            error: function (error) {
                console.error("Error saving customer:", error);
                // Handle the error, show an error message, etc.
                alert("Error saving customer. Please try again.");
            }
        });
    }
    
}

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


function login() {
    var customerEmail = $('#customerEmail').val();
    var password = $('#password').val();
    
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
                alert('Email or Password Incorrect');
            }
        },
        error: function (error) {
            console.error("Error during login:", error);
            alert("Error during login. Please try again.");
        }
    });
}