<?php require_once '../database.php';

$statement = $connection -> prepare("SELECT * FROM fjc353_1.Vaccine AS Person WHERE Vaccine.company = :company");
$statement -> bindParam(":company", $_GET["company"]);
$statement -> execute();
$vaccine = $satatement -> fetch(POD: :FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title><?= $vaccine["Table Vaccine"]></title>
</head>
<body>
  <h1><?= $vaccine["Table Vaccine"] ?></h1>
  <p>Type: <?= $vaccine[company] ?></p>
  <p>Status: <?= $vaccine[status] ?></p>
  <p>Approval Date: <?= $vaccine[approval_date] ?></p>
</body>
</html>
