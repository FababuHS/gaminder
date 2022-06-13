<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Buscar Match</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body>
  <div class="col-lg-8 mx-auto py-md-5">
    <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
		  <a href="/" class="text-dark text-decoration-none">
				<img src="https://i.imgur.com/JMcQzYk.jpg" width="40" height="32" class="me-2">
				<span class="fs-4">Gaminder</span>
			</a>
		</header>      

    <form action="register2.php" method="post">
	<div class="mb-3">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" required>
	</div>

	<div class="mb-3">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" required>
	</div>

	<div class="mb-3">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="nombre" required>
	</div>

	<div class="mb-3">
		<label for="name">Surname1</label>
		<input type="text" class="form-control" name="apellido1" required>
	</div>

	<div class="mb-3">
		<label for="name">Surname2</label>
		<input type="text" class="form-control" name="apellido2" required>
	</div>

	<div class="mb-3">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email" required>
	</div>

	<div class="mb-3">
		<label for="idioma">Language</label>
        <select class="form-select" multiple name="idioma" required>
            <option value="SPA" selected>Spanish</option>
            <option value="ENG">English</option>
			<option value="FRA">French</option>
			<option value="DEU">Deutsch</option>
			<option value="ITA">Italian</option>
        </select>
    </div>

	<div class="mb-3">
		<label for="cumple">Birthdate</label>
		<input type="date" class="form-control" name="cumple" required>
	</div>

	<div class="mb-3">
		<label for="discord">Discord</label>
		<input type="text" class="form-control" name="discord" required>
	</div>

	<div class="mb-3">
		<input type="submit" value="Submit" class="form-control btn btn-primary">
	</div>
    </form>

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

    <footer class="pt-5 my-5 text-muted border-top">
        Gaminder &copy; 2022
    </footer>
</div>
</body>
</html>