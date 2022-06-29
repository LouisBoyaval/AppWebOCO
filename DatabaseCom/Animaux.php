<?php
$servername = "localhost";
$username = "serverWeb";
$password = "password";
$dbname = "datadistributeur";

if(isset($_POST['nom']) && isset($_POST['poids']) && isset($_POST['age']) && isset($_POST['id']))
{ 
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Error on connection: ".$conn->connect_error);
  }

  $sql = "UPDATE Animaux SET nom=\"" . $_POST['nom'] . "\", poids=" . $_POST['poids'] . ", age=" . $_POST['age'] . " WHERE idAnimal=" . $_POST['id'] . ";";
  
  $conn->query($sql);
  $conn->close();
  
  header("Location: /AppWebOCO/Pages/configuration.php");
  exit;
}?> 