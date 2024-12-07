<?php 
	include('../../api/db_config.php');

	$errors=array();

	// Initialize an error message
    $error_message = '';

    // Check if fields are empty
    if (empty($user_name) || empty($password)) {
        $error_message = 'Username and password are required!';
    }

	if(!isset($_POST['user_name']) || strlen(trim($_POST['user_name']))<1){
		$errors[]="User Name Empty";
	}

	if(!isset($_POST['password']) || strlen(trim($_POST['password']))<1){
		$errors[]="password empty";
	}

	if(empty($errors)){

		$user_name=$_POST['user_name'];
		$password=$_POST['password'];

		$query="SELECT user_name,passwords FROM staff_info WHERE user_name='{$user_name}' AND passwords='{$password}'";

		$result_set=mysqli_query($conn,$query);

		

		if($result_set){
			if(mysqli_num_rows($result_set)==1){
				header('Location: dashboard.php');

			}
			$errors[]="invalid user name or password";
			$error_message = 'Invalid User Name or Password!';
			//echo "invalid user name or password <br>";
			//echo "<a href='../../customer/index.php'>back to Home</a>";
		}else{
			$errors[]="query fail";
		}
	}

	// If there's an error, show a popup and stop further processing
    if ($error_message) {
        echo "<script>alert('$error_message'); window.history.back();</script>";
        exit;
    }


 ?>