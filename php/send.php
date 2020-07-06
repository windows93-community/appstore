<?php

include "mysql.php";

if($_POST["user"] != '' && isset($_POST["user"]) && is_numeric($_POST['id'])) {

	$section = $conn->query('SELECT id FROM apps WHERE id = ' . $_POST['id']);
	if($section && $section->num_rows != 0) {

		$stmt = $conn->prepare("INSERT INTO comments (csid, name, date, content, ip) VALUES (?, ?, NOW(), ?, ?)");
		$stmt->bind_param("isss", $_POST["id"], $_POST["user"], $_POST["content"], $_SERVER['REMOTE_ADDR']);
		$stmt->execute();
		$stmt->close();
	}
}

header("Location: ./view.php?id=" . $_POST["id"]);

?>
