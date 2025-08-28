<?= $this->include('receptionist/sidebar') ?>

<div class="container mt-4">
    <h3><?= isset($bill) ? 'Edit' : 'Generate' ?> Bill</h3>

    <form action="<?= isset($bill) ? base_url('receptionist/billing/update/'.$bill['id']) : base_url('receptionist/billing/store') ?>" method="post">
        
        <div class="mb-3">
            <label>Patient Name</label>
            <input type="text" name="patient_name" class="form-control" value="<?= $bill['patient_name'] ?? '' ?>" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Consultation Fee</label>
                <input type="number" step="0.01" name="consultation_fee" class="form-control" value="<?= $bill['consultation_fee'] ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label>Test Charges</label>
                <input type="number" step="0.01" name="test_charges" class="form-control" value="<?= $bill['test_charges'] ?? '' ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Payment Method</label>
            <select name="payment_method" class="form-select" required>
                <option value="Cash" <?= isset($bill) && $bill['payment_method']=='Cash' ? 'selected':'' ?>>Cash</option>
                <option value="Card" <?= isset($bill) && $bill['payment_method']=='Card' ? 'selected':'' ?>>Card</option>
                <option value="Insurance" <?= isset($bill) && $bill['payment_method']=='Insurance' ? 'selected':'' ?>>Insurance</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Insurance Info (if any)</label>
            <textarea name="insurance_info" class="form-control"><?= $bill['insurance_info'] ?? '' ?></textarea>
        </div>

        <?php if(isset($bill)): ?>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="Unpaid" <?= $bill['status']=='Unpaid'?'selected':'' ?>>Unpaid</option>
                <option value="Paid" <?= $bill['status']=='Paid'?'selected':'' ?>>Paid</option>
                <option value="Forwarded" <?= $bill['status']=='Forwarded'?'selected':'' ?>>Forwarded</option>
            </select>
        </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-success"><?= isset($bill) ? 'Update Bill' : 'Generate Bill' ?></button>
        <a href="<?= base_url('receptionist/billing/list') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
