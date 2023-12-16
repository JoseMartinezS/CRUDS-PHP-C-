
<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $AttendanceRecordId = $_POST['AttendanceRecordId'];
    $date = $_POST['date'];
    $attended = $_POST['attended'];
    $student = $_POST['student'];
    $club = $_POST['club'];


    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE AttendanceRecord SET date='$date', attended='$attended', 
    idstudent='$student', idclub='$club'
     WHERE AttendanceRecordId='$AttendanceRecordId'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaAttendanceRecord.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
