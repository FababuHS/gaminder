<?php

include_once('helpers.php');

$games = get_games();

?>

<!DOCTYPE html>
<html>
  <head>
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
        function showTop() {          
          document.getElementById("lol_top_div").style.display = "block";
          document.getElementById("lol_jgl_div").style.display = "none";
          document.getElementById("lol_mid_div").style.display = "none";
          document.getElementById("lol_bot_div").style.display = "none";
          document.getElementById("lol_supp_div").style.display = "none";
        }
        function showOwTank() {
          document.getElementById("")
        }
        function showJgl() {
          document.getElementById("lol_role_you").style.display = "block";
          document.getElementById("lol_top_div").style.display = "none";
          document.getElementById("lol_jgl_div").style.display = "block";
          document.getElementById("lol_mid_div").style.display = "none";
          document.getElementById("lol_bot_div").style.display = "none";
          document.getElementById("lol_supp_div").style.display = "none";
        }
        function showMid() {
          document.getElementById("lol_role_you").style.display = "block";
          document.getElementById("lol_top_div").style.display = "none";
          document.getElementById("lol_jgl_div").style.display = "none";
          document.getElementById("lol_mid_div").style.display = "block";
          document.getElementById("lol_bot_div").style.display = "none";
          document.getElementById("lol_supp_div").style.display = "none";
        }
        function showBot() {
          document.getElementById("lol_role_you").style.display = "block";
          document.getElementById("lol_top_div").style.display = "none";
          document.getElementById("lol_jgl_div").style.display = "none";
          document.getElementById("lol_mid_div").style.display = "none";
          document.getElementById("lol_bot_div").style.display = "block";
          document.getElementById("lol_supp_div").style.display = "none";
        }
        function showSupp() {
          document.getElementById("lol_role_you").style.display = "block";
          document.getElementById("lol_top_div").style.display = "none";
          document.getElementById("lol_jgl_div").style.display = "none";
          document.getElementById("lol_mid_div").style.display = "none";
          document.getElementById("lol_bot_div").style.display = "none";
          document.getElementById("lol_supp_div").style.display = "block";
        }
        function notTop() {
          document.getElementById("lol_role_you").style.display = "block";
          document.getElementById("lol_top_you").disabled = true;
          document.getElementById("lol_jungle_you").disabled = false;
          document.getElementById("lol_mid_you").disabled = false;
          document.getElementById("lol_bot_you").disabled = false;
          document.getElementById("lol_support_you").disabled = false;          
        }
        function notJgl() {
          document.getElementById("lol_top_you").disabled = false;
          document.getElementById("lol_jungle_you").disabled = true;
          document.getElementById("lol_mid_you").disabled = false;
          document.getElementById("lol_bot_you").disabled = false;
          document.getElementById("lol_support_you").disabled = false; 
        }
        function notMid() {
          document.getElementById("lol_top_you").disabled = false;
          document.getElementById("lol_jungle_you").disabled = false;
          document.getElementById("lol_mid_you").disabled = true;
          document.getElementById("lol_bot_you").disabled = false;
          document.getElementById("lol_support_you").disabled = false; 
        }
        function notBot() {
          document.getElementById("lol_top_you").disabled = false;
          document.getElementById("lol_jungle_you").disabled = false;
          document.getElementById("lol_mid_you").disabled = false;
          document.getElementById("lol_bot_you").disabled = true;
          document.getElementById("lol_support_you").disabled = false; 
        }
        function notSupp() {
          document.getElementById("lol_top_you").disabled = false;
          document.getElementById("lol_jungle_you").disabled = false;
          document.getElementById("lol_mid_you").disabled = false;
          document.getElementById("lol_bot_you").disabled = false;
          document.getElementById("lol_support_you").disabled = true; 
        }
      </script>
  </head> 
<body>
 
<form action="/test.php" target="_blank" method="post">
<h2>¿A que te apetece jugar hoy?</h2>
<div id="game">
  Game:<br>
  <?php foreach ($games as $game): ?>
    <input type="radio" id="lol" onclick="myFunction()" name="game" value="<?php echo $game['nombre_juego'];?>">
    <label for="lol"><?php echo $game['nombre_juego'];?></label></br>
  <?php endforeach; ?>

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
  <input type="radio" id="lol_top" onclick="showTop();notTop();" name="lol_role" value="Top">
  <label for="lol">Top</label></br>
  <input type="radio" id="lol_jungle" onclick="showJgl();notJgl();" name="lol_role" value="Jungle">
  <label for="lol">Jungle</label></br>
  <input type="radio" id="lol_mid" onclick="showMid();notMid();" name="lol_role" value="Mid">
  <label for="lol">Mid</label></br>
  <input type="radio" id="lol_bot" onclick="showBot();notBot();" name="lol_role" value="Bot">
  <label for="lol">Bot</label></br>
  <input type="radio" id="lol_support" onclick="showSupp();notSupp();" name="lol_role" value="Support">
  <label for="lol">Support</label></br>
</div>
<br><br><br><br>
<div id="lol_role_you" display="none" style="display:none">
  <h2> ¿Y que rol quieres que juegue tu compi? </h2>
  Role:<br>
  <input type="radio" id="lol_top_you" name="lol_role_you" value="Top">
  <label for="lol">Top</label></br>
  <input type="radio" id="lol_jungle_you" name="lol_role_you" value="Jungle">
  <label for="lol">Jungle</label></br>
  <input type="radio" id="lol_mid_you" name="lol_role_you" value="Mid">
  <label for="lol">Mid</label></br>
  <input type="radio" id="lol_bot_you" name="lol_role_you" value="Bot">
  <label for="lol">Bot</label></br>
  <input type="radio" id="lol_support_you" name="lol_role_you" value="Support">
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
<div id="ow_role_you" display="none" style="display:none">
  <h2>¿Y que rol quieres que juegue tu compi?</h2>
    Role:<br>
  <input type="radio" id="ow_dps_you" name="ow_role_you" value="Dps">
  <label for="ow">Damage Dealer</label></br>
  <input type="radio" id="ow_tank_you" name="ow_role_you" value="Tank">
  <label for="ow">Tank</label></br>
  <input type="radio" id="ow_support_you" name="ow_role_you" value="Support">
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
<div id="val_role_you" display="none" style="display:none">
  <h2>¿Y que rol quieres que juegue tu compi?</h2>
  Role:<br>
  <input type="radio" id="val_duel_you" name="val_role_you" value="Duelist">
  <label for="val">Duelist</label></br>
  <input type="radio" id="val_init_you" name="val_role_you" value="Initiator">
  <label for="val">Initiator</label></br>
  <input type="radio" id="val_cont_you" name="val_role_you" value="Controller">
  <label for="val">Controller</label></br>  
  <input type="radio" id="val_sent_you" name="val_role_you" value="Sentinel">
  <label for="val">Sentinel</label></br>  
</div>  
<br><br><br><br>
<div id="lol_top_div" onclick="showTop()"  display="none" style="display:none">
  <h2>¿Que personaje te gustaria jugar?</h2>
  Character: <br>
  <select id="lol_top_sel" name="lol_top_champs">
    <option value="Aatrox">Aatrox</option>
    <option value="Camille">Camille</option>
    <option value="Garen">Garen</option>
  </select>
</div>
<div id="lol_jgl_div" onclick="showJgl()"  display="none" style="display:none">
  <h2>¿Que personaje te gustaria jugar?</h2>
  Character: <br>
  <select id="lol_jgl_sel" name="lol_jgl_champs">
    <option value="Hecarim">Hecarim</option>
    <option value="Jarvan IV">Jarvan IV</option>
    <option value="Lee Sin">Lee Sin</option>
  </select>
</div>
<div id="lol_mid_div" onclick="showMid()"  display="none" style="display:none">
  <h2>¿Que personaje te gustaria jugar?</h2>
  Character: <br>
  <select id="lol_mid_sel" name="lol_mid_champs">
    <option value="Ahri">Ahri</option>
    <option value="LeBlanc">LeBlanc</option>
    <option value="Zed">Zed</option>
  </select>
</div>
<div id="lol_bot_div" onclick="showBot()"  display="none" style="display:none">
  <h2>¿Que personaje te gustaria jugar?</h2>
  Character: <br>
  <select id="lol_bot_sel" name="lol_bot_champs">
    <option value="Caitlyn">Caitlyn</option>
    <option value="Sivir">Sivir</option>
    <option value="Xayah">Xayah</option>
  </select>
</div>
<div id="lol_supp_div" onclick="showSupp()"  display="none" style="display:none">
  <h2>¿Que personaje te gustaria jugar?</h2>
  Character: <br>
  <select id="lol_supp_sel" name="lol_supp_champs">
    <option value="Blitzcrank">Blitzcrank</option>
    <option value="Janna">Janna</option>
    <option value="Sona">Sona</option>
  </select>
</div>
  Password:<br>
  <input type="password" name="password">
  <br><br>
  <input type="submit" value="Submit">
</form>
 
</body>
</html>