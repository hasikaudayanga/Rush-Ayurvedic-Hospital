<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctor Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            margin: 30px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
            color: #0066cc;
        }
        .btn-submit {
            background-color: #009900;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h3 class="form-header">Update Doctor Information</h3>

            <?php  
                include('../../api/db_config.php');

                $query="SELECT * FROM doctors_info WHERE doctor_reg_id={$_SESSION['doctor_reg_id']}";

                $result_set=mysqli_query($conn,$query);
                if($result_set){
                    if(mysqli_num_rows($result_set)==1){

                        $row=mysqli_fetch_assoc($result_set);

                        echo $row['first_name'];


                    }   

                }
               

            ?>
            <form id="updateForm" method="POST" action="api/update_details.php">
                <div class="mb-3">
                    <label for="doctorRegId" class="form-label" >Doctor Registration ID</label>
                    <input type="text" class="form-control" id="doctorRegId" name="doctor_reg_id" value="<?php echo $row['doctor_reg_id']; ?>" disabled>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo $row['first_name']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo $row['last_name']; ?>">
                    </div>
                </div>
                
                
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
                </div>
                <div class="mb-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contactNumber" name="contact_number" value="<?php echo $row['contact_number']; ?>">
                </div>
                <div class="mb-3">
                    <label for="emailAddress" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="emailAddress" name="email_address" value="<?php echo $row['email_address']; ?>">
                </div>
                <div class="mb-3">
                    <label for="doctorCharge" class="form-label">Doctor Charge</label>
                    <input type="number" class="form-control" id="doctorCharge" name="doctor_charge" value="<?php echo $row['doctor_charge']; ?>">
                </div>
                <div class="mb-3">
                    <label for="userName" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="userName" name="user_name" value="<?php echo $row['user_name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="passwords" value="<?php echo $row['passwords']; ?>">
                </div>
                <button type="submit" class="btn btn-submit btn-block" name="submit">Update</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
