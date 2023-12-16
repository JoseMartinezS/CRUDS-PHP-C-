<!DOCTYPE html>
<html>
<title>Register Expenses</title>
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
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Register Expenses</h3>

            <form action="InsertarDatos.php" method="post">

              <div class="form-outline mb-4">
                <input type="text" name="expenseDate" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">expenseDate</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="amount" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">amount</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="expenseDescription" id="form3Example1q" class="form-control" />
                <label class="form-label" for="form3Example1q">expenseDescription</label>
              </div>


              <div class="form-outline mb-4">
                  <label class="form-label">ExpenseType</label>
                  <select class="form-control" name="ExpenseType">
                      <?php
                      require_once('../config.inc.php');
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      $consulta = "SELECT * FROM ExpenseType";
                      $result = $conn->query($consulta);
                      while ($row = $result->fetch_assoc()) {
                          $nombreCompleto = $row['description']; // Concatenar nombre y apellidos
                          echo "<option value='" . $row['idExpenseType'] . "'>" . $nombreCompleto . "</option>";
                      }
                      $conn->close();
                      ?>
                  </select>
              </div>



              <button type="submit" class="btn btn-success btn-lg mb-1">Register</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>