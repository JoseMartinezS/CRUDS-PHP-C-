
<?php
require_once('../config.inc.php');

// Obtener los datos del formulario
$idClubSchedule = $_POST['idClubSchedule'];
$dayOfWeek = $_POST['dayOfWeek'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$employee = $_POST['employee'];
$club = $_POST['club'];

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Actualizar los datos del ClubSchedule
$sql = "UPDATE ClubSchedule SET dayOfWeek='$dayOfWeek', startTime='$startTime', endTime='$endTime', idEmployee='$employee', idClub='$club'
 WHERE idClubSchedule='$idClubSchedule'";

if ($conn->query($sql) === TRUE) {
    header("Location: TablaClubSchedule.php"); // Redirigir después de una actualización exitosa
    exit();
} else {
    echo "Error al actualizar: " . $conn->error;
}

$conn->close();
?>
