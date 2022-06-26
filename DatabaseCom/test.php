<?php 
$servername = "localhost";
$username = "serverWeb";
$password = "password";
$dbname = "datadistributeur";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT idAnimal, nom FROM Animaux;";
$result = $conn->query($sql);

while ($row = $result -> fetch_row()) {
    echo ("<option value=\"". $row[0]. "\">". $row[1] . "</option>");
}

$conn->close();
?>