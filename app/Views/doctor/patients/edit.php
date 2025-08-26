<!DOCTYPE html>
<html>
<head>
  <title>Update Progress Notes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2>Update Progress Notes for <?= $patient['name'] ?></h2>
  <form action="<?= site_url('doctor/patients/update/'.$patient['id']) ?>" method="post">
    <div class="mb-3">
      <label class="form-label">Progress Notes</label>
      <textarea class="form-control" name="progress_notes" rows="5"><?= $patient['progress_notes'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="<?= site_url('doctor/patients/view/'.$patient['id']) ?>" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
