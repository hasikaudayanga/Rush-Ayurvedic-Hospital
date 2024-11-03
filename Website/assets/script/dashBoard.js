var firstName , contactNumber, address;

$(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Create Appointments')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior
      fetchAllAppointments() ;
      // Hide dashboard main content and show addAppointment main content
      $("#dashboardMain").hide();
      $("#approvedAppointmentMain").hide();
      $('#reportMain').hide();
      $("#rejectedAppointmentMain").hide();
      $("#addInquiryMain").hide();
      $("#addFeedbackMain").hide();
      $("#customerProfileUpdate").hide();
      $("#customerPasswordUpdate").hide();
      $("#addAppointmentMain").show();
    });
  });

  
  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Approved Appointments')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#dashboardMain").hide();
      $("#addAppointmentMain").hide();
      $('#reportMain').hide();
      $("#rejectedAppointmentMain").hide();
      $("#addInquiryMain").hide();
      $("#addFeedbackMain").hide();
      $("#customerProfileUpdate").hide();
      $("#customerPasswordUpdate").hide();
      $("#approvedAppointmentMain").show();
      fetchAllApprovedAppointments();
    });
  });

  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Completed Appointments')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#dashboardMain").hide();
      $("#addAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $("#rejectedAppointmentMain").hide();
      $("#addInquiryMain").hide();
      $("#addFeedbackMain").hide();
      $("#customerProfileUpdate").hide();
      $("#customerPasswordUpdate").hide();
      $("#reportMain").show();
      fetchCustomerReport();
    });
  });

  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Rejected Appointments')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#dashboardMain").hide();
      $("#addAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $("#reportMain").hide();
      $("#addInquiryMain").hide();
      $("#addFeedbackMain").hide();
      $("#customerProfileUpdate").hide();
      $("#customerPasswordUpdate").hide();
      $("#rejectedAppointmentMain").show();
      fetchAllRejectedAppointments();
      
    });
  });

  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Inquary')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#dashboardMain").hide();
      $("#addAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $("#reportMain").hide();
      $("#rejectedAppointmentMain").hide();
      $("#addFeedbackMain").hide();
      $("#customerProfileUpdate").hide();
      $("#customerPasswordUpdate").hide();
      $("#addInquiryMain").show();
      fetchAllInquiries();
    });
  });

  $(document).ready(function() {
    
    $(".dz__nav__dropdown-item:contains('Feedback')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#dashboardMain").hide();
      $("#addAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $("#reportMain").hide();
      $("#rejectedAppointmentMain").hide();
      $("#addInquiryMain").hide();
      $("#customerProfileUpdate").hide();
      $("#customerPasswordUpdate").hide();
      $("#addFeedbackMain").show();
      fetchAllFeedback();
    });
  });

  
  $(document).ready(function() {
    
    $(".dz__nav__dropdown-item:contains('Edit Profile')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#dashboardMain").hide();
      $("#addAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $("#reportMain").hide();
      $("#rejectedAppointmentMain").hide();
      $("#addInquiryMain").hide();
      $("#addFeedbackMain").hide();
      $("#customerPasswordUpdate").hide();
      $("#customerProfileUpdate").show();
      getCustomerDetailsToUpdate();
    });
  });

  $(document).ready(function() {
    
    $(".dz__nav__dropdown-item:contains('Change Password')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#dashboardMain").hide();
      $("#addAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $("#reportMain").hide();
      $("#rejectedAppointmentMain").hide();
      $("#addInquiryMain").hide();
      $("#addFeedbackMain").hide();
      $("#customerProfileUpdate").hide();
      $("#customerPasswordUpdate").show();
      getCustomerPasswordToUpdate();
    });
  });

  $(document).ready(function() {
    $(".dz__nav__dropdown-item:contains('Log Out')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior
  
      // Show a confirmation dialog
      var confirmation = confirm("Are you sure you want to log out?");
      
      // If the user confirms, redirect to the logout page
      if (confirmation) {
        window.location.href = "index.html";
      }
    });
  });

$(document).ready(function() {
  // Event listener for the logout icon
  $(".log-out").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide addAppointmentMain and show dashboardMain
      $("#addAppointmentMain").hide();
      $('#reportMain').hide();
      $("#approvedAppointmentMain").hide();
      $("#rejectedAppointmentMain").hide();
      $("#addInquiryMain").hide();
      $("#addFeedbackMain").hide();
      $("#customerProfileUpdate").hide();
      $("#customerPasswordUpdate").hide();
      $("#dashboardMain").show();
  });
});

  //customer full details download
  $(document).ready(function() {
          // Get customer email from URL parameter
          var urlParams = new URLSearchParams(window.location.search);
          var customerEmail = urlParams.get('customerEmail');
          // Make AJAX request to get customer details
          $.ajax({
              type: "GET",
              url: "http://localhost:8080/api/v1/customer/get-customer-by-email?customerEmail=" + customerEmail,
              success: function(response) {

                $(".dz__sidebar__title").text(response.firstName);
                // Assign customer data to variables
                firstName = response.firstName;
                contactNumber = response.contactNumber;
                address = response.address;
                $('#customerName').val(response.firstName);

              },
              error: function(xhr, status, error) {
                  alert("Error: " + xhr.responseText);
              }
          });
      });
      // customer Image douwnload
      $(document).ready(function () {
        var urlParams = new URLSearchParams(window.location.search);
          var customerEmail = urlParams.get('customerEmail');

          $.ajax({
              type: 'GET',
              url: 'http://localhost:8080/api/v1/customer/download?customerEmail=' + customerEmail, // Change the URL to match your backend endpoint
              xhrFields: {
                  responseType: 'blob'
              },
              success: function (response) {
                var imageUrl = URL.createObjectURL(response);
                $('#customerImage').attr('src', imageUrl);
              },
              error: function (xhr, status, error) {
                  console.error(xhr.responseText);
                  
              }
          });     
  });

  






