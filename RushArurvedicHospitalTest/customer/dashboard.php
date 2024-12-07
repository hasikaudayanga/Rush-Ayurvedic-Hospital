<?php 
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Dashboard</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/bootstrap-5.1.3/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="assets/jsgrid-1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="assets/jsgrid-1.5.3/jsgrid-theme.min.css" />
  <link rel="stylesheet" href="assets/style/style.css">  
</head>

<body class="dark-layout">

  <header class="dz__header">
    <div class="dz__header__container">
      <span class="shrink-btn">
          <i class="bx bx-menu"></i>
      </span>
      <h2>Patient Dashboard</h2>
      <div class="dz__header__group_right"> 
        <img id="customerImage" alt="" class="dz__header__img">
          <div class="dz__header__theme_selector dark-layout px-2" id="theme-selector"> 
               <i class='bx bxs-moon'></i>
          </div>  
      </div>
      <span class="dz__header__toggle" id="dz-header-toggle">
          <i class="bx bx-menu"></i>
      </span>
  </div>
  </header>

  <nav id="dzNavBar">
    <div class="sidebar-top">
      <img src="assets/images/billlogo.jpg" class="logo" id="dzIcon" alt="">
      <h5 class="dz__sidebar__title"><?php echo $_SESSION['p_name']; ?></h5>
      <input type="hidden" id="patientName" name="patientName"> <!-- Hidden field to store patientName -->
  </div>

    <div>
      <div class="dz__nav__list">
        <dv class="dz__nav__items">
          <div class="dz__nav__dropdown">
            <a href="#" class="dz__nav__link dz__nav__link_dd">
              <i class="bi bi-calendar-check dz__nav__icon"></i>
              <span class="dz__nav__name">APPOINTMENTS</span>
              <i class="bx bx-chevron-right dz__nav__dropdown-icon"></i>
            </a>
            <div class="dz__nav__dropdown-collapse">
              <div class="dz__nav__dropdown-content">
                <a href="#" class="dz__nav__dropdown-item">Create Appointments</a>
                <a href="#" class="dz__nav__dropdown-item">Approved Appointments</a>
              </div>
            </div>
          </div>
          
          <div class="dz__nav__dropdown">
            <a href="#" class="dz__nav__link dz__nav__link_dd">
              <i class="bi bi-calendar-check dz__nav__icon"></i>
              <span class="dz__nav__name">Appointments History</span>
              <i class="bx bx-chevron-right dz__nav__dropdown-icon"></i>
            </a>
            <div class="dz__nav__dropdown-collapse">
              <div class="dz__nav__dropdown-content">
                <a href="#" class="dz__nav__dropdown-item">Completed Appointments Details</a>
                <a href="#" class="dz__nav__dropdown-item">Rejected Appointments Details</a>
              </div>
            </div>
          </div>
          <div class="dz__nav__dropdown">
            <a href="#" class="dz__nav__link dz__nav__link_dd">
              <i class="bi bi-chat-dots dz__nav__icon"></i>
              <span class="dz__nav__name">FEEDBACK</span>
              <i class="bx bx-chevron-right dz__nav__dropdown-icon"></i>
            </a>
            <div class="dz__nav__dropdown-collapse">
              <div class="dz__nav__dropdown-content">
                <a href="#" class="dz__nav__dropdown-item">Feedback</a>
              </div>
            </div>
          </div>
          <div class="dz__nav__dropdown">
            <a href="#" class="dz__nav__link dz__nav__link_dd">
              <i class="bi bi-gear dz__nav__icon"></i>
              <span class="dz__nav__name">SETTING</span>
              <i class="bx bx-chevron-right dz__nav__dropdown-icon"></i>
            </a>
            <div class="dz__nav__dropdown-collapse">
              <div class="dz__nav__dropdown-content">
                <!--<a href="#" class="dz__nav__dropdown-item">Edit Profile</a>
                <a href="#" class="dz__nav__dropdown-item">Change Password</a>-->
                <a href="#" class="dz__nav__dropdown-item">Log Out</a>
              </div>
            </div>
          </div>
        </dv>
      </div>
    </div>
    <div class="sidebar-footer">
      <div class="admin-user tooltip-element" data-tooltip="1">
        <a href="#" class="log-out">
          <i class='bx bx-log-out'></i>
        </a>
      </div>
    </div>
  </nav>

<!-- Main content for Dashboard -->
  <main class="dz__main" id="dashboardMain">
    <div class="container-fluid my-2">
    
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card card-custom border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-uppercase total-users">
                                Approval Pending Appointments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="pendingAppointmentsCount">
                              <?php include ('data/dashboard_approval_pending.php'); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bxs-calendar-event bx-lg text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card card-custom border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-uppercase total-users">
                               Total Approved Appointments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="customerApprovedAppointmentsCount">
                              <?php include ('data/dashboard_approvaled.php'); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-check-double bx-lg text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card card-custom border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-uppercase total-users">
                                Total Completed Appointment</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="customerCompletedAppointmentsCount">
                            <?php include ('data/dashboard_completed.php'); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bxs-book bx-lg text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>    
  </main>
<!------------------------------------------------------------------------------------------------------------------------>
   <!-- Main content for addAppointment page -->

   <?php 

      include('../api/db_config.php');

      $consultations=[];

      $query="SELECT consultation_id,description FROM consultation_types";
      $result_set=mysqli_query($conn,$query);

      if($result_set){
          if(mysqli_num_rows($result_set)>0){

              while($row=mysqli_fetch_assoc($result_set)){
                  $consultations[]=$row;
              } 
          }
      }




      $doctors=[];

      $doc_query="SELECT doctor_reg_id , CONCAT(first_name ,' ',last_name) AS doctor_name FROM doctors_info";

      $doc_result_set=mysqli_query($conn,$doc_query);

      if($doc_result_set){
          if(mysqli_num_rows($doc_result_set)>0){

              while($rows=mysqli_fetch_assoc($doc_result_set)){
                $doctors[]=$rows;
              }
          }
      }
 
      
    ?>
  <main class="dz__main" id="addAppointmentMain" style="display: none;">
    <div class="container-fluid my-2">

      <div class="card card-custom">
        <div class="card-header">
          <h3 class="card-title">CREATE APPOINTMENT</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-8 col-xs-12">
              <form method="POST" action="data/addAppointment.php" class="row g-2" id="memberForm"
                data-toggle="validator" novalidate="true">
                <!-- <div class="col-md-6">
                  <label for="vehicleNumber" class="form-label">Vehicle Number</label>
                  <input type="vehicleNumber" class="form-control" id="vehicleNumber" placeholder="">
                </div> -->
                <div class="col-6">
                  <label for="consultation_type" class="form-label">Consultation Type</label>
                  <select ignore="true"  class="form-control dz-selectpicker" data-show-subtext="true"
                    id="consultation_id" name="consultation_id" required ignore-edit>
                    <option value="0" selected disabled>Please choose Consultation Type</option>

                    <?php foreach($consultations as $consultation): ?>
                    <option value="<?=htmlspecialchars($consultation['consultation_id']);?>">
                        <?=htmlspecialchars($consultation['description']);?>
                    </option>
                  <?php endforeach; ?>
                  </select>        
                </div>
                <div class="col-6">
                  <label for="doctor_name" class="form-label">Doctor's Name</label>
                  <select ignore="true"  class="form-control dz-selectpicker" data-show-subtext="true" data-live-search="true"
                    id="doctor_name" name="doctor_reg_id" value-name="id" display-name="name" required ignore-edit>
                    <option value="0" selected disabled>Please choose doctor's name</option>
                    <?php foreach($doctors as $doctor): ?>

                      <option value="<?=htmlspecialchars($doctor['doctor_reg_id']);?>">
                        <?=htmlspecialchars($doctor['doctor_name']);?>

                      </option>
                    <?php endforeach; ?>
                  </select>        
                </div> 
                <div class="col-12">
                  <label for="appoinment_date_time" class="form-label">Appointment Date</label>
                  <input type="datetime-local" class="form-control" id="serviceDate" placeholder="" name="app_date">
                </div>

                <div class="card-footer">
                <div class="col-12">
                  <button type="submit" name="submit" class="btn btn-primary" value="added">Add Appointment</button>
                  <button id="btnClearAppointment" class="btn btn-danger" type="button">Clear</button>
                </div>
        </div>
              </form>
            </div>
          </div>          
        </div>
        
      </div> 
    </div> 
    <div class="card card-custom mt-1">
      <div class="card-header">
        <h3 class="card-title">Approval Pending Appointment List</h3>
      </div>
      <div class="card-body">
        <row>
          <div class="col-sm-12 col-lg-12 col-xs-12">
            <table class="table" id="selectedBookEntryGrid">
              <thead>
              <tr>
                
                <th scope="col">AppointmentId</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Consulation Type</th>
                <th scope="col">Doctor's Name</th>
                <th scope="col">Appoinment Date & Time</th>
                <th scope="col">Status</th>
              </tr>
              </thead>
              <tbody id="pendingAppointments">

                  <?php 
                      include('../api/db_config.php');
                      $patientid = $_SESSION['patient_id'];
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
                                          and a.status_id = 0
                                          and p.patient_id = $patientid
                                  ";
                          $state="pending";
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
                                  echo "<td>{$row['d_name']}</td>";
                                  echo "<td>{$row['appoinment_date_time']}</td>";
                                  echo "<td>{$state}</td>";
                                  
                                  

                                  
                                  
                                                    
                                                                            //echo "<td><button type='button' class='btn-primary'>Action</button></td>";
                                  
                                
          
                                  echo "<tr>";
                                }
                              }
                   ?>

               

                
              </tbody>
          </table>
          </div>
        </row>
      </div>
    </div>
  </div>

    <!-- Modal for updating appointments -->
<div class="modal fade" id="updateAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="updateAppointmentModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document"> <!-- Added modal-dialog-centered class -->
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="updateAppointmentModalLabel">Update Appointment Data</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <!-- Form to update Appointment data -->
      <form id="updateAppointmentForm">
        <!-- <div class="form-group">
          <label for="updateVehicleNumber">Vehicle Number</label>
          <input type="text" class="form-control" id="updateAppointmentVehicleNumber" name="updateVehicleNumber">
        </div> -->
        <div class="form-group">
          <label for="updateCarBrand" class="form-label">Car Brand</label>
          <select ignore="true" class="form-control dz-selectpicker" data-show-subtext="true"
            id="updateAppointmentCarBrand" name="updateCarBrand" required ignore-edit>
            <option>Toyota</option>
            <option>Suzuki</option>
            <option>Nissan</option>
            <option>Honda</option>
            <option>Mitsubishi</option>
          </select>  
        </div>
        <div class="form-group">
          <label for="updateCarModel">Car Model</label>
          <input type="text" class="form-control" id="updateAppointmentCarModel" name="updateCarModel">
        </div>
        <div class="form-group">
          <label for="serviceCategory" class="form-label">Service Category</label>
          <select ignore="true" class="form-control dz-selectpicker" data-show-subtext="true" data-live-search="true"
            id="updateAppointmentServiceCategory" name="serviceCategory" value-name="id" display-name="name" required ignore-edit>
              <option value="" selected disabled>Please choose Service Category</option>
          </select> 
        </div>
        <div class="form-group">
          <label for="updateServiceDate">Service Date</label>
          <input type="date" class="form-control" id="updateAppointmentServiceDate" name="updateServiceDate">
        </div>
        <!-- Add more fields as needed -->
        <input type="hidden" id="receivedAppointmentIdToUpdate" name="receivedAppointmentIdToUpdate"> <!-- Hidden field to store serviceId -->
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" onclick="updateAppointment()">Update Appointment</button>
    </div>
  </div>
</div>
</div>
  </main>

  <!---------------------------------------------------------------------------------------------------------------------------->

   <!-- Main content for approved Appointment page -->
   <main class="dz__main" id="approvedAppointmentMain" style="display: none;">
    <div class="container-fluid my-2"> 
    <div class="card card-custom mt-1">
      <div class="card-header">
        <h3 class="card-title">Approved Appointment List</h3>
      </div>
      <div class="card-body">
        <row>
          <div class="col-sm-12 col-lg-12 col-xs-12">
            <div class="table-responsive">
              <table class="table" id="selectedBookEntryGrid">
                <thead>
                <tr>
                
                  <th scope="col">Appoinment Id</th>
                  <th scope="col">Consultation Type</th>
                  <th scope="col">Doctor's Name</th>
                  <th scope="col">Appinment Date & Time</th>
                  
                </tr>
                </thead>
                <tbody id="approvedAppointments">

                   <?php 
                      include('../api/db_config.php');
                      $patientid = $_SESSION['patient_id'];
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
                                          and p.patient_id = $patientid
                                  ";
                          $result = $conn->query($sql);
                          $appointments = array();
                          while ($row = $result->fetch_assoc()) {
                             // $appointments[] = $row;
                              //print_r($row);

                                  echo "<td>{$row['appoinment_id']}</td>";
                                  
                                 
                                  echo "<td>{$row['description']}</td>";
                                  echo "<td>{$row['d_name']}</td>";
                                  echo "<td>{$row['appoinment_date_time']}</td>";
                                  
                                  

                                  
                                  
                                                    
                                                                            //echo "<td><button type='button' class='btn-primary'>Action</button></td>";
                                  
                                
          
                                  echo "<tr>";
                                }
                              }
                   ?>
                  
                </tbody>
            </table>
            </div> 
          </div>
        </row>
      </div>
    </div>
  </div>

</div>
</div>
</main>

<!------------------------------------------------------------------------------------------------------------------------>
   <!-- Main content for report page -->
   <main class="dz__main" id="reportMain"  style="display: none;">
    <div class="container-fluid my-2"> 
        <div class="card card-custom mt-1">
            <div class="card-header">
                <h3 class="card-title">Completed Appointments Details</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="selectedBookEntryGrid">
                        <thead>
                            <tr>
                                
                                <th scope="col">Appoinment Id</th>
                                <th scope="col">Customer Email</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Contact Nu.</th>
                                <th scope="col">Address</th>
                                <th scope="col">Consultation Type</th>
                                <th scope="col">Doctor's Name</th>
                                <th scope="col">Appinment Date & Time</th>
                                <th scope="col">Doctor Comment</th>
                                <th scope="col">Total Fee(Rs.)</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="completedReport">
                            
                              <?php 
                                  include '../api/db_config.php';
                                  $patientid = $_SESSION['patient_id'];
                                  echo "<script>console.log(" . json_encode(value: $patientid) . ");</script>";


                              if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                                  $sql = "SELECT  p.patient_id , 
                                                  p.email_address, 
                                                  concat(p.first_name,' ', p.last_name) as p_name, 
                                                  p.contact_number, 
                                                  p.address, 
                                                  c.description,
                                                  a.appoinment_id,
                                                  a.appoinment_date_time, 
                                                  concat(d.first_name, ' ', d.last_name) as d_name,
                                                  c.consultation_fee,
                                                  d.doctor_charge,
                                                  (c.consultation_fee + d.doctor_charge) AS total_fee,
                                                  a.status_id,
                                                  a.comments 
                                          FROM appoinments_info a, doctors_info d, patients_info p, consultation_types c 
                                          WHERE a.patient_id = p.patient_id 
                                                  and a.doctor_id = d.doctor_reg_id 
                                                  and a.consultation_id = c.consultation_id 
                                                  and a.status_id = 3  
                                                  and p.patient_id = $patientid    
                                          ORDER BY a.appoinment_id desc
                                                 

                                          ";

                                  $state="completed";
                                  $result = $conn->query($sql);
                                  $appointments = array();
                                  while ($row = $result->fetch_assoc()) {
                                      //$appointments[] = $row;

                                          echo "<td>{$row['appoinment_id']}</td>";
                                          echo "<td>{$row['email_address']}</td>";
                                          echo "<td>{$row['p_name']}</td>";
                                          echo "<td>{$row['contact_number']}</td>";
                                          echo "<td>{$row['address']}</td>";
                                          echo "<td>{$row['description']}</td>";
                                          echo "<td>{$row['d_name']}</td>";
                                          echo "<td>{$row['appoinment_date_time']}</td>";
                                          echo "<td>{$row['comments']}</td>";
                                          echo "<td>{$row['total_fee']}</td>";
                                          
                                          echo "<td>{$state}</td>";
                                          
                                          echo "<tr>";
                                  }
                                  //echo json_encode($appointments);
                              }


                             ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!------------------------------------------------------------------------------------------------------------------------>
<!-- Main content for Rejected Appointment page -->
<main class="dz__main" id="rejectedAppointmentMain" style="display: none;">
  <div class="container-fluid my-2"> 
  <div class="card card-custom mt-1">
    <div class="card-header">
      <h3 class="card-title">Rejected Appointment Details</h3>
    </div>
    <div class="card-body">
      <row>
        <div class="col-sm-12 col-lg-12 col-xs-12">
          <table class="table" id="selectedBookEntryGrid">
            <thead>
            <tr>
              
              <th scope="col">Appoinment Id</th>
              <th scope="col">Customer Email</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Contact Nu.</th>
              <th scope="col">Address</th>
              <th scope="col">Consultation Type</th>
              <th scope="col">Doctor's Name</th>
              <th scope="col">Appinment Date & Time</th>
              <th scope="col">Doctor Comment</th>
              <th scope="col">Total Fee(Rs.)</th>
              <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody id="rejectAppointments">

              <?php 
                                  include '../api/db_config.php';
                                  $patientid = $_SESSION['patient_id'];


                              if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                                  $sql = "SELECT  p.patient_id , 
                                                  p.email_address, 
                                                  concat(p.first_name,' ', p.last_name) as p_name, 
                                                  p.contact_number, 
                                                  p.address, 
                                                  c.description,
                                                  a.appoinment_id,
                                                  a.appoinment_date_time, 
                                                  concat(d.first_name, ' ', d.last_name) as d_name,
                                                  c.consultation_fee,
                                                  d.doctor_charge,
                                                  (c.consultation_fee + d.doctor_charge) AS total_fee,
                                                  a.status_id,
                                                  a.comments 
                                          FROM appoinments_info a, doctors_info d, patients_info p, consultation_types c 
                                          WHERE a.patient_id = p.patient_id 
                                                  and a.doctor_id = d.doctor_reg_id 
                                                  and a.consultation_id = c.consultation_id 
                                                  and a.status_id = 2   
                                                  and p.patient_id = $patientid    
                                          ORDER BY a.appoinment_id desc
                                                 

                                          ";

                                  $state="rejected";
                                  $result = $conn->query($sql);
                                  $appointments = array();
                                  while ($row = $result->fetch_assoc()) {
                                      //$appointments[] = $row;

                                          echo "<td>{$row['appoinment_id']}</td>";
                                          echo "<td>{$row['email_address']}</td>";
                                          echo "<td>{$row['p_name']}</td>";
                                          echo "<td>{$row['contact_number']}</td>";
                                          echo "<td>{$row['address']}</td>";
                                          echo "<td>{$row['description']}</td>";
                                          echo "<td>{$row['d_name']}</td>";
                                          echo "<td>{$row['appoinment_date_time']}</td>";
                                          echo "<td>{$row['comments']}</td>";
                                          echo "<td>{$row['total_fee']}</td>";
                                          
                                          echo "<td>{$state}</td>";
                                          
                                          echo "<tr>";
                                  }
                                  //echo json_encode($appointments);
                              }


                             ?>
              
            </tbody>
        </table>
        </div>
      </row>
    </div>
  </div>
</div>
</div>
</main>

<!------------------------------------------------------------------------------------------------------------------------>
  <!------------------------------------------------------------------------------------------------------------------------>
   <!-- Main content for feedback page -->
   <main class="dz__main" id="addFeedbackMain" style="display: none;">
    <div class="container-fluid my-2">

      <div class="card card-custom">
        <div class="card-header">
          <h3 class="card-title">CREATE FEEDBACK</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-8 col-xs-12">
              <form method="POST" action="../api/save/addNewFeedback.php" class="row g-2" id="memberForm"
                data-toggle="validator">
                <div class="col-12">
                  <label for="carBrand" class="form-label">Feedback Level</label>
                  <select ignore="true" class="form-control dz-selectpicker" data-show-subtext="true"
                    id="feedbackLevel" name="txtfeedbackLevel" required ignore-edit>
                    <option value="" selected disabled>Please choose feedback Level</option>
                    <option>Very Satisfied</option>
                    <option>Satisfied</option>
                    <option>Neutral</option>
                    <option>Dissatisfied</option>
                    <option>Very Dissatisfied</option>
                  </select>        
                </div> 
                <div class="col-12">
                  <label for="feedback" class="form-label">Feedback</label>
                  <textarea class="form-control" rows="5" id="feedback" name="txtFeedbackComment"></textarea>
                </div>  

                <div class="card-footer">
                <div class="col-12">
                  <button type="submit" name="submit" class="btn btn-primary" value="added">Add Feedback</button>
                  <button id="btnClearFeedback" class="btn btn-danger" type="button">Clear</button>
                </div>
              </div>
              </form>
            </div>
          </div>          
        </div>
        
      </div> 
    </div> 
    <!--<div class="card card-custom mt-1">
      <div class="card-header">
        <h3 class="card-title">Feedback List</h3>
      </div>
      <div class="card-body">
        <row>
          <div class="col-sm-12 col-lg-12 col-xs-12">
            <table class="table" id="selectedBookEntryGrid">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Feedback Id</th>
                <th scope="col">Customer Email</th>
                <th scope="col">Name</th>
                <th scope="col">Feedback Level</th>
                <th scope="col">Feedback</th>
              </tr>
              </thead>
              <tbody id="feedbacks">
                
              </tbody>
          </table>
          </div>
        </row>
      </div>
    </div>-->
  </div>
  </main>

  <!--------------------------------------------------------------------------------------------------------------------------------->

  <!-- Main content for customer Profile Update page -->
  <main class="dz__main" id="customerProfileUpdate" style="display: none;">
    <div class="container-fluid my-2">

      <div class="card card-custom">
        <div class="card-header">
          <h3 class="card-title">Edit Profile</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-8 col-xs-12">
              <form method="POST" class="row g-2" id="memberForm"
                data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                  <label for="editFirstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="editFirstName" placeholder="">
                </div>
                <div class="col-md-6">
                  <label for="editLastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="editLastName" placeholder="">
                </div>
                <div class="col-12">
                  <label for="editAddress" class="form-label">Address</label>
                  <input type="text" class="form-control" id="editAddress" placeholder="">
                </div>
                <div class="col-12">
                  <label for="editContactNumber" class="form-label">Contact Number</label>
                  <input type="text" class="form-control" id="editContactNumber" placeholder="">
                </div>
              </form>
            </div>
          </div>          
        </div>
        <div class="card-footer">
          <div class="col-12">
            <button  class="btn btn-primary" onclick="updateCustomerProfile()" type="button">Submit</button>
            <button  class="btn btn-danger" type="button">Clear</button>
          </div>
        </div>
      </div>
    </div>
  </main>

   <!--------------------------------------------------------------------------------------------------------------------------------->

  <!-- Main content for customer password Update page -->
  <main class="dz__main" id="customerPasswordUpdate" style="display: none;">
    <div class="container-fluid my-2">

      <div class="card card-custom">
        <div class="card-header">
          <h3 class="card-title">Change Password</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-8 col-xs-12">
              <form method="POST" class="row g-2" id="memberForm"
                data-toggle="validator" novalidate="true">
                <div class="col-12">
                  <label for="oldPassword" class="form-label">Enter Old Password</label>
                  <input type="password" class="form-control" id="oldPassword" placeholder="">
                </div>
                <div class="col-12">
                  <label for="newPassword1" class="form-label">Enter New password</label>
                  <input type="password" class="form-control" id="newPassword1" placeholder="">
                </div>
                <div class="col-12">
                  <label for="newPassword2" class="form-label">Re-Enter New Password</label>
                  <input type="password" class="form-control" id="newPassword2" placeholder="">
                </div>
                <input type="hidden" id="passwordToUpdate" > <!-- Hidden field to store customer password-->
              </form>
            </div>
          </div>          
        </div>
        <div class="card-footer">
          <div class="col-12">
            <button  class="btn btn-primary" onclick="updateCustomerPassword()" type="button">Submit</button>
            <button  class="btn btn-danger" type="button">Clear</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="assets/script/dashBoard.js" defer></script>

  <script src="assets/script/app.js" defer></script>
  <!--<script src="assets\script\populateDropDown.js"></script>-->
  <script src="assets/script/appointments.js" defer></script>
  
  <!-- <script src="assets/script/approvedAppointment.js" defer></script>
  <script src="assets/script/rejectedAppointments.js" defer></script>
  <script src="assets/script/inquiry.js" defer></script>
  <script src="assets/script/editProfile.js" defer></script>
  <script src="assets/script/feedback.js" defer></script>
  <script src="assets/script/changePassword.js" defer></script>
  <script src="assets/script/appointmentHistory.js" defer></script>
  
  <script src="assets/script/customerdashboardCount.js" defer></script>  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="assets/jsgrid-1.5.3/jsgrid.min.js"></script>
  <script src="assets/script/jsgrid-example.js"></script>
  <script src="assets/bootstrap-5.1.3/js/bootstrap.min.js"></script>  

  <script>
    
  </script>
</body>

</html>