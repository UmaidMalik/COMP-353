<?php require_once '../database.php';

$statement = $connection->prepare('SELECT * FROM fjc353_1.Public_Health_Facility AS Public_Health_Facility');
$statement->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Health Facility</title>
</head>
<body>
    <h1>List of Public Health Facility:</h1>
    <table>
        <thread>
            <tr>
                <td>Name</td>
                <td>Postal Code</td>
                <td>Type</td>
                <td>Address</td>
                <td>Web Address</td>
                <td>Telephone Number</td>
            </tr>
        </thread>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){?>
                <tr>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["postal_code"] ?></td>
                    <td><?= $row["type"] ?></td>
                    <td><?= $row["address"] ?></td>
                    <td><?= $row["web_address"] ?></td>
                    <td><?= $row["telephone_no"] ?></td>
                    <td>
                        <a href="./delete.php?name=<?= $row["name"]?>">Delete</a>
                        <a href="./edit.php?name=<?= $row["name"]?>">Edit</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <a href="../">Back to Homepage</a>
    <a href="./create.php/">Add a Public Health Facility</a>
</body>
</html>
