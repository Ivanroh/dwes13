<html>
<head>
<title>Conexión a BBDD con PHP</title>
<meta charset="UTF-8" />
</head>
<body>
	<h2>Pruebas con la base de datos</h2>
<?php
include "Obra.php";
$servidor = "localhost";
$usuario = "alumno";
$clave = "alumno";
?>

<?php
$conexion = new mysqli ( $servidor, $usuario, $clave, "catalogo" );
$conexion->query ( "SET NAMES 'UTF8'" );
if ($conexion->connect_errno) {
	echo "<p>Error al establecer la conexión (" . $conexion->connect_errno . ") " . $conexion->connect_error . "</p>";
}

$obra = "no";

if (isset ( $_REQUEST ["nom"] )) {
	
	if ($_REQUEST ["nom"] == "autor") {
		if ($_REQUEST ["orden"] == "desc") {
			$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor ORDER BY	autor.nombre desc" );
		} else
			$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor ORDER BY	autor.nombre" );
	} elseif ($_REQUEST ["nom"] == "titulo") {
		
		if ($_REQUEST ["orden"] == "desc") {
			$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor ORDER BY	obra.titulo desc" );
		} else
			$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor ORDER BY obra.titulo" );
	}
} else
	$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor" );

if (isset ( $_GET ["obra"] )) {
	
	if ($_GET ["obra"] != "no") {
		
		$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $_REQUEST ["obra"] . "%'" );
		$obra = $_GET ["obra"];
		if (isset ( $_REQUEST ["nom"] )) {
			
			if ($_REQUEST ["nom"] == "autor") {
				if ($_REQUEST ["orden"] == "desc") {
					$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $_REQUEST ["obra"] . "%' ORDER BY	autor.nombre desc" );
				} else
					$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $_REQUEST ["obra"] . "%' ORDER BY	autor.nombre" );
			} elseif ($_REQUEST ["nom"] == "titulo") {
				
				if ($_REQUEST ["orden"] == "desc") {
					$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $_REQUEST ["obra"] . "%' ORDER BY	obra.titulo desc" );
				} else
					$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $_REQUEST ["obra"] . "%' ORDER BY obra.titulo" );
			}
		}
	}
} else
	$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor" );

?>
<h3>Buscar obra por título</h3>
	<form action="<?php $_SERVER["PHP_SELF"]?>" method="get">
		<label>Nombre de la obra: </label><input type="text" name="obra"> <br />
		<input type="submit" name="enviar" value="Buscar Obra">
	</form>
	<table>
		<tr bgcolor="lightblue">
			<th>Nombre Autor <a
				href="mostrarCatalogo.php?nom=autor&orden=asc&obra=<?php echo $obra?>">&#9650;</a>
				<a
				href="mostrarCatalogo.php?nom=autor&orden=desc&obra=<?php echo $obra?>">&#9660;</a>
			</th>
			<th>Titulo <a
				href="mostrarCatalogo.php?nom=titulo&orden=asc&obra=<?php echo $obra?>">&#9650;</a>
				<a
				href="mostrarCatalogo.php?nom=titulo&orden=desc&obra=<?php echo $obra?>">&#9660;</a>
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
	
	<?php echo "<br/><a href='mostrarCatalogo.php'>Eliminar filtros</a>";?>
	<br />
	<br />
	

<?php 
/*
	       * mysqli_free_result ( $resultado );
	       * $resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor" );
	       * $esta = false;
	       * if (isset ( $_POST ["enviar"] )) {
	       *
	       * while ( $cancion = $resultado->fetch_object ( 'Obra' ) ) {
	       *
	       * if (strcasecmp ( $cancion->getTitulo (), $_POST ["obra"] ) == 0) {
	       * echo "<tr bgcolor='lightgrey'>";
	       * echo "<td><a href='filtroObraAutor.php?id=" . $cancion->getIdAutor () . "'>" . $cancion->getAutor () . " </td>\n";
	       * echo "<td><a href='mostrarObra.php?idObra=" . $cancion->getIdObra () . "'>" . $cancion->getTitulo () . "</a></td>";
	       * echo "</tr>";
	       * $esta = true;
	       * }
	       * }
	       * if (! $esta)
	       * echo "<p>No se encotro ninguna obra con el nombre - " . $_POST ['obra'] . " -</p>";
	       * }
	       */

?>
</body>
</html>