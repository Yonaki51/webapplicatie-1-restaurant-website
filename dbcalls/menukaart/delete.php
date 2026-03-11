<?php
// delete.php – Verwijdert een gerecht uit de 'menukaart'-tabel op basis van ID.
// Vereist: $conn (PDO-object) via dbcalls/conn.php.
// Verwacht POST-parameter: id.

$deleteId      = (int)($_POST['id'] ?? 0);
$deleteError   = null;
$deleteSuccess = false;

if ($deleteId <= 0) {
    $deleteError = 'Selecteer een geldig gerecht om te verwijderen.';
} else {
    $sql  = "DELETE FROM menukaart WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $deleteId]);
    $deleteSuccess = $stmt->rowCount() > 0;
    if (!$deleteSuccess) {
        $deleteError = 'Gerecht niet gevonden.';
    }
}
