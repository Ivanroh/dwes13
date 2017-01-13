<html>
<head>
<meta charset='UTF-8' />
<style>
	* {margin: 5px;}
	.error { color: red; }
</style>
</head>
<body>
<h2>Loteria</h2>
<?php
$completado = false;
// Campos:
$numJugado= $numBilletes="";
// Errores:
$errorNumJugado= $errorNumBillete="";

if (isset ( $_POST ['enviar'] )) {
	// El formulario ha sido enviado: validaciÃ³n
	$numJugado = $_POST ['numJugado']; 
	$numBilletes = $_POST ['numBilletes'];
	
	if ($numJugado == "")
		$errorNumJugado = "El campo no puede estar vaci­o";
	if (strlen($numJugado)!=5)
		$errorNumJugado = "Este campo debe contener 5 números";
	if ($numBilletes == "")
		$errorNumBillete = "El campo no puede estar vacÃio";
		// Comprobar si todo estÃ¡ bien
	if (strlen($numBilletes)>3)
		$errorNumBillete = "El máximo de billetes permitidos en la aplicación son 999";
	// Recuento de errores:		
	if ($errorNumJugado=="" and $errorNumBillete=="")
		$completado = true;
}

if ($completado) {
	
	$rutaArchivo = "files/loteria.txt";
	
	$archivo = fopen ( $rutaArchivo, "r" ) or die ( "Imposible abrir el archivo" );
	$text="";
	
	while (false !== ($caracter = fgetc($archivo))) {
		$text.=$caracter;
	}
	
	//echo readfile ($rutaArchivo);
	
	$array = explode ( ";", $text);
	

	
	for($i=0;$i<count($array)-1;$i++){
		//echo $i;
		$pos=explode(" ", $array[$i]);
			
		$arrayAso[$i]=array($pos[0] => $pos[1]) ;
			
	}
	
	$numPremiado=false;
	$premio=0;
	for($i=0;$i<count($array)-1;$i++){
	
		if($numJugado == key($arrayAso[$i])){
			$numPremiado=true;
			$premio=$arrayAso[$i];
		}
	}
	
	//echo "num billete ".$numJugado;

	//echo " key ".key($arrayAso[0]);


	
	
	if($numPremiado){
		echo "<p>Felicidades a obtenido un premio de ".$premio." por cada billete comprado</p>";
		echo "<p>Total ganado: ".$premio*$numBilletes."</p>";
	}
	else{
		
		echo "<p>Su número no a sido premiado. Suerte para la próxima.</p>";
	}
	
	echo "<p><a href='".$_SERVER ['PHP_SELF']."'>Volver</a></p>";
	
	
} else {
	// Mostramos el formulario
	echo "<form action='" . htmlspecialchars ( $_SERVER ['PHP_SELF'], ENT_QUOTES, "UTF-8" ) . "' method='post'>\n";
	echo "<label>Número Jugado:</label>";
	echo "<input name='numJugado' type='number' value='" .$numJugado. "'/><span class='error'>".$errorNumJugado."</span><br/>\n";
	echo "<label>Billetes que obtiene con este número:</label>";
	echo "<input name='numBilletes' type='number' value='" .$numBilletes. "'/><span class='error'>".$errorNumBillete."</span><br/>\n";
	echo "<input name='enviar' type='submit' value='Enviar datos'/></form>";
}

?>
</body>
</html>