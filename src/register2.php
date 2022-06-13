<?php
session_start();

include_once 'config.php';

// Si no se reciben parámetros por POST finalizamos la ejecución
if(!isset($_POST)) {
   echo "No se ha recibido ningún parámetro por POST";
   exit;
}

// Recuperamos los parámetros que se reciben por POST
$login = $_POST['username'];
$pass = $_POST['password'];
$nombre_jugador = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$email = $_POST['email'];
$cumple =  $_POST['cumple'];
$discord = $_POST['discord'];
$idioma = implode(",", $_POST["idioma"]);

// Preparamos la query
$query = "INSERT INTO jugador (login, pass, nombre_jugador, apellido1, apellido2, email, idioma, cumple, discord) " .
       "VALUES ('$login' , MD5('$pass'), '$nombre_jugador', '$apellido1', '$apellido2', '$email', '$idioma', '$cumple','$discord')";

// Ejecutamos la query en la BD
if (mysqli_query($link, $query)) {
   $status = "success";
   $message =  "New record has been added successfully !";
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
      <a href="login.php">Regresar a login</a>

   <footer class="pt-5 my-5 text-muted border-top">
    Gaminder &copy; 2022
  </footer>
</div>
</body>
</html>