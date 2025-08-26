<!DOCTYPE html>
<html>
<head>
    <title>View Prescription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>Prescription Details for <?= $patient['name'] ?></h2>
<div class="card mb-3">
    <div class="card-body">
        <p><strong>Medicines:</strong> <?= $prescription['medicines'] ?></p>
        <p><strong>Lab Tests:</strong> <?= $prescription['lab_tests'] ?></p>
        <p><strong>Diet Plan:</strong> <?= $prescription['diet_plan'] ?></p>
        <p><strong>Lifestyle Plan:</strong> <?= $prescription['lifestyle_plan'] ?></p>
        <p><strong>Notes:</strong> <?= $prescription['notes'] ?></p>
    </div>
</div>
<a href="<?= site_url('doctor/prescriptions') ?>" class="btn btn-secondary">Back</a>
<a href="<?= site_url('doctor/prescriptions/edit/'.$prescription['id']) ?>" class="btn btn-warning">Edit</a>
</body>
</html>
