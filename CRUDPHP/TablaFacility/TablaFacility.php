<!DOCTYPE html>
<html>
<title>Facility</title>
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
<h1>Table Facility</h1>
<div>
<?php
    require_once('../config.inc.php');


    $conn = new mysqli($servername, $username, $password, $dbname);
    $consulta = "SELECT Facility.*, club.name AS club_name
    FROM Facility
    JOIN club ON Facility.idClub = club.idClub";

$datos = $conn->query($consulta);


    echo "<table class ='table table-striped table-dark'>";
    echo "
    <th style='display: none;'>idPaciente</th>
    <th scope=col>Facility Name</th>
    <th scope=col>Capacity</th>
    <th scope=col>Location</th>
    <th scope=col>availability</th>
    <th scope=col>Name Club</th>
    <th style='display: none;'>estatus</th>
    <th scope=col></th>";

    while ($registro = $datos->fetch_assoc())
    {
        echo "<tr>";
        //echo "<td class='table-secondary'>".$registro["idFacility"]."</td>";
        echo "<td class='table-secondary'>".$registro["facilityName"]."</td>";
        echo "<td class='table-secondary'>".$registro["capacity"]."</td>";
        echo "<td class='table-secondary'>".$registro["location"]."</td>";
        echo "<td class='table-secondary'>".$registro["Availability"]."</td>";
        echo "<td class='table-secondary'>".$registro["club_name"]."</td>";
        //echo "<td class='table-secondary'>".$registro["estatus"]."</td>";
        echo "<td class='table-secondary'>

        <div class='button-container'>
        <form action='EliminarFacility.php' method='post' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar esta compra?')\">
            <input type='hidden' name='idFacility' value='".$registro["idFacility"]."'>
            <button class='btn btn-danger' type='submit' name='eliminar_".$registro["idFacility"]."'><i class='fas fa-trash-alt'></i> </button>        </form>
        <form action='ActualizarFacility.php' method='post'>
            <input type='hidden' name='idFacility' value='".$registro["idFacility"]."'>
            <button class='btn btn-warning' type='submit' name='modificar_".$registro["idFacility"]."'><i class='fas fa-edit'></i> </button>        </form>
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
  <form action="RegistrarFacility.php" method="get">
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
