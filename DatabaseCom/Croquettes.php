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

$sql = "INSERT INTO Croquettes (nom) VALUES ('Test')";

$conn->query($sql);

echo"\n";

$conn->close();
?> 