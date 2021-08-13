<?php require_once '../database.php';

if(isset($_POST["medicare_no"])&&
  isset($_POST["first_name"]) &&
  isset($_POST["last_name"]) &&
  isset($_POST["date_of_birth"]) &&
  isset($_POST["citizenship"]) &&
  isset($_POST["email"]) &&
  isset($_POST["telephone_no"]) &&
  isset($_POST["address"])) {
    $person = $connection->prepare("INSERT INTO fjc353_1.Person (medicare_no, first_name, last_name, date_of_birth, citizenship, email, telephone_no, address)
    VALUES (:medicare_no, :first_name, :last_name, :date_of_birth, :citizenship, :email, :telephone_no, :address);");

    $person->bindParam(':medicare_no', $_POST["medicare_no"]);
    $person->bindParam(':first_name', $_POST["first_name"]);
    $person->bindParam(':last_name', $_POST["last_name"]);
    $person->bindParam(':date_of_birth', $_POST["date_of_birth"]);
    $person->bindParam(':citizenship', $_POST["citizenship"]);
    $person->bindParam(':email', $_POST["email"]);
    $person->bindParam(':telephone_no', $_POST["telephone_no"]);
    $person->bindParam(':address', $_POST["address"]);

    $person->execute();
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
    <label for = "first_name">First Name</label><br>
    <input type="text" name="first_name" id="first_name"> <br>
    <label for = "last_name">Last Name</label><br>
    <input type="text" name="last_name" id="last_name"> <br>
    <label for = "date_of_birth">Date Of Birth</label><br>
    <input type="date" name="date_of_birth" id="date_of_birth"> <br>
    <label for = "citizenship">Citizenship</label><br>
    <input type="text" name="citizenship" id="citizenship"> <br>
    <label for = "email">Email</label><br>
    <input type="email" name="email" id="email"> <br>
    <label for = "telephone_no">Phone Number</label><br>
    <input type="tel" name="telephone_no" id="telephone_no"> <br>
    <label for = "address">Address</label><br>
    <input type="text" name="address" id="address"> <br>
    <button type="submit">Add</button>
  </form>
  <a href= "../">Back to Person</a>

</body>
</html>
