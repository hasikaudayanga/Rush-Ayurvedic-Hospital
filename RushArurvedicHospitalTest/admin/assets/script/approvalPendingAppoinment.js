function fetchAllConsultations() {
    fetch("http://localhost/RushArurvedicHospital/api/approvalPendingApponmentList.php", {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then(data => {
        console.log(data);

        
        document.getElementById('pendingAppointments').innerHTML = "";

        
        data.forEach((consultation, index) => {
            document.getElementById('pendingAppointments').innerHTML += `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td>${consultation.appoinment_id}</td>
                    <td>${consultation.email_address}</td>
                    <td>${consultation.p_name}</td>
                    <td>${consultation.contact_number}</td>
                    <td>${consultation.address}</td>
                    <td>${consultation.description}</td>
                    <td>${consultation.d_name}</td>
                    <td>${consultation.appoinment_date_time}</td>

                    <td><button id="approve" class="btn btn-success approve-btn" data-appointment-id="${consultation.receivedAppointmentId}">Approve</button></td>
                    <td><button id="reject" class="btn btn-danger reject-btn" data-appointment-id="${consultation.receivedAppointmentId}">Reject</button></td>
                    <td><button id="approve" class="btn btn-secondary approve-btn" data-appointment-id="${consultation.receivedAppointmentId}">Action</button></td>
                   

                </tr>
            `;
        });
    })
    .catch(error => {
        console.error("Error fetching consultations:", error);
    });
}




document.addEventListener("DOMContentLoaded", function() {
    fetchAllConsultations();
});
a