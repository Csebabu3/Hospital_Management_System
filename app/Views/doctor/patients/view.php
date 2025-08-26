<!DOCTYPE html>
<html>
<head>
  <title>Patient Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2>Patient Details</h2>
  <div class="card">
    <div class="card-body">
      <p><strong>Name:</strong> <?= $patient['name'] ?></p>
      <p><strong>Age:</strong> <?= $patient['age'] ?></p>
      <p><strong>Gender:</strong> <?= $patient['gender'] ?></p>
      <p><strong>Allergies:</strong> <?= $patient['allergies'] ?></p>
      <p><strong>Medical History:</strong> <?= $patient['medical_history'] ?></p>
      <p><strong>Ongoing Treatment:</strong> <?= $patient['current_treatment'] ?></p>
      <p><strong>Prescriptions:</strong> <?= $patient['prescriptions'] ?></p>
      <p><strong>Progress Notes:</strong> <?= $patient['progress_notes'] ?></p>
      <p><strong>Status:</strong> <?= $patient['status'] ?></p>
    </div>
  </div>
  <a href="<?= site_url('doctor/patients') ?>" class="btn btn-secondary mt-3">Back</a>
</body>
</html>
