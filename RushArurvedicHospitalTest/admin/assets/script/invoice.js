

    function printBill() {
        alert("Printing bill...");
    }

    function generatePDF() {
       
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        
        const table = document.getElementById("selectedBookEntryGridss");

        
        doc.autoTable({ html: '#selectedBookEntryGridss' });

        
        doc.save("table.pdf");
    }



    function fetchAllConsultations() {
        fetch("http://localhost/RushArurvedicHospital/api/invoices.php", {
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

            
            document.getElementById('invoiceDetails').innerHTML = "";

            
            data.forEach((consultation, index) => {
                document.getElementById('invoiceDetails').innerHTML += `
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${consultation.patient_id}</td>
                        <td>${consultation.email_address}</td>
                        <td>${consultation.p_name}</td>
                        <td>${consultation.contact_number}</td>
                        <td>${consultation.address}</td>
                        <td>${consultation.description}</td>
                        <td>${consultation.appoinment_date_time}</td>
                        <td>${consultation.consultation_fee}</td>
                        <td>${consultation.doctor_charge}</td>
                        <td>${consultation.total_fee}</td>

                        <td><button id="approve" class="btn btn-success approve-btn" onClick="printBill()">Print Bill</button></td>
                        
                       

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

