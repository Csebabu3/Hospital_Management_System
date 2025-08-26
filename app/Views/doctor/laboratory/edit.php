<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Lab Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

  <h2>Update Lab Test</h2>
  <form action="<?= site_url('doctor/lab-tests/update/'.$lab_test['id']) ?>" method="post" class="mt-3">
    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-select">
        <option value="Requested" <?= $lab_test['status']=='Requested'?'selected':'' ?>>Requested</option>
        <option value="Completed" <?= $lab_test['status']=='Completed'?'selected':'' ?>>Completed</option>
        <option value="Reviewed" <?= $lab_test['status']=='Reviewed'?'selected':'' ?>>Reviewed</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Result</label>
      <textarea name="result" class="form-control" rows="4"><?= $lab_test['result'] ?></textarea>
    </div>
    <div class="mb-3">
      <label>Remarks</label>
      <textarea name="remarks" class="form-control" rows="3"><?= $lab_test['remarks'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= site_url('doctor/lab-tests/view/'.$lab_test['id']) ?>" class="btn btn-secondary">Cancel</a>
  </form>

</body>
</html>
