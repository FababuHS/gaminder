<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}

include("config.php");

// Recibimos el id del juego por GET
$id_match = $_GET['id_match'];

// Recuperamos el id del usuario de la SESSION
$id_jugador_dos = $_SESSION["id"];

// Si los parámetros están vacíos devolvemos un mensaje de error
if (empty($id_match) || empty($id_jugador_dos)) {
    echo "Los parámetros id_match y id_jugador_dos no pueden estar vacíos";
    exit;
}

// Creamos la query con los parámetros de entrada
$query = "UPDATE gmatch SET id_jugador_dos = $id_jugador_dos, estado = 1 " .
         "WHERE id_match = $id_match";

// Ejecutamos la query en la BD
mysqli_query($link, $query);

// Comprobamos si la operación de UPDATE se ha realizado de forma correcta
if (mysqli_affected_rows($link) > 0) {
    $mensaje = "Se ha encontrado un match. Visita tu historial.";
    mail('fabluck9@gmail.com', 'Aviso de Match', $mensaje);
    $status = "success";
    $message = "El match se ha creado de forma correcta.";
} else {
    $status = "error";
    $message = "No se ha podido crear el match. Error: " . mysqli_error($link);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Buscar Match</title>
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
	    <li class="nav-item "><a href="creatematch.form.php" class="nav-link">Crear Match</a></li>
	    <li class="nav-item "><a href="buscarmatch.php" class="nav-link active">Buscar Match</a></li>
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