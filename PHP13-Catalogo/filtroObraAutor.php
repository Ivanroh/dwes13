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
	<h2>Pruebas con la base de datos de animales</h2>
<?php
include "Obra.php";
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
$conexion = new mysqli ( $servidor, $usuario, $clave, "catalogo" );
$conexion->query ( "SET NAMES 'UTF8'" );
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}

// Recoger el cuidador de request
if (! isset ( $_REQUEST ["id"] ))
	die ( "<h3>ERROR en la petición. Falta identificador del autor</h3>" );
$id = $_REQUEST ["id"];

$resultado = $conexion->query ( "SELECT * FROM autor WHERE id = " . $id );

$autor = $resultado->fetch_array ( MYSQLI_ASSOC );
if (empty ( $autor ))
	die ( "<h3>ERROR en la petición. Identificador del autor no válido</h3>" );

echo "<h3>Datos del autor con identificador $id</h3>";
echo "<ul>";
while ( $autor != null ) {
	
	echo "<li>Nombre: <span>".$autor['nombre']."</span></li>";
	echo "<li>Apellido: <span>".$autor['apellido']."</span></li>";
	echo "<li>Nacionalidad: <span>".$autor['nacionalidad']."</span></li>";
	$autor = $resultado->fetch_array ( MYSQLI_ASSOC );
}
echo "</ul>";
// liberamos la memoria del resultado, que reutilizaremos después
mysqli_free_result ( $resultado );

echo "<h3>Obras del autor " . $autor ['nombre'] . " " . $autor ['apellido'] . ":</h3>";

// obtener los animales que cuida el cuidador
$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor WHERE id = " . $id . " AND autor.id=obra.idAutor" );
$fila = $resultado->fetch_array ( MYSQLI_ASSOC );
echo "<table border='1'>";
while ( $fila != null ) {
	echo "<tr>";
	echo "<th style='background-color:lightgrey;' >Obra</th>";
	echo "<td>Titulo:<span> " . $fila ['titulo'] . "</span></td>";
	echo "<td>Categoria: <span>" . $fila ['categoria'] . "</span></td>";
	echo "<td>Duración: <span>" . $fila ['duracion'] . "</span></td>";
	echo "<td><img  src='img/$fila[imagen]' width='100px'></td>";
	// echo "<li>".$fila['titulo']."</li>";
	$fila = $resultado->fetch_array ( MYSQLI_ASSOC );
	echo "</tr>";
}
echo "</table>";

echo "<a href='mostrarCatalogo.php'>Volver</a>";

mysqli_close ( $conexion );

?>


</body>
</html>