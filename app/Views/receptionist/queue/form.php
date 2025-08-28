<?= $this->include('receptionist/sidebar') ?>
<div class="container mt-4">
    <h3>Add Patient to Queue</h3>
    <form action="<?= base_url('receptionist/queue/store') ?>" method="post">
        <div class="mb-3">
            <label>Patient Name</label>
            <input type="text" name="patient_name" class="form-control" required>
        </div>
       <div class="mb-3">
    <label>Assign Doctor</label>
    <select name="doctor_id" class="form-select" required>
        <option value="">-- Select Doctor --</option>
        <?php foreach($receptionist_doctors as $doc): ?>
            <option value="<?= $doc['id'] ?>">
                <?= $doc['name'] ?><?= isset($doc['specialization']) ? ' (' . $doc['specialization'] . ')' : '' ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

        <button type="submit" class="btn btn-success">Add to Queue</button>
        <a href="<?= base_url('receptionist/queue/list') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
