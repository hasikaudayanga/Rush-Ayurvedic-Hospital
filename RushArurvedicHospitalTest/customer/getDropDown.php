<?php
include('../api/db_config.php');

/**
 * Create a MySQLi database connection.
 *
 * @param string $host
 * @param string $user
 * @param string $password
 * @param string $dbname
 * @return mysqli
 */


/**
 * Fetch options for Dropdown 1.
 *
 * @param mysqli $connection
 * @return array
 */
function getConsultationTypesData($connection) {
    $query = "SELECT consultation_id, description FROM consultation_types"; // Adjust table name
    return fetchData($connection, $query);

    $results=fetchData($connection, $query);
    echo "{$results}";
}

/**
 * Fetch options for Dropdown 2.
 *
 * @param mysqli $connection
 * @return array
 */
function getDoctorsData($connection) {
    $query = "SELECT doctor_reg_id, concat(first_name , ' ', last_name) as doctor_name FROM doctors_info"; // Adjust table name
    return fetchData($connection, $query);
}

/**
 * Helper function to fetch data from the database.
 *
 * @param mysqli $connection
 * @param string $query
 * @return array
 */
function fetchData($connection, $query) {
    $result = $connection->query($query);

    if (!$result) {
        return ['error' => 'Error fetching data: ' . $connection->error];
    }

    $options = [];
    while ($row = $result->fetch_assoc()) {
        $options[] = $row;
    }

    return $options;
}

/**
 * Send JSON response to the client.
 *
 * @param array $data
 * @return void
 */
function sendJsonResponse($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// Main execution
$connection = createDatabaseConnection($host, $user, $password, $dbname);

// Determine which dropdown data to fetch based on the 'type' query parameter
$type = isset($_GET['type']) ? $_GET['type'] : null;

if ($type === 'consultation_type') {
    $data = getConsultationTypesData($connection);
} elseif ($type === 'doctor_name') {
    $data = getDoctorsData($connection);
} else {
    $data = ['error' => 'Invalid or missing type parameter.'];
}

// Send the response
sendJsonResponse($data);

// Close the database connection
$connection->close();
