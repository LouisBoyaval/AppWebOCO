<?php
$servername = "localhost";
$username = "serverWeb";
$password = "password";
$dbname = "datadistributeur";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Error on connection: ".$conn->connect_error);
  }

  $sql = "SELECT * FROM Repas;";

  $result_repas=mysqli_query($conn,$sql);
?> 