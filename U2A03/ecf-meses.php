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
	Indique si el año es bisiesto Si:<input type="radio" name="group" value="si">
	No:<input type="radio" name="group" value="no">
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>
<?php 
}
else{
	$valido=false;
	switch ($_POST["mes"]){
		case 1 :case strcasecmp("enero",$_POST["mes"]):
		case 3:case strcasecmp("marzo",$_POST["mes"]):
		case 5:case strcasecmp("mayo",$_POST["mes"]):
		case 7:case strcasecmp("julio",$_POST["mes"]):
		case 8:case strcasecmp("agosto",$_POST["mes"]):
		case 10:case strcasecmp("octubre",$_POST["mes"]):
		case 12:case strcasecmp("diciembre",$_POST["mes"]): echo "<p>El mes ".$_POST["mes"]." contiene 31 días</p>";break;

		
		case 4: case strcasecmp("abril",$_POST["mes"]):
		case 6: case strcasecmp("junio",$_POST["mes"]):
		case 9: case strcasecmp("septiembre",$_POST["mes"]):
		case 11:case strcasecmp("noviembre",$_POST["mes"]): echo "<p>El mes ".$_POST["mes"]." contiene 30 días</p>";break;
		
		
		case 2: case strcasecmp("febrero",$_POST["mes"]):
			if(strcasecmp("si",$_POST["group"])==0){
				echo "<p>El mes ".$_POST["mes"]." contiene 29 días</p>";break;
			}
			else if(strcasecmp("no",$_POST["group"])==0)
				
				echo "<p>El mes ".$_POST["mes"]." contiene 28 días</p>";break;
			
		default:echo "<p>Datos mal introducidos, no se corresponde con ningún mes.</p>";break;
	}
	

}

?>