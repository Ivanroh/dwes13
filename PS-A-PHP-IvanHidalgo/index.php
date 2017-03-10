
<?php
session_start ();


$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";
$conexion = new mysqli ( $servidor, $usuario, $clave, "ps2013" );
$conexion->query ( "SET NAMES 'UTF8'" );
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}

if(isset($_REQUEST["idioma"])){

	if ($_REQUEST["idioma"]=="es"){
		$_SESSION ['idiomaSelec'] ="es";
	}
	else{
		if ($_REQUEST["idioma"]=="en"){
			//$resultado = $conexion->query ( "SELECT * from info where idioma = 'en'");
			$_SESSION ['idiomaSelec'] ="en";
		}
	}
}

if ($_SESSION["idiomaSelec"]=="es"){
	$resultado = $conexion->query ( "SELECT * from info where idioma = 'es'");
}
else{
	if ($_SESSION["idiomaSelec"]=="en"){
		$resultado = $conexion->query ( "SELECT * from info where idioma = 'en'");
	}
	else
		$resultado = $conexion->query ( "SELECT  * from info where idioma = 'es'");
}
?>

<html>
<head>
<title>Conexión a BBDD con PHP</title>
<meta charset="UTF-8" />
</head>
<body>
<a href="<?php echo "".$_SERVER['PHP_SELF']."?idioma=es";?>"><img src="img/es.png"></a>
<a href="<?php echo "".$_SERVER['PHP_SELF']."?idioma=en";?>"><img src="img/en.png"></a>

	<h2>Festival de música Primavera Sound</h2>
	<img  src='img/portada.jpg' ><br><br>
<?php 

$fila=$resultado->fetch_array(MYSQLI_ASSOC);
while($fila!=null) {
	echo $fila['presentacion'];
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}

$resultados = $conexion->query ( "SELECT DISTINCT dias.dia FROM actuacion,dias WHERE actuacion.dia = dias.id");
$filas=$resultados->fetch_array(MYSQLI_ASSOC);
echo "<h3>Días:</h3>";
echo "<ul id='menu'>";
while($filas!=null) {

	echo "<li><a href='cartel.php?dia=" . $filas['dia'] . "'>" . $filas['dia'] . "</a></li>";

	$filas=$resultados->fetch_array(MYSQLI_ASSOC);
}
echo "</ul>";

?>
</body>
</html>