<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Add Patient</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Add Patient</h2>
    <form action="/patients/store" method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select class="form-select" name="gender">
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label>DOB</label>
            <input type="date" class="form-control" name="dob">
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea class="form-control" name="address"></textarea>
        </div>
        <button class="btn btn-primary">Save</button>
        <a href="/patients" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
