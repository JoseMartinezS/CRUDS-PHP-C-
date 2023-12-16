<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idFacility = $_POST['idFacility'];
    $facilityName = $_POST['facilityName'];
    $capacity = $_POST['capacity'];
    $location = $_POST['location'];
    $Availability = $_POST['Availability'];
    $Club = $_POST['Club'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE Facility SET facilityName='$facilityName', capacity='$capacity', location='$location', Availability='$Availability'
    , idClub='$Club' WHERE idFacility='$idFacility'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaFacility.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
