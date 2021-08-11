<?php require_once '../database.php'

$statement = $connection ->prepare('SELECT * FROM fjc353_1.Vaccine AS Vaccine')
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>index.vaccine</title>
</head>

<body>
  <h1>List of vaccines:</h1>
  <table>
    <thead>
      <tr>
        <td>Type</td>
        <td>Status</td>
        <td>Approval Date</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $statement->fetch(PDO: :FETCH_ASSOC, PDO: :FETCH_ORI_NEXT)) { ?>
      <tr>
        <td><?= $row["company"] ?></td>
        <td><?= $row["status"] ?></td>
        <td><?= $row["approval_date"] ?></td>
        <td>
          <a href="./delete.php?company=<?= $row["company"] ?>">Delete</a>
          <a href="./edit.php?company=<?= $row["company"] ?>">Edit</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
  <a href="../">Back to Homepage</a>
  <a href="./create/">create</a>

</body>
</html>

