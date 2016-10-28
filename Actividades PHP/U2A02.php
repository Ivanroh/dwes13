<?php

/*1. Comentarios de los tres tipos

* 
* 
*  */

# Sentencias echo con los dos tipos de comillas
$var="frase";
echo "<h4>$var comillas dobles</h4>\n";
echo '<h4>'.$var.' comillas simples</h4>';
echo "<br/>";
echo "<hr/>";
echo "<br/>";
// Uso de al menos tres operadores de comparación y dos operadores lógicos

if (1==1)
	echo "<p>1 igual a 1</p>";
if(1>0)
	echo "<p>1 mayor que 0</p>";

if(1!=0)
	echo "<p>1 distintor que 0</p>";


if (1==1 && 1!=0){
	echo "<p>1 es igual a 1 y 1 es distinto de 0</p>";
}

if (1==1 || $var="v"){
	echo '<p>1 es igual a 1, $var no es igual a (v)</p>';
}
echo "<br/>";
echo "<hr/>";
echo "<br/>";
/* Uso de un operador de asignación*/
$variable="asignacion";
echo '<p>Valor $variable = '.$variable.' </p>';
echo "<br/>";
echo "<hr/>";
echo "<br/>";
// Declaración y uso de una variable por referencia

$saldo_basico=5;
$saldo_ivan=&$saldo_basico;

$recarga=10;

$saldo_ivan+=$recarga;

echo "saldo básico: $saldo_basico ";
echo "saldo ivan $saldo_ivan ";
echo "iguales porque indican la misma direccion de memoria";
echo "<br/>";
echo "<hr/>";
echo "<br/>";
/* Declaración y uso de dos constantes, una que obligue a respetar las mayúsculas
 * en su uso y otra que no lo haga
 */

define("PI",3.14);

echo "<p>La constante PI es ".PI."</p>";
echo "<p>La constante PI es ".pi." No toma el valor por la mayusculas</p>";

define("PIBIS",3.14,true);

echo "<p>La constante PI (bis) es ".PIBIS."</p>";
echo "<p>La constante PI (bis) es ".pibis." toma el valor por definir true en el define();</p>";
echo "<br/>";
echo "<hr/>";
echo "<br/>";

//Declaración y uso de un variable booleana y otra de tipo double
$valido=true;
$tipDouble=3.5;
if ($valido)
	echo '<p>Es true por tanto muestra el double: '.$tipDouble.' </p>';

echo "<br/>";
echo "<hr/>";
echo "<br/>";

//Uso de is_numeric, is_boolean y is_double con estas variables

if (is_numeric($tipDouble))
	echo '<p>Es númerico: '.$tipDouble.' </p>';

//if(is_boolean($valido))
	echo '<p>Es booleana: '.$valido.'</p>';

if(is_double($tipDouble))
	echo '<p>Es double: '.$tipDouble.' </p>';
	echo "<br/>";
	echo "<hr/>";
	echo "<br/>";
/*Declaración de una variable de tipo string. Pruebas con la función *strlen* 
y con tres de las funciones indicadas en el enlace.*/
	$cadena="Tipo de datos STRING";
	$primero=$cadena{0};
	$ultimo=$cadena{strlen($cadena)-1};
	
	echo "<p>Primero: $primero Último: $ultimo </p>";
	echo "<br/>";
	echo "<hr/>";
	echo "<br/>";
	//Declaración de un array escalar y uno asociativo
	
	$numeros=array(4,7,6,5,8);
	
	$verano["junio"]=6;
	$verano["julio"]=7;
	$verano["agosto"]=8;
	
	/*Ordenación y volcado de información con *var_dump* siguiendo dos criterios 
	de ordenación en cada uno de los arrays*/
	
	echo "<h4>Array (escalar) números ordenado: </h4>\n";
	sort($numeros);
	var_dump($numeros);
	
	echo "<br/>";
	echo "<br/>";
	
	echo "<h4>Array asociativo ordenado por clave (Key): </h4>\n";
	ksort($verano);
	var_dump($verano);
	echo "<br/>";
	echo "<hr/>";
	echo "<br/>";
	//Una estructura de control de cada tipo (if-elsif-else, switch, while, do-while, for)
	
	
	echo "<h4>if-elsif-else</h4>";
	if(1==0)
		echo "<p>Primera condición (if) </p>";
	elseif ("1"=="2")
		echo "<p>Segunda condición (elseif) </p>";
	else 
		echo "<p>Tercera condición (else) </p>";
	
		
		echo "<br/>";
		echo "<br/>";
		echo "<h4>switch</h4>";
		$clave=0;
	switch ($clave){
		case 1:echo "<p>Primer caso </p>";break;
		case 2:echo "<p>Segundo caso </p>";break;
		default:echo "<p>Caso por defecto </p>";break;
		
	}
	
	echo "<br/>";
	echo "<br/>";
	echo "<h4>while</h4>";
	while ($clave!=3){
		echo "<p>".$clave." </p>";
		$clave++;
	}
	
	echo "<h4>do-while</h4>";
	$clave=0;
	do{
		echo "<p>".$clave." </p>";
		$clave++;
	}while($clave!=3);
	
	
	echo "<br/>";
	echo "<br/>";
	
	echo "<h4>for</h4>";
	
	for ($i = 0; $i < $clave; $i++){
		echo "<p>".$i." </p>";
	}
	
	echo "<br/>";
	echo "<hr/>";
	echo "<br/>";
	
	//Un recorrido por cada uno de los dos arrays utilizando foreach, 
	//generando por ejemplo una lista ordenada con sus elementos
	
	foreach ($verano as $fecha => $mes){
		echo "<tr>";
		echo "<td>El mes $mes corresponde a la fecha $fecha</td>";
		echo "</tr>";
	}
	
	echo "<br/>";
	echo "<hr/>";
	echo "<br/>";
	
	//Dos pruebas con la variable superglobal _SERVER
	echo "<table border='1' style='background:#c1c1c1;'>";
	echo "<caption style='background:#c1c1c1;'>superglobal _SERVER</caption>";
	echo "<tr>";
	echo "<td>".$_SERVER['PHP_SELF']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>".$_SERVER['SERVER_NAME']."</td>";
	echo "</tr>";
	echo "</table>";
	echo "<br/>";
	echo "<hr/>";
	echo "<br/>";
	
	//Dos pruebas de funciones: una devolverá algun tipo, la otra no
	
	function multiplicar($a,$b):int{
		return $a*$b;
	
	}
	
	echo "<p>Multiplica 2 X 5 = ".multiplicar(2, 5)."</p>";
	
	echo "<br/>";
	echo "<br/>";
	
	
	function imprimirNombre(){
		$nombre=array(0=>"I",1=>"V",3=>"Á",4=>"N");
		echo "<p>Nombre:</p>";
		foreach ($nombre as $letra){
			echo "<p>".$letra."</p>";
		}
		
	}
	
	echo "<p>".imprimirNombre()."</p>";
	
	echo "<br/>";
	echo "<hr/>";
	echo "<br/>";
	
	//Una función que utilice una variable global
	$a=4;
	function multiplicaPorCuatro($a):int {
		global $b;
		return $a*$b;
	}
	
	echo "<p>Multiplica por cuatro 4 X 5 = ".multiplicaPorCuatro(5)."</p>";
	
	echo "<br/>";
	echo "<hr/>";
	echo "<br/>";
	
	//Un formulario que reciba datos y los muestre por pantalla
	
	if (!isset($_POST['enviar'])){
		?>
		<form action='Formularios.php' method='post'>
		Producto: <input type='text' name='producto'>
		Cantidad solicitada: <input type='text' name='cantidad'>
		<input type='submit' name='enviar' value='Enviar Formulario'>
		</form>
	
	<?php
	}
	else{ 
		echo "<p>Producto seleccionado: <h4>".$_POST["producto"]."</h4></p>\n";
		echo "<p>Cantidad solicitada del producto: <h4>".$_POST["cantidad"]."</h4></p>";
	
	}
	
	
?>