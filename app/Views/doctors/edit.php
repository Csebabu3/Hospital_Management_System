<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Doctor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Edit Doctor</h2>
<form action="<?= base_url('doctors/update/'.$doctor['id']) ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="<?= $doctor['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Department</label>
        <input type="text" class="form-control" name="department" value="<?= $doctor['department'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $doctor['email'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" value="<?= $doctor['phone'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Schedule</label>
        <textarea class="form-control" name="schedule"><?= $doctor['schedule'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Doctor</button>
    <a href="<?= base_url('doctors') ?>" class="btn btn-secondary">Cancel</a>
</form>
</body>
</html>
