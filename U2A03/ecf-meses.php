<?php
/*Ejercicio 7: “ecf-meses”
En un formulario se recogerá un valor en un cuadro de texto y un radio group para indicar si el
año  actual  es  bisiesto  o  no.  Habrá  que  comprobar  si el  valor  leído  corresponde  al
número de un mes (de 1 a 12) o a su nombre (“enero”, “febrero”). Si es así se mostrará el número de días
que  tiene  ese  mes,  y  si  no  es  así  se  mostrará  un  error.  Nota:  para  comparar  String,  busca
referencia de las funciones strcmp y strcasecmp. */

if(!isset($_POST["enviar"])){
	echo "<h2>Número de días de un mes</h2>";

	?>
	<form action='ecf-meses.php' method='post'>
	Introduzca un mes: <input type='text' name='mes'>
	Marque si el año es bisiesto: <input type="radio" name="group">
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>
<?php 
}
else{
	$valido=false;
	//$c=$_POST["mes"];
	
	if(1==1){
		echo "<p>".$_POST["mes"]."</p>";
	}
	
	if (strnatcasecmp ( "Enero" ,"Enero")){
	
		echo "<p>uno</p>";
		
	}
	else 
		echo "<p>no</p>";
	

}

?>