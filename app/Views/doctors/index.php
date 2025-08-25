<!doctype html>
<html>
<head>
  <title>Doctors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Doctors</h2>
  <a href="<?= base_url('doctors/create') ?>" class="btn btn-primary mb-3">Add Doctor</a>
  <table class="table table-bordered">
    <tr>
      <th>Name</th><th>Department</th><th>Email</th><th>Phone</th><th>Schedule</th><th>Actions</th>
    </tr>
    <?php foreach($doctors as $doc): ?>
      <tr>
        <td><?= $doc['name'] ?></td>
        <td><?= $doc['department'] ?></td>
        <td><?= $doc['email'] ?></td>
        <td><?= $doc['phone'] ?></td>
        <td><?= $doc['schedule'] ?></td>
        <td>
          <a href="<?= base_url('doctors/edit/'.$doc['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="<?= base_url('doctors/delete/'.$doc['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
