<?= $this->include('receptionist/sidebar') ?>

<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Patient List</h3>
        <a href="<?= base_url('receptionist/patient/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add New Patient
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Doctor</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($patients as $patient): ?>
                <tr>
                    <td><?= $patient['id'] ?></td>
                    <td><?= $patient['first_name'].' '.$patient['last_name'] ?></td>
                    <td><?= $patient['phone'] ?></td>
                    <td><?= $patient['doctor_id'] ?></td>
                    <td><?= $patient['department'] ?></td>
                    <td>
                        <span class="badge 
                        <?= $patient['status']=='Admitted'?'bg-success':($patient['status']=='Discharged'?'bg-secondary':'bg-warning') ?>">
                        <?= $patient['status'] ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?= base_url('receptionist/patient/edit/'.$patient['id']) ?>" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <a href="<?= base_url('receptionist/patient/delete/'.$patient['id']) ?>" 
                           class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
