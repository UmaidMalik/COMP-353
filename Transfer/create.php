<?php require_once '../database.php';

if(isset($_POST["from"])&&
  isset($_POST["to"]) &&
  isset($_POST["company"]) &&
  isset($_POST["count"]) &&
  isset($_POST["date"] &&
  isset($_POST["TransferID"]))
  {
$transfer = $connection->prepare
("INSERT INTO fjc353_1.Transfer (from, to, company, count, date, TransferID)
VALUES (:from, :to, :company, :count, :date, :TransferID);");

$transfer->bindParam(':from', $_POST["from"]);
$transfer->bindParam(':to', $_POST["to"]);
$transfer->bindParam(':company', $_POST["company"]);
$transfer->bindParam(':count', $_POST["count"]);
$transfer->bindParam(':date', $_POST["date"]);
$transfer->bindParam(':TransferID', $_POST["TransferID"]);


if($transfer->execute())
  header("Location: .");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>create</title>
</head>
<body>
  <form action = "./create.php" method = "post">
    <label for = "from">Source PHF</label><br>
    <input type="text" name="from" id="from"> <br>
    <label for = "to">Destination PHF</label><br>
    <input type="text" name="to" id="to"> <br>
    <label for = "company">Vaccine Type</label><br>
    <input type="text" name="company" id="company"> <br>
    <label for = "count">Count</label><br>
    <input type="number" name="count" id="count"> <br>
    <label for = "date">Count</label><br>
    <input type="date" name="date" id="date"> <br>
    <label for = "TransferID">ID</label><br>
    <input type="number" name="TransferID" id="TransferID"> <br>
    <button type="submit">Add</button>
  </form>
  <a href= "./">Back to Transfer</a>

</body>
</html>
