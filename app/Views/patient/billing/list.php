<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Invoices</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>My Invoices</h2>

<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="table-responsive mt-3">
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Description</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($invoices)): ?>
        <?php foreach($invoices as $inv): ?>
        <tr>
            <td><?= esc($inv['description']) ?></td>
            <td>₹<?= number_format($inv['amount'], 2) ?></td>
            <td><span class="badge <?= $inv['status']=='Paid'?'bg-success':'bg-danger' ?>"><?= $inv['status'] ?></span></td>
            <td><?= date('d M Y', strtotime($inv['created_at'])) ?></td>
            <td>
                <?php if($inv['status']=='Unpaid'): ?>
                <a href="<?= base_url('patient/billing/pay/'.$inv['id']) ?>" class="btn btn-sm btn-primary">Pay Now</a>
                <?php else: ?>
                <span class="text-muted">Paid</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5" class="text-center">No invoices found</td></tr>
    <?php endif; ?>
    </tbody>
</table>
</div>

<a href="<?= base_url('patient/billing/history') ?>" class="btn btn-secondary mt-3">View Payment History</a>

</body>
</html>
