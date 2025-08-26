<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doctor Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
      body {
          background-color: #f8f9fa;
      }
      .sidebar {
          height: 100vh;
          background: #0d6efd;
          color: #fff;
          padding-top: 20px;
          position: fixed;
          width: 220px;
      }
      .sidebar a {
          color: #fff;
          display: block;
          padding: 10px 20px;
          text-decoration: none;
      }
      .sidebar a:hover {
          background: #0b5ed7;
      }
      .content {
          margin-left: 230px;
          padding: 20px;
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
          margin-left: 220px;
      }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center" >Doctor Panel</h4>
    <a href="#">Dashboard</a>
   <a href="<?= base_url('doctor/patients') ?>"><i class="bi bi-person"></i> Patients</a>
   <a href="<?= base_url('doctor/appointments') ?>"><i class="bi bi-person"></i> Appointments</a>
   <a href="<?= base_url('doctor/prescriptions') ?>"><i class="bi bi-person"></i> Presc & Treatment</a>
   <a href="<?= base_url('doctor/lab-tests') ?>"><i class="bi bi-person"></i> Labaratory</a>
   <a href="<?= base_url('doctor/communications') ?>"><i class="bi bi-person"></i> Communication</a>
    <a href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand">Welcome, Dr. John</span>
        <div class="dropdown ms-auto">
            <a class="btn btn-outline-secondary dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i> Profile
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="content">
    <h2 class="mb-4">Doctor Dashboard</h2>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3 col-6">
            <div class="card text-center text-white bg-primary">
                <div class="card-body">
                    <h6>New Patients</h6>
                    <h3>25</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center text-white bg-success">
                <div class="card-body">
                    <h6>Follow-up Patients</h6>
                    <h3>40</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center text-white bg-info">
                <div class="card-body">
                    <h6>Today’s Appointments</h6>
                    <h3>12</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center text-white bg-warning">
                <div class="card-body">
                    <h6>Notifications</h6>
                    <h3>5</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Patient Inflow (This Week)</h5>
                    <canvas id="patientChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Appointments Status</h5>
                    <canvas id="appointmentChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Today’s Appointments -->
    <h4 class="section-title">Today's Appointments</h4>
    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Patient</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>John Doe</td><td>10:00 AM</td><td><span class="badge bg-success">Confirmed</span></td></tr>
                    <tr><td>Mary Jane</td><td>11:30 AM</td><td><span class="badge bg-warning">Pending</span></td></tr>
                    <tr><td>Peter Parker</td><td>1:00 PM</td><td><span class="badge bg-danger">Cancelled</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Upcoming Schedules -->
    <h4 class="section-title">Upcoming Schedules</h4>
    <div class="card mb-4">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Anna Smith - Tomorrow 9:00 AM</li>
                <li class="list-group-item">Mark Wilson - Tomorrow 11:00 AM</li>
                <li class="list-group-item">Sophia Lee - 2 Days Later 2:00 PM</li>
            </ul>
        </div>
    </div>

    <!-- Notifications -->
    <h4 class="section-title">Notifications</h4>
    <div class="card mb-5">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Lab report ready for Patient #123</li>
                <li class="list-group-item">Urgent case assigned: Patient #456</li>
                <li class="list-group-item">System update scheduled tonight</li>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Patient inflow line chart
    const ctx1 = document.getElementById('patientChart');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            datasets: [{
                label: 'Patients',
                data: [5, 8, 12, 7, 10, 6, 9],
                borderColor: 'blue',
                backgroundColor: 'rgba(0,123,255,0.2)',
                fill: true
            }]
        }
    });

    // Appointments pie chart
    const ctx2 = document.getElementById('appointmentChart');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Confirmed','Pending','Cancelled'],
            datasets: [{
                data: [10, 2, 1],
                backgroundColor: ['#198754','#ffc107','#dc3545']
            }]
        }
    });
</script>
</body>
</html>
