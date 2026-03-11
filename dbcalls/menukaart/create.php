<?php
include("../conn.php");

$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];

// variabel met een SQL querry
$sql = "INSERT INTO `personeel`(`voornaam`, `achternaam`) VALUES (:voornaam, :achternaam)";

// preparestatement
$stmt = $conn->prepare($sql);

// binden van variabel
$stmt->bindParam( ":voornaam", $voornaam );
$stmt->bindParam(':achternaam', $achternaam);

// execute on db
$stmt->execute();
