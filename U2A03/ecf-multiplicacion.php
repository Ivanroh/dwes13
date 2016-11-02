<?php
//Pedir un número X y mostrar su tabla de multiplicar.

if(!isset($_POST["enviar"])){
	echo "<h2>Tabla de multiplicar de un número</h2>";

	?>
	<form action='ecf-multiplicacion.php' method='post'>
	Introduzca un número: <input type='text' name='num'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>
<?php 
}
else{
	echo "<p>Tabla de multiplicar del número ".$_POST["num"].":</p>\n";
	
	for($i=0; $i <= 10; $i++){
		echo "<p>".$_POST["num"]." x  $i = ".($i*$_POST["num"])." </p>\n";	
	}

	
}

?>