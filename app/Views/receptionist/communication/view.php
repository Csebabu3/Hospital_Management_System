<?= $this->include('receptionist/sidebar') ?>
<div class="container mt-4">
    <h3>Message Details</h3>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <?= $message['subject'] ?>
        </div>
        <div class="card-body">
            <p><strong>From:</strong> <?= $message['sender_role'] ?></p>
            <p><strong>To:</strong> <?= $message['receiver_role'] ?> (<?= $message['receiver_name'] ?>)</p>
            <p><strong>Message:</strong></p>
            <p><?= $message['message'] ?></p>
        </div>
        <div class="card-footer">
            Sent At: <?= $message['created_at'] ?>
        </div>
    </div>
    <a href="<?= base_url('receptionist/communication/list') ?>" class="btn btn-secondary mt-3">Back</a>
</div>
