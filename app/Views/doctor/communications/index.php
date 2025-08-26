<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Communications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .table-responsive { overflow-x:auto; }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Communications</h2>
        <a href="<?= site_url('doctor/communications/send') ?>" class="btn btn-primary">Send Message</a>
    </div>

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Sender</th>
                        <th>Subject</th>
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
                        <td>
                            <span class="badge <?= $msg['status']=='unread'?'bg-warning':'bg-success' ?>">
                                <?= ucfirst($msg['status']) ?>
                            </span>
                        </td>
                        <td><?= date('d M Y, h:i A', strtotime($msg['created_at'])) ?></td>
                        <td>
                            <a href="<?= site_url('doctor/communications/view/'.$msg['id']) ?>" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No messages found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
