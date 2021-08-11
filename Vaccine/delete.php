<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Vaccine WHERE Vaccine.company = :company");
$statement->bindParam(":company", $_GET["company"]);
$statement->execute();

header("Location: .");

?>

