<?php require_once '../database.php';

$statement = $connection->prepare("DELETE FROM fjc353_1.Group_Age WHERE Group_Age.group_no = :group_no");
$statement->bindParam(":group_no", $_GET["group_no"]);
$statement->execute();

header("Location: .");
?>