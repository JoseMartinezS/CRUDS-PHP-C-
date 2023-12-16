<?php

$expenseDate = $_POST["expenseDate"];
$amount = $_POST["amount"];
$expenseDescription = $_POST["expenseDescription"];
$ExpenseType = $_POST["ExpenseType"];


require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Expenses (expenseDate, amount,  expenseDescription, idExpenseType )
VALUES ('".$expenseDate."', '".$amount."', '".$expenseDescription."', '".$ExpenseType."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaExpenses.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>