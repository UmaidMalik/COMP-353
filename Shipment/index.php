<?php require_once '../database.php'

$statement = $connection ->prepare('SELECT * FROM fjc353_1.Shipment AS Shipment');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>index.shipment</title>
</head>

<body>
  <h1>List of Shipments:</h1>
  <table>
    <thead>
      <tr>
        <td>Vaccine Type</td>
        <td>Public Health Facility</td>
        <td>Date</td>
        <td>Count</td>
        <td>ID</td>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);) { ?>
      <tr>
        <td><?= $row["company"] ?></td>
        <td><?= $row["PHF"] ?></td>
        <td><?= $row["date"] ?></td>
        <td><?= $row["count"] ?></td>
        <td><?= $row["ID"] ?></td>
        <td>

        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
  <a href="../">Back to Homepage</a>
  <a href="./create/">Sent a Shipment</a>

</body>
</html>
