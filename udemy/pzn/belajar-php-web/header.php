<?php

header('Application: Belajar PHP Web');
header('Author: Muhamad Yasir Noval');

$client = $_SERVER['HTTP_CLIENT_NAME'];

echo "Hello $client";