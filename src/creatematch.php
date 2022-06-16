<?php
session_start();

include_once 'config.php';

// Si no se reciben parámetros por POST finalizamos la ejecución
if(!isset($_POST)) {
   echo "No se ha recibido ningún parámetro por POST";
   exit;
}

// Recuperamos el id del jugador uno de la sesión
$id = $_SESSION["id"];

// Recuperamos los parámetros que se reciben por POST
$id_match_juego = $_POST['game'];
$rol_jugador_uno = $_POST['rol_jugador_uno'];
$rol_jugador_dos = $_POST['rol_jugador_dos'];
$time =  date('Y/m/d H:i:s', time());

// Preparamos la query
$query = "INSERT INTO gmatch (id_jugador_uno, id_match_juego, fechamatch, estado, rol_jugador_uno, rol_jugador_dos) " .
       "VALUES ('$id' ,'$id_match_juego', '$time', 0, '$rol_jugador_uno', '$rol_jugador_dos')";

// Ejecutamos la query en la BD
if (mysqli_query($link, $query)) {
   $status = "success";
   $message =  "Nuevo match añadido correctamente!";
} else {
   $status = "error";
   $message =  "Error: " . $sql . ":-" . mysqli_error($link);
}

// Cerramos la conexión con la BD
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Crear Match</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" crossorigin="anonymous">
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

    <?php if ($status == "error") : ?>
   <div class="alert alert-danger" role="alert">
      <?php echo $message; ?>
   </div>
   <?php endif; ?>

   <?php if ($status == "success") : ?>
   <div class="alert alert-success" role="alert">
	   <?php echo $message; ?>
   </div>
   <?php endif; ?>

   <footer class="pt-5 my-5 text-muted border-top">
    Gaminder &copy; 2022
  </footer>
</div>
</body>
</html>