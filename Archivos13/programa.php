<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8' />
</head>
<body>

	<form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
		<h4>Introduzca un nombre</h4>
		<input type="text" name='nombre'><br /> Añadir <input type="radio"
			name='opc' value="si"> Borrar <input type="radio" name='opc'
			value="no"> <br /> 
			Volcar resultados <input type="radio" name='opc' value="fin">
			<input type="submit" name="enviar" value="Enviar">
	</form>

<?php
if (isset ( $_POST ["enviar"] )) {
	$archivo = fopen ( "files/nombres.txt", "a+" ) or die ( "Imposible abrir el archivo" );
	$text="";
	
	while (false !== ($caracter = fgetc($archivo))) {
		$text.=$caracter;
		//echo "$carácter\n";
	}
	
	$usuRegistrado = explode ( "/", $text);
	$esta=false;
	
	if (strcasecmp ( $_POST ["opc"], "si" ) == 0) {
		
		for($i=0;$i<count($usuRegistrado);$i++){
			if (strcasecmp ( $usuRegistrado[$i], $_POST["nombre"] ) == 0){
				$esta=true;
			}
		}
		
		if($esta){
			echo "Usuario ya existente, imposible añadir";
		}else{
			$final=substr($usuRegistrado, -1);
			var_dump($final);
		//fwrite ( $archivo, $_POST ["nombre"] . "/" );
		}
		//echo readfile ( "files/nombres.txt" );
		
	} else if (strcasecmp ( $_POST ["opc"], "no" ) == 0) {
		for($i=0;$i<count($final);$i++){
			if (strcasecmp ( $final[$i], $_POST["nombre"] ) == 0){
				$esta=true;
				unset($final[$i]);
			}
		}
		
		if($esta){
		/*	$result="";
			for($i=0;$i<count($usuRegistrado);$i++){
				$result.=$usuRegistrado[i];
			}
			
			fwrite ( $archivo, $result );
			//var_dump($usuRegistrado);*/
			
		}else{
			echo "El usuario no existe, no se puede borrar";
		}
		
		
		
		echo readfile ( "files/nombres.txt" );

	}
	
	else if (strcasecmp ( $_POST ["opc"], "fin" ) == 0) {
		
		
	}
	
	else{echo "Selecione una opcion (Añadir/Borrar)";}
	// fclose($archivo)
	// echo "hoas";
}

?>



</body>
</html>