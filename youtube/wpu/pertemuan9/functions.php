<?php

// koneksi ke database mysql
$conn = mysqli_connect("localhost:3307", "root", "root", "phpdasar");

// function query
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
