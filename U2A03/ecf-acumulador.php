<?php
/*Ir pidiendo por formulario una serie de números enteros (de uno en uno) e irlos sumando. Se
deja  de  pedir  números  al  usuario  cuando  la  cantidad  supera    el  valor  50.  Escribir  entonces  la
suma  de  todos  los  números  introducidos.
Pista:  para poder  mantener el  valor  acumulado (antes  de  estudiar  técnicas  más  avanzadas)
utilizar  un  campo  de  formulario  de  tipo  oculto (“hidden”).*/

$cont=0;$suma=0;
if(!isset($_POST["enviar"]) /*|| $suma<50*/){
	echo "<h2>Acumulador</h2>";
	//$cont++;
	?>
	<form action='ecf-acumulador.php' method='post'>
	Introduzca un número: <input type='text' name='num'>
	<input type='hidden' name='suma'  value="<?=$_POST["num"]?>">
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>
<?php 

//echo $_POST["suma"];

echo "<p>Suma $suma</p>";

}
else{
	echo $_POST["suma"];
	//echo "<p>Suma total $suma</p>";
}


?>