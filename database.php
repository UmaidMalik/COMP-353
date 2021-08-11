<?php
$server = 'fjc353.encs.concordia.ca';
$username = 'fjc353_1';
$password = 'groupone';
$database = 'fjc353_1';

try {
  $connection = new PDO("mysql:host=$server;dbname=$database;", $username,$password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>
