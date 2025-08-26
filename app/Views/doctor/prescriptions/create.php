<!DOCTYPE html>
<html>
<head>
    <title>Create Prescription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>Create Prescription for <?= $patient['name'] ?></h2>
<form action="<?= site_url('doctor/prescriptions/store') ?>" method="post">
    <input type="hidden" name="patient_id" value="<?= $patient['id'] ?>">
    <input type="hidden" name="doctor_id" value="1"> <!-- Replace with logged-in doctor ID -->

    <div class="mb-3">
        <label class="form-label">Medicines</label>
        <textarea class="form-control" name="medicines" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Lab Tests</label>
        <textarea class="form-control" name="lab_tests" rows="2"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Diet Plan</label>
        <textarea class="form-control" name="diet_plan" rows="2"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Lifestyle Plan</label>
        <textarea class="form-control" name="lifestyle_plan" rows="2"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea class="form-control" name="notes" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="<?= site_url('doctor/prescriptions') ?>" class="btn btn-secondary">Cancel</a>
</form>
</body>
</html>
