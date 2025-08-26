<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab Test Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

  <h2>Lab Test Details</h2>
  <div class="card mt-3">
    <div class="card-body">
      <p><strong>Patient ID:</strong> <?= $lab_test['patient_id'] ?></p>
      <p><strong>Doctor ID:</strong> <?= $lab_test['doctor_id'] ?></p>
      <p><strong>Test Name:</strong> <?= $lab_test['test_name'] ?></p>
      <p><strong>Status:</strong> <span class="badge bg-<?= $lab_test['status']=='Requested'?'warning':($lab_test['status']=='Completed'?'success':'info') ?>"><?= $lab_test['status'] ?></span></p>
      <p><strong>Result:</strong> <?= $lab_test['result'] ?? '-' ?></p>
      <p><strong>Remarks:</strong> <?= $lab_test['remarks'] ?? '-' ?></p>
    </div>
  </div>

  <div class="mt-3">
    <a href="<?= site_url('doctor/lab-tests') ?>" class="btn btn-secondary">Back</a>
    <a href="<?= site_url('doctor/lab-tests/edit/'.$lab_test['id']) ?>" class="btn btn-warning">Update</a>
  </div>

</body>
</html>
