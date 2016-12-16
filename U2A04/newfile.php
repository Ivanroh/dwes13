<!DOCTYPE HTML>
<html>
<head>
<title>Validacion</title>
<style>
.error {
	color: #FF0000;
}

form {
	border-style: solid;
}
</style>
</head>
<body>

<?php
$nombreErr = $emailErr = $generoErr = $fbErr = $twErr = $fechaErr = "";
$nombre = $email = $genero = $comentario = $fb = $tw = $twlink = $fecha = "";

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	// Comprobamos que el nombre contenga solo letras y espacios
	if (empty ( $_POST ["nombre"] )) {
		$nombreErr = "Se requiere un nombre";
	} else {
		$nombre = test_input ( $_POST ["nombre"] );
		if (! preg_match ( "/^[a-zA-Z ]*$/", $nombre )) { // funcion para comprobar que solo existen letras y espacios
			$nombreErr = "Solo espacios y letras";
		}
	}
	// Comprobamos que la fecha no sea mayor del año actual ni menor que la fecha de nacimiento que la persona más vieja del mundo
	if (empty ( $_POST ["fecha"] )) {
		$fechaErr = "Se requiere un año";
	} else {
		$fecha = test_input ( $_POST ["fecha"] );
		if ($fecha > date ( "Y" )) { // Comprobamos que la fecha no es mayor del año actual
			$fechaErr = "El año introducido es demasiado grande";
		}elseif ($fecha < date ( "Y" ) - 116) { // Comprobamos que la fecha no es menor que la fecha de nacimiento de la persona más vieja del mundo
			$fechaErr = "El año introducido es demasiado pequeño";
		}
		if (! preg_match ( "/^[0-9]*$/", $fecha )) { // Comprobamos que la fecha solo contiene numeros
			$fechaErr = "Solo 4 numeros";
		}
	}

	if (empty ( $_POST ["fb"] )) {
		$fbErr = "Facebook es campo obligatorio";
	} else {
		$fb = test_input ( $_POST ["fb"] );
		if (! filter_var ( $fb, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED )) { // Comprobamos que la pagina contiene un dominio y una ruta de acceso
			$fbErr = "Formato de Facebook es invalido";
		}
		if (stripos ($fb, "facebook" ) === false) { //Comprobamos que en el enlace esté la palabra facebook
			$fbErr = "el link introducido no es de facebook";
		}
	}
	if (empty ( $_POST ["tw"] )) {
		$twErr = "Twitter es campo obligatorio";
	} else {
		$tw = test_input ( $_POST ["tw"] );
		if (! preg_match ( "/^[a-zA-Z @]*$/", $tw ) || $tw [0] != "@") { //Comprobamos que nos da el nombre con "@"
			$twErr = "Formato de Twitter es invalido";
		}

		else {
			$twlink = "http://twitter.com/" . substr ( $tw, 1 ); //Creamos el link completo de Twitter
		}
	}
	if (empty ( $_POST ["email"] )) {
		$emailErr = "Email es campo obligatorio";
	} else {
		$email = test_input ( $_POST ["email"] );
		if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) { //Comprobamos que el email es valido
			$emailErr = "Formato de email es invalido";
		}
	}
	if (empty ( $_POST ["comentario"] )) {
		$comentario = "";
	} else {
		$comentario = test_input ( $_POST ["comentario"] );
	}

	if (empty ( $_POST ["genero"] )) {
		$generoErr = "El genero es requerido";
	} else {
		$genero = test_input ( $_POST ["genero"] ); //Comprobamos que el genero está introducido
	}
}
function test_input($data) {
	$data = trim ( $data );
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data );
	return $data;
}
?>

<h2>Ejemplo de validacion de formularios en PHP</h2>
	<p>
		<span class="error">* Campo requerido.</span>
	</p>
	<form method="post"
		style="text-align: center; background-color: lightblue"
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Nombre: <br> <input type="text" name="nombre"
			value="<?php echo $nombre;?>"> <br> <span class="error">* <?php echo $nombreErr;?></span>
		<br>
		<br> Año de nacimiento: <br> <input type="text" name="fecha"
			placeholder="1900" value="<?php echo $fecha;?>" maxlength="4"> <br> <span
			class="error">* <?php echo $fechaErr;?></span> <br>
		<br> E-mail: <br> <input type="text" name="email"
			placeholder="example@example.com" value="<?php echo $email;?>"> <br>
		<span class="error">* <?php echo $emailErr;?></span> <br>
		<br> Facebook: <br> <input type="text" name="fb"
			placeholder="http://facebook.com/example" value="<?php echo $fb;?>">
		<br> <span class="error">* <?php echo $fbErr;?></span> <br>
		<br> Twitter: <br> <input type="text" name="tw" placeholder="@example"
			value="<?php echo $tw;?>"> <br> <span class="error">* <?php echo $twErr;?></span>
		<br>
		<br> Comentario: <br>
		<textarea name="comentario" rows="5" cols="40" noresize><?php echo $comentario;?></textarea>
		<br>
		<br> Genero: <br> <input type="radio" name="genero"
			<?php if (isset($genero) && $genero=="mujer") echo "checked";?>
			value="mujer">Mujer <input type="radio" name="genero"
			" <?php if (isset($genero) && $genero=="hombre") echo "checked";?>
			value="hombre">Hombre <br> <span class="error">* <?php echo $generoErr;?></span>
		<br>
		<br> <input type="submit" name="submit" value="Enviar">
	</form>

<?php
echo "<h2>Datos introducidos</h2>";
echo $nombre;
echo "<br>";
echo $fecha;
echo "<br>";
echo "<a href=\"mailto:$email\">E-mail</a>";
echo "<br>";
echo "<a href=\"$fb\">Facebook</a>";
echo "<br>";
echo "<a href=\"$twlink\">Twitter</a>";
echo "<br>";
echo $comentario;
echo "<br>";
echo "Genero: $genero ";
echo "<br>";
echo "<hr>";

echo "Bibliografia";
echo "<br>";
echo "<a href=\"http://www.w3schools.com/php/default.asp\">W3School (Documentacion en ingles)</a>";
echo "<br>";
echo "<a href=\"http://php.net\">PHP Manual (Documentacion en ingles y español)</a>";
echo "<br>";
echo "Otras busquedas en Google";

?>

</body>
</html>