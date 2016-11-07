<html>
<body>
<?php
/*Realiza una aplicación web que recoja en un formulario unos datos 
y los utilice para crear un objeto de una clase, llamar a uno de sus metodos, 
y mostrar el resultado por pantalla.*/

if(!isset($_POST["enviar"])){
	echo "<h3>Objeto vehículo</h3>";
?>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	Introduzca marca: <input type="text" name="marca">
	Introduzca año: <input type="text" name="anio">
	<input type="submit" value="Enviar Datos" name="enviar">
	</form>

<?php 
}else{
	
	class Coche{
		public $marca;
		public $anio;
		
		public function getMarca(){
			return $this->marca;
		}
		
		public function getAnio(){
			return $this->anio;
		}
		
		public function setMarca($marca){
			$this->marca=$marca; 
		}
		
		public function setAnio($anio){
			$this->anio=$anio;
		}
		
		public function datosCoche(){
			return "<h3>Datos del vehículo</h3>\n <p><strong>Marca:</strong> $this->marca</p>\n <p><strong>Año:</strong>$this->anio</p>";
		}
	}
	
	$coche = new Coche();
	$coche->marca=$_POST["marca"];
	$coche->anio=$_POST["anio"];
	
	echo $coche->datosCoche();
}
?>
</html>
</body>