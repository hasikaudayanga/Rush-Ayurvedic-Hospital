<?php
include_once('../db_config.php');

// Initialize an error message
$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    // Sanitize and validate inputs
    $description = trim($_POST['description']);
    $treatments = trim($_POST['treatments']);
    $consultation_fee = trim($_POST['consultation_fee']);
    $status_id = "1";

    // Check if fields are empty
    if (empty($description)) {
        $errors[] = "Description is required.";
		$error_message = 'Description is required.';
    }
    if (empty($treatments)) {
        $errors[] = "Treatments are required.";
		$error_message = 'Treatments are required.';
    }
    if (empty($consultation_fee)) {
        $errors[] = "Consultation fee is required.";
		$error_message = 'Consultation fee is required.';
    }

    // Validate consultation fee is numeric
    if (!is_numeric($consultation_fee) || $consultation_fee <= 0) {
        $errors[] = "Consultation fee must be a positive number.";
		$error_message = 'Consultation fee must be a positive number.';
    }

    // If there are errors, redirect back with errors
    if (!empty($errors)) {
        session_start();
        $_SESSION['errors'] = $errors;
		// If there's an error, show a popup and stop further processing
		if ($error_message) {
			echo "<script>alert('$error_message'); window.history.back();</script>";
			
		}
        //header('Location: ../../admin/dashboard.php');
        exit;
    }

    // Use prepared statements to insert data
    $stmt = $conn->prepare("INSERT INTO `consultation_types` (`description`, `treatments`, `consultation_fee`, `status_id`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $description, $treatments, $consultation_fee, $status_id);

    if ($stmt->execute()) {
        // Redirect to dashboard with success message
        session_start();
        $_SESSION['success'] = "Consultation type added successfully.";
		$success_message = 'Consultation type added successfully.';
        //header('Location: ../../admin/dashboard.php');
    } else {
        // Handle insertion error
        session_start();
        $_SESSION['errors'] = ["Failed to add consultation type. Please try again."];
		$error_message = 'Failed to add consultation type. Please try again.';
        //header('Location: ../../admin/dashboard.php');
    }

	// If there's an error, show a popup and stop further processing
    if ($error_message) {
        echo "<script>alert('$error_message'); window.history.back();</script>";
        
    }

	if ($success_message) {
        echo "<script>alert('$success_message'); window.history.back();</script>";
        
    }

    $stmt->close();
    $conn->close();
}
?>
