<?php require_once '../database.php';

if(isset($_POST["group_no"])){
    $group = $connection->prepare("INSERT INTO fjc353_1.Group_Age(group_no, min_age) VALUES (:group_no, :min_age);");
    
    $group->bindParam(':group_no', $_POST["group_no"]);
    $group->bindParam(':min_age', $_POST["min_age"]);

    $group->execute();
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
        <label for="group_no">Group Number</label>
        <input type="number" name="group_no" id="group_no"><br>
        <label for="min_age">Minimum Age</label>
        <input type="number" name="min_age" id="min_age"><br>
        <button type="submit">Add</button>
    </form>
    <a href="../">Back to Group Age</a>
</body>
</html>