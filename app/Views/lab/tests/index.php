<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lab Tests</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body { background:#f8f9fa; }
    .badge { font-size: .9rem; }
  </style>
</head>
<body class="container py-4">

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2 class="m-0">Lab Tests</h2>
  <a href="<?= base_url('lab/tests/create') ?>" class="btn btn-primary">
    <i class="bi bi-plus-circle"></i> Add Lab Test
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
    <table class="table table-striped table-hover align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Patient</th>
          <th>Test Type</th>
          <th>Technician</th>
          <th>Status</th>
          <th>Report</th>
          <th>Created</th>
          <th style="width:160px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($tests)): ?>
          <?php $i=1; foreach($tests as $t): ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= esc($t['patient_name']) ?></td>
              <td><?= esc($t['test_type']) ?></td>
              <td><?= esc($t['technician_name'] ?? '') ?></td>
              <td>
                <?php
                  $map = ['Pending'=>'warning','Approved'=>'success','Rejected'=>'danger','Completed'=>'info'];
                  $cls = $map[$t['status']] ?? 'secondary';
                ?>
                <span class="badge bg-<?= $cls ?>"><?= esc($t['status']) ?></span>
              </td>
              <td>
                <?=
                  !empty($t['report_file'])
                    ? '<a class="btn btn-sm btn-outline-primary" target="_blank" href="'.base_url('uploads/reports/'.$t['report_file']).'"><i class="bi bi-file-earmark-arrow-down"></i> View</a>'
                    : '<span class="text-muted">—</span>';
                ?>
              </td>
              <td><?= date('Y-m-d', strtotime($t['created_at'])) ?></td>
              <td>
                <a href="<?= base_url('lab/tests/edit/'.$t['id']) ?>" class="btn btn-sm btn-warning">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
                <a href="<?= base_url('lab/tests/delete/'.$t['id']) ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Delete this test?')">
                  <i class="bi bi-trash"></i> Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="8" class="text-center">No tests found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  <a href="<?= base_url('lab/technicians') ?>" class="btn btn-outline-secondary">
    <i class="bi bi-person-badge"></i> Manage Technicians
  </a>
</div>

</body>
</html>
