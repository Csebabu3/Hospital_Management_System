<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="card p-4">
        <h2 class="mb-4">Send Message</h2>
        <form action="<?= site_url('doctor/communications/send') ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Recipient Role</label>
                <select name="receiver_role" class="form-select" required>
                    <option value="">Select Role</option>
                    <option value="patient">Patient</option>
                    <option value="nurse">Nurse</option>
                    <option value="staff">Staff</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Recipient ID</label>
                <input type="number" name="receiver_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="5" required></textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Send</button>
                <a href="<?= site_url('doctor/communications') ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
