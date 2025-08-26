<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="card p-4">
        <h2 class="mb-3">Message Details</h2>
        <p><strong>Sender:</strong> <?= ucfirst($message['sender_role']) ?></p>
        <p><strong>Subject:</strong> <?= $message['subject'] ?></p>
        <p><strong>Message:</strong></p>
        <p><?= nl2br($message['message']) ?></p>
        <p><strong>Status:</strong> <span class="badge <?= $message['status']=='unread'?'bg-warning':'bg-success' ?>"><?= ucfirst($message['status']) ?></span></p>
        <p><strong>Received At:</strong> <?= date('d M Y, h:i A', strtotime($message['created_at'])) ?></p>
        <a href="<?= site_url('doctor/communications') ?>" class="btn btn-secondary mt-3">Back</a>
    </div>
</div>
</body>
</html>
