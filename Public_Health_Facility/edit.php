<?php require_once '../database.php';

$statement = $connection->prepare("SELECT * FROM fjc353_1.Public_Health_Facility AS Public_Health_Facility WHERE Public_Health_Facility.name = :name");
$statement->bindParam(":name", $_GET["name"]);
$statement->execute();

$facility = $statement->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["name"]) && 
   isset($_POST["postal_code"]) && 
   isset($_POST["type"]) && 
   isset($_POST["address"]) &&
   isset($_POST["web_address"]) &&
   isset($_POST["telephone_no"])){
    $statement = $connection->prepare("UPDATE fjc353_1.Public_Health_Facility SET
                                name = :name,
                                postal_code = :postal_code,
                                type = :type,
                                address = :address,
                                web_address = :web_address,
                                telephone_no = :telephone_no;");

    $statement->bindPan(':name', $_POST["name"]);
    $statement->bindPan(':postal_code', $_POST["postal_code"]);
    $statement->bindPan(':type', $_POST["type"]);
    $statement->bindPan(':address', $_POST["address"]);    
    $statement->bindPan(':web_address', $_POST["web_address"]);    
    $statement->bindPan(':telephone_no', $_POST["telephone_no"]);
    
    if($statement->execute()){
        header("Location: .");
    } else {
        heater("Location: ./edit.php?name=".$_POST["name"]);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Public Health Facility</title>
</head>
<body>
    <form action = "./edit.php" method = "post">
        <label for = "name">Name</label><br>
        <input type="text" name="name" id="name"><br>
        <label for = "postal_code">Postal Code</label><br>
        <input type="text" name="postal_code" id="postal_code"><br>
        <label for = "type">Type</label><br>
        <input type="text" name="type" id="type"><br>
        <label for = "address">Address</label><br>
        <input type="text" name="address" id="address"><br>
        <label for = "web_address">Web Address</label><br>
        <input type="url" name="web_address" id="web_address"><br>
        <label for = "telephone_no">Telephone Number</label><br>
        <input type="tel" name="telephone_no" id="telephone_no"><br>
        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Public Health Facility</a>
</body>
</html>