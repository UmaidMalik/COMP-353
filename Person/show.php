<?php require_once '../Database.php';

$statement = $connection -> prepare("SELECT * FROM fjc353_1.Person AS Person WHERE Person.medicare_no = :medicare_no");
$statement -> bindParam(":medicare_no", $_GET["medicare_no"]);
$statement -> execute();
$person = $satatement -> fetch(POD: :FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title><?= $person["Table Person"]></title>
</head>
<body>
  <h1><?= $person["Table Person"] ?></h1>
  <p>Medicare Number: <?= $person[medicare_no] ?></p>
  <p>First Name: <?= $person[first_name] ?></p>
  <p>Last Name: <?= $person[last_name] ?></p>
  <p>Date Of Birth: <?= $person[date_of_birth] ?></p>
  <p>Citizenship: <?= $person[citizenship] ?></p>
  <p>Email: <?= $person[email] ?></p>
  <p>Phone Number: <?= $person[telephone_no] ?></p>
  <p>Address: <?= $person[address] ?></p>
</body>
</html>
