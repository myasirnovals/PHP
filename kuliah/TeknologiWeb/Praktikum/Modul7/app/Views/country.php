<!DOCTYPE html>
<html>

<head>
    <title>Daftar Negara</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>
    <h1>Daftar Negara</h1>
    <table id="myTable" class="table table-striped table-bordered">
        <tr>
            <th>Code</th>
            <th>Name</th>
        </tr>
        <?php foreach ($country as $row): ?>
            <tr>
                <td><?= $row['Code'] ?></td>
                <td><?= $row['Name'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>