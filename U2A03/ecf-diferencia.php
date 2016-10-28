<html>
<body>
<?php
/*Pedir al usuario dos números A y B entre el 1 y el 10. Escribir en pantalla tantos asteriscos
 como diferencia haya entre los números (resolviéndolo con while, mientras uno sea menor
 que otro se escribe asterisco) y repetir con almohadillas (resolviéndolo con for utilizando la
 diferencia entre a y b como número de repeticiones).* /
do{
if (!isset($_POST['enviar'])){
?>
	<form action='ecf-diferencia.php' method='post'>
	Número A (0-10): <input type='text' name='a'>
	Número A (0-10): <input type='text' name='b'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>

<?php
}
else{
	
	
	
	
	if($_POST["a"]==5){
		echo "<p>Producto seleccionado: <h4>".$_POST["a"]."</h4></p>\n";
	}
	else echo "<p>Numero distinto: <h4>".$_POST["a"]."</h4></p>\n";
	if($_POST["b"]==5){
		echo "<p>Cantidad solicitada del producto: <h4>".$_POST["b"]."</h4></p>";
	}
	else echo "<p>Numero distinto: <h4>".$_POST["b"]."</h4></p>\n";
	
	}

}
while($_POST["a"]!=5); 

?>

</body>
</html>
