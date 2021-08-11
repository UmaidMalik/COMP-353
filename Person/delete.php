<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Person WHERE Person.medicare_no = :medicare_no");
$statement->bindParam(":medicare_no", $_GET["medicare_no"]);
$statement->execute();

header("Location: .");

?>
