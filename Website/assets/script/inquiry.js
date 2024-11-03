$(document).ready(function(){
    // Handle Add button click
    $('#btnAddInquiry').click(function(){
        // Get form values
        var urlParams = new URLSearchParams(window.location.search);
        var customerEmail = urlParams.get('customerEmail');
        var customerName = $('#customerName').val();
        var inquiryType = $('#inquiryType').val();
        var problem = $('#problem').val();
        var response = "Pending";
       
        $.ajax({
        method: "POST",
        contentType: "application/json",
        url: "http://localhost:8080/api/v1/inquiry/save",
        async: true,
        data: JSON.stringify({
            "inquiryId": 0,
            "customersEmail": customerEmail,
            "customerName": customerName,
            "inquiryType": inquiryType,
            "problem": problem,
            "response" : response
            
        }),
        success: function (data) {
            console.log(data); // Log the response from the server
            alert("Inquiry saved successfully!");
            fetchAllInquiries();
        },
        error: function (error) {
            console.error("Error saving inquiry:", error);
            // Handle the error, show an error message, etc.
            alert("Error saving Inquiry. Please try again.");
        }
      });
    });

    // Handle Clear button click
    $('#btnClearInquiry').click(function(){
        // Clear all form fields
        $('form')[0].reset();
    });
});


// Function to fetch and display all pending appoinments
function fetchAllInquiries() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/inquiry/get-inquiry-by-customer-email?customerEmail=" + customerEmail,
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with appointments data
            data.forEach(function (inquiries, index) {
               
                $('#inquries').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${inquiries.inquiryId}</td>
                        <td>${inquiries.customersEmail}</td>
                        <td>${inquiries.customerName}</td>
                        <td>${inquiries.inquiryType}</td>
                        <td>${inquiries.problem}</td>
                        <td>${inquiries.response}</td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching Inquiries:", error);
        }
    });
  }