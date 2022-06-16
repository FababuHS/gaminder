<?php
// Inicializamos la sesión
session_start();

// Comprobamos si el usuario está loggeado, si es así lo redirigimos al índice
if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}

include_once("helpers.php");

$games = get_games_and_roles();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Homepage</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" crossorigin="anonymous">

  <script>
    function showRolesForGame(id_match_juego) {
      //alert(document.querySelector('input[name="game"]:checked').value);

      // Ocultamos todos los roles
      let roles = Array.from(document.getElementsByClassName("roles"));
      roles.forEach(element => element.style.display = "none");

      // Sólo mostramos el rol que recibimos como parámetro
      document.getElementById(id_match_juego).style.display = "block";

      // Eliminamos el contenido de la tabla
      clearGmatchTable();      
    }

    function loadAndShowGmatchTable(id_match_juego, rol_jugador_dos) {
      // Cargamos los datos de la tabla
      loadGmatchTable(id_match_juego, rol_jugador_dos);
      // Mostramos la tabla
      document.getElementById("table_result").style.display = "block";      
    }

    function loadGmatchTable(id_match_juego, rol_jugador) {
      // Creamos la URL de la API con los parámetros de entrada
      let url = "api/index.php?action=completed&id_match_juego=" + id_match_juego + "&rol_jugador=" + rol_jugador;

      // Hacmos una consulta a la API
      fetch(url)
        .then(response => response.json())
        .then(data => {
          // Mostramos en la consola los datos de la respuesta
          console.log(data);

          // Eliminamos las filas previas que existan en la tabla
          clearGmatchTable();

          // Creamos las filas de la tabla a partir de los datos del JSON
          let header_row = document.getElementById('header_row');
          data.forEach(element => header_row.insertAdjacentHTML('afterend',
            `<tr>
               <td>${element.jugador1_discord}</td>
               <td>${element.jugador1_nombre_rol}</td>
               <td>${element.jugador1_idioma}</td>
               <td>${element.jugador2_discord}</td>
               <td>${element.jugador2_nombre_rol}</td>
               <td>${element.jugador2_idioma}</td>
              </tr>`));

          // Referencia:
          // - https://developer.mozilla.org/es/docs/Web/API/Element/insertAdjacentHTML
        })
        .catch(error => {
          console.log("Error: " + error.message);
        })
    }

    function clearGmatchTable() {
      // Eliminamos las filas previas que existan en la tabla
      let table = document.getElementById("table");
      let numRows = table.rows.length;
      while (table.rows.length > 1) {
        table.deleteRow(1);
      }
    }
  </script>
</head>

<body>
  <div class="col-lg-8 mx-auto py-md-5">
    <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
        <a href="/" class="text-dark text-decoration-none">
            <img src="https://i.imgur.com/JMcQzYk.jpg" width="40" height="32" class="me-2">
                <span class="fs-4">Gaminder</span>
		</a>
    </header>      
    
    <ul class="nav nav-tabs">
	    <li class="nav-item"><a href="index.php" class="nav-link" >Home</a></li>
	    <li class="nav-item "><a href="creatematch.form.php" class="nav-link">Crear Match</a></li>
	    <li class="nav-item "><a href="buscarmatch.php" class="nav-link">Buscar Match</a></li>	
	    <li class="nav-item"><a href="completed.php" class="nav-link active" >Historial</a></li>
	    <li class="nav-item"><a href="logout.php" class="nav-link" >Logout</a></li>
    </ul>
    <br/>

    <h2>Histórico de matches en el juego</h2>
    <div id="game">
    Game:<br>
    
      <!-- Mostramos la lista de juegos -->
      <?php foreach ($games as $game) : ?>
        <input type="radio" onclick="showRolesForGame('roles_game_<?php echo $game['id_juego'];?>')" name="game">
        <label><?php echo $game['nombre_juego'];?></label></br>
      <?php endforeach; ?>

    </div>
    <br><br>

    <!-- Mostramos la lista de roles de cada juego -->
    <?php foreach ($games as $game) : ?>
      <div id="roles_game_<?php echo $game['id_juego']; ?>" class="roles" display="none" style="display:none">
        <h2> ¿Con qué rol jugaste? </h2>
        Role:<br>
        <!-- Mostramos la lista de roles de cada juego -->
        <?php foreach ($game['roles'] as $rol) : ?>
          <input type="radio" onclick="loadAndShowGmatchTable(<?php echo $game['id_juego'];?>,<?php echo $rol['id_rol'];?>)" name="role">
          <label><?php echo $rol['nombre_rol']; ?></label></br>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <br><br>
    <div id="table_result" display="none" style="display:none">
      <table id="table" class="table table-striped align-middle">
        <thead>
        <tr bgcolor="#CCCCCC" id="header_row">
          <th>Player 1. Discord</th>
          <th>Rol</th>
          <th>Idioma</th>
          <th>Player 2. Discord</th>
          <th>Rol</th>
          <th>Idioma</th>
        </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <footer class="pt-5 my-5 text-muted border-top">
    Gaminder &copy; 2022
  </footer>
</div>
</body>
</html>