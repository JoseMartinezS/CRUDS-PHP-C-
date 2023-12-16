<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idEmployee = $_POST['idEmployee'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $middleName = $_POST['middleName'];
    $specialty = $_POST['specialty'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE Employee SET firstName='$firstName', lastName='$lastName', 
    middleName='$middleName', specialty='$specialty' WHERE idEmployee='$idEmployee'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaEmployee.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
