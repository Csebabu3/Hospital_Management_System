<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assigned Patients</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body {
          background-color: #f8f9fa;
      }
      .card {
          border-radius: 15px;
          box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }
      .table th {
          background-color: #0d6efd;
          color: #fff;
      }
      .table td {
          vertical-align: middle;
      }
  </style>
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">👩‍⚕️ Assigned Patients</h2>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($patients)): ?>
                    <?php foreach($patients as $p): ?>
                        <tr>
                            <td><?= esc($p['id']) ?></td>
                            <td><?= esc($p['name']) ?></td>
                            <td><?= esc($p['age']) ?></td>
                            <td><?= esc($p['gender']) ?></td>
                            <td>
                                <?php if($p['status'] === 'Admitted'): ?>
                                    <span class="badge bg-success">Admitted</span>
                                <?php elseif($p['status'] === 'Discharged'): ?>
                                    <span class="badge bg-secondary">Discharged</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark"><?= esc($p['status']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('doctor/patients/view/'.$p['id']) ?>" class="btn btn-sm btn-info">View</a>
                                <a href="<?= site_url('doctor/patients/edit/'.$p['id']) ?>" class="btn btn-sm btn-warning">Update Notes</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">No patients assigned yet.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
