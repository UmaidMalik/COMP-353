<?php require_once '../database.php'

$statement = $connection ->prepare('SELECT * FROM fjc353_1.Transfer AS Transfer');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>index.transfer</title>
</head>

<body>
  <h1>List of Transfers:</h1>
  <table>
    <thead>
      <tr>
        <td>Source PHF</td>
        <td>Destination PHF</td>
        <td>Vaccine Type</td>
        <td>Count</td>
        <td>Date</td>
        <td>TransferID</td>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);) { ?>
      <tr>
        <td><?= $row["from"] ?></td>
        <td><?= $row["to"] ?></td>
        <td><?= $row["company"] ?></td>
        <td><?= $row["count"] ?></td>
        <td><?= $row["date"] ?></td>
        <td><?= $row["TransferID"] ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
  <a href="../">Back to Homepage</a>
  <a href="./create/">Make a Transfer</a>

</body>
</html>
