<?= $this->include('receptionist/sidebar') ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Patient Queue</h3>
        <a href="<?= base_url('receptionist/queue/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Patient
        </a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Status</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($queue)): ?>
                    <?php foreach($queue as $q): ?>
                        <tr>
                            <td><?= $q['id'] ?></td>
                            <td><?= $q['patient_name'] ?></td>
                            <td><?= $q['doctor_name'] ?> (<?= $q['specialization'] ?>)</td>
                            <td>
                                <span class="badge 
                                    <?= $q['status']=='Waiting'?'bg-warning':
                                        ($q['status']=='CheckedIn'?'bg-success':'bg-secondary') ?>">
                                    <?= $q['status'] ?>
                                </span>
                            </td>
                            <td><?= $q['checkin_time'] ?? '-' ?></td>
                            <td><?= $q['checkout_time'] ?? '-' ?></td>
                            <td>
                                <?php if($q['status']=='Waiting'): ?>
                                    <a href="<?= base_url('receptionist/queue/checkin/'.$q['id']) ?>" class="btn btn-sm btn-primary">Check-In</a>
                                <?php elseif($q['status']=='CheckedIn'): ?>
                                    <a href="<?= base_url('receptionist/queue/checkout/'.$q['id']) ?>" class="btn btn-sm btn-success">Check-Out</a>
                                <?php endif; ?>
                                <a href="<?= base_url('receptionist/queue/delete/'.$q['id']) ?>" 
                                   onclick="return confirm('Remove from queue?')" 
                                   class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No patients in queue.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
