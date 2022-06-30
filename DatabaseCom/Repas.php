<?php
$servername = "localhost";
$username = "serverWeb";
$password = "password";
$dbname = "datadistributeur";

if(isset($_POST['heure']) && isset($_POST['id']) && isset($_POST['quantite']))
{ 
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Error on connection: ".$conn->connect_error);
  }

  //$sql = "SELECT * FROM Programme;";
  $sql = "INSERT INTO Programme (idAnimal, idCroquette, heure, quantite, distribue) SELECT '" . $_POST['id']. "', idCroquette, '" . $_POST['heure'] . "', '" . $_POST['quantite'] . "', '0' FROM Croquettes WHERE actif=1;";

  $conn->query($sql);
  $conn->close();
  
  header("Location: /AppWebOCO/Pages/configuration.php");
  exit;
}

  header("Location: /AppWebOCO/Pages/configuration.php");
  exit;

?> 