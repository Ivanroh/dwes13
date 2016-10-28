<html>
<body>
<?php
//Pedir un número X y calcular la suma de los X primeros números naturales (1 + 2 + 3 + ...).

if (!isset($_POST['enviar'])){
	echo "<h2>Suma de los X primeros números naturales</h2>";
?>
	<form action='ecf-suma.php' method='post'>
	Introduzca un número: <input type='text' name='num'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>

<?php
}
else{
	$suma=0;
	for($i=0;$i<$_POST['num'];$i++){
		$suma+=$i;
	}
	echo "<p>Suma de los números naturales hasta ".$_POST['num']." = $suma </p>";
}
	
?>

</body>
</html>