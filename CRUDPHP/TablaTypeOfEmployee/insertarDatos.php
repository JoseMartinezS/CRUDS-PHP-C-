<?php

$benefits = $_POST["benefits"];
$description = $_POST["description"];
$categoryemployee = $_POST["categoryemployee"];
$Employee = $_POST["Employee"];



require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO TypeOfEmployee (benefits, `description`, categoryemployee, idEmployee )
VALUES ('".$benefits."', '".$description."', '".$categoryemployee."', '".$Employee."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaTypeOfEmployee.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>