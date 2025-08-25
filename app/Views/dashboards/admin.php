<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border-radius: 15px;
    }
    .sidebar {
      height: 100vh;
      background: #0d6efd;
      color: white;
      position: fixed;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 10px;
      border-radius: 8px;
    }
    .sidebar a:hover {
      background: #0b5ed7;
    }
    .main {
      margin-left: 220px;
      padding: 20px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-2 d-none d-md-block sidebar p-3">
      <h4 class="text-center">Admin</h4>
      <hr>
      <a href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
      <!-- <a href="#"><i class="bi bi-person"></i> Patients</a> -->
       <a href="<?= base_url('patients') ?>"><i class="bi bi-person"></i>  Patients</a>
       <a href="<?= base_url('doctors') ?>"><i class="bi bi-person"></i>  Doctors</a>
       <a href="<?= base_url('staff') ?>"><i class="bi bi-person"></i>  Staff</a>
      <a href="<?= base_url('appointments') ?>"><i class="bi bi-calendar-check"></i>  Appointments</a>
      <a href="<?= base_url('pharmacy') ?>"><i class="bi bi-people"></i>  Pharmacy</a>
      <a href="<?= base_url('lab/technicians') ?>"><i class="bi bi-people"></i>  Laboratory</a>
      <a href="#"><i class="bi bi-bar-chart"></i> Reports</a>
      <a href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </nav>

    <!-- Main Content -->
    <main class="col-md-10 ms-sm-auto main">
      
      <!-- Top Navbar -->
      <nav class="navbar navbar-light bg-white shadow-sm rounded mb-4">
        <div class="container-fluid">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search patients, doctors..." aria-label="Search">
            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
          </form>
          <div>
            <button class="btn btn-light"><i class="bi bi-bell"></i></button>
            <button class="btn btn-light"><i class="bi bi-envelope"></i></button>
            <div class="btn-group">
              <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i> Admin
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <!-- Top Summary Cards -->
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card shadow p-3">
            <h6>Patients Today</h6>
            <h3>120</h3>
            <small class="text-success">+15 new</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow p-3">
            <h6>Appointments</h6>
            <h3>45</h3>
            <small class="text-info">Scheduled</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow p-3">
            <h6>Doctors on Duty</h6>
            <h3>18</h3>
            <small class="text-warning">Available</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow p-3">
            <h6>Pharmacy Alerts</h6>
            <h3>5</h3>
            <small class="text-danger">Low stock</small>
          </div>
        </div>
      </div>

      <!-- More Analytics -->
      <div class="row mt-4">
        <div class="col-md-4">
          <div class="card shadow p-3">
            <h6>Bed Occupancy</h6>
            <h3>78%</h3>
            <small class="text-muted">200 / 256 Beds</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow p-3">
            <h6>Emergency Cases</h6>
            <h3>12</h3>
            <small class="text-danger">Critical today</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow p-3">
            <h6>Pending Lab Reports</h6>
            <h3>30</h3>
            <small class="text-warning">To be reviewed</small>
          </div>
        </div>
      </div>

      <!-- Revenue & Charts -->
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="card shadow p-3">
            <h6>Revenue Summary</h6>
            <p>Daily: <strong>$12,500</strong></p>
            <p>Monthly: <strong>$3,45,000</strong></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card shadow p-3">
            <h6>Appointments Trend</h6>
            <div class="text-center">
              <i class="bi bi-graph-up" style="font-size: 3rem; color: #0d6efd;"></i>
              <p class="text-muted">Chart placeholder</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Activity Timeline -->
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="card shadow p-3">
            <h6>Recent Activities</h6>
            <ul class="list-group">
              <li class="list-group-item"><i class="bi bi-person-plus text-success"></i> New patient admitted - John Doe</li>
              <li class="list-group-item"><i class="bi bi-calendar-check text-info"></i> Appointment booked - Jane Smith</li>
              <li class="list-group-item"><i class="bi bi-capsule text-danger"></i> Low stock alert - Paracetamol</li>
              <li class="list-group-item"><i class="bi bi-people text-warning"></i> Dr. Kumar started shift</li>
            </ul>
          </div>
        </div>

        <!-- Latest Patients Table -->
        <div class="col-md-6">
          <div class="card shadow p-3">
            <h6>Recent Patients</h6>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Status</th>
                  <th>Admitted On</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>John Doe</td>
                  <td>32</td>
                  <td><span class="badge bg-success">Admitted</span></td>
                  <td>2025-08-24</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jane Smith</td>
                  <td>45</td>
                  <td><span class="badge bg-warning">Discharged</span></td>
                  <td>2025-08-23</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Michael Lee</td>
                  <td>28</td>
                  <td><span class="badge bg-info">Under Treatment</span></td>
                  <td>2025-08-22</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
