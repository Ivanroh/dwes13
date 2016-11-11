<html>
<body>
<?php
//Pedir dos números A y B y calcular la potencia A elevado a B utilizando iteraciones (no una 
//función matemática predefinida).

if (!isset($_POST['enviar'])){
	echo "<h2>Potencia de un número</h2>";
?>
	<form action='ecf-potencia.php' method='post'>
	Número A (1-10): <input type='text' name='a'>
	Número B (1-10): <input type='text' name='b'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>

<?php
}
else{
	$potencia=1;
	
	for($i=0; $i < $_POST['b'] ; $i++){
		$potencia*=$_POST['a'];
	}
	echo "<p>Potencia de ".$_POST['a']." elevado a ".$_POST['b']." = $potencia</p>";
}
	
?>

<form action='index.php'>
<input type='submit' value='Volver'>
</form>

</body>
</html>