<?php
include 'db_config.php';

// Get all feedback
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);
    $feedback = array();
    while ($row = $result->fetch_assoc()) {
        $feedback[] = $row;
    }
    echo json_encode($feedback);
}

// Add new feedback
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "INSERT INTO feedback (patient_id, feedback_comment, feedback_rating) 
            VALUES ($data->patient_id, '$data->feedback_comment', $data->feedback_rating)";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Feedback submitted successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

// Update feedback
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "UPDATE feedback SET 
            patient_id = $data->patient_id,
            feedback_comment = '$data->feedback_comment',
            feedback_rating = $data->feedback_rating
            WHERE feedback_id = $data->feedback_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Feedback updated successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

// Delete feedback
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "DELETE FROM feedback WHERE feedback_id = $data->feedback_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Feedback deleted successfully"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

$conn->close();
?>
