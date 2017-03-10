
<html>
<head>
<title>Conexión a BBDD con PHP</title>
<meta charset="UTF-8" />
<style type="text/css">
span {
	color: grey
}
</style>
</head>
<body>
<?php

$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";
$conexion = new mysqli ( $servidor, $usuario, $clave, "ps2013" );
$conexion->query ( "SET NAMES 'UTF8'" );
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}


if (! isset ( $_REQUEST ["artista"] ))
	die ( "<h3>ERROR en la petición. Falta especificar el artista</h3>" );

	$artista = $_REQUEST ["artista"];
	
	$resultado = $conexion->query ( "SELECT * FROM actuacion,dias WHERE nombre='".$artista."' and actuacion.dia = dias.id");
	
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th style='background-color:lightgrey;' >Nombre del artista</th>";
	echo "<th style='background-color:lightgrey;' >País de origen</th>";
	echo "<th style='background-color:lightgrey;' >Día de la actuación</th>";
	echo "<th style='background-color:lightgrey;' >Imágen</th>";
	echo "<th style='background-color:lightgrey;' >Página web</th>";
	echo "</tr>";
	
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	while($fila!=null) {
		echo "<tr>";
		echo "<td><span> " . $fila['nombre'] . "</span></a></td>";
		echo "<td><span> " . $fila['origen'] . "</span></td>";
		echo "<td><span> " . $fila['dia'] . "</span></td>";
		echo "<td><img src='img/".$fila['imagen']."'  width='100px'> </td>";
		echo "<td><span> <a href='" . $fila['url'] . "'>" . $fila['url'] . "</a></span></td>";
		echo "</tr>";
	
		$dia=$fila['dia'];
		$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	}
	echo "</table>";
?>
<br>
<br>
<a href="cartel.php?dia=<?php echo $dia?>">Volver al cartel</a>
</body>
</html>