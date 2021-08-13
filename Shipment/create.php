<?php require_once '../database.php';

if(isset($_POST["company"])&&
  isset($_POST["PHF"]) &&
  isset($_POST["date_of_shipment"]) &&
  isset($_POST["count"]) &&
  isset($_POST["ShipmentID"]))
  {
$shipment = $connection->prepare
("INSERT INTO fjc353_1.Vaccination (medicare_no, date, PHF_name, company, dose_no, EID)
VALUES (:medicare_no, :date, :PHF_name, :company, :dose_no, :EID);");

$shipment->bindParam(':company', $_POST["company"]);
$shipment->bindParam(':PHF', $_POST["PHF"]);
$shipment->bindParam(':date_of_shipment', $_POST["date_of_shipment"]);
$shipment->bindParam(':count', $_POST["count"]);
$shipment->bindParam(':ShipmentID', $_POST["ShipmentID"]);


if($shipment->execute())
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
    <label for = "company">Vaccine Type</label><br>
    <input type="text" name="company" id="company"> <br>
    <label for = "PHF">Public Health Facility</label><br>
    <input type="text" name="PHF" id="PHF"> <br>
    <label for = "date_of_shipment">Date</label><br>
    <input type="date" name="date_of_shipment" id="date_of_shipment"> <br>
    <label for = "count">Count</label><br>
    <input type="number" name="count" id="count"> <br>
    <label for = "ShipmentID">ID</label><br>
    <input type="number" name="ShipmentID" id="ShipmentID"> <br>
    <button type="submit">Add</button>
  </form>
  <a href= "./">Back to Shipment</a>

</body>
</html>
