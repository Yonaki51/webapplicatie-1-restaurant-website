<?php
session_start();
include("../conn.php");

$sql = "SELECT gebruikersnaam, wachtwoord
        FROM gebruikers
        WHERE gebruikersnaam = :gebruikersnaam
        ";

// preparestatement
$stmt = $conn->prepare($sql);

$stmt->bindParam(":gebruikersnaam", $_POST["gebruikersnaam"]);

//execute on db
$stmt->execute();

//ophalen van data
$result = $stmt->fetch();

if (!$result || !password_verify($_POST["wachtwoord"], $result["wachtwoord"])) {
    header("Location: /public/login.php?error=1");
    exit;
}

$_SESSION["loggedin"] = true;
$_SESSION["gebruikersnaam"] = $result["gebruikersnaam"];

header("Location: /private/admin.php");
exit;