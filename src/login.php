<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.html");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if(!empty($_POST)){
 
    // Sanity the recieved parameters
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);


    // Check if username is empty
    if(empty(trim($username))){
        $username_err = "Please enter username.";
    } 
    
    // Check if password is empty
    if(empty(trim($password))){
        $password_err = "Please enter your password.";
    } 
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_jugador, pass FROM jugador WHERE login = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $username);            

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){

                        //print_r(md5($password));
                        //print_r($hashed_password);

                        if(md5($password) == $hashed_password){
                        //if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password1.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password2.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
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
        <p>Please fill in your credentials to login.</p>

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

            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>

   <footer class="pt-5 my-5 text-muted border-top">
    Gaminder &copy; 2022
  </footer>
</div>
</body>
</html>