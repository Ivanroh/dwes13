<?php
class Coche {
	
	private $marca, $modelo, $fecha, $color, $kmUso, $precio, $descripcion;
	
	public function getMarca(){
		return $this->marca;
	}
	
	public function setMarca($marca){
		$this->marca=$marca;
	}
	
	public function getModelo(){
		return $this->modelo;
	}
	
	public function setModelo($modelo){
		$this->modelo=$modelo;
	}
	
	public function getFecha(){
		return $this->fecha;
	}
	
	public function setFecha($fecha){
		$this->fecha=$fecha;
	}
	
	public function getColor(){
		return $this->color;
	}
	
	public function setColor($color){
		$this->color=$color;
	}
	
	public function getKmUso(){
		return $this->kmUso;
	}
	
	public function setKmUso($kmUso){
		$this->kmUso=$kmUso;
	}
	
	public function getPrecio(){
		return $this->precio;
	}
	
	public function setPrecio($precio){
		$this->precio=$precio;
	}
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	public function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
	}
	
	public function datosVehiculo() {
		return "<h3>Datos del vehículo</h3>\n
			<p><strong>Marca: </strong> $this->marca</p>\n
			<p><strong>Modelo: </strong>$this->modelo</p>\n
			<p><strong>Fecha: </strong>$this->fecha</p>\n
			<p><strong>Color: </strong>$this->color</p>\n
			<p><strong>Kilometros de uso: </strong>$this->kmUso</p>\n
			<p><strong>Precio: </strong>$this->precio</p>\n
			<p><strong>Descripción del vehículo: </strong>$this->descripcion</p>\n
			";
	}
}

class Usuario {
	
	private $usuario,$contra,$contra2,$email;
	
	public function getUsuario(){
		return $this->usuario;
	}
	
	public function setUsuario($usuario){
		$this->usuario=$usuario;
	}
	
	//
	
	public function getContra(){
		return $this->contra;
	}
	
	public function setContra($contra){
		$this->contra=$contra;
	}
	
	//
	
	public function getContra2(){
		return $this->contra2;
	}
	
	public function setContra2($contra2){
		$this->contra2=$contra2;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email=$email;
	}
	
	public function datosUsuario() {

		return "<h3>Datos del Usuario</h3>\n
		<p><strong>Usuario: </strong> $this->usuario</p>\n
		<p><strong>Contraseña: </strong>$this->contra</p>\n
		<p><strong>Email: </strong>$this->email</p>\n
		";
	
	}
}


?>