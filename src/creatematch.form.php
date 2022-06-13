<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}

include_once("helpers.php");

$games = get_games_and_roles();

//echo "<pre>";
//print_r($games);
//echo "</pre>";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Buscar Match</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" crossorigin="anonymous">

  <script>
    function showRolesForJugadorUno(id_match_juego) {
      // Ocultamos todos los roles
      let roles = Array.from(document.getElementsByClassName("roles"));
      roles.forEach(element => element.style.display = "none");

      // Sólo mostramos el rol que recibimos como parámetro
      document.getElementById("roles_jugador_uno_game_" + id_match_juego).style.display = "block";
    }

    function showRolesForJugadorDos(id_match_juego) {
      //console.log(document.querySelector('input[name="rol_jugador_uno"]:checked').value);
      //console.log(document.querySelector('input[name="rol_jugador_uno"]:checked').id);

      // Habilitamos todos los campos input con los roles del jugador dos
      let childNodes = document.getElementById("roles_jugador_dos_game_" + id_match_juego).getElementsByTagName('*');
      for (var node of childNodes) {
        node.disabled = false;
      }

      // Capturamos el id del rol que ha seleccionado el jugador uno
      let rol_jugador_uno = document.querySelector('input[name="rol_jugador_uno"]:checked').id;
      let value = rol_jugador_uno.split("rol_jugador_uno_");

      // Deshabilitamos el rol seleccionado por el jugador uno
      document.getElementById('rol_jugador_dos_' + value[1]).disabled = true;
      console.log('rol_jugador_dos_' + value[1]);

      // Sólo mostramos el rol que recibimos como parámetro
      document.getElementById("roles_jugador_dos_game_" + id_match_juego).style.display = "block";
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
	    <li class="nav-item "><a href="creatematch.form.php" class="nav-link active">Crear Match</a></li>
	    <li class="nav-item "><a href="buscarmatch.php" class="nav-link">Buscar Match</a></li>	
	    <li class="nav-item"><a href="completed.php" class="nav-link" >Historial</a></li>
	    <li class="nav-item"><a href="logout.php" class="nav-link" >Logout</a></li>
    </ul>
    <br/>

    <form action="creatematch.php" method="post">
    <h2>¿A qué te apetece jugar hoy?</h2>
    <div id="game">
      Game:<br>
    
      <!-- Mostramos la lista de juegos -->
      <?php foreach ($games as $game) : ?>
        <input type="radio" onclick="showRolesForJugadorUno('<?php echo $game['id_juego'];?>')" name="game" value="<?php echo $game['id_juego'];?>">
        <label><?php echo $game['nombre_juego'];?></label></br>
      <?php endforeach; ?>

    </div>
    <br><br>

    <!-- Mostramos la lista de roles de cada juego -->
    <?php foreach ($games as $game) : ?>
      <div id="roles_jugador_uno_game_<?php echo $game['id_juego']; ?>" class="roles" display="none" style="display:none">
        <h2> ¿Qué rol quieres jugar? </h2>
        Role:<br>
        <!-- Mostramos la lista de roles de cada juego -->
        <?php foreach ($game['roles'] as $rol) : ?>
          <input type="radio" onclick="showRolesForJugadorDos('<?php echo $game['id_juego'];?>')" name="rol_jugador_uno" value="<?php echo $rol['id_rol']; ?>" id="rol_jugador_uno_<?php echo$rol['nombre_rol']; ?>">
          <label><?php echo $rol['nombre_rol']; ?></label></br>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
    <br><br>

    <!-- Mostramos la lista de roles de cada juego -->
    <?php foreach ($games as $game) : ?>
      <div id="roles_jugador_dos_game_<?php echo $game['id_juego']; ?>" class="roles" display="none" style="display:none">
        <h2>¿Y que rol quieres que juegue tu compi?</h2>
        Role:<br>
        <!-- Mostramos la lista de roles de cada juego -->
        <?php foreach ($game['roles'] as $rol) : ?>
          <input type="radio" name="rol_jugador_dos" value="<?php echo $rol['id_rol']; ?>" id="rol_jugador_dos_<?php echo$rol['nombre_rol']; ?>">
          <label><?php echo $rol['nombre_rol']; ?></label></br>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <br><br>
    <div class="mb-3">
		  <input type="submit" value="Submit" class="form-control btn btn-primary">
	  </div>    
    </form>

    <footer class="pt-5 my-5 text-muted border-top">
    Gaminder &copy; 2022
  </footer>
</div>
</body>
</html>