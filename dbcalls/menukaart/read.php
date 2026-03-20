<?php
// read.php – Haalt alle gerechten op uit de 'menukaart'-tabel.
// Vereist: $conn (PDO-object) via dbcalls/conn.php.
// Resultaat: $result – array met alle rijen uit de menukaart.

// SQL-query om alle rijen op te halen uit de menukaart-tabel
$sql = "SELECT * FROM menukaart ORDER BY Naam ASC";

// Prepared statement voorkomt SQL-injectie
$stmt = $conn->prepare($sql);

// Voer de query uit op de database
$stmt->execute();

// Haal alle rijen op als associatief array
$result = $stmt->fetchAll();