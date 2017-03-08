<html>
<head>
<title>Saludo</title>
<meta charset="UTF-8" />
</head>
<body>
<?php

// Si no hay sesión iniciada, se mostrará un formulario para pedir nuestro nombre.
// Al enviar el formulario se iniciará una sesión almacenando el nombre como variable de sesión
// Si hay sesión iniciada, se mostrará el siguiente texto: Bienvenid@, Alberto*
$mensaje = "";

	if (session_status () == PHP_SESSION_NONE) {
			
	if ( isset ( $_POST ["enviar"] )) {
		
		session_start ();
		
		$_SESSION ['saludo'] = $_POST ['nombre'];
		
		$mensaje = "Bienvenid@ " . $_SESSION ['saludo'];
		
		
		if (isset ( $_REQUEST ["cerrarSesion"] )) {
			$_SESSION = array ();
			session_unset ();
			if (ini_get ( "session.use_cookies" )) {
				$params = session_get_cookie_params ();
				setcookie ( session_name (), '', time () - 42000, $params ["path"], $params ["domain"], $params ["secure"], $params ["httponly"] );
			}
			session_destroy ();
		}
	
	}else {
		
		?>
			<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
				<label>Introduzca su nombre:</label> <input type="text" name="nombre">
				<input type="submit" name="enviar" value="Enviar Nombre">
			</form>
			<?php
	}

}
?>
<h3><?php echo $mensaje;?></h3>
<p>
		<a href="<?php echo $_SERVER['PHP_SELF']."?cerrarSesion=true"?>">Cerrar
			sesión</a>
	</p>
</body>
</html>
