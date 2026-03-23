<?php
include("../conn.php");

$naam = $_POST['naam'];
$categorie = $_POST['categorie'];
$beschrijving = $_POST['beschrijving'];
$allergenen = $_POST['allergenen'];
$afbeelding = '/assets/img/' . $_POST['afbeelding'];
$prijs = $_POST['prijs'];

// variabel met een SQL querry
$sql = "INSERT INTO `menukaart`(`Naam`, `categorie`, `Beschrijving`, `Allergenen`, `Afbeelding`, `Prijs`) VALUES (:naam, :categorie, :beschrijving, :allergenen, :afbeelding, :prijs)";

// preparestatement
$stmt = $conn->prepare($sql);

// binden van variabel
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':categorie', $categorie);
$stmt->bindParam(':beschrijving', $beschrijving);
$stmt->bindParam(':allergenen', $allergenen);
$stmt->bindParam(':afbeelding', $afbeelding);
$stmt->bindParam(':prijs', $prijs);

// execute on db
$stmt->execute();
header('Location: ../../private/bewerken-verwijderen.php');