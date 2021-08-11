<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Public_Health_Worker AS PHW WHERE Public_Health_Worker.EID = :EID");
$statement->bindParam(":EID", $_GET["EID"]);
$statement->execute();
$phw = $statement->fetch(PDO: :FETCH_ASSOC);
if(isset($_POST["EID"])&&
  isset($_POST["medicare_no"]))
  {
    $statement = $connection->prepare("UPDATE fjc353_1.Public_Health_Worker SET
                              medicare_no = :medicare_no,
                              WHERE EID =:EID;");

    $statement->bindParam(':medicare_no', $_POST["medicare_no"]);
    $statement->bindParam(':EID', $_POST["EID"]);

    if($statement->execute())
    {
      header("Location: .");
    }else
    {
      header("Location: ./edit.php?EID=".$_POST["EID"]);
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>Edit a Public Health Worker</title>
</head>
<body>
  <form action = "./edit.php" method = "post">
    <label for = "EID">Employee ID</label><br>
    <input type="number" name="EID" id="EID" value="<?= $phw["EID"] ?>"> <br>
    <label for = "medicare_no">Medicare Number</label><br>
    <input type="text" name="medicare_no" id="medicare_no" value="<?= $phw["medicare_no"] ?>"> <br>
    <button type="submit">Update</></button>
  </form>
  <a href= "./">Back to Public Health Worker</a>

</body>
</html>

