<?= $this->include('receptionist/sidebar') ?>

<div class="container mt-4">
    <h3><?= isset($appointment) ? 'Edit' : 'Schedule' ?> Appointment</h3>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= isset($appointment) ? base_url('receptionist/appointment/update/'.$appointment['id']) : base_url('receptionist/appointment/store') ?>" method="post">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Patient Name</label>
                <input type="text" name="patient_name" class="form-control" value="<?= $appointment['patient_name'] ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label>Patient Phone</label>
                <input type="text" name="patient_phone" class="form-control" value="<?= $appointment['patient_phone'] ?? '' ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Doctor</label>
                <select name="doctor_id" class="form-select" required>
                    <option value="">-- Select Doctor --</option>
                    <?php foreach($doctors as $doc): ?>
                        <option value="<?= $doc['id'] ?>" <?= isset($appointment) && $appointment['doctor_id']==$doc['id'] ? 'selected' : '' ?>>
                            <?= $doc['name'].' ('.$doc['specialization'].')' ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label>Date</label>
                <input type="date" name="appointment_date" class="form-control" value="<?= $appointment['appointment_date'] ?? '' ?>" required>
            </div>
            <div class="col-md-3">
                <label>Time</label>
                <input type="time" name="appointment_time" class="form-control" value="<?= $appointment['appointment_time'] ?? '' ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="Scheduled" <?= isset($appointment) && $appointment['status']=='Scheduled' ? 'selected' : '' ?>>Scheduled</option>
                <option value="Completed" <?= isset($appointment) && $appointment['status']=='Completed' ? 'selected' : '' ?>>Completed</option>
                <option value="Cancelled" <?= isset($appointment) && $appointment['status']=='Cancelled' ? 'selected' : '' ?>>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success"><?= isset($appointment) ? 'Update' : 'Schedule' ?></button>
        <a href="<?= base_url('receptionist/appointment/list') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
