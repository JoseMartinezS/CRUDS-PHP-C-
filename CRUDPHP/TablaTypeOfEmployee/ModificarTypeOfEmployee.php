<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idTypeOfEmployee = $_POST['idTypeOfEmployee'];
    $benefits = $_POST['benefits'];
    $description = $_POST['description'];
    $categoryemployee = $_POST['categoryemployee'];
    $Employee = $_POST['Employee'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE TypeOfEmployee SET benefits='$benefits', description='$description', categoryemployee='$categoryemployee', idEmployee='$Employee' 
    WHERE idTypeOfEmployee='$idTypeOfEmployee'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaTypeOfEmployee.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
