<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Public_Health_Facility WHERE Public_Health_Facility.name = :name;");
$statement->bindParam(":name", $_GET["name"]);
$statement->execute();

header("Location: .");
?>