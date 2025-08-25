<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Add Lab Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2>Add Lab Test</h2>

<form action="<?= base_url('lab/tests/store') ?>" method="post" enctype="multipart/form-data" class="mt-3">
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Patient Name</label>
      <input type="text" name="patient_name" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Test Type</label>
      <input type="text" name="test_type" class="form-control" placeholder="CBC, Lipid Panel, etc." required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Assign Technician</label>
      <select name="assigned_technician_id" class="form-select">
        <option value="">-- Optional --</option>
        <?php if(!empty($technicians)): ?>
          <?php foreach($technicians as $tech): ?>
            <option value="<?= $tech['id'] ?>"><?= esc($tech['name']) ?> (<?= esc($tech['department']) ?>)</option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">Status</label>
      <select name="status" class="form-select">
        <option value="Pending">Pending</option>
        <option value="Approved">Approved</option>
        <option value="Rejected">Rejected</option>
        <option value="Completed">Completed</option>
      </select>
    </div>
    <div class="col-12">
      <label class="form-label">Report File (PDF/Image)</label>
      <input type="file" name="report_file" class="form-control">
    </div>
  </div>

  <div class="mt-4">
    <button class="btn btn-primary">Save</button>
    <a href="<?= base_url('lab/tests') ?>" class="btn btn-secondary">Cancel</a>
  </div>
</form>

</body>
</html>
