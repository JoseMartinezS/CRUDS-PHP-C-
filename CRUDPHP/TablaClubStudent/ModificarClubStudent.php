
<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idClubStudent = $_POST['idClubStudent'];
    $student = $_POST['student'];
    $club = $_POST['club'];


    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE ClubStudent SET idstudent='$student', idclub='$club'
     WHERE idClubStudent='$idClubStudent'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaClubStudent.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
