<?php
$servername = "localhost";
$username = "serverWeb";
$password = "password";
$dbname = "datadistributeur";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Error on connection: " . $conn->connect_error);
}

$sql = "INSERT INTO Croquettes (nom, qteParSec, actif) VALUES ('" . $_POST['nom']. "', " . $_POST['qteParSec'] . ", 0);";

$conn->query($sql);
$conn->close();

header("Location: /AppWebOCO/Pages/configuration.php");
exit;

