<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>Appointments</h2>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Patient ID</th>
            <th>Appointment Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if($appointments): foreach($appointments as $a): ?>
        <tr>
            <td><?= $a['id'] ?></td>
            <td><?= $a['patient_id'] ?></td>
            <td><?= $a['appointment_date'] ?></td>
            <td><?= $a['status'] ?></td>
            <td>
                <a href="<?= site_url('doctor/appointments/view/'.$a['id']) ?>" class="btn btn-info btn-sm">View</a>
                <a href="<?= site_url('doctor/appointments/edit/'.$a['id']) ?>" class="btn btn-warning btn-sm">Update Status</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="5" class="text-center">No appointments found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>
