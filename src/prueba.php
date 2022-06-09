<?php
// including the database connection file
include_once("config.php");
include_once("helpers.php");
$result = mysqli_query($link, 'SELECT id_jugador_uno, rol_jugador_uno, idioma FROM gmatch, jugador WHERE id_jugador = id_jugador_uno AND rol_jugador_dos = 5 
    AND id_match_juego = 1');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">	
</head>
<script>
        function myFunction() {
          document.getElementById("lol_role").style.display = "block";
          document.getElementById("ow_role").style.display = "none";
          document.getElementById("val_role").style.display = "none";
          document.getElementById("lol_role_you").style.display = "none";
          document.getElementById("lol_top_div").style.display = "none";
          document.getElementById("lol_jgl_div").style.display = "none";
          document.getElementById("lol_mid_div").style.display = "none";
          document.getElementById("lol_bot_div").style.display = "none";
          document.getElementById("lol_supp_div").style.display = "none";
        }  
        function anotherFunction() {
          document.getElementById("lol_role").style.display = "none";
          document.getElementById("ow_role").style.display = "block";  
          document.getElementById("val_role").style.display = "none";    
          document.getElementById("lol_role_you").style.display = "none";  
          document.getElementById("lol_top_div").style.display = "none";
          document.getElementById("lol_jgl_div").style.display = "none";
          document.getElementById("lol_mid_div").style.display = "none";
          document.getElementById("lol_bot_div").style.display = "none";
          document.getElementById("lol_supp_div").style.display = "none";  
        }
        function andAnotherOne() {
          document.getElementById("lol_role").style.display = "none";
          document.getElementById("ow_role").style.display = "none";  
          document.getElementById("val_role").style.display = "block";   
          document.getElementById("lol_role_you").style.display = "none"; 
          document.getElementById("lol_top_div").style.display = "none";
          document.getElementById("lol_jgl_div").style.display = "none";
          document.getElementById("lol_mid_div").style.display = "none";
          document.getElementById("lol_bot_div").style.display = "none";
          document.getElementById("lol_supp_div").style.display = "none";
        }
        function tablaLolTop() {
          document.getElementById("table_result").style.display = "block";
          <?php
          $result = mysqli_query($link, "SELECT id_jugador_uno, rol_jugador_uno, idioma FROM gmatch, jugador WHERE id_jugador = id_jugador_uno AND rol_jugador_dos = 1 
            AND id_juego = 1");
          ?>
        }
        function tablaLolJungle() {
          <?php
          $result = mysqli_query($link, "SELECT id_jugador_uno, rol_jugador_uno, idioma FROM gmatch, jugador WHERE id_jugador = id_jugador_uno AND rol_jugador_dos = 2 
            AND id_juego = 1");
          ?>
        }
        function tablaLolMid() {
          <?php
          $result = mysqli_query($link, "SELECT id_jugador_uno, rol_jugador_uno, idioma FROM gmatch, jugador WHERE id_jugador = id_jugador_uno AND rol_jugador_dos = 3 
            AND id_juego = 1");
          ?>
        }
        function tablaLolBot() {
          <?php
          $result = mysqli_query($link, "SELECT id_jugador_uno, rol_jugador_uno, idioma FROM gmatch, jugador WHERE id_jugador = id_jugador_uno AND rol_jugador_dos = 4 
            AND id_juego = 1");
          
          ?>
        }
        function tablaLolSupp() {
          document.getElementById("table_result").style.display = "block";  
          
          
        }
</script>

<body>
<div class = "container">
	<div class="jumbotron">
      <h1 class="display-4">Simple LAMP web app</h1>
      <p class="lead">Demo app</p>
    </div>	
	<h2>¿A que te apetece jugar hoy?</h2>
<div id="game">
  Game:<br>  
  <input type="radio" id="lol" onclick="myFunction()" name="game" value="Lol">
  <label for="lol">League of Legends</label></br>
  <input type="radio" id="ow" onclick="anotherFunction()" name="game" value="Ow">
  <label for="lol">Overwatch</label></br>
  <input type="radio" id="val" onclick="andAnotherOne()" name="game" value="Val">
  <label for="lol">Valorant</label></br>  
</div>
<br><br><br><br>
<div id="lol_role" display="none" style="display:none">
  <h2> ¿Que rol quieres jugar? </h2>  
  Role:<br>
  <input type="radio" id="lol_top" onclick="tablaLolTop()" name="lol_role" value="Top">
  <label for="lol">Top</label></br>
  <input type="radio" id="lol_jungle" name="lol_role" value="Jungle">
  <label for="lol">Jungle</label></br>
  <input type="radio" id="lol_mid" name="lol_role" value="Mid">
  <label for="lol">Mid</label></br>
  <input type="radio" id="lol_bot" name="lol_role" value="Bot">
  <label for="lol">Bot</label></br>
  <input type="radio" id="lol_support" onclick="tablaLolSupp();get_matches_lol();" name="lol_role" value="Support">
  <label for="lol">Support</label></br>
</div>
<br><br><br><br>
<div id="ow_role" display="none" style="display:none">
  <h2> ¿Que rol quieres jugar? </h2>
  Role:<br>
  <input type="radio" id="ow_dps" name="ow_role" value="Dps">
  <label for="ow">Damage Dealer</label></br>
  <input type="radio" id="ow_tank" name="ow_role" value="Tank">
  <label for="ow">Tank</label></br>
  <input type="radio" id="ow_support" name="ow_role" value="Support">
  <label for="ow">Support</label></br>  
</div>
<div id="val_role" display="none" style="display:none">
  <h2> ¿Que rol quieres jugar? </h2>
  Role:<br>
  <input type="radio" id="val_duel" name="val_role" value="Duelist">
  <label for="val">Duelist</label></br>
  <input type="radio" id="val_init" name="val_role" value="Initiator">
  <label for="val">Initiator</label></br>
  <input type="radio" id="val_cont" name="val_role" value="Controller">
  <label for="val">Controller</label></br>  
  <input type="radio" id="val_sent" name="val_role" value="Sentinel">
  <label for="val">Sentinel</label></br>  
</div>
<br><br><br><br>
<div id="table_result" display="none" style="display:none">
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
</div>
</body>
</html>