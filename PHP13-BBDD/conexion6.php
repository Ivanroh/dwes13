<html>
<head>
<title>Conexión a BBDD con PHP</title>
<meta charset="UTF-8" />
</head>
<body>
	<h2>Pruebas con la base de datos de animales</h2>
<?php
include "Animal.php";
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";
?>
<p>Vamos a utilizar las siguientes variables:</p>
	<ul>
<?php
echo "<li>Nombre del servidor al que nos vamos a conectar a MySQL: $servidor</li>";
echo "<li>Nombre de usuario con el que nos vamos a conectar a MySQL: $usuario</li>";
echo "<li>Contraseña del usuario en MySQL: $clave</li>";
?>
</ul>

<?php
echo "<h3>Estableciendo conexión...</h3>";
$conexion = new mysqli ( $servidor, $usuario, $clave, "animales" );
$conexion->query ( "SET NAMES 'UTF8'" );
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}

$resultado = $conexion->query ( "SELECT chip, nombre, especie AS tipo, imagen FROM animal ORDER BY nombre" );
/*
while ( $animal = $resultado->fetch_object('Animal' ) ) {
	echo $animal. "<br/>";
}*/

?>
	<table>
	<tr bgcolor="lightblue">
	<th>Chip</th>
	<th>Nombre</th>
	<th>Especie</th>
	<th>Imagen</th>
	</tr>
	<?php 
while ($animal = $resultado->fetch_object('Animal')) {
	// echo $animal."<br/>"; // primer intento más sencillo
	echo "<tr bgcolor='lightgreen'>";
	echo "<td>".$animal->getChip()."</td>\n";
	echo "<td>".$animal->getNombre()."</td>\n";
	echo "<td>".$animal->getEspecie()."</td>\n";
	echo "<td>".$animal->getImagen()."</td>\n";
	echo "</tr>";
	
}
echo "</table>";


echo "<a href='index.php'>Ir a index.php</a></br>";
echo "<a href='conexion2.php'>Ir a conexion2.php</a></br>";
echo "<a href='conexion3.php'>Ir a conexion3.php</a></br>";
echo "<a href='conexion4.php'>Ir a conexion4.php</a></br>";
echo "<a href='conexion5.php'>Ir a conexion5.php</a></br>";


?>

</body>
</html>