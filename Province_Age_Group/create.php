<?php require_once '../database.php';

if(isset($_POST["province"]) &&
  isset($_POST["group_no"]))
  {
$province_age_group = $connection->prepare
("INSERT INTO fjc353_1.Province_Age_Group (province, group_no)
VALUES (:province, :group_no)";);

$province_age_group->bindParam(':province', $_POST["province"]);
$province_age_group->bindParam(':pgroup_no', $_POST["group_no"]);

if($$province_age_group->execute())
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
    <label for = "province">Province</label><br>
    <input type="text" name="province" id="province"> <br>
    <label for = "province">Province_Age_Group</label><br>
    <input type="number" name="group_no" id="group_no"> <br>
    <button type="submit">Add</button>
  </form>
  <a href= "./">Back to Province_Age_Group</a>

</body>
</html>
