<?= $this->include('receptionist/sidebar') ?>
<div class="container mt-4">
    <h3>Send Communication</h3>

    <form action="<?= base_url('receptionist/communication/store') ?>" method="post">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Sender Role</label>
                <select name="sender_role" class="form-select" required>
                    <option value="Receptionist">Receptionist</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Receiver Role</label>
                <select name="receiver_role" class="form-select" required>
                    <option value="Patient">Patient</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Nurse">Nurse</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label>Receiver Name</label>
            <input type="text" name="receiver_name" class="form-control" placeholder="Optional">
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Send</button>
        <a href="<?= base_url('receptionist/communication/list') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
