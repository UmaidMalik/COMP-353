<?php require_once '../database.php';

if(isset($_POST["name"]) && 
   isset($_POST["postal_code"]) && 
   isset($_POST["type"]) && 
   isset($_POST["address"]) &&
   isset($_POST["web_address"]) &&
   isset($_POST["telephone_no"])){
        $facility = $connection->prepare("INSERT INTO fjc353_1.Public_Health_Facility(name, postal_code, type, address, web_address, telephone_no)
                                         VALUES (:name, :postal_code, :type, :address, :web_address, :telephone_no);");
        
        $facility->bindParam(':name', $_POST["name"]);
        $facility->bindParam(':postal_code', $_POST["postal_code"]);
        $facility->bindParam(':type', $_POST["type"]);
        $facility->bindParam(':address', $_POST["address"]);
        $facility->bindParam(':web_address', $_POST["web_address"]);
        $facility->bindParam(':telephone_no', $_POST["telephone_no"]);

        if($facility->execute())
            header("Location: .");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form action = "./create.php" method = "post">
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
        <button type="submit">Add</button>
    </form>
    <a href= "../">Back to Public Health Facility</a>
</body>
</html>