<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>Update Appointment Status for Patient ID: <?= $patient['id'] ?></h2>
<form action="<?= site_url('doctor/appointments/update/'.$appointment['id']) ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <option value="Scheduled" <?= ($appointment['status']=='Scheduled')?'selected':'' ?>>Scheduled</option>
            <option value="Checked" <?= ($appointment['status']=='Checked')?'selected':'' ?>>Checked</option>
            <option value="Consulted" <?= ($appointment['status']=='Consulted')?'selected':'' ?>>Consulted</option>
            <option value="Reschedule Requested" <?= ($appointment['status']=='Reschedule Requested')?'selected':'' ?>>Reschedule Requested</option>
            <option value="Cancelled" <?= ($appointment['status']=='Cancelled')?'selected':'' ?>>Cancelled</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="<?= site_url('doctor/appointments/view/'.$appointment['id']) ?>" class="btn btn-secondary">Cancel</a>
</form>
</body>
</html>
