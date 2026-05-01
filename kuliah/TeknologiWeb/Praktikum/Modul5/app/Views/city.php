<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            background: #f5f7fb;
        }

        .page-shell {
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 48px 16px;
        }

        .city-card {
            width: min(1100px, 100%);
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            padding: 28px 28px 18px;
        }

        .city-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: 0.02em;
            margin: 0 0 20px;
            color: #1f2937;
        }

        table.dataTable {
            border-collapse: collapse !important;
            width: 100% !important;
        }

        table.dataTable thead th {
            background: #f1f5f9;
            color: #111827;
            font-weight: 700;
        }

        table.dataTable tbody tr:nth-child(even) {
            background: #fafafa;
        }

        table.dataTable tbody tr:hover {
            background: #eef4ff;
        }
    </style>
</head>
<body>
<div class="page-shell">
    <div class="city-card">
        <h1 class="city-title">Daftar Kota</h1>

        <div class="table-responsive">
            <table id="myTable" class="table table-striped table-bordered align-middle w-100">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Negara</th>
                    <th>District</th>
                    <th>Populasi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php $city = $city ?? []; ?>
                <?php if ($city !== []): ?>
                    <?php foreach ($city as $c): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($c['Name']) ?></td>
                            <td><?= esc($c['CountryCode']) ?></td>
                            <td><?= esc($c['District']) ?></td>
                            <td><?= esc(number_format((float) $c['Population'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(function () {
        $('#myTable').DataTable({
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            language: {
                search: 'Search:',
                lengthMenu: 'Show _MENU_ entries',
                info: 'Showing _START_ to _END_ of _TOTAL_ entries',
                infoEmpty: 'Showing 0 to 0 of 0 entries',
                zeroRecords: 'No matching records found',
                paginate: {
                    previous: 'Previous',
                    next: 'Next'
                }
            }
        });
    });
</script>
</body>
</html>