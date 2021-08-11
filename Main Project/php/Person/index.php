<?php require_once '../Database.php';

$statement = $connection ->prepare('SELECT * FROM fjc353_1.Person AS Person');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset ="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>people</title>
</head>

<body>
  <h1>List of people:</h1>
  <table>
    <thead>
      <tr>
        <td>Medicare Number</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Date Of Birth</td>
        <td>Citizenship</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>Address</td>
        <td>Postal Code</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $Person->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
        <tr>
          <td><?= $row["medicare_no"] ?></td>
          <td><?= $row["first_name"] ?></td>
          <td><?= $row["last_name"] ?></td>
          <td><?= $row["date_of_birth"] ?></td>
          <td><?= $row["citizenship"] ?></td>
          <td><?= $row["email"] ?></td>
          <td><?= $row["telephone_no"] ?></td>
          <td><?= $row["address"] ?></td>
          <td><?= $row["postal_code"] ?></td>
          <td>
            <a href="./delete.php?medicare_no=<?= $row["medicare_no"] ?>">Delete</a>
            <a href="./edit.php?medicare_no=<?= $row["medicare_no"] ?>">Edit</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <a href="../">Back to Homepage</a>

</body>
</html>

