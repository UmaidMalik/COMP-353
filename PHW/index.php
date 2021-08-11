<?php require_once '../database.php'

$statement = $connection ->prepare('SELECT * FROM fjc353_1.Public_Health_Worker AS PHW')
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>index.phw</title>
</head>

<body>
  <h1>List of public health workers:</h1>
  <table>
    <thead>
      <tr>
        <td>Employee ID</td>
        <td>Medicare Number</td>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $statement->fetch(PDO: :FETCH_ASSOC, PDO: :FETCH_ORI_NEXT)) { ?>
      <tr>
        <td><?= $row["EID"] ?></td>
        <td><?= $row["medicare_no"] ?></td>
        <td>
          <a href="./delete.php?EID=<?= $row["EID"] ?>">Delete</a>
          <a href="./edit.php?EID=<?= $row["EID"] ?>">Edit</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
  <a href="../">Back to Homepage</a>
  <a href="./create/">Add a Public Health Worker</a>

</body>
</html>
