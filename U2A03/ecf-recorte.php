<?php
/*Ejercicio 6: “ecf-recorte.php”
Pedir una cadena de texto y mostrarla varias veces: en cada línea se mostrará un carácter
menos que en la anterior. Sólo se puede usar una función de strings: “strlen()”*/

if(!isset($_POST["enviar"])){
	echo "<h2>Recorte de una cadena de texto</h2>";

	?>
	<form action='ecf-recorte.php' method='post'>
	Introduzca una cadena de texto: <input type='text' name='cadena'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>
<?php 
}
else{
	echo "<p>Cadena con recortes: </p>\n";
	
	for($i=strlen($_POST["cadena"]); $i >= 0 ; $i--){
		echo "<p>";
		for($j=0; $j < $i; $j++){
			echo $_POST["cadena"][$j];
			
		}
		echo "</p>";

		echo "\n";
	}
}

?>