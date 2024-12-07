// Function to fetch and display all Inquiries
function fetchAllInquiries() {
    
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/inquiry/getAllInquiry",
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with Inquiries data
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
                        <td><button id="responseInquiry" class="btn btn-success approve-btn" data-appointment-id="${inquiries.inquiryId}">Response</button></td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching Inquiries:", error);
        }
    });
  }


  // Function to handle click on responseInquiry button in the raw
$(document).on('click', '#responseInquiry', function() {
    // Get response Inquiry data from the form
    var row = $(this).closest('tr');
    var inquiryId = row.find('td:nth-child(2)').text(); 

     // Store the details in a hidden field
     $('#inquiryIdToUpdate').val(inquiryId);
    // Show the modal
    $('#updateInquiryModal').modal('show');
  });

  function updateInquiry() {
    // Get updated customer data from the form
    var updatedInquiryId = $('#inquiryIdToUpdate').val();
    var response = $('#response').val();
    
    $.ajax({
      method: "PUT", 
      url: "http://localhost:8080/api/v1/inquiry/update", // Update URL to match your backend endpoint
      contentType: "application/json", // Set content type to JSON
      data: JSON.stringify({
        inquiryId: updatedInquiryId,
        response: response
      }),
      success: function(response) {
        $('#updateInquiryModal').modal('hide');
        alert("Inquiry response Successfully");
        fetchAllInquiries(); // Refresh table
      },
      error: function(error) {
        // Handle error response
        console.error("Error updating inquiry:", error);
        alert("error");
      }
    });
  }
