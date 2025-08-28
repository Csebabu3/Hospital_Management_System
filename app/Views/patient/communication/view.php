<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Message</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<div class="card p-4">
    <h2 class="mb-3">Message Details</h2>
    <p><strong>Sender:</strong> <?= ucfirst($message['sender_role']) ?></p>
    <p><strong>Subject:</strong> <?= $message['subject'] ?></p>
    <p><strong>Message:</strong></p>
    <p><?= nl2br($message['message']) ?></p>
    <p><strong>Type:</strong> <?= ucfirst($message['type']) ?></p>
    <p><strong>Status:</strong> 
        <span class="badge <?= $message['status']=='unread'?'bg-warning':'bg-success' ?>">
            <?= ucfirst($message['status']) ?>
        </span>
    </p>
    <p><strong>Received At:</strong> <?= date('d M Y, h:i A', strtotime($message['created_at'])) ?></p>

    <a href="<?= site_url('patient/communication') ?>" class="btn btn-secondary mt-3">Back</a>
</div>
</body>
</html>
