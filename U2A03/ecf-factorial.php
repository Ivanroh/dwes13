<html>
<body>
<?php

//Pedir un número X y calcular su factorial utilizando iteraciones.
if(!isset($_POST["enviar"])){
	echo "<h2>Factorial de un número</h2>";

?>
	<form action='ecf-factorial.php' method='post'>
	Introduzca un número: <input type='text' name='num'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>
<?php 
}
else{
	$fact=1;
	for($i=1; $i <= $_POST["num"]; $i++){
		$fact*=$i;	
	}
	echo "<p>Factorial del número ".$_POST["num"].":</p>\n";
	echo "<p>$fact</p>";
	
}

?>
</body>
</html>