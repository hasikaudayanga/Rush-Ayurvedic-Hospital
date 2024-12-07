function loginEmployee() {
    var staffEmail = $('#userName').val();
    var password = $('#employeePassword').val();
    
    
    $.ajax({
        method: "POST",
        contentType: "application/json",
        url: "http://localhost:8080/api/v1/staff/staffLogIn",
        async: true,
        data: JSON.stringify({
            "staffEmail": staffEmail,
            "password": password
        }),
        success: function (response) {
            if (response === 'ok') {
                // Redirect to dashboard page if login is successful
                //window.location.href = 'dashboard.html';
                window.location.href = "dashboard.html?staffEmail=" + staffEmail;
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