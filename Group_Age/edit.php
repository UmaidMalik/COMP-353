<?php require_once '../database.php';
$statement = $connection->prepare("SELECT * FROM fjc353_1.Group_Age AS Group_Age WHERE Group_Age.group_no = :group_no");
$statement->bindParam(":group_no", $_GET["group_no"]);
$statement->execute();
$group = $statement->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["group_no"]) && isset($_POST["min_age"])){
    $statement = $connection->prepare("UPDATE fjc353_1.Group_Age SET
                                            group_no = :group_no,
                                            min_age = :min_age;");

    $statement->bindParam(':group_no', $_POST["group_no"]);
    $statement->bindParam(':min_age', $_POST["min_age"]);

    if($statement->execute()){
        header("Location: .");
    } else {
        header("Location: ./edit.php?group_no=".$_POST["group_no"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Group Age</title>
</head>
<body>
    <form action="./edit.php" method = "post">
        <label for="group_no">Group number</label>
        <input type="number" name="group_no" id="group_no" value="<?= $group["group_no"] ?>"><br>
        <label for="min_age">Minimum Age</label>
        <input type="number" name="min_age" id="min_age" value="<?= $group["min_age"] ?>"><br>
        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Group Age</a>
</body>
</html>