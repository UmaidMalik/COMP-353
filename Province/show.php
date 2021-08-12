<?php require_once '../database.php';

$statement = $connection -> prepare("SELECT * FROM fjc353_1.Province AS Province WHERE Province.province = :province");
$statement -> bindParam(":province", $_GET["province"]);
$statement -> execute();
$province = $satatement -> fetch(POD: :FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title><?= $province["Table Province"]></title>
</head>
<body>
  <h1><?= $province["Table Province"] ?></h1>
  <p>Province: <?= $province[province] ?></p>
</body>
</html>

