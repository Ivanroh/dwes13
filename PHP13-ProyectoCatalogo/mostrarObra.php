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
	<h2>Informacion sobre la obra</h2>
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

if (!isset($_REQUEST["idObra"])) die ("<h3>ERROR en la petición. Falta identificador de la obra</h3>");
$id = $_REQUEST["idObra"];


$resultado = $conexion -> query("SELECT *,nombre AS autor FROM obra,autor WHERE idObra = ".$id." AND autor.id=obra.idAutor");

$autor = $resultado->fetch_array(MYSQLI_ASSOC);
if (empty($autor)) die ("<h3>ERROR en la petición. Identificador de la obra no válido</h3>");


echo "<h3>Canción ".$autor['titulo']."</h3>";

echo "<div class='table-responsive'>";
echo "<table class='table table-hover'>";
echo "<tr>";
echo "<th>Artista</th>";
echo "<th>Titulo</th>";
echo "<th>Categoria</th>";
echo "<th>Duración</th>";
echo "<th>Identificador del autor</th>";
echo "<th>Nombre del Autor</th>";
echo "<th>Imagen Disco</th>";
echo "</tr>";

echo "<ul>";
while($autor!=null)
{
	echo "<tr bgcolor='lightgrey'>";
	echo "<td><span>".$autor['artista']."</span></td>";
	echo "<td><span> ".$autor['titulo']."</span></td>";
	echo "<td><span>".$autor['categoria']."</span></td>";
	echo "<td><span>".$autor['duracion']."</span></td>";
	echo "<td><span>".$autor['idAutor']."</span></td>";
	echo "<td><span>".$autor['autor']."</span></td>";
	echo "<td><img class='img-rounded' src='img/$autor[imagen]' width='100px'></td>";
	echo "</tr>";
	
	$autor=$resultado->fetch_array(MYSQLI_ASSOC);
}

echo "</table>";
echo "</div>";
echo "</ul>";

echo "<a href='mostrarCatalogo.php'>Volver</a></br>";

mysqli_close($conexion);

?>


</body>
</html>