<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include('../api/db_config.php');


$patients = [];
$patient_sql = "SELECT patient_id, CONCAT(first_name, ' ', last_name) AS patient_name FROM patients_info";
$patient_result = $conn->query($patient_sql);
if ($patient_result->num_rows > 0) {
    while ($row = $patient_result->fetch_assoc()) {
        $patients[] = $row;
    }
}


$consultations = [];
$consultation_sql = "SELECT consultation_id, description FROM consultation_types";
$consultation_result = $conn->query($consultation_sql);
if ($consultation_result->num_rows > 0) {
    while ($row = $consultation_result->fetch_assoc()) {
        $consultations[] = $row;
    }
}


$doctors = [];
$doctor_sql = "SELECT doctor_reg_id, CONCAT(first_name, ' ', last_name) AS doctor_name FROM doctors_info";
$doctor_result = $conn->query($doctor_sql);
if ($doctor_result->num_rows > 0) {
    while ($row = $doctor_result->fetch_assoc()) {
        $doctors[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #d5faa2;
            padding: 20px;
        }
        .form-container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            margin-bottom: 25px;
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2 class="form-title">Create Appointment</h2>
        <form id="appointmentForm" action="../api/save/saveAppoinment.php" method="POST">
            
            <!-- Patient Name -->
            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient Name</label>
                <select class="form-select" id="patient_id" name="patient_id" required>
                    <option value="" selected>Select Patient Name</option>
                    <?php foreach ($patients as $patient): ?>
                        <option value="<?= htmlspecialchars($patient['patient_id']); ?>">
                            <?= htmlspecialchars($patient['patient_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Consultation Type -->
            <div class="mb-3">
                <label for="consultation_id" class="form-label">Consultation Type</label>
                <select class="form-select" id="consultation_id" name="consultation_id" required>
                    <option value="" selected>Select Consultation Type</option>
                    <?php foreach ($consultations as $consultation): ?>
                        <option value="<?= htmlspecialchars($consultation['consultation_id']); ?>">
                            <?= htmlspecialchars($consultation['description']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Appointment Date & Time -->
            <div class="mb-3">
                <label for="appointmentDateTime" class="form-label">Appointment Date & Time</label>
                <input type="datetime-local" class="form-control" id="appointmentDateTime" name="appointmentDateTime" required>
            </div>

            <!-- Doctor Name -->
            <div class="mb-3">
                <label for="doctor_id" class="form-label">Doctor Name</label>
                <select class="form-select" id="doctor_id" name="doctor_id" required>
                    <option value="" selected>Select Doctor Name</option>
                    <?php foreach ($doctors as $doctor): ?>
                        <option value="<?= htmlspecialchars($doctor['doctor_reg_id']); ?>">
                            <?= htmlspecialchars($doctor['doctor_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Comments -->
            <div class="mb-3">
                <label for="comments" class="form-label">Comments</label>
                <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter any additional comments"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Submit Appointment</button>
        </form>
    </div>

</body>
</html>
