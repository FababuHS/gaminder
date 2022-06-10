<?php

session_start();

include_once 'config.php';
if(isset($_POST['submit']))
{         
     $id = $_SESSION["id"];
     $id_match_juego = $_POST['game'];
     $rol_jugador_uno = $_POST['lol_role'];
     $rol_jugador_dos = $_POST['lol_role_you'];
     $time =  date('Y/m/d H:i:s', time());

print_r ($time);
print_r ($_POST);

     $sql = "INSERT INTO gmatch (id_jugador_uno, id_match_juego, fechamatch, estado, rol_jugador_uno, rol_jugador_dos)
     VALUES ('$id' ,'$id_match_juego', '$time', 0, '$rol_jugador_uno', '$rol_jugador_dos')";
     if (mysqli_query($link, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
     }
     mysqli_close($link);
}
?>