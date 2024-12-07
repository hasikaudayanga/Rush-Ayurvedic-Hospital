<?php
include('../api/db_config.php');

// Set content type to JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode JSON payload from the request
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate the appointment ID
    if (isset($data['appointmentId']) && is_numeric($data['appointmentId'])) {
        $appointment_id = $data['appointmentId'];

        // Prepare the SQL statement
        $sql = "UPDATE appoinments_info SET status_id = 1 WHERE appoinment_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $appointment_id);

            // Execute the statement
            if ($stmt->execute()) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Appointment approved successfully.',
                ]);
            } else {
                // Handle query execution failure
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to approve appointment. Please try again.',
                    'error' => $stmt->error, // Optional: include the error message
                ]);
            }
            $stmt->close();
        } else {
            // Handle SQL preparation failure
            echo json_encode([
                'success' => false,
                'message' => 'Failed to prepare the SQL statement.',
                'error' => $conn->error, // Optional: include the error message
            ]);
        }
    } else {
        // Handle missing or invalid appointment ID
        echo json_encode([
            'success' => false,
            'message' => 'Invalid or missing appointment ID.',
        ]);
    }

    $conn->close();
} else {
    // Handle unsupported request method
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method. Only POST is allowed.',
    ]);
}
?>
