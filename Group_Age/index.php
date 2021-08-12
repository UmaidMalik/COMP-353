<?php require_once '../database.php';
$statement = $connection->prepare('SELECT * FROM fjc353_1.Group_Age AS Group_Age');
$statement->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Age</title>
</head>
<body>
    <h1>List of Group Age</h1>
    <table>
        <thead>
            <tr>
                <td>Group number</td>
                <td>Minimum Age</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["group_no"] ?></td>
                    <td><?= $row["min_age"] ?></td>
                    <td>
                        <a href="./delete.php?group_age<?= $row["group_age"] ?>">Delete</a>
                        <a href="./edit.php?group_age<?= $row["group_age"] ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../">Back to Homepage</a>
    <a href="./create.php/">Add a Group Age</a>
</body>
</html>
