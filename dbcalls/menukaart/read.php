<?php

// variabel met een SQL querry
$sql = "SELECT * FROM menukaart";

// preparestatement
$stmt = $conn->prepare($sql);

// execute on db
$stmt->execute();

// ophalen van data
$result = $stmt->fetchAll();