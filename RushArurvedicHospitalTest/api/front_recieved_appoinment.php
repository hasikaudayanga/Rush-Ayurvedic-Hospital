<?php 
	include_once('db_config.php');

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = " SELECT * FROM appoinments_info";
            
    

			if ($result=mysqli_query($conn,$sql))
			  {
			  
			  $rowcount=mysqli_num_rows($result);
			  print_r($rowcount);
			  }
	}



 ?>