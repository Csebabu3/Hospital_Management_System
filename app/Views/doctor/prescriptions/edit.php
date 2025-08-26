<!DOCTYPE html>
<html>
<head>
    <title>Edit Prescription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>Edit Prescription for <?= $patient['name'] ?></h2>
<form action="<?= site_url('doctor/prescriptions/update/'.$prescription['id']) ?>" method="post">

    <div class="mb-3">
        <label class="form-label">Medicines</label>
        <textarea class="form-control" name="medicines" rows="3"><?= $prescription['medicines'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Lab Tests</label>
        <textarea class="form-control" name="lab_tests" rows="2"><?= $prescription['lab_tests'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Diet Plan</label>
        <textarea class="form-control" name="diet_plan" rows="2"><?= $prescription['diet_plan'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Lifestyle Plan</label>
        <textarea class="form-control" name="lifestyle_plan" rows="2"><?= $prescription['lifestyle_plan'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea class="form-control" name="notes" rows="3"><?= $prescription['notes'] ?></textarea>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= site_url('doctor/prescriptions/view/'.$prescription['id']) ?>" class="btn btn-secondary">Cancel</a>
</form>
</body>
</html>
