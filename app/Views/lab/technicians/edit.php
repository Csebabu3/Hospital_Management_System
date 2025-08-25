<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Technician</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2>Edit Technician</h2>
<form action="<?= base_url('lab/technicians/update/'.$technician['id']) ?>" method="post" class="mt-3">
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="<?= esc($technician['name']) ?>" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= esc($technician['email']) ?>" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" value="<?= esc($technician['phone']) ?>">
    </div>
    <div class="col-md-6">
      <label class="form-label">Department</label>
      <input type="text" name="department" class="form-control" value="<?= esc($technician['department']) ?>">
    </div>
  </div>
  <div class="mt-4">
    <button class="btn btn-primary">Update</button>
    <a href="<?= base_url('lab/technicians') ?>" class="btn btn-secondary">Cancel</a>
  </div>
</form>

</body>
</html>
