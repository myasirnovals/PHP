<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Kota</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Daftar Kota</h1>
        <br>

        <?php
        $table = new \CodeIgniter\View\Table();
        $template = [
            'table_open' => '<table id="myTable" class="table table-striped table-bordered">'
        ];
        $table->setTemplate($template);
        $table->setHeading('Nama', 'Negara', 'Populasi');

        foreach ($city as $r) {
            $table->addRow($r['Name'], $r['CountryCode'], $r['Population']);
        }

        echo $table->generate();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>