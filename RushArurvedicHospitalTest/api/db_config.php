<?php
// db_config.php - Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "rush_aryurvedic_hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    //echo "Connection Success";
}

?>
