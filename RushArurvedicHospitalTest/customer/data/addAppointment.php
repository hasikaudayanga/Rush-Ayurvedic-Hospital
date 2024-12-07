<?php 
		if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                }


include('../../api/db_config.php');
if(isset($_POST['submit'])){
       
        $doctor_id=$_POST['doctor_reg_id'];
        
        $patient_id=1005;
        $consultation_id=$_POST['consultation_id'];
        ctype_digit($consultation_id);
        echo $consultation_id;
        $date=$_POST['app_date'];
        $comment="";
        $status_id=0;


    

        


        $sql="INSERT INTO `appoinments_info`( `patient_id`, `consultation_id`, `appoinment_date_time`, `doctor_id`, `comments`, `status_id`) VALUES ('{$patient_id}','{$consultation_id}','{$date}','{$doctor_id}','{$comment}','{$status_id}')";

        $result=mysqli_query($conn,$sql);

        if($result){
                        echo "success";
        }else{
                echo "fail". mysqli_error($conn);
        }
    }
    

    header('Location:../../customer/dashboard.php');


$conn->close();


?>