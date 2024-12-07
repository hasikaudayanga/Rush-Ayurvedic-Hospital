<?php
include('../../api/db_config.php');

// Initialize an empty response message
$response = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $user_name = $_POST['user_name'];
    $passwords = $_POST['passwords'];

    // Prepare SQL statement
    $sql = "INSERT INTO patients_info (first_name, last_name, address, age, contact_number, email_address, user_name, passwords)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Check database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing the query: " . $conn->error);
    }

    // Bind parameters to the query
    $stmt->bind_param("ssisssss", $first_name, $last_name, $address, $age, $contact_number, $email_address, $user_name, $passwords);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        $response = "Patient registered successfully!";
    } else {
        $response = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/project4.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
        }

        .card-header {
            background-color: #3498db;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .card-body {
            padding: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #dff2e4;
            border-color: #3498db;
            padding: 12px 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        a{
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white">
                        <h3 class="card-title mb-0 text-center">Patient Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <!-- Form to submit data -->
                        <form method="POST" action="" class="row g-3" id="memberForm" data-toggle="validator">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required>
                            </div>
                            <div class="col-md-12">
                                <label for="email_address" class="form-label">Patient Email</label>
                                <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Enter Email" required>
                            </div>
                            <div class="col-12">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Contact Number" required>
                            </div>
                            <div class="col-12">
                                <label for="registrationDate" class="form-label">Registration Date</label>
                                <input type="date" class="form-control" name="registrationDate" id="registrationDate" required>
                            </div>
                            <div class="col-md-6">
                                <label for="user_name" class="form-label">User Name</label>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter Username" required>
                            </div>
                            <div class="col-md-6">
                                <label for="passwords" class="form-label">Password</label>
                                <input type="passwords" class="form-control" name="passwords" id="passwords" placeholder="Enter Password" required>
                            </div>
                            
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- Show alert for success or error -->
                        <script type="text/javascript">
                            <?php if($response): ?>
                                alert("<?php echo $response; ?>");
											   
																			   
								 
																				
                                window.location.href = "index.php";  // Redirect after alert
                            <?php endif; ?>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/script/registerAndLogin.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="assets/jsgrid-1.5.3/jsgrid.min.js"></script>
    <script src="assets/script/jsgrid-example.js"></script>
    <script src="assets/bootstrap-5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
