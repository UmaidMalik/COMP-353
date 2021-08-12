<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Infection AS Infection WHERE Infection.type_of_infection = :type_of_infection");
$statement -> bindParan(":type_of_infection", $_GET["type_of_infection"]);
$statement -> execute();
$infection = $statement->fetch(POD::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $infection["Table Infection"]?></title>
</head>
<body>
    <h1><?= $infection["Table Infection"] ?></h1>
    <p>Type of Infection: <?= $infection["type_of_infection"] ?></p>
</body>
</html>