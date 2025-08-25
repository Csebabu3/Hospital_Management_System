<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card shadow-lg p-4 w-100" style="max-width: 500px;">
    <h2 class="text-center mb-4">Register</h2>
    <form action="<?= base_url('registerUser') ?>" method="post">
      <div class="mb-3">
        <label class="form-label">User Name</label>
        <input type="text" class="form-control" name="username" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Role</label>
        <select class="form-select" name="role" required>
          <option value="">Select Role</option>
          <option value="Admin">Admin</option>
          <option value="Doctor">Doctor</option>
          <option value="Nurse">Nurse</option>
          <option value="Receptionist">Receptionist</option>
          <option value="Pharmacist">Pharmacist</option>
          <option value="Lab Technician">Lab Technician</option>
          <option value="Patient">Patient</option>
        </select>
      </div>
      <button class="btn btn-primary w-100">Register</button>
      <div class="text-center mt-3">
        <a href="<?= base_url('/') ?>">Already have an account? Login</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>
