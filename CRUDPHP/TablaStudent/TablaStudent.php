<!DOCTYPE html>
<html>
<title>Student</title>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="estilo.css" rel="stylesheet">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>

</head>
<style>

.button-container {
    display: flex;
    gap: 5px;
}

.button-containerr {
    display: flex;
    justify-content: center;
    gap: 15px; /* Espacio entre los botones */
  }

.export-button {
        margin-top: 100px;
    }
</style>
<body>
<h1>Table Student</h1>
<div>
<?php
    require_once('../config.inc.php');


    $conn = new mysqli($servername, $username, $password, $dbname);
    $consulta = "SELECT student.*, extracurricularscholarship.eligibilityRequirements AS eligibilityRequirements
    FROM Student
    JOIN ExtraCurricularScholarship ON student.idScholarship = extracurricularscholarship.idScholarship";

$datos = $conn->query($consulta);


    echo "<table class ='table table-striped table-dark'>";
    echo "
    <th style='display: none;'>idStudent</th>
    <th scope=col>FirstName</th>
    <th scope=col>MiddleName</th>
    <th scope=col>LastName</th>
    <th scope=col>Speciality</th>
    <th scope=col>Semester</th>
    <th scope=col>registrationNumber </th>
    <th scope=col> scholarship obtained </th>
    <th style='display: none;'>estatus</th>
    <th scope=col></th>";

    while ($registro = $datos->fetch_assoc())
    {
        echo "<tr>";
        //echo "<td class='table-secondary'>".$registro["idStudent"]."</td>";
        echo "<td class='table-secondary'>".$registro["firstName"]."</td>";
        echo "<td class='table-secondary'>".$registro["middleName"]."</td>";
        echo "<td class='table-secondary'>".$registro["lastName"]."</td>";
        echo "<td class='table-secondary'>".$registro["specialty"]."</td>";
        echo "<td class='table-secondary'>".$registro["semester"]."</td>";
        echo "<td class='table-secondary'>".$registro["registrationNumber"]."</td>";
        echo "<td class='table-secondary'>".$registro["eligibilityRequirements"]."</td>";
        //echo "<td class='table-secondary'>".$registro["estatus"]."</td>";
        echo "<td class='table-secondary'>

        <div class='button-container'>
        <form action='EliminarStudent.php' method='post' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar esta compra?')\">
            <input type='hidden' name='idStudent' value='".$registro["idStudent"]."'>
            <button class='btn btn-danger' type='submit' name='eliminar_".$registro["idStudent"]."'><i class='fas fa-trash-alt'></i> </button>        </form>
        <form action='ActualizarStudent.php' method='post'>
            <input type='hidden' name='idStudent' value='".$registro["idStudent"]."'>
            <button class='btn btn-warning' type='submit' name='modificar_".$registro["idStudent"]."'><i class='fas fa-edit'></i> </button>        </form>
        </div>

              </td>";
        echo "<td class='table-secondary'></td>";
        echo "<tr/>";
        echo "</div>";
    }

echo "</table>";
$conn->close();
?>

<div class="button-containerr">
  <form action="RegisterStudent.php" method="get">
    <input class="btn btn-primary" type="submit" value="Insertar">
  </form>
  <form action="../menu/menu.html" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value="Regresar al menú">
  </form>
<!--
<form action="pdf.php" method="post" class="export-button">
  <input class="btn btn-danger" type="submit" value="Exportar PDF">
</form>

<form action="excel.php" method="post" class="export-button">
  <input class="btn btn-success" type="submit" value="Exportar Excel">
</form>

<form action="xml.php" method="post" class="export-button">
  <input class="btn btn-warning" type="submit" value="Exportar XML">
</form>

<form action="json.php" method="post" class="export-button">
  <input class="btn btn-info" type="submit" value="Exportar JSON">
</form>
-->
</div>
</body>
</html>
