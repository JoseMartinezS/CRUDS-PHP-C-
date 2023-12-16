s
<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idClub = $_POST['idClub'];
    $name = $_POST['name'];
    $classification = $_POST['classification'];
    $employee = $_POST['employee'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE Club SET name='$name', classification='$classification', 
    idEmployee='$employee'
     WHERE idClub='$idClub'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaClub.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
