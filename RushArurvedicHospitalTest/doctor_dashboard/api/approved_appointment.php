

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Table</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom table container */
    .table-container {
      margin: 30px auto;
      max-width: 95%;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    /* Table header */
    .table thead {
      background: linear-gradient(90deg, #009900, #00cc00);
      color: #fff;
    }

    /* Table rows */
    .table tbody tr {
      transition: all 0.3s ease-in-out;
    }

    .table tbody tr:hover {
      background-color: #f0fdf4;
      transform: scale(1.01);
      cursor: pointer;
    }

    /* Table data */
    .table td, .table th {
      text-align: center;
      vertical-align: middle;
      padding: 15px;
    }

    /* Action buttons */
    .btn-action {
      font-size: 0.85rem;
      padding: 5px 10px;
     
      margin-right: 10px;
      transition: background-color 0.2s ease-in-out;
    }

    .btn-action:hover {
      opacity: 0.9;
    }

    .btn-success {
      background-color: #4caf50;
      border: none;
    }

    .btn-danger {
      background-color: #e53935;
      border: none;
    }
  </style>
</head>
<body>

<div class="table-container">
  <table class="table table-hover align-middle">
    <thead>
      <tr>
        <th scope="col">Id</th>
        
        <th scope="col">Patient Name</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Consultation Type</th>
        <th scope="col">Appointment Date</th>
        <th scope="col">Type Comment</th>
        <th scope="col">Action</th>
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
                                      echo "<td>{$row['contact_number']}</td>";
                                      
                                      echo "<td>{$row['description']}</td>";
                                     
                                      echo "<td>{$row['appoinment_date_time']}</td>";
                                       echo "<td><textarea class='form-control'  rows='2' id='txtarea'>{$row['comments']}</textarea></td>";

                                      echo "<td><button class='btn btn-sm btn-success btn-action select-btnss'  >Comment</button></td>";
                                      echo "<tr>";
                              }
                              //echo json_encode($appointments);
                          }


                   ?>


               <script>
                    
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



                  </script>
      
     
      
    </tbody>
  </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
