<?= $this->include('receptionist/sidebar') ?>

<div class="container mt-4">
    <h3><?= isset($patient) ? 'Edit' : 'Register' ?> Patient</h3>
    <form action="<?= isset($patient) ? base_url('receptionist/patient/update/'.$patient['id']) : base_url('receptionist/patient/store') ?>" method="post">

        <div class="row mb-3">
            <div class="col-md-6">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="<?= $patient['first_name'] ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="<?= $patient['last_name'] ?? '' ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $patient['email'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="<?= $patient['phone'] ?? '' ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"><?= $patient['address'] ?? '' ?></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Emergency Contact</label>
                <input type="text" name="emergency_contact" class="form-control" value="<?= $patient['emergency_contact'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label>Insurance</label>
                <input type="text" name="insurance" class="form-control" value="<?= $patient['insurance'] ?? '' ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Doctor ID</label>
                <input type="number" name="doctor_id" class="form-control" value="<?= $patient['doctor_id'] ?? '' ?>">
            </div>
            <div class="col-md-4">
                <label>Department</label>
                <input type="text" name="department" class="form-control" value="<?= $patient['department'] ?? '' ?>">
            </div>
            <div class="col-md-4">
                <label>Ward</label>
                <input type="text" name="ward" class="form-control" value="<?= $patient['ward'] ?? '' ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Admit Date</label>
                <input type="date" name="admit_date" class="form-control" value="<?= $patient['admit_date'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label>Discharge Date</label>
                <input type="date" name="discharge_date" class="form-control" value="<?= $patient['discharge_date'] ?? '' ?>">
            </div>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="Pending" <?= isset($patient) && $patient['status']=='Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="Admitted" <?= isset($patient) && $patient['status']=='Admitted' ? 'selected' : '' ?>>Admitted</option>
                <option value="Discharged" <?= isset($patient) && $patient['status']=='Discharged' ? 'selected' : '' ?>>Discharged</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success"><?= isset($patient) ? 'Update' : 'Register' ?></button>
        <a href="<?= base_url('receptionist/patient/list') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
