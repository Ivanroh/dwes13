<html>
<body>
<?php
/*Ir pidiendo por formulario una serie de números enteros (de uno en uno) e irlos sumando. Se
deja  de  pedir  números  al  usuario  cuando  la  cantidad  supera    el  valor  50.  Escribir  entonces  la
suma  de  todos  los  números  introducidos.
Pista:  para poder  mantener el  valor  acumulado (antes  de  estudiar  técnicas  más  avanzadas)
utilizar  un  campo  de  formulario  de  tipo  oculto (“hidden”).*/


if (isset($_POST["acum"]))
	$acum= $_POST["acum"]+$_POST["num"];
else 
	$acum=0;

if($acum<50){
	echo "<h2>Acumulador</h2>";
	?>
	<form action='ecf-acumulador.php' method='post'>
	Introduzca un número: <input type='text' name='num'>
	<input type='hidden' name='acum'  value='<?php echo $acum?>'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>
<?php 
	echo "<p>Acumulando $acum</p>";

}
else{
	echo "suma superada total $acum";
	
}

?>
<form action='index.php'>
<input type='submit' value='Volver'>
</form>

</body>
</html>