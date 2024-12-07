// Function to fetch and display all feedbacks
function fetchAllFeedback() {
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/feedback/getAllFeedback",
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
                        <td><button id="showFeedback" class="btn btn-success approve-btn" data-appointment-id="${feedbacks.feedbackId}">Show Feedback</button></td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching feedbacks:", error);
        }
    });
  }