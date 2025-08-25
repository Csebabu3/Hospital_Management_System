<!DOCTYPE html>
<html>
<head>
    <title>Report View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h2>Report: <?= ucfirst(str_replace('_',' ',$type)) ?></h2>
<p>From: <?= $from ?> To: <?= $to ?></p>
<a href="<?= site_url('admin/reports/export/excel/'.$type.'/'.$from.'/'.$to) ?>" class="btn btn-success mb-3">Export Excel</a>
<a href="<?= site_url('admin/reports/export/pdf/'.$type.'/'.$from.'/'.$to) ?>" class="btn btn-danger mb-3">Export PDF</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <?php if(!empty($report)): ?>
                <?php foreach(array_keys((array)$report[0]) as $col): ?>
                    <th><?= ucfirst(str_replace('_',' ',$col)) ?></th>
                <?php endforeach; ?>
            <?php else: ?>
                <th>No data</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($report)): ?>
            <?php foreach($report as $row): ?>
                <tr>
                    <?php foreach((array)$row as $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="10" class="text-center">No data found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<a href="<?= site_url('admin/reports') ?>" class="btn btn-secondary">Back</a>
</body>
</html>
