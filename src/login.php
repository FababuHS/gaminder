<?php
// Inicializamos la sesión
session_start();
 
// Comprobamos si el usuario está logeado, si es así lo redirigimos a la página de inicio
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.html");
    exit;
}
 
// Incluimos el fichero config.php
require_once "config.php";
 
// Definos las variables y las inicializamos
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
//Procesamos la información volcada desde el formulario
if(!empty($_POST)){
 
    // Saneamos los parámetros recibidos
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);


    // Comprobamos si se ha introducido el username
    if(empty(trim($username))){
        $username_err = "Introduce el nombre de usuario.";
    } 
    
    // Comprobamos si se ha introducido la contraseña
    if(empty(trim($password))){
        $password_err = "Introduce la contraseña.";
    } 
    
    // Validación de las credenciales
    if(empty($username_err) && empty($password_err)){
        // Preparamos la query
        $sql = "SELECT id_jugador, pass FROM jugador WHERE login = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vinculamos las variables a la query
            mysqli_stmt_bind_param($stmt, "s", $username);            

            
            // Intento de ejecución de la sentencia
            if(mysqli_stmt_execute($stmt)){
                // Almacenamos el resultado
                mysqli_stmt_store_result($stmt);
                
                // Comprobamos si existe el usuario, si es asi validamos la contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Vinculamos las variables del resultado
                    mysqli_stmt_bind_result($stmt, $id, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){

                        //print_r(md5($password));
                        //print_r($hashed_password);

                        if(md5($password) == $hashed_password){
                        //if(password_verify($password, $hashed_password)){
                            // Contraseña correcta, iniciamos sesión
                            session_start();
                            
                            // Almacenamos información en variables de sesión
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirección del usuario a la página de inicio
                            header("location: index.php");
                        } else{
                            // Contraseña incorrecta, mostrando mensaje genérico de error.
                            $login_err = "Usuario o contraseña erronea.";
                        }
                    }
                } else{
                    // El usuario no existe, mostrando mensaje genérico de error.
                    $login_err = "Usuario o contraseña erronea.";
                }
            } else{
                echo "Oops! Algo falló durante el proceso, inténtelo de nuevo.";
            }

            // Cierre de la sentencia
            mysqli_stmt_close($stmt);
        }
    }
    
    // Cierre de la sesión
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Buscar Match</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <style>
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>

<body>
  <div class="col-lg-8 mx-auto py-md-5">
    <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
		  <a href="/" class="text-dark text-decoration-none">
				<img src="https://i.imgur.com/JMcQzYk.jpg" width="40" height="32" class="me-2">
				<span class="fs-4">Gaminder</span>
			</a>
    </header>      

    <?php if ($status == "error") : ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $message; ?>
   </div>
   <?php endif; ?>

   <?php if ($status == "success") : ?>
   <div class="alert alert-success" role="alert">
	   <?php echo $message; ?>
   </div>
   <?php endif; ?>

   <div class="wrapper">
        <h2>Login</h2>
        <p>Por favor introduzca sus credenciales.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="login.php" method="post">
            <div class="mb-3">
		        <label for="username">Username</label>
		        <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" name="username">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
	        </div>

	        <div class="mb-3">
		        <label for="password">Password</label>
		        <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="password">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
	        </div>

	        <div class="mb-3">
		        <input type="submit" value="Submit" class="form-control btn btn-primary">
	        </div>

            <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>
        </form>
    </div>

   <footer class="pt-5 my-5 text-muted border-top">
    Gaminder &copy; 2022
  </footer>
</div>
</body>
</html>