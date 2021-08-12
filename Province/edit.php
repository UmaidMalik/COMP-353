<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Province AS Province WHERE Province.province = :province");
$statement->bindParam(":province", $_GET["province"]);
$statement->execute();
$province = $statement->fetch(PDO::FETCH_ASSOC);
if(isset($_POST["province"]))
  {
    $statement = $connection->prepare("UPDATE fjc353_1.Province SET
                              province = :province
                              WHERE province =:province;");


    $statement->bindParam(':province', $_POST["province"]);

    if($statement->execute())
    {
      header("Location: .");
    }else
    {
      header("Location: ./edit.php?province=".$_POST["province"]);
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>Edit a Province</title>
</head>
<body>
  <form action = "./edit.php" method = "post">
    <label for = "province">Province</label><br>
    <input type="text" name="province" id="province" value="<?= $province["province"] ?>"> <br>

    <button type="submit">Update</></button>
  </form>
  <a href= "./">Back to Province</a>

</body>
</html>

