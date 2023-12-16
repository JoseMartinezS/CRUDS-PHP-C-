s
<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idExpenses = $_POST['idExpenses'];
    $expenseDate = $_POST['expenseDate'];
    $amount = $_POST['amount'];
    $expenseDescription = $_POST['expenseDescription'];
    $ExpenseType = $_POST['ExpenseType'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE Expenses SET expenseDate='$expenseDate', amount='$amount', expenseDescription='$expenseDescription', idExpenseType='$ExpenseType'
     WHERE idExpenses='$idExpenses'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaExpenses.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
