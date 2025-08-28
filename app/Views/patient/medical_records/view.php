<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Medical Record</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Medical Record Details</h2>

<div class="card mt-3">
    <div class="card-body">
        <p><strong>Patient Id:</strong> <?= $record['patient_id'] ?></p>
        <p><strong>Diagnosis:</strong> <?= $record['diagnosis'] ?></p>
        <p><strong>Prescription:</strong> <?= nl2br($record['prescription']) ?></p>
        <p><strong>Medications:</strong> <?= nl2br($record['medications']) ?></p>
        <p><strong>Date:</strong> <?= date('d M Y', strtotime($record['record_date'])) ?></p>
        <?php if($record['lab_report']): ?>
        <p><strong>Lab Report:</strong> 
            <a href="<?= base_url('patient/medical-records/download/'.$record['id']) ?>" class="btn btn-sm btn-success">Download PDF</a>
        </p>
        <?php endif; ?>
    </div>
</div>

<a href="<?= base_url('patient/medical-records') ?>" class="btn btn-secondary mt-3">Back to Records</a>

</body>
</html>
