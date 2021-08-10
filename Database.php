<?php
$server = 'localhost:3306';
$username = 'fjc353_1';
$password = 'GROUPONE';
$database = 'fjc353_1';

try {
  $connection = new PDO("mysql:host=$server;dbname=$database;", $username,$password);
} catch (PODException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>
