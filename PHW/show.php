<?php require_once '../database.php';

$statement = $connection -> prepare("SELECT * FROM fjc353_1.Public_Health_Worker AS PHW WHERE Public_Health_Worker.EID = :EID");
$statement -> bindParam(":EID", $_GET["EID"]);
$statement -> execute();
$phw = $satatement -> fetch(POD: :FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title><?= $phw["Table PHW"]></title>
</head>
<body>
  <h1><?= $phw["Table PHW"] ?></h1>
  <p>EID: <?= $phw[EID] ?></p>
  <p>Medicare Number: <?= $phw[medicare_no] ?></p>
</body>
</html>

