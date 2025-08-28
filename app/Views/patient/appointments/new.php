<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Book New Appointment</h2>

<form method="post" action="<?= base_url('patient/appointments/store') ?>" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Doctor</label>
    <select name="doctor_id" class="form-select" required>
      <option value="">Select Doctor</option>
     
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label">Specialization</label>
    <input type="text" name="specialization" class="form-control" placeholder="Specialization" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Appointment Date & Time</label>
    <input type="datetime-local" name="appointment_date" class="form-control" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-success">Book Appointment</button>
    <a href="<?= base_url('appointments') ?>" class="btn btn-secondary">Cancel</a>
  </div>
</form>

</body>
</html>
