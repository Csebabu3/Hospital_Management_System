<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Pharmacy Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
body { background-color: #f8f9fa; }
.card { border-radius: 15px; }
.table td, .table th { vertical-align: middle; }
</style>
</head>
<body class="container mt-5">

<div class="d-flex justify-content-between mb-3">
  <h2>Pharmacy Management</h2>
  <a href="<?= base_url('pharmacy/create') ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Medicine</a>
</div>

<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<div class="card shadow p-3">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Manufacturer</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Expiry Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($medicines)): ?>
        <?php $i=1; foreach($medicines as $m): ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= $m['name'] ?></td>
          <td><?= $m['manufacturer'] ?></td>
          <td>
            <?= $m['quantity'] ?> 
            <?php if($m['quantity'] <= $m['low_stock_threshold']): ?>
              <span class="badge bg-danger">Low Stock</span>
            <?php endif; ?>
          </td>
          <td>$<?= number_format($m['price'],2) ?></td>
          <td><?= $m['expiry_date'] ?></td>
          <td>
            <a href="<?= base_url('pharmacy/edit/'.$m['id']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
            <a href="<?= base_url('pharmacy/delete/'.$m['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
      <tr><td colspan="7" class="text-center">No medicines found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
