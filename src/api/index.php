<?php
session_start();

$action = $_GET['action'];

switch($action) {
    case 'pending':
        getPendingMatches();
        break;

    case 'completed':
        getCompletedMatches();
        break;
}

/*----------------------------------------------------------------------------*/

// Función que devuelve la lista de matches pendientes a partir 
// del id de un juego y del rol del jugador dos
function getPendingMatches() {
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
    $query = "SELECT gmatch.id_match, gmatch.id_jugador_uno, gmatch.rol_jugador_uno, rol.nombre_rol, jugador.discord, jugador.idioma " .
            "FROM gmatch INNER JOIN jugador " .
            "ON gmatch.id_jugador_uno = jugador.id_jugador " .
            "INNER JOIN rol " .
            "ON gmatch.rol_jugador_uno = rol.id_rol " .
            "WHERE gmatch.rol_jugador_dos = $rol_jugador_dos AND " .
            "gmatch.id_match_juego = $id_match_juego " .
            "AND gmatch.id_jugador_dos IS NULL " .
            "AND gmatch.estado = 0";

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
}

// Función que devuelve la lista de matches completados de un jugador
function getCompletedMatches() {
    include("../config.php");

    // Recuperamos el id del jugador de la sesión
    $id_jugador = $_SESSION['id'];

    // Recibimos los parámetros por GET
    $id_match_juego = $_GET["id_match_juego"];
    $rol_jugador = $_GET["rol_jugador"];

    // Si los parámetros están vacíos devolvemos un mensaje de error
    if (empty($id_match_juego) || empty($rol_jugador)) {
        echo "Los parámetros id_match_juego y rol_jugador no pueden estar vacíos";
        exit;
    }

    // Creamos la query con los parámetros de entrada
    $query = "SELECT * FROM completed_matches " .
            "WHERE id_match_juego = $id_match_juego " .
            "AND ((id_jugador_uno = $id_jugador AND rol_jugador_uno = $rol_jugador) OR " .
            "     (id_jugador_dos = $id_jugador AND rol_jugador_dos = $rol_jugador))";

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
}
?>