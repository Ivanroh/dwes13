<?php

session_start ();
$mensajeError = "";

if ($_SESSION ["login"]!=1) {
	header ("Location:login.php");
}else{

	?>

<html>
<head>
<title>Aplicacion</title>
<meta charset="UTF-8" />
</head>
<body>
	<?php 
	
	$conexion = new mysqli("localhost","alumno","alumno","catalogo");
	$conexion->query("SET NAMES 'UTF8'");
	
	if ($conexion->connect_errno) {
		echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
	}
	$esta=false;
	$resultado = $conexion-> query("SELECT * FROM usuario");
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	while($fila!=null) {

		if($fila['login']==$_SESSION["usuario"]){
			echo "<p>Bienvenido <strong>".$fila['nombre']."</strong> a su cuenta</p><br><br>" ;
			echo "<a href='logout.php' >Cerrar sesión</a><br>";
			echo "<a href='baja.php' >Eliminar cuenta</a>";
			$esta=true;
		}
	
		$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	}
	
	
	if(!$esta){
		header("Location:logout.php");
	}
}
	?>
</body>
</html>
