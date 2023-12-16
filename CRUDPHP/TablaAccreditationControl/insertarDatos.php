<?php

$credits = $_POST["credits"];
$serviceHours = $_POST["serviceHours"];
$Student = $_POST["Student"];
$Club = $_POST["Club"];


require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO AccreditationControl (credits, serviceHours, idStudent, idClub)
VALUES ('".$credits."', '".$serviceHours."', '".$Student."' , '".$Club."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaAccreditationControl.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>