<?php
$servername = "localhost";
$username = "serverWeb";
$password = "password";
$dbname = "datadistributeur";
echo"<h1>TES2RFZT</h1>";
if(isset($_POST['nom']))
{ 
  echo"<h1>TEST</h1>";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Error on connection: ".$conn->connect_error);
  }

  $sql = "INSERT INTO Animaux (nom, tag) VALUES ('Test', 'AYUTIDUAYY829YH3');";

  $conn->query($sql);

  echo"\n";

  $conn->close();
}?> 