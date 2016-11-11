<html>
<body>
<?php
/* Pedir un número X y generar un cuadrado como el que se muestra en la figura (en este caso X vale 10). 
Una  vez  resuelto,  mejorarlo  para  que  las  filas  pares  salgan  en  un  color  más  claro 
(lightblue por ejemplo) para facilitar la lectura. En la figura se ha usado un “padding” de 3 para 
los elementos de celda (td).*/

if (!isset($_POST['enviar'])){
	echo "<h2>Generador de un cuadrado</h2>";
	?>
	<form action='ecf-cuadrado.php' method='post'>
	Número: <input type='text' name='num'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>

<?php
}
else{
	$mul=1;
	echo "<table style='border:solid 1px;'>";
		
	for ($i=1;$i<=$_POST["num"];$i++){
		
		echo "<tr>";
		
		for ($j=1;$j<=$_POST["num"];$j++){
			$resul=$j*$mul;
			if($mul%2==0)
				echo "<td style='padding:3px;border:solid 1px;text-align:center;background:lightblue;'>$resul</td>";
			else
				echo "<td style='padding:3px;border:solid 1px;text-align:center;'>$resul</td>";
		}

		echo "</tr>";
		$mul++;
	}
	
	echo "</table>";

}

?>

<form action='index.php'>
<input type='submit' value='Volver'>
</form>

</body>
</html>