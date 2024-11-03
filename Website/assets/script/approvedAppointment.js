// Function to fetch and display all approved appoinments
function fetchAllApprovedAppointments() {
    var urlParams = new URLSearchParams(window.location.search);
    var customerEmail = urlParams.get('customerEmail');
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/appointment/get-approvedAppointment-by-customer-email?customerEmail=" + customerEmail,
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with appointments data
            data.forEach(function (approvedAppointments, index) {
               
                $('#approvedAppointments').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${approvedAppointments.approvedAppointmentId}</td>
                        <td>${approvedAppointments.customersEmail}</td>
                        <td>${approvedAppointments.customerName}</td>
                        <td>${approvedAppointments.customerNumber}</td>
                        <td>${approvedAppointments.customerAddress}</td>
                        <td>${approvedAppointments.vehicleNumber}</td>
                        <td>${approvedAppointments.carBrand}</td>
                        <td>${approvedAppointments.carModel}</td>
                        <td>${approvedAppointments.serviceCategory}</td>
                        <td>${approvedAppointments.serviceDate}</td>
                        <td>${approvedAppointments.requisitionDate}</td>
                        <td>${approvedAppointments.supervisorName}</td>
                        <td>${approvedAppointments.helpersCount}</td>
                        <td>${approvedAppointments.startTime}</td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching approved appointments:", error);
        }
    });
  }