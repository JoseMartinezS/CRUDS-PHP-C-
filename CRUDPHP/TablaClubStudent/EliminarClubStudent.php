<?php
$idClubStudent = $_POST["idClubStudent"];

require_once('../config.inc.php');

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Verificar conexión
if (!$conn) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Deshabilitar la verificación de claves foráneas
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

// Consulta para eliminar un registro de la tabla "idClubStudent"
$sql = "DELETE FROM ClubStudent WHERE idClubStudent = '" . $idClubStudent . "'";

if (mysqli_query($conn, $sql)) {
  $conn->close();
  header("location: TablaClubStudent.php");
} else {
  echo "Error al eliminar ClubStudent: " . mysqli_error($conn);
}

// Habilitar la verificación de claves foráneas
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

mysqli_close($conn);
?>