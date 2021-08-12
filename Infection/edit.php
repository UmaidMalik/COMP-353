<?php require_once '../database.php';
$statement = $connection->prepare("SELECT * FROM fjc353_1.Infection AS Infection WHERE Infection.type_of_infection = :type_of_infection");
$statement->bindParam(":type_of_infection", $_GET["type_of_infection"]);
$statement->execute();
$infection = $statement->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["type_of_infection"])){
    $statement = $connection->prepare("UPDATE fjc353_1.Infection SET type_of_infection = :type_of_infection;");

    $$statement->bindParam(':type_of_infection', $_POST["type_of_infection"]);

    if($statement->execute()){
        header("Location: .");
    } else {
        header("Location: ./edit.php?type_of_infection=".$_POST["type_of_infection"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit an Infection</title>
</head>
<body>
    <form action="./edit.php" method = "post">
        <label for="type_of_infection">Type of Infection</label>
        <input type="text" name="type_of_infection" id="type_of_infection" value="<?= $infection["type_of_infection"] ?>"><br>
        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Infection</a>
</body>
</html>