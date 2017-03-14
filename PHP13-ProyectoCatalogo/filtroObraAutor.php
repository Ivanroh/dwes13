<html>
<head>
<title>Conexión a BBDD con PHP</title>
<meta charset="UTF-8" />
<!--Bootstrap-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--Bootstrap-->

<link href="estilo/catalogo.css" rel="stylesheet" type="text/css" />
</head>
<body class="container">
	<h2>Informacion sobre el autor</h2>
<?php
session_start ();
include "Obra.php";
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";

$conexion = new mysqli ( $servidor, $usuario, $clave, "catalogo" );
$conexion->query ( "SET NAMES 'UTF8'" );
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}

if (! isset ( $_REQUEST ["id"] ))
	die ( "<h3>ERROR en la petición. Falta identificador del autor</h3>" );
$id = $_REQUEST ["id"];

$resultado = $conexion->query ( "SELECT * FROM autor WHERE id = " . $id );

$autor = $resultado->fetch_array ( MYSQLI_ASSOC );
if (empty ( $autor ))
	die ( "<h3>ERROR en la petición. Identificador del autor no válido</h3>" );

echo "<h3>Datos personales</h3>";
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

echo "<h3>Obras del autor</h3>";

// obtener los animales que cuida el cuidador
$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor WHERE id = " . $id . " AND autor.id=obra.idAutor" );
$fila = $resultado->fetch_array ( MYSQLI_ASSOC );

echo "<div class='table-responsive'>";
echo "<table class='table table-hover'>";
echo "<tr>";
echo "<th>Titulo</th>";
echo "<th>Categoria</th>";
echo "<th>Duración</th>";
echo "<th>Imagen Disco</th>";
echo "</tr>";
while ( $fila != null ) {
	echo "<tr bgcolor='lightgrey'>";
	echo "<td><span> " . $fila ['titulo'] . "</span></td>";
	echo "<td><span>" . $fila ['categoria'] . "</span></td>";
	echo "<td><span>" . $fila ['duracion'] . "</span></td>";
	echo "<td><img  src='img/$fila[imagen]' width='100px'></td>";
	$fila = $resultado->fetch_array ( MYSQLI_ASSOC );
	echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "<a href='mostrarCatalogo.php'>Volver</a>";

mysqli_close ( $conexion );

?>


</body>
</html>