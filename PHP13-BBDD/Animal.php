<?php
Class Animal{
	
	private  $chip;
	private $nombre;
	private $tipo;
	private $imagen;
	
	/*public function Animal($chip,$nombre,$especie,$imagen){
		this.$chip=$chip;
		this.$nombre=$nombre;
		this.$especie=$especie;
		this.$imagen=$imagen;
	}*/
	
	public function getChip(){
		return $this->chip;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function getEspecie(){
		return $this->tipo;
	}
	
	public function getImagen(){
		return $this->imagen;
	}
	
	public function __toString(){
		return "Chip: $this->chip \nNombre: $this->nombre \nEspecie: $this->tipo \nImagen: $this->imagen";		
	}
}
?>