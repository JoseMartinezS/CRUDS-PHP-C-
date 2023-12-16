<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idMaterialType = $_POST['idMaterialType'];
    $materialTypeName = $_POST['materialTypeName'];
    $description = $_POST['description'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE MaterialType SET materialTypeName='$materialTypeName', description='$description' WHERE idMaterialType='$idMaterialType'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaMaterialType.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
