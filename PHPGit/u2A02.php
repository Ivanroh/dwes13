<?php
echo "<h1>frase 1</h1>\n";
echo "<h4>frase 2</h4>\n";
echo "<h4>frase 3</h4>\n";
#comentario 
$a =0;
$b=4;

$a+=$b;

echo $a;

// isset (comprobar si tiene valor una variable)

if (isset($b)) {
	echo "<h4>El valor es de $b </h4>\n";
}
else
	echo "no tiene valor";

	//NULL
$c=NULL;

if (isset($c)) {
	echo "<h4>El valor es de $c </h4>\n";
}
else
	echo "<h4>no tiene valor</h4>";

	//solo declarada sin darle valor
	$d;
if (isset($d)) {
	echo "<h4>El valor es de $d </h4>\n";
}
else
	echo "<h4>no tiene valor</h4>";

	
	//& se usa como puntero, indicando una posicion de memoria
	
	$saldo_basico=5;
	$saldo_ivan=&$saldo_basico;
	
	$recarga=10;
	
	$saldo_ivan+=$recarga;
	
	echo "saldo básico: $saldo_basico ";
	echo "saldo ivan $saldo_ivan ";
	echo "iguales porque indican la misma direccion de memoria";
	
	//constantes se utiliza define("CONSTANTE","valor",(boolean)sensible a mayusculas);
	
	define("PI",3.14);
	
	echo "<p>La constante PI es ".PI."</p>";
	echo "<p>La constante PI es ".pi." No toma el valor por la mayusculas</p>";
	
	define("PIBIS",3.14,true);
	
	echo "<p>La constante PI (bis) es ".PIBIS."</p>";
	echo "<p>La constante PI (bis) es ".pibis." toma el valor por definir true en el define();</p>";
	
	
	// tipo de datos String strlen tamaño de la cadena
	
	$cadena="Tipo de datos STRING";
	$primero=$cadena{0};
	$ultimo=$cadena{strlen($cadena)-1};
	
	echo "<p>Primero: $primero Último: $ultimo </p>";
	
	//Arrays
	
	$numeros=array(4,7,6,5,8);
	$letras=array(0=>"T",1=>"A",3=>"Y",4=>"E");
	
	echo "<p>tamaño array numeros ".sizeof($numeros)."</p>\n";
	echo "<p>tamaño array letras ".count($letras)."</p>\n";
	
	echo "<p>Array números: </p>\n";
	var_dump($numeros);
	echo "<p>Array letras: </p>\n";
	print_r($letras);
	echo "<br/>";
	//Array asociativos
	
	$dias=array(1=>"lunes",2=>"martes",3=>"miercoles",4=>"jueves",5=>"viernes");
	echo "<br/>";
	var_dump($dias);
	
	$verano["junio"]=6;
	$verano["julio"]=7;
	$verano["agosto"]=8;
	
	echo "<br/>";
	echo "<br/>";
	
	print_r($verano);
	
	//ordenacion de arrays escalares
	
	sort($numeros);
	
	echo "<h4>Array números ordenado\n".print_r($numeros)."</h4>\n";
	
	echo "algo";
	rsort($letras);
	echo "<h4>Array números ordenado al reves\n".print_r($letras)."</h4>";
	echo "algo";
	
	echo "<br/>";
	echo "<br/>";
	
	echo "<ul>";
	
	foreach ($verano as $fecha => $mes){
		echo "<li>El mes $mes corresponde a la fecha $fecha</li>";
	}
	echo "</ul>";
	
	echo "<table border='1' style='background:#c1c1c1; margin-left:200px; border-color:black;'>";
	
	foreach ($verano as $fecha => $mes){
		echo "<tr>";
		echo "<td style='padding:20px;'>El mes $mes corresponde a la fecha $fecha</td>";
		echo "</tr>";
	}
	
	echo "</table>";
	
	echo "<br/>";
	echo "<br/>";
	
	echo "Ordenacion asociativos por valores:\n";
	asort($verano);
	
	echo "<table border='1' style='background:#c1c1c1;'>";
	
	foreach ($verano as $fecha){
		echo "<tr>";
		echo "<td>Fecha $fecha</td>";
		echo "</tr>";
	}
	
	echo "</table>";
	
	
	echo "Ordenacion asociativos por clave (Key):\n";
	ksort($verano);

	echo "<table border='1' style='background:#c1c1c1; '>";
	
	foreach ($verano as $fecha => $mes){
		echo "<tr>";
		echo "<td>Mes $fecha</td>";
		echo "</tr>";
	}
	
	echo "</table>";
	
	
	echo "<br/>";
	echo "<br/>";
	
	
	echo "<table border='1' style='background:#c1c1c1;'>";
	echo "<tr>";
	echo "<td>".$_SERVER['PHP_SELF']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>".$_SERVER['SERVER_NAME']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>".$_SERVER['HTTP_HOST']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>".$_SERVER['HTTP_USER_AGENT']."</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>".$_SERVER['SCRIPT_NAME']."</td>";
	echo "</tr>";
	
	echo "</table>";
	
	
	var_dump($_SERVER);
	
	echo "<br/>";
	echo "<br/>";
	
	function multiplicar($a,$b):int{
		return $a*$b;
		
	}
	
	function multiplicaPorCuatro($a):int {
		global $b;
		return $a*$b;
	}
	
	echo "<p>Multiplica 2 X 5 = ".multiplicar(2, 5)."</p>";
	
	
	echo "<p>Multiplica por (4) 4 X N (5) = ".multiplicaPorCuatro(5)."</p>";
	
	echo "<p>Hoy es ".date("d/m/y") ."\nHora: ".date("h:i")."</p>";
	echo "<p>Hoy es ".date("D,M,Y") ."\nHora: ".date("H,I")."</p>";
	
	
	echo "<h3>Include:</h3>";
	include 'newfile.php';
	
?>