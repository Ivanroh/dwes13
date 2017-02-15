<html>
<head>
<title>Conexión a BBDD con PHP</title>
<meta charset="UTF-8" />
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

if ($_REQUEST ( "busqueda" ) == "autor") {
	
	//if ($_REQUEST ( "orden" ) == "desc") {
		$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor ORDER BY	autor.nombre desc" );
	//} else
		//$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor ORDER BY	autor.nombre" );
} elseif ($_REQUEST ( "busqueda" ) == "titulo") {
	
	//if ($_REQUEST ( "orden" ) == "desc") {
		$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor ORDER BY	obra.titulo desc" );
	//} else
		//$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor ORDER BY obra.titulo" );
} else
	$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor" );

?>
	<table>
		<tr bgcolor="lightblue">
			<!--<th>Artista</th>
			<th>Titulo</th>
			<th>Categoria</th>
			<th>Duración</th>
			<th>Nombre Autor</th>
			<th>Imagen</th>  -->
			<th>Nombre Autor <a
				href="mostrarCatalogo.php?busqueda=autor">&#9650;</a> <a
				href="mostrarCatalogo.php?busqueda=autor">&#9660;</a>
			</th>
			<th>Titulo <a>&#9650;</a> <a>&#9660;</a>
			</th>

		</tr>
	<?php
	
	while ( $cancion = $resultado->fetch_object ( 'Obra' ) ) {
		echo "<tr bgcolor='lightgrey'>";
		// echo "<td>" . $cancion->getArtista () . "</td>\n";
		echo "<td><a href='filtroObraAutor.php?id=" . $cancion->getIdAutor () . "'>" . $cancion->getAutor () . " </td>\n";
		echo "<td><a href='mostrarObra.php?idObra=" . $cancion->getIdObra () . "'>" . $cancion->getTitulo () . "</a></td>";
		// echo "<td>" . $cancion->getCategoria(). "</td>\n";
		// echo "<td>" . $cancion->getDuracion() . "</td>\n";
		// echo "<td><img src='img/".$cancion->getimagen()."' width='50px'></td>\n";
		
		// echo "<td>" . $cancion->getTitulo() . "</td>\n";
		echo "</tr>";
	}
	
	?>
	</table>
	<br />
	<br />
	<h3>Buscar obra por título</h3>
	<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
		<label>Nombre de la obra: </label><input type="text" name="obra"> <br />
		<input type="submit" name="enviar" value="Buscar Obra">
	</form>

<?php
mysqli_free_result ( $resultado );
$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor" );
$esta = false;
if (isset ( $_POST ["enviar"] )) {
	// echo "Enviar";
	while ( $cancion = $resultado->fetch_object ( 'Obra' ) ) {
		// strcasecmp($var1, $var2) == 0
		
		// echo $cancion->getTitulo ()."<br/>";
		if (strcasecmp ( $cancion->getTitulo (), $_POST ["obra"] ) == 0) {
			echo "<a href='mostrarObra.php?idObra=" . $cancion->getIdObra () . "'>Obra encotrada</a>";
			$esta = true;
		}
	}
	if (! $esta)
		echo "<p>No se encotro ninguna obra con el nombre - " . $_POST ['obra'] . " -</p>";
}

?>
</body>
</html>