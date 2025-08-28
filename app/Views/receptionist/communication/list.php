<?= $this->include('receptionist/sidebar') ?>
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Communication Log</h3>
        <a href="<?= base_url('receptionist/communication/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> New Message
        </a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Sent At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($messages as $msg): ?>
                <tr>
                    <td><?= $msg['id'] ?></td>
                    <td><?= $msg['sender_role'] ?></td>
                    <td><?= $msg['receiver_role'].' - '.$msg['receiver_name'] ?></td>
                    <td><?= $msg['subject'] ?></td>
                    <td>
                        <span class="badge <?= $msg['status']=='Unread'?'bg-warning':'bg-success' ?>">
                            <?= $msg['status'] ?>
                        </span>
                    </td>
                    <td><?= $msg['created_at'] ?></td>
                    <td>
                        <a href="<?= base_url('receptionist/communication/view/'.$msg['id']) ?>" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <a href="<?= base_url('receptionist/communication/delete/'.$msg['id']) ?>" 
                           class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?')">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
