<html>
<head>
	<title>Conexión a BBDD con PHP</title>
	<meta charset="UTF-8"/>
</head>
<body>
<h2>Pruebas con la base de datos de animales</h2>
<?php
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";
?>
<p> Vamos a utilizar las siguientes variables:</p>
<ul>
<?php
echo "<li>Nombre del servidor al que nos vamos a conectar a MySQL: $servidor</li>";
echo "<li>Nombre de usuario con el que nos vamos a conectar a MySQL: $usuario</li>";
echo "<li>Contraseña del usuario en MySQL: $clave</li>";
?>
</ul>

<?php
echo "<h3>Estableciendo conexión...</h3>";
$conexion = new mysqli($servidor,$usuario,$clave);

$conexion->query("SET NAMES 'UTF8'");

if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}
else {
	echo "<p>Información de servidor: $conexion->host_info</p>";
	echo "<h3>Desconectando...</h3>";
	mysqli_close($conexion);
}
?>



<?php
$conexion = new mysqli($servidor,$usuario,$clave,"animales");
$conexion->query("SET NAMES 'UTF8'");
//si quisiéramos hacerlo en dos pasos:
// $conexion = new mysqli($servidor,$usuario,$clave);
// $conexion->select_db("animales");

if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}
echo "<p>A continuación mostramos algunos registros:</p>";
$resultado = $conexion -> query("SELECT * FROM ANIMAL ORDER BY nombre");
$fila=$resultado->fetch_array(MYSQLI_ASSOC);
while($fila!=null) {
	echo "<hr>";
	echo "Nombre:" . $fila['nombre'];
	echo "<br>Especie: $fila[especie]"; // observa la diferencia en el uso de comillas
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}

mysqli_free_result($resultado);

echo "<p>Cuidador:</p>";
$resultado = $conexion -> query("SELECT * FROM cuidador ORDER BY Nombre");
$fila=$resultado->fetch_array(MYSQLI_ASSOC);
while($fila!=null) {
	echo "<hr>";
	echo "Nombre:" . $fila['Nombre'];
	//echo "<br>Especie: $fila[especie]"; // observa la diferencia en el uso de comillas
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
}


echo "<h3>Desconectando...</h3>";


echo "<a href='index.php'>Ir a index.php</a></br>";
echo "<a href='conexion3.php'>Ir a conexion3.php</a></br>";
echo "<a href='conexion4.php'>Ir a conexion4.php</a></br>";
echo "<a href='conexion5.php'>Ir a conexion5.php</a></br>";
echo "<a href='conexion6.php'>Ir a conexion6.php</a></br>";


mysqli_close($conexion);
?>


</body>
</html>