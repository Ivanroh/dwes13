<html>
<body>
<?php
/*Ir pidiendo por formulario una serie de números enteros (de uno en uno) e irlos sumando. Se
deja  de  pedir  números  al  usuario  cuando  la  cantidad  supera    el  valor  50.  Escribir  entonces  la
suma  de  todos  los  números  introducidos.
Pista:  para poder  mantener el  valor  acumulado (antes  de  estudiar  técnicas  más  avanzadas)
utilizar  un  campo  de  formulario  de  tipo  oculto (“hidden”).*/

$acum=0;
if (isset($_POST["acum"]))
	$acum= $_POST["num"];


if($acum<50){
	
	echo "<h2>Acumulador</h2>";
	//$cont++;
	?>
	<form action='ecf-acumulador.php' method='post'>
	Introduzca un número: <input type='text' name='num'>
	<input type='hidden' name='acum'  value='<?php echo isset($_POST["acum"])? $acum : 0;?>'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>
<?php 
	echo "<p>Acumulando $acum</p>";

}
else{
	//$acum+= $_POST["acum"];
	echo "$acum";
	
}


?>
</body>
</html>