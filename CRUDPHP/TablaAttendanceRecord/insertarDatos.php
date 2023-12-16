<?php

$date = $_POST["date"];
$attended = $_POST["attended"];
$Student = $_POST["Student"];
$Club = $_POST["Club"];


require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO AttendanceRecord (`date`, attended, idStudent, idClub)
VALUES ('".$date."', '".$attended."', '".$Student."' , '".$Club."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaAttendanceRecord.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>