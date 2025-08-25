<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Staff</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Add New Staff</h2>
<form action="<?= base_url('staff/store') ?>" method="post">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-select" required>
      <option value="">Select Role</option>
      <option value="Doctor">Doctor</option>
      <option value="Nurse">Nurse</option>
      <option value="Receptionist">Receptionist</option>
      <option value="Pharmacist">Pharmacist</option>
      <option value="Lab Technician">Lab Technician</option>
    </select>
  </div>
  <div class="mb-3"><label>Email</label><input type="email" class="form-control" name="email" required></div>
  <div class="mb-3"><label>Phone</label><input type="text" class="form-control" name="phone" required></div>
  <div class="mb-3"><label>Attendance</label><input type="number" class="form-control" name="attendance" required></div>
  <div class="mb-3"><label>Performance</label><input type="text" class="form-control" name="performance" required></div>
  <div class="mb-3"><label>Salary</label><input type="number" class="form-control" name="salary" required></div>
  <div class="mb-3"><label>Overtime Hours</label><input type="number" class="form-control" name="overtime_hours" required></div>
  <button class="btn btn-primary">Add Staff</button>
  <a href="<?= base_url('staff') ?>" class="btn btn-secondary">Back</a>
</form>
</body>
</html>
