<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reschedule Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Reschedule Appointment</h2>

<form method="post" action="<?= base_url('patient/appointments/update/'.$appointment['id']) ?>" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Doctor</label>
    <select name="doctor_id" class="form-select" required>
     
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label">Specialization</label>
    <input type="text" name="specialization" value="<?= $appointment['specialization'] ?>" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Appointment Date & Time</label>
    <input type="datetime-local" name="appointment_date" value="<?= date('Y-m-d\TH:i', strtotime($appointment['appointment_date'])) ?>" class="form-control" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Update Appointment</button>
    <a href="<?= base_url('appointments') ?>" class="btn btn-secondary">Cancel</a>
  </div>
</form>

</body>
</html>
