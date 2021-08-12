<?php require_once '../database.php';

if(isset($_POST["type_of_infection"])){
    $infection = $connection->prepare("INSERT INTO fjc353_1.Infection(type_of_infection) VALUES (:type_of_infection);");

    $infection->bindParam(':type_of_infection', $_POST["type_of_infection"]);

    $infection->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form action="./create.php" method = "post">
        <label for="type_of_infection">Type of Infection</label>
        <input type="text" name="type_of_infection" id="type_of_infection"><br>
        <button type="submit">Add</button>
    </form>
    <a href="../">Back to Infection</a>
</body>
</html>