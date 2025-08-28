<?= $this->include('receptionist/sidebar') ?>

<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Appointments</h3>
        <a href="<?= base_url('receptionist/appointment/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Schedule Appointment
        </a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Phone</th>
                    <th>Doctor</th>
                    <th>Specialization</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($receptionist_appointments as $appt): ?>
                <tr>
                    <td><?= $appt['id'] ?></td>
                    <td><?= $appt['patient_name'] ?></td>
                    <td><?= $appt['patient_phone'] ?></td>
                    <td><?= $appt['doctor_name'] ?></td>
                    <td><?= $appt['specialization'] ?></td>
                    <td><?= $appt['appointment_date'] ?></td>
                    <td><?= date("h:i A", strtotime($appt['appointment_time'])) ?></td>
                    <td>
                        <span class="badge 
                        <?= $appt['status']=='Scheduled'?'bg-warning':($appt['status']=='Completed'?'bg-success':'bg-danger') ?>">
                        <?= $appt['status'] ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?= base_url('receptionist/appointment/edit/'.$appt['id']) ?>" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <a href="<?= base_url('receptionist/appointment/delete/'.$appt['id']) ?>" 
                           class="btn btn-sm btn-danger" onclick="return confirm('Cancel this appointment?')">
                            <i class="bi bi-trash"></i> Cancel
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
