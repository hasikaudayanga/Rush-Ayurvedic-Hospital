<?php 
	include_once('../db_config.php');

	$error_message = '';
	$success_message = '';

	if(isset($_POST['submit'])){
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$consultation_id=$_POST['consultation_id'];
		$consultationData = $_POST['consultation'] ?? '';
		$job_description=$_POST['job_description'];
		$address=$_POST['address'];
		$contact_number=$_POST['contact_number'];
		$email_address=$_POST['email_address'];
		$doctor_charge=$_POST['doctor_charge'];
		$user_name=$_POST['user_name'];
		$passwords=$_POST['passwords'];

		if (!empty($consultationData)) {
			list($consultation_id, $description) = explode('|', $consultationData);
	
			// Use $consultation_id and $description as needed
			$consult_id =  htmlspecialchars($consultation_id);
			$consult_desc = htmlspecialchars($description);
		} else {
			$errors[] = "Please select a consultation type.";
			$error_message = 'Please select a consultation type.';
		}

		if (empty($first_name) || empty($last_name)) {
			$errors[] = "Doctor Name cannot be Empty";
			$error_message = 'Doctor Name cannot be Empty';
		}

		if (empty($job_description)) {
            $errors[] = "Job Description is required.";
			$error_message = 'Job Description is required.';
        }

        if (empty($address)) {
            $errors[] = "Address is required.";
			$error_message = 'Address is required.';
        }

        if (empty($contact_number)) {
            $errors[] = "Contact Number is required.";
			$error_message = 'Contact Number is required.';
        } elseif (!preg_match('/^[0-9]{10}$/', $contact_number)) {
            $errors[] = "Contact Number must be a 10-digit number.";
			$error_message = 'Contact Number must be a 10-digit number.';
        }

        if (empty($email_address)) {
            $errors[] = "Email Address is required.";
			$error_message = 'Email Address is required.';
        } elseif (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid Email Address format.";
			$error_message = 'Invalid Email Address format.';
        }

        if (empty($doctor_charge)) {
            $errors[] = "Doctor Charge is required.";
			$error_message = 'Doctor Charge is required.';
        } elseif (!is_numeric($doctor_charge)) {
            $errors[] = "Doctor Charge must be a numeric value.";
			$error_message = 'Doctor Charge must be a numeric value.';
        }

        if (empty($user_name)) {
            $errors[] = "Username is required.";
			$error_message = 'Username is required.';
        }

        if (empty($passwords)) {
            $errors[] = "Password is required.";
			$error_message = 'Password is required.';
        } elseif (strlen($passwords) < 6) {
            $errors[] = "Password must be at least 6 characters long.";
			$error_message = 'Password must be at least 6 characters long.';
        }
		
		if (!empty($errors)) {
			session_start();
			$_SESSION['errors'] = $errors;
			// If there's an error, show a popup and stop further processing
			if ($error_message) {
				echo "<script>alert('$error_message'); window.history.back();</script>";
				
			}
			exit;
		}

		$sql="INSERT INTO doctors_info( first_name, last_name, consultation_id, job_description, address, contact_number, email_address, doctor_charge, user_name, passwords) VALUES ('{$first_name}','{$last_name}','{$consult_id}','{$job_description}','{$address}','{$contact_number}','{$email_address}','{$doctor_charge}','{$user_name}','{$passwords}')";

		$result=mysqli_query($conn,$sql);
		
		if ($result){
			$success_message = 'Doctor added successfully.';
		}
		else {
			$error_message = 'Failed to save Doctor Account';
		}
		if ($error_message) {
			echo "<script>alert('$error_message'); window.history.back();</script>";
			
		}
	
		if ($success_message) {
			echo "<script>alert('$success_message'); window.history.back();</script>";
			
		}
		}
	
 ?>