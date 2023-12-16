<?php

$name = $_POST["name"];
$classification = $_POST["classification"];
$employee = $_POST["employee"];


require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Club (name, classification,  idEmployee )
VALUES ('".$name."', '".$classification."', '".$employee."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaClub.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>