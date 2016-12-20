
<html>
<head>
<title>Venta Vehículo</title>
<meta charset="UTF-8">
<style>
.error {
	color: darkred;
}
</style>

</head>


<body>

	<h4>Datos del vehículo</h4>

<?php
$marcaErr = $modeloErr = $fechaErr = $colorErr = $kmUsoErr = $precioErr = $usuarioErr = $contraErr = $contra2Err = $emailErr = $acumUsu = "";
$marca = $modelo = $fecha = $color = $kmUso = $precio = $usuario = $contra = $contra2 = $email = $descripcion = "";
$usuValido = $contraValido = $contra2Valido = $emailValido = false;
//$completado=false;


if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	// validacion nombre
	if (empty ( $_POST ["marca"] )) {
		$marcaErr = "Atención campo vacío";
	} else {
		$marca = test_input ( $_POST ["marca"] );
		if (! preg_match ( "/^[a-zA-Z ]*$/", $marca )) { // funcion para comprobar que solo existen letras y espacios
			$marcaErr = "Solo espacios y letras";
		}
	}
	
	// validacion
	if (empty ( $_POST ["modelo"] )) {
		$modeloErr = "Atención campo vacío";
	} else {
		$modelo = test_input ( $_POST ["modelo"] );
		if (! preg_match ( "/^[a-zA-Z ]*$/", $modelo )) { // funcion para comprobar que solo existen letras y espacios
			$modeloErr = "Solo espacios y letras";
		}
	}
	
	// validacion
	if (empty ( $_POST ["fecha"] )) {
		$fechaErr = "Atención campo vacío";
	} else {
		$fecha = test_input ( $_POST ["fecha"] );
		if ($fecha > date ( "Y" )) { // Comprobamos que la fecha no es mayor del año actual
			$fechaErr = "El año introducido no es válido";
		} elseif ($fecha < date ( "Y" ) - 300) {
			$fechaErr = "El año introducido es demasiado pequeño";
		}
		if (! preg_match ( "/^[0-9]*$/", $fecha )) { // Comprobamos que la fecha solo contiene numeros
			$fechaErr = "Introduzca solo el año";
		}
	}
	
	// validacion
	if (empty ( $_POST ["color"] )) {
		$colorErr = "Atención campo vacío";
	} else {
		$color = test_input ( $_POST ["color"] );
		if (! preg_match ( "/^[a-zA-Z ]*$/", $color )) { // funcion para comprobar que solo existen letras y espacios
			$colorErr = "Solo espacios y letras";
		}
	}
	
	// validacion
	if (empty ( $_POST ["kmUso"] )) {
		$kmUsoErr = "Atención campo vacío";
	} else {
		$kmUso = test_input ( $_POST ["kmUso"] );
		if (! preg_match ( "/^[0-9]*$/", $kmUso )) { // funcion para comprobar que solo existen letras y espacios
			$kmUsoErr = "Solo números";
		}
	}
	
	// validacion
	if (empty ( $_POST ["precio"] )) {
		$precioErr = "Atención campo vacío";
	} else {
		$precio = test_input ( $_POST ["precio"] );
		if (! preg_match ( "/^[0-9]*$/", $precio )) { // funcion para comprobar que solo existen letras y espacios
			$precioErr = "Solo números";
		}
	}
	
	/*
	 * validacion
	 * /////////////////////////////////////////////////////////77
	 * /////////////////////////////////////////////////////////77
	 * /////////////////////////////////////////////////////////77
	 * /////////////////////////////////////////////////////////77
	 *
	 * if (empty ( $_POST ["usuario"] )) {
	 * $usuarioErr ="Atención campo vacío";
	 * } else {
	 * $usuario = test_input ( $_POST ["usuario"] );
	 * if (! preg_match ( "/^[a-zA-Z ]*$/", $usuario )) { // funcion para comprobar que solo existen letras y espacios
	 * $usuarioErr = "Solo espacios y letras";
	 * }
	 * }
	 */
	
	// validacion
	
	if (empty ( $_POST ["usuario"] )) {
		$usuarioErr = "Atención campo vacío";
	} else {
		$usuario = test_input ( $_POST ["usuario"] );
		if (! preg_match ( "/^[a-zA-Z ]*$/", $usuario )) { // funcion para comprobar que solo existen letras y espacios
			$usuarioErr = "Solo espacios y letras";
		} else {
			$usuValido = true;
			if (isset ( $_POST ["acumUsu"] ))
				$acumUsu = $_POST ["acumUsu"] . $usuario . "/";
		}
	}
	
	
	
	
	
	// Contraseña
	if (empty ( $_POST ["contrasenia"] )) {
		$contraErr = "Atención campo vacío";
	} else {
		$contra = test_input ( $_POST ["contrasenia2"] );
		if (strlen ( $contra ) < 6) {
			$contraErr = "Contraseña demasiado corta, debe contener mínimo 6 caracteres";
		} else {
			$contraValido = true;
		}
	}
	
	if (empty ( $_POST ["contrasenia2"] )) {
		$contra2Err = "Repita la contraseña";
	} else {
		$contra2 = test_input ( $_POST ["contrasenia2"] );
		if ($contra2 != $contra) {
			$contra2Err = "Atención, las contraseñas no coinciden";
		} else {
			$contra2Valido = true;
		}
	}
	// validar email
	if (empty ( $_POST ["email"] )) {
		$emailErr = "Atención campo vacío";
	} else {
		$email = test_input ( $_POST ["email"] );
		if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) { // Comprobamos que el email es valido
			$emailErr = "Formato de email es invalido";
		} else {
			$emailValido = true;
		}
	}
	if (empty ( $_POST ["descripcion"] )) {
		$descripcion = "";
	} else {
		$descripcion = test_input ( $_POST ["descripcion"] );
	}
	

	
}
function test_input($data) {
	$data = trim ( $data );
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data );
	return $data;
}

/*
if ($marcaErr == "" and $modeloErr == "" and $fechaErr =="" and  $colorErr == "" and $kmUsoErr == "" and $precioErr =="" and $usuarioErr =="" and $contraErr =="" and $contra2Err =="" and  $emailErr =="" and  $acumUsu == "")
	$completado = true;
	*/

?>



	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		Marca: <input type='text' name='marca' value="<?php echo $marca;?>"> <span
			class="error">* <?php echo $marcaErr;?></span> <br /> Modelo: <input
			type='text' name='modelo' value="<?php echo $modelo;?>"> <span
			class="error">* <?php echo $modeloErr;?></span> <br /> Fecha de
		compra: <input type="date" name="fecha" value="<?php echo $fecha;?>">
		<span class="error">* <?php echo $fechaErr;?></span> <br /> Color: <input
			type="color" name="color" value="<?php echo $color;?>"> <span
			class="error">* <?php echo $colorErr;?></span> <br /> Kilómetros de
		uso: <input type="number" name="kmUso" value="<?php echo $kmUso;?>"> <span
			class="error">* <?php echo $kmUsoErr;?></span> <br /> Precio: <input
			type="number" name="precio" value="<?php echo $precio;?>"> <span
			class="error">* <?php echo $precioErr;?></span> <br /> Descripción
		del estado del vehículo: <br />
		<textarea rows="5" cols="30" name="descripcion"><?php echo $descripcion;?></textarea>
		<br />

		<h4>Datos para gestionar su anuncio</h4>
		Nombre de usuario:<input type="text" name="usuario"
			value="<?php echo $usuario;?>"> <span class="error">* <?php echo $usuarioErr;?></span>

		<input type='hidden' name='acumUsu' value="<?php echo $acumUsu?>">


		<br /> Contraseña:<input type="password" name="contrasenia"
			value="<?php echo $contra;?>"> <span class="error">* <?php echo $contraErr;?></span>
		<br /> Confirmación de contraseña:<input type="password"
			name="contrasenia2" value="<?php echo $contra2;?>"> <span
			class="error">* <?php echo $contra2Err;?></span> <br /> Correo
		electrónico:<input type="email" name="email"
			value="<?php echo $email;?>"> <span class="error">* <?php echo $emailErr;?></span>


		<br /> <input type='submit' name='enviar' value='Enviar Formulario'>
	</form>
	

	
	<?php

		
	//if ($usuValido && $contraValido && $contra2Valido && $emailValido) {
		// preguntar si quiere otra vez booleano para que salga el formulario y listo
		
		
		$usuRegistrado = explode ( "/", $acumUsu );
		
		$element=count($usuRegistrado);
		$element=$element-1;
		//echo $element;
		$borro=0;
		$cont=0;
		for($i=0;$i<$element;$i++){
			if($usuRegistrado[$i]==$_POST["usuario"]){
				$cont++;
				if ($cont>=2){
				$borro=$i;
				echo $borro;
				}
			}
		}
		
		unset($usuRegistrado[$borro]);
		//unset($usuRegistrado[$element-1]);
		//echo end($usuRegistrado);
		//$usuarioRepetido = array_pop($usuRegistrado);
		//unset($usuRegistrado[count($usuRegistrado)]);
		//print_r($usuarioRepetido);
		
		//echo $_POST ["usuario"];
		echo "<br>";
		echo "<p>Acumulando</p>";
		foreach ($usuRegistrado as $usu ) {
			echo "<strong>".$usu."</strong>";
		}
		echo "<br>";
		
		//echo end($usuRegistrado);
		//$acumUsu=$usuRegistrado;
		
		/*$contar=count($usuRegistrado);
		echo "Contar :";
		echo $contar;
		echo "<br/>";*/
		/*
		$cont = 0;
		foreach ( $usuRegistrado as $usu ) {
			if ($usuario.$usu) {
				$cont ++;
				//echo $cont;
				//echo end($acumUsu);
			}
		}
		if ($cont > 2) {
			
			//$acumUsu=$usuRegistrado;
			//$acumUsu=array_pop( $usuRegistrado );
			//$usuarioErr = "El usuario ya existe";
			$usuValido = false;
			echo "<h4>ERROR usuario ya registrado</h4>";
			$usuario="";
		}*/
		
		
		
		
		
		
				
		/*
		include 'clases.php';
		if (isset ( $_POST ["enviar"] )) {
			$coche = new Coche ();
			$coche->setMarca ( $_POST ["marca"] );
			$coche->setModelo ( $_POST ["modelo"] );
			$coche->setFecha ( $_POST ["fecha"] );
			$coche->setColor ( $_POST ["color"] );
			$coche->setKmUso ( $_POST ["kmUso"] );
			$coche->setPrecio ( $_POST ["precio"] );
			
			echo $coche->datosVehiculo ();
			
			$usuarioNuevo = new Usuario ();
			
			$usuarioNuevo->setUsuario ( $_POST ["usuario"] );
			$usuarioNuevo->setContra ( $_POST ["contrasenia"] );
			$usuarioNuevo->setEmail ( $_POST ["email"] );
			
			echo $usuarioNuevo->datosUsuario ();
			$usuarioNuevo->mostrarContrasenia();

		} else {
			$acumUsu = "";
		}*/
	//}
	
	?>
				
	
	






</html>
</body>