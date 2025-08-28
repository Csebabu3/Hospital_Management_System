<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .password-card {
      background: #fff;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .form-label {
      font-weight: 500;
    }
    .btn {
      min-width: 120px;
    }
  </style>
</head>
<body class="container py-4">

  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="password-card">
        <h2 class="mb-4 text-center">Change Password</h2>

        <!-- Flash Messages -->
        <?php if(session()->getFlashdata('error')): ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('success')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('patient/profile/change-password') ?>" method="post" class="row g-3">
          <div class="col-12">
            <label class="form-label">Old Password</label>
            <input type="password" name="old_password" class="form-control" placeholder="Enter your old password" required>
          </div>
          <div class="col-12">
            <label class="form-label">New Password</label>
            <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
          </div>
          <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-success me-2">Update Password</button>
            <a href="<?= base_url('patient/profile') ?>" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
