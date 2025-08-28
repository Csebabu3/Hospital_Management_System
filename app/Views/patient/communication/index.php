<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patient Communications</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Messages & Notifications</h2>
    <a href="<?= site_url('patient/communication/send') ?>" class="btn btn-primary">Send Message</a>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Received At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($messages): foreach($messages as $msg): ?>
                <tr>
                    <td><?= $msg['id'] ?></td>
                    <td><?= ucfirst($msg['sender_role']) ?></td>
                    <td><?= $msg['subject'] ?></td>
                    <td><?= ucfirst($msg['type']) ?></td>
                    <td>
                        <span class="badge <?= $msg['status']=='unread'?'bg-warning':'bg-success' ?>">
                            <?= ucfirst($msg['status']) ?>
                        </span>
                    </td>
                    <td><?= date('d M Y, h:i A', strtotime($msg['created_at'])) ?></td>
                    <td>
                        <a href="<?= site_url('patient/communication/view/'.$msg['id']) ?>" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="7" class="text-center">No messages or notifications found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
