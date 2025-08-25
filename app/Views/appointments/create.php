<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Appointment</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Schedule Appointment</h2>
<form action="<?= base_url('appointments/store') ?>" method="post">
  <div class="mb-3"><label>Patient Name</label><input type="text" name="patient_name" class="form-control" required></div>
  <div class="mb-3"><label>Email</label><input type="email" name="patient_email" class="form-control" required></div>
  <div class="mb-3"><label>Doctor</label><input type="text" name="doctor_name" class="form-control" required></div>
  <div class="mb-3"><label>Date</label><input type="date" name="appointment_date" class="form-control" required></div>
  <div class="mb-3"><label>Time</label><input type="time" name="appointment_time" class="form-control" required></div>
  <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select" required>
      <option value="Pending">Pending</option>
      <option value="Approved">Approved</option>
      <option value="Cancelled">Cancelled</option>
    </select>
  </div>
  <button class="btn btn-primary">Schedule</button>
  <a href="<?= base_url('appointments') ?>" class="btn btn-secondary">Back</a>
</form>
</body>
</html>
