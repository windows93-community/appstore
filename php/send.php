<?php

include "mysql.php";

if($_POST["user"] != '' && isset($_POST["user"])) {

$stmt = $conn->prepare("INSERT INTO comments (csid, name, date, content) VALUES (?, ?, NOW(), ?)");
$stmt->bind_param("iss", $_POST["id"], $_POST["user"], $_POST["content"]);
$stmt->execute();
$stmt->close();

}

header("Location: ./view.php?id=" . $_POST["id"]);

?>
