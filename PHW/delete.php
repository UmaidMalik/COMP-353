<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Public_Health_Worker WHERE Public_Health_Worker.EID = :EID");
$statement->bindParam(":EID", $_GET["EID"]);
$statement->execute();

header("Location: .");

?>
