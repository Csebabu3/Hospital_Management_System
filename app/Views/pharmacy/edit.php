<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Medicine</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Edit Medicine</h2>
<form action="<?= base_url('pharmacy/update/'.$medicine['id']) ?>" method="post">
  <div class="mb-3"><label>Name</label><input type="text" class="form-control" name="name" value="<?= $medicine['name'] ?>" required></div>
  <div class="mb-3"><label>Manufacturer</label><input type="text" class="form-control" name="manufacturer" value="<?= $medicine['manufacturer'] ?>" required></div>
  <div class="mb-3"><label>Quantity</label><input type="number" class="form-control" name="quantity" value="<?= $medicine['quantity'] ?>" required></div>
  <div class="mb-3"><label>Price</label><input type="number" step="0.01" class="form-control" name="price" value="<?= $medicine['price'] ?>" required></div>
  <div class="mb-3"><label>Expiry Date</label><input type="date" class="form-control" name="expiry_date" value="<?= $medicine['expiry_date'] ?>" required></div>
  <div class="mb-3"><label>Low Stock Threshold</label><input type="number" class="form-control" name="low_stock_threshold" value="<?= $medicine['low_stock_threshold'] ?>" required></div>
  <button class="btn btn-primary">Update Medicine</button>
  <a href="<?= base_url('pharmacy') ?>" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
