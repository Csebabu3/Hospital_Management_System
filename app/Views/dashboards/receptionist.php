<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Receptionist Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f3f6;
      transition: all 0.3s;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Sidebar */
    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: white;
      padding-top: 20px;
      position: fixed;
      width: 220px;
      transition: all 0.3s;
      z-index: 1000;
    }
    .sidebar.collapsed {
      width: 70px;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
      padding: 12px 20px;
      border-radius: 10px;
      margin: 5px 10px;
      transition: background 0.3s;
    }
    .sidebar a:hover {
      background: linear-gradient(90deg, #6c63ff, #00c6ff);
      color: white;
    }
    .sidebar a i {
      margin-right: 12px;
      font-size: 1.2rem;
      min-width: 24px;
      text-align: center;
    }
    .sidebar.collapsed a span {
      display: none;
    }

    /* Sidebar title */
    .sidebar h4 {
      font-size: 1.2rem;
      text-align: center;
      margin-bottom: 20px;
      transition: all 0.3s;
    }
    .sidebar.collapsed h4 {
      font-size: 1rem;
    }

    /* Content */
    .content {
      margin-left: 220px;
      padding: 20px;
      transition: all 0.3s;
    }
    .content.expanded {
      margin-left: 70px;
    }

    /* Top Navbar */
    .top-navbar {
      background-color: white;
      padding: 10px 20px;
      margin-left: -20px;
      margin-right: -20px;
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      border-radius: 10px;
    }
    .menu-toggle {
      font-size: 24px;
      cursor: pointer;
    }

    /* Cards */
    .card {
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .section-title {
      margin-top: 30px;
      margin-bottom: 15px;
      font-weight: 600;
      font-size: 1.25rem;
      color: #343a40;
    }

    /* Responsive */
    @media(max-width: 768px) {
      .sidebar {
        position: fixed;
        z-index: 10000;
        left: -220px;
      }
      .sidebar.show {
        left: 0;
      }
      .content {
        margin-left: 0;
      }
      .top-navbar {
        margin-left: 0;
      }
    }

  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <h4><i class="bi bi-person-circle"></i> <span>Receptionist</span></h4>
    <a href="#"><i class="bi bi-speedometer2"></i><span>Dashboard</span></a>
     <a href="<?= base_url('receptionist/patient/list') ?>"><i class="bi bi-person"></i>  Patients</a>
     <a href="<?= base_url('receptionist/appointment/list') ?>"><i class="bi bi-calendar-check"></i><span>  Appointment</a>
     <a href="<?= base_url('receptionist/billing/list') ?>"><i class="bi bi-calendar-check"></i><span>  Billing Assistance</a>
     <a href="<?= base_url('receptionist/communication/list') ?>">
   <i class="bi bi-chat-dots"></i><span> Communication</span>
</a>
<a href="<?= base_url('receptionist/queue/list') ?>">
   <i class="bi bi-chat-dots"></i><span> Queue Management</span>
</a>

    <a href="#"><i class="bi bi-check2-circle"></i><span>Check-in</span></a>
    <a href="#"><i class="bi bi-bell"></i><span>Notifications</span></a>
    <a href="#"><i class="bi bi-person"></i><span>Profile</span></a>
    <a href="<?= base_url('logout') ?>" class="btn btn-danger w-75 mx-3 mt-4"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
  </div>

  <!-- Main Content -->
  <div class="content" id="main-content">

    <!-- Top Navbar -->
    <div class="top-navbar">
      <div class="d-flex align-items-center">
        <span class="menu-toggle me-3" id="menu-toggle">&#9776;</span>
        <h3>Receptionist Dashboard</h3>
      </div>
      <span>Welcome, Receptionist</span>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
      <div class="col-md-3 col-6 mb-2">
        <button class="btn btn-primary w-100"><i class="bi bi-person-plus"></i> Add Patient</button>
      </div>
      <div class="col-md-3 col-6 mb-2">
        <button class="btn btn-success w-100"><i class="bi bi-calendar-plus"></i> Schedule Appointment</button>
      </div>
      <div class="col-md-3 col-6 mb-2">
        <button class="btn btn-warning w-100"><i class="bi bi-check2-square"></i> Check-in Patient</button>
      </div>
      <div class="col-md-3 col-6 mb-2">
        <button class="btn btn-info w-100"><i class="bi bi-bell-fill"></i> Send Notification</button>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
      <div class="col-md-4 col-6">
        <div class="card text-center text-white bg-primary p-3">
          <h6>Today's Appointments</h6>
          <h3>18</h3>
        </div>
      </div>
      <div class="col-md-4 col-6">
        <div class="card text-center text-white bg-success p-3">
          <h6>Checked-in Patients</h6>
          <h3>12</h3>
        </div>
      </div>
      <div class="col-md-4 col-6">
        <div class="card text-center text-white bg-warning p-3">
          <h6>Urgent Notifications</h6>
          <h3>3</h3>
        </div>
      </div>
    </div>

    <!-- Search Appointments -->
    <div class="mb-3">
      <input type="text" class="form-control w-50" placeholder="Search by Patient or Doctor...">
    </div>

    <!-- Today's Appointments Table -->
    <h4 class="section-title">Today’s Appointments</h4>
    <div class="card mb-4">
      <div class="card-body table-responsive">
        <table class="table table-hover table-bordered align-middle">
          <thead class="table-dark">
            <tr>
              <th>Patient</th>
              <th>Time</th>
              <th>Doctor</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>John Doe</td><td>09:30 AM</td><td>Dr. Smith</td><td><span class="badge bg-success">Checked-in</span></td></tr>
            <tr><td>Mary Jane</td><td>10:00 AM</td><td>Dr. Lee</td><td><span class="badge bg-warning">Pending</span></td></tr>
            <tr><td>Peter Parker</td><td>10:30 AM</td><td>Dr. Banner</td><td><span class="badge bg-danger">No-show</span></td></tr>
            <tr><td>Anna Smith</td><td>11:00 AM</td><td>Dr. Strange</td><td><span class="badge bg-success">Checked-in</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Upcoming Appointments -->
    <h4 class="section-title">Upcoming Appointments</h4>
    <div class="row g-4 mb-4">
      <div class="col-md-6">
        <div class="card p-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">08/29 - Jane Doe with Dr. Strange</li>
            <li class="list-group-item">08/29 - Peter Parker with Dr. Lee</li>
            <li class="list-group-item">08/30 - Tony Stark with Dr. Banner</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center text-white bg-secondary p-3">
          <h6>Weekly Check-ins</h6>
          <h3>45 Patients</h3>
        </div>
      </div>
    </div>

    <!-- Notifications -->
    <h4 class="section-title">Notifications & Alerts</h4>
    <div class="row g-4 mb-5">
      <div class="col-md-6">
        <div class="card p-3">
          <h6>Notifications</h6>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Urgent: Appointment rescheduled for Patient #123</li>
            <li class="list-group-item">Patient #456 has requested early check-in</li>
            <li class="list-group-item">System maintenance tonight from 10 PM</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-3">
          <h6>Patient Alerts</h6>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Patient #123 - Needs urgent follow-up</li>
            <li class="list-group-item">Patient #456 - Insurance info missing</li>
            <li class="list-group-item">Patient #789 - Allergy alert</li>
          </ul>
        </div>
      </div>
    </div>

  </div>

  <!-- JS for Sidebar Toggle -->
  <script>
    const toggleBtn = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('main-content');

    toggleBtn.addEventListener('click', () => {
      // For desktop collapse
      sidebar.classList.toggle('collapsed');
      content.classList.toggle('expanded');
      // For mobile show
      if(window.innerWidth < 768){
        sidebar.classList.toggle('show');
      }
    });
  </script>

</body>
</html>
