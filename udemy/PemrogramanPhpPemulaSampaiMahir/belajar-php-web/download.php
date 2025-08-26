<?php

if (isset($_GET['key']) && $_GET['key'] == 'rahasia') {
	header('Content-Disposition: attachment; filename="imagesdietfred.jpg"');
	header('Content-Type: image/jpg');
	readfile(__DIR__ . '/assets/images/imagesdietfred.jpg');
	exit();
} else {
	echo "Invalid Key";
}

?>