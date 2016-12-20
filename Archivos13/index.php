<!DOCTYPE html>
<html><head><meta charset='UTF-8'/></head>
<body>
<?php
$rutaArchivo = "files/modulos.txt";
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
/*
$archivo = fopen($rutaArchivo, "a") or die("Imposible  abrir el archivo para escritura");
fwrite($archivo,"Programación\n");
fwrite($archivo,"Entornos de desarrollo\n");
fclose($archivo);
*/

?>
</body></html>