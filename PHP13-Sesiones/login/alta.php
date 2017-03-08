<?php
$mensajeError = "";

if (isset ( $_POST ['enviar'] )) {
	if ($_POST ['usuario'] == "") {
		$mensajeError = "El campo nombre no puede estar vacío.";
	}
	if ($_POST ['contra'] == "") {
		$mensajeError = "El campo contraseña no puede estar vacío.";
	}
	
	if ($mensajeError == "") {
		
		$conexion = new mysqli ( "localhost", "alumno_rw", "alumno", "catalogo" );
		$conexion->query ( "SET NAMES 'UTF8'" );
		
		if ($conexion->connect_errno) {
			echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
		}
		$esta = false;
		$resultado = $conexion->query ( "SELECT * FROM usuario" );
		$fila = $resultado->fetch_array ( MYSQLI_ASSOC );
		while ( $fila != null ) {
			if ($fila ['login'] == $_POST['usuario']) {
				$esta = true;
			}
			$fila = $resultado->fetch_array ( MYSQLI_ASSOC );
		}
		
		if($esta){
			$mensajeError="Ya hay un usuario registrado con este nombre.";
		}
		else{
			
			$tipoCuenta=$_POST['cuenta'];
			if($tipoCuenta=="")
				$tipoCuenta=0;
			
			
			$conexion ->query("INSERT INTO usuario (login, password, nombre, admin, descripcion)VALUES ('".$_POST['usuario']."','".$_POST['contra']."','".$_POST['nombre']."','$tipoCuenta','".$_POST['descripcion']."')");
	
			$mensajeError=$conexion->error;
			
			if ($mensajeError==""){
				header("Location:login.php");
			}

		}
	}
}
?>
<html>
<head>
<title>Alta Usuario</title>
<meta charset="UTF-8" />
</head>
<body>
	<h3>Alta Usuario</h3>
	<h3>Rellene los siguientes datos</h3>
	<p>* datos obligatorios</p>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<label>Usuario:*</label><br>
		<input type="text"name="usuario"><br>
		<label>Contraseña:*</label><br>
		<input type="password"name="contra"> <br>
		<label>Nombre completo:</label><br>
		<input type="text"name="nombre"><br>
		<br>
		<label>Descripción:</label><br>
		<textarea rows="5" cols="30" name="descripcion"></textarea>
		<br>
		<br>
		<label>Tipo de cuenta (por defecto estandar):</label><br>
		Estandar 
		<input type="radio" name="cuenta" value="0">
		Administrador
		<input type="radio" name="cuenta" value="1">
		<br>
		<br>
		<input type="submit" name="enviar" value="Dar de alta">
	</form>
	<p><?php echo $mensajeError?></p>
	<a href="login.php">¿Ya tienes cuenta? Haz clic aquí para iniciar sesión</a>
</body>
</html>






