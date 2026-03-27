<?php
include("../conn.php");

$id = 0;
if (isset($_POST['id'])) {
	$id = (int)$_POST['id'];
}

if (!$id) {
	exit;
}

$sql = "DELETE FROM `menukaart` WHERE `ID` = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: ../../private/bewerken-verwijderen.php?deleted=1');