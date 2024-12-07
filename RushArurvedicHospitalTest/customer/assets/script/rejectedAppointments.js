function fetchAllRejectedAppointments() {
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/rejectedAppointment/getAllRejectedAppointment",
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with appointments data
            data.forEach(function (rejectAppointments, index) {
               
                $('#rejectAppointments').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${rejectAppointments.rejectedAppointmentId}</td>
                        <td>${rejectAppointments.customersEmail}</td>
                        <td>${rejectAppointments.firstName}</td>
                        <td>${rejectAppointments.contactNumber}</td>
                        <td>${rejectAppointments.address}</td>
                        <td>${rejectAppointments.vehicleNumber}</td>
                        <td>${rejectAppointments.carBrand}</td>
                        <td>${rejectAppointments.carModel}</td>
                        <td>${rejectAppointments.serviceCategory}</td>
                        <td>${rejectAppointments.serviceDate}</td>
                        <td>${rejectAppointments.requisitionDate}</td>
                        <td>${rejectAppointments.rejectedReason}</td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching appointments:", error);
        }
    });
  }