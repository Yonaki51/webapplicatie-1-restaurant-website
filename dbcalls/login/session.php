<?php
session_start();
include("../conn.php");

$sql = "SELECT gebruikersnaam, wachtwoord
        FROM gebruikers
        WHERE gebruikersnaam = :gebruikersnaam && wachtwoord = :wachtwoord
        ";

// preparestatement
$stmt = $conn->prepare($sql);

$stmt->bindParam(":gebruikersnaam", $_POST["gebruikersnaam"]);
$stmt->bindParam(":wachtwoord", $_POST["wachtwoord"]);

//execute on db
$stmt->execute();

//ophalen van data
$result = $stmt->fetch();

if (!$result) {
    echo "je bent niet ingelogd";
} else {

    $_SESSION["loggedin"] = true;
    $_SESSION["gebruikersnaam"] = $result["gebruikersnaam"];

    header ("location: /private/admin.php");
}