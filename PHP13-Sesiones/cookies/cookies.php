<html>
<head>
<title>Cookies y sesiones</title>
<meta charset="UTF-8"/>
</head>
<body>
<?php


if(isset($_REQUEST["eliminarCookie"])){
	setcookie("visitante", "nulo", time() - 1, "/PHP13-Sesiones/cookies");
}
if(isset($_POST["enviar"])) {
	setcookie("test", "test", time() + 3600, '/');
	if(count($_COOKIE) ==0) echo "<h3>Advertencia: tu navegador tiene las cookies deshabilitadas. Esta aplicación no funcionará</h3>";
	else
	
	setcookie("visitante", $_POST["nombre"], time() +15, "/PHP13-Sesiones/cookies"); // 86400 = segundos en 1 día
}
if(isset($_COOKIE["visitante"])) {
	echo "<h2>Damos la bienvenida a $_COOKIE[visitante]</h2>";
}
else
{ // solicitar nombre al usuario
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label>Escribe tu nombre para dirigirnos a ti:</label>
    <input type="text" name="nombre"><br/>
    <input type="submit" value="Enviar" name="enviar">
</form>
<?php
}

?>
<p><a href='cookies.php?eliminarCookie=si'>Eliminar Cookie</a></p>
<p><a href="<?php echo $_SERVER['PHP_SELF']?>">Enlace a esta misma página</a></p>
</body></html>