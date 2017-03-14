<?php
session_start();
$mensajeError=$usuario="";

if(isset($_POST['enviar'])){
	$servidor = "localhost";
	$usuario=$_POST["usuario"];
	$clave=$_POST["clave"];
	
	if ($_SESSION["login"]==1)
		header("Location:index.php");
	
	$conexion = new mysqli($servidor,"alumno","alumno","catalogo");
	$conexion->query("SET NAMES 'UTF8'");
	
	if ($conexion->connect_errno) {
		echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
	}

	
	$usuClaveCorrecto=false;
	
	$resultado = $conexion-> query("SELECT * FROM usuario");
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	while($fila!=null) {
		
		if($fila['login']==$usuario){
			if ($fila['password']==$clave){
				$usuClaveCorrecto=true;
			}	
		}
		
		$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	}
	
	if(!$usuClaveCorrecto){
		$mensajeError="No se ecuntra registrado nigún usuario con dicho nombre y clave";
	}
	else{
		$_SESSION["login"]=1;
		$_SESSION["usuario"]=$usuario;
		header("Location:index.php");
	}
	
}

if (!isset($_POST['enviar']) ||$mensajeError!=""){	
?>
<html>
<head>
<title>Login</title>
<meta charset="UTF-8" />
</head>
<body>
	<h3>Autentificarse</h3>

	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		<label>Usuario:</label><br>
		<input type="text"name="usuario"><br>
		<label>Contraseña:</label><br>
		<input type="password"name="clave"> <br><br>
		<input type="submit" name="enviar" value="Sing in">
	</form>
	<p><?php echo $mensajeError?></p>
	<a href='alta.php' >¿Aún no tienes cuenta? Haz clic aquí para crear una</a>
</body>
</html>
<?php 
}?>
