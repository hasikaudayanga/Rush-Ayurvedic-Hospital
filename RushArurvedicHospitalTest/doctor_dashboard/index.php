<?php 
    session_start();
    
    
    

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="inc/style.css">
</head>
<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4">
        <img src="../customer/assets/images/billlogo.png" alt="Logo" class="logo"> 
        <h5 class="mt-2 text-white doc">Doctor Dashboard</h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item" onclick="showViewAppointmentContent()">
          <a href="#"><i class="bi bi-calendar-check"></i> My Appointments</a>
        </li>
        <!--<li class="list-group-item">
          <a href="#"><i class="bi bi-graph-up"></i> Report</a>
        </li>-->
        
        <li class="list-group-item" onclick="showAppointmentContent()">
          <a href="#"><i class="bi bi-chat-text"></i> Add Comment</a>
        </li>
        
        <li class="list-group-item" onclick="showViewUpdate()">
          <a href="#"><i class="bi bi-gear"></i> Update Profile</a>
        </li>


        <li class="list-group-item">
          <a href="doc_login.php"><i class="bi bi-box-arrow-left"></i> Logout</a>
        </li>

      </ul>
    </div>
    
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
       
        <h5 class="ms-auto text-success" style="margin-right: 30px;">Welcome Doctor: <?php echo $_SESSION['d_name']; ?> </h5>
      </nav>
      <div class="container-fluid py-4" id="content">
        <!--<div class="text-center">
          <h2 class="text-muted">Loaded Area</h2>
        </div>-->

        <div id="approvedAppointmentContent">
          <?php include('api/approved_Appointment.php'); ?>
          
        </div>

        <div id="viewAppointmentContent">
          <?php include('api/view_Appointments.php'); ?>
          
        </div>

        <div id="viewUpdateProfileContent">
          <?php include('api/update_profile.php'); ?>
          
        </div>

        
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="inc/script.js"></script>

  <script type="text/javascript">
    let approvedAppointmentContent='';
    let viewAppointmentContent='';
    let viewUpdateProfileContent='';

    window.onload = function () {
      approvedAppointmentContent = document.getElementById('approvedAppointmentContent');
      if (approvedAppointmentContent) {
        approvedAppointmentContent.style.display = 'none'; // Hide block on load
      }

      viewAppointmentContent=document.getElementById('viewAppointmentContent');
      if(viewAppointmentContent){
        viewAppointmentContent.style.display='block';
      }


      viewUpdateProfileContent=document.getElementById('viewUpdateProfileContent');
      if(viewUpdateProfileContent){
        viewUpdateProfileContent.style.display='none';
      }
    }

    function showViewUpdate(){
      viewUpdateProfileContent=document.getElementById('viewUpdateProfileContent');
      if(viewUpdateProfileContent){
        viewAppointmentContent.style.display='none';
        approvedAppointmentContent.style.display='none';

        viewUpdateProfileContent.style.display='block';
      }
    }


    function showAppointmentContent(){
      approvedAppointmentContent=document.getElementById('approvedAppointmentContent');
      if(approvedAppointmentContent){
        viewAppointmentContent.style.display='none';
        viewUpdateProfileContent.style.display='none';
        approvedAppointmentContent.style.display='block';
      }
    }

    function showViewAppointmentContent(){
      viewAppointmentContent=document.getElementById('viewAppointmentContent');
      if(viewAppointmentContent){
        approvedAppointmentContent.style.display='none';
        viewUpdateProfileContent.style.display='none';
        viewAppointmentContent.style.display='block';
      }
    }

  </script>

  
</body>
</html>
