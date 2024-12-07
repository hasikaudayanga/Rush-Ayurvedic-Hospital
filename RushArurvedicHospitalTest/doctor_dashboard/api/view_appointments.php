<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Responsive Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            margin: 30px;
            padding: 20px;
            border-radius: 10px;
            background: #f8faff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            width: 90%;
        }
        th {
            background-color: #0066cc;
            color: white;
            text-align: center;
        }
        .btn-approve {
            background-color: #28a745;
            color: white;
        }
        .btn-reject {
            background-color: #dc3545;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #eaf4ff;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                       
                        <th scope="col">Patient Name</th>
                        
                        <th scope="col">Address</th>
                        <th scope="col">Consultation Type</th>
                        <th scope="col">Doctor's Name</th>
                        <th scope="col">Appointment Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include '../../api/db_config.php';


                          if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                              $sql = "SELECT  a.appoinment_id , 
                                              p.email_address, 
                                              concat(p.first_name,' ', p.last_name) as p_name, 
                                              p.contact_number, 
                                              p.address, 
                                              c.description,
                                             
                                              a.appoinment_date_time, 
                                              concat(d.first_name, ' ', d.last_name) as d_name,
                                              a.status_id,
                                              a.comments
                                      FROM appoinments_info a, doctors_info d, patients_info p, consultation_types c 
                                      WHERE a.patient_id = p.patient_id 
                                              
                                              and a.consultation_id = c.consultation_id 
                                              and a.status_id = 1
                                              and d.doctor_reg_id = {$_SESSION['doctor_reg_id']}
                                      ";

                              $result = $conn->query($sql);
                              $appointments = array();

                              while ($row = $result->fetch_assoc()) {

                                  //$appointments[] = $row;
                                      echo "<td>{$row['appoinment_id']}</td>";
                                      
                                      echo "<td>{$row['p_name']}</td>";
                                      echo "<td>{$row['address']}</td>";
                                      
                                      echo "<td>{$row['description']}</td>";
                                      echo "<td>{$row['d_name']}</td>";
                                     
                                      echo "<td>{$row['appoinment_date_time']}</td>";
                                      echo "<tr>";
                              }
                              //echo json_encode($appointments);
                          }


                   ?>


               <!--<script>
                    
                            document.querySelectorAll('.select-btnss').forEach(button => {
                                button.addEventListener('click', function () {
                                   
                                    const row = this.closest('tr');
                                    
                                    const cells = row.querySelectorAll('td');
                                    
                                    const values = Array.from(cells).map(cell => cell.textContent.trim());
                                    
                                  
                                    const commentTextarea = row.querySelector('textarea');
                                    const commentValue = commentTextarea ? commentTextarea.value.trim() : '';



                                    
                                    fetch('api/add_comment.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify({
                                            id: values[0], // Assuming first column is ID
                                            name: values[1],
                                            contact_number: values[2],
                                            con_type: values[3],
                                            a_date: values[4],
                                            comment: commentValue, // Add the comment value
                                        }),
                                    })
                                    .then(response => response.text())
                                    .then(data => {
                                        console.log('Response from PHP:', data);
                                        commentTextarea.value = "";
                                    })
                                    .catch(error => console.error('Error:', error));



                                });
                            });



                  </script>-->
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
