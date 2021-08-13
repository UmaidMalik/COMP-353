<?php require_once '../database.php';

if(isset($_POST["EID"]) &&
  isset($_POST["medicare_no"]))
  {
    $phw = $connection->prepare
    ("INSERT INTO fjc353_1.Public_Health_Worker (EID, medicare_no)
    VALUES (:EID, :medicare_no);");

    $phw->bindParam(':EID', $_POST["EID"]);
    $phw->bindParam(':medicare_no', $_POST["medicare_no"]);

    if($phw->execute())
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
    <label for = "EID">Employee ID</label><br>
    <input type="number" name="EID" id="EID"> <br>
    <label for = "medicare_no">Medicare Number</label><br>
    <input type="text" name="medicare_no" id="medicare_no"> <br>
    <button type="submit">Add</button>
  </form>
  <a href= "./">Back to Public Health Worker</a>

</body>
</html>
