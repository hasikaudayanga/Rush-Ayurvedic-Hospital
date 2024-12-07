<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include('../db_config.php');


ini_set('display_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $patient_id = isset($_POST['patient_id']) ? intval($_POST['patient_id']) : 0;
    $consultation_id = isset($_POST['consultation_id']) ? intval($_POST['consultation_id']) : 0;
    $appointment_date_time = isset($_POST['appointmentDateTime']) ? $_POST['appointmentDateTime'] : '';
    $doctor_id = isset($_POST['doctor_id']) ? intval($_POST['doctor_id']) : 0;
    $comments = isset($_POST['comments']) ? trim($_POST['comments']) : '';

    
    if ($patient_id > 0 && $consultation_id > 0 && !empty($appointment_date_time) && $doctor_id > 0) {
        // Set default status_id to 0 (Pending)
        $status_id = 0;

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO appoinments_info (patient_id, consultation_id, appoinment_date_time, doctor_id, comments, status_id) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("iisisi", $patient_id, $consultation_id, $appointment_date_time, $doctor_id, $comments, $status_id);

            // Execute the statement
            if ($stmt->execute()) {
                // Success: Redirect or display a success message
                // Option 1: Redirect to a success page
                // header("Location: success.php");
                // exit();

                // Option 2: Display a success message
               // header('Location:../admin/dashboard.php')
                echo "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Appointment Created</title>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
                </head>
                <body>
                    <div class='container mt-5'>
                        <div class='alert alert-success' role='alert'>
                            Appointment created successfully!
                        </div>
                        <a href='../../admin/create_appoinment.php' class='btn btn-primary'>Create Another Appointment</a>
                        <a href='../../admin/dashboard.php' class='btn btn-secondary'>Home</a>
                    </div>
                </body>
                </html>";
            } else {
                // Error executing the statement
                echo "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Error</title>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
                </head>
                <body>
                    <div class='container mt-5'>
                        <div class='alert alert-danger' role='alert'>
                            Failed to create appointment. Please try again.
                        </div>
                        <a href='create_appointment.php' class='btn btn-primary'>Go Back</a>
                    </div>
                </body>
                </html>";
            }

            $stmt->close();
        } else {
            // Error preparing the statement
            echo "Error preparing the statement: " . $conn->error;
        }
    } else {
        // Missing required fields
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Invalid Input</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class='container mt-5'>
                <div class='alert alert-warning' role='alert'>
                    Please fill in all required fields.
                </div>
                <a href='create_appointment.php' class='btn btn-primary'>Go Back</a>
            </div>
        </body>
        </html>";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

$conn->close();
?>
