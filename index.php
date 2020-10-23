<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style-Login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/img/LogoSena.png" rel="icon">
  	<link href="assets/img/LogoSena.png" rel="apple-touch-icon">
</head>

<body>
	<img class="wave" src="assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="assets/img/logoSena.png" >
		</div>
		<div class="login-content">
			<form action="procesos/validacion.php" method="POST">
				<img src="assets/img/usu.png">
				<h2 class="title">Bienvenido</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Cédula</h5>
						<input type="text" class="input" name="cedula" pattern="[0-9]+" title="Este campo es obligatorio" maxlength="10" required="">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Contraseña</h5>
						<input type="password" class="input" name="contrasena" title="Este campo es obligatorio" required="">
					</div>
				</div>
				<a href="#">¿Olvidaste tu contraseña?</a>
				<input type="submit" class="btn" value="Ingresar" id="ingresar">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/main-Login.js"></script>
</body>

</html>