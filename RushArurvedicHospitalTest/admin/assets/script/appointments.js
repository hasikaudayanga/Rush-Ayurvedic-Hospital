
function fetchAllAppointments() {
    $.ajax({
        method: "GET",
        url: "http://localhost:8080/api/v1/appointment/getAllAppointments",
        success: function (data) {
            // Clear existing table rows
            $('#selectedBookEntryGrid tbody').empty();
            // Populate table with appointments data
            data.forEach(function (appointments, index) {
               
                $('#pendingAppointments').append(`
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${appointments.receivedAppointmentId}</td>
                        <td>${appointments.customersEmail}</td>
                        <td>${appointments.firstName}</td>
                        <td>${appointments.contactNumber}</td>
                        <td>${appointments.address}</td>
                        <td>${appointments.vehicleNumber}</td>
                        <td>${appointments.carBrand}</td>
                        <td>${appointments.carModel}</td>
                        <td>${appointments.serviceCategory}</td>
                        <td>${appointments.serviceDate}</td>
                        <td>${appointments.requisitionDate}</td>
                        <td><button id="approve" class="btn btn-success approve-btn" data-appointment-id="${appointments.receivedAppointmentId}">Approve</button></td>
                        <td><button id="reject" class="btn btn-danger reject-btn" data-appointment-id="${appointments.receivedAppointmentId}">Reject</button></td>
                        <td>
                            <a href="#" class="update-appointment">
                                <i class="bx bx-edit text-primary fs-4"></i>
                            </a>
                        </td>
                    </tr>
                `);
            });
        },
        error: function (error) {
            console.error("Error fetching appointments:", error);
        }
    });
  }



 
  $(document).ready(function() {
    $("#emailInputPending").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectedBookEntryGrid tbody tr").filter(function() {
            $(this).toggle($(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1);
        });
    });
});

 document.addEventListener("DOMContentLoaded", function() {
    fetchAllConsultations();
});