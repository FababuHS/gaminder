<?php
// including the database connection file
include_once("config.php");

$result = mysqli_query($link, 'SELECT id_jugador_uno, rol_jugador_uno, idioma FROM gmatch, jugador WHERE id_jugador = id_jugador_uno AND rol_jugador_dos = 5 
    AND id_match_juego = 1');
print_r($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">	
</head>
<body>

<div id="table_result">
	<table width='80%' border=0 class="table">

	<tr bgcolor='#CCCCCC'>
		<td>Player</td>
		<td>Rol</td>
        <td>Idioma</td>
        <td></td>
	</tr>

	<?php
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>\n";
		echo "<td>".$row['id_jugador_uno']."</td>\n";
		echo "<td>".$row['rol_jugador_uno']."</td>\n";        
        echo "<td>".$row['idioma']."</td>\n";
        ?><td><a href="add.html" class="btn btn-primary">MATCH!</a></td>
        <?php
        echo "</tr>\n";
	}

	mysqli_close($link);
	?>
	</table>
</div>
</body>
</html>