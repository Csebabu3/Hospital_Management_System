<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Medicine</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Add New Medicine</h2>
<form action="<?= base_url('pharmacy/store') ?>" method="post">
  <div class="mb-3"><label>Name</label><input type="text" class="form-control" name="name" required></div>
  <div class="mb-3"><label>Manufacturer</label><input type="text" class="form-control" name="manufacturer" required></div>
  <div class="mb-3"><label>Quantity</label><input type="number" class="form-control" name="quantity" required></div>
  <div class="mb-3"><label>Price</label><input type="number" step="0.01" class="form-control" name="price" required></div>
  <div class="mb-3"><label>Expiry Date</label><input type="date" class="form-control" name="expiry_date" required></div>
  <div class="mb-3"><label>Low Stock Threshold</label><input type="number" class="form-control" name="low_stock_threshold" value="10" required></div>
  <button class="btn btn-primary">Add Medicine</button>
  <a href="<?= base_url('pharmacy') ?>" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
