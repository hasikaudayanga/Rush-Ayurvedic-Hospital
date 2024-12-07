<?php
		session_start();
		$reg_id= $_SESSION['doctor_reg_id'];

		include('../../api/db_config.php');

		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		
		$address=$_POST['address'];
		$contact_number=$_POST['contact_number'];
		$email_address=$_POST['email_address'];
		$doctor_charge=$_POST['doctor_charge'];
		$user_name=$_POST['user_name'];
		$passwords=$_POST['passwords'];
		

		$query="UPDATE `doctors_info` SET `first_name`='{$first_name}',`last_name`='{$last_name}',`address`='{$address}',`contact_number`='{$contact_number}',`email_address`='{$email_address}',`doctor_charge`='{$doctor_charge}',`user_name`='{$user_name}',`passwords`='{$passwords}' WHERE `doctor_reg_id`={$reg_id}
		";

		$result_set=mysqli_query($conn,$query);

		if($result_set){
			header('location:../index.php');
		}
