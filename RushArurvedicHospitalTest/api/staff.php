<?php
include 'db_config.php';

// Get all staff
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM staff_info";
    $result = $conn->query($sql);
    $staff = array();
    while ($row = $result->fetch_assoc()) {
        //$staff[] = $row;
        //print_r($row);
            echo "<td>{$row['appoinment_id']}</td>";
            echo "<td>{$row['email_address']}</td>";
            echo "<td>{$row['p_name']}</td>";
            echo "<td>{$row['contact_number']}</td>";
            echo "<td>{$row['address']}</td>";
            echo "<td>{$row['description']}</td>";

    }
    //echo json_encode($staff);
}

// Add a new staff member
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "INSERT INTO staff_info (first_name, last_name, address, age, job_description, contact_number, email_address, user_name, password) 
            VALUES ('$data->first_name', '$data->last_name', '$data->address', $data->age, '$data->job_description', '$data->contact_number', '$data->email_address', '$data->user_name', '$data->password')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "New staff member created successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

// Update staff details
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "UPDATE staff_info SET 
            first_name = '$data->first_name',
            last_name = '$data->last_name',
            address = '$data->address',
            age = $data->age,
            job_description = '$data->job_description',
            contact_number = '$data->contact_number',
            email_address = '$data->email_address',
            user_name = '$data->user_name',
            password = '$data->password'
            WHERE staff_id = $data->staff_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Staff member updated successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

// Delete a staff member
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "DELETE FROM staff_info WHERE staff_id = $data->staff_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Staff member deleted successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

$conn->close();
?>
