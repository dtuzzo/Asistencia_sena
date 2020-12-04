<!DOCTYPE html>
<html>
<head>
	<title>Recuperar Contraseña</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/style-Login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../../assets/img/LogoSena.png" rel="icon">
  	<link href="../../assets/img/LogoSena.png" rel="apple-touch-icon">
</head>

<body>
	<img class="wave" src="../../assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../../assets/img/logoSena.png" >
		</div>
		<div class="login-content">
			<form action="recuperar.php" method="POST">
				<img src="../../assets/img/usu.png">
				<h2 class="title">Recuperar Contraseña</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Ingresa Tu correo</h5>
						<input type="email" class="input" name="email" title="Este campo es obligatorio" require>
					</div>
				</div>
				<input type="submit" name="codigo" class="btn" value="Restablecer" id="ingresar">
				<a href="../../"><- Volver</a>
			</form>
		</div>
	</div>
	
<?php

			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\SMTP;
			use PHPMailer\PHPMailer\Exception;

			require '..\..\librerias\PHPMailer\PHPMailer\PHPMailer.php';
			require '..\..\librerias\PHPMailer\PHPMailer\SMTP.php';
			require '..\..\librerias\PHPMailer\PHPMailer\Exception.php';

			// Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);

	try{
			if(isset($_POST['email']) && !empty($_POST['email'])){
            	$email = $_POST['email'];

					require_once "../../Conexion/conexion2/conexion.php";
					$conexion = conexion();

					$sql = "SELECT correo_funcionario, clave_funcionario FROM funcionario WHERE correo_funcionario='$email'";
					$result=mysqli_query($conexion,$sql);
				
					/* array numérico */
					$row = $result->fetch_array(MYSQLI_NUM);

				if($row[0] == $email){

			 		//Server settings
					$mail->SMTPDebug = 0;                      // Enable verbose debug output
			 		$mail->isSMTP(true);                                            // Send using SMTP
			 		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			 		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			 		$mail->Username   = 'enviocontrasena2020@gmail.com';                     // SMTP username
			 		$mail->Password   = 'Sena2020#';                               // SMTP password
			 		$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			 		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		 
			 		//Recipients
			 		$mail->setFrom('enviocontrasena2020@gmail.com', 'Sena');
			 		$mail->addAddress($email);     // Add a recipient
		 
			 		// Content
			 		$mail->isHTML(true);                                  // Set email format to HTML
			 		$mail->Subject = 'Restablecer Contraseña';
			 		$mail->Body    = 'Su contraseña temporal es: '.$row[1];
			 		$mail->CharSet = 'UTF-8';
		 
			 		$mail->send();
					 include 'Pasa.php';
				}else
				include 'Error.php';
		} else 
			echo '0';	 
	} 
		 	 catch (Exception $e) {
			 echo "Error no se puedo enviar tu correo. Mailer Error: {$mail->ErrorInfo}";
		 	}		
?>		

	<script type="text/javascript" src="../../assets/js/main-Login.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>

