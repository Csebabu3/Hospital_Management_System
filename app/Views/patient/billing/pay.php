<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pay Invoice</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Pay Invoice #<?= $invoice['id'] ?></h2>

<div class="card mt-3">
  <div class="card-body">
    <p><strong>Description:</strong> <?= esc($invoice['description']) ?></p>
    <p><strong>Amount:</strong> ₹<?= number_format($invoice['amount'], 2) ?></p>

    <form method="post" action="<?= base_url('patient/billing/process/'.$invoice['id']) ?>">
      <div class="mb-3">
        <label class="form-label">Select Payment Method</label>
        <select name="method" class="form-select" required>
          <option value="Card">Card</option>
          <option value="UPI">UPI</option>
          <option value="Wallet">Wallet</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Pay Now</button>
      <a href="<?= base_url('patient/billing') ?>" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>

</body>
</html>
