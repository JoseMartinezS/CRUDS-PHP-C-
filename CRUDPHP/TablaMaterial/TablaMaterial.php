<!DOCTYPE html>
<html>
<title>TableMaterial</title>
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
<h1>Table Material</h1>
<div>
<?php
    require_once('../config.inc.php');


    $conn = new mysqli($servername, $username, $password, $dbname);
    $consulta = "SELECT material.*, materialloan.article AS articulo, materialType.description AS descriptionn
    FROM material
    JOIN materialType ON material.idMaterialType = materialtype.idmaterialtype
    JOIN materialloan ON material.idmaterialloan = materialloan.idmaterialloan";

$datos = $conn->query($consulta);


    echo "<table class ='table table-striped table-dark'>";
    echo "
    <th style='display: none;'>idPaciente</th>
    <th scope=col>Item Name</th>
    <th scope=col>Quantity</th>
    <th scope=col>Item Type</th>
    <th scope=col>Specialty</th>
    <th scope=col>Description</th>
    <th style='display: none;'>estatus</th>
    <th scope=col></th>";

    while ($registro = $datos->fetch_assoc())
    {
        echo "<tr>";
        //echo "<td class='table-secondary'>".$registro["idMaterial"]."</td>";
        echo "<td class='table-secondary'>".$registro["itemName"]."</td>";
        echo "<td class='table-secondary'>".$registro["quantity"]."</td>";
        echo "<td class='table-secondary'>".$registro["itemType"]."</td>";
        echo "<td class='table-secondary'>".$registro["articulo"]."</td>";
        echo "<td class='table-secondary'>".$registro["descriptionn"]."</td>";
        //echo "<td class='table-secondary'>".$registro["estatus"]."</td>";
        echo "<td class='table-secondary'>

        <div class='button-container'>
        <form action='EliminarMaterial.php' method='post' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar esta compra?')\">
            <input type='hidden' name='idMaterial' value='".$registro["idMaterial"]."'>
            <button class='btn btn-danger' type='submit' name='eliminar_".$registro["idMaterial"]."'><i class='fas fa-trash-alt'></i> </button>        </form>
        <form action='ActualizarMaterial.php' method='post'>
            <input type='hidden' name='idMaterial' value='".$registro["idMaterial"]."'>
            <button class='btn btn-warning' type='submit' name='modificar_".$registro["idMaterial"]."'><i class='fas fa-edit'></i> </button>        </form>
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
  <form action="RegistrarMaterial.php" method="get">
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
