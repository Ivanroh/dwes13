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

$obra = "no";
$varBus = "";
$select = "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor";

if (isset ( $_REQUEST ["nom"] )) {
	
	if (isset ( $_SESSION ["busqueda"] )) {
		$varBus = $_SESSION ["busqueda"];
	}
	
	if ($_REQUEST ["nom"] == "autor") {
		if ($_REQUEST ["orden"] == "desc") {
			$select = "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $varBus . "%' ORDER BY autor.nombre desc";
		} else
			$select = "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $varBus . "%' ORDER BY	autor.nombre";
	} elseif ($_REQUEST ["nom"] == "titulo") {
		
		if ($_REQUEST ["orden"] == "desc") {
			$select = "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $varBus . "%' ORDER BY	obra.titulo desc";
		} else
			$select = "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $varBus . "%' ORDER BY obra.titulo";
	}
	$_SESSION ["select"] = $select;
}

if (isset ( $_SESSION ["select"] ))
	$resultado = $conexion->query ( $_SESSION ["select"] );
else
	$resultado = $conexion->query ( $select );

if (isset ( $_GET ["busqObra"] )) {
	$_SESSION ["busqueda"] = $_GET ["busqObra"];
	$resultado = $conexion->query ( "SELECT *,nombre AS autor FROM obra,autor where autor.id=obra.idAutor and titulo like '%" . $_SESSION ["busqueda"] . "%'" );
}


if (isset ( $_REQUEST ["cerrarSesion"] )) {
	$_SESSION = array ();
	session_unset ();
	if (ini_get ( "session.use_cookies" )) {
		$params = session_get_cookie_params ();
		setcookie ( session_name (), '', time () - 42000, $params ["path"], $params ["domain"], $params ["secure"], $params ["httponly"] );
	}
	session_destroy ();
	header("Refresh:0;mostrarcatalogo.php");
}

?>



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
<script type="text/javascript">
</script>
<body class="container">
	<h1>Proyecto Artistas - Canciones <small>Iván Rodrigo Hidalgo García</small></h1>
	<br>


	<form action="<?php $_SERVER["PHP_SELF"]?>" method="get">
		<div class="form-group">
			<input type="text" name="busqObra" class="form-control"
				placeholder="Buscar obra por título">
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Nombre Autor <a
					href="mostrarCatalogo.php?nom=autor&orden=asc&obra=<?php echo $obra?>">
						<span class="glyphicon glyphicon-sort-by-alphabet"></span>
				</a> <a
					href="mostrarCatalogo.php?nom=autor&orden=desc&obra=<?php echo $obra?>">
						<span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
				</a>
				</th>
				<th>Titulo <a
					href="mostrarCatalogo.php?nom=titulo&orden=asc&obra=<?php echo $obra?>">
						<span class="glyphicon glyphicon-sort-by-alphabet"></span>
				</a> <a
					href="mostrarCatalogo.php?nom=titulo&orden=desc&obra=<?php echo $obra?>">
						<span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
				</a>
				</th>

			</tr>
	<?php
	
	while ( $cancion = $resultado->fetch_object ( 'Obra' ) ) {
		echo "<tr bgcolor='lightgrey'>";
		echo "<td><a href='filtroObraAutor.php?id=" . $cancion->getIdAutor () . "'>" . $cancion->getAutor () . " </td>\n";
		echo "<td><a href='mostrarObra.php?idObra=" . $cancion->getIdObra () . "'>" . $cancion->getTitulo () . "</a></td>";
		echo "</tr>";
	}
	
	?>
	</table>
	</div>
	<a href="<?php echo $_SERVER['PHP_SELF']."?cerrarSesion=true"?>">Eliminar filtros</a>
	<br />
	<br />

</body>
</html>