<?php require_once '../database.php';

if(isset($_POST["medicare_no"])&&
  isset($_POST["date"]) &&
  isset($_POST["PHF_name"]) &&
  isset($_POST["company"]) &&
  isset($_POST["dose_no"]) &&
  isset($_POST["EID"]))
  {
$vaccination = $connection->prepare
("INSERT INTO fjc353_1.Vaccination (medicare_no, date, PHF_name, company, dose_no, EID)
VALUES (:medicare_no, :date, :PHF_name, :company, :dose_no, :EID);");

$vaccination->bindParam(':medicare_no', $_POST["medicare_no"]);
$vaccination->bindParam(':date', $_POST["date"]);
$vaccination->bindParam(':PHF_name', $_POST["PHF_name"]);
$vaccination->bindParam(':company', $_POST["company"]);
$vaccination->bindParam(':dose_no', $_POST["dose_no"]);
$vaccination->bindParam(':EID', $_POST["EID"]);

if($vaccination->execute())
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
    <label for = "medicare_no">Medicare Number</label><br>
    <input type="text" name="medicare_no" id="medicare_no"> <br>
    <label for = "PHF_name">Public Health Facility</label><br>
    <input type="text" name="PHF_name" id="PHF_name"> <br>
    <label for = "date">Date</label><br>
    <input type="date" name="date" id="date"> <br>
    <label for = "company">Company</label><br>
    <input type="text" name="company" id="company"> <br>
    <label for = "dose_no">Dose Number</label><br>
    <input type="number" name="dose_no" id="dose_no"> <br>
    <label for = "EID">Eployee ID</label><br>
    <input type="number" name="EID" id="EID"> <br>
    <button type="submit">Add</button>
  </form>
  <a href= "./">Back to Vaccination</a>

</body>
</html>
