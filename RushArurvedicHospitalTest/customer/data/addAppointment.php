<?php 
		if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                }


include('../../api/db_config.php');

$error_message = '';
if(isset($_POST['submit'])){
       
        $doctor_id=isset($_POST['doctor_reg_id']) ? intval($_POST['doctor_reg_id']) : 0;
        $patient_id=$_SESSION['patient_id'];
        $consultation_id=isset($_POST['consultation_id']) ? intval($_POST['consultation_id']) : 0;
        ctype_digit($consultation_id);
        echo $consultation_id;
        $date=$_POST['app_date'];
        $comment="";
        $status_id=0;
        
        if ($doctor_id == 0){
                $errors[] = "Please select Doctor";
                $error_message = 'Please select Doctor';
        }

        if ($consultation_id == 0){
                $errors[] = "Please select Consultation Type";
                $error_message = 'Please select Consultation Type';
                echo 'errr';
        }

        if (!empty($errors)) {
                session_start();
                $_SESSION['errors'] = $errors;
                        // If there's an error, show a popup and stop further processing
                        if ($error_message) {
                                echo "<script>alert('$error_message'); window.history.back();</script>";
                                
                        }
                //header('Location: ../../admin/dashboard.php');
                exit;
            }

        $sql="INSERT INTO `appoinments_info`( `patient_id`, `consultation_id`, `appoinment_date_time`, `doctor_id`, `comments`, `status_id`) VALUES ('{$patient_id}','{$consultation_id}','{$date}','{$doctor_id}','{$comment}','{$status_id}')";

        $result=mysqli_query($conn,$sql);

        if($result){
                        echo "success";
        }else{
                echo "fail". mysqli_error($conn);
        }

        if ($error_message) {
                echo "<script>alert('$error_message'); window.history.back();</script>";
                
        }
    }
    

    header('Location:../../customer/dashboard.php');


$conn->close();


?>