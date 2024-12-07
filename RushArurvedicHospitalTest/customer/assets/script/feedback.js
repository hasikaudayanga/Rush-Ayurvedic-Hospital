$(document).ready(function(){
    // Handle Add button click
    $('#btnAddFeedback').click(function(){
        // Get form values
        var urlParams = new URLSearchParams(window.location.search);
        var customerEmail = urlParams.get('customerEmail');
        var customerName = $('#customerName').val();
        var feedbackLevel = $('#feedbackLevel').val();
        var feedback = $('#feedback').val();
       
        $.ajax({
        method: "POST",
        contentType: "application/json",
        url: "http://localhost:8080/api/v1/feedback/save",
        async: true,
        data: JSON.stringify({
            "feedbackId": 0,
            "customersEmail": customerEmail,
            "customerName": customerName,
            "feedbackLevel": feedbackLevel,
            "feedback": feedback
            
        }),
        success: function (data) {
            console.log(data); // Log the response from the server
            alert("feedback saved successfully!");
            fetchAllFeedback();
        },
        error: function (error) {
            console.error("Error saving inquiry:", error);
            // Handle the error, show an error message, etc.
            alert("Error saving feedback. Please try again.");
        }
      });
    });

    // Handle Clear button click
    $('#btnClearFeedback').click(function(){
        // Clear all form fields
        $('form')[0].reset();
    });
});

// Function to fetch and display all feedbacks
function fetchAllFeedback() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/feedback/get-feedback-by-customer-email?customerEmail=" + customerEmail,
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with appointments data
            data.forEach(function (feedbacks, index) {
               
                $('#feedbacks').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${feedbacks.feedbackId}</td>
                        <td>${feedbacks.customersEmail}</td>
                        <td>${feedbacks.customerName}</td>
                        <td>${feedbacks.feedbackLevel}</td>
                        <td>${feedbacks.feedback}</td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching feedbacks:", error);
        }
    });
  }