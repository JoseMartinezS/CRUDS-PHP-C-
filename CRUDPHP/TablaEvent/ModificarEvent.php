<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idEvent = $_POST['idEvent'];
    $activityToPerform = $_POST['activityToPerform'];
    $date = $_POST['date'];
    $club = $_POST['club'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE event SET activityToPerform='$activityToPerform', date='$date', 
    idClub='$club' WHERE idEvent='$idEvent'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaEvent.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
