<html>
<body>
<?php
/*Mostrar  en  pantalla  los  múltiplos  de  3  y  5  entre  el  1  y  el  1000.  A  continuación  mostrar  en
pantalla los 20 primeros múltiplos de 3 y 5.*/

echo "<h2>Múltiplos de 3 y 5 (1-1000)</h2>\n";
$i=1;

echo "<p>Múltiplos de 3: </p>\n";
for ($i=1;$i<=1000;$i++){
	if($i%3==0){
		echo "<p>$i</p>\n";
	}
}


echo "<p>Mútiplos de 5:</p>\n";
for ($j=1;$j<=1000;$j++){
	if($j%5==0){
		echo "<p>$j</p>\n";
	}
}

echo "<h2>20 primeros múltiplos de 3 y 5</h2>";

echo "<p>Múltiplos de 3: </p>\n";
$cont=0;
for ($i=1;$i<=1000 && $cont<20;$i++){
	if($i%3==0){
		echo "<p>$i</p>\n";
		$cont++;
	}
}

echo "<p>Mútiplos de 5:</p>\n";

$cont=0;
for ($i=1;$i<=1000 && $cont<20;$i++){
	if($i%5==0){
		echo "<p>$i</p>\n";
		$cont++;
	}
}

?>
<form action='index.php'>
<input type='submit' value='Volver'>
</form>

</body>
</html>