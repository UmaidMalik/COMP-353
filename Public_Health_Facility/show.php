<?php require_once '../database.php';
$statement = $connection->prepare("SELECT * FROM fjc353_1.Public_Health_Facility AS Public_Health_Facility WHERE Public_Health_Facility.name = :name");
$statement->bindParam(":name", $_GET["name"]);
$statement->execute();
$facility = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $facility["Table Public_Health_Facility"] ?></title>
</head>
<body>
    <h1><?= $facility["Table Public_Health_Facility"] ?></h1>
    <p>Name: <?= $facility["name"] ?></p>
    <p>Postal Code: <?= $facility["postal_code"] ?></p>
    <p>Type: <?= $facility["type"] ?></p>
    <p>Address: <?= $facility["address"] ?></p>
    <p>Web Address: <?= $facility["web_address"] ?></p>
    <p>Telephone Number: <?= $facility["telephone_no"] ?></p>
</body>
</html>