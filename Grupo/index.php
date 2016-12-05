<html>
<head>
<title>Validación</title>
<style type="text/css">
body{
	background-image:url("http://www.salacaracol.com/wp-content/uploads/2014/11/fondo-madera-negro.jpg");
	font-family:monospace;
	color:white;	
}

span{
	color:red;
	}
	
p,h1{
	
 font-size:18px;
 margin-left:10px; 

 
}

h1{
	font-size:25px;
	margin-left:100px;

	
}
div{
	border:solid 2px grey;
	max-width:600px;
	max-height: 900px;
	margin-left:350px;
	margin-top:50px;
	padding:20px;
	background-image: url("data:image/jpeg;base64,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");
	background-size:700px;
	}

input{
	border-radius: 25px;
	padding:3px;
}
#boton{
	float:left;
	font-weight:bold;
	font-family:monospace;
}

.resultado{
margin-left:350px;
}

.input{
position: absolute;
right: 669px;
}

</style>
</head>
<body>

<div>
<h1>Formulario para validación</h1>
<form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
	
	<?php $nombre=$apellido=$email=$nombreErr=$apellErr=$emailErr="";?>
	<br/>
	<p>Nombre:</p> <input name="nombre" type="text" value="">
	<?php 
	
	if(isset($_POST["enviar"])){
		
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST["nombre"])) {
			$nombreErr = "<span>* Nombre no válido.<br/> El nombre solo debe de contener letras.</span>";
			$nombre=$_POST['nombre'];
			$nomVali=false;
		}
		
		if (empty($_POST["nombre"])){
			$nomVali=false;
		}
		else $nomVali=true;
		
		if($nombreErr!=""){
			echo $nombreErr;
			$nomVali=false;
		}
		else
		if (!$nomVali){
			echo "<span>* Atencion, campo obligatorio</span>";
		}
			
		else{
			$nomVali=true;
			$nombre=$_POST["nombre"];
			echo "<input class='input' name='nombre' type='text' value='$nombre'>";
		}
			
	}
	
	?>
	<br/>
	<br/>
	<p>Apellido:</p> <input type="text" name="apellido" value="">
	<?php 
	
	if(isset($_POST["enviar"])){
		
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST["apellido"])) {
			$apellErr = "<span>* Apellido no válido.<br/>El apellido solo debe de contener letras.</span>";
			$apellido=$_POST['apellido'];
			$apeVali=false;
		}

		if (empty($_POST["apellido"])){
			$apeVali=false;
		}else $apeVali=true;
		
		if($apellErr!=""){
			echo $apellErr;
			$apeVali=false;
		}
		else
		
		if (!$apeVali)
			echo "<span>* Atencion, campo obligatorio</span>";
		else{
			$apeVali=true;
			$apellido=$_POST["apellido"];
			echo "<input class='input' name='apellido' type='text' value='$apellido'>";
		}
			
		
	}

	?>
	<br/>
	<br/>
	<p>Email:</p> <input type="text" name="email" value="">
	
	<?php 
	
	if(isset($_POST["enviar"])){
		
				
		if (empty($_POST["email"])){
			$emailVali=false;
		}else 
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$emailErr = "<span>* Formato de email inválido</span>";
				$email=$_POST["email"];
				$emailVali=false;
		}else
			$emailVali=true;
		
		if($emailErr!=""){
			echo $emailErr;
			$emailVali=false;
		}
		else		
		if (!$emailVali)
			echo "<span>* Atencion, campo obligatorio</span>";
		else{
			$emailVali=true;
			$email=$_POST["email"];
			echo "<input class='input' name='email' type='text' value='$email'>";
		}
			
		
	}
	?>
	
	<br/>
	<br/>
	<input type="submit" value="Enviar Datos" name="enviar" id="boton">
	<br/>
</form>
</div>

<h1 class="resultado">Resultado</h1>
<p class="resultado">
<?php 
if(isset($_POST["enviar"])){
	
	if ($nomVali){	
		echo $nombre;
	}
	else 
	if($nombreErr!=""){
		echo "$nombre <span>Nombre no válido</span>";
	}else
		echo "$nombre <span>Nombre vacio</span>";
	
	echo "<br/>";
	
	if ($apeVali){
		echo $apellido;
	}
	else 
	if($apellErr!=""){
		echo "$apellido <span>Apellido no válido</span>";
	}else 		
		echo "$apellido <span>Apellido vacio</span>";
	
	echo "<br/>";
	if ($emailVali){
		echo $email;
	}else
	if($emailErr!=""){
		echo "$email <span>Email no válido</span>";
	}else 
	 echo "$email <span>Email vacio</span>";
	
}


?>



</p>



</body>
</html>