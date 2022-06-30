<?php
$servername = "localhost";
$username = "serverWeb";
$password = "password";
$dbname = "datadistributeur";

// Create connection

if(isset($_POST['nom']) && isset($_POST['qte']))
{ 
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Error on connection: " . $conn->connect_error);
}

$sql = "UPDATE Croquettes SET actif=0";
$conn->query($sql);

$qteParSec = floatval($_POST['qte']) / 10;

$sql = "INSERT INTO Croquettes (nom, qteParSec, actif) VALUES ('" . $_POST['nom']. "', " . $qteParSec . ", 1);";

$conn->query($sql);
$conn->close();

header("Location: /AppWebOCO/Pages/configuration.php");
exit;
}

header("Location: /AppWebOCO/Pages/configuration.php");
exit;
?>

