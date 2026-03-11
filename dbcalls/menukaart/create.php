<?php
// create.php – Voegt een nieuw gerecht toe aan de 'menukaart'-tabel.
// Vereist: $conn (PDO-object) via dbcalls/conn.php.
// Verwacht POST-parameters: naam, beschrijving, prijs, allergenen, afbeelding.

$naam         = trim($_POST['naam'] ?? '');
$beschrijving = trim($_POST['beschrijving'] ?? '');
$prijs        = $_POST['prijs'] ?? '';
$allergenen   = trim($_POST['allergenen'] ?? '');
$afbeelding   = trim($_POST['afbeelding'] ?? '');

$createError   = null;
$createSuccess = false;

if ($naam === '' || $beschrijving === '' || $prijs === '') {
    $createError = 'Vul alle verplichte velden in (naam, beschrijving en prijs).';
} elseif (!is_numeric($prijs) || (float)$prijs < 0) {
    $createError = 'Voer een geldige prijs in.';
} else {
    $sql  = "INSERT INTO menukaart (Naam, Beschrijving, Prijs, Allergenen, Afbeelding)
             VALUES (:naam, :beschrijving, :prijs, :allergenen, :afbeelding)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':naam'         => $naam,
        ':beschrijving' => $beschrijving,
        ':prijs'        => (float)$prijs,
        ':allergenen'   => $allergenen !== '' ? $allergenen : null,
        ':afbeelding'   => $afbeelding !== '' ? $afbeelding : null,
    ]);
    $createSuccess = $stmt->rowCount() > 0;
}
