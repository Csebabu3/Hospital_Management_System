<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Staff</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Edit Staff</h2>
<form action="<?= base_url('staff/update/'.$staff['id']) ?>" method="post">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" name="name" value="<?= $staff['name'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-select" required>
      <option value="Doctor" <?= $staff['role']=='Doctor'?'selected':'' ?>>Doctor</option>
      <option value="Nurse" <?= $staff['role']=='Nurse'?'selected':'' ?>>Nurse</option>
      <option value="Receptionist" <?= $staff['role']=='Receptionist'?'selected':'' ?>>Receptionist</option>
      <option value="Pharmacist" <?= $staff['role']=='Pharmacist'?'selected':'' ?>>Pharmacist</option>
      <option value="Lab Technician" <?= $staff['role']=='Lab Technician'?'selected':'' ?>>Lab Technician</option>
    </select>
  </div>
  <div class="mb-3"><label>Email</label><input type="email" class="form-control" name="email" value="<?= $staff['email'] ?>" required></div>
  <div class="mb-3"><label>Phone</label><input type="text" class="form-control" name="phone" value="<?= $staff['phone'] ?>" required></div>
  <div class="mb-3"><label>Attendance</label><input type="number" class="form-control" name="attendance" value="<?= $staff['attendance'] ?>" required></div>
  <div class="mb-3"><label>Performance</label><input type="text" class="form-control" name="performance" value="<?= $staff['performance'] ?>" required></div>
  <div class="mb-3"><label>Salary</label><input type="number" class="form-control" name="salary" value="<?= $staff['salary'] ?>" required></div>
  <div class="mb-3"><label>Overtime Hours</label><input type="number" class="form-control" name="overtime_hours" value="<?= $staff['overtime_hours'] ?>" required></div>
  <button class="btn btn-primary">Update Staff</button>
  <a href="<?= base_url('staff') ?>" class="btn btn-secondary">Back</a>
</form>
</body>
</html>
