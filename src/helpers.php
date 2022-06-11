<?php

function get_games() {
    include("config.php");

    $result = mysqli_query($link, "SELECT * FROM juego");
    
    $games = array();
    while($row = mysqli_fetch_assoc($result)) {
        $games [] = $row;
    }

    return $games;
}


function get_roles($id_juego_rol) {
    include("config.php");

    $result = mysqli_query($link, "SELECT * FROM rol WHERE juego_rol = $id_juego_rol");
    
    $games = array();
    while($row = mysqli_fetch_assoc($result)) {
        $games [] = $row;
    }

    return $games;
}

function get_games_and_roles() {
    $games = get_games();

    foreach ($games as $index =>$game) {
        $games [$index]['roles'] = get_roles($game['id_juego']);
    }
    return $games;
}
?>