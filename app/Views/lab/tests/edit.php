<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Lab Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2>Edit Lab Test</h2>

<form action="<?= base_url('lab/tests/update/'.$test['id']) ?>" method="post" enctype="multipart/form-data" class="mt-3">
  <input type="hidden" name="old_report_file" value="<?= esc($test['report_file']) ?>">
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Patient Name</label>
      <input type="text" name="patient_name" class="form-control" value="<?= esc($test['patient_name']) ?>" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Test Type</label>
      <input type="text" name="test_type" class="form-control" value="<?= esc($test['test_type']) ?>" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Assign Technician</label>
      <select name="assigned_technician_id" class="form-select">
        <option value="">-- Optional --</option>
        <?php if(!empty($technicians)): ?>
          <?php foreach($technicians as $tech): ?>
            <option value="<?= $tech['id'] ?>" <?= (int)($test['assigned_technician_id'])===(int)$tech['id']?'selected':'' ?>>
              <?= esc($tech['name']) ?> (<?= esc($tech['department']) ?>)
            </option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">Status</label>
      <select name="status" class="form-select">
        <?php
          $statuses = ['Pending','Approved','Rejected','Completed'];
          foreach($statuses as $s){
            $sel = $test['status']===$s ? 'selected' : '';
            echo "<option value=\"$s\" $sel>$s</option>";
          }
        ?>
      </select>
    </div>
    <div class="col-12">
      <label class="form-label">Replace Report (optional)</label>
      <input type="file" name="report_file" class="form-control">
      <small class="text-muted">
        Current: <?= !empty($test['report_file']) ? esc($test['report_file']) : 'No file' ?>
      </small>
    </div>
  </div>

  <div class="mt-4">
    <button class="btn btn-primary">Update</button>
    <a href="<?= base_url('lab/tests') ?>" class="btn btn-secondary">Cancel</a>
  </div>
</form>

</body>
</html>
