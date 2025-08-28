<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Patient Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
      body {
          background-color: #f8f9fa;
      }
      .sidebar {
          height: 100vh;
          background: #198754;
          color: #fff;
          padding-top: 20px;
          position: fixed;
          width: 230px;
          transition: all 0.3s;
      }
      .sidebar a {
          color: #fff;
          display: block;
          padding: 12px 20px;
          text-decoration: none;
          font-size: 15px;
      }
      .sidebar a:hover, .sidebar a.active {
          background: #157347;
          border-radius: 5px;
      }
      .content {
          margin-left: 240px;
          padding: 20px;
          transition: all 0.3s;
      }
      .collapsed-sidebar {
          width: 70px;
      }
      .collapsed-sidebar .sidebar-text {
          display: none;
      }
      .collapsed-content {
          margin-left: 80px;
      }
      .card {
          border-radius: 15px;
          box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }
      .section-title {
          margin-top: 30px;
          margin-bottom: 15px;
          font-weight: bold;
      }
      .navbar {
          margin-left: 230px;
          transition: all 0.3s;
      }
      .collapsed-navbar {
          margin-left: 80px;
      }
  </style>
</head>
<body>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
   <h4 class="text-center" >Doctor Panel</h4>
   <a href="#" class="active"><i class="bi bi-house"></i> <span class="sidebar-text">Dashboard</span></a>
   <a href="<?= base_url('patient/appointments') ?>">
    <i class="bi bi-calendar-check"></i>
    <span class="sidebar-text">Appointments</span>
</a>
<a href="<?= base_url('patient/medical-records') ?>">
    <i class="bi bi-file-medical"></i>
    <span class="sidebar-text">Medical Reports</span>
</a>
<a href="<?= base_url('patient/billing') ?>">
    <i class="bi bi-file-medical"></i>
    <span class="sidebar-text">Billing & Pay</span>
</a>
   
    <a href="<?= base_url('patient/profile') ?>"><i class="bi bi-calendar-check"></i> <span class="sidebar-text">Profile Management</span></a>
    <a href="<?= base_url('patient/communication') ?>"><i class="bi bi-chat-left-text"></i> <span class="sidebar-text">Communication</span></a>

    
    <a href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> <span class="sidebar-text">Logout</span></a>
</div>

<!-- Top Navbar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <button class="btn btn-success me-3" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
        <span class="navbar-brand">Welcome, John Doe</span>
        <div class="dropdown ms-auto">
            <a class="btn btn-outline-secondary dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i> Profile
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div id="content" class="content">
    <h2 class="mb-4">Patient Dashboard</h2>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3 col-6">
            <div class="card text-center text-white bg-primary">
                <div class="card-body">
                    <h6>Upcoming Appointments</h6>
                    <h3>3</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center text-white bg-success">
                <div class="card-body">
                    <h6>Active Prescriptions</h6>
                    <h3>5</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center text-white bg-info">
                <div class="card-body">
                    <h6>Lab Reports</h6>
                    <h3>8</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center text-white bg-warning">
                <div class="card-body">
                    <h6>Notifications</h6>
                    <h3>4</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Appointments (This Month)</h5>
                    <canvas id="appointmentsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Medical Reports Overview</h5>
                    <canvas id="reportsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Appointments -->
    <h4 class="section-title">Upcoming Appointments</h4>
    <div class="card mb-4">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Doctor</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Dr. Smith</td><td>28 Aug, 10:00 AM</td><td><span class="badge bg-success">Confirmed</span></td></tr>
                    <tr><td>Dr. Johnson</td><td>2 Sep, 2:00 PM</td><td><span class="badge bg-warning">Pending</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Prescriptions -->
    <h4 class="section-title">Prescriptions</h4>
    <div class="card mb-4">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Paracetamol - 500mg (Twice a day)</li>
                <li class="list-group-item">Vitamin D - Weekly Dose</li>
                <li class="list-group-item">Amoxicillin - 7 Days Course</li>
            </ul>
        </div>
    </div>

    <!-- Lab Reports -->
    <h4 class="section-title">Lab Reports</h4>
    <div class="card mb-4">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Blood Test - 20 Aug 2025</li>
                <li class="list-group-item">X-Ray - 10 Aug 2025</li>
                <li class="list-group-item">ECG - 5 Aug 2025</li>
            </ul>
        </div>
    </div>

    <!-- Notifications -->
    <h4 class="section-title">Notifications</h4>
    <div class="card mb-5">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Reminder: Take medicine at 9:00 AM</li>
                <li class="list-group-item">Lab report is ready for viewing</li>
                <li class="list-group-item">New message from Dr. Lee</li>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("collapsed-sidebar");
        document.getElementById("content").classList.toggle("collapsed-content");
        document.getElementById("navbar").classList.toggle("collapsed-navbar");
    }

    // Appointments chart
    const ctx1 = document.getElementById('appointmentsChart');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Week 1','Week 2','Week 3','Week 4'],
            datasets: [{
                label: 'Appointments',
                data: [2, 4, 3, 5],
                backgroundColor: '#0d6efd'
            }]
        }
    });

    // Reports pie chart
    const ctx2 = document.getElementById('reportsChart');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Blood Tests','X-Ray','ECG'],
            datasets: [{
                data: [4, 2, 2],
                backgroundColor: ['#198754','#ffc107','#dc3545']
            }]
        }
    });
</script>
</body>
</html>
