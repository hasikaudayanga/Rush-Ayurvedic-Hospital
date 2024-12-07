/*function fetchAllConsultations() {
    fetch("http://localhost/RushArurvedicHospital/api/consultations.php", {
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
        
        document.getElementById('availableConsultation').innerHTML = "";

        
        data.forEach((consultation, index) => {

            document.getElementById('availableConsultation').innerHTML += `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td>${consultation.consultation_id}</td>
                    <td>${consultation.description}</td>
                    <td>${consultation.treatments}</td>
                    <td>${consultation.consultation_fee}</td>
                </tr>
            `;
        });
    })
    .catch(error => {
        console.error("Error fetching consultations:", error);
    });
}
*/


function fetchAllConsultations() {
    fetch("http://localhost/RushArurvedicHospital/api/consultations.php", {
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
        
        document.getElementById('availableConsultation').innerHTML = "";

        
        data.forEach((consultation, index) => {
            document.getElementById('availableConsultation').innerHTML += `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td>${consultation.consultation_id}</td>
                    <td>${consultation.description}</td>
                    <td>${consultation.treatments}</td>
                    <td>${consultation.consultation_fee}</td>
                   

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




