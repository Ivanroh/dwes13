<html>
<body>
<?php
if (!isset($_POST['enviar'])){
?>
	<form action='Formularios.php' method='post'>
	Producto: <input type='text' name='producto'>
	Cantidad solicitada: <input type='text' name='cantidad'>
	<input type='submit' name='enviar' value='Enviar Formulario'>
	</form>

<?php
}
else{ 
	echo "<p>Producto seleccionado: <h4>".$_POST["producto"]."</h4></p>\n";
	echo "<p>Cantidad solicitada del producto: <h4>".$_POST["cantidad"]."</h4></p>";

}

?>

</body>
</html>
