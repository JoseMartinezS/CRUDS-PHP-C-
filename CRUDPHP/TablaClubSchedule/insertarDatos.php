<?php

$dayOfWeek = $_POST["dayOfWeek"];
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];
$employee = $_POST["employee"];
$Club = $_POST["Club"];


require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO ClubSchedule (`dayOfWeek`, startTime, endTime, idEmployee, idClub)
VALUES ('".$dayOfWeek."', '".$startTime."', '".$endTime."' , '".$employee."' , '".$Club."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaClubSchedule.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>