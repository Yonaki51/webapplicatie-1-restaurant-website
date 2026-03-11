<?php
// update.php – Werkt een bestaand gerecht bij in de 'menukaart'-tabel.
// Vereist: $conn (PDO-object) via dbcalls/conn.php.
// Verwacht POST-parameters: id, naam, beschrijving, prijs, allergenen, afbeelding.

$updateId          = (int)($_POST['id'] ?? 0);
$updateNaam        = trim($_POST['naam'] ?? '');
$updateBeschrijving = trim($_POST['beschrijving'] ?? '');
$updatePrijs       = $_POST['prijs'] ?? '';
$updateAllergenen  = trim($_POST['allergenen'] ?? '');
$updateAfbeelding  = trim($_POST['afbeelding'] ?? '');

$updateError   = null;
$updateSuccess = false;

if ($updateId <= 0 || $updateNaam === '' || $updateBeschrijving === '' || $updatePrijs === '') {
    $updateError = 'Vul alle verplichte velden in (naam, beschrijving en prijs).';
} elseif (!is_numeric($updatePrijs) || (float)$updatePrijs < 0) {
    $updateError = 'Voer een geldige prijs in.';
} else {
    $sql  = "UPDATE menukaart
             SET Naam = :naam, Beschrijving = :beschrijving, Prijs = :prijs,
                 Allergenen = :allergenen, Afbeelding = :afbeelding
             WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id'           => $updateId,
        ':naam'         => $updateNaam,
        ':beschrijving' => $updateBeschrijving,
        ':prijs'        => (float)$updatePrijs,
        ':allergenen'   => $updateAllergenen !== '' ? $updateAllergenen : null,
        ':afbeelding'   => $updateAfbeelding !== '' ? $updateAfbeelding : null,
    ]);
    // rowCount() kan 0 zijn als de waarden ongewijzigd zijn – dit is geen fout.
    $updateSuccess = true;
}
