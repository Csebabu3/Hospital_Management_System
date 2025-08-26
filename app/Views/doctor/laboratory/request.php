<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Lab Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

  <h2>Request New Lab Test</h2>
  <form action="<?= site_url('doctor/lab-tests/store') ?>" method="post" class="mt-3">
    <div class="row g-3">
      <div class="col-md-6">
        <label>Patient ID</label>
        <input type="number" name="patient_id" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label>Doctor ID</label>
        <input type="number" name="doctor_id" class="form-control" required>
      </div>
      <div class="col-12">
        <label>Test Name</label>
        <input type="text" name="test_name" class="form-control" required>
      </div>
      <div class="col-12 mt-3">
        <button type="submit" class="btn btn-success">Request</button>
        <a href="<?= site_url('doctor/lab-tests') ?>" class="btn btn-secondary">Cancel</a>
      </div>
    </div>
  </form>

</body>
</html>
