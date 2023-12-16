<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idExpenseType = $_POST['idExpenseType'];
    $expenseTypeName = $_POST['expenseTypeName'];
    $description = $_POST['description'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE ExpenseType SET expenseTypeName='$expenseTypeName', description='$description' WHERE idExpenseType='$idExpenseType'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaExpenseType.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
