<?php

$firstName = $_POST["firstName"];
$middleName = $_POST["middleName"];
$lastName = $_POST["lastName"];
$specialty = $_POST["specialty"];
$semester = $_POST["semester"];
$registrationNumber = $_POST["registrationNumber"];
$eligibilityRequirements = $_POST["eligibilityRequirements"];


require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO student (firstName, middleName, lastName, specialty, semester, registrationNumber, idScholarship )
VALUES ('".$firstName."', '".$middleName."', '".$lastName."' , '".$specialty."' , '".$semester."' , '".$registrationNumber."' , '".$eligibilityRequirements."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaStudent.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>