<?php require_once '../database.php';

$statement = $connection -> prepare("SELECT * FROM fjc353_1.Province_Age_Group AS Province_Age_Group WHERE Province_Age_Group.province = :province";);
$statement -> bindParam(":province", $_GET["province"]);
$statement -> execute();
$province_age_group = $satatement -> fetch(POD::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title><?= $province_age_group["Table Province Age Group"]></title>
</head>
<body>
  <h1><?= $province_age_group["Table Province Age Group"] ?></h1>
  <p>Province: <?= $province_age_group[province] ?></p>
  <p>Age Group: <?= $province_age_group[group_no] ?></p>
</body>
</html>
