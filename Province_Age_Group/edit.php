<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Province_Age_Group AS Province_Age_Group WHERE Province_Age_Group.province = :province;");
$statement->bindParam(":province", $_GET["province"]);
$statement->execute();
$province_age_group = $statement->fetch(PDO::FETCH_ASSOC);
if(isset($_POST["province"]) &&
  isset($_POST["group_no"]))
  {
    $statement = $connection->prepare("UPDATE fjc353_1.Province_Age_Group SET
                              province = :province,
                              group_no = :group_no
                              WHERE province =:province;");


    $statement->bindParam(':province', $_POST["province"]);
    $statement->bindParam(':group_no', $_POST["group_no"]);

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
  <title>Edit a Province_Age_Group</title>
</head>
<body>
  <form action = "./edit.php" method = "post">
    <label for = "province">Province</label><br>
    <input type="text" name="province" id="province" value="<?= $province_age_group["province"] ?>"> <br>
    <label for = "province">Province_Age_Group</label><br>
    <input type="number" name="group_no" id="group_no" value="<?= $province_age_group["group_no"] ?>"> <br>
    <button type="submit">Update</></button>
  </form>
  <a href= "./">Back to Province_Age_Group</a>

</body>
</html>
