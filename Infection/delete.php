<?php require_once '../database.php';

$statement = $connection->prepare("DELETE FROM fjc353_1.Infection WHERE Infection.type_of_infection = :type_of_infection");
$statement->bindParam(":type_of_infection", $_GET["type_of_infection"]);
$statement->execute();

header("Location: .");
?>