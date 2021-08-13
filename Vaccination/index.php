<?php require_once '../database.php'

$statement = $connection ->prepare('SELECT * FROM fjc353_1.Vaccination AS Vaccination');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>index.vaccination</title>
</head>

<body>
  <h1>List of Vaccinations:</h1>
  <table>
    <thead>
      <tr>
        <td>Medicare Number</td>
        <td>Date</td>
        <td>Public Health Facility</td>
        <td>Vaccine Type</td>
        <td>Dose Number</td>
        <td>Employee ID</td>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);) { ?>
      <tr>
        <td><?= $row["medicare_no"] ?></td>
        <td><?= $row["date"] ?></td>
        <td><?= $row["PHF_name"] ?></td>
        <td><?= $row["company"] ?></td>
        <td><?= $row["dose_no"] ?></td>
        <td><?= $row["EID"] ?></td>
        <td>

        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
  <a href="../">Back to Homepage</a>
  <a href="./create/">Perform a vaccine</a>

</body>
</html>
