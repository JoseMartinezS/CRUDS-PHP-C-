<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idMaterial = $_POST['idMaterial'];
    $itemName = $_POST['itemName'];
    $quantity = $_POST['quantity'];
    $itemType = $_POST['itemType'];
    $MaterialLoan = $_POST['MaterialLoan'];
    $MaterialType = $_POST['MaterialType'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE Material SET itemName='$itemName', quantity='$quantity', itemType='$itemType', idMaterialLoan='$MaterialLoan', idMaterialType='$MaterialType'
     WHERE idMaterial='$idMaterial'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: TablaMaterial.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
