<?php
// including the database connection file
include_once("config.php");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Homepage</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" crossorigin="anonymous">

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
      loadGmatchTable(1, 1);
    }

    function tablaLolJungle() {
      document.getElementById("table_result").style.display = "block";
      loadGmatchTable(1, 2);
    }

    function tablaLolMid() {
      document.getElementById("table_result").style.display = "block";
      loadGmatchTable(1, 3);
    }

    function tablaLolBot() {
      document.getElementById("table_result").style.display = "block";
      loadGmatchTable(1, 4);
    }

    function tablaLolSupp() {
      document.getElementById("table_result").style.display = "block";
      loadGmatchTable(1, 5);
    }

    function loadGmatchTable(id_match_juego, rol_jugador_dos) {
      // Creamos la URL de la API con los parámetros de entrada
      let url = "api/index.php?id_match_juego=" + id_match_juego + "&rol_jugador_dos=" + rol_jugador_dos;

      // Hacmos una consulta a la API
      fetch(url)
        .then(response => response.json())
        .then(data => {
          // Mostramos en la consola los datos de la respuesta
          console.log(data);

          // Eliminamos las filas previas que existan en la tabla
          let table = document.getElementById("table");
          let numRows = table.rows.length;
          while (table.rows.length > 1) {
            table.deleteRow(1);
          }

          // Creamos las filas de la tabla a partir de los datos del JSON
          let header_row = document.getElementById('header_row');
          data.forEach(element => header_row.insertAdjacentHTML('afterend',
            `<tr>
               <td>${element.id_jugador_uno}</td>
               <td>${element.rol_jugador_uno}</td>
               <td>${element.idioma}</td>
               <td><a href="add.php" class="btn btn-primary">MATCH!</a></td>
              </tr>`));

          // Referencia:
          // - https://developer.mozilla.org/es/docs/Web/API/Element/insertAdjacentHTML
        })
        .catch(error => {
          console.log("Error: " + error.message);
        })
    }
  </script>
</head>

<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Simple LAMP web app</h1>
      <p class="lead">Demo app</p>
    </div>
    <h2>¿A que te apetece jugar hoy?</h2>
    <div id="game">
      Game:<br>
      <input type="radio" id="lol" onclick="myFunction()" name="game" value="1">
      <label for="lol">League of Legends</label></br>
      <input type="radio" id="ow" onclick="anotherFunction()" name="game" value="3">
      <label for="lol">Overwatch</label></br>
      <input type="radio" id="val" onclick="andAnotherOne()" name="game" value="2">
      <label for="lol">Valorant</label></br>
    </div>
    <br><br>
    <div id="lol_role" display="none" style="display:none">
      <h2> ¿Que rol quieres jugar? </h2>
      Role:<br>
      <input type="radio" id="lol_top" onclick="tablaLolTop()" name="lol_role" value="1">
      <label for="lol">Top</label></br>
      <input type="radio" id="lol_jungle" onclick="tablaLolJungle()" name="lol_role" value="2">
      <label for="lol">Jungle</label></br>
      <input type="radio" id="lol_mid" onclick="tablaLolMid()" name="lol_role" value="3">
      <label for="lol">Mid</label></br>
      <input type="radio" id="lol_bot" onclick="tablaLolBot()" name="lol_role" value="4">
      <label for="lol">Bot</label></br>
      <input type="radio" id="lol_support" onclick="tablaLolSupp()" name="lol_role" value="5">
      <label for="lol">Support</label></br>
    </div>
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
    <br><br>
    <div id="table_result" display="none" style="display:none">
      <table width='80%' border=0 class="table" id="table">

        <tr bgcolor='#CCCCCC' id="header_row">
          <td>Player</td>
          <td>Rol</td>
          <td>Idioma</td>
          <td></td>
        </tr>
      </table>
    </div>
  </div>
</body>

</html>