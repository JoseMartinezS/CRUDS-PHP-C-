<!DOCTYPE html>
<html>
<title>Update Material</title>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>
</head>
<body>
<section class="h-100 h-custom" style="background-color: #8fc4b7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Update Material</h3>
                        <?php
                        require_once('../config.inc.php');

                        // Obtener el ID del Material
                        $idMaterial = $_POST['idMaterial'];

                        // Crear la conexión a la base de datos
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Consulta para obtener los datos del Material
                        $consulta = "SELECT * FROM Material WHERE idMaterial = $idMaterial";
                        $resultado = $conn->query($consulta);

                        // Verificar si se encontraron resultados
                        if ($resultado->num_rows > 0) {
                            // Obtener los datos del Material
                            $registro = $resultado->fetch_assoc();

                            // Mostrar el formulario con los datos del Material
                            echo '<form action="ModificarMaterial.php" method="post">';
                            echo '<div class="form-outline mb-4">';
                            echo '<input type="text" name="itemName" id="form3Example1q" class="form-control" value="' . $registro['itemName'] . '"/>';
                            echo '<label class="form-label" for="form3Example1q">itemName</label>';
                            echo '</div>';

                            echo '<div class="form-outline mb-4">';
                            echo '<input type="text" name="quantity" id="form3Example1q" class="form-control" value="' . $registro['quantity'] . '"/>';
                            echo '<label class="form-label" for="form3Example1q">quantity</label>';
                            echo '</div>';

                            echo '<div class="form-outline mb-4">';
                            echo '<input type="text" name="itemType" id="form3Example1q" class="form-control" value="' . $registro['itemType'] . '"/>';
                            echo '<label class="form-label" for="form3Example1q">itemType</label>';
                            echo '</div>';

                            
                            echo "<div class='form-outline mb-4'>";
                                    echo "<label class='form-label'>MaterialLoan</label>";
                                    echo "<select class='form-control' name='MaterialLoan'>";
                                require_once('../config.inc.php');
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                $consulta = "SELECT * FROM MaterialLoan";
                                $result = $conn->query($consulta);
                                while ($row = $result->fetch_assoc()) {
                                    $nombreCompleto = $row['specialty']; // Concatenar nombre y apellidos
                                echo "<option value='" . $row['idMaterialLoan'] . "'>" . $nombreCompleto . "</option>";
                                }
                                $conn->close();
                            echo '
                            </select>
                            </div>';

                            echo "<div class='form-outline mb-4'>";
                                    echo "<label class='form-label'>MaterialType</label>";
                                    echo "<select class='form-control' name='MaterialType'>";
                                require_once('../config.inc.php');
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                $consulta = "SELECT * FROM MaterialType";
                                $result = $conn->query($consulta);
                                while ($row = $result->fetch_assoc()) {
                                    $nombreCompleto = $row['description']; // Concatenar nombre y apellidos
                                echo "<option value='" . $row['idMaterialType'] . "'>" . $nombreCompleto . "</option>";
                                }
                                $conn->close();
                            echo '
                            </select>
                            </div>';

                            echo '<input type="hidden" name="idMaterial" value="' . $idMaterial . '"/>';
                            echo '<button type="submit" class="btn btn-success btn-lg mb-1">Actualizar</button>';
                            echo '</form>';
                        } else {
                            echo '<p>No se encontraron datos para el Material seleccionado.</p>';
                        }

                        // Cerrar la conexión a la base de datos
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>