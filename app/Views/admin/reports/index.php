<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Generate Reports</h2>
<form action="<?= site_url('admin/reports/generate') ?>" method="post" class="row g-3">
    <div class="col-md-4">
        <label>Report Type</label>
        <select name="report_type" class="form-select" required>
            <option value="">Select Report</option>
            <option value="daily_patients">Daily Patient Inflow</option>
            <option value="doctor_consultation">Doctor Consultation</option>
            <option value="pharmacy_sales">Pharmacy Sales</option>
            <option value="finance">Finance & Revenue</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>From Date</label>
        <input type="date" name="from_date" class="form-control" required>
    </div>
    <div class="col-md-3">
        <label>To Date</label>
        <input type="date" name="to_date" class="form-control" required>
    </div>
    <div class="col-md-2 align-self-end">
        <button type="submit" class="btn btn-primary w-100">Generate</button>
    </div>
</form>
</body>
</html>
