<?php require_once '../database.php';

if(isset($_POST["company"])&&
  isset($_POST["status"]) &&
  isset($_POST["approval_date"]))
  {
$vaccine = $connection->prepare
("INSERT INTO fjc353_1.Vaccine (company, status, approval_date)
VALUES (:company, :status, :approval_date)";);

$vaccine->bindParam(':company', $_POST["company"]);
$vaccine->bindParam(':status', $_POST["status"]);
$vaccine->bindParam(':approval_date', $_POST["approval_date"]);

if($person->execute())
  header("Location: .");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>create</title>
</head>
<body>
  <form action = "./create.php" method = "post">
    <label for = "company">Type</label><br>
    <input type="text" name="company" id="company"> <br>
    <label for = "status">Status</label><br>
    <input type="text" name="status" id="status"> <br>
    <label for = "approval_date">Approval Date</label><br>
    <input type="date" name="approval_date" id="approval_date"> <br>
    <button type="submit">Add</button>
  </form>
  <a href= "./">Back to Vaccine</a>

</body>
</html>

