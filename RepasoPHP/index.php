<html>
<head>
<meta charset='UTF-8' />
</head>
<body>
<?php
if (!isset($_POST["enviar"])){

?>

<form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
	<h4>Introduzca un número</h4>
	<input type="number" name='num'><br/>
	<h4>Introduzca un texto</h4>
	<input type="text" name='texto'><br/>
	<input type="submit" name="enviar" value="Mostrar pirámide de números con marco">
</form>
<?php
}
else{
	
	$num=$_POST["num"];
	$texto=$_POST["texto"];
	$space=" ";
	echo "<pre>";
	
	for($i=0;$i<$num;$i++){
		echo "<p>|";
		if ($i>1){
			echo $space;
			$space.=$space;
		}
		echo "&#92;</p>";
	}
	echo "<p>|";
	for($i=1;$i<=$num;$i++){
		echo " ";
	}
	echo " > ".$texto."</p>";
	
	
	for($i=$num;$i>0;$i--){
		echo "<p>|";
			if ($i>1){
			$space=substr($space, -$i);
			echo $space;
			}
	
		echo "/</p>";
	}
	
	echo "</pre>";
	
	
}
?>

</body>
</html>