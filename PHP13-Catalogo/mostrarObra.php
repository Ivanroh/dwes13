<html>
<head>
<title>Conexión a BBDD con PHP</title>
<meta charset="UTF-8" />
<style type="text/css">span{color:grey}</style>
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
if (!isset($_REQUEST["idObra"])) die ("<h3>ERROR en la petición. Falta identificador de la obra</h3>");
$id = $_REQUEST["idObra"];


$resultado = $conexion -> query("SELECT *,nombre AS autor FROM obra,autor WHERE idObra = ".$id." AND autor.id=obra.idAutor");

$autor = $resultado->fetch_array(MYSQLI_ASSOC);
if (empty($autor)) die ("<h3>ERROR en la petición. Identificador de la obra no válido</h3>");


echo "<h3>Identificador de la obra ".$autor['idObra'].":</h3>";


echo "<ul>";
while($autor!=null)
{
	echo "<li>Identificador de la obra: <span>".$autor['idObra']."</span></li>";
	echo "<li>Artista: <span>".$autor['artista']."</span></li>";
	echo "<li>Titulo:<span> ".$autor['titulo']."</span></li>";
	echo "<li>Categoria: <span>".$autor['categoria']."</span></li>";
	echo "<li>Duración: <span>".$autor['duracion']."</span></li>";
	echo "<li>Identificador del autor: <span>".$autor['idAutor']."</span></li>";
	echo "<li>Nombre del Autor: <span>".$autor['autor']."</span></li>";
	echo "<li>Imagen</li> <img  src='img/$autor[imagen]' width='100px'>";
	
	
	$autor=$resultado->fetch_array(MYSQLI_ASSOC);
}

echo "</ul>";

echo "<a href='mostrarCatalogo.php'>Volver</a></br>";

mysqli_close($conexion);

?>


</body>
</html>
