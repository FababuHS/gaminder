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
    echo "El match se ha creado de forma correcta.";
} else {
    echo "No se ha podido crear el match. Error: " . mysqli_error($link);
}

?>