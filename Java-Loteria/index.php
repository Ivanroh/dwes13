<html>
<head>
<title>Lotería</title>
<meta charset="UTF-8"/>
<style>
	* {margin:5px; }
	.error {color: red}
	.premio {color: green}
</style>
</head>
<body>
<h2>Comprobación de números de lotería</h2>
<?php
$rutaArchivo = "files/loteria.txt";
$error = false;
$errorNumero = $errorCantidad = "";

if (isset($_POST['enviar'])) {
	$error = false;
	if (!is_numeric($_POST["numero"])) {
		$errorNumero = "Debes introducir un valor numérico";
		$error = true;
	}
	if (strlen($_POST["numero"])<5 || strlen($_POST["numero"])>5) {
		$errorNumero = "El número debe tener cinco dígitos";
		$error = true;
	}
	if (!is_numeric($_POST["cantidad"])) {
		$errorCantidad = "Debes introducir un valor numérico";
		$error = true;
	}
	
	if (!$error) {
		$numeroJugado = $_POST["numero"];
		$cantidad = $_POST["cantidad"];
		// Paso 1: cargar en memoria los pares número - premio del archivo
		
		/* $lineasArchivo: array que contiene las líneas leídas del archivo
		 * $linea: la línea actual que estamos recorriendo
		 * $par: array que contiene dos elementos, el par número - premio
		 * $loteria: array asociativo que almacena los pares número - premio del archivo
		 */
		$lineasArchivo = file($rutaArchivo);
		foreach ($lineasArchivo as $linea) {
			$par = explode(" ", $linea); 
			$loteria[$par[0]] = $par[1];
		}
		// Paso 2: comprobar el número del usuario
		if (array_key_exists($numeroJugado, $loteria)) { // ver comentario al final del archivo
			$premio = $loteria[$numeroJugado] * $cantidad;
			echo "<h3 class='premio'>¡¡ Te han tocado $premio &euro; !!</h3>";
		}
		else {
			echo "<h3>No te ha tocado nada, sigue participando</h3>";
		}
	}
}
?>

<h3>Comprueba tu número:</h3>	
<form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
	<label>¿Qué número has jugado?</label>
	<input type="text" name="numero"/>
	<?php echo "<span class='error'>$errorNumero</span>"?> <br/>
	<label>¿Cuántos billetes has comprado?</label>
	<input type="text" name="cantidad">
	<?php echo "<span class='error'>$errorCantidad</span>"?> <br/>
	<input type="submit" name="enviar" value="Comprobar número"/>
</form>

</body>
</html>
<!--
Existen otras formas de comprobar si una clave de un array asociativo existe.  

Ejemplo 1: 

$premiado = $false;
foreach($loteria as $numero=>$premio){
	if($numero==$numeroJugado)
		$premiado=true;
}
			
Ejemplo 2:

$premiado = $false;
foreach(array_keys($loteria) as $numero){
	if($numero==$numeroJugado)
		$premiado=true;
}
-->