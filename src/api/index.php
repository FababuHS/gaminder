<?php
include("../config.php");

// Recibimos los parámetros por GET
$id_match_juego = $_GET["id_match_juego"];
$rol_jugador_dos = $_GET["rol_jugador_dos"];

// Si los parámetros están vacíos devolvemos un mensaje de error
if (empty($id_match_juego) || empty($rol_jugador_dos)) {
    echo "Los parámetros id_match_juego y rol_jugador_dos no pueden estar vacíos";
    exit;
}

// Creamos la query con los parámetros de entrada
$query = "SELECT id_jugador_uno, rol_jugador_uno, idioma " .
         "FROM gmatch INNER JOIN jugador " .
         "ON gmatch.id_jugador_uno = jugador.id_jugador " .
         "WHERE gmatch.rol_jugador_dos = $rol_jugador_dos AND " .
         "gmatch.id_match_juego = $id_match_juego";

// Ejecutamos la query en la BD
$result = mysqli_query($link, $query);

// Si no hay ningún error creamos un array con el resultado de la query
$response = array();
while($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}

// Devolvemos un JSON con la respuesta
$json = json_encode($response);
echo $json;

?>