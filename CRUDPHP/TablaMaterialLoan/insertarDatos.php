<?php

$specialty = $_POST["specialty"];
$article = $_POST["article"];
$entryDate = $_POST["entryDate"];
$exitDate = $_POST["exitDate"];
$materialStatus = $_POST["materialStatus"];
$Student = $_POST["Student"];
$Employee = $_POST["Employee"];


require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO MaterialLoan (specialty, article,  `entryDate`, `exitDate`, materialStatus, idStudent, idEmployee )
VALUES ('".$specialty."', '".$article."', '".$entryDate."', '".$exitDate."', '".$materialStatus."', '".$Student."', '".$Employee."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaMaterialLoan.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>