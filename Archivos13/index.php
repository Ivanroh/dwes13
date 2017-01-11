<!DOCTYPE html>
<html><head><meta charset='UTF-8'/></head>
<body>
<?php


$rutaArchivo = "files/modulos.txt";/*
// Pruebas
echo readfile("files/modulos.txt");

echo "<br/>";
echo "<br/>";

$lineasArchivo = file($rutaArchivo);
print_r($lineasArchivo);

echo "<br/>";
echo "<br/>";

$archivo = fopen($rutaArchivo, "r") or die("Imposible abrir el archivo");
echo fread($archivo,filesize($rutaArchivo));
fclose($archivo);

echo "<br/>";
echo "<br/>";

$archivo = fopen($rutaArchivo, "r") or die("Imposible abrir el archivo");
while(!feof($archivo)) {
	echo fgets($archivo) . "<br/>";
}
fclose($archivo);

echo "<br/>";
echo "<br/>";

$archivo = fopen($rutaArchivo, "r") or die("Imposible abrir el archivo");
while(!feof($archivo)) {
	$c = fgetc($archivo);
	if (($c == "\n") or ($c == "\r\n")) echo "<br/>";
	else echo $c;
}
fclose($archivo);


echo "<br/>";
echo "<br/>";

$archivo = fopen($rutaArchivo, "a") or die("Imposible  abrir el archivo para escritura");
fwrite($archivo,"Programación\n");
fwrite($archivo,"Entornos de desarrollo\n");
fclose($archivo);


$archivo = fopen("files/nuevo.txt", "r+") or die("Imposible abrir el archivo");
fwrite($archivo,"Modulo 1\n");
fwrite($archivo,"Modulo 2\n");
echo readfile("files/nuevo.txt");
fclose($archivo);

$modulosNuevos="Programación\nEntornos de desarrollo\n";
$get = file_get_contents("files/nuevo.txt");

$nuevo=$modulosNuevos.$get;

$archivo = fopen("files/nuevo.txt", "w") or die("Imposible  abrir el archivo para escritura");
fwrite($archivo,$nuevo);
echo readfile("files/nuevo.txt");
fclose($archivo);*/






$archivo = fopen("files/modulos.txt", 'r');
if (!$archivo) {
	echo 'No se pudo abrir archivo.txt';
}
//$cont=0;
while(!feof($archivo)) {
		$texto= fgets($archivo);
		echo $texto;
		$linea = explode ( "\n", $texto );
		
		sort($linea);
		
		foreach ($linea as $res){
			echo $res;
			
		}
		
	
	//	echo fgetc($texto). "<br/>";
	
}

/*
while (false !== ($caracter = fgetc($archivo))) {

	echo "$caracter\n";
}*/


fclose($archivo);






/*
$archivo = fopen("files/nuevo.txt", "r") or die("Imposible abrir el archivo");
echo fread($archivo,filesize($rutaArchivo));
fclose($archivo);
*/
?>
</body></html>