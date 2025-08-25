<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lab Technicians</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body { background:#f8f9fa; }
    .card { border-radius: 14px; }
    .table td, .table th { vertical-align: middle; }
  </style>
</head>
<body class="container py-4">

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2 class="m-0">Lab Technicians</h2>
  <a href="<?= base_url('lab/technicians/create') ?>" class="btn btn-primary">
    <i class="bi bi-plus-circle"></i> Add Technician
  </a>
</div>

<?php if(session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<div class="card shadow p-3">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Department</th>
          <th style="width:160px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($technicians)): ?>
          <?php $i=1; foreach($technicians as $t): ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= esc($t['name']) ?></td>
              <td><?= esc($t['email']) ?></td>
              <td><?= esc($t['phone']) ?></td>
              <td><?= esc($t['department']) ?></td>
              <td>
                <a href="<?= base_url('lab/technicians/edit/'.$t['id']) ?>" class="btn btn-sm btn-warning">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
                <a href="<?= base_url('lab/technicians/delete/'.$t['id']) ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Delete this technician?')">
                  <i class="bi bi-trash"></i> Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="6" class="text-center">No technicians found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  <a href="<?= base_url('lab/tests') ?>" class="btn btn-outline-secondary">
    <i class="bi bi-flask"></i> Go to Lab Tests
  </a>
</div>

</body>
</html>
