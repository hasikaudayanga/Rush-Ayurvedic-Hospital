document.addEventListener("DOMContentLoaded", () => {
    fetchData("appointments", "appointmentsTable");
    fetchData("consultations", "consultationsTable");
    fetchData("patients", "usersTable"); // Patients as user accounts
    fetchData("feedback", "feedbackTable");
    fetchData("invoice", "invoicesTable");
    fetchData("reports", "reportsTable");
});

function fetchData(endpoint, elementId) {
    fetch(`http://localhost/api/${endpoint}.php`)
        .then(response => response.json())
        .then(data => {
            let tableContent = "<table class='table table-striped'><thead><tr>";
            for (let key in data[0]) {
                tableContent += `<th>${key}</th>`;
            }
            tableContent += "</tr></thead><tbody>";
            data.forEach(row => {
                tableContent += "<tr>";
                for (let key in row) {
                    tableContent += `<td>${row[key]}</td>`;
                }
                tableContent += "</tr>";
            });
            tableContent += "</tbody></table>";
            document.getElementById(elementId).innerHTML = tableContent;
        })
        .catch(error => console.error("Error fetching data:", error));
}
