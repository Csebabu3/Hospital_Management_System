<!DOCTYPE html>
<html>
<head>
    <title>Prescriptions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>All Prescriptions</h2>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Patient ID</th><th>Date</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if($prescriptions): foreach($prescriptions as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['patient_id'] ?></td>
            <td><?= $p['prescription_date'] ?></td>
            <td>
                <a href="<?= site_url('doctor/prescriptions/view/'.$p['id']) ?>" class="btn btn-info btn-sm">View</a>
                <a href="<?= site_url('doctor/prescriptions/edit/'.$p['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="4" class="text-center">No prescriptions found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>
