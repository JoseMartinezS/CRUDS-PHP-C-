<!DOCTYPE html>
<html>
<title>materiallaon</title>
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
<h1>Table MaterialLaon</h1>
<div>
<?php
    require_once('../config.inc.php');


    $conn = new mysqli($servername, $username, $password, $dbname);
    $consulta = "SELECT materialloan.*, employee.firstName AS NombreEmpleado, employee.middleName AS nombre2, employee.lastName AS apellidop,
    student.firstName AS nombre, student.middleName AS nombre2alumno, student.lastName AS apellidopalumno
    FROM materialloan
    JOIN student ON materialloan.idStudent = student.idStudent
    JOIN employee ON materialloan.idEmployee = employee.idEmployee";


$datos = $conn->query($consulta);


    echo "<table class ='table table-striped table-dark'>";
    echo "
    <th style='display: none;'>idPaciente</th>
    <th scope=col>Specialty</th>
    <th scope=col>Article</th>
    <th scope=col>Entry Date</th>
    <th scope=col>Exit Date</th>
    <th scope=col>Material Status</th>
    <th scope=col>Student</th>
    <th scope=col>Employee</th>
    <th style='display: none;'>estatus</th>
    <th scope=col></th>";

    while ($registro = $datos->fetch_assoc())
    {
        echo "<tr>";
        //echo "<td class='table-secondary'>".$registro["idEmployee"]."</td>";
        echo "<td class='table-secondary'>".$registro["specialty"]."</td>";
        echo "<td class='table-secondary'>".$registro["article"]."</td>";
        echo "<td class='table-secondary'>".$registro["entryDate"]."</td>";
        echo "<td class='table-secondary'>".$registro["exitDate"]."</td>";
        echo "<td class='table-secondary'>".$registro["materialStatus"]."</td>";
        echo "<td class='table-secondary'>".$registro["nombre"]." ".$registro["nombre2alumno"]." ".$registro["apellidopalumno"]."</td>";
        echo "<td class='table-secondary'>".$registro["NombreEmpleado"]." ".$registro["nombre2"]." ".$registro["apellidop"]."</td>";
        //echo "<td class='table-secondary'>".$registro["estatus"]."</td>";
        echo "<td class='table-secondary'>

        <div class='button-container'>
        <form action='EliminarMaterialLoan.php' method='post' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar esta compra?')\">
            <input type='hidden' name='idMaterialLoan' value='".$registro["idMaterialLoan"]."'>
            <button class='btn btn-danger' type='submit' name='eliminar_".$registro["idMaterialLoan"]."'><i class='fas fa-trash-alt'></i> </button>        </form>
        <form action='ActualizarMaterialLoan.php' method='post'>
            <input type='hidden' name='idMaterialLoan' value='".$registro["idMaterialLoan"]."'>
            <button class='btn btn-warning' type='submit' name='modificar_".$registro["idMaterialLoan"]."'><i class='fas fa-edit'></i> </button>        </form>
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
  <form action="RegistrarMaterialLoan.php" method="get">
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