<?php

include('../../api/db_config.php');
$data = file_get_contents("php://input");


$decodedData = json_decode($data, true);

if ($decodedData) {
   
    $name = $decodedData['name'];
    $id = $decodedData['id'];
  
    $three=3;
    $comment=$decodedData['comment'];

   
    echo "id: $id ,myc: $comment";

    

       $sql="UPDATE `appoinments_info` SET `comments`='{$comment}' WHERE `appoinment_id`='{$id}'";

        $result=mysqli_query($conn,$sql);
} else {
    echo "No valid data received.";
}
?>
