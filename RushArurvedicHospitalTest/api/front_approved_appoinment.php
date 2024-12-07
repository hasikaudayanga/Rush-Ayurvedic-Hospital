<?php
//header('Content-Type: application/json');
include 'db_config.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT  a.appoinment_id , 
                    p.email_address, 
                    concat(p.first_name,' ', p.last_name) as p_name, 
                    p.contact_number, 
                    p.address, 
                    c.description,
                   
                    a.appoinment_date_time, 
                    concat(d.first_name, ' ', d.last_name) as d_name,
                    a.status_id 
            FROM appoinments_info a, doctors_info d, patients_info p, consultation_types c 
            WHERE a.patient_id = p.patient_id 
                    and a.doctor_id = d.doctor_reg_id 
                    and a.consultation_id = c.consultation_id 
                    and a.status_id = 1
            ";

            if ($result=mysqli_query($conn,$sql))
              {
              
              $rowcount=mysqli_num_rows($result);
              print_r($rowcount);
              }
    
}



$conn->close();
?>
