<?php
Class Animal{
	public $chip;
	public $nombre;
	public $especie;
	public $imagen;
	
	public function Animal($chip,$nombre,$especie,$imagen){
		this.$chip=$chip;
		this.$nombre=$nombre;
		this.$especie=$especie;
		this.$imagen=$imagen;
	}
	
	public function __toString(){
		return "Chip: $chip, Nombre: $nombre, Especie: $especie, Imagen: $imagen";		
	}
}
?>