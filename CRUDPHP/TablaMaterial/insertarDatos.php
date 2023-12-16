<?php

$itemName = $_POST["itemName"];
$quantity = $_POST["quantity"];
$itemType = $_POST["itemType"];
$MaterialLoan = $_POST["MaterialLoan"];
$MaterialType = $_POST["MaterialType"];


require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Material (itemName, quantity,  `itemType`, idMaterialLoan, idMaterialType )
VALUES ('".$itemName."', '".$quantity."', '".$itemType."', '".$MaterialLoan."', '".$MaterialType."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaMaterial.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>