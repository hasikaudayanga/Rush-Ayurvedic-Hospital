<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rejected appointment List</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .table-container {
      margin-top: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    body {
            background-color: #d5faa2;
            padding: 20px;
        }
    .table-header {
      background-color: #e9f7e9;
      padding: 15px;
      border-bottom: 1px solid #ddd;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .table-header h4 {
      margin: 0;
      color: #333;
    }

    .table-header input {
      max-width: 300px;
    }

    .custom-table th, 
    .custom-table td {
      text-align: center;
      vertical-align: middle;
    }

    .btn-approve {
      background-color: #28a745;
      color: #fff;
      border: none;
    }

    .btn-reject {
      background-color: #dc3545;
      color: #fff;
      border: none;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="table-container">
      <div class="table-header">
        
        <div class="input-group">
          
          
          <h6><a href="dashboard.php">Back To Main Page</a></h6>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-bordered custom-table">
          <thead class="table-light">
            <tr>
              
              <th scope="col">RejectedId</th>
              <th scope="col">Customer Email</th>
              <th scope="col">Name</th>
              <th scope="col">Contact Number</th>
              <th scope="col">Address</th>
              <th scope="col">Consultation Type</th>
              <th scope="col">Appointment Date</th>
              <th scope="col">Reason</th>
            </tr>
          </thead>
          <tbody>
            		<?php 
                      include('../api/db_config.php');
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
                                          and a.doctor_id = d.doctor_reg_id 
                                          and a.consultation_id = c.consultation_id 
                                          and a.status_id = 2
                                  ";
                          $result = $conn->query($sql);
                          $appointments = array();
                          while ($row = $result->fetch_assoc()) {
                             // $appointments[] = $row;
                              //print_r($row);

                                  echo "<td>{$row['appoinment_id']}</td>";
                                  echo "<td>{$row['email_address']}</td>";
                                  echo "<td>{$row['p_name']}</td>";
                                  echo "<td>{$row['contact_number']}</td>";
                                  echo "<td>{$row['address']}</td>";
                                  echo "<td>{$row['description']}</td>";
                                  
                                  echo "<td>{$row['appoinment_date_time']}</td>";
                                  echo "<td>{$row['comments']}</td>";
                                  

                                  
                                  
                                                    
                                                                            //echo "<td><button type='button' class='btn-primary'>Action</button></td>";
                                  
                                
          
                                  echo "<tr>";
                                }
                              }
                   ?>


            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap Icons (Optional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
