<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Appointments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>My Appointments</h2>
<a href="<?= base_url('patient/appointments/create') ?>" class="btn btn-success mb-3">Book New Appointment</a>

<?php if(session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="table-responsive">
<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>Doctor</th>
      <th>Specialization</th>
      <th>Date & Time</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($appointments as $a): ?>
      <tr>
        <td><?= $a['doctor_name'] ?></td>
        <td><?= $a['specialization'] ?></td>
        <td><?= date('d M Y, h:i A', strtotime($a['appointment_date'])) ?></td>
        <td>
          <span class="badge bg-<?= $a['status']=='Cancelled'?'danger':($a['status']=='Rescheduled'?'warning':'success') ?>">
            <?= $a['status'] ?>
          </span>
        </td>
        <td>
          <?php if($a['status'] != 'Cancelled'): ?>
            <a href="<?= base_url('patient/appointments/edit/'.$a['id']) ?>" class="btn btn-sm btn-primary">Reschedule</a>
            <a href="<?= base_url('patient/appointments/cancel/'.$a['id']) ?>" class="btn btn-sm btn-danger">Cancel</a>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</body>
</html>
