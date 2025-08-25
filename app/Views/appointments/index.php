<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Appointments</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
body { background-color: #f8f9fa; }
.card { border-radius: 15px; }
.table td, .table th { vertical-align: middle; }
</style>
</head>
<body class="container mt-5">

<div class="d-flex justify-content-between mb-3">
  <h2>Appointment Management</h2>
  <a href="<?= base_url('appointments/create') ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Appointment</a>
</div>

<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<div class="card shadow p-3">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Patient Name</th>
        <th>Email</th>
        <th>Doctor</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($appointments)): ?>
        <?php $i=1; foreach($appointments as $a): ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $a['patient_name'] ?></td>
          <td><?= $a['patient_email'] ?></td>
          <td><?= $a['doctor_name'] ?></td>
          <td><?= $a['appointment_date'] ?></td>
          <td><?= $a['appointment_time'] ?></td>
          <td>
            <?php if($a['status']=='Approved'): ?>
              <span class="badge bg-success"><?= $a['status'] ?></span>
            <?php elseif($a['status']=='Cancelled'): ?>
              <span class="badge bg-danger"><?= $a['status'] ?></span>
            <?php else: ?>
              <span class="badge bg-warning"><?= $a['status'] ?></span>
            <?php endif; ?>
          </td>
          <td>
            <a href="<?= base_url('appointments/edit/'.$a['id']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
            <a href="<?= base_url('appointments/delete/'.$a['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
      <tr><td colspan="8" class="text-center">No appointments found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
