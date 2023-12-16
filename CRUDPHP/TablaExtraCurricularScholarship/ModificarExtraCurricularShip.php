<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idScholarship = $_POST['idScholarship'];
    $scholarshipAmount = $_POST['scholarshipAmount'];
    $eligibilityRequirements = $_POST['eligibilityRequirements'];
    $scholarshipDuration = $_POST['scholarshipDuration'];
    $description = $_POST['description'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE ExtraCurricularScholarship SET scholarshipAmount='$scholarshipAmount', eligibilityRequirements='$eligibilityRequirements', 
    scholarshipDuration='$scholarshipDuration', `description`='$description' WHERE idScholarship='$idScholarship'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaExtraCurricularScholarship.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
