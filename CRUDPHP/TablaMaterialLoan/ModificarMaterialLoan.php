<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idMaterialLoan = $_POST['idMaterialLoan'];
    $specialty = $_POST['specialty'];
    $article = $_POST['article'];
    $entryDate = $_POST['entryDate'];
    $exitDate = $_POST['exitDate'];
    $materialStatus = $_POST['materialStatus'];
    $Student = $_POST['Student'];
    $Employee = $_POST['Employee'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE MaterialLoan SET specialty='$specialty', article='$article', entryDate='$entryDate', exitDate='$exitDate'
    , materialStatus='$materialStatus', idStudent='$Student', idEmployee='$Employee' WHERE idMaterialLoan='$idMaterialLoan'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: TablaMaterialLoan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
