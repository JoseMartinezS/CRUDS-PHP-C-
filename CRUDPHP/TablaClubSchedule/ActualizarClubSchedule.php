<!DOCTYPE html>
<html>
<title>Update ClubSchedule</title>
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
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Update ClubSchedule</h3>
                        <?php
                        require_once('../config.inc.php');

                        // Obtener el ID del ClubSchedule
                        $idClubSchedule = $_POST['idClubSchedule'];

                        // Crear la conexión a la base de datos
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Consulta para obtener los datos del ClubSchedule
                        $consulta = "SELECT * FROM ClubSchedule WHERE idClubSchedule = $idClubSchedule ";
                        $resultado = $conn->query($consulta);

                        // Verificar si se encontraron resultados
                        if ($resultado->num_rows > 0) {
                            // Obtener los datos del ClubSchedule
                            $registro = $resultado->fetch_assoc();

                            // Mostrar el formulario con los datos del ClubSchedule
                            echo '<form action="ModificarClubSchedule.php" method="post">';
                            echo '<div class="form-outline mb-4">';
                            echo '<input type="text" name="dayOfWeek" id="form3Example1q" class="form-control" value="' . $registro['dayOfWeek'] . '"/>';
                            echo '<label class="form-label" for="form3Example1q">dayOfWeek</label>';
                            echo '</div>';

                            echo '<div class="form-outline mb-4">';
                            echo '<input type="text" name="startTime" id="form3Example1q" class="form-control" value="' . $registro['startTime'] . '"/>';
                            echo '<label class="form-label" for="form3Example1q">startTime</label>';
                            echo '</div>';

                            echo '<div class="form-outline mb-4">';
                            echo '<input type="text" name="endTime" id="form3Example1q" class="form-control" value="' . $registro['endTime'] . '"/>';
                            echo '<label class="form-label" for="form3Example1q">endTime</label>';
                            echo '</div>';

                                echo "<div class='form-outline mb-4'>";
                                    echo "<label class='form-label'>club</label>";
                                    echo "<select class='form-control' name='club'>";
                                require_once('../config.inc.php');
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                $consulta = "SELECT * FROM club";
                                $result = $conn->query($consulta);
                                while ($row = $result->fetch_assoc()) {
                                $nombreCompleto = $row['name']; // Concatenar nombre y apellidos
                                echo "<option value='" . $row['idClub'] . "'>" . $nombreCompleto . "</option>";
                                }
                                $conn->close();
                            echo '
                            </select>
                            </div>';

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

                            echo '<input type="hidden" name="idClubSchedule" value="' . $idClubSchedule . '"/>';
                            echo '<button type="submit" class="btn btn-success btn-lg mb-1">Actualizar</button>';
                            echo '</form>';
                        } else {
                            echo '<p>No se encontraron datos para el ClubSchedule seleccionado.</p>';
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