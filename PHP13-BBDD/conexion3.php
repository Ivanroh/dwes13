<html>
<head>
<title>Conexión a BBDD con PHP</title>
<meta charset="UTF-8" />
</head>
<body>
	<h2>Pruebas con la base de datos de animales</h2>
<?php
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
$conexion = new mysqli($servidor,$usuario,$clave,"animales");
$conexion->query("SET NAMES 'UTF8'");
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}
?>
	<table border="0">
		<tr bgcolor="lightblue">
			<th>Chip</th>
			<th>Nombre</th>
			<th>Especie</th>
			<th>Imagen</th>
		</tr>
	<?php
	$rutaImagen="img/";
	$resultado = $conexion -> query("SELECT * FROM animal ORDER BY nombre");
	$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	while($fila!=null) {
		echo "<tr bgcolor='lightgreen'>";
		echo "<td>$fila[chip]</td>";
		echo "<td>$fila[nombre]</td>";
		echo "<td>$fila[especie]</td>\n";
		echo "<td><img src='$rutaImagen$fila[imagen]' width='100px' ></td>\n";
		echo "</tr>";
		$fila=$resultado->fetch_array(MYSQLI_ASSOC);
	}
	?>
	</table>
	

</body>
</html>
