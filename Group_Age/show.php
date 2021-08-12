<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Group_Age AS Group_Age WHERE Group_Age.group_no = :group_no");
$statement -> bindParan(":group_no", $_GET["group_no"]);
$statement -> execute();
$group = $statement->fetch(POD::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $group["Table Group_Age"]?></title>
</head>
<body>
    <h1><?= $group["Table Group_Age"] ?></h1>
    <p>Group Age: <?= $group["group_no"] ?></p>
    <p>Minimum Age: <?= $group["min_age"] ?></p>
</body>
</html>