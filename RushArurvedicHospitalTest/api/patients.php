<?php
include 'db_config.php';

// Get all patients
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM patients_info";
    $result = $conn->query($sql);
    $patients = array();
    while ($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }
    echo json_encode($patients);
}

// Add a new patient
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "INSERT INTO patients_info (first_name, last_name, address, age, contact_number, email_address, user_name, passwords) 
            VALUES ('$data->first_name', '$data->last_name', '$data->address', $data->age, '$data->contact_number', '$data->email_address', '$data->user_name', '$data->passwords')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "New patient created successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

// Update patient details
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "UPDATE patients_info SET 
            first_name = '$data->first_name', 
            last_name = '$data->last_name',
            address = '$data->address',
            age = $data->age,
            contact_number = '$data->contact_number',
            email_address = '$data->email_address',
            user_name = '$data->user_name',
            passwords = '$data->passwords'
            WHERE patient_id = $data->patient_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Patient updated successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

// Delete a patient
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "DELETE FROM patients_info WHERE patient_id = $data->patient_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Patient deleted successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

$conn->close();
?>
