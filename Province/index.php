<?php require_once '../database.php'

$statement = $connection ->prepare('SELECT * FROM fjc353_1.Province AS Province')
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>index.province</title>
</head>

<body>
  <h1>List of Provinces:</h1>
  <table>
    <thead>
      <tr>
        <td>Province</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $statement->fetch(PDO: :FETCH_ASSOC, PDO: :FETCH_ORI_NEXT)) { ?>
      <tr>
        <td><?= $row["province"] ?></td>
        <td>
          <a href="./delete.php?province=<?= $row["province"] ?>">Delete</a>
          <a href="./edit.php?province=<?= $row["province"] ?>">Edit</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
  <a href="../">Back to Homepage</a>
  <a href="./create/">Add a Province</a>

</body>
</html>

