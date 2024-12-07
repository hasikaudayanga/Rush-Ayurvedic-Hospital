<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashbord</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/bootstrap-5.1.3/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="assets/jsgrid-1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="assets/jsgrid-1.5.3/jsgrid-theme.min.css" />
  <link rel="stylesheet" href="assets/style/style.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <!-- jsPDF autoTable plugin -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.16/jspdf.plugin.autotable.min.js"></script>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>




</head>

<body class="dark-layout">

  <header class="dz__header">
    <div class="dz__header__container">
      <span class="shrink-btn">
        <i class="bx bx-menu"></i>
      </span>
      <h2 id="dashboardHeader">ADMIN DASHBOARD</h2>
      <div class="dz__header__group_right">
        <img id="staffImage" alt="" class="dz__header__img">
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
      <img src="assets/images/DZ-logos_black.jpg" class="logo" id="dzIcon" alt="">
      <h3 class="dz__sidebar__title">ADMIN</h3>
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
                <a href="create_appoinment.php" class="dz__nav__dropdown-item" id="">Create Appointments</a>
                <a href="#" class="dz__nav__dropdown-item" id="receivedAppointmentOption">Received Appointments</a>
                <a href="#" class="dz__nav__dropdown-item">Approved Appointments</a>
                <a href="#" class="dz__nav__dropdown-item" id="completedAppointmentOption">Completed Appointments</a>
              </div>
            </div>
          </div>
          <a href="#" class="dz__nav__link" id="servicesOption">
            <i class="bi bi-tools dz__nav__icon"></i>
            <span class="dz__nav__name">CONSULTATIONS</span>
          </a>
          <div class="dz__nav__dropdown" id="reportOption">
            <a href="#" class="dz__nav__link dz__nav__link_dd">
              <i class="bi bi-chat-dots dz__nav__icon"></i>
              <span class="dz__nav__name">REPORT</span>
              <i class="bx bx-chevron-right dz__nav__dropdown-icon"></i>
            </a>
            <div class="dz__nav__dropdown-collapse">
              <div class="dz__nav__dropdown-content">
                <a href="#" class="dz__nav__dropdown-item">Completed Appointments</a>
                <a href="rejected_appointment.php" class="dz__nav__dropdown-item">Rejected Appointments</a>
              </div>
            </div>
          </div>
          <a href="#" class="dz__nav__link" id="invoiceOption">
            <i class="bi bi-file-earmark-text dz__nav__icon"></i>
            <span class="dz__nav__name">INVOICES</span>
          </a>
          <a href="#" class="dz__nav__link" id="invoiceOption">
            <i class="bi bi-file-earmark-text dz__nav__icon"></i>
            <span class="dz__nav__name">FEEDBACK</span>
          </a>
          <div class="dz__nav__dropdown" id="userAccountOption">
            <a href="#" class="dz__nav__link dz__nav__link_dd">
              <i class="bi bi-person dz__nav__icon"></i>
              <span class="dz__nav__name">USER ACCOUNTS</span>
              <i class="bx bx-chevron-right dz__nav__dropdown-icon"></i>
            </a>
            <div class="dz__nav__dropdown-collapse">
              <div class="dz__nav__dropdown-content">
                <a href="#" class="dz__nav__dropdown-item">Doctor Accounts</a>
                <a href="#" class="dz__nav__dropdown-item" id="staffAccountOption">Staff Accounts</a>
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
                <a href="#" class="dz__nav__dropdown-item">Edit Profile</a>
                <a href="#" class="dz__nav__dropdown-item">Change Password</a>
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
  <!---------------------------------------------------------------------------------------------------------------------------------------->


  <!-- Main content for admin dashboard page -->
  <main class="dz__main" id="adminDashBoard">
    <div class="container-fluid my-2">
      <!--<h2>DASHBOARD</h2>-->
      <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card card-custom border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-uppercase total-users">
                    Total Registered Patients</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800 custom-font-size" id="customerCount"><?php

                  include('../api/front_patient.php');

                  ?></div>
                </div>
                <div class="col-auto">
                  <i class="bx bxs-user bx-lg text-gray-300"></i>
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
                    Total Feedback</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800 custom-font-size" id="inquiryCount">
                    <?php include ('../api/dashboardFeedback.php'); ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="bx bxs-message-square-detail bx-lg text-gray-300"></i>
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
                    Total Received Appointment</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800 custom-font-size" id="receivedAppointmentCount">
                    <?php include('../api/front_recieved_appoinment.php'); ?></div>
                </div>
                <div class="col-auto">
                  <i class="bx bxs-calendar-event bx-lg text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card card-custom border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-uppercase total-users">
                    Total Approved Appointements</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800 custom-font-size" id="approvedAppointmentCount">
                    <?php include('../api/front_approved_appoinment.php'); ?></div>
                </div>
                <div class="col-auto">
                  <i class="bx bxs-check-circle bx-lg text-gray-300"></i>
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
                    Total Completed Appointements</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800 custom-font-size" id="completedAppointmentCount">
                    <?php include('../api/front_completed_appoinment.php'); ?></div>
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
                    Total Rejected Appointment</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800 custom-font-size" id="rejectedAppointmentCount">3
                  </div>
                </div>
                <div class="col-auto">
                  <i class="bx bxs-x-circle bx-lg text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
  </main>

  <!--------------------------------------------------------------------------------------------------------------------------------->
  <?php

  include('../api/db_config.php');

  $consultations = [];

  $query = "SELECT consultation_id ,description FROM consultation_types";
  $result_set = mysqli_query($conn, $query);

  if ($result_set) {
    if (mysqli_num_rows($result_set) > 0) {

      while ($row = mysqli_fetch_assoc($result_set)) {
        $consultations[] = $row;
      }
    }
  }



  ?>
  <!-- Main content for doctor accounts handling page -->
  <main class="dz__main" id="doctorAccountHandling" style="display: none;">
    <div class="container-fluid my-2">

      <div class="card card-custom">
        <div class="card-header">
          <h3 class="card-title">Add New Doctor Account</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-8 col-xs-12">
              <form method="POST" action="../api/save/addNewDoctors.php" class="row g-2" id="memberForm"
                data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                  <label for="first_name" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="">
                </div>
                <div class="col-md-6">
                  <label for="last_name" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="">
                </div>
                <div class="col-12">
                  <label for="consultation_id" class="form-label">Consultayion type</label>
                  <select class="form-control" id="consultation_id" name="consultation">
                    <option value="" selected disabled>Please choose consultation type</option>
                    <?php foreach ($consultations as $consultation): ?>
                      <option value="<?= htmlspecialchars($consultation['consultation_id'] . '|' . $consultation['description']); ?>">
                      <?= htmlspecialchars($consultation['description']); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>

                </div>
                <div class="col-md-12">
                  <label for="job_description" class="form-label">Description</label>
                  <textarea class="form-control" rows="5" id="job_description" name="job_description"></textarea>
                </div>
                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="">
                </div>
                <div class="col-12">
                  <label for="contact_number" class="form-label">Contact Number</label>
                  <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="">
                </div>
                <div class="col-12">
                  <label for="email_address" class="form-label">Doctor Email</label>
                  <input type="email" class="form-control" id="email_address" name="email_address" placeholder="">
                </div>
                <div class="col-md-12">
                  <label for="doctor_charge" class="form-label">Doctor fee(Rs)</label>
                  <input type="numeric" class="form-control" id="doctor_charge" placeholder="" min="0" step="0.00"
                    name="doctor_charge">
                </div>
                <div class="col-md-12">
                  <label for="user_name" class="form-label">User Name</label>
                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="">
                </div>
                <div class="col-md-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="passwords" placeholder="">
                </div>


                <div class="card-footer">
                  <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary" value="added">Add Doctor</button>
                    
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
      <div class="card card-custom mt-1">
        <div class="card-header" style="display: flex; align-items: center; justify-content: space-between;">
          <h3 class="card-title" style="margin: 0;">Registered Doctors</h3>
          <div style="position: relative; margin-left: auto;">
            <img src="assets/images/search.jpeg" alt="Search"
              style="position: absolute; left: 1px; top: 50%; transform: translateY(-50%); width: 22px; height: 22px;">
            <input type="text" id="emailInputRejected" placeholder="Enter doctor email"
              style="padding-left: 30px; text-align: center;" />
          </div>
        </div>
        <div class="card-body">
          <row>
            <div class="col-sm-12 col-lg-12 col-xs-12">
              <table class="table" id="selectedBookEntryGrid">
                <thead>
                  <tr>

                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Consultation Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Doctor Email</th>
                    <th scope="col">Doctor Fee</th>
                    <th scope="col">User Name</th>

                  </tr>
                </thead>
                <tbody id="registeredCustomers">

                  <?php

                  include('../api/db_config.php');
                  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $sql = "SELECT first_name AS firstName, last_name AS lastName, consultation_id AS consultationType, 
                                  job_description AS jobRole, address, contact_number AS contactNumber, 
                                  email_address AS staffEmail, doctor_charge AS doctorCharge, user_name AS userName, passwords AS password 
                                  FROM doctors_info";

                    $result = $conn->query($sql);
                    $doctors = array();
                    while ($row = $result->fetch_assoc()) {
                      //$doctors[] = $row;
                      //print_r($row);
                      echo "<td>{$row['firstName']}</td>";
                      echo "<td>{$row['lastName']}</td>";
                      echo "<td>{$row['consultationType']}</td>";
                      echo "<td>{$row['jobRole']}</td>";
                      echo "<td>{$row['address']}</td>";
                      echo "<td>{$row['contactNumber']}</td>";
                      echo "<td>{$row['staffEmail']}</td>";
                      echo "<td>{$row['doctorCharge']}</td>";
                      echo "<td>{$row['userName']}</td>";

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

    <!-- Modal for updating customer -->
    <div class="modal fade" id="updateCustomerModal" tabindex="-1" role="dialog"
      aria-labelledby="updateCustomerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document"> <!-- Added modal-dialog-centered class -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateCustomerModalLabel">Update Customer Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form to update customer data -->
            <form id="updateCustomerForm">
              <div class="form-group">
                <label for="updateFirstName">First Name</label>
                <input type="text" class="form-control" id="updateFirstName" name="updateFirstName">
              </div>
              <div class="form-group">
                <label for="updateLastName">Last Name</label>
                <input type="text" class="form-control" id="updateLastName" name="updateLastName">
              </div>
              <div class="form-group">
                <label for="updateAddress">Address</label>
                <input type="text" class="form-control" id="updateAddress" name="updateAddress">
              </div>
              <div class="form-group">
                <label for="updateContactNumber">Contact Number</label>
                <input type="text" class="form-control" id="updateContactNumber" name="updateContactNumber">
              </div>
              <!-- Add more fields as needed -->
              <input type="hidden" id="customerEmailToUpdate" name="customerEmailToUpdate">
              <!-- Hidden field to store customer ID -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="updateCustomer()">Update Customer</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!--------------------------------------------------------------------------------------------------------------------------------->

  <!--Create Appoinments-->

  <!--Create Appoinments-->

  <!-- Main content for staff accounts handling page -->
  <main class="dz__main" id="staffAccountHandling" style="display: none;">
    <div class="container-fluid my-2">

      <div class="card card-custom">
        <div class="card-header">
          <h3 class="card-title">Add New Staff Account</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-8 col-xs-12">
              <form method="POST" action="../api/save/addNewStaff.php" class="row g-2" id="memberForm"
                data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                  <label for="first_Name" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="staffFirstName" name="first_name" placeholder="">
                </div>
                <div class="col-md-6">
                  <label for="last_Name" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="staffLastName" name="last_name">
                </div>
                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="staffAddress" name="address">
                </div>

                <div class="col-md-6">
                  <label for="age" class="form-label">age</label>
                  <input type="age" class="form-control" id="age" name="age">
                </div>

                <div class="col-md-6">
                  <label for="contact_number" class="form-label">Contact Number</label>
                  <input type="contact_number" class="form-control" id="contact_number" name="contact_number">
                </div>


                <div class="col-12">
                  <label for="job_description" class="form-label">Job Description</label>
                  <input type="text" class="form-control" id="job_description" name="job_description">
                </div>
                <div class="col-md-6">
                  <label for="email_address	" class="form-label">Staff Email</label>
                  <input type="email" class="form-control" id="staffEmail" name="email_address">
                </div>

                <div class="col-md-6">
                  <label for="user_name" class="form-label">User Name</label>
                  <input type="user_name" class="form-control" id="user_name" name="user_name">
                </div>

                <div class="col-md-6">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="staffPassword" name="passwords">
                </div>

                <div class="card-footer">
                  <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary" value="added">Add Staff</button>
                    
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>

      </div>
      <div class="card card-custom mt-1">
        <div class="card-header">
          <h3 class="card-title">Registered Staffs</h3>
        </div>
        <div class="card-body">
          <row>
            <div class="col-sm-12 col-lg-12 col-xs-12">
              <table class="table" id="selectedBookEntryGrid">
                <thead>
                  <tr>

                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Job Description</th>
                    <th scope="col">Staff Email</th>

                  </tr>
                </thead>
                <tbody id="registeredStaff">
                  <?php
                  include '../api/db_config.php';


                  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $sql = "SELECT * FROM staff_info";
                    $result = $conn->query($sql);
                    $staff = array();
                    while ($row = $result->fetch_assoc()) {
                      //$staff[] = $row;
                      //print_r($row);
                      echo "<td>{$row['first_name']}</td>";
                      echo "<td>{$row['last_name']}</td>";
                      echo "<td>{$row['address']}</td>";
                      echo "<td>{$row['contact_number']}</td>";
                      echo "<td>{$row['job_description']}</td>";
                      echo "<td>{$row['email_address']}</td>";

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

    <!-- Modal for updating staff -->
    <div class="modal fade" id="updateStaffModal" tabindex="-1" role="dialog" aria-labelledby="updateStaffModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document"> <!-- Added modal-dialog-centered class -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateStaffModalLabel">Update Staff Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form to update staff data -->
            <form id="updateStaffForm">
              <div class="form-group">
                <label for="updateFirstName">First Name</label>
                <input type="text" class="form-control" id="updateStaffFirstName" name="updateFirstName">
              </div>
              <div class="form-group">
                <label for="updateLastName">Last Name</label>
                <input type="text" class="form-control" id="updateStaffLastName" name="updateLastName">
              </div>
              <div class="form-group">
                <label for="updateAddress">Address</label>
                <input type="text" class="form-control" id="updateStaffAddress" name="updateAddress">
              </div>
              <div class="form-group">
                <label for="updateContactNumber">Contact Number</label>
                <input type="text" class="form-control" id="updateStaffContactNumber" name="updateContactNumber">
              </div>
              <!-- Add more fields as needed -->
              <input type="hidden" id="staffEmailToUpdate" name="staffEmailToUpdate">
              <!-- Hidden field to store customer ID -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="updateStaff()">Update Staff</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!---------------------------------------------------------------------------------------------------------------------------------->
  <!-- Main content for 
      onsultation handling page -->
  <main class="dz__main" id="consultationHandling" style="display: none;">
    <div class="container-fluid my-2">

      <div class="card card-custom">
        <div class="card-header">
          <h3 class="card-title">Add New Consultation</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-8 col-xs-12">
              <form method="POST" action="../api/save/addNewConsultation.php" class="row g-2" id="memberForm"
                data-toggle="validator" novalidate="true">

                <div class="col-md-12">
                  <label for="description" class="form-label">Consultation Type</label>
                  <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                </div>
                <div class="col-md-6">
                  <label for="treatments" class="form-label">Treatment</label>
                  <input type="text" class="form-control" id="treatments" placeholder="" name="treatments">
                </div>
                <div class="col-md-6">
                  <label for="consultation_fee" class="form-label">Consultation fee(Rs)</label>
                  <input type="numeric" name="consultation_fee" class="form-control" id="consultation_fee"
                    placeholder="" min="0" step="0.00">
                </div>

                <div class="card-footer">
                  <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary" value="added">Add</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
      <div class="card card-custom mt-1">
        <div class="card-header">
          <h3 class="card-title">Available Consultations</h3>
        </div>
        <div class="card-body">
          <row>
            <div class="col-sm-12 col-lg-12 col-xs-12">
              <table class="table" id="selectedBookEntryGrid">
                <thead>
                  <tr>

                    <th scope="col">Consultation Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Treatment</th>
                    <th scope="col">Consultation fee(Rs)</th>
                  </tr>
                </thead>
                <tbody id="availableConsultation">
                  <?php
                  include('../api/db_config.php');
                  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $sql = "SELECT * FROM consultation_types";
                    $result = $conn->query($sql);
                    $consultations = array();

                    while ($row = $result->fetch_assoc()) {
                      //$consultations[] = $row;
                      // print_r($row);
                      echo "<td>{$row['consultation_id']}</td>";
                      echo "<td>{$row['description']}</td>";
                      echo "<td>{$row['treatments']}</td>";
                      echo "<td>{$row['consultation_fee']}</td>";
                      //echo "<td><button type='button' class='btn-primary'>Action</button></td>";
                      echo "<tr>";
                    }
                    //echo json_encode($consultations);
                  }

                  ?>

                </tbody>
              </table>
            </div>
          </row>
        </div>
      </div>
    </div>

    <!-- Modal for updating service -->
    <div class="modal fade" id="updateServiceModal" tabindex="-1" role="dialog"
      aria-labelledby="updateServiceModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document"> <!-- Added modal-dialog-centered class -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateServiceModalLabel">Update Service Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form to update service data -->
            <form id="updateServiceForm">
              <div class="form-group">
                <label for="updateTitle">Title</label>
                <input type="text" class="form-control" id="updateServiceTitle" name="updateTitle">
              </div>
              <div class="form-group">
                <label for="updateDescription">Description</label>
                <input type="text" class="form-control" id="updateServiceDescription" name="updateDescription">
              </div>
              <!-- Add more fields as needed -->
              <input type="hidden" id="serviceIdToUpdate" name="serviceIdToUpdate">
              <!-- Hidden field to store serviceId -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="updateService()">Update Service</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!------------------------------------------------------------------------------------------------------------------------>
  <!-- Main content for Received Appointment page -->
  <main class="dz__main" id="receivedAppointmentMain" style="display: none;">
  <div class="container-fluid my-2">
    <div class="card card-custom mt-1">
      <div class="card-header" style="display: flex; align-items: center; justify-content: space-between;">
        <h3 class="card-title" style="margin: 0;">Approval Pending Appointment List</h3>
        <div style="position: relative; margin-left: auto;">
          <img src="assets/images/search.jpeg" alt="Search"
            style="position: absolute; left: 1px; top: 50%; transform: translateY(-50%); width: 22px; height: 22px;">
          <input type="text" id="emailInputPending" placeholder="Enter patient's email"
            style="padding-left: 30px; text-align: center;" />
        </div>
      </div>
      <div class="card-body">
        <row>
          <div class="col-sm-12 col-lg-12 col-xs-12">

            <div class="table-responsive">
              <table class="table" id="selectedBookEntryGrid">
                <thead>
                  <tr>
                    <th scope="col">AppointmentId</th>
                    <th scope="col">Patient Email</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Consultation Type</th>
                    <th scope="col">Doctor's Name</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Approve</th>
                    <th scope="col">Reject</th>
                  </tr>
                </thead>
                <tbody id="pendingAppointments"></tbody>
              </table>
            </div>

          </div>
        </row>
      </div>
    </div>
  </div>

  <!-- Toast Container -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3" id="toastContainer"></div>

  <script>
  // Function to fetch pending appointments
  function fetchPendingAppointments() {
    fetch('../api/fetchAppointments.php')
      .then(response => response.json())
      .then(data => {
        const tbody = document.getElementById('pendingAppointments');
        tbody.innerHTML = ''; // Clear existing rows

        data.forEach(appointment => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${appointment.appoinment_id}</td>
            <td>${appointment.email_address}</td>
            <td>${appointment.p_name}</td>
            <td>${appointment.contact_number}</td>
            <td>${appointment.address}</td>
            <td>${appointment.consultation_type}</td>
            <td>${appointment.doctor_name}</td>
            <td>${appointment.appoinment_date_time}</td>
            <td><button class='btn btn-success approve-btn'>Approve</button></td>
            <td><button class='btn btn-danger reject-btn'>Reject</button></td>
          `;
          tbody.appendChild(row);
        });

        attachEventListenersPending();
      })
      .catch(error => console.error('Error fetching appointments:', error));
  }

  // Function to display toast messages
  function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-bg-${type} border-0 show`;
    toast.innerHTML = `
      <div class="d-flex">
        <div class="toast-body">${message}</div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    `;
    document.getElementById('toastContainer').appendChild(toast);

    // Auto-remove toast after 3 seconds
    setTimeout(() => toast.remove(), 3000);
  }

  // Attach event listeners to buttons
  function attachEventListenersPending() {
    document.querySelectorAll('.approve-btn').forEach(button => {
      button.addEventListener('click', function () {
        const row = this.closest('tr');
        const appointmentId = row.querySelector('td:first-child').textContent.trim();

        fetch('../api/process.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ appointmentId, action: 'approve' }),
        })
          .then(response => response.json())
          .then(data => {
            showToast('Appointment approved successfully!');
            fetchPendingAppointments();
          })
          .catch(error => {
            showToast('Error approving appointment.', 'danger');
            console.error('Error:', error);
          });
      });
    });

    document.querySelectorAll('.reject-btn').forEach(button => {
      button.addEventListener('click', function () {
        const row = this.closest('tr');
        const appointmentId = row.querySelector('td:first-child').textContent.trim();

        fetch('../api/reject.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ appointmentId, action: 'reject' }),
        })
          .then(response => response.json())
          .then(data => {
            showToast('Appointment rejected successfully!', 'danger');
            fetchPendingAppointments();
          })
          .catch(error => {
            showToast('Error rejecting appointment.', 'danger');
            console.error('Error:', error);
          });
      });
    });
  }

  // Initial fetch of data
  document.addEventListener('DOMContentLoaded', fetchPendingAppointments);
  </script>
  </main>

</main>

  <!------------------------------------------------------------------------------------------------------------------------>
  <!-- Main content for approved Appointment page -->
  <main class="dz__main" id="approvedAppointmentMain" style="display: none;">
  <div class="container-fluid my-2">
    <div class="card card-custom mt-1">
      <div class="card-header" style="display: flex; align-items: center; justify-content: space-between;">
        <h3 class="card-title" style="margin: 0;">Approved Appointment List</h3>
        <div style="position: relative; margin-left: auto;">
          <img src="assets/images/search.jpeg" alt="Search"
            style="position: absolute; left: 1px; top: 50%; transform: translateY(-50%); width: 22px; height: 22px;">
          <input type="text" id="emailInputApproved" placeholder="Enter patient's email"
            style="padding-left: 30px; text-align: center;" />
        </div>
      </div>
      <div class="card-body">
        <row>
          <div class="col-sm-12 col-lg-12 col-xs-12">

            <div class="table-responsive">
              <table class="table" id="selectedBookEntryGrid">
                <thead>
                  <tr>
                    <th scope="col">AppointmentId</th>
                    <th scope="col">Patient Email</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Consultation Type</th>
                    <th scope="col">Doctor's Name</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Doctor Comment</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="approvedAppointments"></tbody>
              </table>
            </div>

          </div>
        </row>
      </div>
    </div>
  </div>

  <!-- Toast Container -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3" id="toastContainer"></div>
  </main>

<script>
  // Function to fetch pending appointments
  function fetchApprovedAppointments() {
    fetch('../api/fetchApprovedAppointments.php')
      .then(response => response.json())
      .then(data => {
        const tbody = document.getElementById('approvedAppointments');
        tbody.innerHTML = ''; // Clear existing rows

        data.forEach(appointment => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${appointment.appoinment_id}</td>
            <td>${appointment.email_address}</td>
            <td>${appointment.p_name}</td>
            <td>${appointment.contact_number}</td>
            <td>${appointment.address}</td>
            <td>${appointment.consultation_type}</td>
            <td>${appointment.doctor_name}</td>
            <td>${appointment.appoinment_date_time}</td>
            <td>${appointment.comments}</td>
            <td><button class='btn btn-success complete-btn'>Complete</button></td>
          `;
          tbody.appendChild(row);
        });

        attachEventListeners();
      })
      .catch(error => console.error('Error fetching appointments:', error));
  }

  // Function to display toast messages
  function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-bg-${type} border-0 show`;
    toast.innerHTML = `
      <div class="d-flex">
        <div class="toast-body">${message}</div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    `;
    document.getElementById('toastContainer').appendChild(toast);

    // Auto-remove toast after 3 seconds
    setTimeout(() => toast.remove(), 3000);
  }

  // Attach event listeners to buttons
  function attachEventListeners() {
    document.querySelectorAll('.complete-btn').forEach(button => {
      button.addEventListener('click', function () {
        const row = this.closest('tr');
        const appointmentId = row.querySelector('td:first-child').textContent.trim();

        fetch('../api/complete.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ appointmentId, action: 'approve' }),
        })
          .then(response => response.json())
          .then(data => {
            showToast('Appointment completed successfully!');
            fetchApprovedAppointments();
          })
          .catch(error => {
            showToast('Error complete appointment.', 'danger');
            console.error('Error:', error);
          });
      });
    });
  }

  // Initial fetch of data
  document.addEventListener('DOMContentLoaded', fetchApprovedAppointments);
</script>

  <!------------------------------------------------------------------------------------------------------------------------>
  <!-- Main content for completed Appointment page -->
  <main class="dz__main" id="completedAppointmentMain" style="display: none;">
    <div class="container-fluid my-2">
      <div class="card card-custom mt-1">
        <div class="card-header" style="display: flex; align-items: center; justify-content: space-between;">
          <h3 class="card-title" style="margin: 0;">Completed Appointment List</h3>
          <div style="position: relative; margin-left: auto;">
            <img src="assets/images/search.jpeg" alt="Search"
              style="position: absolute; left: 1px; top: 50%; transform: translateY(-50%); width: 22px; height: 22px;">
            <input type="text" id="emailInputCompleted" placeholder="Enter patient email"
              style="padding-left: 30px; text-align: center;" />
          </div>
        </div>
        <div class="card-body">
          <row>
            <div class="col-sm-12 col-lg-12 col-xs-12">
              <div class="table-responsive">
                <table class="table" id="selectedBookEntryGrid">
                  <thead>
                    <tr>

                      <th scope="col">CompletedId</th>
                      <th scope="col">Patient Email</th>
                      <th scope="col">Patient Name</th>
                      <th scope="col">Contact Number</th>
                      <th scope="col">Address</th>
                      <th scope="col">Consultation Type</th>
                      <th scope="col">Appointment Date</th>
                      <th scope="col">Doctor Name</th>
                      <th scope="col">Doctor Comment</th>


                    </tr>
                  </thead>
                  <tbody id="completedAppointments">
                    <?php
                    include '../api/db_config.php';


                    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                      $sql = "SELECT  a.appoinment_id , 
                                                  p.email_address, 
                                                  concat(p.first_name,' ', p.last_name) as p_name, 
                                                  p.contact_number, 
                                                  p.address, 
                                                  c.description,
                                                 
                                                  a.appoinment_date_time, 
                                                  concat(d.first_name, ' ', d.last_name) as d_name,
                                                  a.status_id ,
                                                  a.comments
                                          FROM appoinments_info a, doctors_info d, patients_info p, consultation_types c 
                                          WHERE a.patient_id = p.patient_id 
                                                  and a.doctor_id = d.doctor_reg_id 
                                                  and a.consultation_id = c.consultation_id 
                                                  and a.status_id = 3
                                          ";
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
                        echo "<td>{$row['appoinment_date_time']}</td>";
                        echo "<td>{$row['d_name']}</td>";
                        echo "<td>{$row['comments']}</td>";

                        echo "<tr>";
                      }
                      //echo json_encode($appointments);
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

    <!-- Modal for invoice and report job  -->
    <div class="modal fade" id="invoiceAppointmentModal" tabindex="-1" role="dialog"
      aria-labelledby="invoiceAppointmentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document"> <!-- Added modal-dialog-centered class -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="invoiceAppointmentModalLabel">Invoice</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form to charges data -->
            <form id="completeAppointmentForm">
              <div class="form-group">
                <label for="fixedCharge">Fixed service Charge</label>
                <input type="text" class="form-control" id="fixedCharge" name="fixedCharge">
              </div>
              <div class="form-group">
                <label for="additionalCharge">Additional service Charge</label>
                <input type="text" class="form-control" id="additionalCharge" name="additionalCharge">
              </div>
              <!-- Add more fields as needed -->

              <input type="hidden" id="completedId" name="approvedAppointmentId">
              <!-- Hidden field to store serviceId -->
              <input type="hidden" id="completedCustomersEmail" name="customersEmail">
              <input type="hidden" id="completedFirstName" name="firstName">
              <input type="hidden" id="completedContactNumber" name=" contactNumber">
              <input type="hidden" id="completedAddress" name="address">
              <input type="hidden" id="completedVehicleNumber" name="vehicleNumber">
              <input type="hidden" id="completedCarBrand" name="carBrand">
              <input type="hidden" id="completedCarModel" name="carModel">
              <input type="hidden" id="completedServiceCategory" name="serviceCategory">
              <input type="hidden" id="completedServiceDate" name="serviceDate">
              <input type="hidden" id="completedRequisitionDate" name="requisitionDate">
              <input type="hidden" id="completedSupervisor" name="Supervisor">
              <input type="hidden" id="completedHelpers" name="helpers">
              <input type="hidden" id="completedStartTime" name="requisitionDate">
              <input type="hidden" id="completedCompleteTime" name="requisitionDate">
              <input type="hidden" id="completedremarks" name="requisitionDate">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick=" makeInvoiceAndReport()">Calculate Bill</button>
          </div>
        </div>
      </div>
  </main>

  <!------------------------------------------------------------------------------------------------------------------------>
  <!-- Main content for done jobs report page -->
  <main class="dz__main" id="reportCompletedJob" style="display: none;">
    <div class="container-fluid my-2">
      <div class="card card-custom mt-1">
        <div class="card-header" style="display: flex; align-items: center; justify-content: space-between;">
          <h3 class="card-title" style="margin: 0;">Report</h3>
          <div style="position: relative; margin-left: auto;">
            <img src="assets/images/search.jpeg" alt="Search"
              style="position: absolute; left: 1px; top: 50%; transform: translateY(-50%); width: 22px; height: 22px;">
            <input type="text" id="emailInputReport" placeholder="Enter customer email"
              style="padding-left: 30px; text-align: center;" />
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="selectedBookEntryGrid">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Id</th>
                  <th scope="col">Customer Email</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Contact Nu.</th>
                  <th scope="col">Address</th>
                  <th scope="col">Service Category</th>
                  <th scope="col">Service Date</th>
                  <th scope="col">Requisition Date</th>
                  <th scope="col">SupervisedBy</th>
                  <th scope="col">Start Time</th>
                  <th scope="col">Complete Time</th>
                  <th scope="col">Remarks</th>
                  <th scope="col">Fixed Charge</th>
                  <th scope="col">Additional Charge</th>
                  <th scope="col">Total Charge</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="report">
                <!-- Table content goes here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!------------------------------------------------------------------------------------------------------------------------>
  <!-- Main content for Invoice page -->
  <main class="dz__main" id="invoicePage" style="display: none;">
    <div class="container-fluid my-2">
      <div class="card card-custom mt-1">
        <div class="card-header">
          <h3 class="card-title">INVOICES</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="selectedBookEntryGridss ">
              <thead>
                <tr>

                  <th scope="col">Id</th>
                  <th scope="col">Customer Email</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Contact Number</th>
                  <th scope="col">Address</th>
                  <th scope="col">Consultation Type</th>
                  <th scope="col">Appointment Date</th>

                  <th scope="col">Consultation Fee</th>
                  <th scope="col">Doctor Fee</th>
                  <th scope="col">Total Amount</th>
                  <!--<th scope="col">Print</th>-->

                </tr>
              </thead>
              <tbody id="invoiceDetails">
                <!-- Table content goes here -->
                <?php
                include '../api/db_config.php';


                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                  $sql = "SELECT  p.patient_id , 
                                                  p.email_address, 
                                                  concat(p.first_name,' ', p.last_name) as p_name, 
                                                  p.contact_number, 
                                                  p.address, 
                                                  c.description,
                                                  a.appoinment_date_time, 
                                                  concat(d.first_name, ' ', d.last_name) as d_name,
                                                  c.consultation_fee,
                                                  d.doctor_charge,
                                                  (c.consultation_fee + d.doctor_charge) AS total_fee,
                                                  a.status_id 
                                          FROM appoinments_info a, doctors_info d, patients_info p, consultation_types c 
                                          WHERE a.patient_id = p.patient_id 
                                                  and a.doctor_id = d.doctor_reg_id 
                                                  and a.consultation_id = c.consultation_id 
                                                  and a.status_id = 3       
                                                 

                                          ";
                  $result = $conn->query($sql);
                  $appointments = array();
                  while ($row = $result->fetch_assoc()) {
                    //$appointments[] = $row;
                
                    echo "<td>{$row['patient_id']}</td>";
                    echo "<td>{$row['email_address']}</td>";
                    echo "<td>{$row['p_name']}</td>";
                    echo "<td>{$row['contact_number']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['description']}</td>";
                    echo "<td>{$row['appoinment_date_time']}</td>";
                    echo "<td>{$row['consultation_fee']}</td>";
                    echo "<td>{$row['doctor_charge']}</td>";
                    echo "<td>{$row['total_fee']}</td>";
                    //echo "<td><button id='print' class='btn btn-success print-btn' onclick='window.print()'>Print</button></td>";
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
  <!-- Main content for feedback page -->
  <main class="dz__main" id="feedbackMain" style="display: none;">
    <div class="card card-custom mt-1">
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
                  <th scope="col">Patient Email</th>
                  <th scope="col">Name</th>
                  <th scope="col">Feedback Level</th>
                  <th scope="col">Feedback</th>
                </tr>
              </thead>
              <tbody id="feedbacks">
                <?php 
                include('../api/db_config.php');
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                  $sql = "SELECT  '#' as f_id,
                                  a.feedback_id,
                                  p.email_address, 
                                  concat(p.first_name,' ', p.last_name) as p_name, 
                                  p.contact_number, 
                                  p.address,
                                  a.feedback_comment,
                                  a.feedback_rating,
                                  case when feedback_rating = 1 THEN 'Poor Service' 
                                        when feedback_rating = 2 THEN 'Not-Satisfied' 
                                        when feedback_rating = 3 THEN 'Neutral' 
                                        when feedback_rating = 4 THEN 'Satisfied' 
                                        when feedback_rating = 5 THEN 'Very Satisfied' 
                                  end as feedback_level
                          FROM feedback a, patients_info p
                          WHERE a.patient_id = p.patient_id 
                          ";
                  $result = $conn->query($sql);
                  $feedbacks = array();

                  while ($row = $result->fetch_assoc()){
                    echo "<td>{$row['f_id']}</td>";
                    echo "<td>{$row['feedback_id']}</td>";
                    echo "<td>{$row['email_address']}</td>";
                    echo "<td>{$row['p_name']}</td>";
                    echo "<td>{$row['feedback_level']}</td>";
                    echo "<td>{$row['feedback_comment']}</td>";
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

    <div id="registeredServicesTocart" class="row" style="margin-top: 20px;margin-left: 20px;">

      <!-- Cart elements will be dynamically generated here -->
    </div>
  </main>

  <!--------------------------------------------------------------------------------------------------------------------------------->

  <!-- Main content for staff Profile Update page -->
  <main class="dz__main" id="staffsProfileUpdate" style="display: none;">
    <div class="container-fluid my-2">

      <div class="card card-custom">
        <div class="card-header">
          <h3 class="card-title">Edit Profile</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-8 col-xs-12">
              <form method="POST" class="row g-2" id="memberForm" data-toggle="validator" novalidate="true">
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
            <button class="btn btn-primary" onclick="updateStaffProfile()" type="button">Submit</button>
            <button class="btn btn-danger" type="button">Clear</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!--------------------------------------------------------------------------------------------------------------------------------->

  <!-- Main content for staff password Update page -->
  <main class="dz__main" id="staffsPasswordUpdate" style="display: none;">
    <div class="container-fluid my-2">

      <div class="card card-custom">
        <div class="card-header">
          <h3 class="card-title">Change Password</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-lg-8 col-xs-12">
              <form method="POST" class="row g-2" id="memberForm" data-toggle="validator" novalidate="true">
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
                <input type="hidden" id="staffPasswordToUpdate"> <!-- Hidden field to store customer password-->
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-12">
            <button class="btn btn-primary" onclick="updateStaffPassword()" type="button">Submit</button>
            <button class="btn btn-danger" type="button">Clear</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="assets/script/app.js" defer></script>


  <script src="assets/script/adminDashboard.js" defer></script>

  <!--<script src="assets/script/consultation.js" defer></script>-->



  <!--<script src="assets/script/completedAppoinmentList.js" defer></script>
    <script src="assets/script/invoice.js" defer></script>
     -->

  <!-- <script src="assets/script/services.js" defer></script>
  <script src="assets/script/appointments.js" defer></script>
  <script src="assets/script/report.js" defer></script>
  <script src="assets/script/completeJob.js" defer></script> -->

  <!-- <script src="assets/script/approvalPendingAppoinment.js" defer></script>
  
  <script src="assets/script/doctorAccounts.js" defer></script>-->
  <!-- <script src="assets/script/rejectAppointments.js" defer></script>
  <script src="assets/script/inquiry.js" defer></script>
  <script src="assets/script/approveAppointment.js" defer></script>-->

  <!--<script src="assets/script/staffAccounts.js" defer></script>
  <script src="assets/script/feedback.js" defer></script>
  <script src="assets/script/dashboardCounts.js" defer></script>
  <script src="assets/script/fetchSupervisorsNames.js" defer></script>
  <script src="assets/script/customerAccounts.js" defer></script>
  <script src="assets/script/invoice.js" defer></script>
  <script src="assets/script/editStaffProfile.js" defer></script>
  <script src="assets/script/passwordChange.js" defer></script>
  <script src="assets/script/email.js" defer></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="assets/jsgrid-1.5.3/jsgrid.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="assets/script/jsgrid-example.js"></script>
  <script src="assets/bootstrap-5.1.3/js/bootstrap.min.js"></script>
  <script src="assets/style/style.css"></script>

</body>

</html>