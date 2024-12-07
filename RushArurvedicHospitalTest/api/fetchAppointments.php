<?php
include('../api/db_config.php');

header('Content-Type: application/json'); // Set content type to JSON
$appointments = [];

$sql = "SELECT a.appoinment_id, 
               p.email_address, 
               CONCAT(p.first_name, ' ', p.last_name) AS p_name, 
               p.contact_number, 
               p.address, 
               c.description AS consultation_type,
               a.appoinment_date_time, 
               CONCAT(d.first_name, ' ', d.last_name) AS doctor_name
        FROM appoinments_info a
        JOIN doctors_info d ON a.doctor_id = d.doctor_reg_id
        JOIN patients_info p ON a.patient_id = p.patient_id
        JOIN consultation_types c ON a.consultation_id = c.consultation_id
        WHERE a.status_id = 0";

$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
}

echo json_encode($appointments); // Return JSON response

?>
