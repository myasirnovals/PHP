<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$file_name = $_FILES['upload_file']['name'];
	$file_type = $_FILES['upload_file']['type'];
	$file_size = $_FILES['upload_file']['size'];
	$file_tmp_name = $_FILES['upload_file']['tmp_name'];
	$file_error = $_FILES['upload_file']['error'];

	move_uploaded_file($file_tmp_name, __DIR__ . '/assets/images/' . $file_name);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Belajar Upload</title>
</head>
<body>
	<?php if ($_SERVER['REQUEST_METHOD'] == "POST") { ?>
		<h1>Upload File</h1>
		<table>
			<tr>
				<td>File name</td>
				<td><?= $file_name; ?></td>
			</tr>
			<tr>
				<td>File type</td>
				<td><?= $file_type; ?></td>
			</tr>
			<tr>
				<td>File size</td>
				<td><?= $file_size; ?></td>
			</tr>
			<tr>
				<td>File tmp_name</td>
				<td><?= $file_tmp_name; ?></td>
			</tr>
			<tr>
				<td>File error</td>
				<td><?= $file_error; ?></td>
			</tr>
		</table>
	<?PHP } ?>
	<h1>Form Upload</h1>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<label>File : </label>
		<input type="file" name="upload_file">
		<input type="submit" name="submit" value="Upload">
	</form>
</body>
</html>