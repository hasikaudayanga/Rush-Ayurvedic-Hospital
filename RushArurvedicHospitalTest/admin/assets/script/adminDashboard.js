$(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Doctor Accounts')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#adminDashBoard").hide();
      $("#receivedAppointmentMain").hide();
      $("#consultationHandling").hide();
      $("#staffAccountHandling").hide();
      $("#approvedAppointmentMain").hide();
      $("#completedAppointmentMain").hide();
      $('#reportMain').hide();
      $('#reportCompletedJob').hide();
      $('#rejectedAppointmentMain').hide();
      $('#addInquiryMain').hide();
      $('#feedbackMain').hide();
      $('#invoicePage').hide();
      $('#staffsProfileUpdate').hide();
      $('#staffsPasswordUpdate').hide();
      $("#doctorAccountHandling").show();
     
      
      fetchAllServices();
      
      //fetchAllDoctors(); // show all registered Customers when page loading
    });
  });

  $(document).ready(function() {
    // Attach click event handler to the "SERVICES" link
    $('.dz__nav__name:contains("CONSULTATIONS")').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        $("#receivedAppointmentMain").hide();
        $("#adminDashBoard").hide();
        $("#consultationHandling").hide();
        $("#staffAccountHandling").hide();
        $("#doctorAccountHandling").hide();
        $("#completedAppointmentMain").hide();
        $("#approvedAppointmentMain").hide();
        $('#reportMain').hide();
        $('#reportCompletedJob').hide();
        $('#rejectedAppointmentMain').hide();
        $('#addInquiryMain').hide();
        $('#feedbackMain').hide();
        $('#invoicePage').hide();
        $('#staffsProfileUpdate').hide();
        $('#staffsPasswordUpdate').hide();
        // Toggle the display of the services handling section
        $('#consultationHandling').toggle();
        fetchAllServices();
    });
});


  //sss
    $(document).ready(function() {
    // Attach click event handler to the "SERVICES" link
    $('.dz__nav__name:contains("Reject Appointment")').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        $("#receivedAppointmentMain").hide();
        $("#adminDashBoard").hide();
        $("#consultationHandling").hide();
        $("#staffAccountHandling").hide();
        $("#doctorAccountHandling").hide();
        $("#completedAppointmentMain").hide();
        $("#approvedAppointmentMain").hide();
        $('#reportMain').hide();
        $('#reportCompletedJob').hide();
        
        $('#addInquiryMain').hide();
        $('#feedbackMain').hide();
        $('#invoicePage').hide();
        $('#staffsProfileUpdate').hide();
        $('#staffsPasswordUpdate').hide();
        $('#rejectedAppointmentMain').show();
        
        fetchAllServices();
    });
});

  //ssss

 

  $(document).ready(function() {
    // Event listener for the "Add Sevices" link
    $(".dz__nav__dropdown-item:contains('Staff Accounts')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#adminDashBoard").hide();
      $("#doctorAccountHandling").hide();
      $("#consultationHandling").hide();
      $("#receivedAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $("#completedAppointmentMain").hide();
      $('#reportMain').hide();
      $('#reportCompletedJob').hide();
      $('#rejectedAppointmentMain').hide();
      $('#addInquiryMain').hide();
      $('#feedbackMain').hide();
      $('#invoicePage').hide();
      $('#staffsProfileUpdate').hide();
      $('#staffsPasswordUpdate').hide();
      $("#staffAccountHandling").show();
      fetchAllStaffs();
    });
  });

  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Received Appointments')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#adminDashBoard").hide();
      $("#consultationHandling").hide();
      $("#staffAccountHandling").hide();
      $("#doctorAccountHandling").hide();
      $("#approvedAppointmentMain").hide();
      $("#completedAppointmentMain").hide();
      $('#reportMain').hide();
      $('#reportCompletedJob').hide();
      $('#rejectedAppointmentMain').hide();
      $('#addInquiryMain').hide();
      $('#feedbackMain').hide();
      $('#invoicePage').hide();
      $('#staffsProfileUpdate').hide();
      $('#staffsPasswordUpdate').hide();
      $("#receivedAppointmentMain").show();
      fetchAllAppointments(); // show all registered Customers when page loading
    });
  });

  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Approved Appointments')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#adminDashBoard").hide();
      $("#consultationHandling").hide();
      $("#staffAccountHandling").hide();
      $("#doctorAccountHandling").hide();
      $("#receivedAppointmentMain").hide();
      $("#completedAppointmentMain").hide();
      $('#reportMain').hide();
      $('#reportCompletedJob').hide();
      $('#rejectedAppointmentMain').hide();
      $('#addInquiryMain').hide();
      $('#feedbackMain').hide();
      $('#invoicePage').hide();
      $('#staffsProfileUpdate').hide();
      $('#staffsPasswordUpdate').hide();
      $("#approvedAppointmentMain").show();
      fetchAllApprovedAppointments();
    });
  });

  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Completed Appointments')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#adminDashBoard").hide();
      $("#consultationHandling").hide();
      $("#staffAccountHandling").hide();
      $("#doctorAccountHandling").hide();
      $("#receivedAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $('#reportMain').hide();
      $('#reportCompletedJob').hide();
      $('#rejectedAppointmentMain').hide();
      $('#addInquiryMain').hide();
      $('#feedbackMain').hide();
      $('#invoicePage').hide();
      $('#staffsProfileUpdate').hide();
      $('#staffsPasswordUpdate').hide();
      $("#completedAppointmentMain").show();
      fetchAllCompletedAppointments();
    });
  });

  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Completed jobs')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#receivedAppointmentMain").hide();
        $("#adminDashBoard").hide();
        $("#consultationHandling").hide();
        $("#staffAccountHandling").hide();
        $("#doctorAccountHandling").hide();
        $("#completedAppointmentMain").hide();
        $("#approvedAppointmentMain").hide();
        $('#rejectedAppointmentMain').hide();
        $('#addInquiryMain').hide();
        $('#invoicePage').hide();
        $('#feedbackMain').hide();
        $('#staffsProfileUpdate').hide();
        $('#staffsPasswordUpdate').hide();
        // Toggle the display of the services handling section
        $('#reportCompletedJob').show();
        fetchReport();
    });
  });

  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Rejected Jobs')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#receivedAppointmentMain").hide();
        $("#adminDashBoard").hide();
        $("#consultationHandling").hide();
        $("#staffAccountHandling").hide();
        $("#doctorAccountHandling").hide();
        $("#completedAppointmentMain").hide();
        $("#approvedAppointmentMain").hide();
        $('#reportCompletedJob').hide();
        $('#addInquiryMain').hide();
        $('#feedbackMain').hide();
        $('#invoicePage').hide();
        $('#staffsProfileUpdate').hide();
        $('#staffsPasswordUpdate').hide();
        // Toggle the display of the services handling section
        $('#rejectedAppointmentMain').show();
        fetchAllRejectedAppointments();
        
    });
  });

  $(document).ready(function() {
    // Event listener for the "Create Appointments" link
    $(".dz__nav__dropdown-item:contains('Inquary')").click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#receivedAppointmentMain").hide();
        $("#adminDashBoard").hide();
        $("#consultationHandling").hide();
        $("#staffAccountHandling").hide();
        $("#doctorAccountHandling").hide();
        $("#completedAppointmentMain").hide();
        $("#approvedAppointmentMain").hide();
        $('#reportCompletedJob').hide();
        $('#rejectedAppointmentMain').hide();
        $('#feedbackMain').hide();
        $('#invoicePage').hide();
        $('#staffsProfileUpdate').hide();
        $('#staffsPasswordUpdate').hide();
        // Toggle the display of the services handling section
        $('#addInquiryMain').show();
        fetchAllInquiries();
        
    });
  });

  $(document).ready(function() {
    // Event listener for the Feedback link
    $('.dz__nav__name:contains("FEEDBACK")').click(function(e) {
      e.preventDefault(); // Prevent default link behavior

      // Hide dashboard main content and show addAppointment main content
      $("#receivedAppointmentMain").hide();
        $("#adminDashBoard").hide();
        $("#consultationHandling").hide();
        $("#staffAccountHandling").hide();
        $("#doctorAccountHandling").hide();
        $("#completedAppointmentMain").hide();
        $("#approvedAppointmentMain").hide();
        $('#reportCompletedJob').hide();
        $('#rejectedAppointmentMain').hide();
        // Toggle the display of the services handling section
        $('#addInquiryMain').hide();
        $('#invoicePage').hide();
        $('#staffsProfileUpdate').hide();
        $('#staffsPasswordUpdate').hide();
        $('#feedbackMain').toggle();
        fetchAllFeedback();
        
        
    });
  });

  $(document).ready(function() {
    // Attach click event handler to the "SERVICES" link
    $('.dz__nav__name:contains("INVOICES")').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        $("#receivedAppointmentMain").hide();
        $("#adminDashBoard").hide();
        $("#consultationHandling").hide();
        $("#staffAccountHandling").hide();
        $("#doctorAccountHandling").hide();
        $("#completedAppointmentMain").hide();
        $("#approvedAppointmentMain").hide();
        $('#reportMain').hide();
        $('#reportCompletedJob').hide();
        $('#rejectedAppointmentMain').hide();
        $('#addInquiryMain').hide();
        $('#feedbackMain').hide();
        $('#consultationHandling').hide();
        $('#staffsProfileUpdate').hide();
        $('#staffsPasswordUpdate').hide();
        // Toggle the display of the services handling section
        $('#invoicePage').toggle();
        fetchInvoice();
        
    });
});


$(document).ready(function() {
  // Event listener for the Feedback link
  $(".dz__nav__dropdown-item:contains('Edit Profile')").click(function(e) {
    e.preventDefault(); // Prevent default link behavior

    // Hide dashboard main content and show addAppointment main content
    $("#receivedAppointmentMain").hide();
      $("#adminDashBoard").hide();
      $("#consultationHandling").hide();
      $("#staffAccountHandling").hide();
      $("#doctorAccountHandling").hide();
      $("#completedAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $('#reportCompletedJob').hide();
      $('#rejectedAppointmentMain').hide();
      // Toggle the display of the services handling section
      $('#addInquiryMain').hide();
      $('#invoicePage').hide();
      $('#feedbackMain').hide();
      $('#staffsPasswordUpdate').hide();
      $('#staffsProfileUpdate').show();
      getStaffDetailsToUpdate();
      
  });
});

$(document).ready(function() {
  // Event listener for the Feedback link
  $(".dz__nav__dropdown-item:contains('Change Password')").click(function(e) {
    e.preventDefault(); // Prevent default link behavior

    // Hide dashboard main content and show addAppointment main content
    $("#receivedAppointmentMain").hide();
      $("#adminDashBoard").hide();
      $("#consultationHandling").hide();
      $("#staffAccountHandling").hide();
      $("#doctorAccountHandling").hide();
      $("#completedAppointmentMain").hide();
      $("#approvedAppointmentMain").hide();
      $('#reportCompletedJob').hide();
      $('#rejectedAppointmentMain').hide();
      // Toggle the display of the services handling section
      $('#addInquiryMain').hide();
      $('#invoicePage').hide();
      $('#feedbackMain').hide();
      $('#staffsProfileUpdate').hide();
      $('#staffsPasswordUpdate').show();
      getStaffPasswordToUpdate();
  });
});

$(document).ready(function() {
  $(".dz__nav__dropdown-item:contains('Log Out')").click(function(e) {
    e.preventDefault(); // Prevent default link behavior

    // Show a confirmation dialog
    var confirmation = confirm("Are you sure you want to log out?");
    
    // If the user confirms, redirect to the logout page
    if (confirmation) {
      window.location.href = "signin_dark.html";
    }
  });
});


  $(document).ready(function() {
    // Event listener for the logout icon
    $(".log-out").click(function(e) {
        e.preventDefault(); // Prevent default link behavior
  
        // Hide addAppointmentMain and show dashboardMain
        $("#doctorAccountHandling").hide();
        $("#consultationHandling").hide();
        $("#receivedAppointmentMain").hide();
        $("#staffAccountHandling").hide();
        $('#reportCompletedJob').hide();
        $("#approvedAppointmentMain").hide();
        $("#completedAppointmentMain").hide();
        $('#reportMain').hide();
        $('#rejectedAppointmentMain').hide();
        $('#addInquiryMain').hide();
        $('#feedbackMain').hide();
        $('#invoicePage').hide();
        $('#staffsProfileUpdate').hide();
        $('#staffsPasswordUpdate').hide();
        $("#adminDashBoard").show();
        
    });
  });

  //-------------------------------------------------------------------------------------------------------------------
  
  //staff full details download
//   $(document).ready(function() {
//     // Getstaff email from URL parameter
//     var urlParams = new URLSearchParams(window.location.search);
//     var staffEmail = urlParams.get('staffEmail');
//     // Make AJAX request to get staff details
//     $.ajax({
//         type: "GET",
//         url: "http://localhost:8080/api/v1/staff/get-staff-by-email?staffEmail=" + staffEmail,
//         success: function(response) {

//           $(".dz__sidebar__title").text(response.firstName);
//           if(response.jobRole == "Staff Member"){
//             $("#staffAccountOption").hide();
//             $("#dashboardHeader").text("STAFF DASHBOARD");
//           }
//           if(response.jobRole == "Mechanical Supervisor"){
//             $("#crateAppointmentOption").hide();
//             $("#receivedAppointmentOption").hide();
//             $("#completedAppointmentOption").hide();
//             $("#userAccountOption").hide();
//             $("#feedbackInquiryOption").hide();
//             $("#reportOption").hide();
//             $("#servicesOption").hide();
//             $("#invoiceOption").hide();
//             $("#dashboardHeader").text("SUPERVISOR DASHBOARD");
//           }

//         },
//         error: function(xhr, status, error) {
//             alert("Error: " + xhr.responseText);
//         }
//     });
// });
// // staff Image douwnload
// $(document).ready(function () {
//   var urlParams = new URLSearchParams(window.location.search);
//     var staffEmail = urlParams.get('staffEmail');

//     $.ajax({
//         type: 'GET',
//         url: 'http://localhost:8080/api/v1/staff/download?staffEmail=' + staffEmail, // Change the URL to match your backend endpoint
//         xhrFields: {
//             responseType: 'blob'
//         },
//         success: function (response) {
//           var imageUrl = URL.createObjectURL(response);
//           $('#staffImage').attr('src', imageUrl);
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr.responseText);
            
//         }
//     });     
// });

