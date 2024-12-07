function fetchAllConsultations() {
    fetch("http://localhost/RushArurvedicHospital/api/completedAppoinments.php", {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(response => {
        if (!response.ok) {
            
            throw new Error("not ok");
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        console.log("badu wada");

        
        document.getElementById('completedAppointments').innerHTML = "";

        
        data.forEach((consultation, index) => {
            document.getElementById('completedAppointments').innerHTML += `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td>${consultation.appoinment_id}</td>
                    <td>${consultation.email_address}</td>
                    <td>${consultation.p_name}</td>
                    <td>${consultation.contact_number}</td>
                    <td>${consultation.address}</td>
                    <td>${consultation.description}</td>
                    
                    <td>${consultation.appoinment_date_time}</td>
                    <td>${consultation.d_name}</td>

                    <td><button id="approve" class="btn btn-success approve-btn" data-appointment-id="${consultation.receivedAppointmentId}">Remark</button></td>
                    
                    <td><button id="approve" class="btn btn-warning approve-btn" data-appointment-id="${consultation.receivedAppointmentId}">Action</button></td>
                   

                </tr>
            `;
        });
    })
    .catch(error => {
        console.error("Error :", error);
    });
}




document.addEventListener("DOMContentLoaded", function() {
    fetchAllConsultations();
});
a