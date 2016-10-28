<html>
<body>
<?php
/*Pedir al usuario dos números A y B entre el 1 y el 10. Escribir en pantalla tantos asteriscos
 como diferencia haya entre los números (resolviéndolo con while, mientras uno sea menor
 que otro se escribe asterisco) y repetir con almohadillas (resolviéndolo con for utilizando la
 diferencia entre a y b como número de repeticiones).*/
 
//do{
if (!isset($_POST['enviar'])){
	echo "<h2>Diferencia entre dos números</h2>";
?>
	<form action='ecf-diferencia.php' method='post'>
	Número A (0-10): <input type='text' name='a'>
	Número B (0-10): <input type='text' name='b'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>

<?php
}
else{

	echo "<p>while</p>\n";
	$j=0;
	
	if($_POST["a"] == $_POST["b"]){
		echo "<p>Números iguales</p>\n";
	}else if($_POST["a"] < $_POST["b"]){
	
		
		while($j < ($_POST["b"]-$_POST["a"])){
			echo "<p>*</p>\n";
			$j++;
		}
	
	}
	else if($_POST["a"] > $_POST["b"]){
	
		
		while($j < ($_POST["a"]-$_POST["b"])){
			echo "<p>*</p>\n";
			$j++;
		}
	
	}
	else
		echo "<h4>Error datos mal introducidos</h4>\n";
	
	
	
	echo "<p>for</p>\n";
	
	if($_POST["a"] == $_POST["b"]){
		echo "<p>Números iguales</p>\n";
	}else if($_POST["a"] < $_POST["b"]){
		
		for ($i=0;$i<($_POST["b"]-$_POST["a"]);$i++){
			
			echo "<p>#</p>\n";
			
		}
		
	}
	else if($_POST["a"] > $_POST["b"]){
		
		for ($i=0;$i<($_POST["a"]-$_POST["b"]);$i++){
				
			echo "<p>#</p>\n";
				
		}
		
	}
	else 
		echo "<h4>Error datos mal introducidos</h4>\n";
}
		
//}while($_POST["a"]!=5); 

?>

</body>
</html>
