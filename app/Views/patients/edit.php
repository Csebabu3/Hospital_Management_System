<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Patient</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Edit Patient</h2>

  <?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
      <?php foreach(session()->getFlashdata('errors') as $err): ?>
        <div><?= esc($err) ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <?php $validation = \Config\Services::validation(); ?>
  <?php if(isset($errors) && is_array($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach($errors as $e): ?><div><?= esc($e) ?></div><?php endforeach; ?>
    </div>
  <?php endif; ?>

  <form action="<?= site_url('patients/update/'.$patient['id']) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" required value="<?= esc(old('name', $patient['name'])) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required value="<?= esc(old('email', $patient['email'])) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" value="<?= esc(old('phone', $patient['phone'])) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Gender</label>
      <select name="gender" class="form-select">
        <?php $g = old('gender', $patient['gender']); ?>
        <option value="">Select</option>
        <option value="Male" <?= $g==='Male' ? 'selected':'' ?>>Male</option>
        <option value="Female" <?= $g==='Female' ? 'selected':'' ?>>Female</option>
        <option value="Other" <?= $g==='Other' ? 'selected':'' ?>>Other</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">DOB</label>
      <input type="date" name="dob" class="form-control" value="<?= esc(old('dob', $patient['dob'])) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Address</label>
      <textarea name="address" class="form-control"><?= esc(old('address', $patient['address'])) ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Treatment History</label>
      <textarea name="treatment_history" class="form-control"><?= esc(old('treatment_history', $patient['treatment_history'])) ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Bills</label>
      <input type="number" step="0.01" name="bills" class="form-control" value="<?= esc(old('bills', $patient['bills'])) ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Status</label>
      <select name="status" class="form-select">
        <?php $s = old('status', $patient['status']); ?>
        <option value="Pending" <?= $s==='Pending' ? 'selected':'' ?>>Pending</option>
        <option value="Approved" <?= $s==='Approved' ? 'selected':'' ?>>Approved</option>
        <option value="Rejected" <?= $s==='Rejected' ? 'selected':'' ?>>Rejected</option>
      </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="<?= site_url('patients') ?>" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
