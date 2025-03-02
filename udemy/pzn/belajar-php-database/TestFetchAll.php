<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = "SELECT * FROM admin";
$statement = $connection->query($sql);

$admin = $statement->fetchAll();
var_dump($admin);

$connection = null;
