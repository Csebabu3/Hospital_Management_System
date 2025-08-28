<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Medical Record</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Edit Medical Record</h2>

<form action="<?= base_url('patient/medical-records/update/'.$record['id']) ?>" method="post" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Diagnosis</label>
    <input type="text" name="diagnosis" class="form-control" value="<?= $record['diagnosis'] ?>" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Prescription</label>
    <textarea name="prescription" class="form-control" required><?= $record['prescription'] ?></textarea>
  </div>
  <div class="col-md-6">
    <label class="form-label">Medications</label>
    <textarea name="medications" class="form-control"><?= $record['medications'] ?></textarea>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Update Record</button>
    <a href="<?= base_url('patient/medical-records') ?>" class="btn btn-secondary">Cancel</a>
  </div>
</form>

</body>
</html>
