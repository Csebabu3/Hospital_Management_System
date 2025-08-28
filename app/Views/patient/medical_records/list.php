<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Medical Records</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>My Medical Records</h2>

<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="table-responsive mt-3">
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Patient Id</th>
            <th>medications</th>
            <th>Diagnosis</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($records as $r): ?>
        <tr>
            <td><?= $r['patient_id'] ?></td>
            <td><?= $r['medications'] ?></td>
            <td><?= $r['diagnosis'] ?></td>
            <td><?= date('d M Y', strtotime($r['record_date'])) ?></td>
            <td>
                <a href="<?= base_url('patient/medical-records/view/'.$r['id']) ?>" class="btn btn-sm btn-primary">View</a>
                <a href="<?= base_url('patient/medical-records/edit/'.$r['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <?php if($r['lab_report']): ?>
                <a href="<?= base_url('patient/medical-records/download/'.$r['id']) ?>" class="btn btn-sm btn-success">Download PDF</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

</body>
</html>
