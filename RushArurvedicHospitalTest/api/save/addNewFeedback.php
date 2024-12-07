<?php 
	include_once('../db_config.php');


	if(isset($_POST['submit'])){
		$feedbackLevel=$_POST['txtfeedbackLevel'];
		$feedback_comment=$_POST['txtFeedbackComment'];
		$patient_id=1005;
		$rating=0;

			if($feedbackLevel=="Very Satisfied"){
				$rating=5;
			}elseif ($feedbackLevel=="Satisfied") {
				$rating=4;
			}elseif ($feedbackLevel=="Neutral") {
				$rating=3;
			}elseif ($feedbackLevel=="Dissatisfied") {
				$rating=2;
			}else{
				$rating=1;
			}

		


		$sql="INSERT INTO `feedback`( `patient_id`, `feedback_comment`, `feedback_rating`) VALUES ('{$patient_id}','{$feedbackLevel}','{$rating}')";

		$result=mysqli_query($conn,$sql);
	}
	

	header('Location:../../customer/dashboard.php')


 ?>