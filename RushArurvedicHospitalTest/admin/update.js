function updateStatus(appointmentId) {
    fetch("http://localhost/RushArurvedicHospital/admin/update_satus.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "appoinment_id": appointmentId, // ID of the appointment to update
            "status_id": 1                   // New status value
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then(data => {
        // Notify the user about the successful update
        alert("Status updated successfully!");
        console.log(data); // Logs the response for debugging
    })
    .catch(error => {
        console.error("Error updating status:", error);
        alert("Failed to update status.");
    });
}
