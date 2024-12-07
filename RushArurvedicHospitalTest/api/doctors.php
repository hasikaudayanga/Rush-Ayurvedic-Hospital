<?php
header('Content-Type: application/json');
include 'db_config.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT first_name AS firstName, last_name AS lastName, consultation_id AS consultationType, 
            job_description AS jobRole, address, contact_number AS contactNumber, 
            email_address AS staffEmail, doctor_charge AS doctorCharge, user_name AS userName, passwords AS password 
            FROM doctors_info";

    $result = $conn->query($sql);
    $doctors = array();
    while ($row = $result->fetch_assoc()) {
        //$doctors[] = $row;
        //print_r($row);
        echo "<td>{$row['firstName']}</td>";
        echo "<td>{$row['lastName']}</td>";
        echo "<td>{$row['consultationType']}</td>";
        echo "<td>{$row['jobRole']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['contactNumber']}</td>";
        echo "<td>{$row['staffEmail']}</td>";
        echo "<td>{$row['doctorCharge']}</td>";
        echo "<td>{$row['userName']}</td>";
        echo "<td>{$row['password']}</td>";
                                //echo "<td><button type='button' class='btn-primary'>Action</button></td>";
        echo "<tr>";
    }
   // echo json_encode($doctors);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "INSERT INTO doctors_info (first_name, last_name, consultation_id, job_description, address, contact_number, email_address, doctor_charge, user_name, passwords) 
            VALUES ('$data->first_name', '$data->last_name', $data->consultation_id, '$data->job_description', '$data->address', '$data->contact_number', '$data->email_address', $data->doctor_charge, '$data->user_name', '$data->passwords')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "New doctor created successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "UPDATE doctors_info SET 
            first_name = '$data->first_name', 
            last_name = '$data->last_name',
            consultation_id = $data->consultation_id,
            job_description = '$data->job_description',
            address = '$data->address',
            contact_number = '$data->contact_number',
            email_address = '$data->email_address',
            doctor_charge = $data->doctor_charge,
            user_name = '$data->user_name',
            password = '$data->password'
            WHERE doctor_reg_id = $data->doctor_reg_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Doctor updated successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "DELETE FROM doctors_info WHERE doctor_reg_id = $data->doctor_reg_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Doctor deleted successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

$conn->close();
?>
