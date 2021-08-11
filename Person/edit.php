<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Person AS Person WHERE Person.medicare_no = :medicare_no");
$statement->bindParam(":medicare_no", $_GET["medicare_no"]);
$statement->execute();
$person = $statement->fetch(PDO::FETCH_ASSOC);
if(isset($_POST["medicare_no"])&&
  isset($_POST["first_name"]) &&
  isset($_POST["last_name"]) &&
  isset($_POST["date_of_birth"]) &&
  isset($_POST["citizenship"]) &&
  isset($_POST["email"]) &&
  isset($_POST["telephone_no"]) &&
  isset($_POST["address"]) &&
  isset($_POST["postal_code"]))
  {
    $statement = $connection->prepare("UPDATE fjc353_1.Person SET
                              first_name = :first_name,
                              last_name = :last_name,
                              date_of_birth = :date_of_birth,
                              citizenship = :citizenship,
                              email = :email,
                              telephone_no = :telephone_no,
                              address = :address,
                              postal_code = :postal_code
                              WHERE medicare_no =:medicare_no;");


    $statement->bindParam(':medicare_no', $_POST["medicare_no"]);
    $statement->bindParam(':first_name', $_POST["first_name"]);
    $statement->bindParam(':last_name', $_POST["last_name"]);
    $statement->bindParam(':date_of_birth', $_POST["date_of_birth"]);
    $statement->bindParam(':citizenship', $_POST["citizenship"]);
    $statement->bindParam(':email', $_POST["email"]);
    $statement->bindParam(':telephone_no', $_POST["telephone_no"]);
    $statement->bindParam(':address', $_POST["address"]);
    $statement->bindParam(':postal_code', $_POST["postal_code"]);

    if($statement->execute())
    {
      header("Location: .");
    }else
    {
      header("Location: ./edit.php?medicare_no=".$_POST["medicare_no"]);
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <title>Edit a person</title>
</head>
<body>
  <form action = "./edit.php" method = "post">
    <label for = "medicare_no">Medicare Number</label><br>
    <input type="text" name="medicare_no" id="medicare_no" value="<?= $person["medicare_no"] ?>"> <br>
    <label for = "first_name">First Name</label><br>
    <input type="text" name="first_name" id="first_name" value="<?= $person["first_name"] ?>"> <br>
    <label for = "last_name">Last Name</label><br>
    <input type="text" name="last_name" id="last_name" value="<?= $person["last_name"] ?>"> <br>
    <label for = "date_of_birth">Date Of Birth</label><br>
    <input type="date" name="date_of_birth" id="date_of_birth" value="<?= $person["date_of_birth"] ?>"> <br>
    <label for = "citizenship">Citizenship</label><br>
    <input type="text" name="citizenship" id="citizenship" value="<?= $person["citizenship"] ?>"> <br>
    <label for = "email">Email</label><br>
    <input type="email" name="email" id="email" value="<?= $person["email"] ?>"> <br>
    <label for = "telephone_no">Phone Number</label><br>
    <input type="tel" name="telephone_no" id="telephone_no" value="<?= $person["telephone_no"] ?>"> <br>
    <label for = "address">Address</label><br>
    <input type="text" name="address" id="address" value="<?= $person["address"] ?>"> <br>
    <label for = "postal_code">Postal Code</label><br>
    <input type="text" name="postal_code" id="postal_code" value="<?= $person["postal_code"] ?>"> <br>
    <button type="submit">Update</></button>
  </form>
  <a href= "./">Back to Person</a>

</body>
</html>
