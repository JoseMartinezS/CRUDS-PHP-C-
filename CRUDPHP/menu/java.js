// Establecer la conexión a la base de datos MySQL
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'bd_tiendanaturista'
  });
  
  // Conectar a la base de datos
  connection.connect(function(err) {
    if (err) {
      console.error('Error al conectar a la base de datos: ' + err.stack);
      return;
    }
    console.log('Conexión exitosa a la base de datos');
  });
  

const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });
});

$(document).ready(function() {
    // Realizar una consulta a la base de datos para obtener el nombre de usuario
    connection.query('SELECT nombre FROM usuario', function(err, rows) {
      if (err) {
        console.error('Error al realizar la consulta: ' + err.stack);
        return;
      }
  
      // Obtener el primer nombre de usuario de los resultados de la consulta
      var username = rows[0].nombre;
  
      // Actualizar el elemento con el id "username" con el nombre del usuario
      $("#username").text(username);
    });
  });
  
  