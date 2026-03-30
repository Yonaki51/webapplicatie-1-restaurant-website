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
    header("Location: /public/login.php?error=1");
    exit;
}

$_SESSION["loggedin"] = true;
$_SESSION["gebruikersnaam"] = $result["gebruikersnaam"];

header("Location: /private/admin.php");
exit;