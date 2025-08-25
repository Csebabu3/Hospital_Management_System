<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Staff Management</title>
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
  <h2>Staff Management</h2>
  <a href="<?= base_url('staff/create') ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Staff</a>
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
        <th>Name</th>
        <th>Role</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Attendance</th>
        <th>Salary</th>
        <th>Overtime</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($staffList)): ?>
      <?php $i=1; foreach($staffList as $staff): ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $staff['name'] ?></td>
        <td><?= $staff['role'] ?></td>
        <td><?= $staff['email'] ?></td>
        <td><?= $staff['phone'] ?></td>
        <td><?= $staff['attendance'] ?></td>
        <td>$<?= number_format($staff['salary'],2) ?></td>
        <td><?= $staff['overtime_hours'] ?> hrs</td>
        <td>
          <a href="<?= base_url('staff/edit/'.$staff['id']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
          <a href="<?= base_url('staff/delete/'.$staff['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php else: ?>
      <tr><td colspan="9" class="text-center">No staff found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
</body>
</html>
