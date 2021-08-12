<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Province_Age_Group WHERE Province_Age_Group.province = :province");
$statement->bindParam(":province", $_GET["province"]);
$statement->execute();

header("Location: .");

?>
