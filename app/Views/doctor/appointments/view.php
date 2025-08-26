<!DOCTYPE html>
<html>
<head>
    <title>View Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>Appointment Details</h2>
<div class="card mb-3">
    <div class="card-body">
        <p><strong>Patient Name:</strong> <?= $patient['name'] ?></p>
        <p><strong>Appointment Date:</strong> <?= $appointment['appointment_date'] ?></p>
        <p><strong>Status:</strong> <?= $appointment['status'] ?></p>
    </div>
</div>
<a href="<?= site_url('doctor/appointments') ?>" class="btn btn-secondary">Back</a>
<a href="<?= site_url('doctor/appointments/edit/'.$appointment['id']) ?>" class="btn btn-warning">Update Status</a>
</body>
</html>
