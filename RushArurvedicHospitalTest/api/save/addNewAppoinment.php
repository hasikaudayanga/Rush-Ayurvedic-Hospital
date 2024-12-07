<?php 
	include_once('../db_config.php');




	$selectedOption=isset($_POST['patient_id']);
	//header('Location:../..a/admin/dashboard.php')
	if (!empty($selectedOption)) {
        echo "<h1>You selected: " . "{$selectedOption} ". "</h1>";
    } else {
        echo "<h1>No option selected!</h1>";
    }

 ?>