<!DOCTYPE html>
<html>
  <head>
      <script>
        function myFunction() {
          document.getElementById("lol_role").style.display = "block";
          document.getElementById("ow_role").style.display = "none";
          document.getElementById("val_role").style.display = "none";
          document.getElementById("lol_role_you").style.display = "none";

        }  
        function anotherFunction() {
          document.getElementById("lol_role").style.display = "none";
          document.getElementById("ow_role").style.display = "block";  
          document.getElementById("val_role").style.display = "none";    
          document.getElementById("lol_role_you").style.display = "none";  

        }
        function andAnotherOne() {
          document.getElementById("lol_role").style.display = "none";
          document.getElementById("ow_role").style.display = "none";  
          document.getElementById("val_role").style.display = "block";   
          document.getElementById("lol_role_you").style.display = "none"; 
   
        }       
        function showTop() {    
          document.getElementById("lol_role_you").style.display = "block";      

        }
        function showOwTank() {
          document.getElementById("")
        }
        function showJgl() {
          document.getElementById("lol_role_you").style.display = "block";

        }
        function showMid() {
          document.getElementById("lol_role_you").style.display = "block";

        }
        function showBot() {
          document.getElementById("lol_role_you").style.display = "block";

        }
        function showSupp() {
          document.getElementById("lol_role_you").style.display = "block";

        }
        function notTop() {
          
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
 
<form action="creatematch.php" target="_blank" method="post">
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
<br><br><br><br>
<div id="lol_role" display="none" style="display:none">
  <h2> ¿Que rol quieres jugar? </h2>
  Role:<br>
  <input type="radio" id="lol_top" onclick="showTop();notTop();" name="lol_role" value="1">
  <label for="lol">Top</label></br>
  <input type="radio" id="lol_jungle" onclick="showJgl();notJgl();" name="lol_role" value="2">
  <label for="lol">Jungle</label></br>
  <input type="radio" id="lol_mid" onclick="showMid();notMid();" name="lol_role" value="3">
  <label for="lol">Mid</label></br>
  <input type="radio" id="lol_bot" onclick="showBot();notBot();" name="lol_role" value="4">
  <label for="lol">Bot</label></br>
  <input type="radio" id="lol_support" onclick="showSupp();notSupp();" name="lol_role" value="5">
  <label for="lol">Support</label></br>
</div>
<br><br><br><br>
<div id="lol_role_you" display="none" style="display:none">
  <h2> ¿Y que rol quieres que juegue tu compi? </h2>
  Role:<br>
  <input type="radio" id="lol_top_you" name="lol_role_you" value="1">
  <label for="lol">Top</label></br>
  <input type="radio" id="lol_jungle_you" name="lol_role_you" value="2">
  <label for="lol">Jungle</label></br>
  <input type="radio" id="lol_mid_you" name="lol_role_you" value="3">
  <label for="lol">Mid</label></br>
  <input type="radio" id="lol_bot_you" name="lol_role_you" value="4">
  <label for="lol">Bot</label></br>
  <input type="radio" id="lol_support_you" name="lol_role_you" value="5">
  <label for="lol">Support</label></br>
</div>
<div id="ow_role" display="none" style="display:none">
  <h2> ¿Que rol quieres jugar? </h2>
  Role:<br>
  <input type="radio" id="ow_dps" name="ow_role" value="10">
  <label for="ow">Damage Dealer</label></br>
  <input type="radio" id="ow_tank" name="ow_role" value="13">
  <label for="ow">Tank</label></br>
  <input type="radio" id="ow_support" name="ow_role" value="12">
  <label for="ow">Support</label></br> 
  <input type="radio" id="ow_sniper" name="ow_role" value="11">
  <label for="ow">Sniper</label></br>  
</div>
<div id="ow_role_you" display="none" style="display:none">
  <h2>¿Y que rol quieres que juegue tu compi?</h2>
    Role:<br>
  <input type="radio" id="ow_dps_you" name="ow_role_you" value="10">
  <label for="ow">Damage Dealer</label></br>
  <input type="radio" id="ow_tank_you" name="ow_role_you" value="13">
  <label for="ow">Tank</label></br>
  <input type="radio" id="ow_support_you" name="ow_role_you" value="12">
  <label for="ow">Support</label></br>
  <input type="radio" id="ow_sniper_you" name="ow_role_you" value="11">
  <label for="ow">Sniper</label></br>   
</div>
<div id="val_role" display="none" style="display:none">
  <h2> ¿Que rol quieres jugar? </h2>
  Role:<br>
  <input type="radio" id="val_duel" name="val_role" value="6">
  <label for="val">Duelist</label></br>
  <input type="radio" id="val_init" name="val_role" value="7">
  <label for="val">Initiator</label></br>
  <input type="radio" id="val_cont" name="val_role" value="8">
  <label for="val">Controller</label></br>  
  <input type="radio" id="val_sent" name="val_role" value="9">
  <label for="val">Sentinel</label></br>  
</div>
<div id="val_role_you" display="none" style="display:none">
  <h2>¿Y que rol quieres que juegue tu compi?</h2>
  Role:<br>
  <input type="radio" id="val_duel_you" name="val_role_you" value="6">
  <label for="val">Duelist</label></br>
  <input type="radio" id="val_init_you" name="val_role_you" value="7">
  <label for="val">Initiator</label></br>
  <input type="radio" id="val_cont_you" name="val_role_you" value="8">
  <label for="val">Controller</label></br>  
  <input type="radio" id="val_sent_you" name="val_role_you" value="9">
  <label for="val">Sentinel</label></br>  
</div>  
<br><br><br><br>


  <br><br>
  <input type="submit" value="submit" name="submit">
</form>
 
</body>
</html>