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


if (! isset ( $_REQUEST ["dia"] ))
	die ( "<h3>ERROR en la petición. Falta especificar el día</h3>" );

$dia = $_REQUEST ["dia"];

$resultado = $conexion->query ( "SELECT * FROM dias WHERE dias.dia = ".$dia);

$fila=$resultado->fetch_array(MYSQLI_ASSOC);
$id=$fila["id"];
//echo $id;
$resultadoDos = $conexion->query ( "SELECT * FROM dias,actuacion WHERE dias.dia= ".$dia." and actuacion.dia = ".$id);
$filaDos=$resultadoDos->fetch_array(MYSQLI_ASSOC);
echo "<table border='1'>";
//$cont=1;

echo "<tr>";
echo "<th style='background-color:lightgrey;' >Nombre del artista</th>";
echo "<th style='background-color:lightgrey;' >País de origen</th>";
echo "</tr>";

while($filaDos!=null) {
	
	echo "<tr>";
	echo "<td><a href='artista.php?artista=".$filaDos['nombre']."'><span> " . $filaDos['nombre'] . "</span></a></td>";
	echo "<td><span> " . $filaDos['origen'] . "</span></td>";
	echo "</tr>";
	
	/*
	 * Estilo distionto
	 *echo "<tr>";
	echo "<th style='background-color:lightgrey;' colspan='2' >Actuación $cont</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Nombre del artista</td>";
	echo "<td><a href='artista.php'><span> " . $filaDos['nombre'] . "</span></a></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>País de origen</td>";
	echo "<td><span> " . $filaDos['origen'] . "</span></td>";
	echo "</tr>";
	$cont++;*/
	$filaDos=$resultadoDos->fetch_array(MYSQLI_ASSOC);
}
echo "</table>";

?>
<br>
<br>
<a href="index.php">Volver al menú</a>
</body>
</html>