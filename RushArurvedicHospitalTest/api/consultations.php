<?php
include 'db_config.php';

// Get all consultations
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM consultation_types";
    $result = $conn->query($sql);
    $consultations = array();
    while ($row = $result->fetch_assoc()) {
        $consultations[] = $row;
    }
    echo json_encode($consultations);
}

// Add a new consultation
// Add a new consultation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "INSERT INTO consultation_types (description, treatments, consultation_fee, status_id) 
            VALUES ('$data->description', '$data->treatments', $data->consultation_fee, '$data->status')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "New consultation created successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}


// Update a consultation
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "UPDATE consultation_types SET 
            description = '$data->description',
            treatments = '$data->treatments',
            consultation_fee = $data->consultation_fee,
            status = $data->status
            WHERE consultation_id = $data->consultation_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Consultation updated successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

// Delete a consultation
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "DELETE FROM consultation_types WHERE consultation_id = $data->consultation_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Consultation deleted successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

$conn->close();
?>
