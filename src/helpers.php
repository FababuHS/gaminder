<?php

function get_games() {
    include_once('config.php');

    $result = mysqli_query($link, 'SELECT * FROM juego');
   
    $games = array();
    while($row = mysqli_fetch_array($result)) {
        $games [] = $row;
    }

    return $games;
}

?>