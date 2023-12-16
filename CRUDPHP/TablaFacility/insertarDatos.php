<?php

$facilityName = $_POST["facilityName"];
$capacity = $_POST["capacity"];
$location = $_POST["location"];
$Availability = $_POST["Availability"];
$Club = $_POST["Club"];


require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Facility (facilityName, capacity,  `location`, `Availability`, idClub )
VALUES ('".$facilityName."', '".$capacity."', '".$location."', '".$Availability."', '".$Club."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaFacility.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>