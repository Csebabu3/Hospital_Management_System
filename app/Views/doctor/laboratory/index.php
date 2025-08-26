<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab Tests</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

  <h2 class="mb-4">Lab Tests</h2>
  <a href="<?= site_url('doctor/lab-tests/request') ?>" class="btn btn-primary mb-3">Request New Test</a>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Patient ID</th>
          <th>Test Name</th>
          <th>Status</th>
          <th>Request Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if($lab_tests): foreach($lab_tests as $lt): ?>
        <tr>
          <td><?= $lt['id'] ?></td>
          <td><?= $lt['patient_id'] ?></td>
          <td><?= $lt['test_name'] ?></td>
          <td>
            <?php
              $badge = 'secondary';
              if($lt['status']=='Requested') $badge='warning';
              elseif($lt['status']=='Completed') $badge='success';
              elseif($lt['status']=='Reviewed') $badge='info';
            ?>
            <span class="badge bg-<?= $badge ?>"><?= $lt['status'] ?></span>
          </td>
          <td><?= date('d-m-Y H:i', strtotime($lt['request_date'])) ?></td>
          <td>
            <a href="<?= site_url('doctor/lab-tests/view/'.$lt['id']) ?>" class="btn btn-info btn-sm">View</a>
            <a href="<?= site_url('doctor/lab-tests/edit/'.$lt['id']) ?>" class="btn btn-warning btn-sm">Update</a>
          </td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="6" class="text-center">No lab tests found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
