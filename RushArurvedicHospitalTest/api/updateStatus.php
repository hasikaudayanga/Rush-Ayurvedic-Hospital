<?php
header('Content-Type: application/json');
include 'api/db_config.php';


// Retrieve and decode JSON data from POST request
$data = json_decode(file_get_contents("php://input"), true);
$appoinment_id = $data['appoinment_id'];
$status_id = $data['status_id'];

// Update query
$sql = "UPDATE appoinments_info SET status_id = ? WHERE appoinment_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $status_id, $appoinment_id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Status updated successfully"]);
} else {
    echo json_encode(["error" => "Failed to update status"]);
}

$stmt->close();
$conn->close();
?>
