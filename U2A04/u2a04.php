<html>
<body>
<?php
/*Realiza una aplicación web que recoja en un formulario unos datos 
y los utilice para crear un objeto de una clase, llamar a uno de sus metodos, 
y mostrar el resultado por pantalla.*/

if(!isset($_POST["enviar"])){
	echo "<h3>Ficha de viaje en un vehículo, calcular litros de combustible necesarios</h3>";
?>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	Introduzca marca: <input type="text" name="marca" size="11"><br/>
	Introduzca modelo: <input type="text" name="modelo" size="10"><br/>
	Introduzca los kilómetros que va a recorrer: <input type="text" name="km" size="10"><br/>
	<input type="submit" value="Enviar Datos" name="enviar">
	</form>

<?php 
}else{
	
	class Vehiculo{
		public $marca;
		public $anio;
		public $km;
		
		public function getMarca(){
			return $this->marca;
		}
		
		public function setMarca($marca){
			$this->marca=$marca; 
		}
		
		public function getModelo(){
			return $this->modelo;
		}
		
		public function setAnio($modelo){
			$this->anio=$modelo;
		}
		
		public function getKm(){
			return $this->km;
		}
		
		public function setKm($Km){
			$this->km=$km;
		}
		
		public function datosVehiculo(){
			return "<h3>Datos del vehículo</h3>\n
			<p><strong>Marca: </strong> $this->marca</p>\n
			<p><strong>Modelo: </strong>$this->modelo</p>\n
			<p><strong>Kilometros: </strong>$this->km</p>\n";
		}
		
		public function calcularLitrosPorKmRecorrridos(){	
			return "<p>Teniendo en cuenta que 1L equivale a 13 Km</p>\n
				<p>Se aproxima el uso de ".(round((($this->km/13)*100))/100)." litros durante el viaje.</p>";
		}
	}
	
	$vehiculo = new Vehiculo();
	$vehiculo->marca=$_POST["marca"];
	$vehiculo->modelo=$_POST["modelo"];
	$vehiculo->km=$_POST["km"];
	
	echo $vehiculo->datosVehiculo();
	
	echo "<p>".$vehiculo->calcularLitrosPorKmRecorrridos()."</p>";
	
}
?>
</html>
</body>