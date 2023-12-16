<!DOCTYPE html>
<html>
<title>Update Club</title>
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
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Update Club</h3>
                        <?php
                        require_once('../config.inc.php');

                        // Obtener el ID del Club
                        $idClub = $_POST['idClub'];

                        // Crear la conexión a la base de datos
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Consulta para obtener los datos del Club
                        $consulta = "SELECT * FROM club WHERE idClub = $idClub";
                        $resultado = $conn->query($consulta);

                        // Verificar si se encontraron resultados
                        if ($resultado->num_rows > 0) {
                            // Obtener los datos del Club
                            $registro = $resultado->fetch_assoc();

                            // Mostrar el formulario con los datos del Club
                            echo '<form action="ModificarClub.php" method="post">';
                            echo '<div class="form-outline mb-4">';
                            echo '<input type="text" name="name" id="form3Example1q" class="form-control" value="' . $registro['name'] . '"/>';
                            echo '<label class="form-label" for="form3Example1q">name</label>';
                            echo '</div>';
                            echo '<div class="form-outline mb-4">';
                            echo '<input type="text" name="classification" id="form3Example1q" class="form-control" value="' . $registro['classification'] . '"/>';
                            echo '<label class="form-label" for="form3Example1q">classification</label>';
                            echo '</div>';
                            
                            echo "<div class='form-outline mb-4'>";
                                    echo "<label class='form-label'>employee</label>";
                                    echo "<select class='form-control' name='employee'>";
                                require_once('../config.inc.php');
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                $consulta = "SELECT * FROM employee";
                                $result = $conn->query($consulta);
                                while ($row = $result->fetch_assoc()) {
                                    $nombreCompleto = $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName']; // Concatenar nombre y apellidos
                                echo "<option value='" . $row['idEmployee'] . "'>" . $nombreCompleto . "</option>";
                                }
                                $conn->close();
                            echo '
                            </select>
                            </div>';

                            echo '<input type="hidden" name="idClub" value="' . $idClub . '"/>';
                            echo '<button type="submit" class="btn btn-success btn-lg mb-1">Actualizar</button>';
                            echo '</form>';
                        } else {
                            echo '<p>No se encontraron datos para el Club seleccionado.</p>';
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