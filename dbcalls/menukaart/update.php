<?php

include("../conn.php");

if (!isset($_POST['naam'], $_POST['categorie'], $_POST['beschrijving'], $_POST['allergenen'], $_POST['afbeelding'], $_POST['prijs'], $_POST['ID'])) {
	exit;
}

$naam = $_POST['naam'];
$categorie = $_POST['categorie'];
$beschrijving = $_POST['beschrijving'];
$allergenen = $_POST['allergenen'];
$afbeelding = '/assets/img/' . $_POST['afbeelding'];
$prijs = $_POST['prijs'];
$ID = (int)$_POST['ID'];

// variabel met een SQL querry
$sql = "UPDATE `menukaart` SET `Naam` = :naam, `categorie` = :categorie, `Beschrijving` = :beschrijving, `Allergenen` = :allergenen, `Afbeelding` = :afbeelding, `Prijs` = :prijs WHERE ID = :ID";


// Prepared statement voorkomt SQL-injectie
$stmt = $conn->prepare($sql);

// binden van variabel
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':categorie', $categorie);
$stmt->bindParam(':beschrijving', $beschrijving);
$stmt->bindParam(':allergenen', $allergenen);
$stmt->bindParam(':afbeelding', $afbeelding);
$stmt->bindParam(':prijs', $prijs);
$stmt->bindParam(':ID', $ID);

// Voer de query uit op de database
$stmt->execute();
header ("location: ../../private/bewerken-verwijderen.php");
exit;