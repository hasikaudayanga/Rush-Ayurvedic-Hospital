<?php 

	session_start();
	
	include('../../api/db_config.php');

	$errors=array();

	if(!isset($_POST['user_name']) || strlen(trim($_POST['user_name']))<1){

		$errors[]="Empty User Name";
	}
	
	if(!isset($_POST['password']) || strlen(trim($_POST['password']))<1){
		$errors[]="Empty Password";
	}	

	if(empty($errors)){

		$_SESSION['user_name']=$_POST['user_name'];

		$user_name=$_POST['user_name'];
		$password=$_POST['password'];

		$query="SELECT `user_name`, `passwords`,`doctor_reg_id`, concat(first_name,' ', last_name) as d_name FROM `doctors_info` WHERE user_name ='{$user_name}' AND passwords='{$password}';";

		$result_set=mysqli_query($conn,$query);
		if($result_set){

			if(mysqli_num_rows($result_set)==1){

				$data=mysqli_fetch_assoc($result_set);
				$_SESSION['user_name']=$data['user_name'];
				$_SESSION['doctor_reg_id']=$data['doctor_reg_id'];
				$_SESSION['d_name']=$data['d_name'];

				header('location:../index.php');

			}else{
				$errors[]="Invalid User";
				echo "invalid user_name or password <br>";
				echo "<a href='../doc_login.php'>Back To Login Page</a>";
			}
			$errors[]="Query failed";
			
			
		}
		

	}

	//print_r($errors);


 ?>