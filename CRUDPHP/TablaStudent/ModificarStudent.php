s
<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idStudent = $_POST['idStudent'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $specialty = $_POST['specialty'];
    $semester = $_POST['semester'];
    $registrationNumber = $_POST['registrationNumber'];
    $eligibilityRequirements = $_POST['eligibilityRequirements'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE student SET firstName='$firstName', middleName='$middleName', 
    lastName='$lastName', specialty='$specialty' , semester='$semester'  , registrationNumber='$registrationNumber'  , idScholarship='$eligibilityRequirements' 
     WHERE idStudent='$idStudent'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaStudent.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
