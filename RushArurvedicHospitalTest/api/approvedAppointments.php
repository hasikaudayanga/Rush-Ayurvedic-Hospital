<?php
header('Content-Type: application/json');
include 'db_config.php';

// Get all appointments
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT  a.appoinment_id , 
                    p.email_address, 
                    concat(p.first_name,' ', p.last_name) as p_name, 
                    p.contact_number, 
                    p.address, 
                    c.description,
                   
                    a.appoinment_date_time, 
                    concat(d.first_name, ' ', d.last_name) as d_name,
                    a.status_id 
            FROM appoinments_info a, doctors_info d, patients_info p, consultation_types c 
            WHERE a.patient_id = p.patient_id 
                    and a.doctor_id = d.doctor_reg_id 
                    and a.consultation_id = c.consultation_id 
                    and a.status_id = 1
            ";
    $result = $conn->query($sql);
    $appointments = array();
    while ($row = $result->fetch_assoc()) {
       // $appointments[] = $row;
        //print_r($row);

            echo "<td>{$row['appoinment_id']}</td>";
            echo "<td>{$row['email_address']}</td>";
            echo "<td>{$row['p_name']}</td>";
            echo "<td>{$row['contact_number']}</td>";
            echo "<td>{$row['address']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td>{$row['d_name']}</td>";
            echo "<td>{$row['appoinment_date_time']}</td>";
            echo "<td><button id='approve' class='btn btn-success approve-btn'>Approve</button></td>";
            echo "<td><button id='approve' class='btn btn-danger reject-btn'>Reject</button></td>";
            echo "<td><button id='approve' class='btn btn-secondary approve-btn'>Action</button></td>";
                              
                                                      //echo "<td><button type='button' class='btn-primary'>Action</button></td>";
            
                    
            echo "<tr>";
    }
    //echo json_encode($appointments);
}

// Add a new appointment
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "INSERT INTO appoinments_info (patient_id, consultation_id, appoinment_date_time, doctor_id, comments, status) 
            VALUES ($data->patient_id, $data->consultation_id, '$data->appoinment_date_time', $data->doctor_id, '$data->comments', $data->status)";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "New appointment created successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

// Update an appointment
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "UPDATE appoinments_info SET 
            patient_id = $data->patient_id,
            consultation_id = $data->consultation_id,
            appoinment_date_time = '$data->appoinment_date_time',
            doctor_id = $data->doctor_id,
            comments = '$data->comments',
            status = $data->status
            WHERE appounment_id = $data->appounment_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Appointment updated successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

// Delete an appointment
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "DELETE FROM appoinments_info WHERE appounment_id = $data->appounment_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Appointment deleted successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

$conn->close();
?>
