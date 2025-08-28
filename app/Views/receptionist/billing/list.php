<?= $this->include('receptionist/sidebar') ?>

<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Billing Records</h3>
        <a href="<?= base_url('receptionist/billing/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> New Bill
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
                    <th>Consultation</th>
                    <th>Tests</th>
                    <th>Total</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bills as $bill): ?>
                <tr>
                    <td><?= $bill['id'] ?></td>
                    <td><?= $bill['patient_name'] ?></td>
                    <td>₹<?= $bill['consultation_fee'] ?></td>
                    <td>₹<?= $bill['test_charges'] ?></td>
                    <td><strong>₹<?= $bill['total_amount'] ?></strong></td>
                    <td><?= $bill['payment_method'] ?></td>
                    <td>
                        <span class="badge 
                        <?= $bill['status']=='Paid'?'bg-success':($bill['status']=='Forwarded'?'bg-info':'bg-warning') ?>">
                        <?= $bill['status'] ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?= base_url('receptionist/billing/edit/'.$bill['id']) ?>" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <a href="<?= base_url('receptionist/billing/delete/'.$bill['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this bill?')">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                        <?php if($bill['status']!='Forwarded'): ?>
                        <a href="<?= base_url('receptionist/billing/forward/'.$bill['id']) ?>" class="btn btn-sm btn-primary" onclick="return confirm('Forward this bill to Finance?')">
                            <i class="bi bi-send"></i> Forward
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
