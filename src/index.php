<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Syne">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Índice</title>
      <style>
      
      body {
      font-family: 'Syne', sans-serif; 
          }
      
      .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
      }
      
      .image-container {
        text-align: center;
        width: 100%;
      }
      
      .links-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
      }
      
      </style>
    </head>
  
  
    <body class="w3-white">
        <!-- Image and name container. Change to your picture here. -->
      <div class="image-container">
      <img src="https://i.imgur.com/JMcQzYk.jpg" class="w3-margin" alt="Person" max-width="100%" height="150px" style="border-radius: 50%;">
      
       <!-- Content. Add your bio here. -->
       <div class="w3-margin">
       <h2 class="w3-text-black"><strong>GAMINDER</strong></h2>
       <p><i>You pick the game, we find your squad</i></p>
       </div>
  
      <!-- Links section 1. Replace the # inside of the "" with your links. -->
      <div class="links-container">
        <a href="buscarmatch.php" class="w3-button w3-hover-blue w3-large w3-black" style="width: 350px;"></i>Buscar un match</a>
        <a href="creatematch.form.php" class="w3-button w3-hover-blue w3-large w3-black" style="width: 350px;"></i>Crear un match</a>
        <a href="completed.php" class="w3-button w3-hover-blue w3-large w3-black" style="width: 350px;"></i>Historial de matches</a>
        <a href="logout.php" class="w3-button w3-hover-blue w3-large w3-black" style="width: 350px;"></i>Logout</a>
      </div>
  
        <!-- Add links to your social networks here. -->
          <div class="w3-container w3-xlarge w3-padding w3-margin">            
           <i class="fa fa-instagram w3-hover-opacity"></i>
            <a href="https://instagram.com/gaminder_official" target="_blank">           
           
          </div>
        </div>
  
        <!-- The Contact Section -->
    <div class="w3-container w3-content" style="max-width:390px" id="contact">
      <h5 class="w3-center">Get in touch.</h5>
      <div class="w3-row w3-padding-32">
        <div class="w3-col m12 w3-large w3-margin-bottom">
          <i class="fa fa-map-marker" style="width:30px"></i> London, UK<br>
          <i class="fa fa-phone" style="width:30px"></i> Phone: +44 151515<br>
          <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com<br>
        </div>
      </div>
      <!-- Footer. This section contains an ad for W3Schools Spaces. You can leave it to support us. -->
      <footer class="w3-container w3-center w3-padding-48">
        <a class="w3-margin-bottom" href="https://www.w3schools.com/spaces" title="This website was made with W3schools Spaces. Make your own free website today!" target="_blank">
          <img src="https://spaces.w3schools.com/logo_4x.png" alt="This website was made with W3schools Spaces. Make your own free website today!" width="50" height="50">
        </a> 
      <!-- End footer -->
      </footer>
    </div>
  
    </body>  
  </html>
  