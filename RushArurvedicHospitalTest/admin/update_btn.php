<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment Status</title>
</head>
<body>
    <!-- Button to trigger the update -->
    <button id="updateStatusButton" onclick="updateStatus(1)">Mark as Completed</button>

    <script>
        // JavaScript function to send update request
        function updateStatus(appointmentId) {
            fetch("http://localhost/RushArurvedicHospital/api/updateStatus.php", {
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
                alert("Status updated successfully!");
                console.log(data); // Logs the response for debugging
            })
            .catch(error => {
                console.error("Error updating status:", error);
            });
        }
    </script>
</body>
</html>
