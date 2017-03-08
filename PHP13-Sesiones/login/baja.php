<?php
$mensajeError="";
session_start();

if(isset($_POST['enviar'])){
	
	if($_POST['contra']==""){
		$mensajeError="Introduzca la contraseña, campo obligatorio";
	}else{
		
		$conexion = new mysqli ( "localhost", "alumno_rw", "alumno", "catalogo" );
		$conexion->query ( "SET NAMES 'UTF8'" );
		
		if ($conexion->connect_errno) {
			echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
		}
		$esta = false;
		$resultado = $conexion->query ( "SELECT * FROM usuario" );
		$fila = $resultado->fetch_array ( MYSQLI_ASSOC );
		while ( $fila != null ) {
			if($fila['login']==$_SESSION['usuario']){
				if ($fila['password']==$_POST['contra']){
					$esta=true;
				}
			}
			$fila = $resultado->fetch_array ( MYSQLI_ASSOC );
		}		
		
		if(!$esta){
			$mensajeError="La contraseña no coincide, por favor compruebe que la ha escrito correctamente";
		}
		else{
			$conexion->query("Delete from usuario where login='".$_SESSION['usuario']."'");
			$mensajeError=$conexion->error;
			if($mensajeError=="")
				header("Location:logout.php");
		}	
	}	
}
?>
<html>
<head>
<title>Baja</title>
<meta charset="UTF-8" />
</head>
<body>
	<h3>Baja</h3>
	<p>Introduzca la contraseña para darse de baja</p>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<label>Contraseña:</label><br>
		<input type="password"name="contra"> <br><br>
		<input type="submit" name="enviar" value="Dar de baja">
	</form>
	<p><?php echo $mensajeError?></p>
	<a href='index.php' >Volver a la página principal</a>
</body>
</html>






