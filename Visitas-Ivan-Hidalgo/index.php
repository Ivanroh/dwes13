<html>
<head>
<meta charset='UTF-8' />
<style>
* {
	margin: 5px;
}

.error {
	color: red;
}
</style>
</head>
<body>
<?php
$completado = false;
// Campos:
$autor = $cita = "";
// Errores:
$errorAutor = $errorCita = "";

if (isset ( $_POST ['enviar'] )) {
	// El formulario ha sido enviado: validaciÃ³n
	$autor = $_POST ['autor'];
	$cita = $_POST ['cita'];
	$hoy = date("F j, Y, g:i a");
	$num=array(0,1,2,3,4,5,6,7,8,9);
	if ($autor == "")
		$errorAutor = "El campo nombre no puede estar vaci­o";
	if (strlen ( $autor ) > 10)
		$errorAutor = "El campo autor no puede tener mas de 15 caracteres";
	
	for ($i = 0; $i < count($num); $i++) {
		if(substr($autor, 0)==$num[$i])
			$errorAutor = "El campo autor no puede empezar por números";
	}

	
		
	if ($cita == "")
		$errorCita = "El campo cita no puede estar vaci­o";
		// Comprobar si todo estÃ¡ bien
	
	if ($errorAutor == "" and $errorCita == "")
		$completado = true;
	
	$archivo = fopen ( "files/autores.txt", "a+" ) or die ( "Imposible abrir el archivo" );
	$text = "";
	
	while ( false !== ($caracter = fgetc ( $archivo )) ) {
		$text .= $caracter;
	}
	if ($text!="") {
	$usuRegistrado = explode ( "/", $text );
	$esta = false;
	
		for($i = 0; $i < count ( $usuRegistrado ); $i ++) {
			if (strcasecmp ( $usuRegistrado [$i], $_POST ["autor"] ) == 0) {
				$esta = true;
			}
		}
		
		if ($esta) {
			$errorAutor = "El autor ya esta registrado, inposible añadir";
		} else {
			fwrite ( $archivo, $_POST ["autor"] . "/" );
		}
	}
	else {
		fwrite ( $archivo, $_POST ["autor"] . "/" );
	}
	
	
}

if ($completado) {

	echo $hoy." ".$autor." escribe:\n";
	echo $cita;
	
	echo "<p><a href='".$_SERVER ['PHP_SELF']."'>Volver</a></p>";
	//echo readfile ( "files/autores.txt" );
} else {
	// Mostramos el formulario
	echo "<form action='" . htmlspecialchars ( $_SERVER ['PHP_SELF'], ENT_QUOTES, "UTF-8" ) . "' method='post'>\n";
	echo "<h4>Libro de Visitas Web</h4>";
	echo "<label>Autor de la cita:</label><br/><input type='text' name='autor' value='" . $autor . "'><br/><span class='error'>" . $errorAutor . "</span><br/>\n";
	echo "<label>Cita:</label><br/>";
	echo "<textarea rows='5' cols='30' name='cita' value='" . $cita . "'></textarea><br/>\n";
	echo "<input name='enviar' type='submit' value='Enviar Cita'/></form>";
}

?>
</body>
</html>