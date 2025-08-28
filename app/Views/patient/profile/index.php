<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .profile-card {
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
    <div class="col-lg-8 col-md-10">
      <div class="profile-card">
        <h2 class="mb-4 text-center">My Profile</h2>

        <?php if(session()->getFlashdata('success')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('patient/profile/update') ?>" method="post" enctype="multipart/form-data" class="row g-3">
          
          <!-- Name & Email (readonly) -->
          <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" value="<?= esc($profile['name'] ?? '') ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?= esc($profile['email'] ?? '') ?>">
          </div>

          <!-- Editable Fields -->
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= esc($profile['phone'] ?? '') ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="<?= esc($profile['address'] ?? '') ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Emergency Contact</label>
            <input type="text" name="emergency_contact" class="form-control" value="<?= esc($profile['emergency_contact'] ?? '') ?>">
          </div>

          <!-- File Upload -->
          <div class="col-md-6">
            <label class="form-label">Insurance Document</label>
            <input type="file" name="insurance_doc" class="form-control">
            <?php if(!empty($profile['insurance_doc'])): ?>
              <p class="mt-2 small">
                Current: <a href="<?= base_url('uploads/insurance/'.$profile['insurance_doc']) ?>" target="_blank">View Document</a>
              </p>
            <?php endif; ?>
          </div>

          <!-- Buttons -->
          <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary me-2">Update Profile</button>
            <a href="<?= base_url('profile/password') ?>" class="btn btn-warning">Change Password</a>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
