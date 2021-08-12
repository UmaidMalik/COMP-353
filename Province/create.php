<?php require_once '../database.php';

if(isset($_POST["province"]))
  {
$province = $connection->prepare
("INSERT INTO fjc353_1.Province (province)
VALUES (:province)";);

$province->bindParam(':province', $_POST["province"]);

if($province->execute())
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
    <button type="submit">Add</button>
  </form>
  <a href= "./">Back to Province</a>

</body>
</html>

