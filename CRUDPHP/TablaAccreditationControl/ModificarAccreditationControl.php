
<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idAccreditation = $_POST['idAccreditation'];
    $credits = $_POST['credits'];
    $serviceHours = $_POST['serviceHours'];
    $student = $_POST['student'];
    $club = $_POST['club'];


    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE AccreditationControl SET credits='$credits', serviceHours='$serviceHours', 
    idstudent='$student', idclub='$club'
     WHERE idAccreditation='$idAccreditation'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaAccreditationControl.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
