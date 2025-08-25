<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Patient Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Patient Management</h2>
    <a href="/patients/create" class="btn btn-primary mb-3">Add Patient</a>
    
    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
                <th>DOB</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($patients as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['name'] ?></td>
                <td><?= $p['email'] ?></td>
                <td><?= $p['phone'] ?></td>
                <td><?= $p['dob'] ?></td>
                <!-- <td>
                  <span class="badge bg-<?= $p['status']=='Approved'?'success':($p['status']=='Rejected'?'danger':'warning') ?>">
                      <?= $p['status'] ?>
                  </span>
                </td> -->
                <td>
                    <a href="/patients/edit/<?= $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/patients/delete/<?= $p['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                    <?php if($p['status']=='Pending'): ?>
                        <a href="/patients/approve/<?= $p['id'] ?>" class="btn btn-sm btn-success">Approve</a>
                        <a href="/patients/reject/<?= $p['id'] ?>" class="btn btn-sm btn-secondary">Reject</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
