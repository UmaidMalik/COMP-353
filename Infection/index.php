<?php require_once '../database.php';
$statement = $connection->prepare('SELECT * FROM fjc353_1.Infection AS Infection');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infection</title>
</head>
<body>
    <h1>List of Infection</h1>
    <table>
        <thead>
            <tr>
                <td>Type of Infection</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <td><?= $row["type_of_infection"] ?></td>
                <td>
                    <a href="./delete.php?type_of_infection<?= $row["type_of_infection"] ?>">Delete</a>
                    <a href="./edit.php?type_of_infection<?= $row["type_of_infection"] ?>">Edit</a>
                </td>
            <?php } ?>
        </tbody>
    </table>
    <a href="../">Back to Homepage</a>
    <a href="./create.php/">Add an Infection</a>
</body>
</html>