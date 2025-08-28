<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Payment History</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Payment History</h2>

<div class="table-responsive mt-3">
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Invoice ID</th>
            <th>Method</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    <?php if(!empty($payments)): ?>
        <?php foreach($payments as $p): ?>
        <tr>
            <td>#<?= $p['billing_id'] ?></td>
            <td><?= esc($p['method']) ?></td>
            <td>₹<?= number_format($p['amount'], 2) ?></td>
            <td><?= date('d M Y H:i', strtotime($p['paid_at'])) ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="4" class="text-center">No payments found</td></tr>
    <?php endif; ?>
    </tbody>
</table>
</div>

<a href="<?= base_url('patient/billing') ?>" class="btn btn-secondary mt-3">Back to Invoices</a>

</body>
</html>
