<!DOCTYPE html>
<html>
<title>Tabla extracurricularscholarship</title>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="estilo.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../diseñoTabla.css" rel="stylesheet">
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
<h1>Table Extracurricularscholarship</h1>
<div>
<?php
    require_once('../config.inc.php');

    $conn = new mysqli($servername, $username, $password, $dbname);
    $consulta="select * from extracurricularscholarship";

    $datos = $conn->query($consulta);

    echo "<table class='table table-striped table-dark'>";
    echo 
    "
    <th scope='col'>scholarshipAmount</th>
    <th scope='col'>eligibilityRequirements</th>
    <th scope='col'>scholarshipDuration</th>
    <th scope='col'>description</th>
    <th scope='col'>
    </th>";

    while ($registro = $datos->fetch_assoc())
    {
        echo "<tr>";
        echo "<td class='table-secondary'>".$registro["scholarshipAmount"]."</td>";
        echo "<td class='table-secondary'>".$registro["eligibilityRequirements"]."</td>";
        echo "<td class='table-secondary'>".$registro["scholarshipDuration"]."</td>";
        echo "<td class='table-secondary'>".$registro["description"]."</td>";
        echo "<td class='table-secondary'>

        <div class='button-container'>
        <form action='EliminarExtraCurricularShip.php' method='post' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar esta compra?')\">
            <input type='hidden' name='idScholarship' value='".$registro["idScholarship"]."'>
            <button class='btn btn-danger' type='submit' name='eliminar_".$registro["idScholarship"]."'><i class='fas fa-trash-alt'></i> </button>        </form>
        <form action='ActualizarExtraCurricularShip.php' method='post'>
            <input type='hidden' name='idScholarship' value='".$registro["idScholarship"]."'>
            <button class='btn btn-warning' type='submit' name='modificar_".$registro["idScholarship"]."'><i class='fas fa-edit'></i> </button>        </form>
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
  <form action="RegisterExtraCurricularShip.php" method="get">
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